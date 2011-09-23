<?php
/**
 * @package WordPress
 * @subpackage thetalkingfowl
 */

get_header(); ?>
	<section id="primary">
	    
		<div id="content" role="main">

			<?php get_template_part( 'loop', 'index' ); ?>

		</div><!-- #content -->
	</section><!-- #primary -->
<?php get_footer(); ?>