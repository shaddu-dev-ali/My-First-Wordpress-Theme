<?php get_header(); ?>

<main class="site-main">

    <header class="archive-header">

        <h1>
            <?php single_term_title(); ?>
        </h1>

        <?php the_archive_description(); ?>

    </header>

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php
            get_template_part(
                'template-parts/content'
            );
            ?>

        <?php endwhile; ?>

    <?php else : ?>

        <?php
        get_template_part(
            'template-parts/content',
            'none'
        );
        ?>

    <?php endif; ?>

</main>

<?php get_footer(); ?>