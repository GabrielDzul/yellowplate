<?php

/**
 * Provides the markup for any video url input
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
	value="<?php echo esc_attr( $atts['value'] ); ?>" /><?php

if ( ! empty( $atts['description'] ) ) {

	?><span class="description block m-bot"><?php esc_html_e( $atts['description'], 'cmg-core' ); ?></span><?php

}

//The video frame
if ( ! empty( $atts['value'] ) ){
    $embed_url = str_replace( 'watch?v=', 'embed/', $atts['value']  );
    ?>

    <iframe width="420" height="315"
        src="<?php echo $embed_url; ?>">
    </iframe>

    <?php
}