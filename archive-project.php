<?php get_header(); ?>

<main class="site-main">

    <header class="archive-header">

        <h1>
            Projects
        </h1>

        <p>
            Explore some of our latest projects.
        </p>

    </header>

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>

                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <?php if ( has_post_thumbnail() ) : ?>

                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </a>

                <?php endif; ?>

                <?php the_excerpt(); ?>

            </article>

        <?php endwhile; ?>

    <?php else : ?>

        <p>No projects found.</p>

    <?php endif; ?>

</main>

<?php get_footer(); ?>