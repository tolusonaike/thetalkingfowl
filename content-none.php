<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package thetalkingfowl
 */
?>

<article class="no-results not-found">
	<header>
		<h1><?php _e( 'Nothing Found', 'thetalkingfowl' ); ?></h1>
	</header>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'thetalkingfowl' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'thetalkingfowl' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'thetalkingfowl' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
</article><!-- .no-results -->
