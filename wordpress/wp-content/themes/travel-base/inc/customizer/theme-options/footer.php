<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'travel_base_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'travel-base' ),
		'priority'   			=> 900,
		'panel'      			=> 'travel_base_theme_options_panel',
	)
);

// scroll top visible
$wp_customize->add_setting( 'travel_base_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'travel_base_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'travel-base' ),
		'section'    			=> 'travel_base_section_footer',
		'on_off_label' 		=> travel_base_switch_options(),
    )
) );