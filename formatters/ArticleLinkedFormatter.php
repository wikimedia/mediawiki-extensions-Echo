<?php

/**
 * Formatter for 'article-linked' notifications
 */
class MWEchoArticleLinkedFormatter extends EchoEditFormatter {

	/**
	 * @param $event EchoEvent
	 * @param $param string
	 * @param $message Message
	 * @param $user User
	 */
	protected function processParam( $event, $param, $message, $user ) {
		$extra = $event->getExtra();

		switch ( $param ) {
			// title of the page that gets linked in other page
			case 'title-linked':
			// wikitext format of the title of the page that gets linked in other page
			case 'title-linked-wiki-format':
				if ( isset( $extra['notif-list'][$user->getID()] ) && $extra['notif-list'][$user->getID()] ) {
					global $wgLang;
					$list = array();

					foreach ( $extra['notif-list'][$user->getID()] as $page ) {
						$title = Title::makeTitle( $page['pl_namespace'], $page['pl_title'] );
						if ( $param === 'title-linked-wiki-format' ) {
							$list[] = '[[' . $title->getPrefixedText() . ']]';
						} else {
							$list[] = $title->getPrefixedText();
						}
					}
					$message->params( $wgLang->commaList( $list ) );
					$message->params( count( $extra['notif-list'][$user->getID()] ) );
				} else {
					$message->params( '' );
				}
			break;

			default:
				parent::processParam( $event, $param, $message, $user );
			break;
		}
	}

}
