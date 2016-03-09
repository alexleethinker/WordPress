<?php

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function ht_customizer( $wp_customize ) {
	
	/**
 	* Header Section
 	*/
	$wp_customize->add_section('ht_header', array(
		'title' => __( '页眉设置', 'framework' ),
		'description' => '',
		'priority' => 30,
	) );
	
	$wp_customize->add_setting( 'blogname', array(
		'default'    => get_option( 'blogname' ),
		'type'       => 'option',
		'capability' => 'manage_options',
	) );

	$wp_customize->add_control( 'blogname', array(
		'label'      => __( '站点标题', 'framework' ),
		'section'    => 'ht_header',
	) );

	$wp_customize->add_setting( 'blogdescription', array(
		'default'    => get_option( 'blogdescription' ),
		'type'       => 'option',
		'capability' => 'manage_options',
	) );

	$wp_customize->add_control( 'blogdescription', array(
		'label'      => __( '副标题', 'framework' ),
		'section'    => 'ht_header',
	) );
	
	
	// Add logo to Site Title & Tagline Section
	$wp_customize->add_setting( 'ht_site_logo', array('default' => get_template_directory_uri() . '/images/logo.png') );
 
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ht_site_logo', array(
		'label' => __( '网站标识', 'framework' ),
		'section' => 'ht_header',
		'settings' => 'ht_site_logo')
	) );
	
	// Add avatar
	$wp_customize->add_setting( 'ht_site_avatar');
 
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ht_site_avatar', array(
		'label' => __( '个性头像', 'framework' ),
		'section' => 'ht_header',
		'settings' => 'ht_site_avatar')
	) );
	
	// RSS Option
	$wp_customize->add_setting('ht_header_rss');

	$wp_customize->add_control('ht_header_rss',	array(
		'type' => 'checkbox',
		'label' => __( '隐藏 RSS 链接', 'framework' ),
		'section' => 'ht_header',
	) );
	
	// Email Option
	$wp_customize->add_setting('ht_header_email');

	$wp_customize->add_control('ht_header_email',	array(
		'type' => 'text',
		'label' => __( '站长邮箱', 'framework' ),
		'section' => 'ht_header',
	));
	
	// Twitter Option
	$wp_customize->add_setting('ht_header_twitter');

	$wp_customize->add_control('ht_header_twitter',	array(
		'type' => 'text',
		'label' => __( 'Twitter', 'framework' ),
		'section' => 'ht_header',
	));
	
	// Facebook Option
	$wp_customize->add_setting('ht_header_facebook');

	$wp_customize->add_control('ht_header_facebook', array(
		'type' => 'text',
		'label' => __( 'Facebook', 'framework' ),
		'section' => 'ht_header',
	));
	
	// Google+ Option
	$wp_customize->add_setting('ht_header_google');

	$wp_customize->add_control('ht_header_google',	array(
		'type' => 'text',
		'label' => __( 'Google+', 'framework' ),
		'section' => 'ht_header',
	));
	
	// Pinterest Option
	$wp_customize->add_setting('ht_header_pinterest');

	$wp_customize->add_control('ht_header_pinterest',	array(
		'type' => 'text',
		'label' => __( 'Pinterest', 'framework' ),
		'section' => 'ht_header',
	));
	
	// LinkedIn Option
	$wp_customize->add_setting('ht_header_linkedin');

	$wp_customize->add_control('ht_header_linkedin',	array(
		'type' => 'text',
		'label' => __( 'LinkedIn', 'framework' ),
		'section' => 'ht_header',
	));
	
	// Flickr Option
	$wp_customize->add_setting('ht_header_flickr');

	$wp_customize->add_control('ht_header_flickr',	array(
		'type' => 'text',
		'label' => __( 'Flickr', 'framework' ),
		'section' => 'ht_header',
	));
	
	// Instagram Option
	$wp_customize->add_setting('ht_header_instagram');

	$wp_customize->add_control('ht_header_instagram',	array(
		'type' => 'text',
		'label' => __( 'Instagram', 'framework' ),
		'section' => 'ht_header',
	));

	/**
 	* Footer Section
 	*/
    $wp_customize->add_section('ht_footer', array(
		'title' => __( '页脚样式', 'framework' ),
		'description' => '',
		'priority' => 35,
	) );
	
	// footer widget layout option
	$wp_customize->add_setting('ht_style_footerwidgets', array('default' => '3col') );
 
	$wp_customize->add_control('ht_style_footerwidgets', array(
			'type' => 'select',
			'label' => __( '页脚布局', 'framework' ),
			'section' => 'ht_footer',
			'choices' => array(
				'off' => '禁用',
				'2col' => '两栏',
				'3col' => '三栏',
				'4col' => '四栏',
			),
	) );
	
	// site coypright
	$wp_customize->add_setting( 'ht_copyright', array(
		'default' => '&copy; Copyright Wall·E',
	) );
	 
	$wp_customize->add_control( 'ht_copyright', array(
		'type' => 'textarea',
		'label'   => __( '版权说明', 'framework' ),
		'section' => 'ht_footer',
		'settings'   => 'ht_copyright',
	));
	
	
	/**
 	* Styling Section
 	*/
    $wp_customize->add_section( 'ht_styling', array(
		'title' => __( '配色管理', 'framework' ),
		'description' => '自定义主题外观。',
		'priority' => 40,
	) );	

	// theme color option
	$wp_customize->add_setting( 'ht_styling_themecolor', array('default' => '#dd5136') );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ht_styling_themecolor', array(
        'label'   => __( '主题颜色', 'framework' ),
        'section' => 'ht_styling',
        'settings'   => 'ht_styling_themecolor',)
	) );

	
	
	
	/* Custom Background */
	
	
        $wp_customize->add_section( 'background_image', array(
            'title'          => __( '背景颜色', 'framework' ),
            'theme_supports' => 'custom-background',
            'priority'       => 80,
        ) );
		
		// BG Color
		$wp_customize->add_setting( 'background_color', array('default' => get_theme_support( 'custom-background', 'default-color' ),'theme_supports' => 'custom-background',) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label' => __( '选择颜色', 'framework' ),
		'section' => 'background_image',
		) ) );
		
		
		// BG Image
        $wp_customize->add_setting( 'background_image', array(
            'default'        => get_theme_support( 'custom-background', 'default-image' ),
            'theme_supports' => 'custom-background',
        ) );

        $wp_customize->add_setting( new WP_Customize_Background_Image_Setting( $wp_customize, 'background_image_thumb', array(
            'theme_supports' => 'custom-background',
        ) ) );

        $wp_customize->add_control( new WP_Customize_Background_Image_Control( $wp_customize ) );

	
}
add_action( 'customize_register', 'ht_customizer' );