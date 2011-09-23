<?php
/**
 * @package WordPress
 * @subpackage thetalkingfowl
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'thetalkingfowl' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<!-- CSS: implied media="all" -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />



<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<nav id="access" role="navigation" class="grid_2">		
		<h1 class="section-heading"><?php _e( 'Main menu', 'thetalkingfowl' ); ?></h1>
		<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'thetalkingfowl' ); ?>"><?php _e( 'Skip to content', 'thetalkingfowl' ); ?></a></div>		
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		<div id="access_button">open</div>
		<div id="openCloseIdentifier"></div>
</nav><!-- #access -->
<div id="page" class="hfeed container_12">
	<header id="branding" class="grid_10">
			
			<hgroup >
				<h1 id="site-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>

			
	</header><!-- #branding -->
	
	
	<div id="search" class="grid_12 clearfix">
		<?php get_search_form(); ?>
	</div>
<?php
	
	
	$options =  get_option('thetalkingfowl_theme_options');
	$twituser =  wp_filter_nohtml_kses($options['twituser']);
	$twituserdisplay =  wp_filter_nohtml_kses($options['twituserdisplay']);
	$flickruser =  wp_filter_nohtml_kses($options['flickruser']);
	$flickrusernum = 7;
	$tmp =  wp_filter_nohtml_kses($options['flickrusernum']);

	if ($tmp)
		$flickrusernum = $tmp - 1;
	 ?>

        <?php if ( is_home() && $twituser) { ?>
        <div id="twitter<?php if ($twituserdisplay =="plain") echo "_plain";?>" class="clearfix"> 
		<div id="twit_bird" class="grid_2"> <div id="twit_bird_img"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" /></div></div>								
		<ul id="twitter_update_list" class="grid_10"><li><img src="<?php echo get_template_directory_uri(); ?>/images/<?php if ($twituserdisplay =="plain") echo "plain-";?>ajax-loader.gif" /></li></ul>
			</div> <!-- #twitter -->				
	<?php } ?>

	

        <?php if ( is_home()  && $flickruser) { ?>
        	<div id="flickr" class="clearfix">
		<div id="flickr_cam" class="grid_2"> <div id="flickr_cam_img"><img src="<?php echo get_template_directory_uri(); ?>/images/camera.png" /></div></div>
		<ul id="flickr_update_list" class="grid_10"><img src="<?php echo get_template_directory_uri(); ?>/images/plain-ajax-loader.gif" /></ul>
			</div> <!-- #flickr -->				
	<?php } ?>

        <div class="clearfix">&nbsp;</div>
	<div id="main" class="clearfix">
