<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=0.77, user-scalable=no" />

    <link href='http://fonts.useso.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>

    <!--[if lte IE 8]>
        <style>
            #ccontainer     {
                background-image: url('<?php echo rain_get_option('background-image' ); ?>');
            }
        </style>
    <![endif]-->
    
    <?php wp_head(); ?>
</head>
<body <?php body_class( (rain_get_option( 'sharing-on' ) ? 'sharing' : '' )); ?>>

    <?php rain_background(); ?>

    <?php get_template_part( 'left-menu', 'slider' ); ?>

    <header id="site-head">
        <div class="header-left">
            <div class="vertical">
                <?php rain_blog_logo(); ?>
            </div>
            <div class="vertical">
                <?php rain_background_music(); ?>
            </div>
        </div>
        <div class="header-right">
            <div class="vertical">
                <div class="menu_button">
                    <i class="fa fa-align-justify"></i>
                </div>
            </div>
            <div class="vertical"></div>
        </div>
    </header>
    <div id="mobile-header">
        <div class="vertical">
            <?php rain_blog_logo(); ?>
        </div>
        <div class="vertical">
            <div class="menu_button">
                <i class="fa fa-align-justify"></i>
            </div>
        </div>
    </div>
