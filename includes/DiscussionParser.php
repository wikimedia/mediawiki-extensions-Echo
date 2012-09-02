<?php

abstract class EchoDiscussionParser {
	static $timestampRegex;
	static $headerRegex = '^\=\=\s*([^=].*)\s*\=\=$';
	static $revisionInterpretationCache = array();

	/**
	 * Given a Revision object, generates EchoEvent objects for
	 * the discussion-related actions that occurred in that Revision.
	 *
	 * @param $revision Revision object
	 * @return null
	 */
	static function generateEventsForRevision( $revision ) {
		$interpretation = self::getChangeInterpretationForRevision( $revision );
		$createdEvents = false;
		$title = Title::newFromID( $revision->getPage() );

		$userID = $revision->getUser();
		$userName = $revision->getUserText();
		$user = $userID != 0 ? User::newFromId( $userID ) : User::newFromName( $userName, false );

		foreach ( $interpretation as $action ) {
			if ( $action['type'] == 'add-comment' ) {
				$fullSection = $action['full-section'];
				$header = self::extractHeader( $fullSection );

				EchoEvent::create( array(
					'type' => 'add-comment',
					'title' => $title,
					'extra' => array(
						'revid' => $revision->getID(),
						'section-title' => $header,
						'content' => $action['content'],
					),
					'agent' => $user,
				) );
				$createdEvents = true;
			} elseif ( $action['type'] == 'new-section-with-comment' ) {
				$content = $action['content'];
				$header = self::extractHeader( $content );
				EchoEvent::create( array(
					'type' => 'add-talkpage-topic',
					'title' => $title,
					'extra' => array(
						'revid' => $revision->getID(),
						'section-title' => $header,
						'content' => $content,
					),
					'agent' => $user,
				) );
				$createdEvents = true;
			}
		}

		if ( !$createdEvents && $title->getNamespace() == NS_USER_TALK ) {
			$notifyUser = User::newFromName( $title->getText() );
			if ( $notifyUser && $notifyUser->getID() ) {
				EchoEvent::create( array(
					'type' => 'edit-user-talk',
					'title' => $title,
					'extra' => array( 'revid' => $revision->getID() ),
					'agent' => $user,
				) );
			}
		}
	}

	/**
	 * Given a Revision object, determines which users are interested
	 * in related EchoEvents.
	 *
	 * @param $revision Revision object.
	 * @return Array of User objects
	 */
	static function getNotifiedUsersForComment( $revision ) {
		$interpretation = self::getChangeInterpretationForRevision( $revision );
		$users = array();

		foreach ( $interpretation as $action ) {
			if ( $action['type'] == 'add-comment' ) {
				$fullSection = $action['full-section'];
				$interestedUsers = array_keys( self::extractSignatures( $fullSection ) );

				foreach ( $interestedUsers as $userName ) {
					$user = User::newFromName( $userName );

					// Deliberately ignoring anonymous users
					if ( $user && $user->getID() ) {
						$users[$user->getID()] = $user;
					}
				}
			}
		}

		if ( $revision->getTitle()->getNamespace() == NS_USER_TALK ) {
			$userName = $revision->getTitle()->getText();
			$user = User::newFromName( $userName );

			if ( $user ) {
				$users[$user->getID()] = $user;
			}
		}

		return $users;
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
		$output = self::interpretDiff( $changes, $user->getName() );

		self::$revisionInterpretationCache[$revision->getID()] = $output;
		return $output;
	}

	/**
	 * Given a machine-readable diff, interprets the changes
	 * in terms of discussion page actions
	 *
	 * @todo Expand recognisable actions.
	 * @param $changes array Output of EchoEvent::getMachineReadableDiff
	 * @param $user User name
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
	static function interpretDiff( $changes, $user ) {
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
				$startSection = preg_match( "/\A" . self::$headerRegex . '/um', $content );
				$sectionCount = self::getSectionCount( $content );
				$signedUsers = array_keys( self::extractSignatures( $content ) );

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
		$headerRegex = '/' . self::$headerRegex . '/um';

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

		return $content;
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
		preg_match_all( '/' . self::$headerRegex . '/um', $text, $matches );

		return count( $matches[0] );
	}

	/**
	 * Gets the title of a section
	 *
	 * @param $text string The text of the section.
	 * @return string The title of the section.
	 */
	static function extractHeader( $text ) {
		$text = trim( $text );

		$matches = array();

		if ( !preg_match( '/' . self::$headerRegex . '/um', $text, $matches ) ) {
			return false;
		}

		return trim( $matches[1] );
	}

	/**
	 * Strips out a signature if possible.
	 *
	 * @param $text string The wikitext to strip
	 * @return string
	 */
	static function stripSignature( $text ) {
		$timestampPos = self::getTimestampPosition( $text );

		if ( $timestampPos === false ) {
			return $text;
		}

		$output = self::getUserFromLine( $text, $timestampPos );

		if ( $output === false ) {
			return substr( $text, 0, $timestampPos );
		}

		// Strip off signature with HTML truncation method.
		// This way tags which are opened will be closed.
		global $wgContLang;
		$truncated_text = $wgContLang->truncateHtml( $text, $output[0], '' );

		return $truncated_text;
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
		$text = preg_replace( '/' . self::$headerRegex . '/um', '', $text );

		return $text;
	}

	/**
	 * Determines whether the input is a signed comment.
	 *
	 * @param $text string The text to check.
	 * @param $user User|bool If set, will only return true if the comment is
	 *  signed by this user.
	 * @return bool: true or false.
	 */
	static function isSignedComment( $text, $user = false ) {
		$timestampPos = self::getTimestampPosition( $text );

		if ( $timestampPos === false ) {
			return false;
		}

		$userData = self::getUserFromLine( $text, $timestampPos );

		if ( $userData === false ) {
			return false;
		} elseif ( $user === false ) {
			return true;
		}

		list( $signaturePos, $foundUser ) = $userData;

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

		return $tsMatches[0][0];
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
		$oldText = trim( $oldText ) . "\n";
		$newText = trim( $newText ) . "\n";
		$diff = wfDiff( $oldText, $newText, '-u -w' );

		$old_lines = explode( "\n", $oldText );
		$new_lines = explode( "\n", $newText );

		// First break down the diff into additions and subtractions
		$diff_lines = explode( "\n", $diff );
		$left_pos = 0;
		$right_pos = 0;
		$changes = array();
		$change_run = false;
		$sub_lines = 0;

		for ( $i = 0; $i < count( $diff_lines ); ++$i ) {
			$line = $diff_lines[$i];

			if ( strlen( $line ) == 0 ) {
				continue;
			}

			$line_type = $line[0];

			if ( $line_type == ' ' ) {
				++$left_pos;
				++$right_pos;
			} elseif ( $line_type == '@' ) {
				list( $at, $lhs_pos, $rhs_pos, $at ) = explode( ' ', $line );
				$lhs_pos = substr( $lhs_pos, 1 );
				$rhs_pos = substr( $rhs_pos, 1 );
				list( $left_pos ) = explode( ',', $lhs_pos );
				list( $right_pos ) = explode( ',', $rhs_pos );
				$change_run = false;
			} elseif ( $line_type == '-' ) {
				$subtracted_line = substr( $line, 1 );

				if ( trim( $subtracted_line ) === '' ) {
					++$left_pos;
					continue;
				}

				if ( $change_run && $changes[$change_run]['action'] == 'subtract' ) {
					++$sub_lines;
					$changes[$change_run]['content'] .= "\n" . $subtracted_line;
				} else {
					$sub_lines = 1;
					$changes[] = array(
						'action' => 'subtract',
						'left-pos' => $left_pos,
						'right-pos' => $right_pos,
						'content' => $subtracted_line,
					);
					$change_run = count( $changes ) - 1;
				}

				// Consistency check
				if ( $old_lines[$left_pos - 1] != $subtracted_line ) {
					throw new MWException( "Left offset consistency error.\nOffset: $right_pos\nExpected: {$old_lines[$left_pos-1]}\nActual: $subtracted_line" );
				}
				++$left_pos;
			} elseif ( $line_type == '+' ) {
				$added_line = substr( $line, 1 );

				if ( $change_run !== false && $changes[$change_run]['action'] == 'add' ) {
					$changes[$change_run]['content'] .= "\n" . $added_line;
				} elseif ( $change_run !== false && $changes[$change_run]['action'] == 'subtract' ) {
					$changes[$change_run]['action'] = 'change';
					$changes[$change_run]['old_content'] = $changes[$change_run]['content'];
					$changes[$change_run]['new_content'] = $added_line;
					--$sub_lines;
					unset( $changes[$change_run]['content'] );
				} elseif ( $change_run !== false && $changes[$change_run]['action'] == 'change' && $sub_lines > 0 ) {
					--$sub_lines;
					$changes[$change_run]['new_content'] .= "\n" . $added_line;
				} else {
					$changes[] = array(
						'action' => 'add',
						'left-pos' => $left_pos,
						'right-pos' => $right_pos,
						'content' => $added_line,
					);
					$change_run = count( $changes ) - 1;
				}

				// Consistency check
				if ( $new_lines[$right_pos - 1] != $added_line ) {
					throw new MWException( "Right offset consistency error.\nOffset: $right_pos\nExpected: {$new_lines[$right_pos-1]}\nActual: $added_line\n" );
				}
				++$right_pos;
			}
		}

		$changes['_info'] = array(
			'lhs-length' => count( $old_lines ),
			'rhs-length' => count( $new_lines ),
			'lhs' => $old_lines,
			'rhs' => $new_lines,
		);

		return $changes;
	}

	/**
	 * Finds and extracts signatures in $text
	 *
	 * @param $text string The text in which to look for signed comments.
	 * @return array. Associative array, the key is the username, the value
	 *  is the last signature that was found.
	 */
	static function extractSignatures( $text ) {
		$lines = explode( "\n", $text );
		$timestampRegex = self::getTimestampRegex();
		$endOfLine = self::getLineEndingRegex();

		$output = array();

		$lineNumber = 0;

		foreach ( $lines as $line ) {
			++$lineNumber;
			$tsMatches = array();
			if ( !preg_match(
				"/$timestampRegex$endOfLine/mu",
				$line,
				$tsMatches,
				PREG_OFFSET_CAPTURE
			) ) {
				// Ignore lines that don't finish with a timestamp
				// print "I\tNo timestamp\n";
				// print "$line\n";
				continue;
			}

			// Now that we know we have a timestamp, look for
			// the last user link on the line.
			$userData = self::getUserFromLine( $line, $tsMatches[0][0] );
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
	 * From a line in a wiki page, determine which user, if any,
	 *  has signed it.
	 *
	 * @param $line string The line.
	 * @param $timestampPos int The offset of the start of the timestamp.
	 * @return bool|array false for none, Array for success.
	 * - First element is the position of the signature.
	 * - Second element is the normalised user name.
	 */
	static function getUserFromLine( $line, $timestampPos ) {
		global $wgContLang;
		$possiblePrefixes = array( // Later entries have a higher precedence
			'[[' . $wgContLang->getNsText( NS_USER ) . ':',
			'[[' . $wgContLang->getNsText( NS_USER_TALK ) . ':',
			'[[' . SpecialPage::getTitleFor( 'Contributions' )->getPrefixedText() . '/',
		);

		foreach ( $possiblePrefixes as $prefix ) {
			if ( strpos( $prefix, '_' ) !== false ) {
				$possiblePrefixes[] = str_replace( '_', ' ', $prefix );
			}
		}

		$winningUser = false;
		$winningPos = false;

		// Look for the leftmost link to the rightmost user
		foreach ( $possiblePrefixes as $prefix ) {
			$output = self::getLinkFromLine( $line, $prefix );

			if ( $output === false ) {
				continue;
			} else {
				list( $pos, $user ) = $output;
			}

			// Couldn't be a signature
			if ( ( $timestampPos - $pos ) > 255 ) {
				continue;
			}

			if (
				$winningPos === false ||
				( $pos > $winningPos && $user !== $winningUser ) ||
				(
					$pos < $winningPos &&
					$user === $winningUser
				)
			) {
				$winningPos = $pos;
				$winningUser = ucfirst( trim( $user ) );
			}
		}

		if ( $winningUser === false ) {
			// print "E\tNo winning user\n";
			return false;
		}

		return array( $winningPos, $winningUser );
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
		preg_match( $tzRegex, $output, $tzMatches );
		$output = preg_replace( $tzRegex, '', $output );
		$output = preg_quote( $output, '/' );
		$output = preg_replace( '/[^\d\W]+/u', '[^\d\W]+', $output );
		$output = preg_replace( '/\d+/u', '\d+', $output );

		$output .= preg_quote( $tzMatches[0] );

		if ( !preg_match( "/$output/u", $exemplarTimestamp ) ) {
			throw new MWException( "Timestamp regex does not match exemplar" );
		}

		self::$timestampRegex = $output;

		return $output;
	}
}
