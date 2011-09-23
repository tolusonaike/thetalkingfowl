<?php
/**
 * @package WordPress
 * @subpackage thetalkingfowl
 */
?>
        <?php if (!is_home()){ ?>
		<div id="sidebar-footer" class="widget-area clearfix" role="complementary">
			<?php if ( ! dynamic_sidebar( 'footer-sidebar-1' ) ) : ?>
				<aside id="recent-posts" class="widget grid_4">
					<h3 class="widget-title"><?php _e( 'Recent posts', 'thetalkingfowl' ); ?></h3>
					<ul>

						<?php
						    $recent_posts = wp_get_recent_posts(array( 'numberposts' => 5,
                                                                                              'post_status' => 'publish',
                                                                                              'suppress_filters' => true ));
						    foreach($recent_posts as $post){
						      echo '<li><a href="' . get_permalink($post["ID"]) . '" title="Look '.$post["post_title"].'" >' .   $post["post_title"].'</a> </li> ';
						} ?>
				      </ul>

				</aside>
				<aside id="categories" class="widget grid_4">
					<h3 class="widget-title"><?php _e( 'Categories', 'thetalkingfowl' ); ?></h3>
					<ul>
						<?php wp_list_categories('title_li='); ?>
					</ul>
				</aside>

				<aside id="archives" class="widget grid_4">
					<h1 class="widget-title"><?php _e( 'Archives', 'thetalkingfowl' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>


				

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
	<?php } ?>
