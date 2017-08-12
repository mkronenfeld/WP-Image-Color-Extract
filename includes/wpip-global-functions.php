<?php
if ( ! function_exists( 'wpip_get_image_color' ) ) {
	/**
	 * Gets the main color from an image.
	 *
	 * @param string $file
	 * @param int $precision Optional. Default: 50
	 * @param string $library Optional. The image processing library. Default: 'gd'.
	 *
	 * @return string|null
	 */
	function wpip_get_image_color(
		$file,
		$precision = WPIP_PRECISION,
		$library = WPIP_LIBRARY
	) {
		$color     = '';
		$color_map = wpip_get_image_colors( $file, $precision, 1, $library );

		if ( is_array( $color_map ) ) {
			$color = array_shift( $color_map );
		}

		return $color;
	}
}

if ( ! function_exists( 'wpip_get_image_colors' ) ) {
	/**
	 * Gets the image color palette.
	 *
	 * @param string $file
	 * @param int $precision Optional. Default: 50
	 * @param int $paletteLength Optional. Default: 3
	 * @param string $library Optional. The image processing library. Default: 'gd'.
	 *
	 * @return array
	 */
	function wpip_get_image_colors(
		$file,
		$precision = WPIP_PRECISION,
		$palette_length = WPIP_PALETTE_LENGTH,
		$library = WPIP_LIBRARY
	) {
		$system_status = wpip_is_config_valid();

		if ( ! $system_status['success'] ) {
			return [ ];
		}

		$class_map = [
			'vendor/image-palette/src/Color.php',
			'vendor/image-palette/src/Exception/Exception.php',
			'vendor/image-palette/src/Exception/UnsupportedFileTypeException.php',
			'vendor/image-palette/src/ImagePalette.php'
		];

		foreach ( $class_map as $path ) {
			require_once WPIP_PATH . $path;
		}

		$image_palette       = new \Makro\ImagePalette\ImagePalette( $file, $precision, $palette_length, $library );
		$color_map           = $image_palette->getColors();
		$color_map_sanitized = [ ];

		foreach ( $color_map as $color ) {
			$color_map_sanitized[] = $color->toRgbString();
		}

		return $color_map_sanitized;
	}
}

if ( ! function_exists( 'wpip_get_post_thumbnail_color' ) ) {
	/**
	 * Gets the main rgb color from a post.
	 *
	 * @param int|WP_Post $post
	 *
	 * @return string
	 */
	function wpip_get_post_thumbnail_color( $post ) {
		$color     = '';
		$color_map = wpip_get_post_thumbnail_colors( $post );

		if ( is_array( $color_map ) && ! empty( $color_map ) ) {
			$color = array_shift( $color_map );
		}

		return $color;
	}
}

if ( ! function_exists( 'wpip_get_post_thumbnail_colors' ) ) {
	/**
	 * Gets the main rgb colors from a post.
	 *
	 * @param int|WP_Post $post
	 *
	 * @return array
	 */
	function wpip_get_post_thumbnail_colors( $post ) {
		$_post = get_post( $post );

		return get_post_meta( $_post->ID, WPIP_POST_META_KEY_COLORS_RGB, true );
	}
}

if ( ! function_exists( 'wpip_is_config_valid' ) ) {
	/**
	 * Checks if the server config is valid.
	 *
	 * @return array
	 */
	function wpip_is_config_valid() {
		$validator        = new Wpip_Validator();
		$protocol         = $validator->validate();
		$protocol['html'] = $validator->get_html_error_list();

		return $protocol;
	}
}
