<?php
/**
 * The public-specific functionality of the plugin.
 *
 * @link       https://wp-styles.de
 * @since      1.3.0
 *
 * @package    Wpip
 */

/**
 * The public-specific functionality of the plugin.
 *
 * @package    Wpip
 * @author     Marvin Kronenfeld <hello@wp-styles.de>
 */
class Wpip_Public {

	/**
	 * Saves the color palette to the current post.
	 *
	 * @since 1.3.0
	 *
	 * @param integer $post_ID Post ID
	 * @param WP_Post $post Post object.
	 * @param bool $update Whether this is an existing post being updated or not.
	 *
	 * @return void
	 */
	public function save_post( $post_ID, $post, $update ) {
		if ( in_array( $post->post_type, WPIP_POST_TYPES ) && has_post_thumbnail( $post_ID ) ) {
			$file      = get_the_post_thumbnail_url( $post_ID, 'post-thumbnail' );
			$color_map = wpip_get_image_colors( $file );

			if ( ! empty( $color_map ) ) {
				update_post_meta( $post_ID, WPIP_POST_META_KEY_COLORS_RGB, $color_map );
			}
		}
	}
}
