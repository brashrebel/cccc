<?php
/*-----------------
Add casters fields
------------------*/
// Callback function to show fields in meta box
function casters_box( $post ) {
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