<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package thetalkingfowl
 */

get_header(); ?>
		<main id="main">

			<section class="error-404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'thetalkingfowl' ); ?></h1>
				</header><!-- .page-header -->

				<div class="entry-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'thetalkingfowl' ); ?></p>
                    <div class="">
					<?php get_search_form(); ?>
                    </div>

                    <div class="widget-area">
					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
                    </div>

					<?php if ( thetalkingfowl_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget-area">
						<h2><?php _e( 'Most Used Categories', 'thetalkingfowl' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

                    <div class="widget-area">
					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
                        </div>

				</div><!-- .entry-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->

<?php get_footer(); ?>