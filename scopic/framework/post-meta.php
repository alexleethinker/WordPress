<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '_ht_';

global $meta_boxes;

$meta_boxes = array();

// Post Options
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'post_meta',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '页面布局', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
			// SELECT BOX
			array(
			'name' => __( '显示侧栏', 'framework' ),
			'id' => "{$prefix}post_sidebar",
			'type' => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options' => array(
				'sidebar-off' => __( '禁用', 'framework' ),
				'sidebar-left' => __( '左对齐', 'framework' ),
				'sidebar-right' => __( '右对齐', 'framework' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple' => false,
			'std'	=> __( '禁用', 'framework' ),
			),
			// CHECKBOX
			array(
			'name' => __( '显示详情', 'framework' ),
			'desc' => __( '选中后预览显示“详情”链接。', 'framework' ),
			'id' => "{$prefix}post_view_single",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

// Page Options
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'page_meta',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '页面布局', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
			// SELECT BOX
			array(
			'name' => __( '显示侧栏', 'framework' ),
			'id' => "{$prefix}page_sidebar",
			'type' => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options' => array(
				'sidebar-off' => __( '禁用', 'framework' ),
				'sidebar-left' => __( '左对齐', 'framework' ),
				'sidebar-right' => __( '右对齐', 'framework' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple' => false,
			'std'	=> __( '禁用', 'framework' ),
			),
	)
);

// Gallery Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_gallery',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '相册选项', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'             => __( '上传照片', 'framework' ),
			'id'               => "{$prefix}pf_gallery_image",
			'type'             => 'plupload_image',
			'max_file_uploads' => 0,
		),
		
			// CHECKBOX
			array(
			'name' => __( '显示标题', 'framework' ),
			'desc' => __( '选中后预览显示相册标题。', 'framework' ),
			'id' => "{$prefix}pf_gallery_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 0,
			),
			// CHECKBOX
			array(
			'name' => __( '显示摘要', 'framework' ),
			'desc' => __( '选中后预览显示相册摘要。', 'framework' ),
			'id' => "{$prefix}pf_gallery_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);


// Image Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_image',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '图像选项', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// OEMBED
			array(
			'name' => __( '图像链接', 'framework' ),
			'id' => "{$prefix}pf_image_oembed",
			'desc' => __( '请输入图像文件链接（目前仅支持 Instagram、Photobucket、SmugMug、Flickr 图像外链）。', 'framework' ),
			'type' => 'oembed',
		),
		
			// CHECKBOX
			array(
			'name' => __( '显示标题', 'framework' ),
			'desc' => __( '选中后预览显示图像标题。', 'framework' ),
			'id' => "{$prefix}pf_image_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 0,
			),
			// CHECKBOX
			array(
			'name' => __( '显示摘要', 'framework' ),
			'desc' => __( '选中后预览显示图像摘要。', 'framework' ),
			'id' => "{$prefix}pf_image_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

// Video Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_video',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '视频选项', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// OEMBED
			array(
			'name' => __( '视频链接', 'framework' ),
			'id' => "{$prefix}pf_video_oembed",
			'desc' => __( '请输入视频文件链接（目前仅支持 YouTube、Vimeo、Hulu、Qik 视频外链）。', 'framework' ),
			'type' => 'oembed',
		),
		// FILE ADVANCED (WP 3.5+)
		//array(
		//	'name' => __( '上传视频', 'framework' ),
		//	'id' => "{$prefix}pf_video_file",
		//	'type' => 'file_advanced',
		//	'max_file_uploads' => 1,
		//	'mime_type' => 'video', // Leave blank for all file types
		//),
		// IMAGE ADVANCED (WP 3.5+)
		//array(
		//'name' => __( '上传预览', 'framework' ),
		//'id' => "{$prefix}pf_video_file_poster",
		//'desc' => __( '（可选）', 'framework' ),
		//'type' => 'image_advanced',
		//'max_file_uploads' => 1,
		//),
		
			// CHECKBOX
			array(
			'name' => __( '显示标题', 'framework' ),
			'desc' => __( '选中后预览显示视频标题。', 'framework' ),
			'id' => "{$prefix}pf_video_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 0,
			),
			// CHECKBOX
			array(
			'name' => __( '显示摘要', 'framework' ),
			'desc' => __( '选中后预览显示视频摘要。', 'framework' ),
			'id' => "{$prefix}pf_video_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

// Audio Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_audio',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '音频选项', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// OEMBED
			array(
			'name' => __( '音频链接', 'framework' ),
			'id' => "{$prefix}pf_audio_oembed",
			'desc' => __( '请输入音频文件链接（目前仅支持 Soundcloud 音频外链）。', 'framework' ),
			'type' => 'oembed',
		),
		// FILE ADVANCED (WP 3.5+)
//		array(
//			'name' => __( 'Audio File Upload', 'framework' ),
//			'id' => "{$prefix}pf_audio_file",
//			'type' => 'file_advanced',
//			'max_file_uploads' => 1,
//			'mime_type' => 'audio', // Leave blank for all file types
//		),
		
			// CHECKBOX
			array(
			'name' => __( '显示标题', 'framework' ),
			'desc' => __( '选中后预览显示音频标题。', 'framework' ),
			'id' => "{$prefix}pf_audio_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 0,
			),
			// CHECKBOX
			array(
			'name' => __( '显示摘要', 'framework' ),
			'desc' => __( '选中后预览显示音频摘要。', 'framework' ),
			'id' => "{$prefix}pf_audio_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

// Quote Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_quote',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '引语选项', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name' => __( '引用内容', 'framework' ),
				'id' => "{$prefix}pf_quote",
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw' => false,
				'std' => __( '', 'framework' ),
					// Editor settings, see wp_editor() function: look4wp.com/wp_editor
					'options' => array(
					'textarea_rows' => 4,
					'teeny' => true,
					'media_buttons' => false,
					),
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name' => __( '引用出处', 'framework' ),
				// Field ID, i.e. the meta key
				'id' => "{$prefix}pf_quote_cite",
				// Field description (optional)
				'desc' => __( '（可选）', 'framework' ),
				'type' => 'text',
			),
			// COLOR
			array(
			'name' => __( '背景颜色', 'framework' ),
			'desc' => __( '自定义引语背景颜色（默认使用主题颜色）。', 'framework' ),
			'id' => "{$prefix}pf_quote_color",
			'type' => 'color',
			),
			
			// CHECKBOX
			array(
			'name' => __( '显示标题', 'framework' ),
			'desc' => __( '选中后预览显示引语标题。', 'framework' ),
			'id' => "{$prefix}pf_quote_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 0,
			),
			// CHECKBOX
			array(
			'name' => __( '显示摘要', 'framework' ),
			'desc' => __( '选中后预览显示引语摘要。', 'framework' ),
			'id' => "{$prefix}pf_quote_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);


// Link Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_link',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '链接选项', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
				// TEXT
			array(
			// Field name - Will be used as label
			'name' => __( '链接标题', 'framework' ),
			// Field ID, i.e. the meta key
			'id' => "{$prefix}pf_link_text",
			'type' => 'text',
			),
			// URL
			array(
				'name' => __( '链接地址', 'framework' ),
				'id' => "{$prefix}pf_link_url",
				'type' => 'url',
			),
			// COLOR
			array(
			'name' => __( '背景颜色', 'framework' ),
			'desc' => __( '自定义链接背景颜色（默认使用主题颜色）。', 'framework' ),
			'id' => "{$prefix}pf_link_color",
			'type' => 'color',
			),
			
			// CHECKBOX
			array(
			'name' => __( '显示标题', 'framework' ),
			'desc' => __( '选中后预览显示链接标题。', 'framework' ),
			'id' => "{$prefix}pf_link_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 0,
			),
			// CHECKBOX
			array(
			'name' => __( '显示摘要', 'framework' ),
			'desc' => __( '选中后预览显示链接摘要。', 'framework' ),
			'id' => "{$prefix}pf_link_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

// Status Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_status',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '状态选项', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// OEMBED
			array(
			'name' => __( '微博主页', 'framework' ),
			'id' => "{$prefix}pf_status_oembed",
			'desc' => __( '请输入个人主页链接（目前仅支持 Twitter 社交账号）。', 'framework' ),
			'type' => 'oembed',
		),
		// WYSIWYG/RICH TEXT EDITOR
			array(
				'name' => __( '发布状态', 'framework' ),
				'id' => "{$prefix}pf_status",
				'desc' => __( '请输入发布状态内容。', 'framework' ),
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw' => false,
				'std' => __( '', 'framework' ),
					// Editor settings, see wp_editor() function: look4wp.com/wp_editor
					'options' => array(
					'textarea_rows' => 4,
					'teeny' => true,
					'media_buttons' => false,
					),
			),
			// COLOR
			array(
			'name' => __( '背景颜色', 'framework' ),
			'desc' => __( '自定义状态背景颜色（默认使用主题颜色）。', 'framework' ),
			'id' => "{$prefix}pf_status_color",
			'type' => 'color',
			),
			
			// CHECKBOX
			array(
			'name' => __( '显示标题', 'framework' ),
			'desc' => __( '选中后预览显示状态标题。', 'framework' ),
			'id' => "{$prefix}pf_status_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 0,
			),
			// CHECKBOX
			array(
			'name' => __( '显示摘要', 'framework' ),
			'desc' => __( '选中后预览显示状态摘要。', 'framework' ),
			'id' => "{$prefix}pf_status_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);


// Chat Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_chat',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '聊天选项', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// WYSIWYG/RICH TEXT EDITOR
			array(
				'name' => __( '聊天副本', 'framework' ),
				'id' => "{$prefix}pf_chat_transcript",
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw' => false,
				'std' => __( '', 'framework' ),
					// Editor settings, see wp_editor() function: look4wp.com/wp_editor
					'options' => array(
					'textarea_rows' => 4,
					'teeny' => true,
					'media_buttons' => false,
					),
			),
			
			// CHECKBOX
			array(
			'name' => __( '显示标题', 'framework' ),
			'desc' => __( '选中后预览显示聊天标题。', 'framework' ),
			'id' => "{$prefix}pf_chat_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 0,
			),
			// CHECKBOX
			array(
			'name' => __( '显示摘要', 'framework' ),
			'desc' => __( '选中后预览显示聊天摘要。', 'framework' ),
			'id' => "{$prefix}pf_chat_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function ht_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'ht_register_meta_boxes' );
