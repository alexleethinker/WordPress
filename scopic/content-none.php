<?php
/**
 * The template for displaying a "No posts found" message.
 */
?>      
                
<article id="post-0" class="post no-results not-found">
			<h1 class="entry-title"><?php _e( '未找到相关内容', 'framework' ); ?></h1>

		<div class="entry-content">
			<p><?php _e('你可以 ', 'framework'); ?><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('返回首页', 'framework'); ?></a><?php _e(' 或 搜索关键词', 'framework'); ?></p>
			<?php get_search_form(); ?>
		</div>
	</article>