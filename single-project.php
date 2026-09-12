<?php get_header(); ?>

<main class="site-main">
<h1> Single Project Page
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>

                <h1>
                    <?php the_title(); ?>
                </h1>

                <?php if ( has_post_thumbnail() ) : ?>

                    <?php the_post_thumbnail( 'large' ); ?>

                <?php endif; ?>

                <div class="entry-content">

                    <?php the_content(); ?>

                </div>

            </article>

        <?php endwhile; ?>

    <?php endif; ?>

</main>

<?php get_footer(); ?>