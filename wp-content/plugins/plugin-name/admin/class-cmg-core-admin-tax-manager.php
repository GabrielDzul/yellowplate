<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       hola@yellowme.mx
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     yellowme <hola@yellowme.mx>
 */
class Plugin_Name_Admin_Tax_manager {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

    }
    
    /**
	 * Creates a new taxonomy for the propiedad custom post type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public static function register_taxonomy_type( $post, $arr ) {

		$properties_taxonomies = $arr;

		//var_dump($properties_taxonomies);

		foreach($properties_taxonomies as $tax){
			$opts['hierarchical']							= $tax['hierarchical'];
			//$opts['meta_box_cb'] 							= '';
			$opts['public']									= TRUE;
			$opts['query_var']								= $tax['tax_name'];
			$opts['show_admin_column'] 						= FALSE;
			$opts['show_in_nav_menus']						= TRUE;
			$opts['show_tag_cloud'] 						= TRUE;
			$opts['show_ui']								= TRUE;
			$opts['sort'] 									= '';
			//$opts['update_count_callback'] 					= '';
			$opts['capabilities']['assign_terms'] 			= 'edit_posts';
			$opts['capabilities']['delete_terms'] 			= 'manage_categories';
			$opts['capabilities']['edit_terms'] 			= 'manage_categories';
			$opts['capabilities']['manage_terms'] 			= 'manage_categories';
			$opts['labels']['add_new_item'] 				= esc_html__( "Agregar {$tax['single']}", 'cmg-core' );
			$opts['labels']['add_or_remove_items'] 			= esc_html__( "Agregar o remover {$tax['plural']}", 'cmg-core' );
			$opts['labels']['all_items'] 					= esc_html__( $tax['plural'], 'cmg-core' );
			$opts['labels']['choose_from_most_used'] 		= esc_html__( "Elegir de las {$tax['plural']} más usados", 'cmg-core' );
			$opts['labels']['edit_item'] 					= esc_html__( "Editar {$tax['single']}" , 'cmg-core');
			$opts['labels']['menu_name'] 					= esc_html__( $tax['plural'], 'cmg-core' );
			$opts['labels']['name'] 						= esc_html__( $tax['plural'], 'cmg-core' );
			$opts['labels']['new_item_name'] 				= esc_html__( "Nuevo(a) {$tax['single']}", 'cmg-core' );
			$opts['labels']['not_found'] 					= esc_html__( "No se encontrarion {$tax['plural']} ", 'cmg-core' );
			$opts['labels']['parent_item'] 					= esc_html__( "{$tax['single']} padre", 'cmg-core' );
			$opts['labels']['parent_item_colon'] 			= esc_html__( "{$tax['single']} padre:", 'cmg-core' );
			$opts['labels']['popular_items'] 				= esc_html__( "{$tax['plural']} populares", 'cmg-core' );
			$opts['labels']['search_items'] 				= esc_html__( "Buscar {$tax['plural']}", 'cmg-core' );
			$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separar {$tax['plural']} con comas", 'cmg-core' );
			$opts['labels']['singular_name'] 				= esc_html__( $tax['single'], 'cmg-core' );
			$opts['labels']['update_item'] 					= esc_html__( "Actualizar {$tax['single']}", 'cmg-core' );
			$opts['labels']['view_item'] 					= esc_html__( "Ver {$tax['single']}", 'cmg-core' );
			$opts['rewrite']['ep_mask']						= EP_NONE;
			$opts['rewrite']['hierarchical']				= FALSE;
			$opts['rewrite']['slug']						= esc_html__( strtolower( $tax['tax_name'] ), 'cmg-core' );
			$opts['rewrite']['with_front']					= FALSE;
			//$opts = apply_filters( 'property-taxonomy-options', $opts );
			
			register_taxonomy( $tax['tax_name'], $post, $opts );

		}

		
	} // new_taxonomy_type()

	/**
	 * Prevents the taxonomies being pushed to the top when selected
	 *
	 * @since    1.0.0
	 */
	public function change_taxonomy_checkbox_list_order( $args) {
		$args['checked_ontop'] = false;
        return $args;
		
	}

	

}
