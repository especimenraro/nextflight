<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'travel_base_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','travel-base' ),
	'description'       => esc_html__( 'Archive section options.', 'travel-base' ),
	'panel'             => 'travel_base_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'travel_base_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'travel-base' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'travel-base' ),
	'section'           => 'travel_base_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'travel_base_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'travel-base' ),
	'section'           => 'travel_base_archive_section',
	'on_off_label' 		=> travel_base_hide_options(),
) ) );
