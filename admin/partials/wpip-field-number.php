<?php
/**
 * Input type number template.
 *
 * @since      1.2.0
 *
 * @package    Wpip
 * @author     Marvin Kronenfeld <hello@wp-styles.de>
 */

if ( ! empty( $atts['label'] ) ) : ?>
	<label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'wpiip' ); ?>: </label>
<?php endif; ?>
	<input class="<?php echo esc_attr( $atts['class'] ); ?>"
	       id="<?php echo esc_attr( $atts['id'] ); ?>"
	       name="<?php echo esc_attr( $atts['name'] ); ?>"
	       placeholder="<?php echo esc_attr( $atts['placeholder'] ); ?>"
	       type="<?php echo esc_attr( $atts['type'] ); ?>"
	       value="<?php echo esc_attr( $atts['value'] ); ?>"
	       min="<?php echo esc_attr( $atts['min'] ); ?>"
	       max="<?php echo esc_attr( $atts['max'] ); ?>"/>
<?php if ( ! empty( $atts['description'] ) ) : ?>
	<span class="description"><?php esc_html_e( $atts['description'], 'wpip' ); ?></span>
<?php endif; ?>