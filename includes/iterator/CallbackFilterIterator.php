<?php

// T124828: conditional is a linter compatibility hack
if ( !class_exists( 'CallbackFilterIterator' ) ) {
	/**
	 * This class is implemented as part of SPL starting at PHP5.4.  This
	 * re-implementation provides backwards compatibility to mediawiki
	 * running on PHP5.3.
	 */
	class CallbackFilterIterator extends FilterIterator {
		protected $callback;

		public function __construct( Iterator $iterator, $callback ) {
			parent::__construct( $iterator );
			$this->callback = $callback;
		}

		public function accept() {
			return call_user_func(
				$this->callback,
				$this->current(),
				$this->key(),
				$this->getInnerIterator()
			);
		}
	}
}
