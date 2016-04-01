<?php

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function rain_add_writepanel_custom_headlines() {
	add_meta_box(
		'rain_custom_headlines',
		__( '页面标题', 'rain' ),
		'rain_custom_headlines',
		'page'
	);
}
add_action( 'add_meta_boxes', 'rain_add_writepanel_custom_headlines' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function rain_custom_headlines( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'rain_custom_headlines', 'rain_custom_headlines_nonce' );

	/*
	* Use get_post_meta() to retrieve an existing value
	* from the database and use the value for the form.
	*/

	?>

	<p>
	<label for="rain_page_about_subline">
	<?php _e( "副标题", 'rain' ); ?>
	</label>
	<br />
	<input id="rain_page_about_subline" name="rain_page_about_subline" value="<?php 
	echo esc_attr( get_post_meta( $post->ID, 'rain_page_about_subline', true ) );
	?>" size="65" type="text">
	</p>

	<p>
	<label for="rain_page_about_headline">
	<?php _e( "大标题", 'rain' ); ?>
	</label>
	<br />
	<input id="rain_page_about_headline" name="rain_page_about_headline" value="<?php 
	echo esc_attr( get_post_meta( $post->ID, 'rain_page_about_headline', true ) );
	?>" size="65" type="text">
	</p>

	<?php
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function rain_writepanel_custom_headlines_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['rain_custom_headlines_nonce'] ) )
    return $post_id;

  $nonce = $_POST['rain_custom_headlines_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'rain_custom_headlines' ) )
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
  $mydata = htmlentities( $_POST['rain_page_about_subline'] );

  // Update the meta field in the database.
  update_post_meta( $post_id, 'rain_page_about_subline', $mydata );


  // Sanitize user input.
  $mydata = htmlentities( $_POST['rain_page_about_headline'] );

  // Update the meta field in the database.
  update_post_meta( $post_id, 'rain_page_about_headline', $mydata );
}
add_action( 'save_post', 'rain_writepanel_custom_headlines_save_postdata' );

