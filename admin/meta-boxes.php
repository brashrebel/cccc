<?php
   
$prefix = 'cc_';

/*-----------------
Add casters meta boxes
------------------*/

// Image for single page
$casters_meta_img = array(
    'id' => 'casters-img',
    'title' => 'Caster Image for Single Page <small style="color:#f00;">(Required)</small>',
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
    'title' => 'Caster Image for Archive Page <small style="color:#f00;">(Required)</small>',
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
    'title' => 'Caster Table Lookup',
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
    'title' => 'Caster Type or Series <small style="color:#f00;">(Required)</small>',
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
    'title' => 'Caster Information <small style="color:#f00;">(Required)</small>',
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
    'title' => 'Caster Capacity <small style="color:#f00;">(Required)</small>',
    'page' => 'casters',
    'context' => 'normal',
    'priority' => 'default'
);

/*-----------------
Add wheels meta box
------------------*/
// Image for single page
$wheels_meta_img = array(
    'id' => 'wheels-img',
    'title' => 'Wheel Image for Single Page<small style="color:#f00;">(Required)</small>',
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
    'title' => 'Wheel Image for Archive Page <small style="color:#f00;">(Required)</small>',
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
    'title' => 'Wheel Table <small style="color:#f00;">(Required)</small>',
    'page' => 'wheels',
    'context' => 'side',
    'priority' => 'default'
);

// add_action('add_meta_boxes', 'wheels_meta_table' );

function wheels_meta_table( $post ) {
    global $wheels_meta_table;
    add_meta_box($wheels_meta_table['id'], $wheels_meta_table['title'], 'wheels_table', $wheels_meta_table['page'], $wheels_meta_table['context'], $wheels_meta_table['priority']);
}
// Series
$wheels_meta_info = array(
    'id' => 'wheels-info',
    'title' => 'Wheel Table Lookup',
    'page' => 'wheels',
    'context' => 'normal',
    'priority' => 'default'
);

add_action('add_meta_boxes', 'wheels_meta_info' );

function wheels_meta_info( $post ) {
    global $wheels_meta_info;
    add_meta_box($wheels_meta_info['id'], $wheels_meta_info['title'], 'wheels_info', $wheels_meta_info['page'], $wheels_meta_info['context'], $wheels_meta_info['priority']);
}


// Description
$wheels_meta_description = array(
    'id' => 'wheels-description',
    'title' => 'Wheel Description <small style="color:#f00;">(Required)</small>',
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
    'title' => 'Wheel Capacity <small style="color:#f00;">(Required)</small>',
    'page' => 'wheels',
    'context' => 'normal',
    'priority' => 'default'
);
?>