<?php get_header(); ?>

<main class="site-main">
<h3> Single Post Template </h3>
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>

                <h1>
                    <?php the_title(); ?>
                </h1>

                <div class="entry-meta">

    <span>
        Published on <?php echo get_the_date(); ?>
    </span>

    <span>
        by <?php the_author(); ?>
    </span>

</div>

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