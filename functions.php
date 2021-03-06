<?php
require __DIR__ . '/enqueue.php';
require __DIR__ . '/helpers.php';

function fn_categories() {
	$categories = get_the_category();
	$arr        = array();

	foreach ( $categories as $category ) {
		$link  = get_term_link( $category );
		$arr[] = "<a href='{$link}'>{$category->name}</a>";
	}

	return implode( ',&nbsp;', $arr );
}

add_action(
	'after_setup_theme',
	function() {
		add_theme_support( 'custom-logo' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menu( 'primary-menu', 'Menu Principal' );
	}
);

add_action(
	'add_meta_boxes',
	function() {
		$attributes = new Fanucchi\metaboxes\Attributes(
			'attributes',
			'Atributos',
			get_template_directory() . '/inc/template-part/metaboxes/attributes.php',
			'projects',
			'side',
			'high'
		);

		$attributes->register();
	}
);

add_action(
	'add_meta_boxes',
	function() {
		$qualification_author = new Fanucchi\metaboxes\Attributes(
			'qualification_author',
			'Autor',
			get_template_directory() . '/inc/template-part/metaboxes/qualifications.php',
			'qualification',
			'advanced',
			'high'
		);

		$qualification_author->register();
	}
);

add_action(
	'save_post_projects',
	function( $post_id, $post, $update ) {
		if ( ! $update ) {
			return;
		}

		$data = array(
			'project-url' => $_POST['project-url'],
			'tecnologies' => $_POST['tecnologies'],
		);

		update_post_meta( $post_id, 'attributes', $data );
	},
	10,
	3
);

add_action(
	'save_post_qualification',
	function( $post_id, $post, $update ) {
		if ( ! $update ) {
			return;
		}

		$data = array(
			'author' => $_POST['author'],
		);

		update_post_meta( $post_id, 'qualification_author', $data );
	},
	10,
	3
);

add_action(
	'init',
	function() {
		$args = array(
			'label'        => 'Categorias',
			'labels'       => array(
				'add_new'      => 'Adicionar Nova',
				'add_new_item' => 'Adicionar Nova Categoria',
				'not_found'    => 'Nenhuma categoria encontrada',
			),
			'show_in_rest' => true,
		);

		register_taxonomy( 'projects_categories', 'projects', $args );
	}
);

$names = array(
	'name'   => 'projects',
	'plural' => 'Projetos',
	'slug'   => 'projects',
);

$options = array(
	'supports'     => array( 'title', 'editor', 'thumbnail' ),
	'show_in_rest' => true,
);

$labels = array(
	'add_new_item' => 'Adicionar Novo Projeto',
);

$project = new PostTypes\PostType( $names, $options, $labels );
$project->icon( 'dashicons-portfolio' );
$project->register();

$names = array(
	'name'   => 'Qualification',
	'plural' => 'Qualifications',
	'slug'   => 'qualificacao',
);

$options = array(
	'supports' => array( 'title', 'editor' ),
);

$qualifications = new PostTypes\PostType( $names, $options );
$qualifications->register();

add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'projects',
			'attributes',
			array(
				'get_callback' => function( $post_arr ) {
					return get_post_meta( $post_arr['id'], 'attributes', true );
				},
			)
		);
	}
);

add_filter(
	'nav_menu_css_class',
	function( $classes, $item, $args ) {
		if ( ! $args->theme_location === 'primary-menu' ) {
			return $classes;
		}

		$classes[] = 'primary-menu__item';
		return $classes;
	},
	10,
	3
);

add_action( 'wp_default_scripts', 'move_jquery_into_footer' );

function move_jquery_into_footer( $wp_scripts ) {

	if ( is_admin() ) {
		return;
	}

	$wp_scripts->add_data( 'jquery', 'group', 1 );
	$wp_scripts->add_data( 'jquery-core', 'group', 1 );
	$wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
}

add_filter('print_styles_array', function($styles) {
	
	return array_filter($styles, function($style) {
		return $style !== 'wp-block-library';
	});
});
