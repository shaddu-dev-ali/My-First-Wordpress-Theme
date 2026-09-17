<?php get_header(); ?>

<main class="site-main">
<h1> Single Project Page
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>

                <h1>
                    <?php the_title(); ?>
                </h1>
                <div >
<p> <?php the_date(); ?></p>
<p> <?php the_author(); ?></p>
    </div>

    <?php

$location = get_post_meta(
    get_the_ID(),
    '_project_location',
    true
);

$year = get_post_meta(
    get_the_ID(),
    '_project_year',
    true
);

?>


<?php if ( $location ) : ?>

    <p>
        <strong>Location:</strong>
        <?php echo esc_html( $location ); ?>
    </p>

<?php endif; ?>

<?php if ( $year ) : ?>

    <p>
        <strong>Year:</strong>
        <?php echo esc_html( $year ); ?>
    </p>

<?php endif; ?>


                <?php if ( has_post_thumbnail() ) : ?>

                    <?php the_post_thumbnail( 'large' ); ?>

                <?php endif; ?>

                <div class="entry-content">

                    <?php the_content(); ?>

                </div>

                <?php

$project_types = get_the_terms(
    get_the_ID(),
    'project_type'
);

 if ( ! empty( $project_types ) && ! is_wp_error( $project_types ) ) : ?>

    <ul>

        <?php foreach ( $project_types as $project_type ) : ?>

            <li>
                <?php echo esc_html( $project_type->name ); ?>
            </li>

        <?php endforeach; ?>

    </ul>

<?php endif; ?>

            </article>

        <?php endwhile; ?>

    <?php endif; ?>

</main>

<?php get_footer(); ?>