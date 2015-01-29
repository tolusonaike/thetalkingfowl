/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.banner h1 a' ).text( to );
		} );
	} );

    // Site description
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.banner h4' ).text( to );
		} );
	} );

} )( jQuery );
