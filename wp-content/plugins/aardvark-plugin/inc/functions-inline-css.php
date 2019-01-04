<?php

if ( ! function_exists( 'ghostpool_posts_css' ) ) {
	function ghostpool_posts_css( $name = '', $atts ) {
	
		extract( $atts );

		$custom_css = '';

		if ( isset( $title_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-widget-title h3{color:' . esc_attr( $title_color ) . ';}';
		}
		if ( isset( $icon_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-element-icon{color:' . esc_attr( $icon_color ) . ';}';
		}
		if ( isset( $post_title_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-loop-title a, #' . sanitize_html_class( $name ) . ' ul.page-numbers .page-numbers, #' . sanitize_html_class( $name ) . ' ul.page-numbers a.page-numbers:hover{color:' . esc_attr( $post_title_color ) . ';}';
		} 
		if ( isset( $post_title_hover_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-loop-title a:hover, #' . sanitize_html_class( $name ) . ' ul.page-numbers a.page-numbers{color:' . esc_attr( $post_title_hover_color ) . ';}';
		}
		if ( isset( $post_link_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-loop-content a{color:' . esc_attr( $post_link_color ) . ';}';
		}
		if ( isset( $post_link_hover_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-loop-text a:hover{color:' . esc_attr( $post_link_hover_color ) . ';}';
		}		
		if ( isset( $post_text_color ) ) {  
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-loop-text{color:' . esc_attr( $post_text_color ) . ';}';
		}
		if ( isset( $meta_text_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-loop-meta, #' . sanitize_html_class( $name ) . ' .gp-loop-meta a{color:' . esc_attr( $meta_text_color ) . ';}';
		}	
		if ( isset( $bg_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . '.gp-posts-masonry .gp-loop-content, #' . sanitize_html_class( $name ) . ' .gp-posts-masonry .gp-loop-content{background-color:' . esc_attr( $bg_color ) . ';}';
		}
		if ( isset( $border_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . '.gp-posts-list .gp-post-item, #' . sanitize_html_class( $name ) . '.gp-posts-vertical .gp-post-item, #' . sanitize_html_class( $name ) . ' .gp-posts-masonry .gp-loop-content{border-color:' . esc_attr( $border_color ) . ';}';
		}			
		if ( isset( $ranking_bg_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-ranking-counter{background-color:' . esc_attr( $ranking_bg_color ) . ';}';
		}						
		if ( isset( $ranking_text_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-ranking-counter{color:' . esc_attr( $ranking_text_color ) . ';}';
		}	

		if ( isset( $ranking_text_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-ranking-counter{color:' . esc_attr( $ranking_text_color ) . ';}';
		}

		wp_register_style( 'ghostpool-posts', false );
		wp_enqueue_style( 'ghostpool-posts' );
		wp_add_inline_style( 'ghostpool-posts', $custom_css );
		
	}
}

/**
 * Add pricing table CSS to header
 *
 */	
if ( ! function_exists( 'ghostpool_pricing_table_css' ) ) {
	function ghostpool_pricing_table_css( $name = '', $atts ) {
	
		extract( $atts );
		
		$custom_css = '';

		if ( isset( $title_bg_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-header{background-color:' . esc_attr( $title_bg_color ) . ';}';
		}	
			
		if ( isset( $highlight_title_bg_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . '.gp-highlight-column .gp-pricing-column-header{background-color:' . esc_attr( $highlight_title_bg_color ) . ';}';
		}
		
		if ( isset( $title_text_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-title{color:' . esc_attr( $title_text_color ) . ';}';
		}	

		if ( isset( $highlight_title_text_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . '.gp-highlight-column .gp-pricing-column-highlight-text{color:' . esc_attr( $highlight_title_text_color ) . ';}';
		}
		
		if ( isset( $price_bg_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-costs{background-color:' . esc_attr( $price_bg_color ) . ';}';
		}	
		
		if ( isset( $price_circle_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . '.gp-style-2 .gp-pricing-column-circle{background-color:' . esc_attr( $price_circle_color ) . ';}';
		}	
			
		if ( isset( $price_text_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-costs h5, #' . sanitize_html_class( $name ) . ' .gp-pricing-column-costs h6{color:' . esc_attr( $price_text_color ) . ';}';
		}
			
		if ( isset( $content_bg_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-content{background-color:' . esc_attr( $content_bg_color ) . ';}';
		}		

		if ( isset( $content_bg_color_alt ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . '.gp-style-2 .gp-pricing-column-content li:nth-child(odd){background-color:' . esc_attr( $content_bg_color_alt ) . ';}';
		}	
					
		if ( isset( $content_text_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-content{color:' . esc_attr( $content_text_color ) . ';}';
		}		
		
		if ( isset( $footer_bg_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-footer,
			#' . sanitize_html_class( $name ) . '.gp-pricing-column{background-color:' . esc_attr( $footer_bg_color ) . ';}';
		}
			
		if ( isset( $button_bg_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-button{background-color:' . esc_attr( $button_bg_color ) . ';}';
		}
			
		if ( isset( $button_bg_hover_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-button:hover{background-color:' . esc_attr( $button_bg_hover_color ) . ';}';
		}		
			
		if ( isset( $button_text_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-button{color:' . esc_attr( $button_text_color ) . ';}';
		}		
			
		if ( isset( $divider_color ) ) { 
			$custom_css .= '#' . sanitize_html_class( $name ) . ' .gp-pricing-column-divider{border-color:' . esc_attr( $divider_color ) . ';}';
		}
	
		wp_register_style( 'ghostpool-pricing-column', false );
		wp_enqueue_style( 'ghostpool-pricing-column' );
		wp_add_inline_style( 'ghostpool-pricing-column', $custom_css );
			
	}
}

/**
 * Add BuddyPress element CSS to header
 *
 */	
if ( ! function_exists( 'ghostpool_buddypress_css' ) ) {
	function ghostpool_buddypress_css( $name = '', $atts ) {
	
		extract( $atts );
		
		$custom_css = '';

		if ( isset( $link_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .item-options a {
			color:' . esc_attr( $link_color ) . ';
			}';
		}

		if ( isset( $bg_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-loop-content {
			background-color:' . esc_attr( $bg_color ) . ';
			}
			#' . sanitize_html_class( $name ) . ' .gp-post-thumbnail .gp-bp-col-avatar img.avatar {
			border-color:' . esc_attr( $bg_color ) . ';
			}';
		}
				
		if ( isset( $border_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-loop-content,
			#' . sanitize_html_class( $name ) . ' .gp-no-cover-image img.avatar,
			#' . sanitize_html_class( $name ) . ' .gp-bp-avatar img.avatar,
			#' . sanitize_html_class( $name ) . ' .item-avatar img.avatar {
			border-color:' . esc_attr( $border_color ) . ';
			}';
		}

		if ( isset( $title_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-loop-title a {
			color:' . esc_attr( $title_color ) . ';
			}';
		}

		if ( isset( $text_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-loop-meta,
			#' . sanitize_html_class( $name ) . ' .gp-loop-text {
			color:' . esc_attr( $text_color ) . ';
			}';
		}

		wp_register_style( 'ghostpool-buddypress', false );
		wp_enqueue_style( 'ghostpool-buddypress' );
		wp_add_inline_style( 'ghostpool-buddypress', $custom_css );
		
	}
}

/**
 * Add BP profile search element CSS to header
 *
 */	
 
if ( ! function_exists( 'ghostpool_bp_profile_search_css' ) ) {
	function ghostpool_bp_profile_search_css( $name = '', $atts ) {
	
		extract( $atts );
		
		$custom_css = '';
		
		if ( isset( $text_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . '.gp-bps-wrapper {
			color:' . esc_attr( $text_color ) . ';
			}';
		}

		if ( isset( $bg_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . '.gp-bps-wrapper {
			background-color:' . esc_attr( $bg_color ) . ';
			}';
		}
		
		if ( isset( $border_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . '.gp-bps-wrapper {
			border-color:' . esc_attr( $border_color ) . ';
			}';
		}
		
		wp_register_style( 'ghostpool-bp-profile-search', false );
		wp_enqueue_style( 'ghostpool-bp-profile-search' );
		wp_add_inline_style( 'ghostpool-bp-profile-search', $custom_css );
		
	}
}
		
/**
 * Add Testimonial Slider element CSS to header
 *
 */	
 
if ( ! function_exists( 'ghostpool_testimonial_slider_css' ) ) {
	function ghostpool_testimonial_slider_css( $name = '', $atts ) {
	
		extract( $atts );
		
		$custom_css = '';

		if ( isset( $headline_font_size ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-testimonial-headline {
			font-size:' . esc_attr( $headline_font_size ) . ';
			}';
		}

		if ( isset( $headline_line_height ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-testimonial-headline {
			line-height:' . esc_attr( $headline_line_height ) . ';
			}';
		}

		if ( isset( $quote_font_size ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-testimonial-text {
			font-size:' . esc_attr( $quote_font_size ) . ';
			}';
		}

		if ( isset( $quote_line_height ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-testimonial-text {
			line-height:' . esc_attr( $quote_line_height ) . ';
			}';
		}
		
		if ( isset( $name_font_size ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-testimonial-name {
			font-size:' . esc_attr( $name_font_size ) . ';
			}';
		}

		if ( isset( $name_line_height ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-testimonial-name {
			line-height:' . esc_attr( $name_line_height ) . ';
			}';
		}
								
		if ( isset( $avatar_border_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . '.gp-slider .slides li .gp-testimonial-image img {
			border-color:' . esc_attr( $avatar_border_color ) . ';
			}
			#' . sanitize_html_class( $name ) . ' .gp-pointer {
			border-left-color:' . esc_attr( $avatar_border_color ) . ';
			}';
		}
		
		if ( isset( $headline_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-testimonial-headline {
			color:' . esc_attr( $headline_color ) . ';
			}';
		}

		if ( isset( $quote_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-testimonial-text {
			color:' . esc_attr( $quote_color ) . ';
			}';
		}

		if ( isset( $name_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-testimonial-name {
			color:' . esc_attr( $name_color ) . ';
			}';
		}
		
		wp_register_style( 'ghostpool-testimonials-slider', false );
		wp_enqueue_style( 'ghostpool-testimonials-slider' );
		wp_add_inline_style( 'ghostpool-testimonials-slider', $custom_css );
		
	}
}

/**
 * Add Featured box element CSS to header
 *
 */	
if ( ! function_exists( 'ghostpool_featured_box_css' ) ) {
	function ghostpool_featured_box_css( $name = '', $atts ) {
	
		extract( $atts );
		
		$custom_css = '';
		
		if ( isset( $spacing ) ) {
			$spacing = str_replace( 'px', '', $spacing );
		} else {
			$spacing = 0;
		}
	
		$extra_widths = 0;
		$extra_width = 0;

		if ( ghostpool_option( 'theme_layout' ) == 'gp-wide-layout' ) {
			$extra_width += 30;
		} else {
			$extra_width += 0;
		}

		if ( isset( $layout ) && 'gp-boxed' === $layout) {
			$extra_width += 0;
		} else {
			$extra_width += 30;
		}
		
		$extra_widths = $extra_width;
		
		$custom_css .= '
		#' . sanitize_html_class( $name ) . ' .gp-featured-caption {
		left:' . $spacing . 'px;
		bottom:' . $spacing . 'px;
		}	
		#' . sanitize_html_class( $name ) . ' .gp-featured-large,
		#' . sanitize_html_class( $name ) . ' .gp-featured-small {
		padding:' . $spacing . 'px;
		}
		#' . sanitize_html_class( $name ) . ' .gp-featured-small {
		width: ' . ( 250 - ( $spacing * 2 ) ) . 'px;
		height: ' . ( 200 - $spacing ) . 'px;
		}		
		#' . sanitize_html_class( $name ) . ' .gp-featured-box-scroll {
		margin-top:' . ( $spacing * 2 ) . 'px;
		margin-left:' . $spacing . 'px;
		margin-right:-'. $spacing .'px;
		}
		#' . sanitize_html_class( $name ) . '.gp-wide .gp-featured-box-scroll {
		margin-right:-'. ( $spacing + 30 ) . 'px;
		}
		#' . sanitize_html_class( $name ) . '.gp-wide .gp-featured-box-scroll .gp-col-1 .gp-featured-small:first-child{
		margin-left:-' . $spacing . 'px;
		}

		@media only screen and (max-width : 767px) {		
			#' . sanitize_html_class( $name ) . '.gp-wide .gp-featured-large,
			#' . sanitize_html_class( $name ) . '.gp-wide .gp-featured-box-scroll {				
			width: calc(100% + 30px);
			}			
		}
				
		@media only screen and (min-width : 768px) {
			#' . sanitize_html_class( $name ) . ' .gp-featured-large-col {
			width: ' . ( 339 + $extra_widths ) . 'px;
			height: 294px;
			}	
			#' . sanitize_html_class( $name ) . ' .gp-featured-small-col {
			width: ' . ( ( 169.5 + ( $extra_widths / 2 ) ) - ( $spacing * 2 ) ) . 'px;
			}
			#' . sanitize_html_class( $name ) . ' .gp-featured-small {
			height: ' . ( 147 - $spacing ) . 'px;
			}
		}
		
		@media only screen and (min-width : 992px) {		
			#' . sanitize_html_class( $name ) . ' .gp-featured-large-col {
			width: ' . ( 455 + $extra_widths ) . 'px;
			height: 388px;
			}
			#' . sanitize_html_class( $name ) . ' .gp-featured-small-col {
			width: ' . ( ( 227.5 + ( $extra_widths / 2 ) ) - ( $spacing * 2 ) ) . 'px;
			}
			#' . sanitize_html_class( $name ) . ' .gp-featured-small {
			height: ' . ( 194 - $spacing ) . 'px;
			}
		}	
		
		@media only screen and (min-width : 1200px) {		
			#' . sanitize_html_class( $name ) . ' .gp-featured-large-col {
			width: ' . ( 540 + $extra_widths ) . 'px;
			height: 456px;
			}
			#' . sanitize_html_class( $name ) . ' .gp-featured-small-col {
			width: ' . ( ( 270 + ( $extra_widths / 2 ) ) - ( $spacing * 2 ) ) . 'px;
			}
			#' . sanitize_html_class( $name ) . ' .gp-featured-small {
			height: ' . ( 228 - $spacing ) . 'px;
			}	
		}
		
		@media only screen and (min-width : 1470px) {		
			#' . sanitize_html_class( $name ) . ' .gp-featured-large-col {
			width: '. ( 570 + $extra_widths ) . 'px;
			height: 480px;
			}
			#' . sanitize_html_class( $name ) . ' .gp-featured-small-col {
			width: ' . ( 285 + ( $extra_widths / 2 ) ) . 'px;
			}
			#' . sanitize_html_class( $name ) . ' .gp-featured-small {
			height: 240px;
			}
		}';
		
		wp_register_style( 'ghostpool-shortcodes', false );
		wp_enqueue_style( 'ghostpool-shortcodes' );
		wp_add_inline_style( 'ghostpool-shortcodes', $custom_css );
		
	}
}

/**
 * Add Contact Details element CSS to header
 *
 */	
if ( ! function_exists( 'ghostpool_contact_details_css' ) ) {
	function ghostpool_contact_details_css( $name = '', $atts ) {
	
		extract( $atts );
		
		$custom_css = '';

		if ( isset( $icon_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-contact-detail:before {
			color:' . esc_attr( $icon_color ) . ';
			}';
		}

		if ( isset( $text_color ) ) { 
			$custom_css .= '
			#' . sanitize_html_class( $name ) . ' .gp-contact-detail {
			color:' . esc_attr( $text_color ) . ';
			}';
		}
		
		wp_register_style( 'ghostpool-contact-details-widget', false );
		wp_enqueue_style( 'ghostpool-contact-details-widget' );
		wp_add_inline_style( 'ghostpool-contact-details-widget', $custom_css );
		
	}
}