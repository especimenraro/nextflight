<?php
/**
 * Theme Palace functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme Palace
 * @subpackage Travel Base
 * @since Travel Base 1.0.0
 */

if ( ! function_exists( 'travel_base_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travel_base_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Theme Palace, use a find and replace
		 * to change 'travel-base' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'travel-base' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Enable excerpt for page.
		add_post_type_support( 'page', 'excerpt' );

		// Load Footer Widget Support.
		require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/footer-widgets.php' );
		
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 450, 450, true );

		// Set the default content width.
		$GLOBALS['content_width'] = 525;
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary', 'travel-base' ),
			'social' 	=> esc_html__( 'Social', 'travel-base' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'travel_base_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => get_template_directory_uri() . '/assets/uploads/body-background.jpg',
		) ) );

		// This setup supports logo, site-title & site-description
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( '/assets/css/editor-style' . travel_base_min() . '.css', travel_base_fonts_url() ) );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Orange', 'travel-base' ),
				'slug' => 'orange',
				'color' => '#ff8121',
	       	),
	       	array(
	           	'name' => esc_html__( 'Blue', 'travel-base' ),
	           	'slug' => 'blue',
	           	'color' => '#46485f',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'travel-base' ),
	           	'slug' => 'black',
	           	'color' => '#000',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'travel-base' ),
		       	'shortName' => esc_html__( 'S', 'travel-base' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'travel-base' ),
		       	'shortName' => esc_html__( 'M', 'travel-base' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'travel-base' ),
		       	'shortName' => esc_html__( 'L', 'travel-base' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'travel-base' ),
		       	'shortName' => esc_html__( 'XL', 'travel-base' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'travel_base_setup' );

/**
 * Función creada para la evaluación de Nextu
 *
 * Muestra un reloj en una nueva sidebar.
 *
 * 
 */

function registra_sidebar_reloj() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-reloj', 'travel-base' ),
		'id'            => 'reloj-sidebar',
		'description'   => esc_html__( 'Agrega el reloj aqui.', 'travel-base' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action('widgets_init', 'registra_sidebar_reloj');

/**
 * Función creada para la evaluación de Nextu
 *
 * inserta hoja de estilos miestilo.css que anima la clase .entry-title.
 *
 * 
 */

function carga_miestilo() {

	wp_enqueue_style('miestilo', get_template_directory_uri().'/assets/css/miestilo.css' );
	
}
add_action('wp_enqueue_scripts', 'carga_miestilo');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travel_base_content_width() {

	$content_width = $GLOBALS['content_width'];


	$sidebar_position = travel_base_layout();
	switch ( $sidebar_position ) {

	  case 'no-sidebar':
	    $content_width = 1170;
	    break;

	  case 'left-sidebar':
	  case 'right-sidebar':
	    $content_width = 819;
	    break;

	  default:
	    break;
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1170;
	}

	/**
	 * Filter Travel Base content width of the theme.
	 *
	 * @since Travel Base 1.0.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'travel_base_content_width', $content_width );
}
add_action( 'template_redirect', 'travel_base_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travel_base_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'travel-base' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'travel-base' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebars( 4, array(
		'name'          => esc_html__( 'Optional Sidebar %d', 'travel-base' ),
		'id'            => 'optional-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'travel-base' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'travel_base_widgets_init' );


if ( ! function_exists( 'travel_base_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function travel_base_fonts_url() {
	$options = travel_base_get_theme_options();
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Playfair Display:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Oxygen font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Oxygen:300,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lora font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Lora:300,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Raleway:400,500,600,700,800,900';
	}

	// Header Options
	
	/* translators: If there are characters in your language that are not supported by Rajdhani, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Rajdhani font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Rajdhani';
	}

	/* translators: If there are characters in your language that are not supported by Cherry Swash, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Cherry Swash font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Cherry Swash';
	}

	/* translators: If there are characters in your language that are not supported by Philosopher, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Philosopher font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Philosopher';
	}

	/* translators: If there are characters in your language that are not supported by Slabo 27px, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Slabo 27px font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Slabo 27px';
	}

	/* translators: If there are characters in your language that are not supported by Dosis, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Dosis font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Dosis';
	}

	// Body Options
	
	/* translators: If there are characters in your language that are not supported by |News Cycle, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'News Cycle font: on or off', 'travel-base' ) ) {
		$fonts[] = 'News Cycle';
	}

	/* translators: If there are characters in your language that are not supported by Pontano Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Pontano Sans font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Pontano Sans';
	}

	/* translators: If there are characters in your language that are not supported by Gudea, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Gudea font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Gudea';
	}

	/* translators: If there are characters in your language that are not supported by Quattrocento, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Quattrocento font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Quattrocento';
	}

	/* translators: If there are characters in your language that are not supported by Khand, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Khand font: on or off', 'travel-base' ) ) {
		$fonts[] = 'Khand';
	}
	
	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since Travel Base 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function travel_base_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'travel-base-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'travel_base_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function travel_base_scripts() {
	$options = travel_base_get_theme_options();
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'travel-base-fonts', travel_base_fonts_url(), array(), null );

	// font-awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . travel_base_min() . '.css' );

	// slick
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick' . travel_base_min() . '.css' );

	// slick theme
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme' . travel_base_min() . '.css' );

	// blocks
	wp_enqueue_style( 'travel-base-blocks', get_template_directory_uri() . '/assets/css/blocks' . travel_base_min() . '.css' );

	wp_enqueue_style( 'travel-base-style', get_stylesheet_uri() );


	// Load the html5 shiv.
	wp_enqueue_script( 'travel-base-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . travel_base_min() . '.js', array(), '20160412', true );

	wp_enqueue_script( 'travel-base-navigation', get_template_directory_uri() . '/assets/js/navigation' . travel_base_min() . '.js', array(), '20151215', true );
	
	$travel_base_l10n = array(
		'quote'          => travel_base_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'travel-base' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'travel-base' ),
		'icon'           => travel_base_get_svg( array( 'icon' => 'down', 'fallback' => true ) ),
	);
	
	wp_localize_script( 'travel-base-navigation', 'travel_base_l10n', $travel_base_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . travel_base_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'packery', get_template_directory_uri() . '/assets/js/packery.pkgd' . travel_base_min() . '.js', array(), '', true );

	wp_enqueue_script( 'imagesloaded' );

	wp_enqueue_script( 'jquery-match-height', get_template_directory_uri() . '/assets/js/jquery-matchHeight' . travel_base_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'travel-base-custom', get_template_directory_uri() . '/assets/js/custom' . travel_base_min() . '.js', array( 'jquery' ), '20151215', true );

}
add_action( 'wp_enqueue_scripts', 'travel_base_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Travel Base Pro 1.0.0
 */
function travel_base_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'travel-base-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . travel_base_min() . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'travel-base-fonts', travel_base_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'travel_base_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load core file
 */
require get_template_directory() . '/inc/core.php';

/**
 * Load wp travel file
 */
if ( class_exists( 'WP_Travel' ) ) :
	require get_template_directory() . '/inc/wp-travel.php';
endif;