<?php get_header(); ?>

<main class="site-main">

    <header class="archive-header">

        <h1>
            <?php single_term_title(); ?>
        </h1>

        <?php the_archive_description(); ?>

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

          <a
    href="<?php echo esc_url( get_term_link( $project_type ) ); ?>"
    class="<?php echo is_tax( 'project_type', $project_type->slug ) ? 'active' : ''; ?>"
>
    <?php echo esc_html( $project_type->name ); ?>
</a>

        <?php endforeach; ?>

    </nav>

<?php endif; ?>

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