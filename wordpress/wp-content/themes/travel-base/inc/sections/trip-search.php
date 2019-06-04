<?php
/**
 * Trip Search section
 *
 * This is the template for the content of trip_search section
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */
if ( ! function_exists( 'travel_base_add_trip_search_section' ) ) :
    /**
    * Add trip_search section
    *
    *@since Travel Base 1.0.0
    */
    function travel_base_add_trip_search_section() {
    	$options = travel_base_get_theme_options();
        // Check if trip_search is enabled on frontpage
        $trip_search_enable = apply_filters( 'travel_base_section_status', true, 'trip_search_section_enable' );

        if ( true !== $trip_search_enable || ! class_exists( 'WP_Travel' ) ) {
            return false;
        }

        // Render trip_search section now.
        travel_base_render_trip_search_section();
    }
endif;

if ( ! function_exists( 'travel_base_render_trip_search_section' ) ) :
  /**
   * Start trip_search section
   *
   * @return string trip_search content
   * @since Travel Base 1.0.0
   *
   */
   function travel_base_render_trip_search_section() {
        $options = travel_base_get_theme_options();
        ?>
        <div id="travel-search-section" class="page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['trip_search_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['trip_search_title'] ); ?></h2>
                    <?php endif; ?>
                </div><!-- .section-header -->

                <div class="wp-travel-filter">
                    <?php wp_travel_search_form(); ?>
                </div><!-- wp-travel-filter -->

            </div><!-- .wrapper -->      
        </div><!-- #travel-search-section -->
    <?php }
endif;