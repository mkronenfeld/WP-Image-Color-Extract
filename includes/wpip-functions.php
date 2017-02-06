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
	function wpip_get_image_color( $file, $precision = 50, $library = 'gd' ) {
		$color_map = wpip_get_image_colors( $file, $precision, 1, $library );

		return array_shift( $color_map );
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
	function wpip_get_image_colors( $file, $precision = 50, $palette_length = 3, $library = 'gd' ) {
		if ( ! wpip_is_config_valid() ) {
			return [];
		}

		$class_map = [
			'vendor/image-palette/src/Color.php',
			'vendor/image-palette/src/Exception/Exception.php',
			'vendor/image-palette/src/ImagePalette.php'
		];

		foreach ( $class_map as $path ) {
			require_once WPIP_PATH . $path;
		}

		$image_palette       = new \Makro\ImagePalette\ImagePalette( $file, $precision, $palette_length, $library );
		$color_map           = $image_palette->getColors();
		$color_map_sanitized = [];

		foreach ( $color_map as $color ) {
			$color_map_sanitized[] = $color->toRgbString();
		}

		return $color_map_sanitized;
	}
}

if ( ! function_exists( 'wpip_is_config_valid' ) ) {
	/**
	 * Checks if the server config is valid.
	 *
	 * array['library'] string The image processing library.
	 *
	 * @todo: Outsource to class?
	 *
	 * @param array $query (See above)
	 * @param string $output Optional. ARRAY_A (associative array) or BOOLEAN. Default: BOOLEAN.
	 *
	 * @return array|bool
	 */
	function wpip_is_config_valid( $query = [], $output = 'BOOLEAN' ) {
		$errors = [];

		if ( ini_get( 'allow_url_fopen' ) ) {
			$error['fopen_allowed'] = false;
		}

		if ( isset( $query['libary'] ) && extension_loaded( $query['libary'] ) ) {
			$error[ 'extension_loaded_' . $query['libary'] ] = false;
		}

		if ( 'ARRAY_A' === $output ) {
			return $errors;
		}

		return ( empty( $errors ) ) ? true : false;
	}
}
