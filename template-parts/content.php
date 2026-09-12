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