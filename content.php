<?php
/**
 * @package thetalkingfowl
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="meta">
			<?php thetalkingfowl_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<p>
		<?php the_excerpt(); ?>
	</p>
	<?php else : ?>
	<p>
		<?php the_content( __( 'Continue reading <span class="meta">&rarr;</span>', 'thetalkingfowl' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'thetalkingfowl' ),
				'after'  => '</div>',
			) );
		?>
	</p>
	<?php endif; ?>

	<footer class="meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'thetalkingfowl' ) );
				if ( $categories_list && thetalkingfowl_categorized_blog() ) :
			?>
			<span>
				<?php printf( __( 'Posted in %1$s', 'thetalkingfowl' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'thetalkingfowl' ) );
				if ( $tags_list ) :
			?>
			<span>
				<?php printf( __( 'Tagged %1$s', 'thetalkingfowl' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span><?php comments_popup_link( __( 'Leave a comment', 'thetalkingfowl' ), __( '1 Comment', 'thetalkingfowl' ), __( '% Comments', 'thetalkingfowl' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'thetalkingfowl' ), '<span>', '</span>' ); ?>
	</footer><!-- .meta -->
</article><!-- #post-## -->
