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

$system_status = wpip_is_config_valid();
?>
<style>
	.wpip .wpip__debug {
		background-color: #fff;
		border-radius: .5em;
		font-size: .75em;
		padding: 1em;
	}

	.wpip .wpip__status {
		border-radius: 50%;
		background-color: #888;
		display: inline-block;
		height: .8em;
		line-height: inherit;
		width: .8em;
	}

	.wpip .wpip__status.wpip__status--success {
		background-color: #7ad03a;
	}

	.wpip .wpip__status.wpip__status--danger {
		background-color: #dc3232;
	}
</style>
<div class="wrap wpip">
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
		<h3><?php _e( 'System Status', 'wpip' ); ?></h3>
		<?php if ( $system_status['success'] ) : ?>
			<p><i class="wpip__status wpip__status--success"
			      title="<?php _e( 'Good', 'wpip' ); ?>"
			      aria-hidden="true"></i> <?php _e( 'Everything looks fine. No problems at all.', 'wpip' ); ?></p>
		<?php else : ?>
			<p><i class="wpip__status wpip__status--danger"
			      title="<?php _e( 'Bad', 'wpip' ); ?>"
			      aria-hidden="true"></i> <?php _e( 'Uh-oh. There may be some issues with your system configuration:',
					'wpip' ); ?></p>
			<?php echo $system_status['html']; ?>
			<p><?php _e( 'If you want to report an error on wordpress.org, please make sure to attach the following report:',
					'wpip' ); ?></p>
		<?php endif; ?>
		<pre class="wpip__debug"><?php var_dump( $system_status['protocol'], get_option( 'wpip-options' ) ); ?></pre>
	</section>
</div>
