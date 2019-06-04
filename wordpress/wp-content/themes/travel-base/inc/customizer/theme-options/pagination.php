<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'travel_base_pagination', array(
	'title'               => esc_html__('Pagination','travel-base'),
	'description'         => esc_html__( 'Pagination section options.', 'travel-base' ),
	'panel'               => 'travel_base_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'travel-base' ),
	'section'             => 'travel_base_pagination',
	'on_off_label' 		=> travel_base_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'travel_base_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'travel_base_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'travel-base' ),
	'section'             => 'travel_base_pagination',
	'type'                => 'select',
	'choices'			  => travel_base_pagination_options(),
	'active_callback'	  => 'travel_base_is_pagination_enable',
) );
