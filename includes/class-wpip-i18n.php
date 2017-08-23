<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wp-styles.de
 * @since      1.5.0
 *
 * @package    Wpip
 * @subpackage Wpip/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.5.0
 * @package    Wpip
 * @subpackage Wpip/includes
 * @author     Marvin Kronenfeld (WP-Styles.de) <hello@wp-styles.de>
 */
class Wpip_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.5.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'wpip',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/lang/'
		);
	}
}
