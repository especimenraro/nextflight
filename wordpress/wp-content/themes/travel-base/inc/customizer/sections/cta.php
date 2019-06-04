<?php
/**
 * Call to Action Section options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

// Add Call to Action section
$wp_customize->add_section( 'travel_base_cta_section', array(
	'title'             => esc_html__( 'Call to Action','travel-base' ),
	'description'       => esc_html__( 'Call to Action Section options.', 'travel-base' ),
	'panel'             => 'travel_base_front_page_panel',
) );

// Call to Action content enable control and setting
$wp_customize->add_setting( 'travel_base_theme_options[cta_section_enable]', array(
	'default'			=> 	$options['cta_section_enable'],
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[cta_section_enable]', array(
	'label'             => esc_html__( 'Call to Action Section Enable', 'travel-base' ),
	'section'           => 'travel_base_cta_section',
	'on_off_label' 		=> travel_base_switch_options(),
) ) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'travel_base_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'travel_base_sanitize_page',
) );

$wp_customize->add_control( new Travel_Base_Dropdown_Chooser( $wp_customize, 'travel_base_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'travel-base' ),
	'section'           => 'travel_base_cta_section',
	'choices'			=> travel_base_page_choices(),
	'active_callback'	=> 'travel_base_is_cta_section_enable',
) ) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travel_base_theme_options[cta_title]', array(
		'selector'            => '#call-to-action .wrapper .section-header h2.section-title',
		'settings'            => 'travel_base_theme_options[cta_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travel_base_cta_title_partial',
    ) );
}

// cta btn title setting and control
$wp_customize->add_setting( 'travel_base_theme_options[cta_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['cta_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travel_base_theme_options[cta_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'travel-base' ),
	'section'        	=> 'travel_base_cta_section',
	'active_callback' 	=> 'travel_base_is_cta_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travel_base_theme_options[cta_btn_title]', array(
		'selector'            => '#call-to-action .wrapper .read-more a',
		'settings'            => 'travel_base_theme_options[cta_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travel_base_cta_btn_title_partial',
    ) );
}