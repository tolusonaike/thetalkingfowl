<?php
/**
 * thetalkingfowl Theme Customizer
 *
 * @package thetalkingfowl
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function thetalkingfowl_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogname'  )->type  = 'theme_mod';

    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'blogdescription'  )->type  = 'theme_mod';

    $wp_customize->get_control( 'background_image'  )->section  = 'title_tagline';
    $wp_customize->get_control( 'background_color'  )->section  = 'title_tagline';

    // rename background image section to header image
    $wp_customize->get_section( 'title_tagline'  )->title        = 'General';
    $wp_customize->remove_section( 'background_image'  );
    $wp_customize->remove_control( 'display_header_text'  );


}
add_action( 'customize_register', 'thetalkingfowl_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function thetalkingfowl_customize_preview_js() {
    wp_enqueue_script( 'thetalkingfowl_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508'.getdate()['seconds'], true );
}
add_action( 'customize_preview_init', 'thetalkingfowl_customize_preview_js' );



/**
 * Loads the toolkit/toolkit.php file for adding toolkit feature support.
 *
 * @since toolkit 1.0
 */
function theme_toolkit_setup() {

    // Adds theme support for toolkit features
    add_theme_support( 'toolkit-theme-customizer' );

    // Loads the toolkit setup file.
    require_once get_stylesheet_directory() . '/src/theme-toolkit/toolkit.php';

    // Specifies toolkit folder location.
    $args = array(
        'child_theme' => false, // Optional. Only used if toolkit is located in a child theme. Default: false.
        'toolkit_folder' => 'theme-toolkit',  // Optional. Only used if "toolkit" folder is moved/renamed. Default: toolkit.
    );

    // Initializes the theme toolkit. $args can be ommitted if defaults are acceptable.
    theme_toolkit_init( $args );

} // End function thtk_setup()
add_action( 'init', 'theme_toolkit_setup', 1 );


// Checks to make sure child theme hasn't used this function before executing.
if ( !function_exists( 'thetalkingfowl_customizer' ) ) {
    /**
     * Defines theme customizer arrays
     */
    function thetalkingfowl_customizer() {

        // Defines $prefix for setting IDs. Optional.
        $prefix = 'thetalkingfowl_';

        // Defines theme cusotmizer sections and settings
        $customizer_section[] = array(
            'section_id' => 'title_tagline', // General section
            'section_title' => __('General','thetalkingfowl'), // Settings section title.
            'section_description' => __('General Settings','thetalkingfowl'),
            'section_settings' => array(

                array(
                    'id' => $prefix . 'homepage_type',
                    'title' => 'Homepage Type',
                    'type' => 'radio',
                    'priority' => 1,
                    'default' => 'tree',
                    'choices' => array(
                        'standard' => 'Standard',
                        'tree' => 'Tree',
                    ),
                ),

            )
        );

        $customizer_section[] = array(
            'section_id' => 'instagram', // Instagram section
            'section_title' => __('Instagram Settings','thetalkingfowl'),
            'section_description' => __("Display latest instagram pictures<br><br><a href='http://jelled.com/instagram/lookup-user-id' target='_blank'>How to lookup user ID.</a><br><a href='http://jelled.com/instagram/access-token' target='_blank'>How to create access token.</a> ","thetalkingfowl"),
            'section_settings' => array(
                array(
                    'id' => $prefix . 'userid',
                    'title' => 'User ID',
                    'type' => 'text',
                    'default' => 'Default content',
                    'valid' => 'text',
                    'transport' => 'refresh',
                ),

                array(
                    'id' => $prefix . 'token',
                    'title' => 'Access Token',
                    'type' => 'text',
                    'default' => 'Default content',
                    'valid' => 'text',
                    'transport' => 'refresh',
                ),

            )
        );

        return $customizer_section;
    } // End function thetalkingfowl_customizer()
} // End if
add_filter( 'thtk_customizer_filter', 'thetalkingfowl_customizer' );

