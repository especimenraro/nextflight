<?php
/**
 * Trip Search Section options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

// Add Trip Search section
$wp_customize->add_section( 'travel_base_trip_search_section', array(
	'title'             => esc_html__( 'Trip Search','travel-base' ),
	'description'       => sprintf( '%1$s <a href="' . esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins&plugin_status=install' ) ) . '" target="_blank"> %2$s </a> %3$s', esc_html__( 'To enable Trip Search. Download and Activate WP Travel plugin. ', 'travel-base' ), esc_html__( 'Click Here', 'travel-base' ), esc_html__( 'to download.', 'travel-base' ) ),
	'panel'             => 'travel_base_front_page_panel',
) );

// Trip Search content enable control and setting
$wp_customize->add_setting( 'travel_base_theme_options[trip_search_section_enable]', array(
	'default'			=> 	$options['trip_search_section_enable'],
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[trip_search_section_enable]', array(
	'label'             => esc_html__( 'Trip Search Section Enable', 'travel-base' ),
	'section'           => 'travel_base_trip_search_section',
	'on_off_label' 		=> travel_base_switch_options(),
) ) );

// trip_search title setting and control
$wp_customize->add_setting( 'travel_base_theme_options[trip_search_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['trip_search_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travel_base_theme_options[trip_search_title]', array(
	'label'           	=> esc_html__( 'Title', 'travel-base' ),
	'section'        	=> 'travel_base_trip_search_section',
	'active_callback' 	=> 'travel_base_is_trip_search_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travel_base_theme_options[trip_search_title]', array(
		'selector'            => '#travel-search-section .section-header h2.section-title',
		'settings'            => 'travel_base_theme_options[trip_search_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travel_base_trip_search_title_partial',
    ) );
}

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travel_base_theme_options[trip_search_sub_title]', array(
		'selector'            => '#travel-search-section .section-header span.section-subtitle',
		'settings'            => 'travel_base_theme_options[trip_search_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travel_base_trip_search_sub_title_partial',
    ) );
}