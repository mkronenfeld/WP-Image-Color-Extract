<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.1.0
 *
 * @package    Wpip
 * @author     Marvin Kronenfeld (WP-Styles.de) <hello@wp-styles.de>
 */
$config = wpip_is_config_valid( [], 'ARRAY_A' )
?>

<div class="wrap">
	<h2 class="wp-heading-inline"><?php esc_html_e( get_admin_page_title() ); ?></h2>

	<section>
		<h3><?php _e( 'Debug information', 'wpip' ); ?></h3>
		<?php if ( empty( $config ) ) : ?>
			<p><?php _e( 'Everything looks fine. No problems at all.', 'wpip' ); ?></p>
		<?php else : ?>
			<pre><?php var_dump( $config ); ?></pre>
		<?php endif; ?>
	</section>
</div>
