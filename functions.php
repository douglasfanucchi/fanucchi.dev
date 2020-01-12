<?php
require __DIR__ . '/enqueue.php';

add_action('after_setup_theme', function() {
    add_theme_support('custom-logo');
});