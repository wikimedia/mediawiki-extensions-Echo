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

	public function __construct() {
		parent::__construct();
		$this->mDescription = "Generate sample notifications";

		$this->addOption(
			"user",
			"Name of the user receiving the notifications",
			true, true, "u" );

		$this->addOption(
			"agent",
			"Name of the user creating the notifications",
			true, true, "a" );

		$this->addOption(
			"other",
			"Name of another user involved with the notifications",
			true, true, "o" );
	}

	public function execute() {
		if ( !class_exists( 'EchoHooks' ) ) {
			$this->error( "Echo isn't enabled on this wiki\n", 1 );
		}

		$user = $this->getOptionUser( 'user' );
		$agent = $this->getOptionUser( 'agent' );
		$otherUser = $this->getOptionUser( 'other' );

		$this->confirm();

		$this->output( "Started processing...\n" );

		$this->generateWelcome( $user );
		$this->generateEditUserTalk( $user, $agent );
		$this->generateMention( $user, $agent, $otherUser );
		$this->generatePageLink( $user, $agent );
		$this->generateReverted( $user, $agent );
		$this->generateEmail( $user, $agent );
		$this->generateUserRights( $user, $agent );
		$this->generateContentTranslation( $user );

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

	private function generateMention( User $user, User $agent, User $otherUser ) {
		$moai = Title::newFromText( 'Moai' );
		$mention = "== section {$this->generateRandomString()} ==\nHello [[User:{$user->getName()}]] \n~~~~\n";

		// article talk
		$this->output( "{$agent->getName()} is mentioning {$user->getName()} on {$moai->getTalkPage()->getPrefixedText()}\n" );
		$this->addToPageContent( $moai->getTalkPage(), $agent, $mention );

		// agent tak
		$this->output( "{$agent->getName()} is mentioning {$user->getName()} on {$agent->getTalkPage()->getPrefixedText()}\n" );
		$this->addToPageContent( $agent->getTalkPage(), $agent, $mention );

		// user talk
		$this->output( "{$agent->getName()} is mentioning {$user->getName()} on {$otherUser->getTalkPage()->getPrefixedText()}\n" );
		$this->addToPageContent( $otherUser->getTalkPage(), $agent, $mention );

		// any other page
		$this->output( "{$agent->getName()} is mentioning {$user->getName()} on {$moai->getPrefixedText()}\n" );
		$this->addToPageContent( $moai, $agent, $mention );
	}

	private function generatePageLink( User $user, User $agent ) {
		$pageBeingMentioned = $this->generateNewPageTitle();
		$this->addToPageContent( $pageBeingMentioned, $user, "this is a new page" );

		$pageMentioning = $this->generateNewPageTitle();
		$content = "checkout [[{$pageBeingMentioned->getPrefixedText()}]]!";
		$this->output( "{$agent->getName()} is linking to {$pageBeingMentioned->getPrefixedText()} from {$pageMentioning->getPrefixedText()}\n" );
		$this->addToPageContent( $pageMentioning, $agent, $content );
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
}

$maintClass = "GenerateSampleNotifications";
require_once ( DO_MAINTENANCE );
