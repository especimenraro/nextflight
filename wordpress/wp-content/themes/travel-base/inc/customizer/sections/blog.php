<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'travel_base_blog_section', array(
	'title'             => esc_html__( 'Blog','travel-base' ),
	'description'       => esc_html__( 'Blog Section options.', 'travel-base' ),
	'panel'             => 'travel_base_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'travel_base_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'travel_base_sanitize_switch_control',
) );

$wp_customize->add_control( new Travel_Base_Switch_Control( $wp_customize, 'travel_base_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'travel-base' ),
	'section'           => 'travel_base_blog_section',
	'on_off_label' 		=> travel_base_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'travel_base_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travel_base_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'travel-base' ),
	'section'        	=> 'travel_base_blog_section',
	'active_callback' 	=> 'travel_base_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travel_base_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'travel_base_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travel_base_blog_title_partial',
    ) );
}

// blog image setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[blog_image]', array(
	'sanitize_callback' => 'travel_base_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travel_base_theme_options[blog_image]',
		array(
		'label'       		=> esc_html__( 'Background Image', 'travel-base' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'travel-base' ), 1920, 850 ),
		'section'     		=> 'travel_base_blog_section',
		'active_callback'	=> 'travel_base_is_blog_section_enable',
) ) );

// blog title setting and control
$wp_customize->add_setting( 'travel_base_theme_options[blog_read_more]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_read_more'],
) );

$wp_customize->add_control( 'travel_base_theme_options[blog_read_more]', array(
	'label'           	=> esc_html__( 'Read More Text', 'travel-base' ),
	'section'        	=> 'travel_base_blog_section',
	'active_callback' 	=> 'travel_base_is_blog_section_enable',
	'type'				=> 'text',
) );

// Blog content type control and setting
$wp_customize->add_setting( 'travel_base_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'travel_base_sanitize_select',
) );

$wp_customize->add_control( 'travel_base_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'travel-base' ),
	'section'           => 'travel_base_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'travel_base_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'travel-base' ),
		'recent' 	=> esc_html__( 'Recent', 'travel-base' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'travel_base_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'travel_base_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Travel_Base_Dropdown_Taxonomies_Control( $wp_customize,'travel_base_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'travel-base' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'travel-base' ),
	'section'           => 'travel_base_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'travel_base_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'travel_base_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'travel_base_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Travel_Base_Dropdown_Category_Control( $wp_customize,'travel_base_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'travel-base' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'travel-base' ),
	'section'           => 'travel_base_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'travel_base_is_blog_section_content_recent_enable'
) ) );