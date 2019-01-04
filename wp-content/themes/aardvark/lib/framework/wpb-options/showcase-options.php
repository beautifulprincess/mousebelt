<?php  if ( ! function_exists( 'ghostpool_wpb_showcase_options' ) ) {

	function ghostpool_wpb_showcase_options() {

		vc_map( array( 
			'name' => esc_html__( 'Showcase', 'aardvark' ),
			'base' => 'gp_showcase',
			'description' => esc_html__( 'Horizontal and vertical content.', 'aardvark' ),
			'class' => 'wpb_vc_showcase',
			'controls' => 'full',
			'icon' => 'gp-icon-showcase',
			'category' => esc_html__( 'Theme', 'aardvark' ),
			'params' => array(		
				array( 
				'heading' => esc_html__( 'Title', 'aardvark' ),
				'param_name' => 'widget_title',
				'type' => 'textfield',
				'admin_label' => true,
				'value' => '',
				),		 									
				array( 
				'heading' => esc_html__( 'Categories', 'aardvark' ),
				'description' => esc_html__( 'Enter the slugs or IDs separating each one with a comma e.g. xbox,ps3,pc.', 'aardvark' ),
				'param_name' => 'cats',
				'type' => 'textfield',
				),	
				array( 
				'heading' => esc_html__( 'Page IDs', 'aardvark' ),
				'description' => esc_html__( 'Enter the IDs of the pages you want to include, separating each with a comma e.g. 48,142.', 'aardvark' ),
				'param_name' => 'page_ids',
				'type' => 'textfield',
				),			
				array( 
				'heading' => esc_html__( 'Post Types', 'aardvark' ),
				'param_name' => 'post_types',
				'type' => 'posttypes',
				'value' => 'post',
				),
				array( 
				'heading' => esc_html__( 'Ranking', 'aardvark' ),
				'param_name' => 'ranking',
				'value' => array( esc_html__( 'Disabled', 'aardvark' ) => 'gp-no-ranking', esc_html__( 'Enabled', 'aardvark' ) => 'gp-ranking' ),
				'type' => 'dropdown',
				),	
				array( 
				'heading' => esc_html__( 'Format', 'aardvark' ),
				'param_name' => 'format',
				'value' => array( esc_html__( 'Horizontal Showcase', 'aardvark' ) => 'gp-posts-horizontal', esc_html__( 'Vertical Showcase', 'aardvark' ) => 'gp-posts-vertical' ),
				'type' => 'dropdown',
				),
				array( 
					'param_name' => 'style',
					'heading' => esc_html__( 'Style', 'aardvark' ),
					'type' => 'dropdown',
					'value' => array( 
						esc_html__( 'Classic', 'aardvark' ) => 'gp-style-classic',
						esc_html__( 'Modern', 'aardvark' ) => 'gp-style-modern',
					),
				),											
				array( 				
					'param_name' => 'alignment',
					'heading' => esc_html__( 'Content Alignment', 'aardvark' ),
					'type' => 'dropdown',
					'value' => array(
						esc_html__( 'Left Aligned', 'aardvark' ) => 'gp-align-left',
						esc_html__( 'Center Aligned', 'aardvark' ) => 'gp-align-center',
					),
				),				
				array( 
				'heading' => esc_html__( 'Order By', 'aardvark' ),
				'param_name' => 'orderby',
				'value' => array(
					esc_html__( 'Newest', 'aardvark' ) => 'newest',
					esc_html__( 'Oldest', 'aardvark' ) => 'oldest',
					esc_html__( 'Title (A-Z)', 'aardvark' ) => 'title_az',
					esc_html__( 'Title (Z-A)', 'aardvark' ) => 'title_za',
					esc_html__( 'Most Comments', 'aardvark' ) => 'comment_count',
					esc_html__( 'Most Views', 'aardvark' ) => 'views',
					esc_html__( 'Most Likes', 'aardvark' ) => 'likes',
					esc_html__( 'Menu Order', 'aardvark' ) => 'menu_order',
					esc_html__( 'Random', 'aardvark' ) => 'rand',
				),
				'type' => 'dropdown',
				),
				array( 
				'heading' => esc_html__( 'Items Per Page', 'aardvark' ),
				'param_name' => 'per_page',
				'value' => '5',
				'type' => 'textfield',
				),
				array( 
				'heading' => esc_html__( 'Offset', 'aardvark' ),
				'description' => esc_html__( 'E.g. set to 3 to exclude the first 3 posts.', 'aardvark' ),
				'param_name' => 'offset',
				'value' => '',
				'type' => 'textfield',
				),
				array( 
				'heading' => esc_html__( 'Large Excerpt Length', 'aardvark' ),
				'description' => esc_html__( 'The number of characters in large excerpts.', 'aardvark' ),
				'param_name' => 'large_excerpt_length',
				'value' => '80',
				'type' => 'textfield',
				),
				array( 
				'heading' => esc_html__( 'Small Excerpt Length', 'aardvark' ),
				'description' => esc_html__( 'The number of characters in small excerpts.', 'aardvark' ),
				'param_name' => 'small_excerpt_length',
				'value' => '0',
				'type' => 'textfield',
				),	
				array(
				'param_name' => 'large_meta_author',
				'value' => array( esc_html__( 'Author Name', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),	
				array(
				'param_name' => 'large_meta_date',
				'value' => array( esc_html__( 'Post Date', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),		
				array(
				'param_name' => 'large_meta_comment_count',
				'value' => array( esc_html__( 'Comment Count', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),	
				array(
				'param_name' => 'large_meta_views',
				'value' => array( esc_html__( 'Views', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),
				array(
				'param_name' => 'large_meta_likes',
				'value' => array( esc_html__( 'Likes', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),
				array( 
				'param_name' => 'large_meta_cats',
				'value' => array( esc_html__( 'Post Categories', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),	
				array(
				'param_name' => 'large_meta_tags',
				'value' => array( esc_html__( 'Post Tags', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),
				array(
				'heading' => esc_html__( 'Small Post Meta', 'aardvark' ),
				'param_name' => 'small_meta_author',
				'value' => array( esc_html__( 'Author Name', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),	
				array(
				'param_name' => 'small_meta_date',
				'value' => array( esc_html__( 'Post Date', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),		
				array(
				'param_name' => 'small_meta_comment_count',
				'value' => array( esc_html__( 'Comment Count', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),	
				array(
				'param_name' => 'small_meta_views',
				'value' => array( esc_html__( 'Views', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),
				array(
				'param_name' => 'small_meta_likes',
				'value' => array( esc_html__( 'Likes', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),
				array( 
				'param_name' => 'small_meta_cats',
				'value' => array( esc_html__( 'Post Categories', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),
				array(
				'param_name' => 'small_meta_tags',
				'value' => array( esc_html__( 'Post Tags', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),
				array( 
				'heading' => esc_html__( 'Filters (Sorting)', 'aardvark' ),
				'param_name' => 'filter_date',
				'value' => array( esc_html__( 'Date', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),	
				array(
				'param_name' => 'filter_title',
				'value' => array( esc_html__( 'Title', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),								
				array(
				'param_name' => 'filter_comment_count',
				'value' => array( esc_html__( 'Comment Count', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),
				array(
				'param_name' => 'filter_views',
				'value' => array( esc_html__( 'Views', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),	
				array(
				'param_name' => 'filter_likes',
				'value' => array( esc_html__( 'Likes', 'aardvark' ) => '1' ),
				'type' => 'checkbox',
				),			
				array( 
				'heading' => esc_html__( 'Filter (Categories)', 'aardvark' ),
				'description' => esc_html__( 'Enter the slug or ID of the category you want to filter by, leave blank to display all categories - the sub categories of this category will also be displayed.', 'aardvark' ),
				'param_name' => 'filter_cat_id',
				'type' => 'textfield',
				),													
				array( 
				'heading' => esc_html__( 'Large Read More Link', 'aardvark' ),
				'param_name' => 'large_read_more_link',
				'value' => array( esc_html__( 'Disabled', 'aardvark' ) => 'disabled', esc_html__( 'Enabled', 'aardvark' ) => 'enabled' ),
				'type' => 'dropdown',
				),												
				array( 
				'heading' => esc_html__( 'Small Read More Link', 'aardvark' ),
				'param_name' => 'small_read_more_link',
				'value' => array( esc_html__( 'Disabled', 'aardvark' ) => 'disabled', esc_html__( 'Enabled', 'aardvark' ) => 'enabled' ),
				'type' => 'dropdown',
				),
				array( 
				'heading' => esc_html__( 'Pagination (Arrows)', 'aardvark' ),
				'param_name' => 'page_arrows',
				'value' => array( esc_html__( 'Disabled', 'aardvark' ) => 'disabled', esc_html__( 'Enabled', 'aardvark' ) => 'enabled' ),
				'type' => 'dropdown',
				),
				array( 
				'heading' => esc_html__( 'Pagination (Numbers)', 'aardvark' ),
				'param_name' => 'pagination',
				'value' => array( esc_html__( 'Disabled', 'aardvark' ) => 'disabled', esc_html__( 'Enabled', 'aardvark' ) => 'page-numbers' ),
				'type' => 'dropdown',
				),						
				array( 
				'heading' => esc_html__( 'See All', 'aardvark' ),
				'param_name' => 'see_all',
				'value' => array( esc_html__( 'Disabled', 'aardvark' ) => 'disabled', esc_html__( 'Enabled', 'aardvark' ) => 'enabled' ),
				'type' => 'dropdown',
				),
				array( 
				'heading' => esc_html__( 'See All Link', 'aardvark' ),
				'param_name' => 'see_all_link',
				'type' => 'textfield',
				'dependency' => array( 'element' => 'see_all', 'value' => 'enabled' ),
				),				 			 
				array( 
				'heading' => esc_html__( 'See All Text', 'aardvark' ),
				'param_name' => 'see_all_text',
				'type' => 'textfield',
				'value' => esc_html__( 'See All Items', 'aardvark' ),
				'dependency' => array( 'element' => 'see_all', 'value' => 'enabled' ),
				),	 			 				 		   			 			 
				array( 
				'heading' => esc_html__( 'Extra Class Name', 'aardvark' ),
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'aardvark' ),
				'param_name' => 'classes',
				'value' => '',
				'type' => 'textfield',
				),							
				array(
					'param_name' => 'styling_divider_begin',
					'type' => 'gp_divider',
					'edit_field_class' => 'vc_col-xs-12',
					'group' => esc_html__( 'Design Options', 'aardvark' ),
				),
				array( 
				'heading' => esc_html__( 'Title Icon Color', 'aardvark' ),
				'param_name' => 'icon_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),
				array( 
				'heading' => esc_html__( 'Title Icon', 'aardvark' ),
				'param_name' => 'icon',
				'type' => 'iconpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),						
				array( 
				'heading' => esc_html__( 'Title Color', 'aardvark' ),
				'param_name' => 'title_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),							
				array( 
				'heading' => esc_html__( 'Post Title Color', 'aardvark' ),
				'param_name' => 'post_title_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),							
				array( 
				'heading' => esc_html__( 'Post Title Hover Color', 'aardvark' ),
				'param_name' => 'post_title_hover_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),	
				array( 
				'heading' => esc_html__( 'Post Link Color', 'aardvark' ),
				'param_name' => 'post_link_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),								
				array( 
				'heading' => esc_html__( 'Post Link Hover Color', 'aardvark' ),
				'param_name' => 'post_link_hover_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),									
				array( 
				'heading' => esc_html__( 'Post Text Color', 'aardvark' ),
				'param_name' => 'post_text_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),
				array( 
				'heading' => esc_html__( 'Meta Text Color', 'aardvark' ),
				'param_name' => 'meta_text_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),									
				array( 
				'heading' => esc_html__( 'Border Color', 'aardvark' ),
				'param_name' => 'loop_border_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),	
				array( 
				'heading' => esc_html__( 'Ranking Background Color', 'aardvark' ),
				'param_name' => 'ranking_bg_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),		
				array( 
				'heading' => esc_html__( 'Ranking Text Color', 'aardvark' ),
				'param_name' => 'ranking_text_color',
				'value' => '',
				'type' => 'colorpicker',
				'group' => esc_html__( 'Design Options', 'aardvark' ),
				'edit_field_class' => 'vc_col-xs-4',
				),	
				array(
					'param_name' => 'styling_divider_end',
					'type' => 'gp_divider',
					'edit_field_class' => 'vc_col-xs-12',
					'group' => esc_html__( 'Design Options', 'aardvark' ),
				),
				array(
					'heading' => esc_html__( 'CSS', 'aardvark' ),
					'type' => 'css_editor',
					'param_name' => 'css',
					'group' => esc_html__( 'Design Options', 'aardvark' ),
				),
																																														
			 )
		) );
	
	}		
} 
add_action( 'vc_before_init', 'ghostpool_wpb_showcase_options' );