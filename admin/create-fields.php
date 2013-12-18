<?php
/*-----------------
Add casters fields
------------------*/
// Callback function to show fields in meta box
function casters_type_or_series( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_type_or_series = isset( $values['cccc_type_or_series'] ) ? esc_attr( $values['cccc_type_or_series'][0] ) : 'type';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_type_or_series">Specify whether Type or Series</label><br/>
    <input type="radio" name="cccc_type_or_series" value="type" <?php echo ($cccc_type_or_series == 'type')? 'checked="checked"':''; ?>/> Type
    <input type="radio" name="cccc_type_or_series" value="series" <?php echo ($cccc_type_or_series == 'series')? 'checked="checked"':''; ?>/> Series<br/>
    <span class="description">If the caster has a series number (EG: 30 Series, 51 Series, etc.), it is classified as "Series". Otherwise, "Type".
</p>
<?php
}

function casters_description( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_desc1 = isset( $values['cccc_desc1'] ) ? esc_attr( $values['cccc_desc1'][0] ) : '';
    $cccc_desc2 = isset( $values['cccc_desc2'] ) ? esc_attr( $values['cccc_desc2'][0] ) : '';
    $cccc_desc3 = isset( $values['cccc_desc3'] ) ? esc_attr( $values['cccc_desc3'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_desc1">Enter 3 short description points</label><br/>
    <input style="width:300px;" type="text" name="cccc_desc1" id="cccc_desc1" value="<?php echo $cccc_desc1; ?>" /><br/>
    <input style="width:300px;" type="text" name="cccc_desc2" id="cccc_desc2" value="<?php echo $cccc_desc2; ?>" /><br/>
    <input style="width:300px;" type="text" name="cccc_desc3" id="cccc_desc3" value="<?php echo $cccc_desc3; ?>" />
</p>
<?php
}

function casters_series( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_series = isset( $values['cccc_series'] ) ? esc_attr( $values['cccc_series'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_series">Enter the link to the series</label>
    <input style="width:80%;" type="text" name="cccc_series" id="cccc_series" value="<?php echo $cccc_series; ?>" />
</p>
<?php
}

function casters_capacity( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_capacity = isset( $values['cccc_capacity'] ) ? esc_attr( $values['cccc_capacity'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_capacity">Enter the capcity for the Caster (in lbs)</label>
    <input type="text" name="cccc_capacity" id="cccc_capacity" value="<?php echo $cccc_capacity; ?>" />
</p>
<?php
}

function casters_img( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_img = isset( $values['cccc_img'] ) ? esc_attr( $values['cccc_img'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_img">Image</label>
    <input type="text" name="cccc_img" id="cccc_img" value="<?php if ( isset ( $cccc_img ) ) echo $cccc_img; ?>" />
    <input type="button" id="meta-image-button" class="button" value="Choose or Upload Image" /><br/>
    <span class="description">Image to display on single wheel page.<br/>
        Needs to be in "gif" format<br/>
        Minimum resolution: 250X500px
        Needs to have vertical rectangle aspect ratio (1:2)</span>
</p>
<?php
}

function casters_archive_img( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_archive_img = isset( $values['cccc_archive_img'] ) ? esc_attr( $values['cccc_archive_img'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_archive_img">Image</label>
    <input type="text" name="cccc_archive_img" id="cccc_archive_img" value="<?php if ( isset ( $cccc_archive_img ) ) echo $cccc_archive_img; ?>" />
    <input type="button" id="meta-archive-image-button" class="button" value="Choose or Upload Image" /><br/>
    <span class="description">Image to display on wheel archive page.<br/>
        Needs to be in "jpg" format<br/>
        Minimum resolution: 400px
        Needs to have exactly square aspect ratio (1:1)</span>
</p>
<?php
}

// For image uploader
function prfx_image_enqueue() {
    // Registers and enqueues the required javascript.
    wp_register_script( 'meta-box-image', 'http://www.race-find.com/ccdev/wp-content/plugins/cccc/js/meta-box-img.js', array( 'jquery' ) );
    wp_localize_script( 'meta-box-image', 'meta_image',
        array(
            'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
            'button' => __( 'Use this image', 'prfx-textdomain' ),            
        )
    );
    wp_enqueue_script( 'meta-box-image' );
}
add_action( 'admin_enqueue_scripts', 'prfx_image_enqueue' );

/*-----------------
Add wheels fields
------------------*/
// Callback function to show fields in meta box

function wheels_description( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_desc1 = isset( $values['cccc_desc1'] ) ? esc_attr( $values['cccc_desc1'][0] ) : '';
    $cccc_desc2 = isset( $values['cccc_desc2'] ) ? esc_attr( $values['cccc_desc2'][0] ) : '';
    $cccc_desc3 = isset( $values['cccc_desc3'] ) ? esc_attr( $values['cccc_desc3'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_desc1">Enter 3 short description points</label><br/>
    <input style="width:300px;" type="text" name="cccc_desc1" id="cccc_desc1" value="<?php echo $cccc_desc1; ?>" /><br/>
    <input style="width:300px;" type="text" name="cccc_desc2" id="cccc_desc2" value="<?php echo $cccc_desc2; ?>" /><br/>
    <input style="width:300px;" type="text" name="cccc_desc3" id="cccc_desc3" value="<?php echo $cccc_desc3; ?>" />
</p>
<?php
}

function wheels_table( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_table = isset( $values['cccc_table'] ) ? esc_attr( $values['cccc_table'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_table">Select the corresponding Tablepress ID</label>
    <input style="width:25px;" type="text" name="cccc_table" id="cccc_table" value="<?php echo $cccc_table; ?>" />
</p>
<?php
}

function wheels_capacity( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_capacity = isset( $values['cccc_capacity'] ) ? esc_attr( $values['cccc_capacity'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_capacity">Enter the capcity for the wheel (in lbs)</label>
    <input type="text" name="cccc_capacity" id="cccc_capacity" value="<?php echo $cccc_capacity; ?>" />
</p>
<?php
}

function wheels_img( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_img = isset( $values['cccc_img'] ) ? esc_attr( $values['cccc_img'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_img">Image</label>
    <input type="text" name="cccc_img" id="cccc_img" value="<?php if ( isset ( $cccc_img ) ) echo $cccc_img; ?>" />
    <input type="button" id="meta-image-button" class="button" value="Choose or Upload Image" /><br/>
    <span class="description">Image to display on single wheel page.<br/>
        Needs to be in "gif" format<br/>
        Minimum resolution: 250X500px
        Needs to have vertical rectangle aspect ratio (1:2)</span>
</p>
<?php
}

function wheels_archive_img( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_archive_img = isset( $values['cccc_archive_img'] ) ? esc_attr( $values['cccc_archive_img'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <label for="cccc_archive_img">Image</label>
    <input type="text" name="cccc_archive_img" id="cccc_archive_img" value="<?php if ( isset ( $cccc_archive_img ) ) echo $cccc_archive_img; ?>" />
    <input type="button" id="meta-archive-image-button" class="button" value="Choose or Upload Image" /><br/>
    <span class="description">Image to display on wheel archive page.<br/>
        Needs to be in "jpg" format<br/>
        Minimum resolution: 400px
        Needs to have exactly square aspect ratio (1:1)</span>
</p>
<?php
}
?>