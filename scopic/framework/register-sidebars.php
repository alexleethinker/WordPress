<?php
/**
 * Register Sidebars 
 */
 
add_action( 'widgets_init', 'st_register_sidebars' );

function st_register_sidebars() {
	
	register_sidebar(array(
		'name' => __( '侧栏组件', 'framework' ),
		'id' => 'st_sidebar_primary',
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		)
	);	
	
	// Setup footer widget column option variable
	$footer_widget_layout = get_theme_mod( 'ht_style_footerwidgets' );
	if ($footer_widget_layout == '2col') {
		$footer_widget_col = 'ht-col-half';
		$footer_widget_col_descirption = '两栏';
	} elseif ($footer_widget_layout == '3col') {
		$footer_widget_col = 'ht-col-third';
		$footer_widget_col_descirption = '三栏';
	} elseif ($footer_widget_layout == '4col') {
		$footer_widget_col = 'ht-col-fourth';
		$footer_widget_col_descirption = '四栏';
	} else {
		$footer_widget_col = 'ht-col-third';
		$footer_widget_col_descirption = '三栏';
	}
	
	register_sidebar(array(
		'name' => __( '页脚组件', 'framework' ),
		'description'   => '当前布局：'.$footer_widget_col_descirption.'。',
		'id' => 'st_sidebar_footer',
		'before_widget' => '<div id="%1$s" class="ht-column '.$footer_widget_col.' widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>',
		)
	);

}

