<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <title><?php bloginfo('title'); ?></title>
</head>
<body>

<header id="header" class="header">
    <div class="header__container container">
        <figure class="header__logo">
            <?php echo get_custom_logo() ? get_custom_logo() : bloginfo('name'); ?>
        </figure>
        <nav class="primary-menu">
            <label for="hamburger-menu">
                <span id="hamburger-menu" class="primary-menu__hamburger"></span>
            </label>
            <ul class="primary-menu__list">
                <li class="primary-menu__item"></li>
                <li class="primary-menu__item"></li>
                <li class="primary-menu__item"></li>
                <li class="primary-menu__item"></li>
            </ul>
        </nav>
    </div>
</header>
