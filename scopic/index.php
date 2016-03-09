<?php get_header(); ?>

<!-- #primary -->
<section id="primary" class="sidebar-off clearfix"> 

<!-- #content -->
<div id="content" role="main">
  
<?php if ( have_posts() ) : ?>

	<ul id="timeline" class="clearfix">

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile; ?>

	</ul>

	<?php ht_content_nav( 'nav-below' ); ?>

<?php else : ?>

	<?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>
    
</div>
<!-- /#content -->

</section>
<!-- /#primary -->

<?php get_footer(); ?>