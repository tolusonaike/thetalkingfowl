<?php
/**
 * @package WordPress
 * @subpackage thetalkingfowl
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main" class="grid_12">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'thetalkingfowl' ),
										'<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

				<?php get_template_part( 'loop', 'search' ); ?>

			<?php else : ?>

				<article id="no-post">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'thetalkingfowl' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'thetalkingfowl' ); ?></p>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>