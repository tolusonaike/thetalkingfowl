<?php
/**
 * @package WordPress
 * @subpackage thetalkingfowl
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">

				<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('prefix_2 grid_8'); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					<div class="inset-line"></div>
					<div class="entry-thumbnail">
			         <?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
			        </div>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'thetalkingfowl' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'thetalkingfowl' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<?php comments_template( '', true ); ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>
