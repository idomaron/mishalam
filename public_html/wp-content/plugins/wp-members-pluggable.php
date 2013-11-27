<?php
if( ! function_exists( 'wpmem_inc_registration_NEW' ) ):

/**

 * Registration Form Dialog

 *

 * Outputs the table-less form for new user

 * registration and existing user edits.

 *

 * @since 2.5.1

 *

 * @uses apply_filters Calls 'wpmem_register_form_before' filter to add any string to the beginning of the registration form

 * @uses apply_filters Calls 'wpmem_register_form' filter to change any element of the generated HTML string of the registration form

 * @uses apply_filters Calls 'wpmem_register_heading' filter to change the heading of the registration form

 * @uses apply_filters Calls 'wpmem_tos_link_txt' filter to change the text (and link) for the TOS (Terms of Service) acknowledgement

 *

 * @param  string $toggle

 * @param  string $heading

 * @global string $wpmem_regchk

 * @global array  $userdata

 * @return string $form

 */

function wpmem_inc_registration_NEW( $toggle = 'new', $heading = '' )

{

	// fix the wptexturize

	remove_filter( 'the_content', 'wpautop' );

	remove_filter( 'the_content', 'wptexturize' );

	add_filter( 'the_content', 'wpmem_texturize', 99 );

	

	global $wpmem_regchk, $userdata; 



	$heading = ( !$heading ) ? apply_filters( 'wpmem_register_heading', __( 'New Users Registration', 'wp-members' ) ) : $heading;



	$form = apply_filters( 'wpmem_register_form_before', '' );



	$form.= '[wpmem_txt]<div id="wpmem_reg">

		<a name="register"></a>

	<form name="form" method="post" action="' . get_permalink() . '" class="form">'; 



	$form = ( defined( 'WPMEM_USE_NONCE' ) ) ? $form . wp_nonce_field( 'wpmem-validate-submit', 'wpmem-form-submit' ) : $form;

	

	$form.= '<div class="edittop">';



	if( $toggle == 'edit' ) {



		$form = $form . '<div class="profilesingle"><label for="username" class="text nametxt">' . __( 'שם משתמש', 'wp-members' ) . '</label>

			<div class="div_text rightboxprofile"><input type="text" value="' . $userdata->user_login . '" class="textbox" disabled></div></div>';



	} else { 



		$val  = ( $_POST ) ? stripslashes( $_POST['log'] ) : '';

		$form = $form . '<div class="profilesingle"><label for="username" class="text nametxt">' . __( 'Choose a Username', 'wp-members' ) . '<font class="req">*</font></label>
			
			<div class="div_text rightboxprofile">

				<input name="log" type="text" value="' . $val . '" class="username" id="username" />

			</div>
			</div>';



	}



	$wpmem_fields = get_option( 'wpmembers_fields' );

	for( $row = 0; $row < count( $wpmem_fields ); $row++ )

	{ 

		$do_row = ( $toggle == 'edit' && $wpmem_fields[$row][2] == 'password' ) ? false : true;

		

		if( $wpmem_fields[$row][2] == 'tos' && $toggle == 'edit' && ( get_user_meta($userdata->ID, 'tos', true ) ) ) { 

			// makes tos field hidden on user edit page, unless they haven't got a value for tos

			$do_row = false; 

			$form = $form . wpmem_create_formfield( $wpmem_fields[$row][2], 'hidden', get_user_meta( $userdata->ID, 'tos', true ) );

		}
			if( $wpmem_fields[$row][3] == 'select' ) {
				$single_class = 'profilesingleselect';
			} else {
				$single_class = 'profilesingle';
			}
		

		if( $wpmem_fields[$row][4] == 'y' && $do_row == true ) {



			if( $wpmem_fields[$row][2] != 'tos' ) {



				$class = ( $wpmem_fields[$row][3] == 'password' ) ? 'text' : $wpmem_fields[$row][3];

				

				$form = $form . '<div class="' . $single_class . '"><label for="' . $wpmem_fields[$row][2] . '" class="' . $class . ' nametxt">' . $wpmem_fields[$row][1];

				$form = ( $wpmem_fields[$row][5] == 'y' ) ? $form . '<font class="req">*</font>' : $form;

				$form = $form . '</label>';



			} 


			if( $wpmem_fields[$row][3] == 'select' ) {
				$form = $form . '<div class="div_' . $class . ' rightboxprofileselect">';
			} else {
				$form = $form . '<div class="div_' . $class . ' rightboxprofile">';
			}


			if( ( $toggle == 'edit' ) && ( $wpmem_regchk != 'updaterr' ) ) { 



				$form = ( WPMEM_DEBUG == true ) ? $form . $wpmem_fields[$row][2] . "&nbsp;" : $form;



				switch( $wpmem_fields[$row][2] ) {

					case( 'description' ):

						$val = htmlspecialchars( get_user_meta( $userdata->ID, 'description', 'true' ) );

						break;



					case( 'user_email' ):

						$val = $userdata->user_email;

						break;



					case( 'user_url' ):

						$val = esc_url( $userdata->user_url );

						break;



					default:

						$val = htmlspecialchars( get_user_meta( $userdata->ID, $wpmem_fields[$row][2], 'true' ) );

						break;

				}



			} else {



				$val = ( isset( $_POST[ $wpmem_fields[$row][2] ] ) ) ? $_POST[ $wpmem_fields[$row][2] ] : '';



			}



			if( $wpmem_fields[$row][2] == 'tos' ) { 



				if( ( $toggle == 'edit' ) && ( $wpmem_regchk != 'updaterr' ) ) {

					$chk_tos;  // HUH?

				} else {

					$val = ( isset( $_POST[ $wpmem_fields[$row][2] ] ) ) ? $_POST[ $wpmem_fields[$row][2] ] : '';

				}



				// should be checked by default? and only if form hasn't been submitted

				$val = ( ! $_POST && $wpmem_fields[$row][8] == 'y' ) ? $wpmem_fields[$row][7] : $val;



				$form = $form . wpmem_create_formfield( $wpmem_fields[$row][2], $wpmem_fields[$row][3], $wpmem_fields[$row][7], $val );



				$form = ( $wpmem_fields[$row][5] == 'y' ) ? $form . '<font class="req">*</font>' : $form;



				// determine if TOS is a WP page or not...

				$tos_content = stripslashes( get_option( 'wpmembers_tos' ) );

				if( stristr( $tos_content, '[wp-members page="tos"' ) ) {

					

					$tos_content = " " . $tos_content;

					$ini = strpos( $tos_content, 'url="' );

					$ini += strlen( 'url="' );

					$len = strpos( $tos_content, '"]', $ini ) - $ini;

					$link = substr( $tos_content, $ini, $len );

					$tos_pop = '<a href="' . $link . '" target="_blank">';



				} else { 

					$tos_pop = "<a href=\"#\" onClick=\"window.open('" . WP_PLUGIN_URL . "/wp-members/wp-members-tos.php','mywindow');\">";

				}

				$form.= apply_filters( 'wpmem_tos_link_txt', sprintf( __( 'Please indicate that you agree to the %s TOS %s', 'wp-members' ), $tos_pop, '</a>' ) );



			} else {



				// for checkboxes

				if( $wpmem_fields[$row][3] == 'checkbox' ) { 

					$valtochk = $val;

					$val = $wpmem_fields[$row][7]; 

					// if it should it be checked by default (& only if form not submitted), then override above...

					if( $wpmem_fields[$row][8] == 'y' && ( ! $_POST && $toggle != 'edit' ) ) { $val = $valtochk = $wpmem_fields[$row][7]; }

				}



				// for dropdown select

				if( $wpmem_fields[$row][3] == 'select' ) {

					$valtochk = $val;

					$val = $wpmem_fields[$row][7];

				}

				

				if( ! isset( $valtochk ) ) { $valtochk = ''; }



				$form = $form . wpmem_create_formfield( $wpmem_fields[$row][2], $wpmem_fields[$row][3], $val, $valtochk );

			}



			$form = $form . '</div></div>'; 
			
			if($wpmem_fields[$row][2] == 'user_email') {
				$form.= '
				
					</div><!--div.edittop-->
				
					<div class="protxt">
                    	טקסט כלשהו לגבי חשיבות הנתונים למידע הסטטיסטי ושמירה על פרטיות ושזה לא חובה למלא אבל חשוב כדי לקבל מידע שיעזור וכו וכו
                    </div>
					
					
				';
			}

		}

	}



	if( WPMEM_CAPTCHA == 1 && $toggle != 'edit' ) { // don't show on edit page!



		$wpmem_captcha = get_option('wpmembers_captcha'); 

		if( $wpmem_captcha[0] && $wpmem_captcha[1] ) {



			$form = $form . '<div class="clear"></div>

				<div align="right" class="captcha">';

			$form = $form . wpmem_inc_recaptcha( $wpmem_captcha[0], $wpmem_captcha[2] );

			$form = $form . '</div>';

		} 

	}



	$var  = ( $toggle == 'edit' ) ? 'update' : 'register';

	$form.= '<input name="a" type="hidden" value="' . $var . '" />';



	$form = $form . '<input name="redirect_to" type="hidden" value="' . get_permalink() . '" />
					<div class="profilesingleselectbut">
						<div class="buttonareapro">
                        	<div class="txtleft"><font class="req">*</font>' . __( 'שדות חובה', 'wp-members' ) . '</div>
                            <div class=""><input name="submit" type="submit" value="' . __( 'שמור', 'wp-members' ) . '" class="bluebut" /></div>
                        </div></div>';



	$form = $form . '</form>';

	$form = $form . wpmem_inc_attribution();

	$form = $form . '</div>[/wpmem_txt]';

	

	$form = apply_filters( 'wpmem_register_form', $form );



	return $form;

}

endif;
?>