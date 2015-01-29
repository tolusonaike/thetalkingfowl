<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package thetalkingfowl
 */

get_header(); ?>
		<section class="primary">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<h1 class="entry-title"><i>
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'thetalkingfowl' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'thetalkingfowl' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'thetalkingfowl' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'thetalkingfowl' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'thetalkingfowl' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'thetalkingfowl' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'thetalkingfowl' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'thetalkingfowl');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'thetalkingfowl');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'thetalkingfowl' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'thetalkingfowl' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'thetalkingfowl' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'thetalkingfowl' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'thetalkingfowl' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'thetalkingfowl' );

						else :
							_e( 'Archives', 'thetalkingfowl' );

						endif;
					?>
				</i></h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content' );
				?>

			<?php endwhile; ?>

			<?php thetalkingfowl_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</section><!-- .primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
