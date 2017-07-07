<?php

/**
 * WP Image Color Palette
 *
 * @link              https://wp-styles.de
 * @since             1.0.0
 * @package           Wpip
 *
 * @wordpress-plugin
 * Plugin Name:       WP Image Color Palette
 * Plugin URI:        https://github.com/mkronenfeld/WP-Image-Color-Palette
 * Description:       Extracts colors from an attachment image and saves it to the post meta.
 * Version:           1.1.0
 * Author:            Marvin Kronenfeld
 * Author URI:        https://wp-styles.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpip
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'WPIP_FILE' ) ) {
	define( 'WPIP_FILE', __FILE__ );
}

if ( ! defined( 'WPIP_PATH' ) ) {
	define( 'WPIP_PATH', plugin_dir_path( WPIP_FILE ) );
}

if ( ! defined( 'WPIP_POST_TYPES' ) ) {
	define( 'WPIP_POST_TYPES', [ 'post' ] );
}

if ( ! defined( 'WPIP_POST_META_KEY_COLOR_RGB' ) ) {
	define( 'WPIP_POST_META_KEY_COLOR_RGB', 'wpip_color_rgb' );
}

if ( ! defined( 'WPIP_PATH' ) ) {
	define( 'WPIP_PATH', plugin_dir_path( WPIP_FILE ) );
}

if (! defined( 'WPIP_PRECISION' ) ) {
	define( 'WPIP_PRECISION', 50 );
}

if (! defined( 'WPIP_PALETTE_LENGTH' ) ) {
	define( 'WPIP_PALETTE_LENGTH', 3 );
}

if (! defined( 'WPIP_LIBRARY' ) ) {
	define( 'WPIP_LIBRARY', 'gd' );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpip-activator.php
 */
function activate_wpip() {
	require_once WPIP_PATH . 'includes/class-wpip-activator.php';
	Wpip_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpip-deactivator.php
 */
function deactivate_wpip() {
	require_once WPIP_PATH . 'includes/class-wpip-deactivator.php';
	Wpip_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpip' );
register_deactivation_hook( __FILE__, 'deactivate_wpip' );

require WPIP_PATH . 'includes/class-wpip.php';
require WPIP_PATH . 'includes/wpip-functions.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpip() {
	$plugin = new Wpip();
	$plugin->run();
}

run_wpip();
