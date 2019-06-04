<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Travel Base
	 * @since Travel Base 1.0.0
	 */

	/**
	 * travel_base_doctype hook
	 *
	 * @hooked travel_base_doctype -  10
	 *
	 */
	do_action( 'travel_base_doctype' );

?>
<head>
<?php
	/**
	 * travel_base_before_wp_head hook
	 *
	 * @hooked travel_base_head -  10
	 *
	 */
	do_action( 'travel_base_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * travel_base_page_start_action hook
	 *
	 * @hooked travel_base_page_start -  10
	 *
	 */
	do_action( 'travel_base_page_start_action' ); 

	/**
	 * travel_base_loader_action hook
	 *
	 * @hooked travel_base_loader -  10
	 *
	 */
	do_action( 'travel_base_before_header' );

	/**
	 * travel_base_header_action hook
	 *
	 * @hooked travel_base_header_start -  10
	 * @hooked travel_base_site_branding -  20
	 * @hooked travel_base_site_navigation -  30
	 * @hooked travel_base_header_end -  50
	 *
	 */
	do_action( 'travel_base_header_action' );

	/**
	 * travel_base_content_start_action hook
	 *
	 * @hooked travel_base_content_start -  10
	 *
	 */
	do_action( 'travel_base_content_start_action' );

	/**
	 * travel_base_header_image_action hook
	 *
	 * @hooked travel_base_header_image -  10
	 *
	 */
	do_action( 'travel_base_header_image_action' );

    if ( travel_base_is_frontpage() ) {

    	$sections = travel_base_sortable_sections();
		foreach ( $sections as $section => $value ) {
			add_action( 'travel_base_primary_content', 'travel_base_add_'. $section .'_section', travel_base_sort( $section ) );
		}
		do_action( 'travel_base_primary_content' );
	}