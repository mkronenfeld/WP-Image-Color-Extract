<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wp-styles.de
 * @since      1.0.0
 *
 * @package    Wpip
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Wpip
 * @author     Marvin Kronenfeld <hello@wp-styles.de>
 */
class Wpip_Admin {

	/**
	 * The option value of this plugin.
	 *
	 * @since  1.2.0
	 * @access private
	 * @var    array $version
	 */
	private $options;

	/**
	 * The ID of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @return void
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->set_options();
	}

	/**
	 * Adds a settings page link to a menu.
	 *
	 * @since  1.1.0
	 *
	 * @return void
	 */
	public function admin_menu() {
		add_submenu_page(
			'tools.php',
			apply_filters(
				$this->plugin_name . '-settings-page-title',
				esc_html__( 'Image Color Palette Tools', 'wpip' )
			),
			apply_filters(
				$this->plugin_name . '-settings-menu-title',
				esc_html__( 'Image Color Palette', 'wpiip' )
			),
			'manage_options',
			$this->plugin_name . '-settings',
			array( $this, 'page_options' )

		);
	}

	/**
	 * Creates the options page.
	 *
	 * @since  1.1.0
	 *
	 * @return void
	 */
	public function page_options() {
		include( WPIP_PATH . 'admin/partials/wpip-admin-page-settings.php' );
	}

	/**
	 * Registers the settings fields to a settings page and section.
	 *
	 * @since  1.2.0
	 *
	 * @return void
	 */
	public function register_fields() {
		$fields     = new Wpip_Fields( $this->plugin_name, $this->version, $this->options );
		$post_types = [ ];

		foreach ( get_post_types( [ 'public' => true ], 'names' ) as $post_type ) {
			if ( post_type_supports( $post_type, 'custom-fields' ) ) {
				$post_types[ $post_type ] = $post_type;
			}
		}

		add_settings_field(
			'wpip-post-types',
			__( 'Post types', 'wpip' ),
			array( $fields, 'select' ),
			$this->plugin_name,
			$this->plugin_name . '-settings',
			array(
				'description' => __( 'Extract the color palette automatically for this post type.', 'wpip' ),
				'id'          => 'post-types',
				'selections'  => $post_types,
				'value'       => ( isset ( $this->options['post-types'] ) ) ? $this->options['post-types'] : 'post'
			)
		);

		add_settings_field(
			'wpip-palette-length',
			__( 'Palette length', 'wpip' ),
			array( $fields, 'number' ),
			$this->plugin_name,
			$this->plugin_name . '-settings',
			array(
				'description' =>
					__( 'The maximum amount of colors the algorithm will fetch from your images.',
						'wpip' ),
				'id'          => 'palette-length',
				'value'       => 3,
				'min'         => 1,
				'max'         => 6
			)
		);

		add_settings_field(
			'wpip-precision',
			__( 'Precision', 'wpip' ),
			array( $fields, 'number' ),
			$this->plugin_name,
			$this->plugin_name . '-settings',
			array(
				'description' =>
					__( 'By default, the plugin will analyse every 20th pixel. This is a performance-to-time decision.',
						'wpip' ),
				'id'          => 'precision',
				'value'       => ( isset ( $this->options['precision'] ) ) ? $this->options['precision'] : 20,
				'max'         => 150,
				'min'         => 10
			)
		);

		add_settings_field(
			'wpip-library',
			__( 'Graphics library', 'wpip' ),
			array( $fields, 'select' ),
			$this->plugin_name,
			$this->plugin_name . '-settings',
			array(
				'description' =>
					__( 'Select the graphics library to use for processing. If you don\'t have any idea what to do here, just leave it as it is.',
						'wpip' ),
				'id'          => 'library',
				'selections'  => [
					'gd'      => 'GD',
					'imagick' => 'Imagick'
				],
				'value'       => ( isset ( $this->options['library'] ) ) ? $this->options['library'] : 'gd'
			)
		);
	}

	/**
	 * Adds new sections to the settings page.
	 *
	 * @since 1.2.0
	 *
	 * @return void
	 */
	public function register_sections() {
		add_settings_section(
			$this->plugin_name . '-settings',
			__( 'Color extraction options', 'wpip' ),
			null,
			$this->plugin_name
		);
	}

	/**
	 * Registers the settings and their sanitization callbacks.
	 *
	 * @since  1.2.0
	 *
	 * @return void
	 */
	public function register_settings() {
		register_setting(
			$this->plugin_name . '-options',
			$this->plugin_name . '-options',
			array( $this, 'validate_options' )
		);
	}

	/**
	 * Sets the class variable $options
	 *
	 * @since 1.2.0
	 *
	 * @return Wpip_Admin
	 */
	private function set_options() {
		$this->options = get_option( $this->plugin_name . '-options' );

		return $this;
	}

	/**
	 * Validates the saved options.
	 *
	 * @since 1.2.0
	 *
	 * @param array $input The form input.
	 *
	 * @return array
	 */
	public function validate_options( $input ) {
		$sanitized_input = [ ];

		foreach ( $input as $key => $value ) {
			switch ( $key ) {
				case 'post-types':
					// breakthrough
				case 'library':
					$sanitized_input[ $key ] = sanitize_key( $value );
					break;
				case 'precision':
					// breakthrough
				case 'palette-length':
					$sanitized_input[ $key ] = intval( $value );
					break;
			}
		}

		return $sanitized_input;
	}
}
