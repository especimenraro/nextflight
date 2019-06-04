<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'travel_base_slider_section', array(
	'title'             => esc_html__( 'Main Slider','travel-base' ),
	'description'       => esc_html__( 'Slider Section options.', 'travel-base' ),
	'panel'             => 'travel_base_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'travel_base_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'travel-base' ),
	'section'           => 'travel_base_slider_section',
	'on_off_label' 		=> travel_base_switch_options(),
) ) );

// Slider btn label setting and control
$wp_customize->add_setting( 'travel_base_theme_options[slider_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_btn_label'],
) );

$wp_customize->add_control( 'travel_base_theme_options[slider_btn_label]', array(
	'label'           	=> esc_html__( 'Slider Primary Button Label', 'travel-base' ),
	'description'           	=> esc_html__( 'This button will be linked to the selected posts/pages.', 'travel-base' ),
	'section'        	=> 'travel_base_slider_section',
	'active_callback' 	=> 'travel_base_is_slider_section_enable',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 3; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'travel_base_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'travel_base_sanitize_page',
	) );

	$wp_customize->add_control( new Travel_Base_Dropdown_Chooser( $wp_customize, 'travel_base_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'travel-base' ), $i ),
		'section'           => 'travel_base_slider_section',
		'choices'			=> travel_base_page_choices(),
		'active_callback'	=> 'travel_base_is_slider_section_enable',
	) ) );

endfor;
