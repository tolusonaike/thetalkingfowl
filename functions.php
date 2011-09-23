<?php
/**
 * @package WordPress
 * @subpackage thetalkingfowl
 */

/**
 * 
 * Translations can be filed in the /languages/ directory
 * 
 */
 
 /**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 940;


load_theme_textdomain( 'thetalkingfowl', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

///////////////////////////////// This theme uses wp_nav_menu() in one location. ////////////////////////////
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'thetalkingfowl' ),
) );


///////////////////////////////// Add default posts and comments RSS feed links to head /////////////////////////////////

add_theme_support( 'automatic-feed-links' );

///////////////////////////////// Add thumbnail support  /////////////////////////////////

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
  add_image_size( 'single-post-thumbnail', 640, 9999 ); // Permalink thumbnail size
  add_image_size( 'loop-post-thumbnail', 940, 9999 ); //  for everything else in the loop
}


/////////////////////////////////  Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link. /////////////////////////////////

function thetalkingfowl_page_menu_args($args) {
	$args['show_home'] = true;
	return $args;
}

add_filter( 'wp_page_menu_args', 'thetalkingfowl_page_menu_args' );

///////////////////////////////// Register widgetized area and update sidebar with default widgets /////////////////////////////////
 
function thetalkingfowl_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Footer-sidebar 1', 'thetalkingfowl' ),
		'id' => 'footer-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'thetalkingfowl_widgets_init' );





///////////////////////////////// action to add inline css from theme options /////////////////////////////////

function thetalkingfowl_register_scripts() { 
	  ////////////////////////////////////////// load modernizr at the top  //////////////////////////////////////////  
	  wp_register_script('thetalkingfowl_modernizr',get_template_directory_uri() . '/js/libs/modernizr-1.6.min.js', false, false);
	  
	  //////////////////////////////////////////  load other scripts at the bottom  //////////////////////////////////////////  	  	  
	  wp_register_script('thetalkingfowl_dropmenu',get_template_directory_uri() . '/js/menu.js',array('jquery'), false, true);	    
	  wp_register_script('thetalkingfowl_otherjs',get_template_directory_uri() . '/js/script.js',array('jquery'), false, true);	  
	  wp_register_script('thetalkingfowl_twitterapi','http://twitter.com/javascripts/blogger.js', false, false, true);	  	  
	  wp_register_script('thetalkingfowl_flickrjs',get_template_directory_uri() .'/js/flickr.js', false, false, true);
	  $options =  get_option('thetalkingfowl_theme_options');
	  $twituser =  wp_filter_nohtml_kses($options['twituser']);
	  if ($twituser){
	    wp_register_script('thetalkingfowl_twittercallback','http://twitter.com/statuses/user_timeline/' . $twituser . '.json?callback=twitterCallback2&count=1', false, false, true);
	  }


}
add_action ( 'init', 'thetalkingfowl_register_scripts');

function thetalkingfowl_enqueue_scripts() {
  
	wp_enqueue_script('thetalkingfowl_modernizr');	
	wp_enqueue_script('thetalkingfowl_dropmenu');	
	wp_enqueue_script('thetalkingfowl_otherjs');
	if (!is_admin()){
		      if (is_home() || is_front_page() ) { 
			   
			    
			    //////////////////////////////////////////  sanitize theme options //////////////////////////////////////////  
			    $options =  get_option('thetalkingfowl_theme_options');
			    $twituser =  wp_filter_nohtml_kses($options['twituser']);
			    $flickruser =  wp_filter_nohtml_kses($options['flickruser']);
			    
				  if ($twituser){    
							     
					     wp_enqueue_script('thetalkingfowl_twitterapi');
					     wp_enqueue_script('thetalkingfowl_twittercallback');
				  }
				     
				 
				 if ($flickruser){
				   
					     wp_enqueue_script('thetalkingfowl_flickrjs'); 	    
			 
				 }
		      }
	}
}
add_action ( 'wp_enqueue_scripts', 'thetalkingfowl_enqueue_scripts');


function thetalkingfowl_other_scripts() {
	
	//////////////////////////////////////////  sanitize theme options //////////////////////////////////////////  
	$options =  get_option('thetalkingfowl_theme_options');
	$flickruser =  wp_filter_nohtml_kses($options['flickruser']);
	$flickruserset =  wp_filter_nohtml_kses($options['flickruserset']);
	$flickrusernum = 7;
	$tmpflickrusernum =  wp_filter_nohtml_kses($options['flickrusernum']);
	
	
	if ($tmpflickrusernum)
		$flickrusernum = $tmpflickrusernum - 1;
 	
	if ($flickruser){
	    
		if ( !is_admin() && (is_home() || is_front_page()) ) { ?>
		    <script> loadFlickrImages(<?php echo "'"; ?><?php echo  $flickruser; ?><?php echo "'"; ?>,<?php if ($flickrusernum) echo $flickrusernum; else echo 7; ?>,<?php echo "'"; ?><?php echo  $flickruserset; ?><?php echo "'"; ?>); </script>
<?php		    
		 }
		 

	}
}
add_action ( 'wp_footer', 'thetalkingfowl_other_scripts');

require_once ( get_stylesheet_directory() . '/theme-options.php' );
