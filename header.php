<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no;">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata%3Aregular%7CUnica+One%3Aregular&subset=latin&display=swap&ver=4e6a1ba562e40b1f31644688f96af105" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet">
    <?php wp_head(); ?>
    <title><?php bloginfo('title'); ?></title>
</head>
<body>

<header id="header" class="header">
    <div class="header__container container">
        <?php if(has_custom_logo()): ?>
            <figure class="header__logo">
                <?php echo get_custom_logo();?>
            </figure>
        <?php else: ?>
            <h1 class="header__title"><?php bloginfo('name'); ?></h1>
        <?php endif; ?>
        <?php
            if( has_nav_menu('primary-menu') )
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    'fallback_cb' => false,
                    'depth' => 1,
                    'menu_class' => 'primary-menu__list',
                    'container' => 'nav',
                    'container_class' => 'primary-menu',
                    'items_wrap' => '<button class="primary-menu__hamburger-button">
                                        <span class="primary-menu__hamburger"></span>
                                    </button>
                                    <ul id="%1$s" class="%2$s">%3$s</ul>',
                    'item_class' => 'primary-menu__item'
                ]);
        ?>
    </div>
</header>
