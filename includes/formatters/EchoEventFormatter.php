<?php

/**
 * Abstract class that each "formatter" should implement.
 *
 * A formatter is an output type, example formatters would be:
 * * Special:Notifications
 * * HTML email
 * * plaintext email
 *
 * The formatter does not maintain any state except for the
 * arguments passed in the constructor (user and language)
 */
abstract class EchoEventFormatter {
	public function __construct( User $user, Language $language ) {
		$this->user = $user;
		$this->language = $language;
	}

	/**
	 * @param EchoEvent $event
	 * @return string|bool Output format depends on implementation, false if it cannot be formatted
	 */
	final public function format( EchoEvent $event ) {
		$model = EchoEventPresentationModel::factory( $event, $this->language, $this->user );
		if ( !$model->canRender() ) {
			return false;
		}

		return $this->formatModel( $model );
	}

	/**
	 * @param EchoEventPresentationModel $model
	 * @return string
	 */
	abstract protected function formatModel( EchoEventPresentationModel $model );
}
