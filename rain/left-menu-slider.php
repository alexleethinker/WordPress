<div class="menu">
	<div class="menu-inner">
		<div class="mobile-menu-toc-button">
	        <div class="menu_button">
	            <i class="fa fa-times-circle-o "></i>
	        </div>
	    </div>
		<?php 
		$trans_table_of_cont = rain_get_option('trans-table-of-cont' ); 
		$trans_table_of_cont = trim($trans_table_of_cont);
		if( ! empty($trans_table_of_cont) ){
			echo '<h4 class="menu-title table-of-contents">'.$trans_table_of_cont.'</h4>';
		}
		?>

		<div class="clearfix left-nav-posts">

			<div id="post-slider">
			<?php 

			$_post_count_per_slide = rain_get_option('left-menu-post-per-slide');
			$_post_count           = rain_get_option('left-menu-post-count');

			$left_menu_slider_posts = get_posts( array( 'posts_per_page' => $_post_count ) );

			$_post_count = count($left_menu_slider_posts);

			foreach ($left_menu_slider_posts as $index=>$single_one_post) {
				if( 0 == $index % $_post_count_per_slide ){
					if( 0 != $index ){
						echo '</ul></div>';
					}
					echo '<div class="posts-slide"><ul class="clearfix">';
				}
				?>
					<li>
						<h3>
							<a href="<?php echo get_permalink( $single_one_post->ID ); ?>"><?php echo get_the_title( $single_one_post->ID ); ?></a>
						</h3>
						<div class="post-meta-date"><?php echo get_the_time(get_option('date_format'), $single_one_post->ID); ?></div>
					</li>
				<?php
			}
			echo '</ul></div>';
			?>
			</div>

			<nav class="pagination">
				<a href="#">
					<span class="older-posts fa fa-angle-right"></span>
				</a>
				<a href="#">
					<span class="newer-posts fa fa-angle-left"></span>
				</a>
				<span class="page-number"><?php
					printf( 
						rain_get_option('trans-page-x-of-y'), 
						'<span class="posts-tab"></span>', 
						"".ceil( $_post_count / $_post_count_per_slide )
					);
				?></span>
			</nav>

		</div>



		<div class="primary-navigation">
		<?php
		wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'left-nav-menu', 'depth' => '0' ) );
		?>
		</div>
	</div>
</div>
	