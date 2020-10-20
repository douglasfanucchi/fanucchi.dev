<?php
require_once __DIR__ . '/vendor/autoload.php';

class Enqueue {
	private $enqueue;

	public function __construct( \WPackio\Enqueue $enqueue ) {
		$this->enqueue = $enqueue;

		add_action( 'get_footer', array( $this, 'enqueue_frontend_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}

	public function enqueue_frontend_scripts() {
		wp_enqueue_script( 'jquery' );
		$this->enqueue->enqueue( 'js', 'app', array( 'in_footer' => true ) );
		$this->enqueue->enqueue( 'css', 'app', array( 'in_footer' => true ) );
	}

	public function enqueue_admin_scripts() {
		$this->enqueue->enqueue( 'js', 'admin', array() );
		$this->enqueue->enqueue( 'css', 'admin', array() );
	}
}

new Enqueue(
	new \WPackio\Enqueue( 'fanucchiDev', 'dist', '1.0.0', 'theme' )
);
