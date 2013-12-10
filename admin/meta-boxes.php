<?php
   
$prefix = 'kjm_';

$meta_box = array(
    'id' => 'service-meta',
    'title' => 'Service details',
    'page' => 'service',
    'context' => 'normal',
    'priority' => 'high'
);


add_action('admin_menu', 'kjm_add_box');

// Add meta box
function kjm_add_box() {
    global $meta_box;
    add_meta_box($meta_box['id'], $meta_box['title'], 'kjm_service_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
    
}
    add_action('admin_enqueue_scripts', 'print_styles');
    add_action('wp_enqueue_scripts', 'print_styles');
	function print_styles() {
		global $post_type;
        if ($post_type == 'service' || is_singular('service')) :		
        wp_enqueue_style("powerbarn", plugins_url("/style.css", __FILE__), FALSE); 
		endif;
}
function wpse_80236_Colorpicker(){ 
        global $post_type;
        if ($post_type == 'service') :       
    wp_enqueue_style( 'wp-color-picker');
    wp_enqueue_script( 'wp-color-picker');
    endif;

}

add_action('admin_enqueue_scripts', 'wpse_80236_Colorpicker');
?>