<?php
/**
 * thetalkingfowl functions and definitions
 *
 * @package thetalkingfowl
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 872; /* pixels */
}

if ( ! function_exists( 'thetalkingfowl_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thetalkingfowl_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on thetalkingfowl, use a find and replace
	 * to change 'thetalkingfowl' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'thetalkingfowl', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

    add_image_size( 'content-thumb', 960, 350, true ); //(cropped)

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'thetalkingfowl' ),
	) );

	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

    // Enable support for excerpt.
    add_post_type_support('page', 'excerpt');

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'thetalkingfowl_custom_background_args', array(
		'default-color' => 'ededed',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );


    // Add editor style support
    add_editor_style( get_stylesheet_uri() );

}
endif; // thetalkingfowl_setup
add_action( 'after_setup_theme', 'thetalkingfowl_setup' );


function thetalkingfowl_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'thetalkingfowl_excerpt_length', 999 );

function  thetalkingfowl_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'thetalkingfowl_excerpt_more');


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function thetalkingfowl_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left Bottom Bar', 'thetalkingfowl' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name'          => __( 'Middle Bottom Bar', 'thetalkingfowl' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name'          => __( 'Right Botton Bar', 'thetalkingfowl' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'thetalkingfowl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thetalkingfowl_scripts() {
    wp_enqueue_style( 'thetalkingfowl-foundation-style', get_template_directory_uri() . '/foundation-icons.css', false, '1.0', 'all' );

	wp_enqueue_style( 'thetalkingfowl-style', get_stylesheet_uri() );

    wp_enqueue_script('jquery');

    wp_enqueue_script( 'thetalkingfowl-dug-js', get_template_directory_uri() . '/js/dug.js', array(), '20120206', false );

	wp_enqueue_script( 'thetalkingfowl-foundation-script', get_template_directory_uri() . '/js/foundation.min.js', array(), '20120206', true );

    wp_enqueue_script( 'thetalkingfowl-app-script', get_template_directory_uri() . '/js/app.min.js', array(), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thetalkingfowl_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Load Foundation Nav walker.
 */
require get_template_directory() . '/inc/FoundationNavWalker.class.php';
