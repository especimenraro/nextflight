<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 * @return array An array of default values
 */

function travel_base_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$travel_base_default_options = array(
		// Color Options
		'header_title_color'			=> '#00bcd4',
		'header_tagline_color'			=> '#888',
		'header_txt_logo_extra'			=> 'show-all',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'          	 	=> esc_html__( 'Read More', 'travel-base' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'travel-base' ),
		'hide_date' 					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// Slider
		'slider_section_enable'			=> true,
		'slider_btn_label'				=> esc_html__( 'Learn More', 'travel-base' ),

		// trip search
		'trip_search_section_enable'	=> true,
		'trip_search_title'				=> esc_html__( 'Search your destinations', 'travel-base' ),

		// destinations
		'destinations_section_enable'	=> true,
		'destinations_content_type'		=> 'category',
		'destinations_suffix'			=> esc_html__( 'Tour Available', 'travel-base' ),

		// call to action
		'cta_section_enable'			=> true,
		'cta_title'						=> esc_html__( 'Travel Basecess', 'travel-base' ),
		'cta_btn_title'					=> esc_html__( 'Learn More', 'travel-base' ),

		// traveler choice
		'featured_section_enable'	=> true,
		'featured_content_type'		=> 'post',

		// blog
		'blog_section_enable'			=> true,
		'blog_content_type'				=> 'category',
		'blog_title'					=> esc_html__( 'From Our Latest Blog', 'travel-base' ),
		'blog_read_more'				=> esc_html__( 'Read More', 'travel-base' ),

		
	);

	$output = apply_filters( 'travel_base_default_theme_options', $travel_base_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}