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
	 * @param      string $plugin_name The name of this plugin.
	 * @param      string $version The version of this plugin.
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
	 * @param $post_ID
	 * @param $post
	 * @param $update
	 */
	public function add_attachment( $post_ID ) {
		$msg = 'add_attachment? ';
		wp_die( $msg );
	}

	/**
	 * Saves the color palette to the current post.
	 *
	 * @since 1.0.0
	 *
	 * @param integer $post_ID Post ID
	 * @param WP_Post $post Post object.
	 * @param bool $update Whether this is an existing post being updated or not.
	 */
	public function save_post( $post_ID, $post, $update ) {
		$msg = 'Is this un update? ';
		$msg .= $update ? 'Yes.' : 'No.';
		wp_die( $msg );
	}
}
