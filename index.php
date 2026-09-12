<?php get_header(); ?>

<main class="site-main">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

           <?php get_template_part( 'template-parts/content' ); ?>

        <?php endwhile; ?>

    <?php else : ?>

        <p>No content found.</p>

    <?php endif; ?>

</main>

<section class="featured-posts">

    <h2>Featured Posts</h2>

    <?php

    $featured_query = new WP_Query(
        [
            'post_type' => 'project',
            'posts_per_page' => 3,
            
        ]
    );

    ?>

    <?php if ( $featured_query->have_posts() ) : ?>

        <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>

            <article <?php post_class(); ?>>

                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>

                <?php the_excerpt(); ?>

            </article>

        <?php endwhile; ?>

    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

</section>

<?php get_footer(); ?>