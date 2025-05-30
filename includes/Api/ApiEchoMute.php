<?php

namespace MediaWiki\Extension\Notifications\Api;

use MediaWiki\Api\ApiBase;
use MediaWiki\Api\ApiMain;
use MediaWiki\Cache\LinkBatchFactory;
use MediaWiki\Title\Title;
use MediaWiki\User\CentralId\CentralIdLookup;
use MediaWiki\User\Options\UserOptionsManager;
use Wikimedia\ParamValidator\ParamValidator;

class ApiEchoMute extends ApiBase {

	private CentralIdLookup $centralIdLookup;
	private LinkBatchFactory $linkBatchFactory;
	private UserOptionsManager $userOptionsManager;

	private const MUTE_LISTS = [
		'user' => [
			'pref' => 'echo-notifications-blacklist',
			'type' => 'user',
		],
		'page-linked-title' => [
			'pref' => 'echo-notifications-page-linked-title-muted-list',
			'type' => 'title'
		],
	];

	public function __construct(
		ApiMain $main,
		string $action,
		CentralIdLookup $centralIdLookup,
		LinkBatchFactory $linkBatchFactory,
		UserOptionsManager $userOptionsManager
	) {
		parent::__construct( $main, $action );

		$this->centralIdLookup = $centralIdLookup;
		$this->linkBatchFactory = $linkBatchFactory;
		$this->userOptionsManager = $userOptionsManager;
	}

	public function execute() {
		$user = $this->getUser();
		if ( !$user || !$user->isRegistered() ) {
			$this->dieWithError(
				[ 'apierror-mustbeloggedin', $this->msg( 'action-editmyoptions' ) ],
				'notloggedin'
			);
		}

		$this->checkUserRightsAny( 'editmyoptions' );

		$params = $this->extractRequestParams();
		$mutelistInfo = self::MUTE_LISTS[ $params['type'] ];
		$prefValue = $this->userOptionsManager->getOption( $user, $mutelistInfo['pref'] );
		$ids = $prefValue !== null ? $this->parsePref( $prefValue ) : [];
		$targetsToMute = $params['mute'] ?? [];
		$targetsToUnmute = $params['unmute'] ?? [];

		$changed = false;
		$addIds = $this->lookupIds( $targetsToMute, $mutelistInfo['type'] );
		foreach ( $addIds as $id ) {
			if ( !in_array( $id, $ids ) ) {
				$ids[] = $id;
				$changed = true;
			}
		}
		$removeIds = $this->lookupIds( $targetsToUnmute, $mutelistInfo['type'] );
		foreach ( $removeIds as $id ) {
			$index = array_search( $id, $ids );
			if ( $index !== false ) {
				array_splice( $ids, $index, 1 );
				$changed = true;
			}
		}

		if ( $changed ) {
			$this->userOptionsManager->setOption(
				$user,
				$mutelistInfo['pref'],
				$this->serializePref( $ids )
			);
			$this->userOptionsManager->saveOptions( $user );
		}

		$this->getResult()->addValue( null, $this->getModuleName(), 'success' );
	}

	/**
	 * @param string[] $names
	 * @param string $type
	 * @return int[]
	 */
	private function lookupIds( $names, $type ) {
		if ( $type === 'title' ) {
			$linkBatch = $this->linkBatchFactory->newLinkBatch();
			foreach ( $names as $name ) {
				$linkBatch->addObj( Title::newFromText( $name ) );
			}
			$linkBatch->execute();

			$ids = [];
			foreach ( $names as $name ) {
				$title = Title::newFromText( $name );
				if ( $title instanceof Title && $title->getArticleID() > 0 ) {
					$ids[] = $title->getArticleID();
				}
			}
			return $ids;
		} elseif ( $type === 'user' ) {
			return $this->centralIdLookup->centralIdsFromNames( $names, CentralIdLookup::AUDIENCE_PUBLIC );
		}
	}

	private function parsePref( string $prefValue ): array {
		return preg_split( '/\n/', $prefValue, -1, PREG_SPLIT_NO_EMPTY );
	}

	private function serializePref( array $ids ): string {
		return implode( "\n", $ids );
	}

	/** @inheritDoc */
	public function getAllowedParams( $flags = 0 ) {
		return [
			'type' => [
				ParamValidator::PARAM_REQUIRED => true,
				ParamValidator::PARAM_TYPE => array_keys( self::MUTE_LISTS ),
			],
			'mute' => [
				ParamValidator::PARAM_ISMULTI => true,
			],
			'unmute' => [
				ParamValidator::PARAM_ISMULTI => true,
			]
		];
	}

	/** @inheritDoc */
	public function needsToken() {
		return 'csrf';
	}

	/** @inheritDoc */
	public function mustBePosted() {
		return true;
	}

	/** @inheritDoc */
	public function isWriteMode() {
		return true;
	}

}
