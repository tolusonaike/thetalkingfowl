<?php
/**
 * @package thetalkingfowl
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( sprintf( '<h4><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
        <?php the_excerpt(); ?>

	</header>

</article><!-- #post-## -->
