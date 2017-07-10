<?php
/**
 * Select template.
 *
 * @since      1.2.0
 *
 * @package    Wpip
 * @author     Marvin Kronenfeld <hello@wp-styles.de>
 */

if ( ! empty( $atts['label'] ) ) : ?>
	<label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'wpiip' ); ?>: </label>
<?php endif; ?>
	<select aria-label="<?php esc_attr( _e( $atts['aria'], 'wpip' ) ); ?>"
	        class="<?php echo esc_attr( $atts['class'] ); ?>"
	        id="<?php echo esc_attr( $atts['id'] ); ?>"
	        name="<?php echo esc_attr( $atts['name'] ); ?>">
		<?php foreach ( $atts['selections'] as $value => $label ) : ?>
			<option value="<?php echo esc_attr( $value ); ?>"
				<?php selected( $atts['value'], $value ); ?>
				><?php esc_html_e( $label, 'wpiip' ); ?></option>
		<?php endforeach; ?>
	</select>
<?php if ( ! empty( $atts['description'] ) ) : ?>
	<span class="description"><?php esc_html_e( $atts['description'], 'wpip' ); ?></span>
<?php endif; ?>