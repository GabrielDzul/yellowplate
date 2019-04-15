<?php

/**
 * Provides the markup for any text field
 *
 * @link       http://yellowme.mx
 * @since      1.0.0
 *
 * @package    Now_Hiring
 * @subpackage Now_Hiring/admin/partials
 */

if ( ! empty( $atts['label'] ) ) {

	?><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'cmg-core' ); ?>: </label><?php

}

?><input
	class="<?php echo esc_attr( $atts['class'] ); ?>"
	id="<?php echo esc_attr( $atts['id'] ); ?>"
	name="<?php echo esc_attr( $atts['name'] ); ?>"
	placeholder="<?php echo esc_attr( $atts['placeholder'] ); ?>"
	type="<?php echo esc_attr( $atts['type'] ); ?>"
	<?php echo ($atts['type'] === 'number' ? "step='0.01'" :  ''); ?>
	value="<?php echo esc_attr( $atts['value'] ); ?>" 
	<?php echo esc_attr( $atts['required'] ); ?> 
	<?php echo esc_attr( $atts['disabled'] ); ?> /><?php

if ( ! empty( $atts['description'] ) ) {

	?><span class="description"><?php esc_html_e( $atts['description'], 'cmg-core' ); ?></span><?php

}