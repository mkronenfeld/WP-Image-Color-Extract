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
 * Version:           1.4.0
 * Author:            Marvin Kronenfeld
 * Author URI:        https://wp-styles.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpip
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

define( 'WPIP_VERSION', '1.4.0' );

if ( ! defined( 'WPIP_FILE' ) ) {
	define( 'WPIP_FILE', __FILE__ );
}

if ( ! defined( 'WPIP_PATH' ) ) {
	define( 'WPIP_PATH', plugin_dir_path( WPIP_FILE ) );
}

/* Set plugin options */

$wpip_options = get_option( 'wpip-options' );

if ( ! defined( 'WPIP_POST_TYPES' ) ) {
	define(
		'WPIP_POST_TYPES',
		( isset( $wpip_options['post-types'] ) ) ? [ $wpip_options['post-types'] ] : [ 'post' ]
	);
}

if ( ! defined( 'WPIP_POST_META_KEY_COLORS_RGB' ) ) {
	define( 'WPIP_POST_META_KEY_COLORS_RGB', 'wpip_colors_rgb' );
}

if ( ! defined( 'WPIP_PRECISION' ) ) {
	define(
		'WPIP_PRECISION',
		( isset( $wpip_options['precision'] ) ) ? $wpip_options['precision'] : 25
	);
}

if ( ! defined( 'WPIP_PALETTE_LENGTH' ) ) {
	define(
		'WPIP_PALETTE_LENGTH',
		( isset( $wpip_options['palette-length'] ) ) ? $wpip_options['palette-length'] : 5
	);
}

if ( ! defined( 'WPIP_LIBRARY' ) ) {
	define(
		'WPIP_LIBRARY',
		( isset( $wpip_options['library'] ) ) ? $wpip_options['library'] : 'gd'
	);
}

/* Plugin (de-)activation */

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

/* Plugin loading */

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
	require_once WPIP_PATH . 'includes/class-wpip.php';
	require_once WPIP_PATH . 'includes/wpip-global-functions.php';
	require_once WPIP_PATH . 'includes/wpip-deprecated-functions.php';
	require_once WPIP_PATH . 'vendor/image-palette/src/Validator.php';

	$plugin = new Wpip();
	$plugin->run();
}

/* Hook into WP */

// Activation and deactivation hook.
register_activation_hook( WPIP_FILE, 'activate_wpip' );
register_deactivation_hook( WPIP_FILE, 'deactivate_wpip' );

if ( ! wp_installing() ) {
	add_action( 'plugins_loaded', 'run_wpip' );
}