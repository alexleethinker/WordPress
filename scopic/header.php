<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- #header -->
<header id="site-header" class="clearfix" role="banner">

<!-- #logo -->
<div id="logo">
    <!-- .container -->
<div class="container">
		
		<?php if ( get_theme_mod( 'ht_site_logo' ) != '' ) { ?>
			<a title="<?php bloginfo( 'name' ); ?>" href="<?php echo home_url(); ?>">
				<img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_theme_mod( 'ht_site_logo' ); ?>" />
			</a>
		<?php } else { ?>
			<?php if ( is_front_page() ) { ?>
				<h1 class="site-title"><!--<a title="<?php bloginfo( 'name' ); ?>" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>--></h1>
			<?php } else {  ?>
				<strong class="site-title"><!--<a title="<?php bloginfo( 'name' ); ?>" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>--></strong>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<!-- /#logo -->

<?php if ( has_nav_menu( 'primary-nav' ) ) { ?>
<!-- #primary-nav-mobile -->
<nav id="nav-primary-mobile" class="clearfix">
    <a class="menu-toggle" href="#"><i class="fa fa-bars"></i><?php _e('更多', 'framework'); ?></a>
    <?php wp_nav_menu( array('theme_location' => 'primary-nav', 'container' => false, 'menu_class' => 'clearfix', 'menu_id' => 'mobile-menu', )); ?>
</nav>
<!-- /#primary-nav-mobile -->
<?php } ?>  


<div id="header-bottom" role="navigation" class="clearfix">
<!-- .container -->
<div class="container">

<?php if ( has_nav_menu( 'primary-nav' ) ) { ?>
<!-- #primary-nav -->
<nav id="nav-primary">
	<ul>
		<li>
			<a href="#"><i class="fa fa-reorder"></i><?php _e('更多', 'framework'); ?></a>
    		<?php wp_nav_menu( array('theme_location' => 'primary-nav', 'container' => false, 'menu_class' => 'nav clearfix' )); ?>
    	</li>
   </ul>
</nav>
<!-- #primary-nav -->
<?php } ?>        

<?php if ( 	get_theme_mod( 'ht_header_rss' ) != true || 
			get_theme_mod( 'ht_header_twitter' ) || 
			get_theme_mod( 'ht_header_email' ) || 
			get_theme_mod( 'ht_header_facebook' ) ||
			get_theme_mod( 'ht_header_google' ) || 
			get_theme_mod( 'ht_header_pinterest' ) || 
			get_theme_mod( 'ht_header_linkedin' ) || 
			get_theme_mod( 'ht_header_flickr' ) ||
			get_theme_mod( 'ht_header_instagram' ) 
			) { ?>
<ul id="social-icons" class="clearfix">
	<?php if ( get_theme_mod( 'ht_header_rss' ) != true ) { ?>
		<li class="rss">
			<a href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-rss"></i></a>
		</li>
	<?php } ?>
	<?php if ( get_theme_mod( 'ht_header_email' ) ) { ?>
		<li class="email">
			<a href="<?php echo get_theme_mod( 'ht_header_email' ) ?>"><i class="fa fa-envelope"></i></a>
		</li>
	<?php } ?>
	<?php if ( get_theme_mod( 'ht_header_twitter' ) ) { ?>
		<li class="twitter">
			<a href="<?php echo get_theme_mod( 'ht_header_twitter' ) ?>" target="_blank"><i class="fa fa-twitter"></i></a>
		</li>
	<?php } ?>
	<?php if ( get_theme_mod( 'ht_header_facebook' ) ) { ?>
		<li class="facebook">
			<a href="<?php echo get_theme_mod( 'ht_header_facebook' ) ?>" target="_blank"><i class="fa fa-facebook"></i></a>
		</li>
	<?php } ?>
	<?php if ( get_theme_mod( 'ht_header_google' ) ) { ?>
		<li class="google-plus">
			<a href="<?php echo get_theme_mod( 'ht_header_google' ) ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
		</li>
	<?php } ?>
	<?php if ( get_theme_mod( 'ht_header_pinterest' ) ) { ?>
		<li class="pinterest">
			<a href="<?php echo get_theme_mod( 'ht_header_pinterest' ) ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
		</li>
	<?php } ?>
	<?php if ( get_theme_mod( 'ht_header_linkedin' ) ) { ?>
		<li class="linkedin">
			<a href="<?php echo get_theme_mod( 'ht_header_linkedin' ) ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
		</li>
	<?php } ?>
	<?php if ( get_theme_mod( 'ht_header_flickr' ) ) { ?>
		<li class="flickr">
			<a href="<?php echo get_theme_mod( 'ht_header_flickr' ) ?>" target="_blank"><i class="fa fa-flickr"></i></a>
		</li>
	<?php } ?>
	<?php if ( get_theme_mod( 'ht_header_instagram' ) ) { ?>
		<li class="instagram">
			<a href="<?php echo get_theme_mod( 'ht_header_instagram' ) ?>" target="_blank"><i class="fa fa-instagram"></i></a>
		</li>
	<?php } ?>
</ul>
<?php } ?>



<?php if ( is_front_page() && get_theme_mod( 'ht_site_avatar' ) ) { ?>

	<img width="95" height="95" class="avatar" src="<?php echo get_theme_mod( 'ht_site_avatar' )?>" alt="">
	
<?php } elseif ( is_archive() ) { ?>

<h1 class="page-title">
	<?php if ( is_search() ) {
	 printf( __( '%s', 'framework' ), get_search_query() );
	} elseif ( is_category() ) { 
		single_cat_title();
	} elseif ( is_tag() ) {
	 _e('', 'framework'); echo single_tag_title( '', false );
	} elseif ( is_day() ) {
		printf( __( '%s', 'framework' ), get_the_date() );
	} elseif ( is_month() ) {
		printf( __( '%s', 'framework' ), get_the_date( 'F Y' ) );
	} elseif ( is_year() ) {
		printf( __( '%s', 'framework' ), get_the_date( 'Y' ) ); 
	} ?>
</h1>
<?php } ?>

</div>
<!-- /.container -->   
</div>

</header>
<!-- /#header -->

<!-- #site-container -->
<div id="site-container" class="clearfix">