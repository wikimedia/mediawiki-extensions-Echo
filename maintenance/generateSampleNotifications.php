<?php

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = __DIR__ . '/../../..';
}
require_once "$IP/maintenance/Maintenance.php";

/**
 * A maintenance script that generates sample notifications for testing purposes.
 */
class GenerateSampleNotifications extends Maintenance {

	private $supportedNotificationTypes = [
		'welcome',
		'edit-user-talk',
		'mention',
		'page-linked',
		'reverted',
		'email',
		'user-rights',
		'cx',
		'osm',
		'edit-thanks',
		'edu',
		'page-connection',
	];

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

		$this->requireExtension( 'Echo' );
	}

	public function execute() {
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

		if ( $this->shouldGenerate( 'edit-thanks', $types ) ) {
			$this->generateEditThanks( $user, $agent, $otherUser );
		}

		if ( $this->shouldGenerate( 'edu', $types ) ) {
			$this->generateEducationProgram( $user, $agent );
		}

		if ( $this->shouldGenerate( 'page-connection', $types ) ) {
			$this->generateWikibase( $user, $agent );
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

		return $status->getValue()['revision'];
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
		$agent->addGroup( 'sysop' );

		// revert (undo)
		$moai = Title::newFromText( 'Moai' );
		$page = WikiPage::factory( $moai );
		$this->output( "{$agent->getName()} is reverting {$user->getName()}'s edit on {$moai->getPrefixedText()}\n" );
		$this->addToPageContent( $moai, $agent, "\ncreating a good revision here\n" );
		$this->addToPageContent( $moai, $user, "\nadding a line here\n" );
		$content = $page->getUndoContent( $page->getRevision(), $page->getRevision()->getPrevious() );
		$status = $page->doEditContent( $content, 'undo', 0, false, $agent, null, [], $page->getRevision()->getId() );
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
		$details = [];
		$token = $agent->getEditToken( 'rollback', null );
		$errors = $page->doRollback( $user->getName(), 'generating reverted notification', $token, false, $details, $agent );
		if ( $errors ) {
			$this->error( serialize( $errors ) );
		}
	}

	private function generateWelcome( User $user ) {
		$this->output( "Welcoming {$user->getName()}\n" );
		EchoEvent::create( [
			'type' => 'welcome',
			'agent' => $user,
			'extra' => [
				'notifyAgent' => true
			]
		] );
	}

	private function generateEmail( User $user, User $agent ) {
		$this->output( "{$agent->getName()} is emailing {$user->getName()}\n" );
		EchoEvent::create( [
			'type' => 'emailuser',
			'extra' => [
				'to-user-id' => $user->getId(),
				'subject' => 'Long time no see',
			],
			'agent' => $agent,
		] );
	}

	private function generateUserRights( User $user, User $agent ) {
		$this->output( "{$agent->getName()} is changing {$user->getName()}'s rights\n" );
		$this->createUserRightsNotification( $user, $agent, [ 'OnlyAdd-1' ], null );
		$this->createUserRightsNotification( $user, $agent, null, [ 'JustRemove-1', 'JustRemove-2' ] );
		$this->createUserRightsNotification( $user, $agent, [ 'Add-1', 'Add-2' ], [ 'Remove-1', 'Remove-2' ] );
	}

	private function createUserRightsNotification( User $user, User $agent, $add, $remove ) {
		EchoEvent::create(
			[
				'type' => 'user-rights',
				'extra' => [
					'user' => $user->getID(),
					'add' => $add,
					'remove' => $remove,
					'reason' => 'This is the [[reason]] for changing your user rights.',
				],
				'agent' => $agent,
			]
		);
	}

	private function generateContentTranslation( User $user ) {
		if ( !ExtensionRegistry::getInstance()->isLoaded( 'ContentTranslation' ) ) {
			return;
		}

		$this->output( "Generating CX notifications\n" );
		foreach ( [ 'cx-first-translation', 'cx-tenth-translation', 'cx-hundredth-translation' ] as $eventType ) {
			EchoEvent::create(
				[
					'type' => $eventType,
					'extra' => [
						'recipient' => $user->getId(),
					],
				]
			);
		}

		EchoEvent::create(
			[
				'type' => 'cx-suggestions-available',
				'extra' => [
					'recipient' => $user->getId(),
					'lastTranslationTitle' => 'History of the People\'s Republic of China'
				],
			]
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

		foreach ( [ 'build-completed', 'reboot-completed', 'deleted' ] as $action ) {
			EchoEvent::create( [
				'type' => "osm-instance-$action",
				'title' => Title::newFromText( "Moai" ),
				'agent' => $user,
				'extra' => [
					'instanceName' => 'instance1',
					'projectName' => 'TheProject',
					'notifyAgent' => true,
				]
			] );
		}

		EchoEvent::create( [
			'type' => 'osm-projectmembers-add',
			'title' => Title::newFromText( "Moai" ),
			'agent' => $agent,
			'extra' => [ 'userAdded' => $user->getId() ],
		] );
	}

	private function shouldGenerate( $type, $types ) {
		return array_search( $type, $types ) !== false;
	}

	private function generateEditThanks( User $user, User $agent, User $otherUser ) {
		$this->generateOneEditThanks( $user, $agent );
		$this->generateMultipleEditThanks( $user, $agent, $otherUser );
	}

	private function generateOneEditThanks( User $user, User $agent ) {
		if ( !ExtensionRegistry::getInstance()->isLoaded( 'Thanks' ) ) {
			return;
		}
		// make an edit, thank it once
		$title = $this->generateNewPageTitle();
		$revision = $this->addToPageContent( $title, $user, "an awesome edit! ~~~~" );
		EchoEvent::create( [
			'type' => 'edit-thank',
			'title' => $title,
			'extra' => [
				'revid' => $revision->getId(),
				'thanked-user-id' => $user->getId(),
				'source' => 'generateSampleNotifications.php',
			],
			'agent' => $agent,
		] );
		$this->output( "{$agent->getName()} is thanking {$user->getName()} for edit {$revision->getId()} on {$title->getPrefixedText()}\n" );
	}
	private function generateMultipleEditThanks( User $user, User $agent, User $otherUser ) {
		if ( !ExtensionRegistry::getInstance()->isLoaded( 'Thanks' ) ) {
			return;
		}
		// make an edit, thank it twice
		$title = $this->generateNewPageTitle();
		$revision = $this->addToPageContent( $title, $user, "an even better edit! ~~~~" );
		EchoEvent::create( [
			'type' => 'edit-thank',
			'title' => $title,
			'extra' => [
				'revid' => $revision->getId(),
				'thanked-user-id' => $user->getId(),
				'source' => 'generateSampleNotifications.php',
			],
			'agent' => $agent,
		] );
		EchoEvent::create( [
			'type' => 'edit-thank',
			'title' => $title,
			'extra' => [
				'revid' => $revision->getId(),
				'thanked-user-id' => $user->getId(),
				'source' => 'generateSampleNotifications.php',
			],
			'agent' => $otherUser,
		] );
		$this->output( "{$agent->getName()} and {$otherUser->getName()} are thanking {$user->getName()} for edit {$revision->getId()} on {$title->getPrefixedText()}\n" );
	}

	private function generateEducationProgram( User $user, User $agent ) {
		if ( !class_exists( 'EducationProgram\Extension' ) ) {
			$this->output( 'class EducationProgram\Extension not found' );
			return;
		}

		$chem101 = Title::newFromText( 'School/Chemistry101' );
		if ( !$chem101->exists() ) {
			$this->addToPageContent( $chem101, $agent, "\nThis is the main page for the Chemistry 101 course\n" );
		}

		$notificationManager = EducationProgram\Extension::globalInstance()->getNotificationsManager();

		$this->output( "{$agent->getName()} is adding {$user->getName()} to {$chem101->getPrefixedText()} as instructor, student, campus volunteer and online volunteer.\n" );

		$types = [
			'ep-instructor-add-notification',
			'ep-online-add-notification',
			'ep-campus-add-notification',
			'ep-student-add-notification',
		];
		foreach ( $types as $type ) {
			$notificationManager->trigger(
				$type,
				[
					'role-add-title' => $chem101,
					'agent' => $agent,
					'users' => [ $user->getId() ],
				]
			);
		}

		// NOTE: Not generating 'ep-course-talk-notification' for now
		// as it requires a full setup to actually work (institution, course, instructors, students).
	}

	private function generateWikibase( User $user, User $agent ) {
		if ( !class_exists( 'Wikibase\Client\Hooks\EchoNotificationsHandlers' ) ) {
			$this->output( 'class Wikibase\Client\Hooks\EchoNotificationsHandlers not found' );
			return;
		}

		$title = $this->generateNewPageTitle();
		$this->addToPageContent( $title, $user, "this is a new page" );
		$helpPage = Title::newFromText( 'Project:Wikidata' );
		$this->addToPageContent( $helpPage, $user, "this is the help page" );

		$this->output( "{$agent->getName()} is connecting {$user->getName()}'s page {$title->getPrefixedText()} to an item\n" );
		EchoEvent::create( [
			'type' => Wikibase\Client\Hooks\EchoNotificationsHandlers::NOTIFICATION_TYPE,
			'title' => $title,
			'extra' => [
				'url' => Title::newFromText( 'Item:Q1' )->getFullURL(),
				'repoSiteName' => 'Wikidata'
			],
			'agent' => $agent,
		] );
	}
}

$maintClass = "GenerateSampleNotifications";
require_once RUN_MAINTENANCE_IF_MAIN;
