<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no;">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&display=swap&subset=latin-ext" rel="stylesheet">
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
            <button class="primary-menu__hamburger-button">
                <span class="primary-menu__hamburger"></span>
            </button>
            <ul class="primary-menu__list">
                <li class="primary-menu__item"><a href="<?php echo site_url() ?>">Home</a></li>
                <li class="primary-menu__item"><a href="#">Blog (em breve)</a></li>
            </ul>
        </nav>
    </div>
</header>
