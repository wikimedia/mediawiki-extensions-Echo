<?php

class AutoloadGenerator {
	protected $basepath;
	protected $collector;
	protected $classes = array();

	/**
	 * @param string $basepath
	 */
	public function __construct( $basepath ) {
		$this->basepath = realpath( $basepath );
		$this->collector = new ClassCollector;
	}

	public function readFile( $path ) {
		$path = realpath( $path );
		$result = $this->collector->getClasses(
			token_get_all( file_get_contents( $path ) )
		);
		if ( $result ) {
			$shortpath = substr( $path, strlen( $this->basepath ) );
			$this->classes[$shortpath] = $result;
		}
	}

	/**
	 * @param string $dir
	 */
	public function readDir( $dir ) {
		$it = new RecursiveDirectoryIterator( realpath( $dir ) );
		$it = new RecursiveIteratorIterator( $it );

		foreach ( $it as $path => $file ) {
			$ext = pathinfo( $path, PATHINFO_EXTENSION );
			if ( $ext === 'php' ) {
				$this->readFile( $path );
			}
		}
	}

	public function generateAutoload() {
		$content = array();
		foreach ( $this->classes as $path => $contained ) {
			$exportedPath = var_export( $path, true );
			foreach ( $contained as $fqcn ) {
				$content[$fqcn] = sprintf(
					'$wgAutoloadClasses[%s] = __DIR__ . %s;' . "\n",
					var_export( $fqcn, true ),
					$exportedPath
				);
			}
		}

		// sort for stable output
		ksort( $content );

		file_put_contents(
			$this->basepath . '/autoload.php',
			"<?php\n\n" . implode( '', $content )
		);
	}
}

class ClassCollector {
	protected $namespace;
	protected $classes;
	protected $startToken;
	protected $tokens;

	public function getClasses( $tokens ) {
		$this->namespace = '';
		$this->classes = array();
		$this->startToken = null;
		$this->tokens = array();

		foreach ( $tokens as $token ) {
			if ( $this->startToken === null ) {
				$this->tryBeginExpect( $token );
			} else {
				$this->tryEndExpect( $token );
			}
		}

		return $this->classes;
	}

	protected function tryBeginExpect( $token ) {
		if ( is_string( $token ) ) {
			return;
		}
		switch( $token[0] ) {
		case T_NAMESPACE:
		case T_CLASS:
		case T_INTERFACE:
			$this->startToken = $token;
		}
	}

	protected function tryEndExpect( $token ) {
		switch( $this->startToken[0] ) {
		case T_NAMESPACE:
			if ( $token === ';' || $token === '{' ) {
				$this->namespace = $this->implodeTokens() . '\\';
				$this->startToken = null;
			} else {
				$this->tokens[] = $token;
			}
			break;

		case T_CLASS:
		case T_INTERFACE:
			$this->tokens[] = $token;
			if ( is_array( $token ) && $token[0] === T_STRING ) {
				$this->classes[] = $this->namespace . $this->implodeTokens();
				$this->startToken = null;
			}
		}
	}

	protected function implodeTokens() {
		$content = array();
		foreach ( $this->tokens as $token ) {
			$content[] = is_string( $token ) ? $token : $token[1];
		}
		$this->tokens = array();

		return trim( implode( '', $content ), " \n\t" );
	}
}

function main() {
	$base = dirname( __DIR__ );
	$generator = new AutoloadGenerator( $base );
	$dirs = array(
		'api', 'controller', 
		'formatters', 'includes', 
		'jobs', 'model', 'tests'
	);
	foreach ( $dirs as $dir ) {
		$generator->readDir( $base . '/' . $dir );
	}
	foreach ( glob( $base . '/*.php' ) as $file ) {
		$generator->readFile( $file );
	}

	$generator->generateAutoload();

	echo "Done.\n\n";
}

main();
