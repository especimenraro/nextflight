<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

get_header(); 
?>

<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="blog-posts-wrapper clear">
            
				<?php
				
				if ( have_posts() ) : ?>

					<?php
					 /* Start the Loop */
					 
					while ( have_posts() ) : the_post();

						
						
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;
					

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
				
				?>
			</div>
			<?php  
			/**
			* Hook - travel_base_action_pagination.
			*
			* @hooked travel_base_pagination 
			*/
			do_action( 'travel_base_action_pagination' ); 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( travel_base_is_sidebar_enable() ) {
		//get_sidebar();
	}
	?>
</div><!-- .wrapper -->

<?php
get_footer();
