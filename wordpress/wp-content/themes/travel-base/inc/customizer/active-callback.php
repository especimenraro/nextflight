<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

if ( ! function_exists( 'travel_base_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Travel Base 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function travel_base_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'travel_base_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'travel_base_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Travel Base 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function travel_base_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'travel_base_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'travel_base_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Travel Base 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function travel_base_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travel_base_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if trip search section is enabled.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_trip_search_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travel_base_theme_options[trip_search_section_enable]' )->value() );
}

/**
 * Check if destinations section is enabled.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_destinations_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travel_base_theme_options[destinations_section_enable]' )->value() );
}

/**
 * Check if destinations section content type is category.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_destinations_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travel_base_theme_options[destinations_content_type]' )->value();
	return travel_base_is_destinations_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if destinations section content type is destination.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_destinations_section_content_destination_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travel_base_theme_options[destinations_content_type]' )->value();
	return travel_base_is_destinations_section_enable( $control ) && ( 'destination' == $content_type );
}

/**
 * Check if cta section is enabled.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travel_base_theme_options[cta_section_enable]' )->value() );
}

/**
 * Check if traveler choice section is enabled.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_featured_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travel_base_theme_options[featured_section_enable]' )->value() );
}

/**
 * Check if traveler choice section content type is post.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_featured_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travel_base_theme_options[featured_content_type]' )->value();
	return travel_base_is_featured_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if traveler choice section content type is trip.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_featured_section_content_trip_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travel_base_theme_options[featured_content_type]' )->value();
	return travel_base_is_featured_section_enable( $control ) && ( 'trip' == $content_type );
}

/**
 * Check if traveler choice section content type is destination.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_featured_section_content_destination_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travel_base_theme_options[featured_content_type]' )->value();
	return travel_base_is_featured_section_enable( $control ) && ( 'destination' == $content_type );
}

/**
 * Check if blog section is enabled.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travel_base_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travel_base_theme_options[blog_content_type]' )->value();
	return travel_base_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Travel Base 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travel_base_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travel_base_theme_options[blog_content_type]' )->value();
	return travel_base_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}