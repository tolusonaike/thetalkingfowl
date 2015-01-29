<?php
/**
 * Theme Toolkit
 *
 * This is the central file of the Theme Toolkit. It holds the settings
 * that the toolkit needs in order to operate as well as the loading
 * scripts for various modules that the toolkit provides.
 *
 * @package Theme Toolkit
 * @version	1.0
 */



/**
 * Initializes the theme toolkit
 *
 * Sets the toolkit location and loads the required files.
 *
 * @param array $args Specifies the toolkit location.
 * @since 1.0
 */
function theme_toolkit_init( $args = '' ) {

	// Sets default toolkit variables
	$defaults = array(
		'child_theme' => false, // Optional. Is toolkit located in child theme?
		'toolkit_folder' => 'theme-toolkit', // Optional. Name of folder containing the toolkit files.
	);

	$thtk_settings = wp_parse_args( $args, $defaults );

	// Sets toolkit location variables
	if( $thtk_settings[ 'child_theme' ] ){
		$thtk_location = get_stylesheet_directory() . '/src/' . $thtk_settings[ 'child_theme' ] . '/' . $thtk_settings[ 'toolkit_folder' ];
		$thtk_location_uri = get_stylesheet_directory_uri() . '/src/' . $thtk_settings[ 'child_theme' ] . '/' . $thtk_settings[ 'toolkit_folder' ];
	} else {
		$thtk_location = get_template_directory() . '/src/' . $thtk_settings[ 'toolkit_folder' ];
		$thtk_location_uri = get_template_directory_uri() . '/src/' . $thtk_settings[ 'toolkit_folder' ];

	} // End if/else



	// Sets up theme customizer support
	if( current_theme_supports( 'toolkit-theme-customizer' ) ) {

		// Loads files required for the theme customizer.
		include_once $thtk_location . '/theme-options/theme-customizer.php';
		include_once $thtk_location . '/forms/sanitize.php';

		// Adds filter for attaching customizer array.
		$thtk_customizer_array = apply_filters( 'thtk_customizer_filter', array() );

		// Passes customizer array to a new instance of the theme customizer class.
		$thtk_customizer = new THTK_Theme_Customizer( $thtk_customizer_array );

	} // End if

} // End function theme_toolkit_init()