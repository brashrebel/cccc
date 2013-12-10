<?php
//Create the post types
require_once (plugin_dir_path(__FILE__).'create-post-types.php');
//Add a menu page for options or just instructions
require_once (plugin_dir_path(__FILE__).'menu-page.php');
//Create meta boxes
require_once (plugin_dir_path(__FILE__).'meta-boxes.php');
//Create custom fields
require_once (plugin_dir_path(__FILE__).'create-fields.php');
//Save custom fields
require_once (plugin_dir_path(__FILE__).'save-fields.php');
?>