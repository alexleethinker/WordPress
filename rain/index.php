<?php get_header(); ?>

<main class="content" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'loop' ); ?>
    <?php endwhile; ?>

    <?php rain_pagination(); ?>
    
</main>

<div id="cat-nav">
	<div class="cat-nav-left">
		<div class="vertical">
			<div class="prev-post fa fa-angle-up"></div>
			<div class="next-post fa fa-angle-down"></div>
			<div class="cat-nav-posts">
				<?php
				
					rewind_posts();
				
					while ( have_posts() ) : the_post(); 
						echo '<div class="cat-nav-post">';
						the_title();
						echo '</div>';
					endwhile; 
				
					rewind_posts();

				?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
