<?php
/**
 * @package WordPress
 * @subpackage thetalkingfowl
 */
?>

	</div><!-- #main -->
        
	<footer id="colophon" role="contentinfo" >
                        <?php
                               //////////////////////////////////////////   A sidebar footer //////////////////////////////////////////  
                                get_sidebar( 'footer' );
                        ?>
			<div id="site-generator" class="grid_12">
				<?php printf( __( 'Theme: thetalkingfowl by %1$s.', 'thetalkingfowl' ),  '<a href="http://www.tolusonaike.com/" rel="creator of thetalkingfowl theme">Tolu Sonaike</a>' ); ?>
			</div>
			<div id="meta" class="widget grid_3 prefix_9">

				<?php wp_register(); ?>
				<aside><?php wp_loginout(); ?></aside>
				<?php wp_meta(); ?>
		        </div>
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
