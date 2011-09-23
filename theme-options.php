<?php
/**
*
 * This is the theme options page. Alway remember to sanitize fields!
 *
 */
 
 
add_action( 'admin_init', 'thetalkingfowl_init' );
add_action( 'admin_menu', 'thetalkingfowl_add_page' );

//////////////////////////////////////////  Init plugin options to white list our options  ////////////////////////////////////////////
function thetalkingfowl_init(){
	register_setting( 'thetalkingfowl_options', 'thetalkingfowl_theme_options', 'thetalkingfowl_validate' );
}

//////////////////////////////////////////   Load up the menu page  //////////////////////////////////////////  
function thetalkingfowl_add_page() {
	add_theme_page( __( 'thetalkingfowl Options', 'thetalkingfowl' ), __( 'thetalkingfowl Options', 'thetalkingfowl' ), 'edit_theme_options', 'theme_options', 'thetalkingfowl_do_page' );
}


//////////////////////////////////////////  Create the options page //////////////////////////////////////////  
function thetalkingfowl_do_page() {

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;
	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'thetalkingfowl' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'thetalkingfowl' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'thetalkingfowl_options' ); ?>
			<?php $options = get_option( 'thetalkingfowl_theme_options' );
			      if (!isset($options['twituserdisplay']))
				$options['twituserdisplay'] = 'plain'; //default option for twit user option
                              if (!isset($options['postdisplaystyle']))
				$options['postdisplaystyle'] = 'standard'; //default post diplay option

?> 

			<table class="form-table">
                  <?php

//////////////////////////////////////////   Choose post page display style //////////////////////////////////////////  
?>
                                <tr valign="top"><th scope="row"><?php _e( 'Post display style' , 'thetalkingfowl'); ?></th>
					<td>
						<input id="thetalkingfowl_theme_options[postdisplaystyle]"   type="radio" name="thetalkingfowl_theme_options[postdisplaystyle]" value="timeline" <?php checked('timeline', $options['postdisplaystyle']); ?>/>
						<?php _e( 'Timeline', 'thetalkingfowl' ); ?>
						<input id="thetalkingfowl_theme_options[postdisplaystyle]"   type="radio" name="thetalkingfowl_theme_options[postdisplaystyle]" value="standard" <?php checked('standard', $options['postdisplaystyle'] ); ?>/>
						<?php _e( 'Standard', 'thetalkingfowl' ); ?> &nbsp;&nbsp;
						<label class="description" for="thetalkingfowl_theme_options[postdisplaystyle]"><?php _e( '(Default: Standard) Choose how you want to display your post page', 'thetalkingfowl' ); ?></label>
					</td>
				</tr>

				<?php

//////////////////////////////////////////    Displays the last twit from twitter user //////////////////////////////////////////  
?>

				<tr valign="top"><th scope="row"><?php _e( 'Twitter user', 'thetalkingfowl' ); ?></th>
					<td>
						<input id="thetalkingfowl_theme_options[twituser]" style="width:100px !important" type="text" name="thetalkingfowl_theme_options[twituser]" value="<?php esc_attr_e(isset($options['twituser']) ? $options['twituser'] :'' ); ?>" />
						<label class="description" for="thetalkingfowl_theme_options[twituser]"><?php _e( '(Leave empty to turn off) View last twit of this user' , 'thetalkingfowl'); ?></label>
					</td>
                                </tr>
                    <?php
//////////////////////////////////////////   Displays the last twit from twitter user //////////////////////////////////////////  
?>
				<tr valign="top"><th scope="row"></th>
					<td>
						<input id="thetalkingfowl_theme_options[twituserdisplay]"   type="radio" name="thetalkingfowl_theme_options[twituserdisplay]" value="plain" <?php checked('plain', $options['twituserdisplay']); ?>/>
						<?php _e( 'Plain', 'thetalkingfowl' ); ?>
						<input id="thetalkingfowl_theme_options[twituserdisplay]"   type="radio" name="thetalkingfowl_theme_options[twituserdisplay]" value="inset" <?php checked('inset', $options['twituserdisplay'] ); ?>/>
						<?php _e( 'Inset', 'thetalkingfowl' ); ?> &nbsp;&nbsp;
						<label class="description" for="thetalkingfowl_theme_options[twituserdisplay]"><?php _e( '(Default: Plain) Choose how you want to display your twit (inset or plain)', 'thetalkingfowl' ); ?></label>
					</td>
				</tr>
				<?php
//////////////////////////////////////////     Displays the last x numbers of public pictures from a flickr user //////////////////////////////////////////  
?>
				<tr valign="top"><th scope="row"><?php _e( 'Flickr user', 'thetalkingfowl' ); ?></th>
					<td>
						<input id="thetalkingfowl_theme_options[flickruser]" style="width:100px !important" type="text" name="thetalkingfowl_theme_options[flickruser]" value="<?php esc_attr_e( isset($options['flickruser']) ? $options['flickruser'] :'' ); ?>" />
						<label class="description" for="thetalkingfowl_theme_options[flickruser]"><?php _e( '(Leave empty to turn off) View PUBLIC pictures from this user. Click ', 'thetalkingfowl' ); ?><a href="http://idgettr.com/" target="_blank" >here</a> <?php _e( 'to get user ID number. ', 'thetalkingfowl' ); ?></label>
					</td>
				</tr>
                                <tr valign="top"><th scope="row"></th>
					<td>
						<input id="thetalkingfowl_theme_options[flickruserset]" style="width:100px !important" type="text" name="thetalkingfowl_theme_options[flickruserset]" value="<?php esc_attr_e( isset($options['flickruserset']) ? $options['flickruserset'] :'' ); ?>" />
						<label class="description" for="thetalkingfowl_theme_options[flickruserset]"><?php _e( 'View a SET from the user. User id is required' , 'thetalkingfowl'); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"></th>
					<td>
						<input id="thetalkingfowl_theme_options[flickrusernum]" style="width:100px !important" type="text" name="thetalkingfowl_theme_options[flickrusernum]" value="<?php esc_attr_e(isset($options['flickrusernum']) ? $options['flickrusernum'] :'' ); ?>" />
						<label class="description" for="thetalkingfowl_theme_options[flickrusernum]"><?php _e( 'Amount of pictures to display' , 'thetalkingfowl'); ?></label>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'thetalkingfowl' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

//////////////////////////////////////////    Sanitize and validate input. Accepts an array, return a sanitized array. //////////////////////////////////////////  

function thetalkingfowl_validate( $input ) {

	// Say our text option must be safe text with no HTML tags
        $input['postdisplaystyle'] = wp_filter_nohtml_kses( $input['postdisplaystyle'] );
		$input['twituser'] = wp_filter_nohtml_kses( $input['twituser'] );
		$input['twituserdisplay'] = wp_filter_nohtml_kses( $input['twituserdisplay'] );
		$input['flickruser'] = wp_filter_nohtml_kses( $input['flickruser'] );
		$input['flickruserset'] = wp_filter_nohtml_kses( $input['flickruserset'] );
		$input['flickrusernum'] = wp_filter_nohtml_kses( $input['flickrusernum'] );

	return $input;
}
