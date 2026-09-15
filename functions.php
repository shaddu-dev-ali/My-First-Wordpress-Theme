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

function mytheme_register_project_post_type() {

    register_post_type(
        'project',
        [
            'labels' => [
                'name'          => __( 'Projects', 'my-first-theme' ),
                'singular_name' => __( 'Project', 'my-first-theme' ),
            ],

            'public'      => true,
            'has_archive' => true,

            'menu_icon' => 'dashicons-portfolio',

            'supports' => [
                'title',
                'editor',
                'thumbnail',
            ],

            'rewrite' => [
                'slug' => 'projects',
            ],
        ]
    );

}

add_action(
    'init',
    'mytheme_register_project_post_type'
);

function mytheme_add_project_meta_box() {

    add_meta_box(
        'project_details',
        'Project Details',
        'mytheme_project_meta_box_callback',
        'project',
        'normal',
        'high'
    );

}

function mytheme_project_meta_box_callback( $post ) {

   wp_nonce_field(
        'mytheme_save_project',
        'mytheme_project_nonce'
    );

    $location = get_post_meta(
    $post->ID,
    '_project_location',
    true
);

$year = get_post_meta(
    $post->ID,
    '_project_year',
    true
);

    ?>

    <p>
        <label for="project_location">
            Project Location
        </label>
    </p>

    <input
        type="text"
        id="project_location"
        name="project_location"
        value="<?php echo esc_attr( $location ); ?>"
        style="width: 100%;"
    >

    <p>
        <label for="project_year">
            Project Year
        </label>
    </p>

    <input
        type="number"
        id="project_year"
        name="project_year"
        value="<?php echo esc_attr( $year ); ?>"
    >

    <?php
}

add_action(
    'add_meta_boxes',
    'mytheme_add_project_meta_box'
);


function mytheme_save_project_meta( $post_id ) {

 if (
        ! isset( $_POST['mytheme_project_nonce'] )
    ) {
        return;
    }

    if (
        ! wp_verify_nonce(
            $_POST['mytheme_project_nonce'],
            'mytheme_save_project'
        )
    ) {
        return;
    }

     // Don't run during autosave.
    if (
        defined( 'DOING_AUTOSAVE' ) &&
        DOING_AUTOSAVE
    ) {
        return;
    }

    if (
    ! current_user_can( 'edit_post', $post_id )
) {
    return;
}

    if ( isset( $_POST['project_location'] ) ) {

        update_post_meta(
            $post_id,
            '_project_location',
            sanitize_text_field( $_POST['project_location'] )
        );

    }

    if ( isset( $_POST['project_year'] ) ) {

        update_post_meta(
            $post_id,
            '_project_year',
            absint( $_POST['project_year'] )
        );

    }

}

add_action(
    'save_post_project',
    'mytheme_save_project_meta'
);