<?php
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */
if ( ! function_exists( 'travel_base_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Travel Base 1.0.0
    */
    function travel_base_add_slider_section() {
    	$options = travel_base_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'travel_base_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'travel_base_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        travel_base_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'travel_base_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Travel Base 1.0.0
    * @param array $input slider section details.
    */
    function travel_base_get_slider_section_details( $input ) {
        $options = travel_base_get_theme_options();

        // Content type.
        $slider_count = 3;
        
        $content = array();
        	
            $page_ids = array();

            for ( $i = 1; $i <= $slider_count; $i++ ) {
                if ( ! empty( $options['slider_content_page_' . $i] ) )
                    $page_ids[] = $options['slider_content_page_' . $i];
            }
            
            $args = array(
                'post_type'         => 'page',
                'post__in'          => ( array ) $page_ids,
                'posts_per_page'    => absint( $slider_count ),
                'orderby'           => 'post__in',
                );                    

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                $i = 1;
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = travel_base_trim_content( 25 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                    // Push to the main array.
                    array_push( $content, $page_post );
                    $i++;
                endwhile;
            endif;
            wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'travel_base_filter_slider_section_details', 'travel_base_get_slider_section_details' );


if ( ! function_exists( 'travel_base_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Travel Base 1.0.0
   *
   */
   function travel_base_render_slider_section( $content_details = array() ) {
        $options = travel_base_get_theme_options();
        $btn_label = ! empty( $options['slider_btn_label'] ) ? $options['slider_btn_label'] : esc_html__( 'Learn More', 'travel-base' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "draggable": true, "fade": true }'>
            <?php foreach ( $content_details as $content ) : ?>
                <article style="background-image:url('<?php echo esc_url( $content['image'] ); ?>');">
                    <div class="overlay"></div>
                    <div class="wrapper">
                        <div class="featured-content-wrapper">
                            <header class="entry-header">
                                <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                            </header>

                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .entry-content-->

                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-fill"><?php echo esc_html( $btn_label ); ?></a>
                            </div><!-- .read-more -->
                        </div><!-- .featured-content-wrapper -->
                    </div><!-- .wrapper -->
                </article>
            <?php endforeach; ?>
        </div><!-- #featured-slider -->        
    <?php }
endif;