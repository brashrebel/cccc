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

function cccc_register_files(){
  wp_register_script( 'cccc_script', plugins_url( '/js/cccc-script.js', __FILE__ ),array('jquery'), null, true);
  wp_register_style( 'cccc_style', plugins_url( '/css/cccc-style.css', __FILE__ ), array(), null);
  wp_register_style( 'cccc_admin_style', plugins_url( '/css/cccc-admin.css', __FILE__ ), array(), null);
}
add_action('init', 'cccc_register_files');

function cccc_enqueue_admin_files(){
  wp_enqueue_style('cccc_admin_style');
}
add_action('admin_enqueue_scripts', 'cccc_enqueue_admin_files');

function cccc_enqueue_files(){
  if (is_page('casters') || is_page('wheels')):
    wp_enqueue_script( 'cccc_script' );
    wp_enqueue_style( 'cccc_style' );
  endif;
}
add_action( 'wp_enqueue_scripts', 'cccc_enqueue_files' );