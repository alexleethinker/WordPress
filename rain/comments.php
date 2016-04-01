<?php

if ( ! post_password_required() and ( comments_open() or ( get_comments_number() > 0 ) ) ) {

wp_enqueue_script( "comment-reply" );

?>

<div class="article_container">
    <article>
		<div class="comments_wrapper">
			<div id="comments">
				<h3>
					<?php comments_number(); ?>
				</h3>
				<ul>
					<?php wp_list_comments('avatar_size=80'); ?>
				</ul>
				<div class="comments_pagination clearfix">
					<div class="comments_prev">
						<?php previous_comments_link(); ?>
					</div>
					<div class="comments_next">
						<?php next_comments_link(); ?>
					</div>
				</div>
			</div>
			<?php comment_form();?>
			<div class="clear"></div>
		</div>
    </article>
</div>

<?php

}

?>
