<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no;">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
	<title><?php bloginfo( 'title' ); ?></title>
</head>
<body>

<header id="header" class="header">
	<div class="header__container container">
		<?php if ( has_custom_logo() ) : ?>
			<figure class="header__logo">
				<?php echo get_custom_logo(); ?>
			</figure>
		<?php else : ?>
			<h1 class="header__title"><?php bloginfo( 'name' ); ?></h1>
		<?php endif; ?>
		<?php
		if ( has_nav_menu( 'primary-menu' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'primary-menu',
					'fallback_cb'     => false,
					'depth'           => 1,
					'menu_class'      => 'primary-menu__list',
					'container'       => 'nav',
					'container_class' => 'primary-menu',
					'items_wrap'      => '<button class="primary-menu__hamburger-button">
                                        <span class="primary-menu__hamburger"></span>
                                    </button>
                                    <ul id="%1$s" class="%2$s">%3$s</ul>',
					'item_class'      => 'primary-menu__item',
				)
			);
		}
		?>
	</div>
</header>
