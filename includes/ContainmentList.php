<?php

namespace MediaWiki\Extension\Notifications;

/**
 * Interface providing list of contained values.
 */
interface ContainmentList {
	/**
	 * @return string[] The values contained within this list.
	 */
	public function getValues();
}
