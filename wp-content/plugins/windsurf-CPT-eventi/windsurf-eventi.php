<?php


/* 
Plugin Name: CPT Eventi
Version: 1.0
Description: Genera un custom post type per gli eventi
Author: Marco Cerilli
Author URI: https://example.com             
*/

function windsurf_eventi()  // Register Custom Post Type for Events (Change "eventi" to the name you want) 	 	
{

    $labels = array(   // Definiamo i nomi dei vari elementi del menu
        'name'                  => _x('eventi', 'Post Type General Name', 'windsurf'),
        'singular_name'         => _x('evento', 'Post Type Singular Name', 'windsurf'),
        'menu_name'             => __('Eventi', 'windsurf'),
        'name_admin_bar'        => __('Eventi', 'windsurf'),
        'archives'              => __('Archivio eventi', 'windsurf'),
        'attributes'            => __('Item Attributes', 'windsurf'),
        'parent_item_colon'     => __('Eventi Padre', 'windsurf'),
        'all_items'             => __('Tutti gli eventi', 'windsurf'),
        'add_new_item'          => __('Aggiungi evento', 'windsurf'),
        'add_new'               => __('Add New', 'windsurf'),
        'new_item'              => __('Nuovo evento', 'windsurf'),
        'edit_item'             => __('edita evento', 'windsurf'),
        'update_item'           => __('aggiorna evento', 'windsurf'),
        'view_item'             => __('Visualizza evento', 'windsurf'),
        'view_items'            => __('Visualizza eventi', 'windsurf'),
        'search_items'          => __('Cerca eventi', 'windsurf'),
        'not_found'             => __('Evento non trovato', 'windsurf'),
        'not_found_in_trash'    => __('Non presente nel cestino', 'windsurf'),
        'featured_image'        => __('immagine in evidenza', 'windsurf'),
        'set_featured_image'    => __('Configura img in evidenza', 'windsurf'),
        'remove_featured_image' => __('Rimuovi img in evidenza', 'windsurf'),
        'use_featured_image'    => __('Utilizza img in evidenza', 'windsurf'),
        'insert_into_item'      => __('Aggiungi ad evento', 'windsurf'),
        'uploaded_to_this_item' => __('Aggiornato a questo evento', 'windsurf'),
        'items_list'            => __('Lista eventi', 'windsurf'),
        'items_list_navigation' => __('Lista eventi', 'windsurf'),
        'filter_items_list'     => __('Filtra lista eventi', 'windsurf'),
    );
    $args = array(
        'label'                 => __('evento', 'windsurf'),
        'description'           => __('Eventi di windsurf', 'windsurf'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions'),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-calendar-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('eventi', $args); // Aggiunta custom post type per gli eventi  			 
}
add_action('init', 'windsurf_eventi', 0); // Aggiunta custom post type per gli eventi  
