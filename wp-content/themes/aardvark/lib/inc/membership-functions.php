<?php

/**
 * Add option to hide sidebars on restricted PMP pages
 *
 */
function ghostpool_pmp_extra_page_settings() {

	$custom_fields[] = array( 
		'field_name' => 'pmp_hide_sidebars',
		'label' => esc_html__( 'Hide Sidebars On Restricted Pages', 'aardvark' ),
		'field_type' => 'select',
		'options' => array( 
			'0' => esc_html__( 'No', 'aardvark' ),
			'1' => esc_html__( 'Yes', 'aardvark' ),
		 ),
	 );
	
	return $custom_fields;

}
add_filter( 'pmpro_custom_advanced_settings', 'ghostpool_pmp_extra_page_settings' );
			
/**
 * Redirect away from any BuddyPress page if set to
 *
 */
if ( defined( 'PMPRO_VERSION' ) && defined( 'PMPROBP_DIR' ) && function_exists( 'bp_is_active' ) && ! function_exists( 'ghostpool_pmpro_bp_lockdown_all_bp' ) ) {
	function ghostpool_pmpro_bp_lockdown_all_bp() {

		if ( ! function_exists( 'pmpro_getMembershipLevelForUser' ) ) {
			return;
		}
	
		if ( ! is_buddypress() OR bp_is_register_page() ) {
			return;
		}
		
		global $current_user;
		$user_id = $current_user->ID;
	
		if ( ! empty( $user_id ) ) {
			$level = pmpro_getMembershipLevelForUser( $user_id );
		}
		if ( ! empty( $level ) ) {
			$level_id = $level->id;
		} else {
			$level_id = 0;	// non-member user
		}
		
		$pmpro_bp_options = pmpro_bp_get_level_options( $level_id );
			
		if ( $pmpro_bp_options['pmpro_bp_restrictions'] == -1 ) {
			pmpro_bp_redirect_to_access_required_page();
		}
		
	}	
	remove_action( 'template_redirect', 'pmpro_bp_lockdown_all_bp', 50 );
	add_action( 'template_redirect', 'ghostpool_pmpro_bp_lockdown_all_bp', 50 );
}

/**
 * Redirect PMP account links to BuddyPress profile links
 *
 */	
if ( defined( 'PMPRO_VERSION' ) && function_exists( 'bp_is_active' ) && ! function_exists( 'ghostpool_redirect_pmp_profile_access' ) ) {
	function ghostpool_redirect_pmp_profile_access() {
			
		if ( current_user_can( 'manage_options' ) ) {
			return;
		}
	
		if ( strpos( $_SERVER['REQUEST_URI'] , 'wp-admin/profile.php' ) ) {
			global $bp;
			wp_redirect( apply_filters( 'ghostpool_profile_url', $bp->loggedin_user->domain . '/profile/edit' ) );
			die();
		 }
 
	}
	add_action ( 'init' , 'ghostpool_redirect_pmp_profile_access' );
}

/*
Plugin Name: Paid Memberships Pro - Member Homepages Add On
Plugin URI: http://www.paidmembershipspro.com/pmpro-member-homepages/
Description: Redirect members to a unique homepage/landing page based on their level.
Version: .1
Author: Stranger Studios
Author URI: http://www.strangerstudios.com
*/
if ( defined( 'PMPRO_VERSION' ) ) {

	/**
	* Function to redirect member on login to their membership level's homepage
	*
	*/
	function pmpromh_login_redirect( $redirect_to, $request, $user ) {

		if ( !empty( $user ) && ! empty( $user->ID ) && function_exists( 'pmpro_getMembershipLevelForUser' ) ) {
			$level = pmpro_getMembershipLevelForUser( $user->ID );
			$member_homepage_id = pmpromh_getHomepageForLevel( $level->id );
		
			if ( ! empty( $member_homepage_id ) ) {
				$redirect_to = get_permalink( $member_homepage_id ) ;
			}
		}

		return $redirect_to;
	}
	add_filter( 'login_redirect', 'pmpromh_login_redirect', 10, 3 );

	/**
	* Function to redirect member to their membership level's homepage when trying to access your site's front page ( static page or posts page ).
	*
	*/
	function pmpromh_template_redirect_homepage() {
		global $current_user;
		if ( ! empty( $current_user->ID ) && is_front_page() && ! isset( $_GET['vc_editable'] ) && ! isset( $_GET['customize_theme'] ) ) {
			$member_homepage_id = pmpromh_getHomepageForLevel();
			if ( ! empty( $member_homepage_id ) && ! is_page( $member_homepage_id ) ) {
				wp_redirect( get_permalink( $member_homepage_id ) );
				exit;
			}
		}
	}
	add_action( 'template_redirect', 'pmpromh_template_redirect_homepage' );

	/**
	* Function to get a homepage for level
	*
	*/
	function pmpromh_getHomepageForLevel( $level_id = NULL ) {
		if ( empty( $level_id ) && function_exists( 'pmpro_getMembershipLevelForUser' ) ) {
			global $current_user;
			$level = pmpro_getMembershipLevelForUser( $current_user->ID );
			if ( !empty( $level ) ) {
				$level_id = $level->id;
			}
		}
	
		//look up by level
		if( !empty( $level_id ) ) {
			$member_homepage_id = get_option( 'pmpro_member_homepage_' . $level_id );
		} else {
			$member_homepage_id = false;
		}

		return $member_homepage_id;
	}

	/**
	* Settings
	*
	*/
	function pmpromh_pmpro_membership_level_after_other_settings() { ?>
		<table>
		<tbody class="form-table">
			<tr>
				<td>
					<tr>
						<th scope="row" valign="top"><label for="member_homepage"><?php esc_attr_e( 'Member Homepage', 'aardvark' ); ?>:</label></th>
						<td>
							<?php
								$level_id = intval( $_REQUEST['edit'] );
								$member_homepage_id = pmpromh_getHomepageForLevel( $level_id );
							?>
							<?php wp_dropdown_pages( array( "name" => "member_homepage_id", "show_option_none" => "-- " . esc_attr__( 'Choose One', 'aardvark' ) . " --", "selected" => $member_homepage_id ) ); ?>				
						</td>
					</tr>
				</td>
			</tr> 
		</tbody>
		</table>
	<?php }
	add_action( 'pmpro_membership_level_after_other_settings', 'pmpromh_pmpro_membership_level_after_other_settings' );

	/**
	* Save the member homepage.
	*
	*/
	function pmpromh_pmpro_save_membership_level( $level_id ) {
		if ( isset( $_REQUEST['member_homepage_id'] ) ) {
			update_option( 'pmpro_member_homepage_' . $level_id, $_REQUEST['member_homepage_id'] );
		}	
	}
	add_action( 'pmpro_save_membership_level', 'pmpromh_pmpro_save_membership_level' );

}