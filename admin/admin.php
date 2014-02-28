<?php
//Create the post types
require_once (plugin_dir_path(__FILE__).'create-post-types.php');
//Create meta boxes
require_once (plugin_dir_path(__FILE__).'meta-boxes.php');
//Create custom fields
require_once (plugin_dir_path(__FILE__).'create-fields.php');
//Save custom fields
require_once (plugin_dir_path(__FILE__).'save-fields.php');

// Better attachment image show function
if (!function_exists('the_attachment_image')){
  function the_attachment_image($id){
    $img = wp_prepare_attachment_for_js($id);
    echo '<img class= "attachment-full" src="'.$img[url].'" alt="'.$img[alt].'" title="'.$img[title].'" />';
  }
}