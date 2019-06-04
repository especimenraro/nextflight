<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */
if ( ! function_exists( 'travel_base_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Travel Base 1.0.0
    */
    function travel_base_add_blog_section() {
    	$options = travel_base_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'travel_base_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'travel_base_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        travel_base_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'travel_base_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Travel Base 1.0.0
    * @param array $input blog section details.
    */
    function travel_base_get_blog_section_details( $input ) {
        $options = travel_base_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        $blog_count = 4;
        
        $content = array();
        switch ( $blog_content_type ) {
        	
            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'category__not_in'  => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
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
                $page_post['excerpt']   = travel_base_trim_content( 20 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg'; 

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
// blog section content details.
add_filter( 'travel_base_filter_blog_section_details', 'travel_base_get_blog_section_details' );


if ( ! function_exists( 'travel_base_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Travel Base 1.0.0
   *
   */
   function travel_base_render_blog_section( $content_details = array() ) {
        $options = travel_base_get_theme_options();
        $blog_content_type  = $options['blog_content_type'];
        $image = ! empty( $options['blog_image'] ) ? $options['blog_image'] : '';
        $readmore = ! empty( $options['blog_read_more'] ) ? $options['blog_read_more'] : esc_html__( 'Read More', 'travel-base' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="latest-posts" class="relative page-section" style="background-image: url('<?php echo esc_url( $image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                    <?php endif; ?>
                </div><!-- .section-header -->

                <div class="section-content clear">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="entry-container clear">
                                <div class="entry-meta entry-date-meta">
                                    <?php travel_base_posted_on( $content['id'] ); ?>
                                </div><!-- .entry-meta -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    <div class="entry-meta">
                                        <?php travel_base_author_meta( $content['id'] ); ?>
                                    </div><!-- .entry-meta -->
                                </header>

                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="more-link">
                                    <?php  
                                        echo esc_html( $readmore );
                                        echo ' ' . travel_base_get_svg( array( 'icon' => 'right' ) );
                                    ?>
                                </a><!-- .more-link -->
                            </div><!-- .entry-container -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #latest-posts -->

    <?php }
endif;