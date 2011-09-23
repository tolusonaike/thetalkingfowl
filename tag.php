<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
 * @subpackage thetalkingfowl
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main" class="grid_12">

				<?php the_post(); ?>

				<header class="page-header">
					<h1 class="page-title"><?php
						printf( __( 'Tag Archives: %s', 'thetalkingfowl' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					?></h1>
				</header>

				<?php rewind_posts(); ?>

				<?php get_template_part( 'loop', 'tag' ); ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>
