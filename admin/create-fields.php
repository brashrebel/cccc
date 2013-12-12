<?php
/*-----------------
Add casters fields
------------------*/
// Callback function to show fields in meta box
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
    <input type="button" id="meta-image-button" class="button" value="Choose or Upload Image" />
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
function wheels_box( $post ) {
        global $post;
$values = get_post_custom( $post->ID );  
$cccc_text = isset( $values['cccc_text'] ) ? esc_attr( $values['cccc_text'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>  
    <label for="cccc_text">Text input</label>  
    <input type="text" name="cccc_text" id="cccc_text" value="<?php echo $cccc_text; ?>" />
</p>
<?php
}
?>