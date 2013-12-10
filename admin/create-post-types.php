<?php

add_action( 'init', 'register_cpt_service' );

function register_cpt_service() {

    $labels = array( 
        'name' => _x( 'Services', 'service' ),
        'singular_name' => _x( 'Service', 'service' ),
        'add_new' => _x( 'Add New', 'service' ),
        'add_new_item' => _x( 'Add New Service', 'service' ),
        'edit_item' => _x( 'Edit Service', 'service' ),
        'new_item' => _x( 'New Service', 'service' ),
        'view_item' => _x( 'View Service', 'service' ),
        'search_items' => _x( 'Search Services', 'service' ),
        'not_found' => _x( 'No services found', 'service' ),
        'not_found_in_trash' => _x( 'No services found in Trash', 'service' ),
        'parent_item_colon' => _x( 'Parent Service:', 'service' ),
        'menu_name' => _x( 'Services', 'service' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Here are the services provided by The Power Barn.',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'post_tag' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 50,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'service', $args );
}

function change_service_title( $title ){
     $screen = get_current_screen();
     if  ( 'service' == $screen->post_type ) {
          $title = 'Enter title of service';
     }
     return $title;
}
add_filter( 'enter_title_here', 'change_service_title' );

?>