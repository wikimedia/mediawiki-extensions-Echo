<?php

class SpecialNotificationsMarkRead extends FormSpecialPage {
	protected $eventId;

	public function __construct() {
		parent::__construct( 'NotificationsMarkRead' );
	}

	public function doesWrites() {
		return true;
	}

	public function execute( $par ) {
		parent::execute( $par );

		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'echo-specialpage-markasread' )->text() );

		// Redirect to login page and inform user of the need to login
		$this->requireLogin( 'echo-notification-loginrequired' );
	}

	public function isListed() {
		return false;
	}

	/**
	 * Get an HTMLForm descriptor array
	 * @return array
	 */
	protected function getFormFields() {
		return array(
			'id' => array(
				'type' => 'hidden',
				'required' => true,
				'default' => $this->par,
				'filter-callback' => function ( $value, $alldata ) {
					// Allow for a single value or a set of values
					$result = explode( ',', $value );
					return $result;
				},
				'validation-callback' => function ( $value, $alldata ) {
					if ( (int)$value <= 0 ) {
						return $this->msg( 'echo-specialpage-markasread-invalid-id' );
					}
					foreach ( $value as $val ) {
						if ( (int)( $val ) <= 0 ) {
							return $this->msg( 'echo-specialpage-markasread-invalid-id' );
						}
					}
					return true;
				}
			)
		);
	}

	protected function alterForm( HTMLForm $form ) {
		$form->setSubmitText( $this->msg( 'echo-notification-markasread' ) );
	}

	/**
	 * Process the form on POST submission.
	 * @param array $data
	 * @param HTMLForm $form
	 * @return bool|string|array|Status As documented for HTMLForm::trySubmit.
	 */
	public function onSubmit( array $data /* $form = null */ ) {
		// Allow for multiple IDs or a single ID
		$ids = $data['id'];

		$notifUser = MWEchoNotifUser::newFromUser( $this->getUser() );
		return $notifUser->markRead( $ids );
	}

	public function onSuccess() {
		$page = SpecialPage::getTitleFor( 'Notifications' );
		$this->getOutput()->redirect( $page->getFullUrl() );
	}
}
