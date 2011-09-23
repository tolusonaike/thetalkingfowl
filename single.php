<?php
/**
 * @package WordPress
 * @subpackage thetalkingfowl
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<nav class="nav-above clearfix">
					
					<div class="force-render-empty nav-next"><?php next_post_link( '%link', '&rarr;' ); ?></div>
				</nav>

				<article id="post-<?php the_ID(); ?>" <?php post_class('prefix_2 grid_8'); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						
						<div class="entry-meta">
							<?php
								printf( __( '<span class="sep">Posted on </span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', 'thetalkingfowl' ),
									get_permalink(),
									get_the_date( 'c' ),
									get_the_date(),
									get_author_posts_url( get_the_author_meta( 'ID' ) ),
									sprintf( esc_attr__( 'View all posts by %s', 'thetalkingfowl' ), get_the_author() ),
									get_the_author()
								);
							?>
						</div><!-- .entry-meta -->
						<div class="inset-line"></div>
					</header><!-- .entry-header -->
                   <div class="entry-thumbnail">
	             	<?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
	                </div>
					<div class="entry-summary">
						<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'thetalkingfowl' ) ); ?>
					</div><!-- .entry-summary -->
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'thetalkingfowl' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php
							$tag_list = get_the_tag_list( '', ', ' );
							if ( '' != $tag_list ) {
								$utility_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'thetalkingfowl' );
							} else {
								$utility_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'thetalkingfowl' );
							}
							printf(
								$utility_text,
								get_the_category_list( ', ' ),
								$tag_list,
								get_permalink(),
								the_title_attribute( 'echo=0' )
							);
						?>

						<?php edit_post_link( __( 'Edit', 'thetalkingfowl' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post-<?php the_ID(); ?> -->

					

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>
