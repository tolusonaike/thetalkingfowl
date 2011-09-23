<?php
/**
 * @package WordPress
 * @subpackage thetalkingfowl
 */

 $options = get_option( 'thetalkingfowl_theme_options' );
 $style = '';

 if (!isset($options['postdisplaystyle']))
	$style = 'standard'; //default post display setting
 else
     $style = $options['postdisplaystyle'];
?>


<?php //////////////////////////////////////////   Display timeline loop if is home is selected in Theme options. if not, display standard //////////////////////////////////////////   ?>

<?php if(is_home() && $style=='timeline'):  ?>
 

	<?php /* Start the Loop */ ?>
	<?php 
	  $months = $wpdb->get_results("SELECT DISTINCT MONTH(post_date) AS month , YEAR(post_date) AS year, DAY(post_date) AS day FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month, year ORDER BY post_date DESC");
	  $posts = $wpdb->get_results("SELECT id, post_title, MONTH(post_date) AS month , YEAR(post_date) AS year,DAY(post_date) AS day FROM $wpdb->posts WHERE post_status = 'publish' and post_type = 'post' ORDER BY post_date DESC");
	  $before = 0;
	  $current = 0; ?>
	 
	 <?php foreach($months as $this_month){ ?>
	 <div class="month">
	 <h2 class="month-header">
	 <?php echo date("F", mktime(0, 0, 0, $this_month->month, 1, $this_month->year));$before = 0;$current = 0; ?> 
         <?php echo $this_month->year ;?> </h2><!-- month -->
	 <ul class="month-articles">
	    
	    <?php for ($i = 0; $i <= count($posts); $i++){?>
	    		<?php if (isset($posts[$i])) {?>
					  <?php if(($this_month->year == $posts[$i]->year)&&($this_month->month == $posts[$i]->month)){ $current = $posts[$i]->day; ?>
						 <li class="clearfix">
								 <?php if ($current != $before):?>
								   <div class="month-day grid_2 alpha">
								 	<img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png"/> <?php echo $posts[$i]->day;?>
								 	</div>
								  <?php else: ?>
								  	 <div class="force-render-empty  month-day grid_2  alpha">&nbsp;
								  	 </div>
								  <?php endif;?>

					  <article id="post-<?php echo 'post-' . $posts[$i]->id; ?>" <?php post_class('timeline-post grid_10',$posts[$i]->id); ?>>
					   <h1><a href="<?php echo get_permalink($posts[$i]->id); ?>">"
					   <?php
						 if (!is_single()) {
						    if( trim($posts[$i]->post_title == '') ) {
							echo ".........";
						   } else {
						   	echo $posts[$i]->post_title;
						    }
						  }
						  else{
						      echo $posts[$i]->post_title;
						  }
					   
					   ?>"</a>
						   <?php if (get_comments_number($posts[$i]->id) > 0) { ?><span class="comment-count"> <a href="<?php echo get_permalink($posts[$i]->id); ?>#comments">(<?php echo get_comments_number($posts[$i]->id)?>)</a></span><?php }?> </h1>
					   </article> 
					  </li>
					  <?php 
					  $before = $posts[$i]->day;} ?>
					<?php } ?>
				<?php } ?>
		</ul>
		</div>  
	  <?php } ?>  
	  
<?php else:  ?> 	<?php //////////////////////////////////////////   Display standard post //////////////////////////////////////////  ?>


	
	<?php //////////////////////////////////////////   Display navigation to next/previous pages when applicable //////////////////////////////////////////   ?>
	<?php if ( $wp_query->max_num_pages > 1 ) {?>
		<nav id="nav-above">
			<h1 class="section-heading"><?php _e( 'Post navigation', 'thetalkingfowl' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'thetalkingfowl' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'thetalkingfowl' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php } ?>


	<?php while ( have_posts() ) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class('grid_12 alpha'); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'thetalkingfowl' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>&nbsp;</a></h1>
	            
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
			</header><!-- .entry-header -->
			<div class="entry-thumbnail">
	             <?php the_post_thumbnail( 'loop-post-thumbnail' ); ?>
	            </div>
			<?php if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search ?>
			<div class="entry-summary">
				<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'thetalkingfowl' ) ); ?>
			</div><!-- .entry-summary -->
			<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'thetalkingfowl' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'thetalkingfowl' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			<?php endif; ?>
	
			<footer class="entry-meta">
				<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'thetalkingfowl' ); ?></span><?php the_category( ', ' ); ?></span>
				<span class="sep"> | </span>
				<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'thetalkingfowl' ) . '</span>', ', ', '<span class="sep"> | </span>' ); ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'thetalkingfowl' ), __( '1 Comment', 'thetalkingfowl' ), __( '% Comments', 'thetalkingfowl' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'thetalkingfowl' ), '<span class="sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</footer><!-- #entry-meta -->
		</article><!-- #post-<?php the_ID(); ?> -->
	
		<?php comments_template( '', true ); ?>
	
	<?php endwhile; ?>
	
	<?php //////////////////////////////////////////   Display navigation to next/previous pages when applicable //////////////////////////////////////////   ?>
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<nav id="nav-below">
			<h1 class="section-heading"><?php _e( 'Post navigation', 'thetalkingfowl' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'thetalkingfowl' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'thetalkingfowl' ) ); ?></div>
		</nav><!-- #nav-below -->
	<?php endif; ?>
	
<?php endif; ?>


