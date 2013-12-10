<?php
//Add a menu page for options or just instructions
require_once (plugin_dir_path(__FILE__).'/admin/menu-page.php');
//Create the post types
require_once (plugin_dir_path(__FILE__).'/admin/create-post-types.php');
//Create meta boxes
require_once (plugin_dir_path(__FILE__).'/admin/meta-boxes.php');
//Create custom fields
require_once (plugin_dir_path(__FILE__).'/admin/create-fields.php');
//Save custom fields
require_once (plugin_dir_path(__FILE__).'/admin/save-fields.php');
?>