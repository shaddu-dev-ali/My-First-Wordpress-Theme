<?php get_header(); ?>

<main class="site-main">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>

                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <?php if ( has_post_thumbnail() ) : ?>

                    <?php the_post_thumbnail( 'large' ); ?>

                <?php endif; ?>

                <?php the_excerpt(); ?>

            </article>

        <?php endwhile; ?>

    <?php else : ?>

        <p>No content found.</p>

    <?php endif; ?>

</main>

<?php get_footer(); ?>