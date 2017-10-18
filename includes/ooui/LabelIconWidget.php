<?php

namespace EchoOOUI;

use OOUI\IconElement;
use OOUI\LabelElement;
use OOUI\TitledElement;
use OOUI\Tag;
use OOUI\Widget;

/**
 * Widget combining a label and icon
 */
class LabelIconWidget extends Widget {
	use IconElement;
	use LabelElement;
	use TitledElement;

	/**
	 * @param array $config Configuration options
	 *  - string|HtmlSnippet $config['label'] Label text
	 *  - string $config['title'] Title text
	 *  - string $config['icon'] Icon key
	 */
	public function __construct( $config ) {
		parent::__construct( $config );

		$this->tableRow = new Tag( 'div' );
		$this->tableRow->setAttributes( [
			'class' => 'oo-ui-labelIconWidget-row',
		] );

		$this->icon = new Tag( 'div' );
		$this->label = new Tag( 'div' );

		$this->initializeIconElement( array_merge( $config, [ 'iconElement' => $this->icon ] ) );
		$this->initializeLabelElement( array_merge( $config, [ 'labelElement' => $this->label ] ) );
		$this->initializeTitledElement( $config );

		$this->addClasses( [ 'oo-ui-labelIconWidget' ] );
		$this->tableRow->appendContent( $this->icon, $this->label );
		$this->appendContent( $this->tableRow );
	}
}
