<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

$options = travel_base_get_theme_options();


if ( ! function_exists( 'travel_base_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Travel Base 1.0.0
	 */
	function travel_base_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'travel_base_doctype', 'travel_base_doctype', 10 );


if ( ! function_exists( 'travel_base_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'travel_base_before_wp_head', 'travel_base_head', 10 );

if ( ! function_exists( 'travel_base_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'travel-base' ); ?></a>

		<?php
	}
endif;
add_action( 'travel_base_page_start_action', 'travel_base_page_start', 10 );

if ( ! function_exists( 'travel_base_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_header_start() {
		?>
		<div class="menu-overlay"></div>
		<header id="masthead" class="site-header" role="banner">
		<?php
	}
endif;
add_action( 'travel_base_header_action', 'travel_base_header_start', 10 );

if ( ! function_exists( 'travel_base_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'travel_base_page_end_action', 'travel_base_page_end', 10 );

if ( ! function_exists( 'travel_base_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_site_branding() {
		$options  = travel_base_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="wrapper">
			<div class="site-branding">
				<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
					<div class="site-logo">
						<?php the_custom_logo(); ?>
					</div>
				<?php } 
				if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
					<div id="site-identity">
						<?php
						if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
							if ( travel_base_is_latest_posts() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;
						} 
						if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
							<?php
							endif; 
						}?>
					</div>
				<?php endif; ?>
			</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'travel_base_header_action', 'travel_base_site_branding', 20 );

if ( ! function_exists( 'travel_base_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_site_navigation() {
		$options = travel_base_get_theme_options();
		?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="menu-label"><?php esc_html_e( 'Menu', 'travel-base' ); ?></span>
					<?php
					echo travel_base_get_svg( array( 'icon' => 'menu' ) );
					echo travel_base_get_svg( array( 'icon' => 'close' ) );
					?>					
				</button>

				<?php  
	        		$defaults = array(
	        			'theme_location' => 'primary',
	        			'container' => false,
	        			'menu_class' => 'menu nav-menu',
	        			'menu_id' => 'primary-menu',
	        			'echo' => true,
	        			'fallback_cb' => 'travel_base_menu_fallback_cb',
	        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	        		);
	        	
	        		wp_nav_menu( $defaults );
	        	?>
			</nav><!-- #site-navigation -->
		</div><!-- .wrapper -->
		<?php
	}
endif;
add_action( 'travel_base_header_action', 'travel_base_site_navigation', 30 );


if ( ! function_exists( 'travel_base_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_header_end() {
		?>
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'travel_base_header_action', 'travel_base_header_end', 50 );

if ( ! function_exists( 'travel_base_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'travel_base_content_start_action', 'travel_base_content_start', 10 );

if ( ! function_exists( 'travel_base_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_header_image() {
		if ( travel_base_is_frontpage() )
			return;
		$header_image = get_header_image();
		$class = '';
		if ( is_singular() ) :
			$class = ( has_post_thumbnail() || ! empty( $header_image ) ) ? '' : 'header-media-disabled';
		else :
			$class = ! empty( $header_image ) ? '' : 'header-media-disabled';
		endif;
		
		if ( is_singular() && has_post_thumbnail() ) : 
			$header_image = get_the_post_thumbnail_url( get_the_id(), 'full' );
    	endif; ?>

    	<div id="page-site-header" class="relative <?php echo esc_attr( $class ); ?>" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php echo travel_base_custom_header_banner_title(); ?>
                </header>

                <?php travel_base_add_breadcrumb(); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->

	<?php
	}
endif;
add_action( 'travel_base_header_image_action', 'travel_base_header_image', 10 );

if ( ! function_exists( 'travel_base_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Travel Base 1.0.0
	 */
	function travel_base_add_breadcrumb() {
		$options = travel_base_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( travel_base_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * travel_base_simple_breadcrumb hook
				 *
				 * @hooked travel_base_simple_breadcrumb -  10
				 *
				 */
				do_action( 'travel_base_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;
add_action( 'travel_base_header_image_action', 'travel_base_add_breadcrumb', 20 );

if ( ! function_exists( 'travel_base_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_content_end() {
		?>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'travel_base_content_end_action', 'travel_base_content_end', 10 );

if ( ! function_exists( 'travel_base_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'travel_base_footer', 'travel_base_footer_start', 10 );

if ( ! function_exists( 'travel_base_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_footer_site_info() {
		$options = travel_base_get_theme_options();

		$copyright_text = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'travel-base' ), date( 'Y' ), '<a href="' . esc_url( __( 'https://themepalace.com/', 'travel-base' ) ) .' ">Theme Palace</a>' );
		?>
		<div class="site-info col-2">
                <div class="wrapper">
                    <span>
                    	<?php 
                    	echo travel_base_santize_allow_tag( $copyright_text ); 
                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( ' | ' );
						}
                    	?>
                	</span>
                	<span>
		            	<?php  
		            		$defaults = array(
		            			'theme_location' => 'social',
		            			'container' => false,
		            			'menu_class' => 'menu social-icons',
		            			'echo' => true,
		            			'depth' => 1,
		            			'link_before' => '<span class="screen-reader-text">',
								'link_after' => '</span>',
		            		);
		            	
		            		wp_nav_menu( $defaults );
		            	?>
                	</span>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'travel_base_footer', 'travel_base_footer_site_info', 40 );

if ( ! function_exists( 'travel_base_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_footer_scroll_to_top() {
		$options  = travel_base_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo travel_base_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'travel_base_footer', 'travel_base_footer_scroll_to_top', 40 );

if ( ! function_exists( 'travel_base_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Travel Base 1.0.0
	 *
	 */
	function travel_base_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'travel_base_footer', 'travel_base_footer_end', 100 );

