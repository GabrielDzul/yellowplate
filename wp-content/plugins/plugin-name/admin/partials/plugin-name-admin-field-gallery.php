<?php

/**
 * Provides the markup for any gallery
 *
 * @link       http://yellowme.mx
 * @since      1.0.0
 *
 * @package    Now_Hiring
 * @subpackage Now_Hiring/admin/partials
 */



 ?>
            <style type="text/css">
                
            </style>
            <div class="post_meta_extras">

                <p>
                    <?php if ( ! empty( $atts['label'] ) ) {

                        ?><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'cmg-core' ); ?>: </label><?php

                    }

                    ?>
                    <div class="separator gallery_images">
                        <?php
                        $img_array = ( isset( $atts['value'] ) && '' !== $atts['value'] ) ? explode( ',', $atts['value']) : '';
                        if ( '' !== $img_array ) {
                            foreach ( $img_array as $img ) {
                                echo '<div class="gallery-item" data-id="' . esc_attr( $img ) . '"><div class="remove">x</div>' . wp_get_attachment_image( $img ) . '</div>';
                            } 
                        }
                        ?>
                    </div>
                    <p class="separator gallery_buttons">
                        <input id="mytheme_gallery_input" type="hidden" name= "<?php echo $atts['name'] ?>" value="<?php echo esc_attr( $atts['value']); ?>" />
                        <input id="manage_gallery" title="<?php esc_html_e( 'Administrar galeria', 'mytheme' ); ?>" type="button" class="button" value="<?php esc_html_e( 'Administrar Galería', 'mytheme' ); ?>" />
                        <input id="empty_gallery" title="<?php esc_html_e( 'Eliminar galeria', 'mytheme' ); ?>" type="button" class="button" value="<?php esc_html_e( 'Eliminar Galería', 'mytheme' ); ?>" />
                    </p>
                </p>

            </div>