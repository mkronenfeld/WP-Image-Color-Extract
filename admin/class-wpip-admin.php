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
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wpip
 * @author     Marvin Kronenfeld (WP-Styles.de) <hello@wp-styles.de>
 */
class Wpip_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since 1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
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
	}

	/**
	 * Saves the color palette to the current post.
	 *
	 * @since 1.0.0
	 *
	 * @param integer $post_ID Post ID
	 * @param WP_Post $post Post object.
	 * @param bool $update Whether this is an existing post being updated or not.
	 *
	 * @return void
	 */
	public function save_post( $post_ID, $post, $update ) {
		if ( in_array( $post->post_type, WPIP_POST_TYPES ) && has_post_thumbnail( $post_ID ) ) {
			$file  = get_the_post_thumbnail_url( $post_ID, 'post-thumbnail' );
			$color = wpip_get_image_color( $file );

			update_post_meta( $post_ID, WPIP_POST_META_KEY_COLOR_RGB, $color );
		}
	}

	/**
	 * Adds a settings page link to a menu
	 *
	 * @since  1.1.0
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
				esc_html__( 'Image Color Palette', 'now-hiring' )
			),
			'manage_options',
			$this->plugin_name . '-settings',
			array( $this, 'page_options' )

		);
	}

	/**
	 * Creates the options page
	 *
	 * @since  1.1.0
	 * @return void
	 */
	public function page_options() {
		include( WPIP_PATH . 'admin/partials/wpip-admin-page-settings.php' );
	}

}
