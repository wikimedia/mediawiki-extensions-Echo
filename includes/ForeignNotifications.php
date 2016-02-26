<?php

class EchoForeignNotifications {
	/**
	 * @var bool|EchoUnreadWikis
	 */
	protected $unreadWikis = false;

	/**
	 * @var array [(str) section => (int) count, ...]
	 */
	protected $counts = array( EchoAttributeManager::ALERT => 0, EchoAttributeManager::MESSAGE => 0 );

	/**
	 * @var array [(str) section => (string[]) wikis, ...]
	 */
	protected $wikis = array( EchoAttributeManager::ALERT => array(), EchoAttributeManager::MESSAGE => array() );

	/**
	 * @var array [(str) section => (MWTimestamp) timestamp, ...]
	 */
	protected $timestamps = array( EchoAttributeManager::ALERT => false, EchoAttributeManager::MESSAGE => false );

	/**
	 * @var bool
	 */
	protected $populated = false;

	/**
	 * @param User $user
	 */
	public function __construct( User $user ) {
		if ( $user->getOption( 'echo-cross-wiki-notifications' ) ) {
			$this->unreadWikis = EchoUnreadWikis::newFromUser( $user );
		}
	}

	/**
	 * @param string|null $section Name of section or null for all
	 * @return int
	 */
	public function getCount( $section = null ) {
		$this->populate();

		if ( $section === null ) {
			return array_sum( $this->counts );
		}

		return isset( $this->counts[$section] ) ? $this->counts[$section] : 0;
	}

	/**
	 * @param string|null $section Name of section or null for all
	 * @return MWTimestamp|false
	 */
	public function getTimestamp( $section = null ) {
		$this->populate();

		if ( $section === null ) {
			$max = false;
			/** @var MWTimestamp $timestamp */
			foreach ( $this->timestamps as $timestamp ) {
				// $timestamp < $max = invert 0
				// $timestamp > $max = invert 1
				if ( $max === false || $timestamp->diff( $max )->invert === 1 ) {
					$max = $timestamp;
				}
			}

			return $timestamp;
		}

		return isset( $this->timestamps[$section] ) ? $this->timestamps[$section] : false;
	}

	/**
	 * @param string|null $section Name of section or null for all
	 * @return string[]
	 */
	public function getWikis( $section = null ) {
		$this->populate();

		if ( $section === null ) {
			$all = array();
			foreach ( $this->wikis as $wikis ) {
				$all = array_merge( $all, $wikis );
			}

			return array_unique( $all );
		}

		return isset( $this->wikis[$section] ) ? $this->wikis[$section] : array();
	}

	protected function populate() {
		if ( $this->populated ) {
			return;
		}

		if ( $this->unreadWikis === false ) {
			return;
		}

		$unreadCounts = $this->unreadWikis->getUnreadCounts();
		if ( !$unreadCounts ) {
			return;
		}

		foreach ( $unreadCounts as $wiki => $sections ) {
			// exclude current wiki
			if ( $wiki === wfWikiID() ) {
				continue;
			}

			foreach ( $sections as $section => $data ) {
				if ( $data['count'] > 0 ) {
					$this->counts[$section] += $data['count'];
					$this->wikis[$section][] = $wiki;

					$timestamp = new MWTimestamp( $data['ts'] );
					// We need $this->timestamp[$section] to be the max timestamp
					// across all wikis.
					// $timestamp < $this->timestamps[$section] = invert 0
					// $timestamp > $this->timestamps[$section] = invert 1
					if (
						$this->timestamps[$section] === false ||
						$timestamp->diff( $this->timestamps[$section] )->invert === 1
					) {
						$this->timestamps[$section] = new MWTimestamp( $data['ts'] );
					}

				}
			}
		}

		$this->populated = true;
	}

	/**
	 * @param string[] $wikis
	 * @return array[] [(string) wiki => (array) data]
	 */
	public function getApiEndpoints( array $wikis ) {
		global $wgConf;
		$wgConf->loadFullData();

		$data = array();
		foreach ( $wikis as $wiki ) {
			$siteFromDB = $wgConf->siteFromDB( $wiki );
			list( $major, $minor ) = $siteFromDB;
			$server = $wgConf->get( 'wgServer', $wiki, $major, array( 'lang' => $minor, 'site' => $major ) );
			$scriptPath = $wgConf->get( 'wgScriptPath', $wiki, $major, array( 'lang' => $minor, 'site' => $major ) );

			$data[$wiki] = array(
				'title' => $this->getWikiTitle( $wiki, $siteFromDB ),
				'url' => $server . $scriptPath . '/api.php',
			);
		}

		return $data;
	}

	/**
	 * @param string $wikiId
	 * @param array $siteFromDB $wgConf->siteFromDB( $wikiId ) result
	 * @return mixed|string
	 */
	protected function getWikiTitle( $wikiId, array $siteFromDB = null ) {
		global $wgConf, $wgLang;

		$msg = wfMessage( 'project-localized-name-'.$wikiId );
		// check if WikimediaMessages localized project names are available
		if ( $msg->exists() ) {
			return $msg->text();
		} else {
			// don't fetch $site, $langCode if known already
			if ( $siteFromDB === null ) {
				$siteFromDB = $wgConf->siteFromDB( $wikiId );
			}
			list( $site, $langCode ) = $siteFromDB;

			// try to fetch site name for this specific wiki, or fallback to the
			// general project's sitename if there is no override
			$wikiName = $wgConf->get( 'wgSitename', $wikiId ) ?: $wgConf->get( 'wgSitename', $site );
			$langName = $wgLang->fetchLanguageName( $langCode, $wgLang->getCode() );

			if ( !$langName ) {
				// if we can't find a language name (in language-agnostic
				// project like mediawikiwiki), including the language name
				// doesn't make much sense
				return $wikiName;
			}

			// ... or use generic fallback
			return wfMessage( 'echo-foreign-wiki-lang', $wikiName, $langName )->text();
		}
	}
}
