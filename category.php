<?php get_header(); ?>

<main class="site-main">

    <header class="archive-header">

        <h1>
            Single Category: <?php single_cat_title(); ?>
        </h1>

        <?php the_archive_description(); ?>

    </header>

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>

                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <?php the_excerpt(); ?>

            </article>

        <?php endwhile; ?>

    <?php else : ?>

        <p>No posts found in this category.</p>

    <?php endif; ?>

</main>

<?php get_footer(); ?>