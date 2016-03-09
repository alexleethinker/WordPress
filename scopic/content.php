<?php if ( !is_single() ) { ?> <li class="animated fadeInUp"><?php } ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



    <?php if ( !is_single() ) { ?> 

        <span class="entry-date"><?php ht_entry_date(); ?></span>

    <?php } ?>



    <!-- .hentry-box -->

    <div class="hentry-box">



    <?php ht_post_format_standard(); ?>



    <div class="entry-wrap">

    <?php if (is_single() ) { ?>  





    <header class="entry-header">

		<?php if ($ht_post_title == true) { ?>

            <h1 class="entry-title"><?php the_title(); ?></h1>

            <div class="entry-meta">

                <?php ht_entry_date(); ?> | 

                <?php if(function_exists('the_views')) { the_views(); } ?>

            </div>
        
        <?php } ?>

    </header>



    	<div class="entry-content clearfix">

            <?php the_content(); ?>

            <?php numbered_in_page_links( array( 'before' => '<div class="page-links">' . __( '', 'framework' ), 'after' => '</div>' ) ); ?>

        </div>
        
			<?php if ($ht_post_title == false) { ?>

                <div class="entry-meta">
                
                    <?php ht_entry_date(); ?> | 
                    
                    <?php if(function_exists('the_views')) { the_views(); } ?>
                    
                </div>
            
			<?php } ?>

        <?php if ( has_tag() ) { ?>
			<br />

            	<div class="tags">

            		<?php the_tags( _e('', 'framework'),'',''); ?>

           		</div>

         <?php } ?>



    <?php } else { ?>



    <header class="entry-header">

    	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

    </header>



    <div class="entry-summary clearfix">

    	<?php the_excerpt(); ?>

    </div>





    <?php } ?>

    <!-- /.hentry-wrap -->

    </div>



    <!-- /.hentry-box -->

    </div>



    <?php get_template_part( 'content', 'entry-meta-footer' ); ?>  

 

</article>

<?php if ( !is_single() ) { ?></li><?php } ?>