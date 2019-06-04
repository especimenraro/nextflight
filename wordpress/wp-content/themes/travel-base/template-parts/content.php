<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
$options = travel_base_get_theme_options();
$readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'travel-base' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <div class="post-item-wrapper">

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image">
                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>" /></a>
            </div><!-- .featured-image -->
        <?php endif; ?>

        <div class="entry-container">
            <div class="entry-meta">
                <?php travel_base_posted_on(); ?>
            </div><!-- .entry-meta -->

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

            <a href="<?php the_permalink(); ?>" class="more-link">
                <?php
                    echo esc_html( $readmore );
                    echo travel_base_get_svg( array( 'icon' => 'right' ) );
                ?>
            </a><!-- .more-link -->
        </div><!-- .entry-container -->
    </div><!-- .post-item-wrapper -->

</article><!-- #post-## -->
