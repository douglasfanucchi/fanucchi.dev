<?php
require __DIR__ . '/enqueue.php';

add_action('after_setup_theme', function() {
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

    register_nav_menu('primary-menu', 'Menu Principal');
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

add_action('init', function() {
    $args = [
        'label' => 'Categorias',
        'labels' => [
            'add_new' => 'Adicionar Nova',
            'add_new_item' => 'Adicionar Nova Categoria',
            'not_found' => 'Nenhuma categoria encontrada',
        ],
        'show_in_rest' => true
    ];

    register_taxonomy('projects_categories', 'projects', $args);
});

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

add_action('rest_api_init', function() {
    register_rest_field('projects', 'attributes', [
        'get_callback' => function($post_arr) {
            return get_post_meta($post_arr['id'], 'attributes', true);
        }
    ]);
});

add_filter('nav_menu_css_class', function($classes, $item, $args) {
    if( !$args->theme_location === 'primary-menu' )
        return $classes;

    $classes[] = 'primary-menu__item';
    return $classes;
}, 10, 3);
