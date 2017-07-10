<?php
if ( ! function_exists( 'wpip_get_post_thumbnail_color_rgb' ) ) {
	/**
	 * Gets the main rgb color from a post.
	 *
	 * @deprecated
	 *
	 * @param int|WP_Post $post
	 *
	 * @return string
	 */
	function wpip_get_post_thumbnail_color_rgb( $post ) {
		return wpip_get_post_thumbnail_color( $post );
	}
}
