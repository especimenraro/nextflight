<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  Travel Base 1.0.0
 * @access public
 */
final class Travel_Base_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since Travel Base 1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since Travel Base 1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since Travel Base 1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since Travel Base 1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/upgrade-to-pro/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Travel_Base_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Travel_Base_Customize_Section_Pro(
				$manager,
				'travel-base',
				array(
					'title'    => esc_html__( 'Travel Base Pro','travel-base' ),
					'pro_text' => esc_html__( 'Go Pro','travel-base' ),
					'pro_url'  => esc_url( 'https://themepalace.com/downloads/travel-base-pro/' )
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since Travel Base 1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'travel-base-go-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/upgrade-to-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'travel-base-go-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/upgrade-to-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
Travel_Base_Customize::get_instance();
