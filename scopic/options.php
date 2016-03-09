<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'framework'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'framework'),
		'two' => __('Two', 'framework'),
		'three' => __('Three', 'framework'),
		'four' => __('Four', 'framework'),
		'five' => __('Five', 'framework')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'framework'),
		'two' => __('Pancake', 'framework'),
		'three' => __('Omelette', 'framework'),
		'four' => __('Crepe', 'framework'),
		'five' => __('Waffle', 'framework')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/framework/images/';

	$options = array();
		
	$options[] = array(
		'name' => __('文章属性', 'framework'),
		'type' => 'heading');
		
		$options[] = array(
						'name' => __('内容数据', 'framework'),
						'desc' => __('选择是否显示文章内容数据。', 'framework'),
						'id' => 'ht_post_meta',
						'std' => array(
									'date' => '1',
									'author' => '1',
									'category' => '1',
									'tags' => '0',
									'comments' => '0'), // On my default
						'type' => 'multicheck',
						'options' => array(
										'date' => __('日期', 'framework'),
										'author' => __('作者', 'framework'),
										'category' => __('分类目录', 'framework'),
										'tags' => __('标签', 'framework'),
										'comments' => __('评论', 'framework')),
						);
						
	
			
	$options[] = array(
						'name' => __('作者详情', 'framework'),
						'desc' => __('选中后显示文章作者详情（注意：该作者必须设置头像）。', 'framework'),
						'id' => 'ht_post_authorbox',
						'std' => '1',
						'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('显示侧栏', 'framework'),
		'type' => 'heading');
		
	$options[] = array( "name" => __("内容归档", "framework"),
						"desc" => __("选择或禁用内容归档页面侧栏组件。", "framework"),
						"id" => "ht_sidebar_archive",
						"std" => "sidebar-right",
						"type" => "images",
						"options" => array(
						"sidebar-off" => $imagepath . "fullwidth.png",
						"sidebar-left" => $imagepath . "sidebar-left.png",
						"sidebar-right" => $imagepath . "sidebar-right.png")
						);
						
	$options[] = array( "name" => __("作者归档", "framework"),
						"desc" => __("选择或禁用作者归档页面侧栏组件。", "framework"),
						"id" => "ht_sidebar_author",
						"std" => "sidebar-right",
						"type" => "images",
						"options" => array(
						"sidebar-off" => $imagepath . "fullwidth.png",
						"sidebar-left" => $imagepath . "sidebar-left.png",
						"sidebar-right" => $imagepath . "sidebar-right.png")
						);
						
	$options[] = array( "name" => __("分类目录", "framework"),
						"desc" => __("选择或禁用分类目录页面侧栏组件。", "framework"),
						"id" => "ht_sidebar_catgegory",
						"std" => "sidebar-right",
						"type" => "images",
						"options" => array(
						"sidebar-off" => $imagepath . "fullwidth.png",
						"sidebar-left" => $imagepath . "sidebar-left.png",
						"sidebar-right" => $imagepath . "sidebar-right.png")
						);
						
	$options[] = array( "name" => __("文章页面", "framework"),
						"desc" => __("选择或禁用文章页面侧栏组件（提示：可在文章编辑器中单独设置每篇文章的侧栏显示位置）。", "framework"),
						"id" => "ht_sidebar_blog",
						"std" => "sidebar-off",
						"type" => "images",
						"options" => array(
						"sidebar-off" => $imagepath . "fullwidth.png",
						"sidebar-left" => $imagepath . "sidebar-left.png",
						"sidebar-right" => $imagepath . "sidebar-right.png")
						);
						
	$options[] = array( "name" => __("搜索结果", "framework"),
						"desc" => __("选择或禁用搜索页面侧栏组件。", "framework"),
						"id" => "ht_sidebar_search",
						"std" => "sidebar-right",
						"type" => "images",
						"options" => array(
						"sidebar-off" => $imagepath . "fullwidth.png",
						"sidebar-left" => $imagepath . "sidebar-left.png",
						"sidebar-right" => $imagepath . "sidebar-right.png")
						);
						
	$options[] = array( "name" => __("标签归档", "framework"),
						"desc" => __("选择或禁用标签页面侧栏组件。", "framework"),
						"id" => "ht_sidebar_tags",
						"std" => "sidebar-right",
						"type" => "images",
						"options" => array(
						"sidebar-off" => $imagepath . "fullwidth.png",
						"sidebar-left" => $imagepath . "sidebar-left.png",
						"sidebar-right" => $imagepath . "sidebar-right.png")
						);

	$options[] = array(
		'name' => __('高级选项', 'framework'),
		'type' => 'heading');
		
		
		
	$options[] = array( "name" => __("定制样式", "framework"),
						"desc" => __("自定义主题或页面样式。", "framework"),
						"id" => "ht_custom_css",
						"std" => "",
						"type" => "textarea");	



	return $options;
}