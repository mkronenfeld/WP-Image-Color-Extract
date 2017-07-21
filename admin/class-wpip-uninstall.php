<?php
/**
 * The uninstall class.
 *
 * Removes all post meta and plugin option the plugin added.
 *
 * @link       https://wp-styles.de
 * @since      1.3.0
 *
 * @package    Wpip
 */

/**
 * The uninstall class.
 *
 * Removes all post meta and plugin option the plugin added.
 *
 * @package    Wpip
 * @author     Marvin Kronenfeld <hello@wp-styles.de>
 */
class Wpip_Uninstall {

	/**
	 * The ID of this plugin.
	 *
	 * @since  1.3.0
	 * @access private
	 * @var    string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.3.0
	 *
	 * @return void
	 */
	public function __construct() {
		$this->plugin_name = 'wpip';
	}

	/**
	 * Delete option
	 *
	 * Trigger the delete_option functions for single- and multisites.
	 *
	 * @return void
	 */
	private function delete_options() {
		delete_option( $this->plugin_name . '-options' );
		delete_site_option( $this->plugin_name . '-options' );
	}

	/**
	 * Delete post meta
	 *
	 * - WPIP_POST_META_KEY_COLORS_RGB
	 *
	 * @return void
	 */
	private function delete_post_meta() {
		delete_post_meta_by_key( WPIP_POST_META_KEY_COLORS_RGB );
	}

	/**
	 * Run uninstall
	 *
	 * @return void
	 */
	public function run() {
		$this->delete_options();
		$this->delete_post_meta();
	}
}
