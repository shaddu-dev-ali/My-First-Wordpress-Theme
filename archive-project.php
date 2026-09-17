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

    <?php
$project_types = get_terms(
    [
        'taxonomy'   => 'project_type',
        'hide_empty' => true,
    ]
);
?>

<?php if ( ! empty( $project_types ) && ! is_wp_error( $project_types ) ) : ?>

    <nav class="project-filters">

        <a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>">
            All Projects
        </a>

        <?php foreach ( $project_types as $project_type ) : ?>

            <a href="<?php echo esc_url( get_term_link( $project_type ) ); ?>">
                <?php echo esc_html( $project_type->name ); ?>
            </a>

        <?php endforeach; ?>

    </nav>

<?php endif; ?>

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

        <?php
the_posts_pagination();
?>

    <?php else : ?>

        <p>No projects found.</p>

    <?php endif; ?>

</main>

<?php get_footer(); ?>