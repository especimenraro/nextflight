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
$options = travel_base_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry ' . $class ); ?>>
	
	<?php if ( ! $options['single_post_hide_date'] ) : ?>
        <div class="entry-meta">
            <?php 
            	echo travel_base_author_meta();
            	travel_base_posted_on(); 
            ?>
        </div><!-- .entry-meta -->
    <?php endif; ?>

	<div class="entry-container">
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'travel-base' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travel-base' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</div><!-- .entry-container -->
	<div class="entry-meta">
		<?php travel_base_entry_footer(); ?>
	</div>
</article><!-- #post-## -->
