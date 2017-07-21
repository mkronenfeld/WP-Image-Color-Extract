<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://wp-styles.de
 * @since      1.0.0
 *
 * @package    Wpip
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

if ( ! defined( 'WPIP_FILE' ) ) {
	define( 'WPIP_FILE', __FILE__ );
}

if ( ! defined( 'WPIP_PATH' ) ) {
	define( 'WPIP_PATH', plugin_dir_path( WPIP_FILE ) );
}

if ( ! defined( 'WPIP_POST_META_KEY_COLORS_RGB' ) ) {
	define( 'WPIP_POST_META_KEY_COLORS_RGB', 'wpip_colors_rgb' );
}

require WPIP_PATH . 'admin/class-wpip-uninstall.php';

/**
 * Removes all post meta and plugin option the plugin added.
 *
 * @since    1.3.0
 */
function uninstall_wpip() {
	$uninstall = new Wpip_Uninstall();
	$uninstall->run();
}

uninstall_wpip();
