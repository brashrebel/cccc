<?php
/*
Plugin Name: Caster Concepts Custom Content
Description: Creates and modifies Casters and Wheels post types for Caster Concepts.
Version: 1.0
Author: Kyle Maurer
Author URI: http://realbigmarketing.com/staff/kyle
*/

/*
Tutorials and recources:
When I use snippets from other developers I generally leave a link here back to where I got the code, to give
them credit for being awesome and also as a reference for myself later. Not required but recommended.
*/

require_once (plugin_dir_path(__FILE__).'/admin/admin.php');
require_once (plugin_dir_path(__FILE__).'/shortcodes.php');

wp_register_script( 'cccc_script', plugins_url( '/js/script.js', __FILE__ ),array('jquery'));
wp_register_style( 'cccc_style', plugins_url( '/stylesheets/style.css', __FILE__ ));
wp_register_style( 'cccc_admin_style', plugins_url( '/stylesheets/admin.css', __FILE__ ));

function cccc_enqueue_admin_files(){
  wp_enqueue_style('cccc_admin_style');
}
add_action('admin_enqueue_scripts', 'cccc_enqueue_admin_files');

function cccc_enqueue_files(){
  wp_enqueue_script( 'cccc_script' );
  wp_enqueue_style( 'cccc_style' );
}
add_action( 'wp_enqueue_scripts', 'cccc_enqueue_files' );