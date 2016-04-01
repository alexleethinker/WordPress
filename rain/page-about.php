<?php

/*
 Template Name: 关于作者
*/

 get_header(); ?>

<main class="content" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page-about' ); ?>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
