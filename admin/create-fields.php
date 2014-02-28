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

function casters_info( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );  
    $cccc_series = isset( $values['cccc_series'] ) ? esc_attr( $values['cccc_series'][0] ) : '';
    $cccc_keyword = isset( $values['cccc_keyword'] ) ? esc_attr( $values['cccc_keyword'][0] ) : '';
    $cccc_tabs = isset( $values['cccc_tabs'] ) ? esc_attr( $values['cccc_tabs'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>
    <span class="description">Use this section to enter data for looking up the series table. You may use just the series (30,50,51,castershox,etc.), or just the keyword (Dual Wheel, Flanged Wheel, Heavy Duty), or a combination of both.</span><br/>
    <span class="description">In order to look up the series and/or keyword, please log in as an admin (not through wordpress, through the configurator) and select either "Key Words" or "Series Codes" from the "Super User Menu". From here you can view and search for series codes and/or keywords. <strong>If using a keyword it must be the keyword code, not the keyword itself. Example: For Dual Wheel, input "DW".</strong></span><br/>
    <label for="cccc_series">Enter the series</label><br/>
    <input style="width:250px;" type="text" name="cccc_series" id="cccc_series" value="<?php echo $cccc_series; ?>" /><br/>
    <label for="cccc_keyword">Enter the keyword</label><br/>
    <input style="width:250px;" type="text" name="cccc_keyword" id="cccc_keyword" value="<?php echo $cccc_keyword; ?>" /><br/>
    <label for="cccc_tabs">Show tabs?</label>
    <input type="hidden" name="cccc_tabs" value="0">
    <input type="checkbox" name="cccc_tabs" id="cccc_tabs" <?php checked($cccc_tabs); ?> value="1" /><br/>
    <span class="description">If checked, tabs will show. Otherwise, they won't.</span>
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
    <label for="cccc_capacity">Enter the capicity for the Caster (in lbs)</label><br/>
    <input type="text" name="cccc_capacity" id="cccc_capacity" value="<?php echo $cccc_capacity; ?>" /><br/>
    <span class="description">Whatever format desired. Standard would be with comma (##,###).
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
    <?php media_uploader('cccc_img', $cccc_img); ?>
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
    <?php media_uploader('cccc_archive_img', $cccc_archive_img); ?>
    <span class="description">Image to display on wheel archive page.<br/>
        Needs to be in "jpg" format<br/>
        Minimum resolution: 400px
        Needs to have exactly square aspect ratio (1:1)</span>
</p>
<?php
}

// For image uploader
function cccc_media_uploader_script() {
    // Registers and enqueues the required javascript.
    wp_register_script( 'meta-box-image', plugins_url( '../js/meta-box-img.js', __FILE__ ), array( 'jquery' ) );
    wp_localize_script( 'meta-box-image', 'meta_image',
        array(
            'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
            'button' => __( 'Use this image', 'prfx-textdomain' ),            
        )
    );
    wp_enqueue_script( 'meta-box-image' );
}
add_action( 'admin_enqueue_scripts', 'cccc_media_uploader_script' );

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
    <input type="text" name="cccc_capacity" id="cccc_capacity" value="<?php echo $cccc_capacity; ?>" /><br/>
    <span class="description">Whatever format desired. Standard would be with comma (##,###).
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
    <?php media_uploader('cccc_img', $cccc_img); ?>
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
    <?php media_uploader('cccc_archive_img', $cccc_archive_img); ?>
    <span class="description">Image to display on wheel archive page.<br/>
        Needs to be in "jpg" format<br/>
        Minimum resolution: 400px
        Needs to have exactly square aspect ratio (1:1)</span>
</p>
<?php
}

function media_uploader($meta_name, $meta_value){
    $image = wp_get_attachment_image_src($meta_value, 'thumb'); ?>
    <div class="media-upload">
        <img class="preview" src="<?php echo $image[0]; ?>" />
        <div style="clear:both;"></div>
        <input type="hidden" class="media" name="<?php echo $meta_name; ?>" id="<?php echo $meta_name; ?>" value="<?php echo $meta_value; ?>" />
        <input type="button" class="button" value="Choose or Upload Image" onclick="media_uploader(this)" /><br/>
    </div>
<?php }