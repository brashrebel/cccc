<?php
   
$prefix = 'cc_';

/*-----------------
Add casters meta box
------------------*/
$casters_meta_box = array(
    'id' => 'casters-meta',
    'title' => 'Caster details',
    'page' => 'casters',
    'context' => 'normal',
    'priority' => 'high'
);

add_action('add_meta_boxes_page', 'casters_meta_box' );

function casters_meta_box( $post ) {
    global $casters_meta_box;
    add_meta_box($casters_meta_box['id'], $casters_meta_box['title'], 'casters_box', $casters_meta_box['page'], $casters_meta_box['context'], $casters_meta_box['priority']);
}

/*-----------------
Add wheels meta box
------------------*/
$wheels_meta_box = array(
    'id' => 'wheels-meta',
    'title' => 'Wheels details',
    'page' => 'wheels',
    'context' => 'normal',
    'priority' => 'high'
);

add_action('add_meta_boxes_page', 'wheels_meta_box' );

function wheels_meta_box( $post ) {
    global $wheels_meta_box;
    add_meta_box($wheels_meta_box['id'], $wheels_meta_box['title'], 'wheels_box', $wheels_meta_box['page'], $wheels_meta_box['context'], $wheels_meta_box['priority']);
}
?>