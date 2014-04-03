<?php
/*------------------------------
Setup casters post type
------------------------------*/
add_action( 'init', 'register_cpt_caster' );

function register_cpt_caster() {

    $labels = array( 
        'name' => _x( 'Casters', 'Caster' ),
        'singular_name' => _x( 'Caster', 'Caster' ),
        'add_new' => _x( 'Add New', 'Caster' ),
        'add_new_item' => _x( 'Add New Caster', 'Caster' ),
        'edit_item' => _x( 'Edit Caster', 'Caster' ),
        'new_item' => _x( 'New Caster', 'Caster' ),
        'view_item' => _x( 'View Caster', 'Caster' ),
        'search_items' => _x( 'Search Casters', 'Caster' ),
        'not_found' => _x( 'No Casters found', 'Caster' ),
        'not_found_in_trash' => _x( 'No Casters found in Trash', 'Caster' ),
        'parent_item_colon' => _x( 'Parent Caster:', 'Caster' ),
        'menu_name' => _x( 'Casters', 'Caster' ),
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
        'menu_icon' => 'dashicons-admin-generic',
        'rewrite' => array('slug' =>'casters'),
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'casters', $args );
    // flush_rewrite_rules();
}

function change_caster_title( $title ){
     $screen = get_current_screen();
     if  ( 'caster' == $screen->post_type ) {
          $title = 'Enter title of caster';
     }
     return $title;
}
add_filter( 'enter_title_here', 'change_caster_title' );

function caster_updated_messages( $messages ) {
    global $post, $post_ID;
    $messages['casters'] = array(
        0 => '', 
        1 => sprintf( __('Caster updated. <a href="%s">View Caster</a>'), esc_url( get_permalink($post_ID) ) ),
        2 => __('Custom field updated.'),
        3 => __('Custom field deleted.'),
        4 => __('Caster updated.'),
        5 => isset($_GET['revision']) ? sprintf( __('Caster restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Caster published. <a href="%s">View Caster</a>'), esc_url( get_permalink($post_ID) ) ),
        7 => __('Caster saved.'),
        8 => sprintf( __('Caster submitted. <a target="_blank" href="%s">Preview Caster</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('Caster scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Caster</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __('Caster draft updated. <a target="_blank" href="%s">Preview Caster</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );
    return $messages;
}
add_filter( 'post_updated_messages', 'caster_updated_messages' );

// Custom columns
add_filter( 'manage_edit-casters_columns', 'cccc_casters_columns' ) ;

function cccc_casters_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Caster' ),
        'type_or_series' => __( 'Series/Type' ),
        'capacity' => __( 'Capacity' ),
        'date' => __( 'Date' )
    );
    return $columns;
}

add_action( 'manage_casters_posts_custom_column', 'cccc_casters_column_content', 10, 2 );

function cccc_casters_column_content( $column, $post_id ) {
    global $post;

    switch( $column ) {
        case 'type_or_series' :
            $type_or_series = get_post_meta( $post_id, 'cccc_type_or_series', true );
            if ( empty( $type_or_series ) )
                echo __( 'Unknown' );
            else
                echo $type_or_series;
            break;

        case 'capacity' :
            $capacity = get_post_meta( $post_id, 'cccc_capacity', true );
            if ( empty( $capacity ) )
                echo __( 'Unknown' );
            else
                echo str_replace(',', '', $capacity);
            break;
        default :
            break;
    }
}

add_filter( 'manage_edit-casters_sortable_columns', 'cccc_casters_column_sortable' );

function cccc_casters_column_sortable( $columns ) {
    $columns['type_or_series'] = 'type_or_series';
    return $columns;
}

add_action( 'load-edit.php', 'cccc_casters_column_load' );

function cccc_casters_column_load() {
    add_filter( 'request', 'cccc_casters_column_sort' );
}

function cccc_casters_column_sort( $vars ) {

    if ( isset( $vars['post_type'] ) && 'casters' == $vars['post_type'] ) {

        if ( isset( $vars['orderby'] ) && 'type_or_series' == $vars['orderby'] ) {

            $vars = array_merge(
                $vars,
                array(
                    'meta_key' => 'cccc_type_or_series',
                    'orderby' => 'meta_value'
                )
            );
        }
    }
    return $vars;
}

/*------------------------------
Setup wheels post type
------------------------------*/
add_action( 'init', 'register_cpt_wheel' );

function register_cpt_wheel() {

    $labels = array( 
        'name' => _x( 'Wheels', 'Wheel' ),
        'singular_name' => _x( 'Wheel', 'Wheel' ),
        'add_new' => _x( 'Add New', 'Wheel' ),
        'add_new_item' => _x( 'Add New Wheel', 'Wheel' ),
        'edit_item' => _x( 'Edit Wheel', 'Wheel' ),
        'new_item' => _x( 'New Wheel', 'Wheel' ),
        'view_item' => _x( 'View Wheel', 'Wheel' ),
        'search_items' => _x( 'Search Wheels', 'Wheel' ),
        'not_found' => _x( 'No Wheels found', 'Wheel' ),
        'not_found_in_trash' => _x( 'No Wheels found in Trash', 'Wheel' ),
        'parent_item_colon' => _x( 'Parent Wheel:', 'Wheel' ),
        'menu_name' => _x( 'Wheels', 'Wheel' ),
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
        'menu_icon' => 'dashicons-admin-generic',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array('slug' => 'caster-wheels'),
        'capability_type' => 'post'
    );

    register_post_type( 'wheels', $args );
    // flush_rewrite_rules();
}

function change_wheel_title( $title ){
     $screen = get_current_screen();
     if  ( 'wheel' == $screen->post_type ) {
          $title = 'Enter title of wheel';
     }
     return $title;
}
add_filter( 'enter_title_here', 'change_wheel_title' );

function wheel_updated_messages( $messages ) {
    global $post, $post_ID;
    $messages['wheels'] = array(
        0 => '', 
        1 => sprintf( __('Wheel updated. <a href="%s">View Wheel</a>'), esc_url( get_permalink($post_ID) ) ),
        2 => __('Custom field updated.'),
        3 => __('Custom field deleted.'),
        4 => __('Wheel updated.'),
        5 => isset($_GET['revision']) ? sprintf( __('Wheel restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Wheel published. <a href="%s">View Wheel</a>'), esc_url( get_permalink($post_ID) ) ),
        7 => __('Wheel saved.'),
        8 => sprintf( __('Wheel submitted. <a target="_blank" href="%s">Preview Wheel</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('Wheel scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Wheel</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __('Wheel draft updated. <a target="_blank" href="%s">Preview Wheel</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );
    return $messages;
}
add_filter( 'post_updated_messages', 'wheel_updated_messages' );

// Custom columns
add_filter( 'manage_edit-wheels_columns', 'cccc_wheels_columns' ) ;

function cccc_wheels_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Caster' ),
        'capacity' => __( 'Capacity' ),
        'date' => __( 'Date' )
    );
    return $columns;
}

add_action( 'manage_wheels_posts_custom_column', 'cccc_wheels_column_content', 10, 2 );

function cccc_wheels_column_content( $column, $post_id ) {
    global $post;

    switch( $column ) {
        case 'capacity' :
            /* Get the post meta. */
            $capacity = get_post_meta( $post_id, 'cccc_capacity', true );
            /* If no capacity is found, output a default message. */
            if ( empty( $capacity ) )
                echo __( 'Unknown' );
            /* If there is a capacity, append 'minutes' to the text string. */
            else
                echo str_replace(',', '', $capacity);
            break;

        /* Just break out of the switch statement for everything else. */
        default :
            break;
    }
}