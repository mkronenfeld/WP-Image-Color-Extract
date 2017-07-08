<?php

/**
 * The fields generator.
 *
 * Manages the fields generation for the admin area.
 *
 * @link       https://wp-styles.de
 * @since      1.2.0
 *
 * @package    Wpip
 */

/**
 * The fields generator.
 *
 * Manages the fields generation for the admin area.
 *
 * @package    Wpip
 * @author     Marvin Kronenfeld <hello@wp-styles.de>
 */
class Wpip_Fields {

	/**
	 * The base path for field templates.
	 *
	 * @since  1.2.0
	 * @access private
	 * @var string
	 */
	private $field_path;

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
	 * @since  1.2.0
	 * @access private
	 * @var    string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since  1.2.0
	 * @access private
	 * @var    string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.2.0
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @return void
	 */
	public function __construct( $plugin_name, $version, $options ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->options     = $options;
		$this->field_path  = WPIP_PATH . 'admin/partials/' . $this->plugin_name;
	}

	/**
	 * Creates a number field
	 *
	 * @param array $args The arguments for the field
	 *
	 * @return string
	 */
	public function number( $args ) {
		$defaults = [
			'aria'        => '',
			'class'       => 'number widefat',
			'description' => '',
			'label'       => '',
			'name'        => $this->plugin_name . '-options[' . $args['id'] . ']',
			'placeholder' => '',
			'type'        => 'number',
			'value'       => ''
		];
		$atts     = wp_parse_args( $args, $defaults );

		require( $this->field_path . '-field-number.php' );
	}

	/**
	 * Creates a select field
	 *
	 * @param array $args The arguments for the field
	 *
	 * @return string
	 */
	public function select( $args ) {
		$defaults = [
			'aria'        => '',
			'blank'       => '',
			'class'       => 'widefat',
			'context'     => '',
			'description' => '',
			'label'       => '',
			'name'        => $this->plugin_name . '-options[' . $args['id'] . ']',
			'selections'  => array(),
			'value'       => '',
		];
		$atts     = wp_parse_args( $args, $defaults );

		require( $this->field_path . '-field-select.php' );
	}

}
