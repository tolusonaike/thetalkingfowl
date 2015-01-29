<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package thetalkingfowl
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="off-canvas-wrap" data-offcanvas>

    <div id="page" class="hfeed site inner-wrap">
        <a class="right-off-canvas-toggle fi-list" href="#" ></a>

        <aside class="right-off-canvas-menu">
            <?php
                // Add foundation nav walker
                $defaults = array(
                    'container'         => false,
                    'menu'              => 'primary',
                    'menu_class'        => 'off-canvas-list',
                    'theme_location'    => 'primary',
                    'walker'            => new FoundationNavWalker()
                );
                wp_nav_menu( $defaults );
            ?>
        </aside>

        <a class="screen-reader-text" href="#content"><?php _e( 'Skip to content', 'thetalkingfowl' ); ?></a>

        <header class="banner">
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_theme_mod( 'blogname', 'thetalkingfowl' ); ?></a></h1>
                <h4><?php echo get_theme_mod( 'blogdescription', 'thetalkingfowl' ); ?></h4>
        </header><!-- .banner -->

        <hr>

        <main class="content">
