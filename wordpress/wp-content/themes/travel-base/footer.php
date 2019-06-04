<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

/**
 * travel_base_footer_primary_content hook
 *
 * @hooked travel_base_add_contact_section -  10
 *
 */
do_action( 'travel_base_footer_primary_content' );

/**
 * travel_base_content_end_action hook
 *
 * @hooked travel_base_content_end -  10
 *
 */
do_action( 'travel_base_content_end_action' );

/**
 * travel_base_content_end_action hook
 *
 * @hooked travel_base_footer_start -  10
 * @hooked Travel_Base_Footer_Widgets->add_footer_widgets -  20
 * @hooked travel_base_footer_site_info -  40
 * @hooked travel_base_footer_end -  100
 *
 */
do_action( 'travel_base_footer' );

/**
 * travel_base_page_end_action hook
 *
 * @hooked travel_base_page_end -  10
 *
 */
do_action( 'travel_base_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
