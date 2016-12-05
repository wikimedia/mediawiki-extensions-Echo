<?php

/**
 * Abstract class for formatters that process multiple events.
 *
 * The formatter does not maintain any state except for the
 * arguments passed in the constructor (user and language)
 */
abstract class EchoEventDigestFormatter {
	public function __construct( User $user, Language $language ) {
		$this->user = $user;
		$this->language = $language;
	}

	/**
	 * Equivalent to IContextSource::msg for the current
	 * language
	 *
	 * @return Message
	 */
	protected function msg( /* ,,, */ ) {
		/**
		 * @var Message $msg
		 */
		$msg = call_user_func_array( 'wfMessage', func_get_args() );
		$msg->inLanguage( $this->language );

		return $msg;
	}

	/**
	 * @param EchoEvent[] $events
	 * @param string $distributionType 'web' or 'email'
	 * @return array|bool|string Output format depends on implementation, false if it cannot be formatted
	 */
	final public function format( array $events, $distributionType ) {
		$models = [];
		foreach ( $events as $event ) {
			$model = EchoEventPresentationModel::factory( $event, $this->language, $this->user, $distributionType );
			if ( $model->canRender() ) {
				$models[] = $model;
			}
		}

		return $models ? $this->formatModels( $models ) : false;
	}

	/**
	 * @param EchoEventPresentationModel[] $models
	 * @return string|array
	 */
	abstract protected function formatModels( array $models );
}
