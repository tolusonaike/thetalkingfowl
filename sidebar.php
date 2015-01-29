<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package thetalkingfowl
 */
?>
        <section class="secondary">
            <div class="widget-area sidebar-1" role="complementary">
                <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
                <?php endif; // end sidebar widget area ?>
            </div><!-- sidebar-1 -->

            <div class="widget-area sidebar-2" role="complementary">
                <?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
                <?php endif; // end sidebar widget area ?>
            </div><!-- sidebar-2 -->

            <div class="widget-area sidebar-3" role="complementary">
                <?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?>
                <?php endif; // end sidebar widget area ?>
            </div><!-- sidebar-3 -->
        </section> <!-- .secondary -->

