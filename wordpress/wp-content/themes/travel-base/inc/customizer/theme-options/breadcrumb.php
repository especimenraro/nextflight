<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

$wp_customize->add_section( 'travel_base_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','travel-base' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'travel-base' ),
	'panel'             => 'travel_base_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'travel-base' ),
	'section'          	=> 'travel_base_breadcrumb',
	'on_off_label' 		=> travel_base_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'travel_base_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'travel-base' ),
	'active_callback' 	=> 'travel_base_is_breadcrumb_enable',
	'section'          	=> 'travel_base_breadcrumb',
) );
