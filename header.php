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
    <div class="container">
        <figure class="header__logo">
            <?php echo get_custom_logo() ? get_custom_logo() : bloginfo('name'); ?>
        </figure>
    </div>
</header>
