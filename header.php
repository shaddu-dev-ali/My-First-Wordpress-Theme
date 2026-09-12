<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

 <?php
    wp_nav_menu(
        [
            'theme_location' => 'primary',
        ]
    );
    ?>

<header class="site-header">

    <h1>
        <?php bloginfo( 'name' ); ?>
    </h1>

    <?php
    wp_nav_menu(
        [
            'theme_location' => 'secondary',
        ]
    );
    ?>

</header>