<?php
require_once __DIR__ . '/vendor/autoload.php';

class Enqueue {
    private $enqueue;

    public function __construct(\WPackio\Enqueue $enqueue) {
        $this->enqueue = $enqueue;
    
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_scripts']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
    }

    public function enqueue_frontend_scripts() {
        $this->enqueue->enqueue('js', 'app', []);
        $this->enqueue->enqueue('css', 'app', []);
    }

    public function enqueue_admin_scripts() {
        $this->enqueue->enqueue('js', 'admin', []);
        $this->enqueue->enqueue('css', 'admin', []);
    }
}

new Enqueue(
    new \WPackio\Enqueue('fanucchiDev', 'dist', '1.0.0', 'theme' )
);
