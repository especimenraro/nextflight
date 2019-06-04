<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Travel Base
* @since Travel Base 1.0.0
*/

if ( ! function_exists( 'travel_base_trip_search_title_partial' ) ) :
    // trip search title
    function travel_base_trip_search_title_partial() {
        $options = travel_base_get_theme_options();
        return esc_html( $options['trip_search_title'] );
    }
endif;

if ( ! function_exists( 'travel_base_cta_title_partial' ) ) :
    // cta title
    function travel_base_cta_title_partial() {
        $options = travel_base_get_theme_options();
        return esc_html( $options['cta_title'] );
    }
endif;

if ( ! function_exists( 'travel_base_cta_btn_title_partial' ) ) :
    // cta btn title
    function travel_base_cta_btn_title_partial() {
        $options = travel_base_get_theme_options();
        return esc_html( $options['cta_btn_title'] );
    }
endif;

if ( ! function_exists( 'travel_base_blog_title_partial' ) ) :
    // blog title
    function travel_base_blog_title_partial() {
        $options = travel_base_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;