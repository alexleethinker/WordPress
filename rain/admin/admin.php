<?php
  
if( ! function_exists('is_admin') ) { exit; }
if( ! current_user_can('switch_themes') ) { exit; }

add_action( 'admin_menu', 'rain_admin_menu' );

function rain_admin_menu(){
	add_menu_page(
			"主题选项",
			"高级",
			"administrator",
			"rain_theme_options",
			"rain_theme_options"
	);


/*	add_submenu_page( 
			"rain_theme_options", 
			'主题帮助', 
			'帮助', 
			'manage_options', 
			'rain_help_admin_page', 
			'rain_help_admin_page'
	); */
}

global $_GET;
//if( !empty($_GET) and !empty($_GET['page']) and ( 'rain_theme_options' == $_GET['page']) ){
	
	add_action( 'admin_enqueue_scripts', 'rain_theme_options_enqueue' );
	
	function rain_theme_options_enqueue($hook) {
		wp_enqueue_script('media-upload');
		wp_enqueue_style('thickbox');
		wp_enqueue_script('thickbox');
		wp_enqueue_script( 'component-add-image.js', get_template_directory_uri().'/admin/component-add-image.js' );
		wp_enqueue_script( 'component-add-audio.js', get_template_directory_uri().'/admin/component-add-audio.js' );
		wp_enqueue_script( 'page-edit.js', get_template_directory_uri().'/admin/page-edit.js' );
	}

	global $_POST;
	if( !empty($_POST) ){
		foreach ( array(
                        'header-image',
                        'background-image',
                        'background-image-singles-from',
                        'background-rain',
                        'background-music-on',
                        'background-music-mp3',
                        'background-music-ogg',
                        'share-on',
    					'sharing-on',
						'trans-page-x-of-y',
                        'trans-table-of-cont',
                        'left-menu-post-per-slide',
                        'left-menu-post-count',
                    ) as $name) {
            
            if( isSet( $_POST[ $name ] ) ){
                update_option( $name, $_POST[ $name ] );    
            } 

        } // foreach

        if( ! isSet( $_POST[ 'share-on' ] ) ){
            update_option( 'share-on', array() );    
        } 
	}

//}

function rain_help_admin_page(){
?>
<div class="wrap">
<h2>帮助文档</h2>

<div style="font-family: Arial; color: #909090; font-size: 18px; margin: 30px 0 0 0;">
	RAIN Pro 由
	<a target="_blank" href="http://osslab.online/">
		开源软件实验室
	</a>
    提供技术支持
</div>		


</div>
<?php	
}

function rain_theme_options(){
	//wp_enque_script('wp-plupload');

?>	
<div class="wrap">
<h2>主题选项</h2>


<h3><?php _e('标志', 'rain'); ?></h3>
<form method="post" action="">
<table class="form-table">
<tbody>
<tr valign="top">
<th scope="row"><?php _e('站点徽标', 'rain'); ?></th>
<td>
	<input id="header-image" name="header-image" value="<?php 
	echo sanitize_text_field( rain_get_option('header-image') ); 
	?>" size="65" type="text">
	<a href="#" data-image-input="header-image" class="thickbox add_media button add_image_button" title="<?php _e('上传', 'rain'); ?>">
		<span class="add_image_button_icon"></span>
		<?php _e('上传', 'rain'); ?>
	</a>
</td>
</tr>
</tbody>
</table>


<h3><?php _e('背景', 'rain'); ?></h3>
<table class="form-table">
<tbody>
<tr valign="top">
<th scope="row"><?php _e('背景图像', 'rain'); ?></th>
<td>
	<input id="background-image" name="background-image" value="<?php 
	echo sanitize_text_field( rain_get_option('background-image') ); 
	?>" size="65" type="text">
	<a href="#" data-image-input="background-image" class="thickbox add_media button add_image_button" title="<?php _e('上传', 'rain'); ?>">
		<span class="add_image_button_icon"></span>
		<?php _e('上传', 'rain'); ?>
	</a>
</td>
</tr>
<?php if( function_exists('s8_get_taxonomy_image_src') ){ ?>
<tr valign="top">
<th scope="row"><?php _e('背景页面', 'rain'); ?></th>
<td>
	<select id="background-image-singles-from" name="background-image-singles-from">
		<option value="category"><?php _e('分类目录', 'rain'); ?> &nbsp; </option>
		<option 
		<?php if( 'tag' == get_option('background-image-singles-from') ) { 
			echo 'selected="selected"';
		} ?>
				value="tag"><?php _e('标签', 'rain'); ?> &nbsp; </option>
	</select>
</td>
</tr>
<?php } ?>
<tr valign="top">
<th scope="row"><?php _e('图像特效', 'rain'); ?></th>
<td>
	<select id="background-rain" name="background-rain">
		<option value="1"><?php _e('启用', 'rain'); ?> &nbsp; </option>
		<option 
		<?php if( 1 != get_option('background-rain') ) { 
			echo 'selected="selected"';
		} ?>
				value="0"><?php _e('禁用', 'rain'); ?> &nbsp; </option>
	</select>
</td>
</tr>
</tbody>
</table>

<h3><?php _e('音乐', 'rain'); ?></h3>
<table class="form-table">
<tbody>
<tr valign="top">
<th scope="row"><?php _e('自动播放','rain'); ?></th>
<td>
	<select id="background-music-on" name="background-music-on">
		<option value="1"><?php _e('启用', 'rain'); ?> &nbsp; </option>
		<option 
		<?php if( 1 != get_option('background-music-on') ) { 
			echo 'selected="selected"';
		} ?>
				value="0"><?php _e('禁用', 'rain'); ?> &nbsp; </option>
	</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('背景音乐', 'rain'); ?> (MP3)</th>
<td>
	<input id="background-music-mp3" name="background-music-mp3" value="<?php 
	echo sanitize_text_field( rain_get_option('background-music-mp3') ); 
	?>" size="65" type="text">
	<a href="#" data-audio-input="background-music-mp3" class="thickbox add_media button add_audio_button" title="Add Media">
		<span class="add_audio_button_icon"></span>
		<?php _e('上传', 'rain'); ?>
	</a>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('背景音乐', 'rain'); ?> (OGG)</th>
<td>
	<input id="background-music-ogg" name="background-music-ogg" value="<?php 
	echo sanitize_text_field( rain_get_option('background-music-ogg' ) ); 
	?>" size="65" type="text">
	<a href="#" data-audio-input="background-music-ogg" class="thickbox add_media button add_audio_button" title="Add Media">
		<span class="add_audio_button_icon"></span>
        <?php _e('上传', 'rain'); ?>
	</a>
</td>
</tr>

</tbody>
</table>


<h3><?php _e('文章', 'rain'); ?></h3>
<table class="form-table">
<tbody>
<tr valign="top">
<th scope="row"><?php _e('每页数量','rain'); ?></th>
<td>
    <input id="left-menu-post-per-slide" name="left-menu-post-per-slide" value="<?php 
    echo sanitize_text_field( rain_get_option('left-menu-post-per-slide' ) ); 
    ?>" size="5" type="number">
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('章节目录', 'rain'); ?></th>
<td>
    <input id="left-menu-post-count" name="left-menu-post-count" value="<?php 
    echo sanitize_text_field( rain_get_option('left-menu-post-count' ) ); 
    ?>" size="5" type="number">
</td>
</tr>

</tbody>
</table>


<h3><?php _e('分享', 'rain'); ?></h3>
<table class="form-table">
<tbody>

<tr valign="top">
<th scope="row"><?php _e('社交媒体','rain'); ?></th>
<td>
	<select id="sharing-on" name="sharing-on">
		<option value="1"><?php _e('启用', 'rain'); ?> &nbsp; </option>
		<option 
		<?php if( 1 != get_option('sharing-on') ) { 
			echo 'selected="selected"';
		} ?>
				value="0"><?php _e('禁用', 'rain'); ?> &nbsp; </option>
	</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('开放平台', 'rain'); ?></th>
<td>
	<?php 
		$sites = array(
			'googleplus' => 'Google+',
			'twitter'    => 'Twitter',
			'facebook'   => 'Facebook',
		);
		$_share_on = rain_get_option( 'share-on' );
		foreach ($sites as $social_slug => $social_label) {
			echo '<label>';
			echo '<input type="checkbox" name="share-on[]" value="'.$social_slug.'"';
			if( in_array($social_slug, $_share_on) ){
				echo ' checked="checked"';
			}
			echo '>';
			echo ' '. $social_label;
			echo '</label><br />';
		}
	?>
</td>
</tr>

</tbody>
</table>


<h3><?php _e('标签', 'rain'); ?></h3>

<table class="form-table">
<tbody>
<tr valign="top">
<th scope="row"><?php _e('文章目录', 'rain'); ?></th>
<td>
    <input id="trans-table-of-cont" name="trans-table-of-cont" value="<?php 
    echo sanitize_text_field( rain_get_option('trans-table-of-cont' ) ); 
    ?>" size="65" type="text">
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('章节显示', 'rain'); ?></th>
<td>
    <input id="trans-page-x-of-y" name="trans-page-x-of-y" value="<?php 
    echo sanitize_text_field( rain_get_option('trans-page-x-of-y' ) ); 
    ?>" size="65" type="text">
</td>
</tr>

</tbody>
</table>

<p class="submit">
	<input type="submit" name="submit" id="submit" class="button button-primary" value="保存">
</p>
</form>

</div>
<?php
}

