<?php

/**
 * Provides the markup for any anchor tag acting like a button
 *
 * @link       http://yellowme.mx
 * @since      1.0.0
 *
 * @package    Now_Hiring
 * @subpackage Now_Hiring/admin/partials
 */

if ( ! empty( $atts['description'] ) ) {

    ?><span class="description block m-bot"><?php esc_html_e( $atts['description'], 'cmg-core' ); ?></span><?php
    
    }
?><a
    class="button button-large <?php echo esc_attr( $atts['value'] ? 'button-primary ': 'disabled' ); ?>"
    id="link-button"
    href="<?php echo esc_attr( $atts['value'] ? $atts['value'] : '#' ); ?>"
    target="_blank"> <?php echo esc_attr( $atts['value'] ? $atts['text'] : 'N/A' ); ?> </a>

