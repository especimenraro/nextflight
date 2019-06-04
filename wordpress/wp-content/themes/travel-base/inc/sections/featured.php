<?php
/**
 * Traveler Choice section
 *
 * This is the template for the content of traveler choice section
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */
if ( ! function_exists( 'travel_base_add_featured_section' ) ) :
    /**
    * Add traveler choice section
    *
    *@since Travel Base 1.0.0
    */
    function travel_base_add_featured_section() {
    	$options = travel_base_get_theme_options();
        // Check if destination is enabled on frontpage
        $featured_enable = apply_filters( 'travel_base_section_status', true, 'featured_section_enable' );

        if ( true !== $featured_enable ) {
            return false;
        }
        // Get destination section details
        $section_details = array();
        $section_details = apply_filters( 'travel_base_filter_featured_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render destination section now.
        travel_base_render_featured_section( $section_details );
    }
endif;

if ( ! function_exists( 'travel_base_get_featured_section_details' ) ) :
    /**
    * traveler choice section details.
    *
    * @since Travel Base 1.0.0
    * @param array $input traveler choice section details.
    */
    function travel_base_get_featured_section_details( $input ) {
        $options = travel_base_get_theme_options();

        // Content type.
        $featured_content_type  = $options['featured_content_type'];
        $featured_count = 1;
        
        $content = array();
        switch ( $featured_content_type ) {
        	
            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $featured_count; $i++ ) {
                    if ( ! empty( $options['featured_content_post_' . $i] ) )
                        $post_ids[] = $options['featured_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( $featured_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'trip':

                if ( ! class_exists( 'WP_Travel' ) )
                    return;
                
                $page_ids = array();

                for ( $i = 1; $i <= $featured_count; $i++ ) {
                    if ( ! empty( $options['featured_content_trip_' . $i] ) )
                        $page_ids[] = $options['featured_content_trip_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'itineraries',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $featured_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'destination':

                if ( ! class_exists( 'WP_Travel' ) )
                    return;
                
                $cat_id = ! empty( $options['featured_content_destination'] ) ? $options['featured_content_destination'] : '';
                $args = array(
                    'post_type'      => 'itineraries',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'travel_locations',
                            'field'    => 'id',
                            'terms'    => $cat_id,
                        ),
                    ),
                    'posts_per_page'  => absint( $featured_count ),
                    );                    
            break;

            default:
            break;
        }


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = travel_base_trim_content( 25 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// destination section content details.
add_filter( 'travel_base_filter_featured_section_details', 'travel_base_get_featured_section_details' );


if ( ! function_exists( 'travel_base_render_featured_section' ) ) :
  /**
   * Start destination section
   *
   * @return string destination content
   * @since Travel Base 1.0.0
   *
   */
   function travel_base_render_featured_section( $content_details = array() ) {
        $options = travel_base_get_theme_options();
        $featured_content_type  = $options['featured_content_type'];
        $readmore = ! empty( $options['featured_read_more'] ) ? $options['featured_read_more'] : esc_html__( 'Explore Travel Base', 'travel-base' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="featured-tours" class="relative page-section">
            <div class="wrapper">
                <div class="section-content clear">
                    <?php foreach ( $content_details as $content ) : 
                        $post_id = $content['id'];
                        ?>
                        <article>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                    <?php if ( ! in_array( $featured_content_type, array( 'category', 'page', 'post' ) ) ) : 
                                        $average_rating = wp_travel_get_average_rating( $post_id ); ?>
                                        <div class="entry-meta">
                                            <div class="wp-travel-average-review" title="<?php printf( esc_attr__( 'Rated %s out of 5', 'travel-base' ), $average_rating ); ?>">
                                                <span style="width:<?php echo esc_attr( ( $average_rating / 5 ) * 100 ); ?>%">
                                                    <strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average_rating ); ?></strong> <?php printf( esc_html__( 'out of %1$s5%2$s', 'travel-base' ), '<span itemprop="bestRating">', '</span>' ); ?>
                                                </span>
                                            </div>
                                        </div><!-- .entry-meta -->
                                        <span class="rating-count"><?php echo esc_html( $average_rating ) . esc_html__( ' reviews', 'travel-base' ); ?></span>
                                    <?php endif; ?>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <?php if ( ! in_array( $featured_content_type, array( 'category', 'page', 'post' ) ) ) : ?>
                                    <div class="wp-travel-trip-meta-info">
                                        <ul>
                                            <?php 
                                            $wp_travel_itinerary = new WP_Travel_Itinerary( get_post( $content['id'] ) );

                                            $start_date = get_post_meta( $content['id'], 'wp_travel_start_date', true );
                                            $end_date   = get_post_meta( $content['id'], 'wp_travel_end_date', true );
                                            $trip_duration = get_post_meta( $content['id'], 'wp_travel_trip_duration', true );
                                            $trip_duration = ( $trip_duration ) ? $trip_duration : 0;
                                            $trip_duration_night = get_post_meta( $content['id'], 'wp_travel_trip_duration_night', true );
                                            $trip_duration_night = ( $trip_duration_night ) ? $trip_duration_night : 0;
                                            $fixed_departure = get_post_meta( $content['id'], 'wp_travel_fixed_departure', true );
                                            $fixed_departure = ( $fixed_departure ) ? $fixed_departure : 'yes';
                                            if ( 'yes' === $fixed_departure ) : ?>
                                                <?php if ( $start_date && $end_date ) :  ?>
                                                    <li>
                                                        <div class="travel-info">
                                                            <strong class="title"><?php esc_html_e( 'Fixed Departure', 'travel-base' ); ?></strong>
                                                        </div>
                                                        <div class="travel-info">
                                                            <span class="value">
                                                                <?php $date_format = 'd M'; ?>
                                                                <?php printf( '%s - %s', date( $date_format, strtotime( $start_date ) ), date( $date_format, strtotime( $end_date ) ) ); ?>
                                                            </span>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <?php if ( $trip_duration || $trip_duration_night ) : ?>
                                                    <li>
                                                        <div class="travel-info">
                                                            <strong class="title"><?php esc_html_e( 'Trip Duration', 'travel-base' ); ?></strong>
                                                        </div>
                                                        <div class="travel-info">
                                                            <span class="value">
                                                                <?php printf( __( '%1$s Day(s) %2$s Night(s)', 'travel-base' ), $trip_duration, $trip_duration_night ); ?>
                                                            </span>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <li>
                                                <div class="travel-info">
                                                    <strong class="title"><?php esc_html_e( 'Trip Type', 'travel-base' ); ?></strong>
                                                </div>
                                                <div class="travel-info">
                                                    <span class="value">

                                                    <?php
                                                    $trip_types_list = $wp_travel_itinerary->get_trip_types_list();
                                                    if ( $trip_types_list ) {
                                                        echo wp_kses( $trip_types_list, wp_travel_allowed_html( array( 'a' ) ) );
                                                    } else {
                                                        echo esc_html( apply_filters( 'wp_travel_default_no_trip_type_text', __( 'No trip type', 'travel-base' ) ) );
                                                    }
                                                    ?>
                                                    </span>
                                                </div>
                                            </li>

                                           <li>
                                                <div class="travel-info">
                                                    <strong class="title"><?php esc_html_e( 'Group Size', 'travel-base' ); ?></strong>
                                                </div>
                                                <div class="travel-info">
                                                    <span class="value">
                                                        <?php

                                                        if ( $group_size = $wp_travel_itinerary->get_group_size() ) {
                                                                printf( apply_filters( 'wp_travel_template_group_size_text' ,__( '%d pax', 'travel-base' ) ), esc_html( $group_size ) );
                                                        } else {
                                                            echo esc_html( apply_filters( 'wp_travel_default_group_size_text', __( 'No Size Limit', 'travel-base' ) ) );
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </li>

                                            <?php 
                                            $terms = get_the_terms( $post_id, 'travel_locations' );
                                            if ( is_array( $terms ) && count( $terms ) > 0 ) : ?>
                                                <li class="no-border">
                                                    <div class="travel-info">
                                                        <strong class="title"><?php esc_html_e( 'Locations', 'travel-base' ); ?></strong>
                                                    </div>
                                                    <div class="travel-info">
                                                        <span class="value"><?php $i = 0; ?><?php foreach ( $terms as $term ) : ?><?php if ( $i > 0 ) : ?>, <?php endif; ?><span class="wp-travel-locations"><a href="<?php echo esc_url( get_term_link( $term->term_id ) ) ?>"><?php echo esc_html( $term->name ); ?></a></span><?php $i++; endforeach; ?></span>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endif;?>

                                <div class="trip-short-desc">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->

                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-fill">
                                        <span class="trip-price"><span class="current-price">
                                            <?php 
                                                $enable_sale     = get_post_meta( $content['id'], 'wp_travel_enable_sale', true );
                                                $trip_price      = wp_travel_get_trip_price( $content['id'] );
                                                $sale_price      = wp_travel_get_trip_sale_price( $content['id'] );
                                                $trip_per        = get_post_meta( $content['id'], 'wp_travel_price_per', true );
                                                $settings        = wp_travel_get_settings();
                                                $currency_code   = ( isset( $settings['currency'] ) ) ? $settings['currency'] : '';
                                                $currency_symbol = wp_travel_get_currency_symbol( $currency_code );
                                                echo esc_html( $currency_symbol );
                                                echo ( true == $enable_sale && $sale_price ) ? esc_html( $sale_price ) : esc_html( $trip_price );
                                            ?></span></span>
                                        <span class="btn-text"><?php echo esc_html( $readmore ); ?></span>
                                    </a>
                                </div><!-- .read-more -->
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div><!-- .choice-slider -->
        </div><!-- #travellers-choice -->
        
    <?php }
endif;