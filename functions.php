<?php
require __DIR__ . '/enqueue.php';

add_action('after_setup_theme', function() {
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
});

add_action('add_meta_boxes', function() {
    $attributes = new Fanucchi\metaboxes\Attributes(
        'attributes', 
        'Atributos',
        get_template_directory() . '/inc/template-part/metaboxes/attributes.php',
        'projects',
        'side',
        'high'
    );

    $attributes->register();
});

add_action('save_post_projects', function( $post_id, $post, $update ) {
    if( !$update ) return;

    $data = [
        'project-url' => $_POST['project-url'],
        'tecnologies' => $_POST['tecnologies']
    ];

    update_post_meta($post_id, 'attributes', $data);
}, 10, 3);

$names = [
    'name' => 'projects',
    'plural' => 'Projetos',
    'slug' => 'projects'
];

$options = [
    'supports' => ['title', 'editor', 'thumbnail'],
    'show_in_rest' => true
];

$labels = [
    'add_new_item' => 'Adicionar Novo Projeto'
];

$project = new PostTypes\PostType($names, $options, $labels);
$project->icon('dashicons-portfolio');
$project->register();
