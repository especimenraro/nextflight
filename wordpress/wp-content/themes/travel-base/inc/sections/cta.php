<?php
/**
 * Call to action section
 *
 * This is the template for the content of cta section
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */
if ( ! function_exists( 'travel_base_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Travel Base 1.0.0
    */
    function travel_base_add_cta_section() {
    	$options = travel_base_get_theme_options();
        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'travel_base_section_status', true, 'cta_section_enable' );

        if ( true !== $cta_enable ) {
            return false;
        }
        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'travel_base_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render cta section now.
        travel_base_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'travel_base_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Travel Base 1.0.0
    * @param array $input cta section details.
    */
    function travel_base_get_cta_section_details( $input ) {
        $options = travel_base_get_theme_options();

        $content = array();
        	
        $page_id = ! empty( $options['cta_content_page'] ) ? $options['cta_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
        );

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// cta section content details.
add_filter( 'travel_base_filter_cta_section_details', 'travel_base_get_cta_section_details' );


if ( ! function_exists( 'travel_base_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Travel Base 1.0.0
   *
   */
   function travel_base_render_cta_section( $content_details = array() ) {
        $options = travel_base_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
            <div id="call-to-action" class="relative page-section" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                <div class="overlay"></div>
                <div class="wrapper">
                    <div class="section-header">
                        <?php if ( ! empty( $content['title'] ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                        <?php endif; ?>
                    </div><!-- .section-header -->

                    <?php if ( ! empty( $content['url'] ) && ! empty( $options['cta_btn_title'] ) ) : ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $options['cta_btn_title'] ); ?></a>
                        </div><!-- .read-more -->
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #call-to-action -->

        <?php endforeach;
    }
endif;