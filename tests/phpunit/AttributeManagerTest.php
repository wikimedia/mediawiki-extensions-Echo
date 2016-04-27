<?php

class EchoAttributeManagerTest extends MediaWikiTestCase {

	public function testNewFromGlobalVars() {
		$this->assertInstanceOf( 'EchoAttributeManager', EchoAttributeManager::newFromGlobalVars() );
	}

	public static function getUserLocatorsProvider() {
		return array(
			array(
				'No errors when requesting unknown type',
				// expected result
				array(),
				// event type
				'foo',
				// notification configuration
				array(),
			),

			array(
				'Returns selected notification configuration',
				// expected result
				array( 'woot!' ),
				// event type
				'magic',
				// notification configuration
				array(
					'foo' => array(
						EchoAttributeManager::ATTR_LOCATORS => array( 'frown' ),
					),
					'magic' => array(
						EchoAttributeManager::ATTR_LOCATORS => array( 'woot!' ),
					),
				),
			),

			array(
				'Accepts user-locators as string and returns array',
				// expected result
				array( 'sagen' ),
				// event type
				'challah',
				// notification configuration
				array(
					'challah' => array(
						EchoAttributeManager::ATTR_LOCATORS => 'sagen',
					),
				),
			),
		);
	}

	/**
	 * @dataProvider getUserLocatorsProvider
	 */
	public function testGetUserLocators( $message, $expect, $type, $notifications ) {
		$manager = new EchoAttributeManager( $notifications, array(), array(), array(), array() );

		$result = $manager->getUserCallable( $type, EchoAttributeManager::ATTR_LOCATORS );
		$this->assertEquals( $expect, $result, $message );
	}

	public function testGetCategoryEligibility() {
		$notif = array(
			'event_one' => array(
				'category' => 'category_one'
			),
		);
		$category = array(
			'category_one' => array(
				'priority' => 10
			)
		);
		$manager = new EchoAttributeManager( $notif, $category, array(), array(), array() );
		$this->assertTrue( $manager->getCategoryEligibility( $this->mockUser(), 'category_one' ) );
		$category = array(
			'category_one' => array(
				'priority' => 10,
				'usergroups' => array(
					'sysop'
				)
			)
		);
		$manager = new EchoAttributeManager( $notif, $category, array(), array(), array() );
		$this->assertFalse( $manager->getCategoryEligibility( $this->mockUser(), 'category_one' ) );
	}

	public function testGetNotificationCategory() {
		$notif = array(
			'event_one' => array(
				'category' => 'category_one'
			),
		);
		$category = array(
			'category_one' => array(
				'priority' => 10
			)
		);
		$manager = new EchoAttributeManager( $notif, $category, array(), array(), array() );
		$this->assertEquals( $manager->getNotificationCategory( 'event_one' ), 'category_one' );

		$manager = new EchoAttributeManager( $notif, array(), array(), array(), array() );
		$this->assertEquals( $manager->getNotificationCategory( 'event_one' ), 'other' );

		$notif = array(
			'event_one' => array(
				'category' => 'category_two'
			),
		);
		$category = array(
			'category_one' => array(
				'priority' => 10
			)
		);
		$manager = new EchoAttributeManager( $notif, $category, array(), array(), array() );
		$this->assertEquals( $manager->getNotificationCategory( 'event_one' ), 'other' );
	}

	public function testGetCategoryPriority() {
		$notif = array(
			'event_one' => array(
				'category' => 'category_two'
			),
		);
		$category = array(
			'category_one' => array(
				'priority' => 6
			),
			'category_two' => array(
				'priority' => 100
			),
			'category_three' => array(
				'priority' => -10
			),
			'category_four' => array()
		);
		$manager = new EchoAttributeManager( $notif, $category, array(), array(), array() );
		$this->assertEquals( 6, $manager->getCategoryPriority( 'category_one' ) );
		$this->assertEquals( 10, $manager->getCategoryPriority( 'category_two' ) );
		$this->assertEquals( 10, $manager->getCategoryPriority( 'category_three' ) );
		$this->assertEquals( 10, $manager->getCategoryPriority( 'category_four' ) );
	}

	public function testGetNotificationPriority() {
		$notif = array(
			'event_one' => array(
				'category' => 'category_one'
			),
			'event_two' => array(
				'category' => 'category_two'
			),
			'event_three' => array(
				'category' => 'category_three'
			),
			'event_four' => array(
				'category' => 'category_four'
			)
		);
		$category = array(
			'category_one' => array(
				'priority' => 6
			),
			'category_two' => array(
				'priority' => 100
			),
			'category_three' => array(
				'priority' => -10
			),
			'category_four' => array()
		);
		$manager = new EchoAttributeManager( $notif, $category, array(), array(), array() );
		$this->assertEquals( 6, $manager->getNotificationPriority( 'event_one' ) );
		$this->assertEquals( 10, $manager->getNotificationPriority( 'event_two' ) );
		$this->assertEquals( 10, $manager->getNotificationPriority( 'event_three' ) );
		$this->assertEquals( 10, $manager->getNotificationPriority( 'event_four' ) );
	}

	public static function getEventsForSectionProvider() {
		$notifications = array(
			'event_one' => array(
				'category' => 'category_one',
				'section' => 'message',
			),
			'event_two' => array(
				'category' => 'category_two',
				'section' => 'invalid',
			),
			'event_three' => array(
				'category' => 'category_three',
				'section' => 'message',
			),
			'event_four' => array(
				'category' => 'category_four',
				// Omitted
			),
			'event_five' => array(
				'category' => 'category_two',
				'section' => 'alert',
			),
		);

		return array(
			array(
				array( 'event_one', 'event_three' ),
				$notifications,
				'message',
				'Messages',
			),

			array(
				array( 'event_two', 'event_four', 'event_five' ),
				$notifications,
				'alert',
				'Alerts',
			),
		);
	}

	/**
	 * @dataProvider getEventsForSectionProvider
	 */
	public function testGetEventsForSection( $expected, $notificationTypes, $section, $message ) {
		$am = new EchoAttributeManager( $notificationTypes, array(), array(), array(), array() );
		$actual = $am->getEventsForSection( $section );
		$this->assertEquals( $expected, $actual, $message );
	}

	public function testGetUserEnabledEvents() {
		$notif = array(
			'event_one' => array(
				'category' => 'category_one'
			),
			'event_two' => array(
				'category' => 'category_two'
			),
			'event_three' => array(
				'category' => 'category_three'
			),
		);
		$category = array(
			'category_one' => array(
				'priority' => 10,
				'usergroups' => array(
					'sysop'
				)
			),
			'category_two' => array(
				'priority' => 10,
				'usergroups' => array(
					'echo_group'
				)
			),
			'category_three' => array(
				'priority' => 10,
			),
		);
		$manager = new EchoAttributeManager( $notif, $category, array(), array(), array() );
		$this->assertEquals( $manager->getUserEnabledEvents( $this->mockUser(), 'web' ), array( 'event_two', 'event_three' ) );
	}

	public function testGetUserEnabledEventsbySections() {
		$notif = array(
			'event_one' => array(
				'category' => 'category_one'
			),
			'event_two' => array(
				'category' => 'category_two',
				'section' => 'message'
			),
			'event_three' => array(
				'category' => 'category_three',
				'section' => 'alert'
			),
			'event_four' => array(
				'category' => 'category_three',
			),
		);
		$category = array(
			'category_one' => array(
				'priority' => 10,
			),
			'category_two' => array(
				'priority' => 10,
			),
			'category_three' => array(
				'priority' => 10
			),
		);
		$manager = new EchoAttributeManager( $notif, $category, array(), array(), array() );
		$expected = array( 'event_one', 'event_three', 'event_four' );
		$actual = $manager->getUserEnabledEventsBySections( $this->mockUser(), 'web', array( 'alert' ) );
		sort( $expected );
		sort( $actual );
		$this->assertEquals( $actual, $expected );

		$expected = array( 'event_two' );
		$actual = $manager->getUserEnabledEventsBySections( $this->mockUser(), 'web', array( 'message' ) );
		sort( $expected );
		sort( $actual );
		$this->assertEquals( $actual, $expected );

		$expected = array( 'event_one', 'event_two', 'event_three', 'event_four' );
		$actual = $manager->getUserEnabledEventsBySections( $this->mockUser(), 'web', array( 'message', 'alert' ) );
		sort( $expected );
		sort( $actual );
		$this->assertEquals( $actual, $expected );
	}

	public static function getEventsByCategoryProvider() {
		return array(
			array(
				'Mix of populated and empty categories handled appropriately',
				array(
					'category_one' => array(
						'event_two',
						'event_five',
					),
					'category_two' => array(
						'event_one',
						'event_three',
						'event_four',
					),
					'category_three' => array(),
				),
				array(
					'category_one' => array(),
					'category_two' => array(),
					'category_three' => array(),
				),
				array(
					'event_one' => array(
						'category' => 'category_two',
					),
					'event_two' => array(
						'category' => 'category_one',
					),
					'event_three' => array(
						'category' => 'category_two',
					),
					'event_four' => array(
						'category' => 'category_two',
					),
					'event_five' => array(
						'category' => 'category_one',
					),
				)
			)
		);
	}

	/**
	 * @dataProvider getEventsByCategoryProvider
	 */
	public function testGetEventsByCategory( $message, $expectedMapping, $categories, $notifications ) {
		$am = new EchoAttributeManager( $notifications, $categories, array(), array(), array() );
		$actualMapping = $am->getEventsByCategory();
		$this->assertEquals( $expectedMapping, $actualMapping, $message );
	}

	public static function isNotifyTypeAvailableForCategoryProvider() {
		return array(
			array(
				'Fallback to default entirely',
				true,
				'category_one',
				'web',
				array( 'web' => true, 'email' => true ),
				array()
			),
			array(
				'Fallback to default for single type',
				false,
				'category_two',
				'email',
				array( 'web' => true, 'email' => false ),
				array(
					'category_two' => array(
						'web' => true,
					),
				)
			),
			array(
				'Use override',
				false,
				'category_three',
				'web',
				array( 'web' => true, 'email' => true ),
				array(
					'category_three' => array(
						'web' => false,
					),
				),
			),
		);
	}

	/**
	   @dataProvider isNotifyTypeAvailableForCategoryProvider
	*/
	public function testIsNotifyTypeAvailableForCategory( $message, $expected, $categoryName, $notifyType, $defaultNotifyTypeAvailability, $notifyTypeAvailabilityByCategory ) {
		$am = new EchoAttributeManager( array(), array(), $defaultNotifyTypeAvailability, $notifyTypeAvailabilityByCategory, array() );
		$actual = $am->isNotifyTypeAvailableForCategory( $categoryName, $notifyType );
		$this->assertEquals( $expected, $actual, $message );
	}

	public static function isNotifyTypeDismissableForCategoryProvider() {
		return array(
			array(
				'Not dismissable because of all',
				false,
				array(
					'category_one' => array(
						'no-dismiss' => array( 'all' ),
					)
				),
				'category_one',
				'web',
			),
			array(
				'Not dismissable because of specific notify type',
				false,
				array(
					'category_two' => array(
						'no-dismiss' => array( 'email' ),
					)
				),
				'category_two',
				'email',
			),
			array(
				'Dismissable because of different affected notify type',
				true,
				array(
					'category_three' => array(
						'no-dismiss' => array( 'web' ),
					)
				),
				'category_three',
				'email',
			),
		);
	}

	/**
	 * @dataProvider isNotifyTypeDismissableForCategoryProvider
	 */
	public function testIsNotifyTypeDismissableForCategory( $message, $expected, $categories, $categoryName, $notifyType ) {
		$am = new EchoAttributeManager( array(), $categories, array(), array(), array() );
		$actual = $am->isNotifyTypeDismissableForCategory( $categoryName, $notifyType );
		$this->assertEquals( $expected, $actual, $message );
	}


	/**
	 * Mock object of User
	 */
	protected function mockUser() {
		$user = $this->getMockBuilder( 'User' )
			->disableOriginalConstructor()
			->getMock();
		$user->expects( $this->any() )
			->method( 'getID' )
			->will( $this->returnValue( 1 ) );
		$user->expects( $this->any() )
			->method( 'getOption' )
			->will( $this->returnValue( true ) );
		$user->expects( $this->any() )
			->method( 'getGroups' )
			->will( $this->returnValue( array( 'echo_group' ) ) );

		return $user;
	}
}
