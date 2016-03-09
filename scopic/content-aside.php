<?php if ( !is_single() ) { ?> <li class="animated fadeInUp"><?php } ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<?php if ( !is_single() ) { ?>

		<span class="entry-date"><?php ht_entry_date(); ?></span>

	<?php } ?>



	<!-- .hentry-box -->

	<div class="hentry-box">



		<!-- .entry-wrap -->

		<div class="entry-wrap">

			<header class="entry-header">

			<h1 class="entry-title"><?php the_title(); ?></h1>
            
			<?php if ( is_single() ) { ?>
             
		    <div class="entry-meta">

				<?php ht_entry_date(); ?> | 

             	<?php if(function_exists('the_views')) { the_views(); } ?>

            </div>
            <?php } ?>
			</header>





		<!-- .entry-content -->

		<div class="entry-content">

			<?php the_content(); ?>

		</div>

		<!-- /.entry-content -->



		</div>

		<!-- /.entry-wrap -->



	<!-- /.hentry-box -->

	</div>



	<?php get_template_part( 'content', 'entry-meta-footer' ); ?>  



	</article>

<?php if ( !is_single() ) { ?></li><?php } ?>