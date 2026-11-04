<?php

namespace MediaWiki\Extension\Notifications\Test\Integration;

use MediaWiki\Extension\Notifications\Formatters\EchoEventPresentationModel;
use MediaWiki\Extension\Notifications\Mapper\NotificationMapper;
use MediaWikiIntegrationTestCase;
use Wikimedia\Message\MessageValue;

/**
 * @covers \MediaWiki\Extension\Notifications\EchoNotificationHandler
 * @group Database
 */
class MediaWikiSimpleEventIntegrationTest extends MediaWikiIntegrationTestCase {

	use EchoNotificationTestTrait;

	public function testEventCreated() {
		$this->clearHook( 'BeforeEchoEventInsert' );
		$this->overrideConfigValue( 'EchoUseJobQueue', false );

		// Send a MediaWiki "simple notification"
		$notificationService = $this->getServiceContainer()->getNotificationService();
		$notificationService->notifySimple(
			MessageValue::new( 'test', [ 'a', 'b' ] ),
			$this->getTestUser()->getUserIdentity()
		);

		$this->assertEventCount( 'mediawiki.simple', 1 );

		// Look up this event using Echo APIs
		$notifMapper = new NotificationMapper();
		$notifs = $notifMapper->fetchByUser( $this->getTestUser()->getUserIdentity(), 1, null, [ 'mediawiki.simple' ] );
		$notif = array_pop( $notifs );

		// Verify that the specified message is shown to the specified user, in the correct language
		$presModel = EchoEventPresentationModel::factory(
			$notif->getEvent(),
			$this->getServiceContainer()->getLanguageFactory()->getLanguage( 'qqx' ),
			$this->getTestUser()->getUser()
		);
		$this->assertEquals( '(test: a, b)', $presModel->getHeaderMessage()->parse() );
	}

}
