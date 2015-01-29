<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package thetalkingfowl
 */
?>

            </main><!-- .content -->

            <footer class="contentinfo">
                <div class="contentinfobody">
                    <div class="meta">
                        <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'thetalkingfowl' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'thetalkingfowl' ), 'WordPress' ); ?></a>
                        <span> | </span>
                        <?php printf( __( 'Theme: %1$s by %2$s.', 'thetalkingfowl' ), 'thetalkingfowl', '<a href="http://www.tolusonaike.com" rel="designer">Tolu Sonaike</a>' ); ?>
                    </div>
                </div>
            </footer><!-- .contentinfo -->

            <!-- close the off-canvas menu -->
            <a class="exit-off-canvas"></a>
        </div> <!-- #page -->

    </div><!-- .inner-wrap -->
</div><!-- .off-canvas-wrap -->

<?php wp_footer(); ?>

</body>
</html>
