<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package thetalkingfowl
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="entry-image">
            <?php
                the_post_thumbnail( 'content-thumb' );
            ?>
        </div>
    <?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'thetalkingfowl' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="meta">
		<?php edit_post_link( __( 'Edit', 'thetalkingfowl' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
