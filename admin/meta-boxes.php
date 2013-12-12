<?php
   
$prefix = 'cc_';

/*-----------------
Add casters meta boxes
------------------*/
$casters_meta_img = array(
    'id' => 'casters-img',
    'title' => 'Caster image<b style="color:#f00;">*</b>',
    'page' => 'casters',
    'context' => 'side',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'casters_meta_img' );

function casters_meta_img( $post ) {
    global $casters_meta_img;
    add_meta_box($casters_meta_img['id'], $casters_meta_img['title'], 'casters_img', $casters_meta_img['page'], $casters_meta_img['context'], $casters_meta_img['priority']);
}

$casters_meta_series = array(
    'id' => 'casters-series',
    'title' => 'Caster series<b style="color:#f00;">*</b>',
    'page' => 'casters',
    'context' => 'normal',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'casters_meta_series' );

function casters_meta_series( $post ) {
    global $casters_meta_series;
    add_meta_box($casters_meta_series['id'], $casters_meta_series['title'], 'casters_series', $casters_meta_series['page'], $casters_meta_series['context'], $casters_meta_series['priority']);
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

add_action('add_meta_boxes', 'wheels_meta_box' );

function wheels_meta_box( $post ) {
    global $wheels_meta_box;
    add_meta_box($wheels_meta_box['id'], $wheels_meta_box['title'], 'wheels_box', $wheels_meta_box['page'], $wheels_meta_box['context'], $wheels_meta_box['priority']);
}
?>