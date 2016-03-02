<?php

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = __DIR__ . '/../../..';
}
require_once ( "$IP/maintenance/Maintenance.php" );

/**
 * A maintenance script that generates sample notifications for testing purposes.
 */
class GenerateSampleNotifications extends Maintenance {

	private $supportedNotificationTypes = array(
		'welcome',
		'edit-user-talk',
		'mention',
		'page-linked',
		'reverted',
		'email',
		'user-rights',
		'cx',
		'osm',
	);

	public function __construct() {
		parent::__construct();
		$this->mDescription = "Generate sample notifications";

		$this->addOption(
			'force',
			'Bypass confirmation',
			false, false, 'f' );

		$allTypes = implode( ',', $this->supportedNotificationTypes );
		$this->addOption(
			'types',
			"Comma-separated list of notification types to generate ($allTypes)",
			false, true, 't' );

		$this->addOption(
			'user',
			'Name of the user receiving the notifications',
			true, true, 'u' );

		$this->addOption(
			'agent',
			'Name of the user creating the notifications',
			true, true, 'a' );

		$this->addOption(
			'other',
			'Name of another user involved with the notifications',
			true, true, 'o' );
	}

	public function execute() {
		if ( !class_exists( 'EchoHooks' ) ) {
			$this->error( "Echo isn't enabled on this wiki\n", 1 );
		}

		$user = $this->getOptionUser( 'user' );
		$agent = $this->getOptionUser( 'agent' );
		$otherUser = $this->getOptionUser( 'other' );
		$title = Title::newFromText( 'This is a pretty long page title lets see if it is going to be truncated' );

		$types = $this->getOption( 'types' );
		if ( $types ) {
			$types = explode( ',', $types );
		} else {
			$types = $this->supportedNotificationTypes;
		}

		$this->confirm();

		$this->output( "Started processing...\n" );

		if ( $this->shouldGenerate( 'welcome', $types ) ) {
			$this->generateWelcome( $user );
		}

		if ( $this->shouldGenerate( 'edit-user-talk', $types ) ) {
			$this->generateEditUserTalk( $user, $agent );
		}

		if ( $this->shouldGenerate( 'mention', $types ) ) {
			$this->generateMention( $user, $agent, $otherUser, $title );
		}

		if ( $this->shouldGenerate( 'page-linked', $types ) ) {
			$this->generatePageLink( $user, $agent );
		}

		if ( $this->shouldGenerate( 'reverted', $types ) ) {
			$this->generateReverted( $user, $agent );
		}

		if ( $this->shouldGenerate( 'email', $types ) ) {
			$this->generateEmail( $user, $agent );
		}

		if ( $this->shouldGenerate( 'user-rights', $types ) ) {
			$this->generateUserRights( $user, $agent );
		}

		if ( $this->shouldGenerate( 'cx', $types ) ) {
			$this->generateContentTranslation( $user );
		}

		if ( $this->shouldGenerate( 'osm', $types ) ) {
			$this->generateOpenStackManager( $user, $agent );
		}

		$this->output( "Completed \n" );
	}

	private function generateEditUserTalk( User $user, User $agent ) {
		$this->output( "{$agent->getName()} is writing on {$user->getName()}'s user talk page\n" );
		$editId = $this->generateRandomString();
		$section = "== section $editId ==\n\nthis is the text $editId\n\n~~~~\n\n";
		$this->addToUserTalk( $user, $agent, $section );
	}

	private function getOptionUser( $optionName ) {
		$username = $this->getOption( $optionName );
		$user = User::newFromName( $username );
		if ( $user->isAnon() ) {
			$this->error( "User $username does not seem to exist in this wiki", 1 );
		}
		return $user;
	}

	private function generateRandomString( $length = 10 ) {
		return substr( str_shuffle( "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ), 0, $length );
	}

	protected function confirm() {
		if ( $this->getOption( 'force', false ) ) {
			return;
		}
		$this->output( "===   WARNING   ===\n" );
		$this->output( "This script modifies the content of several pages,\n" );
		$this->output( "including user's talk pages.\n" );
		$this->output( "ONLY RUN ON TEST WIKIS\n" );
		$this->output( "Enter 'yes' if you wish to continue or any other key to exit\n" );
		$confirm = $this->readconsole();
		if ( $confirm !== 'yes' ) {
			$this->error( 'Safe decision', 1 );
		}
	}

	private function addToUserTalk( User $user, User $agent, $contentText ) {
		$this->addToPageContent( $user->getTalkPage(), $agent, $contentText );
	}

	private function addToPageContent( Title $title, User $agent, $contentText ) {
		$page = WikiPage::factory( $title );
		$previousContent = "";
		$page->loadPageData( 'fromdbmaster' );
		$revision = $page->getRevision();
		if ( $revision ) {
			$content = $revision->getContent( Revision::FOR_PUBLIC );
			if ( $content instanceof WikitextContent ) {
				$previousContent = $content->getNativeData();
			}
		}
		$status = $page->doEditContent(
			new WikitextContent( $contentText . $previousContent ),
			'generating sample notifications',
			0,
			false,
			$agent
		);

		if ( !$status->isGood() ) {
			$this->error( "Failed to edit {$title->getPrefixedText()}: {$status->getMessage()}" );
		}
	}

	private function generateMention( User $user, User $agent, User $otherUser, Title $title ) {
		$mention = "== section {$this->generateRandomString()} ==\nHello [[User:{$user->getName()}]] \n~~~~\n";

		// article talk
		$this->output( "{$agent->getName()} is mentioning {$user->getName()} on {$title->getTalkPage()->getPrefixedText()}\n" );
		$this->addToPageContent( $title->getTalkPage(), $agent, $mention );

		// agent tak
		$this->output( "{$agent->getName()} is mentioning {$user->getName()} on {$agent->getTalkPage()->getPrefixedText()}\n" );
		$this->addToPageContent( $agent->getTalkPage(), $agent, $mention );

		// user talk
		$this->output( "{$agent->getName()} is mentioning {$user->getName()} on {$otherUser->getTalkPage()->getPrefixedText()}\n" );
		$this->addToPageContent( $otherUser->getTalkPage(), $agent, $mention );

		// any other page
		$this->output( "{$agent->getName()} is mentioning {$user->getName()} on {$title->getPrefixedText()}\n" );
		$this->addToPageContent( $title, $agent, $mention );
	}

	private function generatePageLink( User $user, User $agent ) {
		$this->generateOnePageLink( $user, $agent );
		$this->generateMultiplePageLinks( $user, $agent );
	}

	private function generateNewPageTitle() {
		return Title::newFromText( $this->generateRandomString() );
	}

	private function generateReverted( User $user, User $agent ) {
		global $wgRequest;
		$agent->addGroup( 'sysop' );

		// revert (undo)
		$moai = Title::newFromText( 'Moai' );
		$page = WikiPage::factory( $moai );
		$this->output( "{$agent->getName()} is reverting {$user->getName()}'s edit on {$moai->getPrefixedText()}\n" );
		$this->addToPageContent( $moai, $agent, "\ncreating a good revision here\n" );
		$this->addToPageContent( $moai, $user, "\nadding a line here\n" );
		// hack: EchoHooks::onArticleSaved depends on the request to know which revision is being reverted
		$wgRequest->setVal( 'wpUndidRevision', $page->getRevision()->getId() );
		$content = $page->getUndoContent( $page->getRevision(), $page->getRevision()->getPrevious() );
		$status = $page->doEditContent( $content, 'undo', 0, false, $agent );
		if ( !$status->isGood() ) {
			$this->error( "Failed to undo {$moai->getPrefixedText()}: {$status->getMessage()}" );
		}

		// rollback
		$moai2 = Title::newFromText( 'Moai2' );
		$page = WikiPage::factory( $moai2 );
		$this->output( "{$agent->getName()} is rolling back {$user->getName()}'s edits on {$moai2->getPrefixedText()}\n" );
		$this->addToPageContent( $moai2, $agent, "\ncreating a good revision here\n" );
		$this->addToPageContent( $moai2, $user, "\nadding a line here\n" );
		$this->addToPageContent( $moai2, $user, "\nadding a line here\n" );
		$details = array();
		$token = $agent->getEditToken( array( $moai2->getPrefixedText(), $user->getName() ), null );
		$errors = $page->doRollback( $user->getName(), 'generating reverted notification', $token, false, $details, $agent );
		if ( $errors ) {
			$errorAsString = serialize( $errors );
			$this->error( $errorAsString );
		}
	}

	private function generateWelcome( User $user ) {
		$this->output( "Welcoming {$user->getName()}\n" );
		EchoEvent::create( array(
			'type' => 'welcome',
			'agent' => $user,
			'extra' => array(
				'notifyAgent' => true
			)
		) );
	}

	private function generateEmail( User $user, User $agent ) {
		$this->output( "{$agent->getName()} is emailing {$user->getName()}\n" );
		EchoEvent::create( array(
			'type' => 'emailuser',
			'extra' => array(
				'to-user-id' => $user->getId(),
				'subject' => 'Long time no see',
			),
			'agent' => $agent,
		) );
	}

	private function generateUserRights( User $user, User $agent ) {
		$this->output( "{$agent->getName()} is changing {$user->getName()}'s rights\n" );
		$this->createUserRightsNotification( $user, $agent, array( 'OnlyAdd-1' ), null );
		$this->createUserRightsNotification( $user, $agent, null, array( 'JustRemove-1', 'JustRemove-2' ) );
		$this->createUserRightsNotification( $user, $agent, array( 'Add-1', 'Add-2' ), array( 'Remove-1', 'Remove-2' ) );
	}

	private function createUserRightsNotification( User $user, User $agent, $add, $remove ) {
		EchoEvent::create(
			array(
				'type' => 'user-rights',
				'title' => Title::newMainPage(),
				'extra' => array(
					'user' => $user->getID(),
					'add' => $add,
					'remove' => $remove,
				),
				'agent' => $agent,
			)
		);
	}

	private function generateContentTranslation( User $user ) {
		if ( !class_exists( 'ContentTranslationHooks' ) ) {
			return;
		}

		$this->output( "Generating CX notifications\n" );
		foreach ( array( 'cx-first-translation', 'cx-tenth-translation', 'cx-hundredth-translation' ) as $eventType ) {
			EchoEvent::create(
				array(
					'type' => $eventType,
					'extra' => array(
						'recipient' => $user->getId(),
					),
				)
			);
		}

		EchoEvent::create(
			array(
				'type' => 'cx-suggestions-available',
				'extra' => array(
					'recipient' => $user->getId(),
					'lastTranslationTitle' => 'History of the People\'s Republic of China'
				),
			)
		);
	}

	private function generateOnePageLink( User $user, User $agent ) {
		$pageBeingLinked = $this->generateNewPageTitle();
		$this->addToPageContent( $pageBeingLinked, $user, "this is a new page" );

		$pageLinking = $this->generateNewPageTitle();
		$content = "checkout [[{$pageBeingLinked->getPrefixedText()}]]!";
		$this->output( "{$agent->getName()} is linking to {$pageBeingLinked->getPrefixedText()} from {$pageLinking->getPrefixedText()}\n" );
		$this->addToPageContent( $pageLinking, $agent, $content );
	}

	private function generateMultiplePageLinks( User $user, User $agent ) {
		$pageBeingLinked = $this->generateNewPageTitle();
		$this->addToPageContent( $pageBeingLinked, $user, "this is a new page" );

		$content = "checkout [[{$pageBeingLinked->getPrefixedText()}]]!";
		$this->output( "{$agent->getName()} is linking to {$pageBeingLinked->getPrefixedText()} from multiple pages\n" );
		$this->addToPageContent( $this->generateNewPageTitle(), $agent, $content );
		$this->addToPageContent( $this->generateNewPageTitle(), $agent, $content );
		$this->addToPageContent( $this->generateNewPageTitle(), $agent, $content );
	}

	private function generateOpenStackManager( User $user, User $agent ) {
		if ( !class_exists( 'OpenStackManagerHooks' ) ) {
			return;
		}

		$this->output( "Generating OpenStackManager notifications\n" );

		foreach ( array( 'build-completed', 'reboot-completed', 'deleted' ) as $action ) {
			EchoEvent::create( array(
				'type' => "osm-instance-$action",
				'title' => Title::newFromText( "Moai" ),
				'agent' => $user,
				'extra' => array(
					'instanceName' => 'instance1',
					'projectName' => 'TheProject',
					'notifyAgent' => true,
				)
			) );
		}

		EchoEvent::create( array(
			'type' => 'osm-projectmembers-add',
			'title' => Title::newFromText( "Moai" ),
			'agent' => $agent,
			'extra' => array( 'userAdded' => $user->getId() ),
		) );
	}

	private function shouldGenerate( $type, $types ) {
		return array_search( $type, $types ) !== false;
	}
}

$maintClass = "GenerateSampleNotifications";
require_once ( DO_MAINTENANCE );
