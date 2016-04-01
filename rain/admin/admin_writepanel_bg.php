<?php

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function rain_add_writepanel_custom_bg() {
	add_meta_box(
		'rain_custom_bg',
		__( '背景图像', 'rain' ),
		'rain_custom_bg',
		'post'
	);
	add_meta_box(
		'rain_custom_bg',
		__( '背景图像', 'rain' ),
		'rain_custom_bg',
		'page'
	);
}
add_action( 'add_meta_boxes', 'rain_add_writepanel_custom_bg' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function rain_custom_bg( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'rain_custom_bg', 'rain_custom_bg_nonce' );

	/*
	* Use get_post_meta() to retrieve an existing value
	* from the database and use the value for the form.
	*/

	?>
	<p>
	<label for="rain_background">
	<?php /*?><?php _e( "请选择或上传背景图像", 'rain' ); ?><?php */?>
	</label>
	<br />
	<input id="rain_background" name="rain_background" value="<?php 
	echo esc_attr( get_post_meta( $post->ID, 'rain_background', true ) );
	?>" size="65" type="text">
	<a href="#" data-image-input="rain_background" class="thickbox add_media button add_image_button" title="<?php _e('上传', 'rain'); ?>">
		<span class="add_image_button_icon"></span>
		<?php _e('上传', 'rain'); ?>
	</a>
	</p>

	<?php
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function rain_custom_bg_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['rain_custom_bg_nonce'] ) )
    return $post_id;

  $nonce = $_POST['rain_custom_bg_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'rain_custom_bg' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'post' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
  $mydata = htmlentities( $_POST['rain_background'] );

  // Update the meta field in the database.
  update_post_meta( $post_id, 'rain_background', $mydata );
}
add_action( 'save_post', 'rain_custom_bg_save_postdata' );

