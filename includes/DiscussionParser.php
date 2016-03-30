<?php

abstract class EchoDiscussionParser {
	const HEADER_REGEX = '^(==+)\s*([^=].*)\s*\1$';

	static protected $timestampRegex;
	static protected $revisionInterpretationCache = array();
	static protected $diffParser;

	/**
	 * Given a Revision object, generates EchoEvent objects for
	 * the discussion-related actions that occurred in that Revision.
	 *
	 * @param $revision Revision object
	 * @return null
	 */
	static function generateEventsForRevision( $revision ) {
		$interpretation = self::getChangeInterpretationForRevision( $revision );

		// use slave database if there is a previous revision
		if ( $revision->getPrevious() ) {
			$title = Title::newFromID( $revision->getPage() );
		// use master database for new page
		} else {
			$title = Title::newFromID( $revision->getPage(), Title::GAID_FOR_UPDATE );
		}

		// not a valid title
		if ( !$title ) {
			return;
		}

		$userID = $revision->getUser();
		$userName = $revision->getUserText();
		$user = $userID != 0 ? User::newFromId( $userID ) : User::newFromName( $userName, false );

		foreach ( $interpretation as $action ) {
			if ( $action['type'] == 'add-comment' ) {
				$fullSection = $action['full-section'];
				$header = self::extractHeader( $fullSection );
				self::generateMentionEvents( $header, $action['content'], $revision, $user );
			} elseif ( $action['type'] == 'new-section-with-comment' ) {
				$content = $action['content'];
				$header = self::extractHeader( $content );
				self::generateMentionEvents( $header, $content, $revision, $user );
			}
		}

		if ( $title->getNamespace() == NS_USER_TALK ) {
			$notifyUser = User::newFromName( $title->getText() );
			// If the recipient is a valid non-anonymous user and hasn't turned
			// off their notifications, generate a talk page post Echo notification.
			if ( $notifyUser && $notifyUser->getID() ) {
				// if this is a minor edit, only notify if the agent doesn't have talk page minor edit notification blocked
				if ( !$revision->isMinor() || !$user->isAllowed( 'nominornewtalk' ) ) {
					$section = self::detectSectionTitleAndText( $interpretation, $title );
					if ( $section['section-text'] === '' ) {
						$section['section-text'] = $revision->getComment();
					}
					EchoEvent::create( array(
						'type' => 'edit-user-talk',
						'title' => $title,
						'extra' => array(
							'revid' => $revision->getID(),
							'minoredit' => $revision->isMinor(),
							'section-title' => $section['section-title'],
							'section-text' => $section['section-text'],
							'target-page' => $title->getArticleID(),
						),
						'agent' => $user,
					) );
				}
			}
		}
	}

	/**
	 * Attempts to determine what section title the edit was performed under (if any)
	 *
	 * @param $interpretation array Results of self::getChangeInterpretationForRevision
	 * @return array Array containing section title and text
	 * @param Title $title
	 */
	public static function detectSectionTitleAndText( array $interpretation, Title $title = null ) {
		global $wgLang;
		$header = $snippet = '';
		$found = false;

		StubObject::unstub( $wgLang );

		foreach ( $interpretation as $action ) {
			switch ( $action['type'] ) {
				case 'add-comment':
					$header = self::extractHeader( $action['full-section'] );
					$snippet = self::getTextSnippet(
						self::stripSignature( self::stripHeader( $action['content'] ), $title ),
						$wgLang,
						150 );
					break;
				case 'new-section-with-comment':
					$header = self::extractHeader( $action['content'] );
					$snippet = self::getTextSnippet(
						self::stripSignature( self::stripHeader( $action['content'] ), $title ),
						$wgLang,
						150 );
					break;
			}
			if ( $header ) {
				// If we find a second header within the same change interpretation then
				// we cannot choose just 1 to link to
				if ( $found ) {
					$found = false;
					break;
				}
				$found = true;
			}
		}
		if ( $found === false ) {
			return array( 'section-title' => '', 'section-text' => '' );
		}

		return array( 'section-title' => $header, 'section-text' => $snippet );
	}

	/**
	 * For an action taken on a talk page, notify users whose user pages
	 * are linked.
	 * @param $header string The subject line for the discussion.
	 * @param $content string The content of the post, as a wikitext string.
	 * @param $revision Revision object.
	 * @param $agent User The user who made the comment.
	 */
	public static function generateMentionEvents( $header, $content, $revision, $agent ) {
		$title = $revision->getTitle();
		if ( !$title ) {
			return;
		}

		$output = self::parseNonEditWikitext( $content, new Article( $title ) );
		$links = $output->getLinks();

		if ( !isset( $links[NS_USER] ) || !is_array( $links[NS_USER] ) ) {
			return;
		}
		$mentionedUsers = array();
		$count = 0;

		foreach ( $links[NS_USER] as $dbk => $page_id ) {
			$user = User::newFromName( $dbk );

			// we should not add user to 'mention' notification list if
			// 1. the user name is not valid
			// 2. the user mentions themselves
			// 3. the user is the owner of the talk page
			// 4. user is anonymous
			if (
				!$user || $user->isAnon() || $user->getId() == $revision->getUser() ||
				( $title->getNamespace() === NS_USER_TALK && $title->getDBkey() === $dbk )
			) {
				continue;
			}
			$mentionedUsers[$user->getId()] = $user->getId();
			$count++;
			// If more than 50 users are being pinged this is likely a spam/attack vector
			// Don't send any mention notifications.
			if ( $count > 50 ) {
				return;
			}
		}

		if ( !$mentionedUsers ) {
			return;
		}

		EchoEvent::create( array(
			'type' => 'mention',
			'title' => $title,
			'extra' => array(
				'content' => $content,
				'section-title' => $header,
				'revid' => $revision->getId(),
				'mentioned-users' => $mentionedUsers,
			),
			'agent' => $agent,
		) );
	}

	/**
	 * It's like Article::prepareTextForEdit,
	 *  but not for editing (old wikitext usually)
	 * Stolen from AbuseFilterVariableHolder
	 *
	 * @param $wikitext String
	 * @param $article Article
	 *
	 * @return ParserOutput
	 */
	static function parseNonEditWikitext( $wikitext, $article ) {
		static $cache = array();

		$cacheKey = md5( $wikitext ) . ':' . $article->getTitle()->getPrefixedText();

		if ( isset( $cache[$cacheKey] ) ) {
			return $cache[$cacheKey];
		}

		global $wgParser;
		$options = new ParserOptions;
		$options->setTidy( true );
		$output = $wgParser->parse( $wikitext, $article->getTitle(), $options );
		$cache[$cacheKey] = $output;

		return $output;
	}

	/**
	 * Given a Revision object, returns a talk-page-centric interpretation
	 * of the changes made in it.
	 *
	 * @param $revision Revision object
	 * @see EchoDiscussionParser::interpretDiff
	 * @return Array, see interpretDiff for details.
	 */
	static function getChangeInterpretationForRevision( $revision ) {
		if ( $revision->getID() && isset( self::$revisionInterpretationCache[$revision->getID()] ) ) {
			return self::$revisionInterpretationCache[$revision->getID()];
		}

		$userID = $revision->getUser();
		$userName = $revision->getUserText();
		$user = $userID != 0 ? User::newFromId( $userID ) : User::newFromName( $userName, false );
		$prevText = '';
		if ( $revision->getParentId() ) {
			$prevRevision = Revision::newFromId( $revision->getParentId() );
			if ( $prevRevision ) {
				$prevText = $prevRevision->getText();
			}
		}

		$changes = self::getMachineReadableDiff( $prevText, $revision->getText() );
		$output = self::interpretDiff( $changes, $user->getName(), $revision->getTitle() );

		self::$revisionInterpretationCache[$revision->getID()] = $output;

		return $output;
	}

	/**
	 * Given a machine-readable diff, interprets the changes
	 * in terms of discussion page actions
	 *
	 * @todo Expand recognisable actions.
	 * @param array $changes Output of EchoEvent::getMachineReadableDiff
	 * @param string $user Username
	 * @param Title $title
	 * @return Array of associative arrays.
	 * Each entry represents an action, which is classified in the 'action' field.
	 * All types contain a 'content' field except 'unknown'
	 *  (which instead passes through the machine-readable diff in 'details')
	 *  and 'unknown-change' (which provides 'new_content' and 'old_content')
	 * action may be:
	 * - add-comment: A comment signed by the user is added to an
	 *    existing section.
	 * - new-section-with-comment: A new section is added, containing
	 *    a single comment signed by the user in question.
	 * - unknown-signed-addition: Some signed content is added, but it
	 *    includes section headers, is signed by another user or
	 *    otherwise confuses the interpretation engine.
	 * - unknown-multi-signed-addition: Some signed content is added,
	 *    but it contains multiple signatures.
	 * - unknown-unsigned-addition: Some content is added, but it is
	 *    unsigned.
	 * - unknown-subtraction: Some content was removed. These actions are
	 *    not currently analysed.
	 * - unknown-change: Some content was replaced with other content.
	 *    These actions are not currently analysed.
	 * - unknown: Unrecognised change type.
	 */
	static function interpretDiff( $changes, $user, Title $title = null ) {
		// One extra item in $changes for _info
		$actions = array();

		foreach ( $changes as $index => $change ) {
			if ( !is_numeric( $index ) ) {
				continue;
			}

			if ( !$change['action'] ) {
				// Unknown action; skip
				continue;
			}

			if ( $change['action'] == 'add' ) {
				$content = trim( $change['content'] );
				// The \A means the regex must match at the begining of the string.
				// This is slightly different than ^ which matches begining of each
				// line in multiline mode.
				$startSection = preg_match( "/\A" . self::HEADER_REGEX . '/um', $content );
				$sectionCount = self::getSectionCount( $content );
				$signedUsers = array_keys( self::extractSignatures( $content, $title ) );

				if (
					count( $signedUsers ) == 1 &&
					in_array( $user, $signedUsers )
				) {
					if ( $sectionCount === 0 ) {
						$fullSection = self::getFullSection( $changes['_info']['rhs'], $change['right-pos'] );
						$actions[] = array(
							'type' => 'add-comment',
							'content' => $content,
							'full-section' => $fullSection,
						);
					} elseif ( $startSection && $sectionCount === 1 ) {
						$actions[] = array(
							'type' => 'new-section-with-comment',
							'content' => $content,
						);
					} else {
						$actions[] = array(
							'type' => 'unknown-signed-addition',
							'content' => $content,
						);
					}
				} elseif ( count( $signedUsers ) >= 1 ) {
					$actions[] = array(
						'type' => 'unknown-multi-signed-addition',
						'content' => $content,
					);
				} else {
					$actions[] = array(
						'type' => 'unknown-unsigned-addition',
						'content' => $content,
					);
				}
			} elseif ( $change['action'] == 'subtract' ) {
				$actions[] = array(
					'type' => 'unknown-subtraction',
					'content' => $change['content'],
				);
			} elseif ( $change['action'] == 'change' ) {
				$actions[] = array(
					'type' => 'unknown-change',
					'old_content' => $change['old_content'],
					'new_content' => $change['new_content'],
				);
			} else {
				$actions[] = array(
					'type' => 'unknown',
					'details' => $change,
				);
			}
		}

		// $actions['_diff'] = $changes;
		// unset( $actions['_diff']['_info'] );

		return $actions;
	}

	/**
	 * Finds the section that a given line is in.
	 *
	 * @param $lines Array of lines in the page.
	 * @param $offset int The line to find the full section for.
	 * @return string Content of the section.
	 */
	static function getFullSection( $lines, $offset ) {
		$content = $lines[$offset - 1];
		$headerRegex = '/' . self::HEADER_REGEX . '/um';

		// Expand backwards...
		$continue = !preg_match( $headerRegex, $lines[$offset - 1] );
		$i = $offset - 1;
		while ( $continue && $i > 0 ) {
			--$i;
			$line = $lines[$i];
			$content = "$line\n$content";
			if ( preg_match( $headerRegex, $line ) ) {
				$continue = false;
			}
		}

		// And then forwards...

		$continue = true;
		$i = $offset - 1;
		while ( $continue && $i < count( $lines ) - 1 ) {
			++$i;
			$line = $lines[$i];
			if ( preg_match( $headerRegex, $line ) ) {
				$continue = false;
			} else {
				$content .= "\n$line";
			}
		}

		return trim( $content, "\n" );
	}

	/**
	 * Gets the number of section headers in a string.
	 *
	 * @param $text string The text.
	 * @return int Number of section headers found.
	 */
	static function getSectionCount( $text ) {
		$text = trim( $text );

		$matches = array();
		preg_match_all( '/' . self::HEADER_REGEX . '/um', $text, $matches );

		return count( $matches[0] );
	}

	/**
	 * Gets the title of a section or sub section
	 *
	 * @param $text string The text of the section.
	 * @return string The title of the section.
	 */
	static function extractHeader( $text ) {
		$text = trim( $text );

		$matches = array();

		if ( !preg_match_all( '/' . self::HEADER_REGEX . '/um', $text, $matches ) ) {
			return false;
		}

		return trim( end( $matches[2] ) );
	}

	/**
	 * Strips out a signature if possible.
	 *
	 * @param $text string The wikitext to strip
	 * @param Title $title
	 * @return string
	 */
	static function stripSignature( $text, Title $title = null ) {
		$output = self::getUserFromLine( $text, $title );
		if ( $output === false ) {
			$timestampPos = self::getTimestampPosition( $text );

			return substr( $text, 0, $timestampPos );
		}

		// Use truncate() instead of truncateHTML() because truncateHTML()
		// would not strip signature if the text contains < or &
		global $wgContLang;

		return $wgContLang->truncate( $text, $output[0], '' );
	}

	/**
	 * Strips unnecessary indentation and so on from comments
	 *
	 * @param $text string The text to strip from
	 * @return string Stripped wikitext
	 */
	static function stripIndents( $text ) {
		// First strip all indentation from the beginning of lines
		$text = preg_replace( '/^\s*\:+/m', '', $text );

		// Now if there is only one list item, strip that too
		$listRegex = '/^\s*(?:[\:#*]\s*)*[#*]/m';
		$matches = array();
		if ( preg_match_all( $listRegex, $text, $matches ) ) {
			if ( count( $matches ) == 1 ) {
				$text = preg_replace( $listRegex, '', $text );
			}
		}

		return $text;
	}

	/**
	 * Strips out a section header
	 * @param $text string The text to strip out the section header from.
	 * @return string: The same text, with the section header stripped out.
	 */
	static function stripHeader( $text ) {
		$text = preg_replace( '/' . self::HEADER_REGEX . '/um', '', $text );

		return $text;
	}

	/**
	 * Determines whether the input is a signed comment.
	 *
	 * @param $text string The text to check.
	 * @param $user User|bool If set, will only return true if the comment is
	 *  signed by this user.
	 * @param Title $title
	 * @return bool: true or false.
	 */
	static function isSignedComment( $text, $user = false, Title $title = null ) {
		$userData = self::getUserFromLine( $text, $title );

		if ( $userData === false ) {
			return false;
		} elseif ( $user === false ) {
			return true;
		}

		list( , $foundUser ) = $userData;

		return User::getCanonicalName( $foundUser, false ) === User::getCanonicalName( $user, false );
	}

	/**
	 * Finds the start position, if any, of the timestamp on a line
	 *
	 * @param $line string The line to search for a signature on
	 * @return int|bool Integer position
	 */
	static function getTimestampPosition( $line ) {
		$timestampRegex = self::getTimestampRegex();
		$endOfLine = self::getLineEndingRegex();
		$tsMatches = array();
		if ( !preg_match(
			"/$timestampRegex$endOfLine/mu",
			$line,
			$tsMatches,
			PREG_OFFSET_CAPTURE
		) ) {
			return false;
		}

		return $tsMatches[0][1];
	}

	/**
	 * Finds differences between $oldText and $newText
	 * and returns the result in a machine-readable format.
	 *
	 * @param $oldText string The "left hand side" of the diff.
	 * @param $newText string The "right hand side" of the diff.
	 * @throws MWException
	 * @return Array of changes.
	 * Each change consists of:
	 * * An 'action', one of:
	 *   - add
	 *   - subtract
	 *   - change
	 * * 'content' that was added or removed, or in the case
	 *    of a change, 'old_content' and 'new_content'
	 * * 'left_pos' and 'right_pos' (in lines) of the change.
	 */
	static function getMachineReadableDiff( $oldText, $newText ) {
		if ( !isset( self::$diffParser ) ) {
			self::$diffParser = new EchoDiffParser;
		}

		return self::$diffParser->getChangeSet( $oldText, $newText );
	}

	/**
	 * Finds and extracts signatures in $text
	 *
	 * @param $text string The text in which to look for signed comments.
	 * @param Title $title
	 * @return array. Associative array, the key is the username, the value
	 *  is the last signature that was found.
	 */
	static function extractSignatures( $text, Title $title = null ) {
		$lines = explode( "\n", $text );

		$output = array();

		$lineNumber = 0;

		foreach ( $lines as $line ) {
			++$lineNumber;

			// Look for the last user link on the line.
			$userData = self::getUserFromLine( $line, $title );
			if ( $userData === false ) {
				// print "F\t$lineNumber\t$line\n";
				continue;
			} else {
				// print "S\t$lineNumber\n";
			}

			list( $signaturePos, $user ) = $userData;

			$signature = substr( $line, $signaturePos );
			$output[$user] = $signature;
		}

		return $output;
	}

	/**
	 * From a line in the signature, extract all the users linked to
	 *
	 * @param string $line Line of text potentially including linked user, user talk,
	 *  and contribution pages
	 * @return array Array of users; empty array for none detected
	 */
	public static function extractUsersFromLine( $line ) {
		/*
		 * Signatures can look like anything (as defined by i18n messages
		 * "signature" & "signature-anon").
		 * A signature can, e.g., be both a link to user & user-talk page.
		 *
		 */
		// match all title-like excerpts in this line
		if ( !preg_match_all( '/\[\[([^\[]+)\]\]/', $line, $matches ) ) {
			return array();
		}

		$matches = $matches[1];

		$usernames = array();

		foreach ( $matches as $match ) {
			/*
			 * Create an object out of the link title.
			 * In theory, links can be [[text]], [[text|text]] or pipe tricks
			 * [[text|]] or [[|text]].
			 * In the case of reverse pipe trick, the value we use *could* be
			 * empty, but Parser::pstPass2 should have normalized that for us
			 * already.
			 */
			$match = explode( '|', $match );
			$title = Title::newFromText( $match[0] );

			// figure out if we the link is related to a user
			if ( $title && ( $title->getNamespace() === NS_USER || $title->getNamespace() === NS_USER_TALK ) ) {
				$usernames[] = $title->getText();
			} elseif ( $title && $title->isSpecial( 'Contributions' ) ) {
				$parts = explode( '/', $title->getText(), 2 );
				$usernames[] = end( $parts );
			} else {
				// move on to next matched title-like excerpt
				continue;
			}
		}

		return $usernames;
	}

	/**
	 * From a line in a wiki page, determine which user, if any,
	 *  has signed it.
	 *
	 * @param string $line The line.
	 * @param Title $title
	 * @return bool|array false for none, Array for success.
	 * - First element is the position of the signature.
	 * - Second element is the normalised user name.
	 */
	public static function getUserFromLine( $line, Title $title = null ) {
		global $wgParser;

		/*
		 * First we call extractUsersFromLine to get all the potential usernames
		 * from the line.  Then, we loop backwards through them, figure out which
		 * match to a user, regenera the signature based on that user, and
		 * see if it matches!
		 */
		$usernames = self::extractUsersFromLine( $line );
		$usernames = array_reverse( $usernames );
		foreach ( $usernames as $username ) {
			// generate (dateless) signature from the user we think we've
			// discovered the signature from
			// don't validate the username - anon (IP) is fine!
			$user = User::newFromName( $username, false );
			$sig = $wgParser->preSaveTransform( '~~~', $title ?: Title::newMainPage(), $user, new ParserOptions() );

			// see if we can find this user's generated signature in the content
			$pos = strrpos( $line, $sig );
			if ( $pos !== false ) {
				return array( $pos, $username );
			}
			// couldn't find sig, move on to next link excerpt and try there
		}

		// couldn't find any matching signature
		return false;
	}

	/**
	 * Find the last link beginning with a given prefix on a line.
	 *
	 * @param $line string The line to search.
	 * @param $linkPrefix string The prefix to search for.
	 * @param $failureOffset bool
	 * @return bool false for failure, array for success.
	 * - First element is the string offset of the link.
	 * - Second element is the user the link refers to.
	 */
	static function getLinkFromLine( $line, $linkPrefix, $failureOffset = false ) {
		$offset = 0;

		// If extraction failed at another offset, try again.
		if ( $failureOffset !== false ) {
			$offset = $failureOffset - strlen( $line ) - 1;
		}

		// Avoid PHP warning: Offset is greater than the length of haystack string
		if ( abs( $offset ) > strlen( $line ) ) {
			return false;
		}

		$linkPos = strripos( $line, $linkPrefix, $offset );

		if ( $linkPos === false ) {
			// print "I\tNo match for $linkPrefix\n";
			return false;
		}

		$linkUser = self::extractUserFromLink( $line, $linkPrefix, $linkPos );

		if ( $linkUser === false ) {
			// print "E\tExtraction failed\t$linkPrefix\n";
			// Look for another place.
			return self::getLinkFromLine( $line, $linkPrefix, $linkPos );
		} else {
			return array( $linkPos, $linkUser );
		}
	}

	/**
	 * Given text including a link, gives the user that that link refers to
	 *
	 * @param $text string The text to extract from.
	 * @param $prefix string The link prefix that was used to find the link.
	 * @param $offset int Optionally, the offset of the start of the link.
	 * @return bool|string Type description
	 */
	static function extractUserFromLink( $text, $prefix, $offset = 0 ) {
		$userPart = substr( $text, strlen( $prefix ) + $offset );

		$userMatches = array();
		if ( !preg_match(
			'/^[^\|\]\#]+/u',
			$userPart,
			$userMatches
		) ) {
			// user link is invalid
			// print "I\tUser link invalid\t$userPart\n";
			// print "E\tCannot find user info to extract\n";
			return false;
		}

		$user = $userMatches[0];

		if (
			!User::isIP( $user ) &&
			User::getCanonicalName( $user ) === false
		) {
			// Not a real username
			// print "E\tInvalid username\n";
			return false;
		}

		return User::getCanonicalName( $userMatches[0], false );
	}

	/**
	 * Gets a regular expression fragmentmatching characters that
	 * can appear in a line after the signature.
	 *
	 * @return String regular expression fragment.
	 */
	static function getLineEndingRegex() {
		$ignoredEndings = array(
			'\s*',
			preg_quote( '}' ),
			preg_quote( '{' ),
			'\<[^\>]+\>',
			preg_quote( '{{' ) . '[^}]+' . preg_quote( '}}' ),
		);

		$regex = '(?:' . implode( '|', $ignoredEndings ) . ')*';

		return $regex;
	}

	/**
	 * Gets a regular expression that will match this wiki's
	 * timestamps as given by ~~~~.
	 *
	 * @throws MWException
	 * @return String regular expression fragment.
	 */
	static function getTimestampRegex() {
		if ( self::$timestampRegex !== null ) {
			return self::$timestampRegex;
		}

		// Step 1: Get an exemplar timestamp
		$title = Title::newMainPage();
		$user = User::newFromName( 'Test' );
		$options = new ParserOptions;

		global $wgParser;
		$exemplarTimestamp =
			$wgParser->preSaveTransform( '~~~~~', $title, $user, $options );

		// Step 2: Generalise it
		// Trim off the timezone to replace at the end
		$output = $exemplarTimestamp;
		$tzRegex = '/\s*\(\w+\)\s*$/';
		$tzMatches = array();
		if ( preg_match( $tzRegex, $output, $tzMatches ) ) {
			$output = preg_replace( $tzRegex, '', $output );
		}
		$output = preg_quote( $output, '/' );
		$output = preg_replace( '/[^\d\W]+/u', '[^\d\W]+', $output );
		$output = preg_replace( '/\d+/u', '\d+', $output );

		if ( $tzMatches ) {
			$output .= preg_quote( $tzMatches[0] );
		}

		if ( !preg_match( "/$output/u", $exemplarTimestamp ) ) {
			throw new MWException( "Timestamp regex does not match exemplar" );
		}

		self::$timestampRegex = $output;

		return $output;
	}

	/**
	 * Parse wikitext into truncated plain text.
	 * @param $text string
	 * @param Language $lang
	 * @param $length int default 150
	 * @return string
	 */
	static function getTextSnippet( $text, Language $lang, $length = 150 ) {
		// Parse wikitext
		$html = MessageCache::singleton()->parse( $text )->getText();
		// Remove HTML tags and decode HTML entities
		$plaintext = trim( html_entity_decode( strip_tags( $html ), ENT_QUOTES ) );
		return $lang->truncate( $plaintext, $length );
	}

	/**
	 * Parse an edit summary into truncated plain text.
	 * @param $text string
	 * @param Language $lang
	 * @param $length int default 150
	 * @return string
	 */
	static function getTextSnippetFromSummary( $text, Language $lang, $length = 150 ) {
		// Parse wikitext with summary parser
		$html = Linker::formatLinksInComment( Sanitizer::escapeHtmlAllowEntities( $text ) );
		// Remove HTML tags and decode HTML entities
		$plaintext = trim( html_entity_decode( strip_tags( $html ), ENT_QUOTES ) );
		return $lang->truncate( $plaintext, $length );
	}
}
