<?php

function mytheme_enqueue_assets() {

    wp_enqueue_style(
        'mytheme-style',
        get_stylesheet_uri(),
        [],
        '1.0'
    );

    wp_enqueue_script(
        'mytheme-script',
        get_theme_file_uri( '/assets/js/main.js' ),
        [],
        '1.0',
        true
    );

}

add_action(
    'wp_enqueue_scripts',
    'mytheme_enqueue_assets'
);



function mytheme_setup() {

     add_theme_support( 'title-tag' );
     add_theme_support( 'post-thumbnails' );
     register_nav_menus(
    [
        'primary' => __( 'Primary Menu', 'my-first-theme' ),
         'secondary' => __( 'Secondary Menu', 'my-first-theme' ),
    ]
);
}

add_action(
    'after_setup_theme',
    'mytheme_setup'
);