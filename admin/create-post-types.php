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

// Styling for the custom post type icon
add_action( 'admin_head', 'wpt_portfolio_icons' );
function wpt_portfolio_icons() {
    $file = dirname(__FILE__) . '/cccc.php';
    $plugin_path = plugin_dir_path($file);
    ?>
    <style type="text/css" media="screen">
    #menu-posts-casters .wp-menu-image {
            /*background: url(<?php echo $plugin_path; ?>/images/admin-small.png) no-repeat 6px 6px !important;*/
            background: url(http://www.race-find.com/ccdev/wp-content/plugins/cccc/images/admin-small.png) no-repeat -19px 3px !important;
        }
    #menu-posts-casters:hover .wp-menu-image, #menu-posts-casters.wp-has-current-submenu .wp-menu-image {
            background-position:-20px -23px !important;
        }
    #icon-edit.icon32-posts-casters {
        /*background: url(<?php echo $plugin_path; ?>/images/admin-big.png) no-repeat;*/
        background: url(http://www.race-find.com/ccdev/wp-content/plugins/cccc/images/admin-big.png) no-repeat -40px -1px !important;
    }
    #menu-posts-wheels .wp-menu-image {
            /*background: url(<?php echo $plugin_path; ?>/images/admin-small.png) no-repeat 6px 6px !important;*/
            background: url(http://www.race-find.com/ccdev/wp-content/plugins/cccc/images/admin-small.png) no-repeat 6px 3px !important;
        }
    #menu-posts-wheels:hover .wp-menu-image, #menu-posts-wheels.wp-has-current-submenu .wp-menu-image {
            background-position:6px -23px !important;
        }
    #icon-edit.icon32-posts-wheels {
        /*background: url(<?php echo $plugin_path; ?>/images/admin-big.png) no-repeat;*/
        background: url(http://www.race-find.com/ccdev/wp-content/plugins/cccc/images/admin-big.png) no-repeat 2px -1px !important;
    }
    </style>
<?php }

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

?>