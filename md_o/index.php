<?php
/**
 * MPW Data: Ortsteile
 *
 * @link              https://marvinpoo.dev/
 * @since             0.0.1
 * @package           md_ot
 * @copyright         2019 Marvin Borisch
 * @author            Marvin Borisch
 * @license           GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       MPW Data: Ortsteile
 * Plugin URI:        https://mpw-immobilien.de/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           0.0.1
 * Author:            Marvin Borisch
 * Author URI:        https://marvinpoo.dev/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       md_ot
 */
 add_action('admin_head', 'mdo_custom_menu');
 function mdo_custom_menu() {
   echo '
   <style type="text/css">
   #toplevel_page_bezirke {
    background-color: #bd1101 !important;
   }
   #toplevel_page_bezirke .wp-menu-name {
     font-weight: 600 !important;
   }
   #toplevel_page_bezirke:hover, #adminmenu li#toplevel_page_bezirke:hover, #adminmenu li.opensub>a#toplevel_page_bezirke, #adminmenu li>a#toplevel_page_bezirkep:focus, a#toplevel_page_bezirke.opensub {
    background-color: #a70e00 !important;
   }
   #toplevel_page_bezirke:hover, #adminmenu li#toplevel_page_bezirke:hover, #adminmenu li.opensub>a#toplevel_page_bezirke, #adminmenu li>a#toplevel_page_bezirke:focus, #toplevel_page_bezirke a.menu-top:focus, #toplevel_page_bezirke a.menu-top:hover, #adminmenu li#toplevel_page_bezirke.opensub>a.menu-top {
    background-color: #a70e00 !important;
   }
   #adminmenu li#toplevel_page_bezirke a:focus div.wp-menu-image:before,
   #adminmenu li#toplevel_page_bezirke.opensub div.wp-menu-image:before,
   #adminmenu li#toplevel_page_bezirke:hover div.wp-menu-image:before {
     color: #ffffff;
   }
   #toplevel_page_bezirke a, #adminmenu li#toplevel_page_bezirke a, #adminmenu li.opensub>a#toplevel_page_bezirke a, a#toplevel_page_bezirke.opensub a {
     color: #ffffff;
   }
   #toplevel_page_bezirke a:hover, #adminmenu li#toplevel_page_bezirke a:hover, #adminmenu li.opensub>a#toplevel_page_bezirke a:hover, a#toplevel_page_bezirke.opensub a:hover {
     color: #ffffff;
   }
   #toplevel_page_bezirke .wp-first-item {
     font-weight: 700;
     color: #ced6ff !important;
   }
   #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
     background-color: #223180;
   }
   #adminmenu .awaiting-mod, #adminmenu .update-plugins, .yoast-issue-counter {
     background-color: #bd1101 !important;
   }
   #update-nag, .update-nag {
     border-left: 2px solid #bd1101 !important;
   }
   a {
     color: #223180;
   }
   a:hover {
     color: #011b50;
   }
   </style>
   ';
 }

 if ( ! function_exists('cpt_mdo_seite') ) {

 // Register Custom Post Type
 function cpt_mdo_seite() {

 	$labels = array(
 		'name'                  => _x( 'Bezirksseiten', 'Post Type General Name', 'md_o' ),
 		'singular_name'         => _x( 'Bezirksseite', 'Post Type Singular Name', 'md_o' ),
 		'menu_name'             => __( 'Bezirksseiten', 'md_o' ),
 		'name_admin_bar'        => __( 'Bezirksseiten', 'md_o' ),
 		'archives'              => __( 'Bezirksseite Archiv', 'md_o' ),
 		'attributes'            => __( 'Bezirksseite Attribute', 'md_o' ),
 		'parent_item_colon'     => __( 'Hauptbezirk', 'md_o' ),
 		'all_items'             => __( 'Alle Bezirke', 'md_o' ),
 		'add_new_item'          => __( 'Neuen Bezirk anlegen', 'md_o' ),
 		'add_new'               => __( 'Neuer Bezirk', 'md_o' ),
 		'new_item'              => __( 'Neuer Bezirk', 'md_o' ),
 		'edit_item'             => __( 'Bezirk bearbeiten', 'md_o' ),
 		'update_item'           => __( 'Bezirk aktualisieren', 'md_o' ),
 		'view_item'             => __( 'Bezirk ansehen', 'md_o' ),
 		'view_items'            => __( 'Bezirke ansehen', 'md_o' ),
 		'search_items'          => __( 'Bezirk Suchen', 'md_o' ),
 		'not_found'             => __( 'Nicht gefunden', 'md_o' ),
 		'not_found_in_trash'    => __( 'Nicht im papierkorb gefunden', 'md_o' ),
 		'featured_image'        => __( 'Bezirksbild', 'md_o' ),
 		'set_featured_image'    => __( 'Bezirksbild festlegen', 'md_o' ),
 		'remove_featured_image' => __( 'Bezirksbild entfernen', 'md_o' ),
 		'use_featured_image'    => __( 'Als Bezriksbild setzen', 'md_o' ),
 		'insert_into_item'      => __( 'In Bezirk einfügen', 'md_o' ),
 		'uploaded_to_this_item' => __( 'Am bezirk angeheftet', 'md_o' ),
 		'items_list'            => __( 'Bezirksliste', 'md_o' ),
 		'items_list_navigation' => __( 'Bezrikslistennavigation', 'md_o' ),
 		'filter_items_list'     => __( 'Bezirke filtern', 'md_o' ),
 	);
 	$args = array(
 		'label'                 => __( 'Bezirksseite', 'md_o' ),
 		'description'           => __( 'Bezirksseite', 'md_o' ),
 		'labels'                => $labels,
 		'supports'              => array( 'title', 'editor' ),
 		'taxonomies'            => array( 'category', 'post_tag' ),
 		'hierarchical'          => false,
 		'public'                => true,
 		'show_ui'               => true,
    'show_in_menu'          => 'bezirke.php',
    'menu_icon'             => 'dashicons-location',
 		'menu_position'         => 1,
 		'show_in_admin_bar'     => true,
 		'show_in_nav_menus'     => true,
 		'can_export'            => true,
 		'has_archive'           => false,
 		'exclude_from_search'   => false,
 		'publicly_queryable'    => true,
 		'capability_type'       => 'page',
 		'show_in_rest'          => true,
 	);
 	register_post_type( 'bezirksseite', $args );

 }
 add_action( 'init', 'cpt_mdo_seite', 0 );

 }

if ( ! function_exists('cpt_mdo_lagetext') ) {
 function cpt_mdo_lagetext() {

 	$labels = array(
 		'name'                  => _x( 'Lagtexte', 'Post Type General Name', 'md_o' ),
 		'singular_name'         => _x( 'Lagetext', 'Post Type Singular Name', 'md_o' ),
 		'menu_name'             => __( 'Lagetexte', 'md_o' ),
 		'name_admin_bar'        => __( 'Lagetexte', 'md_o' ),
 		'archives'              => __( 'Archiv', 'md_o' ),
 		'attributes'            => __( 'Attribute', 'md_o' ),
 		'parent_item_colon'     => __( 'Übergeordneter Text', 'md_o' ),
 		'all_items'             => __( 'Lage', 'md_o' ),
 		'add_new_item'          => __( 'Hinzufügen', 'md_o' ),
 		'add_new'               => __( 'Hinzufügen', 'md_o' ),
 		'new_item'              => __( 'Hinzufügen', 'md_o' ),
 		'edit_item'             => __( 'Bearbeiten', 'md_o' ),
 		'update_item'           => __( 'Aktualisieren', 'md_o' ),
 		'view_item'             => __( 'Ansehen', 'md_o' ),
 		'view_items'            => __( 'Ansehen', 'md_o' ),
 		'search_items'          => __( 'Suchen', 'md_o' ),
 		'not_found'             => __( 'Nicht gefunden', 'md_o' ),
 		'not_found_in_trash'    => __( 'Nichts im Papierkorb', 'md_o' ),
 		'featured_image'        => __( 'Bild', 'md_o' ),
 		'set_featured_image'    => __( 'Bild setzen', 'md_o' ),
 		'remove_featured_image' => __( 'Bild entfernen', 'md_o' ),
 		'use_featured_image'    => __( 'Als Bild nutzen', 'md_o' ),
 		'insert_into_item'      => __( 'In Text einfügen', 'md_o' ),
 		'uploaded_to_this_item' => __( 'Zum Text hochladen', 'md_o' ),
 		'items_list'            => __( 'Liste', 'md_o' ),
 		'items_list_navigation' => __( 'Listennavigation', 'md_o' ),
 		'filter_items_list'     => __( 'Texte Filtern', 'md_o' ),
 	);
 	$args = array(
 		'label'                 => __( 'Lagetext', 'md_o' ),
 		'description'           => __( 'Lagetext für Bezirke', 'md_o' ),
 		'labels'                => $labels,
 		'supports'              => array( 'title', 'editor' ),
 		'hierarchical'          => false,
 		'public'                => true,
 		'show_ui'               => true,
 		'show_in_menu'          => 'bezirke.php',
 		'menu_position'         => 2,
 		'show_in_admin_bar'     => true,
 		'show_in_nav_menus'     => true,
 		'can_export'            => true,
 		'has_archive'           => true,
 		'exclude_from_search'   => true,
 		'publicly_queryable'    => true,
 		'capability_type'       => 'page',
 		'show_in_rest'          => true,
 	);
 	register_post_type( 'mdo_lagetext', $args );

 }
 add_action( 'init', 'cpt_mdo_lagetext', 0 );
}

if ( ! function_exists('cpt_mdo_geschichte') ) {
function cpt_mdo_geschichte() {

	$labels = array(
		'name'                  => _x( 'Geschichte', 'Post Type General Name', 'md_o' ),
		'singular_name'         => _x( 'Geschichte', 'Post Type Singular Name', 'md_o' ),
		'menu_name'             => __( 'Geschichte', 'md_o' ),
		'name_admin_bar'        => __( 'Geschichte', 'md_o' ),
		'archives'              => __( 'Archiv', 'md_o' ),
		'attributes'            => __( 'Attribute', 'md_o' ),
		'parent_item_colon'     => __( 'Übergeordneter Text', 'md_o' ),
		'all_items'             => __( 'Geschichten', 'md_o' ),
		'add_new_item'          => __( 'Hinzufügen', 'md_o' ),
		'add_new'               => __( 'Hinzufügen', 'md_o' ),
		'new_item'              => __( 'Hinzufügen', 'md_o' ),
		'edit_item'             => __( 'Bearbeiten', 'md_o' ),
		'update_item'           => __( 'Aktualisieren', 'md_o' ),
		'view_item'             => __( 'Ansehen', 'md_o' ),
		'view_items'            => __( 'Ansehen', 'md_o' ),
		'search_items'          => __( 'Suchen', 'md_o' ),
		'not_found'             => __( 'Nicht gefunden', 'md_o' ),
		'not_found_in_trash'    => __( 'Nichts im Papierkorb', 'md_o' ),
		'featured_image'        => __( 'Bild', 'md_o' ),
		'set_featured_image'    => __( 'Bild setzen', 'md_o' ),
		'remove_featured_image' => __( 'Bild entfernen', 'md_o' ),
		'use_featured_image'    => __( 'Als Bild nutzen', 'md_o' ),
		'insert_into_item'      => __( 'In Text einfügen', 'md_o' ),
		'uploaded_to_this_item' => __( 'Zum Text hochladen', 'md_o' ),
		'items_list'            => __( 'Liste', 'md_o' ),
		'items_list_navigation' => __( 'Listennavigation', 'md_o' ),
		'filter_items_list'     => __( 'Texte Filtern', 'md_o' ),
	);
	$args = array(
		'label'                 => __( 'Geschichte', 'md_o' ),
		'description'           => __( 'Geschichte für Bezirke', 'md_o' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => 'bezirke.php',
		'menu_position'         => 4,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'mdo_geschichte', $args );

}
add_action( 'init', 'cpt_mdo_geschichte', 0 );
}

if ( ! function_exists('cpt_mdo_soziales') ) {
function cpt_mdo_soziales() {

	$labels = array(
		'name'                  => _x( 'Soziales', 'Post Type General Name', 'md_o' ),
		'singular_name'         => _x( 'Soziales', 'Post Type Singular Name', 'md_o' ),
		'menu_name'             => __( 'Soziales', 'md_o' ),
		'name_admin_bar'        => __( 'Soziales', 'md_o' ),
		'archives'              => __( 'Archiv', 'md_o' ),
		'attributes'            => __( 'Attribute', 'md_o' ),
		'parent_item_colon'     => __( 'Übergeordneter Text', 'md_o' ),
		'all_items'             => __( 'Soziales', 'md_o' ),
		'add_new_item'          => __( 'Hinzufügen', 'md_o' ),
		'add_new'               => __( 'Hinzufügen', 'md_o' ),
		'new_item'              => __( 'Hinzufügen', 'md_o' ),
		'edit_item'             => __( 'Bearbeiten', 'md_o' ),
		'update_item'           => __( 'Aktualisieren', 'md_o' ),
		'view_item'             => __( 'Ansehen', 'md_o' ),
		'view_items'            => __( 'Ansehen', 'md_o' ),
		'search_items'          => __( 'Suchen', 'md_o' ),
		'not_found'             => __( 'Nicht gefunden', 'md_o' ),
		'not_found_in_trash'    => __( 'Nichts im Papierkorb', 'md_o' ),
		'featured_image'        => __( 'Bild', 'md_o' ),
		'set_featured_image'    => __( 'Bild setzen', 'md_o' ),
		'remove_featured_image' => __( 'Bild entfernen', 'md_o' ),
		'use_featured_image'    => __( 'Als Bild nutzen', 'md_o' ),
		'insert_into_item'      => __( 'In Text einfügen', 'md_o' ),
		'uploaded_to_this_item' => __( 'Zum Text hochladen', 'md_o' ),
		'items_list'            => __( 'Liste', 'md_o' ),
		'items_list_navigation' => __( 'Listennavigation', 'md_o' ),
		'filter_items_list'     => __( 'Texte Filtern', 'md_o' ),
	);
	$args = array(
		'label'                 => __( 'Soziales', 'md_o' ),
		'description'           => __( 'Soziales für Bezirke', 'md_o' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => 'bezirke.php',
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'mdo_soziales', $args );

}
add_action( 'init', 'cpt_mdo_soziales', 0 );
}


function bezirksdaten_menu() {
  add_menu_page( 'Bezirksdaten', 'Bezirke', 'manage_options', 'bezirke.php', 'bezirk_menu_function', 'dashicons-location-alt', 5);
  // add_submenu_page() if you want subpages, but not necessary
}
add_action('admin_menu', 'bezirksdaten_menu');


if ( ! function_exists( 'bezirk_connect' ) ) {

// Register Custom Taxonomy
function bezirk_connect() {

	$labels = array(
		'name'                       => _x( 'Bezirke', 'Taxonomy General Name', 'md_o' ),
		'singular_name'              => _x( 'Bezirk', 'Taxonomy Singular Name', 'md_o' ),
		'menu_name'                  => __( 'Bezirke', 'md_o' ),
		'all_items'                  => __( 'Alle Bezirke', 'md_o' ),
		'parent_item'                => __( 'Übergeordnet', 'md_o' ),
		'parent_item_colon'          => __( 'Übergeordnet:', 'md_o' ),
		'new_item_name'              => __( 'Neuer Bezirk', 'md_o' ),
		'add_new_item'               => __( 'Neuer Bezirk', 'md_o' ),
		'edit_item'                  => __( 'Bezirk Ändern', 'md_o' ),
		'update_item'                => __( 'Bezirk aktualisieren', 'md_o' ),
		'view_item'                  => __( 'Bezirk ansehen', 'md_o' ),
		'separate_items_with_commas' => __( 'mit Komma trennen', 'md_o' ),
		'add_or_remove_items'        => __( 'Hinzufügen oder entfernen', 'md_o' ),
		'choose_from_most_used'      => __( 'Meistgenutzt', 'md_o' ),
		'popular_items'              => __( 'Beliebt', 'md_o' ),
		'search_items'               => __( 'suchen', 'md_o' ),
		'not_found'                  => __( 'nicht gefunden', 'md_o' ),
		'no_terms'                   => __( 'keine Bezirke', 'md_o' ),
		'items_list'                 => __( 'Bezirksliste', 'md_o' ),
		'items_list_navigation'      => __( 'Bezirkslistennavigation', 'md_o' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
    'show_in_menu'               => 'bezirke.php',
		'menu_position'              => 7,
		'show_in_admin_bar'          => true,
		'show_in_nav_menus'          => true,
		'show_admin_column'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'Bezirk', array( 'mdo_lagetext', ' mdo_geschichte', ' mdo_soziales' ), $args );

}
add_action( 'init', 'bezirk_connect', 0 );

}

 ?>
