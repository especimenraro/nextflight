<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'travel_base_single_post_section', array(
	'title'             => esc_html__( 'Single Post','travel-base' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'travel-base' ),
	'panel'             => 'travel_base_theme_options_panel',
) );

// Tourableve date meta setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'travel-base' ),
	'section'           => 'travel_base_single_post_section',
	'on_off_label' 		=> travel_base_hide_options(),
) ) );

// Tourableve author meta setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'travel-base' ),
	'section'           => 'travel_base_single_post_section',
	'on_off_label' 		=> travel_base_hide_options(),
) ) );

// Tourableve author category setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'travel-base' ),
	'section'           => 'travel_base_single_post_section',
	'on_off_label' 		=> travel_base_hide_options(),
) ) );

// Tourableve tag category setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'travel-base' ),
	'section'           => 'travel_base_single_post_section',
	'on_off_label' 		=> travel_base_hide_options(),
) ) );
