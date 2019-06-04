<?php
/**
 * Featured Section options
 *
 * @featured Theme Palace
 * @subfeatured Travel Base
 * @since Travel Base 1.0.0
 */

// Add Featured section
$wp_customize->add_section( 'travel_base_featured_section', array(
	'title'             => esc_html__( 'Featured','travel-base' ),
	'description'       => esc_html__( 'Featured Section options.', 'travel-base' ),
	'panel'             => 'travel_base_front_page_panel',
) );

// Featured content enable control and setting
$wp_customize->add_setting( 'travel_base_theme_options[featured_section_enable]', array(
	'default'			=> 	$options['featured_section_enable'],
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[featured_section_enable]', array(
	'label'             => esc_html__( 'Featured Section Enable', 'travel-base' ),
	'section'           => 'travel_base_featured_section',
	'on_off_label' 		=> travel_base_switch_options(),
) ) );

// Featured content type control and setting
$wp_customize->add_setting( 'travel_base_theme_options[featured_content_type]', array(
	'default'          	=> $options['featured_content_type'],
	'sanitize_callback' => 'travel_base_sanitize_select',
) );

$wp_customize->add_control( 'travel_base_theme_options[featured_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'travel-base' ),
	'section'           => 'travel_base_featured_section',
	'type'				=> 'select',
	'active_callback' 	=> 'travel_base_is_featured_section_enable',
	'choices'			=> travel_base_traveler_choice_content_type(),
) );

$i = 1;

// featured posts drop down chooser control and setting
$wp_customize->add_setting( 'travel_base_theme_options[featured_content_post_' . $i . ']', array(
	'sanitize_callback' => 'travel_base_sanitize_page',
) );

$wp_customize->add_control( new Travel_Base_Dropdown_Chooser( $wp_customize, 'travel_base_theme_options[featured_content_post_' . $i . ']', array(
	'label'             => sprintf ( esc_html__( 'Select posts %d', 'travel-base' ), $i ),
	'section'           => 'travel_base_featured_section',
	'choices'			=> travel_base_post_choices(),
	'active_callback'	=> 'travel_base_is_featured_section_content_post_enable',
) ) );

// featured trips drop down chooser control and setting
$wp_customize->add_setting( 'travel_base_theme_options[featured_content_trip_' . $i . ']', array(
	'sanitize_callback' => 'travel_base_sanitize_page',
) );

$wp_customize->add_control( new Travel_Base_Dropdown_Chooser( $wp_customize, 'travel_base_theme_options[featured_content_trip_' . $i . ']', array(
	'label'             => sprintf ( esc_html__( 'Select Trip %d', 'travel-base' ), $i ),
	'section'           => 'travel_base_featured_section',
	'choices'			=> travel_base_trip_choices(),
	'active_callback'	=> 'travel_base_is_featured_section_content_trip_enable',
) ) );

// popular destination read more setting and control
$wp_customize->add_setting( 'travel_base_theme_options[featured_read_more_' . $i . ']', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'travel_base_theme_options[featured_read_more_' . $i . ']', array(
	'label'           	=> sprintf( esc_html__( 'Button Text %d', 'travel-base' ), $i ),
	'section'        	=> 'travel_base_featured_section',
	'active_callback' 	=> 'travel_base_is_featured_section_enable',
	'type'				=> 'text',
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'travel_base_theme_options[featured_content_destination]', array(
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new Travel_Base_Dropdown_Taxonomies_Control( $wp_customize,'travel_base_theme_options[featured_content_destination]', array(
	'label'             => esc_html__( 'Select Destinations', 'travel-base' ),
	'section'           => 'travel_base_featured_section',
	'taxonomy'			=> 'travel_locations',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'travel_base_is_featured_section_content_destination_enable'
) ) );

