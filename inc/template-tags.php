<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package thetalkingfowl
 */

if ( ! function_exists( 'thetalkingfowl_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function thetalkingfowl_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'thetalkingfowl' ); ?></h1>
		<div class="meta">

			<?php if ( get_next_posts_link() ) : ?>
			<?php next_posts_link( __( '<span>&larr;</span> Older posts', 'thetalkingfowl' ) ); ?>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<?php previous_posts_link( __( 'Newer posts <span>&rarr;</span>', 'thetalkingfowl' ) ); ?>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'thetalkingfowl_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function thetalkingfowl_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'thetalkingfowl' ); ?></h1>
		<div class="meta">
			<?php
				previous_post_link( '%link', _x( '<span>&larr;</span> %title', 'Previous post link', 'thetalkingfowl' ) );
				next_post_link(     '%link',     _x( '%title <span>&rarr;</span>', 'Next post link',     'thetalkingfowl' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'thetalkingfowl_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function thetalkingfowl_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= __(', Updated on <time class="updated" datetime="%3$s">%4$s</time>', 'thetalkingfowl' );
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'thetalkingfowl' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function thetalkingfowl_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'thetalkingfowl_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'thetalkingfowl_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so thetalkingfowl_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so thetalkingfowl_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in thetalkingfowl_categorized_blog.
 */
function thetalkingfowl_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'thetalkingfowl_categories' );
}
add_action( 'edit_category', 'thetalkingfowl_category_transient_flusher' );
add_action( 'save_post',     'thetalkingfowl_category_transient_flusher' );
