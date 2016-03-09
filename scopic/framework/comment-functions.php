<?php

/**

 * Functions for handling how comments are displayed and used on the site. This allows more precise 

 * control over their display and makes more filter and action hooks available to developers to use in their 

 * customizations.

 */





if ( ! function_exists( 'ht_comment' ) ) :

/**

 * Template for comments and pingbacks.

 *

 * To override this walker in a child theme without modifying the comments template

 * simply create your own st_comment(), and that function will be used instead.

 *

 * Used as a callback by wp_list_comments() for displaying the comments.

 *

 */

function ht_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;

	switch ( $comment->comment_type ) :

		case 'pingback' :

		case 'trackback' :

		// Display trackbacks differently than normal comments.

	?>



<li class="post pingback">

  <p>

    <?php _e( '通告：', 'framework' ); ?>

    <?php comment_author_link(); ?>

    <?php edit_comment_link( __( '[编辑]', 'framework' ), ' ' ); ?>

  </p>

  <?php

break;

default :

?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

  <article id="comment-<?php comment_ID(); ?>" class="comment-block" itemtype="http://schema.org/UserComments" itemscope itemprop="comment">

  



    <!-- .comment-meta -->

    <header class="comment-header">

    

    <!-- .comment-action -->

    <div class="comment-action">

      <?php edit_comment_link( __( '编辑', 'framework' ), '<i class="icon-edit"></i> ', '' ); ?>

      <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '回复', 'framework' ), 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '<i class="icon-reply"></i> '  ) ) ); ?>

    </div>

    <!-- /.comment-action -->

    

    	<div class="comment-author" itemtype="http://schema.org/Person" itemscope itemprop="creator"> 

			<?php echo get_avatar( $comment, 50 ); ?>

			<span itemprop="name"><?php printf( __( '%s', 'framework' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></span>

            <time datetime="<?php comment_time( 'c' ); ?>" itemprop="commentTime">

			<a itemprop="url" class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><i class="icon-circle"></i><?php echo human_time_diff( get_comment_time('U'), current_time('timestamp', 1) ) . '前'; ?></a>

		</time>

        </div>



    </header>

    <!-- /.comment-meta -->

    

    <?php if ( '0' == $comment->comment_approved ) : ?>

    <p class="comment-awaiting-moderation">

      <?php _e( '发表成功！正在等待审核...', 'framework' ); ?>

    </p>

    <?php endif; ?>

    <div class="comment-content clearfix" itemprop="commentText">

      <?php comment_text(); ?>

    </div >

    

    

    

   

  </article>

  <!-- #comment-## -->

  <?php

		break;

	endswitch; // end comment_type check

}

endif;







function st_comment_form_args( $args ) {

	global $user_identity;



	/* Get the current commenter. */

	$commenter = wp_get_current_commenter();



	/* Create the required <span> and <input> element class. */

	$req = ( ( get_option( 'require_name_email' ) ) ? ' <span class="required">' . __( '*', 'framework' ) . '</span> ' : '' );

	$input_class = ( ( get_option( 'require_name_email' ) ) ? ' req' : '' );



	/* Sets up the default comment form fields. */

	$fields = array(

		'author' => '<p class="form-author clearfix' . esc_attr( $input_class ) . '"><label for="author">' . __( '姓名', 'framework' ) . $req . '</label> <input type="text" class="text-input" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="40" /></p>',

		'email'  => '<p class="form-email clearfix' . esc_attr( $input_class ) . '"><label for="email">' . __( '邮箱', 'framework' ) . $req . '</label> <input type="text" class="text-input" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="40" /></p>',

		'url'    => '<p class="form-url clearfix"><label for="url">' . __( '主页', 'framework' ) . '</label><input type="text" class="text-input" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="40" /></p>'

	);



	/* Sets the default arguments for displaying the comment form. */

	$args = array(

		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),

		'comment_field'        => '<p class="form-textarea req clearfix"><label for="comment">' . __( '', 'framework' ) . '</label><textarea name="comment" id="comment" cols="60" rows="5"></textarea></p>',

		'must_log_in'          => '<p class="alert">' . sprintf( __( '请先 <a href="%1$s" title="登录">登录</a> 后发表评论。', 'framework' ), wp_login_url( get_permalink() ) ) . '</p><!-- .alert -->',

		'logged_in_as'         => '<p class="log-in-out">' . sprintf( __( '当前用户：<a href="%1$s" title="%2$s">%2$s</a>', 'framework' ), admin_url( 'profile.php' ), esc_attr( $user_identity ) ) . ' <a href="' . wp_logout_url( get_permalink() ) . '" title="' . esc_attr__( '注销', 'framework' ) . '">' . __( '注销 &raquo;', 'framework' ) . '</a></p><!-- .log-in-out -->',

		'comment_notes_before' => '',

		'comment_notes_after'  => '',

		'id_form'              => 'commentform',

		'id_submit'            => 'submit',

		'title_reply'          => __( '发表评论', 'framework' ),

		'title_reply_to'       => __( '回复%s', 'framework' ),

		'cancel_reply_link'    => __( '取消', 'framework' ),

		'label_submit'         => __( '发表', 'framework' ),

	);



	/* Return the arguments for displaying the comment form. */

	return $args;

}



/* Filter the comment form defaults. */

add_filter( 'comment_form_defaults', 'st_comment_form_args' );





