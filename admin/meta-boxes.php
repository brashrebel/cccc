<?php
   
$prefix = 'cc_';

/*-----------------
Add casters meta boxes
------------------*/

// Image for single page
$casters_meta_img = array(
    'id' => 'casters-img',
    'title' => 'Caster Image<b style="color:#f00;">*</b>',
    'page' => 'casters',
    'context' => 'side',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'casters_meta_img' );

function casters_meta_img( $post ) {
    global $casters_meta_img;
    add_meta_box($casters_meta_img['id'], $casters_meta_img['title'], 'casters_img', $casters_meta_img['page'], $casters_meta_img['context'], $casters_meta_img['priority']);
}

// Image for archive page
$casters_meta_archive_img = array(
    'id' => 'casters-archive-img',
    'title' => 'Caster Image for Archive Page<b style="color:#f00;">*</b>',
    'page' => 'casters',
    'context' => 'side',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'casters_meta_archive_img' );

function casters_meta_archive_img( $post ) {
    global $casters_meta_archive_img;
    add_meta_box($casters_meta_archive_img['id'], $casters_meta_archive_img['title'], 'casters_archive_img', $casters_meta_archive_img['page'], $casters_meta_archive_img['context'], $casters_meta_archive_img['priority']);
}

// Series
$casters_meta_info = array(
    'id' => 'casters-info',
    'title' => 'Caster Table Lookup<b style="color:#f00;">*</b>',
    'page' => 'casters',
    'context' => 'normal',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'casters_meta_info' );

function casters_meta_info( $post ) {
    global $casters_meta_info;
    add_meta_box($casters_meta_info['id'], $casters_meta_info['title'], 'casters_info', $casters_meta_info['page'], $casters_meta_info['context'], $casters_meta_info['priority']);
}

// Type or Series
$casters_meta_type_or_series = array(
    'id' => 'casters-type-or-series',
    'title' => 'Caster Type or Series<b style="color:#f00;">*</b>',
    'page' => 'casters',
    'context' => 'side',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'casters_meta_type_or_series' );

function casters_meta_type_or_series( $post ) {
    global $casters_meta_type_or_series;
    add_meta_box($casters_meta_type_or_series['id'], $casters_meta_type_or_series['title'], 'casters_type_or_series', $casters_meta_type_or_series['page'], $casters_meta_type_or_series['context'], $casters_meta_type_or_series['priority']);
}

// Description
$casters_meta_description = array(
    'id' => 'casters-description',
    'title' => 'Caster Description<b style="color:#f00;">*</b>',
    'page' => 'casters',
    'context' => 'normal',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'casters_meta_description' );

function casters_meta_description( $post ) {
    global $casters_meta_description;
    add_meta_box($casters_meta_description['id'], $casters_meta_description['title'], 'casters_description', $casters_meta_description['page'], $casters_meta_description['context'], $casters_meta_description['priority']);
}

// Capacity
$casters_meta_capacity = array(
    'id' => 'casters-capacity',
    'title' => 'Caster Capacity<b style="color:#f00;">*</b>',
    'page' => 'casters',
    'context' => 'normal',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'casters_meta_capacity' );

function casters_meta_capacity( $post ) {
    global $casters_meta_capacity;
    add_meta_box($casters_meta_capacity['id'], $casters_meta_capacity['title'], 'casters_capacity', $casters_meta_capacity['page'], $casters_meta_capacity['context'], $casters_meta_capacity['priority']);
}

/*-----------------
Add wheels meta box
------------------*/
// Image for single page
$wheels_meta_img = array(
    'id' => 'wheels-img',
    'title' => 'Wheel Image<b style="color:#f00;">*</b>',
    'page' => 'wheels',
    'context' => 'side',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'wheels_meta_img' );

function wheels_meta_img( $post ) {
    global $wheels_meta_img;
    add_meta_box($wheels_meta_img['id'], $wheels_meta_img['title'], 'wheels_img', $wheels_meta_img['page'], $wheels_meta_img['context'], $wheels_meta_img['priority']);
}

// Image for archive page
$wheels_meta_archive_img = array(
    'id' => 'wheels-archive-img',
    'title' => 'Wheel Image for Archive Page<b style="color:#f00;">*</b>',
    'page' => 'wheels',
    'context' => 'side',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'wheels_meta_archive_img' );

function wheels_meta_archive_img( $post ) {
    global $wheels_meta_archive_img;
    add_meta_box($wheels_meta_archive_img['id'], $wheels_meta_archive_img['title'], 'wheels_archive_img', $wheels_meta_archive_img['page'], $wheels_meta_archive_img['context'], $wheels_meta_archive_img['priority']);
}

// Table
$wheels_meta_table = array(
    'id' => 'wheels-table',
    'title' => 'Wheel Table<b style="color:#f00;">*</b>',
    'page' => 'wheels',
    'context' => 'side',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'wheels_meta_table' );

function wheels_meta_table( $post ) {
    global $wheels_meta_table;
    add_meta_box($wheels_meta_table['id'], $wheels_meta_table['title'], 'wheels_table', $wheels_meta_table['page'], $wheels_meta_table['context'], $wheels_meta_table['priority']);
}

// Description
$wheels_meta_description = array(
    'id' => 'wheels-description',
    'title' => 'Wheel Description<b style="color:#f00;">*</b>',
    'page' => 'wheels',
    'context' => 'normal',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'wheels_meta_description' );

function wheels_meta_description( $post ) {
    global $wheels_meta_description;
    add_meta_box($wheels_meta_description['id'], $wheels_meta_description['title'], 'wheels_description', $wheels_meta_description['page'], $wheels_meta_description['context'], $wheels_meta_description['priority']);
}

// Capacity
$wheels_meta_capacity = array(
    'id' => 'wheels-capacity',
    'title' => 'Wheel Capacity<b style="color:#f00;">*</b>',
    'page' => 'wheels',
    'context' => 'normal',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'wheels_meta_capacity' );

function wheels_meta_capacity( $post ) {
    global $wheels_meta_capacity;
    add_meta_box($wheels_meta_capacity['id'], $wheels_meta_capacity['title'], 'wheels_capacity', $wheels_meta_capacity['page'], $wheels_meta_capacity['context'], $wheels_meta_capacity['priority']);
}
?>