<?php get_header(); ?>

<main class="content" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'single' ); ?>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
