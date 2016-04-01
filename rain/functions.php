<?php

if ( ! isset( $content_width ) ) {
	global $content_width;
	$content_width = 583;
}

function rain_default_option($name){
	switch ($name) {
		case 'header-image':         return get_template_directory_uri().'/assets/images/logo.png';
		case 'background-image':     return '';
		case 'background-image-singles-from':     
		                             return 'category';
		case 'background-rain':      return 1;
		case 'background-music-on':  return 1;
		case 'background-music-mp3': return get_template_directory_uri().'/assets/audio/rain.mp3';
		case 'background-music-ogg': return get_template_directory_uri().'/assets/audio/rain.ogg';
		case 'share-on':             return array('googleplus','facebook','twitter');
		case 'sharing-on':           return 1;
		case 'left-menu-post-per-slide':return 5;
		case 'left-menu-post-count': return 50;
		case 'trans-page-x-of-y':    return '第 %s 页 / 共 %s 页';
		case 'trans-table-of-cont':  return '最新章节';
	}
	return null;
}

function rain_get_option_background_image(){
	if( is_page() or is_singular('post') ){
		$image_src = get_post_meta( get_the_ID(), 'rain_background', true );
		if( !empty($image_src) ){
			return $image_src; 
		}
	}

	if( function_exists('s8_get_taxonomy_image_src') ){
		if( is_singular('post') ){
			// if WP background filled, then result is returned
			if( 'category' == rain_get_option('background-image-singles-from') ){
				$single_walk = array( 'cat', 'tag' );
			}else{
				$single_walk = array( 'tag', 'cat' );
			}

			foreach ($single_walk as $tax) {
				if( 'tag' == $tax ){
					$tags = get_the_terms( get_the_ID(), 'post_tag' );
					if( !empty($tags) ){
						foreach ($tags as $key => $tag) {
							$image = s8_get_taxonomy_image_src( $tag, 'fullwidth');
							if( $image ){
								return $image['src'];
							}
						}
					}
				}
				if( 'cat' == $tax ){
					$cats = get_the_category( get_the_ID() );
					if( !empty($cats) ){
						foreach ($cats as $key => $cat) {
							$image = s8_get_taxonomy_image_src( $cat, 'fullwidth');
							if( $image ){
								return $image['src'];
							}
						}
					}
				}
			}
		}

		if( is_category() ){
			$image = s8_get_taxonomy_image_src( get_category(get_query_var('cat')), 'fullwidth');
			if( $image ){
				return $image['src'];
			}
		}
		if( is_tag() ){
			$image = s8_get_taxonomy_image_src( get_tag(get_query_var('tag_id')), 'fullwidth');
			if( $image ){
				return $image['src'];
			}
		}
	}

	$default = rain_default_option( 'background-image' );
	return get_option( 'background-image', $default );
}

function rain_get_option($name){
	if( 'background-image' == $name ){
		return rain_get_option_background_image();
	}

	$default = rain_default_option( $name );
	return get_option( $name, $default );
}

function rain_setup() {

	register_nav_menu( 'primary', __( '主菜单', 'rain' ) );
	register_nav_menu( 'about', __( '关于作者', 'rain' ) );

    add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	
	load_theme_textdomain('rain', get_template_directory() . '/languages');
}

add_action( 'after_setup_theme', 'rain_setup' );

function rain_scripts_styles() {

	wp_enqueue_style('ff_normalize', get_template_directory_uri().'/assets/css/normalize.css');
    wp_enqueue_style('ff_font_awesome', get_template_directory_uri().'/assets/fonts/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('ff_stylesheet',   get_stylesheet_uri() ); // style.css


    wp_enqueue_script('jquery');

	if( 1 == rain_get_option('background-rain') ) {
		wp_enqueue_script( 'rainyday',      
			get_template_directory_uri().'/assets/js/rainyday.js', 
			array('jquery'), false, true );
		wp_enqueue_script( 'init_rainyday', 
			get_template_directory_uri().'/assets/js/init_rainyday.js', 
			array('jquery', 'rainyday'), false, true );
	}

	wp_enqueue_script(
		'rain_index',
		get_template_directory_uri().'/assets/js/index.js', 
		array('jquery'), false, true);

	wp_enqueue_script(
		'carufredsel',
		get_template_directory_uri().'/assets/js/jquery.caroufredsel.min.js', 
		array('jquery'), false, true);

	wp_enqueue_script(
		'left_sliding',
		get_template_directory_uri().'/assets/js/left-sliding.js', 
		array('carufredsel'), false, true);

	wp_enqueue_script( 'init_music',
		get_template_directory_uri().'/assets/js/init_music.js', 
		array('jquery', 'rain_index'), false, true );
}
add_action( 'wp_enqueue_scripts', 'rain_scripts_styles' );

function rain_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'rain_add_editor_styles' );

function rain_background(){
	$background_image = rain_get_option('background-image' );
	if( empty($background_image) ){
		return;
	}
	echo '
		<div style="overflow:hidden; left:10px; height:0; width:0;">
			<img id="site-bg-image" alt="background" src="'.$background_image.'">
		</div>
		<div id="ccontainer" data-bg="'.$background_image.'">
			<div id="cholder">
				<canvas id="canvas"></canvas>
			</div>
			<div id="choverbg"></div>
		</div>
	';
}

function rain_get_background_music(){
	$background_music_on  = rain_get_option('background-music-on');
	if( 1 != $background_music_on ) {
		return false;
	}

	$background_music_mp3 = rain_get_option('background-music-mp3');
	$background_music_ogg = rain_get_option('background-music-ogg');

	if( empty($background_music_ogg) and empty($background_music_ogg) ){
		return false;
	}

	if( !empty($background_music_mp3) ) $background_music_mp3 = ' data-mp3="'.$background_music_mp3.'"';
	if( !empty($background_music_ogg) ) $background_music_ogg = ' data-ogg="'.$background_music_ogg.'"';

	return $background_music_mp3.$background_music_ogg; 
}

function rain_background_music(){
	$background_music = rain_get_background_music();
	if( false == $background_music ){
		return;
	}
	
	echo '
		<div class="music-toggle"'.$background_music.'>
			<ul class="bars clearfix">
				<li class="bar1"></li>
				<li class="bar2"></li>
				<li class="bar3"></li>
				<li class="bar4"></li>
				<li class="hidden"></li>
			</ul>
		</div>
	';
}

function rain_blog_logo(){
	$logo_image = rain_get_option('header-image');
	if( empty($logo_image) ){
		return;
	}
	echo '
		<a id="blog-logo" href="' . get_site_url() . '/">
			<img src="'.$logo_image.'" alt="" />
		</a>
	';
}

if ( ! shortcode_exists( 'dropcap' ) ) {
	function rain_shortcode_dropcap( $atts, $content ) {
		return '<span class="dropcap">'.$content.'</span>';
	}
	add_shortcode( 'dropcap', 'rain_shortcode_dropcap' );
}

function rain_pagination(){
	
	global $paged;
	global $wp_query;
	$max_num_pages = 1*$wp_query->max_num_pages;

	if( empty($max_num_pages) ){
		return;
	}

	$tmp_paged = $paged;
	if( $max_num_pages == 1 ){
		$tmp_paged = 1;
	}

	echo '<nav class="pagination">';
	
	previous_posts_link('<span class="newer-posts fa fa-angle-left"></span>'); 
	next_posts_link('<span class="older-posts fa fa-angle-right"></span>'); 

	echo '<span class="page-number">';
	printf( rain_get_option('trans-page-x-of-y'), $paged, $max_num_pages );
	echo '</span>';
	echo '</nav>';
} 

if( current_user_can('switch_themes') ){
	require get_template_directory()."/admin/admin.php";
	require get_template_directory()."/admin/admin_writepanel_bg.php";
	require get_template_directory()."/admin/admin_writepanel_page_about.php";
}
require_once get_template_directory().'/libs/tgm/activate.php';
require_once get_template_directory().'/libs/socialSharer/get_social_links.php';

function rain_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'rain_remove_more_link_scroll' );
