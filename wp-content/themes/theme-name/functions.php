<?php

include_once get_stylesheet_directory() . '/includes/Acid/acid.php';
//$acid = acid_instance();
$acid_location = get_stylesheet_directory_uri() . '/includes/'; 
$acid = acid_instance( $acid_location );


/**
*
* Create your theme options as PHP arrays
* WordPress Customizer's structure allows you to create Options that are nested in Sections, which are in turn nested in Panels
* 
* Acid uses the same structure, allowing you to nest options easily, without needing to reference the section or panel ID
* usage : echo get_theme_mod( 'mod_id', __( 'Default value', 'text-domain') );
* example echo get_theme_mod( 'facebook', __( 'Default value', 'text-domain') );
*/


$data = array (
  'panels' => 
  array (
    'contact-panel' => 
    array (
      'title' => 'Opciones de contacto',
      'description' => 'Redes sociales, teléfonos e emails',
      'sections' => 
      array (
        'socials' => 
        array (
          'title' => 'Redes sociales',
          'description' => 'Las redes sociales de la empresa',
          'options' => 
          array (
            'facebook' => 
            array (
              'label' => __( 'Facebook', 'theme-slug' ),
              'type' => 'url',
              'description' => __( 'La dirección URL de la página', 'theme-slug' ),
              'default' => '#',
            ),
            'twitter' => 
            array (
              'label' => __( 'Twitter', 'theme-slug' ),
              'type' => 'url',
              'description' => __( 'La dirección URL de la página', 'theme-slug' ),
              'default' => '#',
            ),
            'instagram' => 
            array (
              'label' => __( 'Instagram', 'theme-slug' ),
              'type' => 'url',
              'description' => __( 'La dirección URL de la página', 'theme-slug' ),
              'default' => '#',
            ),
            'pinterest' => 
            array (
              'label' => __( 'Pinterest', 'theme-slug' ),
              'type' => 'url',
              'description' => __( 'La dirección URL de la página', 'theme-slug' ),
              'default' => '#',
            ),
            'social-extra' => 
            array (
              'label' => __( 'Otra', 'theme-slug' ),
              'type' => 'url',
              'description' => __( 'La dirección URL de la página', 'theme-slug' ),
              'default' => '#',
            ),
          ),
        ),
        'tels' => 
        array (
          'title' => 'Teléfonos',
          'description' => 'Teléfonos',
          'options' => 
          array (
            'telephone-main-format' => 
            array (
              'label' => 'Teléfono con formato',
              'description' => __( 'Puede contener espacios o símbolos que ayuden a estilizar el campo', 'theme-slug' ),
              'type' => 'text',
              'default' => '#',
            ),
            'telephone-main-no-format' => 
            array (
              'label' => 'Teléfono sin formato',
              'description' => __( 'Incluir únicamente números. Sin símbolos, ni espacios.', 'theme-slug' ),
              'type' => 'text',
              'default' => '#',
            ),
          ),
        ),
        'section-mails' => 
        array (
          'title' => 'Emails',
          'description' => 'Direcciones de correos electrónicos',
          'options' => 
          array (
            'demo-email' =>
             array (
              'label' => __( 'Dirección email principal', 'theme-slug' ),
              'type' => 'email',
              'default' => get_option( 'admin_email' ),
            ),
          ),
        ),
      ),
    ),
    'g-maps-panel' => 
    array (
      'title' => 'Google maps',
      'description' => 'Google maps',
      'sections' => 
      array (
        'section-api-key' => 
        array (
          'title' => 'Api key',
          'description' => 'La key de maps API',
          'options' => 
          array (
            'maps-api-key' => 
            array (
              'label' => 'Maps API key',
              'description' => __( 'La key asignada por google maps.', 'theme-slug' ),
              'type' => 'text',
              'default' => '#',
            ),
          ),
        ),
        'section-location' => 
        array (
          'title' => 'Ubicación',
          'description' => 'La ubicación de la empresa',
          'options' => 
          array (
            'maps-lat' => 
            array (
              'label' => 'Latitud',
              'description' => __( 'El punto de latitud de la ubicación.', 'theme-slug' ),
              'type' => 'text',
              'default' => '#',
            ),
            'maps-long' => 
            array (
              'label' => 'Longitud',
              'description' => __( 'El punto de latitud de la ubicación.', 'theme-slug' ),
              'type' => 'text',
              'default' => '#',
            ),
            'maps-marker' => 
            array (
              'label' => __( 'Marcador', 'theme-slug' ),
              'description' => __( 'El ícono en el mapa', 'theme-slug' ),
              'type' => 'image',
            ),
          ),
        ),
      ),
    ),
    'logos' => 
    array (
      'title' => 'Logos',
      'description' => 'Logos del header, footer y mobile',
      'sections' => 
      array (
        'logo-header-section' => 
        array (
          'title' => 'Logo del header',
          'description' => 'Selecciona el logo a mostrar',
          'options' => 
          array (
            'logo-header' => 
            array (
              'label' => __( 'Logo header', 'theme-slug' ),
              'description' => __( 'El logo a mostrar en el header', 'theme-slug' ),
              'type' => 'image',
            ),
          ),
        ),
        'logo-header-movil-section' => 
        array (
          'title' => 'Logo responsive',
          'description' => 'Selecciona el logo a mostrar en móviles',
          'options' => 
          array (
            'logo-movile' => 
            array (
              'label' => __( 'Logo movil', 'theme-slug' ),
              'description' => __( 'El logo a mostrar en móviles', 'theme-slug' ),
              'type' => 'image',
            ),
          ),
        ),
        'logo-footer-section' => 
        array (
          'title' => 'Logo del footer',
          'description' => 'Selecciona el logo a mostrar',
          'options' => 
          array (
            'logo-footer' => 
            array (
              'label' => __( 'Logo footer', 'theme-slug' ),
              'description' => __( 'El logo a mostrar en el footer', 'theme-slug' ),
              'type' => 'image',
            ),
          ),
        ),
      ),
    ),
    'logo-admin-panel' => 
    array (
      'title' => 'Admin logo',
      'description' => 'El logo que se muestra al iniciar sesión en el administrador',
      'sections' => 
      array (
        'admin-logo-section' => 
        array (
          'title' => 'Admin logo',
          'description' => 'El logo que se muestra al iniciar sesión en el administrador',
          'options' => 
          array (
            'admin-logo' => 
            array (
              'label' => __( 'Admin logo', 'theme-slug' ),
              'description' => __( 'El logo que se muestra al iniciar sesión en el administrador', 'theme-slug' ),
              'type' => 'image',
            ),
          ),
        ),
      ),
    ),
  ),
);


$acid->config( $data );