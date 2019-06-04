<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function travel_base_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'travel-base' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function travel_base_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'travel-base' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of trips for post choices.
 * @return Array Array of post ids and name.
 */
function travel_base_trip_choices() {
    $posts = get_posts( array( 'post_type' => 'itineraries', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'travel-base' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'travel_base_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function travel_base_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'travel-base' ),
            'header-font-1'   => esc_html__( 'Rajdhani', 'travel-base' ),
            'header-font-2'   => esc_html__( 'Cherry Swash', 'travel-base' ),
            'header-font-3'   => esc_html__( 'Philosopher', 'travel-base' ),
            'header-font-4'   => esc_html__( 'Slabo 27px', 'travel-base' ),
            'header-font-5'   => esc_html__( 'Dosis', 'travel-base' ),
        );

        $output = apply_filters( 'travel_base_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'travel_base_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function travel_base_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'travel-base' ),
            'body-font-1'     => esc_html__( 'News Cycle', 'travel-base' ),
            'body-font-2'     => esc_html__( 'Pontano Sans', 'travel-base' ),
            'body-font-3'     => esc_html__( 'Gudea', 'travel-base' ),
            'body-font-4'     => esc_html__( 'Quattrocento', 'travel-base' ),
            'body-font-5'     => esc_html__( 'Khand', 'travel-base' ),
        );

        $output = apply_filters( 'travel_base_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'travel_base_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function travel_base_selected_sidebar() {
        $travel_base_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'travel-base' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'travel-base' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'travel-base' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'travel-base' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'travel-base' ),
        );

        $output = apply_filters( 'travel_base_selected_sidebar', $travel_base_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'travel_base_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function travel_base_site_layout() {
        $travel_base_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'travel_base_site_layout', $travel_base_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'travel_base_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function travel_base_global_sidebar_position() {
        $travel_base_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'travel_base_global_sidebar_position', $travel_base_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'travel_base_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function travel_base_sidebar_position() {
        $travel_base_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'travel_base_sidebar_position', $travel_base_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'travel_base_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function travel_base_pagination_options() {
        $travel_base_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'travel-base' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'travel-base' ),
        );

        $output = apply_filters( 'travel_base_pagination_options', $travel_base_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'travel_base_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function travel_base_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'travel-base' ),
            'spinner-wheel'         => esc_html__( 'Wheel', 'travel-base' ),
            'spinner-double-circle' => esc_html__( 'Double Circle', 'travel-base' ),
            'spinner-two-way'       => esc_html__( 'Two Way', 'travel-base' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'travel-base' ),
            'spinner-circle'        => esc_html__( 'Circle', 'travel-base' ),
            'spinner-dots'          => esc_html__( 'Dots', 'travel-base' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'travel-base' ),
            'spinner-fidget'        => esc_html__( 'Fidget', 'travel-base' ),
        );
        return apply_filters( 'travel_base_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'travel_base_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function travel_base_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'travel-base' ),
            'off'       => esc_html__( 'Disable', 'travel-base' )
        );
        return apply_filters( 'travel_base_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'travel_base_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function travel_base_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'travel-base' ),
            'off'       => esc_html__( 'No', 'travel-base' )
        );
        return apply_filters( 'travel_base_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'travel_base_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function travel_base_sortable_sections() {
        $sections = array(
            'slider'    => esc_html__( 'Main Slider', 'travel-base' ),
            'trip_search'  => esc_html__( 'Trip Search', 'travel-base' ),
            'destinations' => esc_html__( 'Destinations', 'travel-base' ),
            'cta'       => esc_html__( 'Call to Action', 'travel-base' ),
            'featured'  => esc_html__( 'Featured', 'travel-base' ),
            'blog'      => esc_html__( 'Blog', 'travel-base' ),
        );
        return apply_filters( 'travel_base_sortable_sections', $sections );
    }
endif;

if ( ! function_exists( 'travel_base_destinations_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function travel_base_destinations_content_type() {
        $travel_base_destinations_content_type = array(
            'category'  => esc_html__( 'Category', 'travel-base' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $travel_base_destinations_content_type = array_merge( $travel_base_destinations_content_type, array(
                'destination'   => esc_html__( 'Destination', 'travel-base' ),
                ) );
        }

        $output = apply_filters( 'travel_base_destinations_content_type', $travel_base_destinations_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'travel_base_traveler_choice_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function travel_base_traveler_choice_content_type() {
        $travel_base_traveler_choice_content_type = array(
            'post'      => esc_html__( 'Post', 'travel-base' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $travel_base_traveler_choice_content_type = array_merge( $travel_base_traveler_choice_content_type, array(
                'trip'          => esc_html__( 'Trip', 'travel-base' ),
                'destination'   => esc_html__( 'Destination', 'travel-base' ),
                ) );
        }

        $output = apply_filters( 'travel_base_traveler_choice_content_type', $travel_base_traveler_choice_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'travel_base_popular_destination_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function travel_base_popular_destination_content_type() {
        $travel_base_popular_destination_content_type = array(
            'page'      => esc_html__( 'Page', 'travel-base' ),
            'post'      => esc_html__( 'Post', 'travel-base' ),
            'category'  => esc_html__( 'Category', 'travel-base' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $travel_base_popular_destination_content_type = array_merge( $travel_base_popular_destination_content_type, array(
                'trip'          => esc_html__( 'Trip', 'travel-base' ),
                'trip-types'    => esc_html__( 'Trip Types', 'travel-base' ),
                'destination'   => esc_html__( 'Destination', 'travel-base' ),
                'activity'      => esc_html__( 'Activity', 'travel-base' ),
                ) );
        }

        $output = apply_filters( 'travel_base_popular_destination_content_type', $travel_base_popular_destination_content_type );


        return $output;
    }
endif;