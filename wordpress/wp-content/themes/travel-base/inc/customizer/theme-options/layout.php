<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'travel_base_layout', array(
	'title'               => esc_html__('Layout','travel-base'),
	'description'         => esc_html__( 'Layout section options.', 'travel-base' ),
	'panel'               => 'travel_base_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[site_layout]', array(
	'sanitize_callback'   => 'travel_base_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Travel_Base_Custom_Radio_Image_Control ( $wp_customize, 'travel_base_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'travel-base' ),
	'section'             => 'travel_base_layout',
	'choices'			  => travel_base_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'travel_base_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Travel_Base_Custom_Radio_Image_Control ( $wp_customize, 'travel_base_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'travel-base' ),
	'section'             => 'travel_base_layout',
	'choices'			  => travel_base_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'travel_base_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Travel_Base_Custom_Radio_Image_Control ( $wp_customize, 'travel_base_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'travel-base' ),
	'section'             => 'travel_base_layout',
	'choices'			  => travel_base_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'travel_base_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Travel_Base_Custom_Radio_Image_Control( $wp_customize, 'travel_base_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'travel-base' ),
	'section'             => 'travel_base_layout',
	'choices'			  => travel_base_sidebar_position(),
) ) );