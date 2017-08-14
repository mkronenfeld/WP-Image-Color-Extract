<?php
/**
 * Validates the environment (PHP settings, extensions, etc.)
 *
 * @link       https://wp-styles.de
 * @since      1.4.0
 *
 * @package    Wpip
 */

/**
 * Validates the environment (PHP settings, extensions, etc.)
 *
 * @package    Wpip
 * @author     Marvin Kronenfeld <hello@wp-styles.de>
 */
class Wpip_Validator extends Makro\ImagePalette\Validator {
	/**
	 * Human readable protocol translations.
	 *
	 * @access private
	 * @var    array
	 */
	protected $protocolErrorTranslations = [
		'allow_url_fopen'                               => 'Your php.ini does not allow this app to access URL object like image files.',
		'image_manipulation_library_available'          => 'There is no PHP image manipulation library (gd or imagick) available on your server.',
		'selected_image_manipulation_library_available' => 'Your selected Graphics library is not available on your server. Please try another option.'
	];

	/**
	 * Checks several php extensions are available.
	 *
	 * @return void
	 */
	protected function checkExtensions()
	{
		parent::checkExtensions();

		if ( ! $this->protocol['extensions'][ 'extension_loaded_' . WPIP_LIBRARY ] ) {
			$this->protocol['selected_image_manipulation_library_available'] = false;
		}
	}

	/**
	 * Gets the protocol errors as HTML list.
	 *
	 * @since 1.4.0
	 *
	 * @return string
	 */
	public function get_html_error_list() {
		$translation = '';
		$errors      = $this->getProtocolErrors();

		if ( ! empty( $errors ) ) {
			$translation = '<ol>';
			foreach ( $errors as $error ) {
				$translation .= '<li>' . __( $error, 'wpip' ) . '</li>';
			}
			$translation .= '</ol>';
		}

		return $translation;
	}
}
