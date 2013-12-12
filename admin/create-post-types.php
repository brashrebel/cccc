<?php
/*------------------------------
Setup casters post type
------------------------------*/
add_action( 'init', 'register_cpt_caster' );

function register_cpt_caster() {

    $labels = array( 
        'name' => _x( 'Casters', 'caster' ),
        'singular_name' => _x( 'caster', 'caster' ),
        'add_new' => _x( 'Add New', 'caster' ),
        'add_new_item' => _x( 'Add New caster', 'caster' ),
        'edit_item' => _x( 'Edit caster', 'caster' ),
        'new_item' => _x( 'New caster', 'caster' ),
        'view_item' => _x( 'View caster', 'caster' ),
        'search_items' => _x( 'Search casters', 'caster' ),
        'not_found' => _x( 'No casters found', 'caster' ),
        'not_found_in_trash' => _x( 'No casters found in Trash', 'caster' ),
        'parent_item_colon' => _x( 'Parent caster:', 'caster' ),
        'menu_name' => _x( 'Casters', 'caster' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Here are all of your casters.',
        'supports' => array( 'title', 'editor' ),
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

    register_post_type( 'casters', $args );
}

function change_caster_title( $title ){
     $screen = get_current_screen();
     if  ( 'caster' == $screen->post_type ) {
          $title = 'Enter title of caster';
     }
     return $title;
}
add_filter( 'enter_title_here', 'change_caster_title' );

/*------------------------------
Setup wheels post type
------------------------------*/
add_action( 'init', 'register_cpt_wheel' );

function register_cpt_wheel() {

    $labels = array( 
        'name' => _x( 'wheels', 'wheel' ),
        'singular_name' => _x( 'wheel', 'wheel' ),
        'add_new' => _x( 'Add New', 'wheel' ),
        'add_new_item' => _x( 'Add New wheel', 'wheel' ),
        'edit_item' => _x( 'Edit wheel', 'wheel' ),
        'new_item' => _x( 'New wheel', 'wheel' ),
        'view_item' => _x( 'View wheel', 'wheel' ),
        'search_items' => _x( 'Search wheels', 'wheel' ),
        'not_found' => _x( 'No wheels found', 'wheel' ),
        'not_found_in_trash' => _x( 'No wheels found in Trash', 'wheel' ),
        'parent_item_colon' => _x( 'Parent wheel:', 'wheel' ),
        'menu_name' => _x( 'Wheels', 'wheel' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Here are all of your wheels.',
        'supports' => array( 'title', 'editor' ),
        'taxonomies' => array( 'post_tag' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 55,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'wheels', $args );
}

function change_wheel_title( $title ){
     $screen = get_current_screen();
     if  ( 'wheel' == $screen->post_type ) {
          $title = 'Enter title of wheel';
     }
     return $title;
}
add_filter( 'enter_title_here', 'change_wheel_title' );

?>