<?php
/**
 * Funciones helper para el tema.
 */

/**
 * Genera una <img> tag apuntando al asset deseado. Por defecto genera un srcset con el asset a @2x para pantallas
 * de alto DPI.
 *
 * @param string $asset Nombre del asset en la carpeta /assets/images/
 * @param bool $responsive Por defecto se considera que es un asset responsivo. Se puede cambiar a falso para evitarlo.
 *
 * @return string <img> tag construida.
 */
function rm_img( $asset, $responsive = true ) {
  $asset_prefix         = get_template_directory_uri() . '/dist/img/';
  $asset_url            = $asset_prefix . $asset;
  $asset_url_responsive = $asset_prefix . implode( '@2x.', explode( '.', $asset ) );

  if ( ! $responsive ) {
    return sprintf( '<img src="%s">', $asset_url );
  }

  return sprintf( '<img src="%s" srcset="%s 2x">', $asset_url, $asset_url_responsive );
}

/**
 * Genera una URL para obtener el asset deseado de la carpeta /build/
 *
 * @param string $asset Asset deseado
 *
 * @return string URL correcta para el asset deseado.
 */
function rm_get_asset_url( $asset ) {
  return get_template_directory_uri() . '/dist/' . $asset;
}