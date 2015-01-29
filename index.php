<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package thetalkingfowl
 */

get_header(); ?>
		<section class="primary">
            <?php if (get_theme_mod( 'thetalkingfowl_homepage_type', 'standard' ) ==="standard") : ?>

                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                            get_template_part( 'content', get_post_type() );
                        ?>

                    <?php endwhile; ?>

                    <?php thetalkingfowl_paging_nav(); ?>

                <?php else : ?>

                    <?php get_template_part( 'content', 'none' ); ?>

                <?php endif; ?>
            <?php else : ?>
                <?php if ($insta_id = get_theme_mod( 'thetalkingfowl_userid')) :?>
                    <script>
                        dug({
                            endpoint: 'https://api.instagram.com/v1/users/<?php echo (esc_html($insta_id)); ?>/media/recent/?access_token=<?php echo (esc_html (get_theme_mod( 'thetalkingfowl_token')));?>' ,
                            beforeRender: function( data ){
                                data.data = data.data.slice(0,8);
                            },
                            template: '<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4 picture-feed">\
                                            {{#data}}\
                                              <li>\
                                                <a href="{{link}}">\
                                                  <img src="{{images.thumbnail.url}}">\
                                                </a>\
                                              </li>\
                                            {{/data}}\
                                          </ul>\
                                        '
                        });
                    </script>
                <?php endif; ?>

            <ul class="list-tree clearfix">
                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <li>
                        <?php
                        get_template_part( 'content-tree' );
                        ?>
                        </li>

                    <?php endwhile; ?>



                <?php else : ?>

                    <?php get_template_part( 'content', 'none' ); ?>

                <?php endif; ?>
            </ul>
            <?php thetalkingfowl_paging_nav(); ?>

            <?php endif; ?>

		</section><!-- .primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
