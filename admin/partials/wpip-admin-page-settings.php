<?php
/**
 * Provide a admin area view for the plugin.
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.1.0
 *
 * @package    Wpip
 * @author     Marvin Kronenfeld <hello@wp-styles.de>
 */

$config = wpip_is_config_valid( [ ], 'ARRAY_A' );
?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?php esc_html_e( get_admin_page_title() ); ?></h1>

	<section>
		<form method="post" action="options.php">
			<?php
			settings_fields( $this->plugin_name . '-options' );
			do_settings_sections( $this->plugin_name );
			submit_button( __( 'Save Settings', 'wpip' ) );
			?>
		</form>
	</section>

	<hr>

	<section>
		<h3><?php _e( 'Debug information', 'wpip' ); ?></h3>
		<?php if ( empty( $config ) ) : ?>
			<p><?php _e( 'Everything looks fine. No problems at all.', 'wpip' ); ?></p>
		<?php else : ?>
			<pre><?php var_dump( $config ); ?></pre>
		<?php endif; ?>

		<!-- @todo: Remove before the next plugin update. -->
		<pre><?php var_dump( get_option( 'wpip-options' ) ); ?></pre>
		<pre><?php var_dump(
				WPIP_PATH,
				WPIP_FILE,
				WPIP_POST_META_KEY_COLOR_RGB,
				WPIP_POST_TYPES,
				WPIP_LIBRARY,
				WPIP_PALETTE_LENGTH,
				WPIP_PRECISION
			); ?></pre>
	</section>
</div>
