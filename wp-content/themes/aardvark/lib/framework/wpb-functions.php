<?php
	
/**
 * Load page builder styles and scripts
 *
 */
if ( ! function_exists( 'ghostpool_page_builder_enqueue' ) ) {
	function ghostpool_page_builder_enqueue() {
		wp_enqueue_style( 'ghostpool-page-builder', get_template_directory_uri() . '/lib/framework/css/page-builder.css' );	
		wp_enqueue_script( 'ghostpool-page-builder', get_template_directory_uri() . '/lib/framework/scripts/page-builder.js', array( 'jquery' ), '', true );			
	}
}
add_action( 'admin_enqueue_scripts', 'ghostpool_page_builder_enqueue' );			

/**
* Remove WPB page builder lightbox
*
*/	
if ( ! function_exists( 'ghostpool_remove_wpb_lightbox' ) ) {	
	function ghostpool_remove_wpb_lightbox(){
		wp_dequeue_script( 'prettyphoto' );
		wp_deregister_script( 'prettyphoto' );
		wp_dequeue_style( 'prettyphoto' );
		wp_deregister_style( 'prettyphoto' );
	}
}
add_action( 'wp_enqueue_scripts', 'ghostpool_remove_wpb_lightbox', 9999 );
		
/**
* Override default page builder settings
*
*/
if ( ! function_exists( 'ghostpool_page_builder_functions' ) ) {
	function ghostpool_page_builder_functions() {
		vc_set_as_theme(); // Disable design options
		vc_set_default_editor_post_types( array( 'page' ) ); // Check VC post type checkboxes by default
	}				
}				
add_action( 'vc_before_init', 'ghostpool_page_builder_functions', 9 );

/**
 * Disable activation redirect
 *
 */
remove_action( 'admin_init', 'vc_page_welcome_redirect' );

/**
* Remove Visual Composer activation notice
*
*/
setcookie( 'vchideactivationmsg', '1', strtotime( '+3 years' ), '/' );
setcookie( 'vchideactivationmsg_vc11', ( defined( 'WPB_VC_VERSION' ) ? WPB_VC_VERSION : '1' ), strtotime( '+3 years' ), '/' );

/**
* Remove !important tag from background center position
*
*/
if ( ! function_exists( 'ghostpool_page_builder_shortcodes_custom_css' ) ) {
	function ghostpool_page_builder_shortcodes_custom_css( $css ) {
		if ( stripos( $css, '' ) !== false ) {
			$css = str_replace( 'background-position: center !important;', 'background-position: center;', $css );
		}
		return $css;
	}				
}				
add_filter( 'vc_base_build_shortcodes_custom_css', 'ghostpool_page_builder_shortcodes_custom_css' );

/**
* Load custom options for default elements
*
*/
require_once( get_template_directory() . '/lib/framework/wpb-custom-options.php' );

/**
* Load custom element options
*
*/
require_once( get_template_directory() . '/lib/framework/wpb-options/bp-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/bp-profile-search-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/carousel-posts-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/carousel-images-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/events-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/events-calendar-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/featured-box-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/login-register-form-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/particles-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/pmp-register-form-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/posts-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/post-submission-form-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/pricing-column-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/sensei-courses-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/showcase-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/statistics-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/team-options.php' );
require_once( get_template_directory() . '/lib/framework/wpb-options/testimonial-slider-options.php' );
		
/**
* Custom image size field
*
*/	
if ( ! function_exists( 'ghostpool_wpb_image_size_field' ) ) {	
	function ghostpool_wpb_image_size_field( $default = true ) {
		global $_wp_additional_image_sizes;
		$output = array();
		$sizes = array();
		foreach ( get_intermediate_image_sizes() as $_size ) {
			if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
				$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
				$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
			} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
				$sizes[ $_size ] = array(
					'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
					'height' => $_wp_additional_image_sizes[ $_size ]['height'],
				);
			}
			$name = $_size . ' (' . $sizes[ $_size ]['width'] . ' x ' . $sizes[ $_size ]['height'] . ')';
			$output[ $name ] = $_size;		
		}
		if ( $default == true ) {			
			return array_merge( array( esc_html__( 'Default', 'aardvark' ) => 'default' ), $output );
		} else {
			return $output;
		}	
	}
}

/**
* Change alignments for RTL support
*
*/
function ghostpool_rtl_update_vc_rows() {

	if ( is_rtl() ) {
	
		$args = array(
			'post_type'  => 'page',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key'     => '_ghostpool_imported',
					'value'   => 1,					
					'compare' => '=',
				),
				array(
					'key'     => '_ghostpool_rtl',
					'compare' => 'NOT EXISTS',
				),
			),
			'posts_per_page'      => -1,
			'paged'          	  => 1,
		);

		$gp_query = new WP_Query( $args );
	
		if ( $gp_query->have_posts() ) : while ( $gp_query->have_posts() ) : $gp_query->the_post();
	
			global $post;

			$search = array( 'background_position="right center"', 'text_align:left', 'align="left"' );
			$replace = array( 'background_position="left center"', 'text_align:right', 'align="right"' );
		
			$post_content = str_replace( $search, $replace, $post->post_content );

			$update_post = array(
				'ID' => get_the_ID(),
				'post_content' => $post_content,
			);

			wp_update_post( $update_post );

			delete_post_meta( get_the_ID(), '_ghostpool_ltr' );
			add_post_meta( get_the_ID(), '_ghostpool_rtl', 1, true );
			
		endwhile; endif; wp_reset_postdata();

	} else {

		$args = array(
			'post_type'  => 'page',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key'     => '_ghostpool_imported',
					'value'   => 1,					
					'compare' => '=',
				),
				array(
					'key'     => '_ghostpool_ltr',
					'compare' => 'NOT EXISTS',
				),
			),
			'posts_per_page'      => -1,
			'paged'          	  => 1,
		);

		$gp_query = new WP_Query( $args );
	
		if ( $gp_query->have_posts() ) : while ( $gp_query->have_posts() ) : $gp_query->the_post();
	
			global $post;

			$search = array( 'background_position="left center"', 'text_align:right', 'align="right"' );
			$replace = array( 'background_position="right center"', 'text_align:left', 'align="left"' );
		
			$post_content = str_replace( $search, $replace, $post->post_content );

			$update_post = array(
				'ID' => get_the_ID(),
				'post_content' => $post_content,
			);

			wp_update_post( $update_post );

			delete_post_meta( get_the_ID(), '_ghostpool_rtl' );
			add_post_meta( get_the_ID(), '_ghostpool_ltr', 1, true );
			
		endwhile; endif; wp_reset_postdata();
			
	}

}
add_action( 'after_setup_theme', 'ghostpool_rtl_update_vc_rows' );	

/**
* Login page builder template
*
*/
if ( ! function_exists( 'ghostpool_login_wpb_template' ) ) {
	function ghostpool_login_wpb_template( $data ) {
		$template = array();
		$template['name'] = esc_html__( 'Login Page', 'aardvark' );
		$template['custom_class'] = 'ghostpool-login-wpb-template';
		$template['content'] = '[vc_row full_width="stretch_row" full_height="yes" content_placement="middle" animated_bg="true" gradient_color_1="rgba(236,77,59,0.7)" gradient_color_2="rgba(242,109,60,0.7)" gradient_color_3="rgba(236,77,59,0.7)" gradient_color_4="rgba(255,178,171,0.7)" css=".vc_custom_1519134581072{padding-right: 30px !important;padding-left: 30px !important;}"][vc_column width="1/12" offset="vc_col-lg-4 vc_col-md-3 vc_hidden-xs"][/vc_column][vc_column width="5/6" css=".vc_custom_1519135457300{padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 30px !important;padding-left: 30px !important;background-color: #ffffff !important;border-radius: 3px !important;}" offset="vc_col-lg-4 vc_col-md-6 vc_col-xs-12" bb_tab_container=""][vc_single_image image="713" img_size="150x31" alignment="center"][gp_login_register_form][/vc_column][vc_column width="1/12" offset="vc_col-lg-4 vc_col-md-3 vc_hidden-xs"][/vc_column][/vc_row]';
		array_unshift( $data, $template );
		return $data;
	}
}	
add_filter( 'vc_load_default_templates', 'ghostpool_login_wpb_template' );