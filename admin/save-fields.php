<?php
add_action( 'save_post', 'casters_meta_box_save' );  
function casters_meta_box_save( $post_id ) {  
    // Bail if we're doing an auto save  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
     
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return; 
     
    // if our current user can't edit this post, bail  
    if( !current_user_can( 'edit_post' ) ) return;  
     // now we can actually save the data  
    $allowed = array(   
        'div' => array( //allow div tags  
            'class' => array()
        ),
        'p' => array( //allow p tags  
            'class' => array()
        ),
        'span' => array(  
            'class' => array(),
            'style' => array()
            ),
        'a' => array( //allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )  
    );  
      
    // Make sure your data is set before trying to save it  
    if( isset( $_POST['cccc_img'] ) )  
        update_post_meta( $post_id, 'cccc_img', wp_kses( $_POST['cccc_img'], $allowed ) );
    if( isset( $_POST['cccc_keyword'] ) )  
        update_post_meta( $post_id, 'cccc_keyword', wp_kses( $_POST['cccc_keyword'], $allowed ) );
    if( isset( $_POST['cccc_series'] ) )  
        update_post_meta( $post_id, 'cccc_series', wp_kses( $_POST['cccc_series'], $allowed ) );
    if( isset( $_POST['cccc_tabs'] ) )  
        update_post_meta( $post_id, 'cccc_tabs', wp_kses( $_POST['cccc_tabs'], $allowed ) );
    if( isset( $_POST['cccc_table'] ) )  
        update_post_meta( $post_id, 'cccc_table', wp_kses( $_POST['cccc_table'], $allowed ) );
    if( isset( $_POST['cccc_archive_img'] ) )  
        update_post_meta( $post_id, 'cccc_archive_img', wp_kses( $_POST['cccc_archive_img'], $allowed ) ); 
    if( isset( $_POST['cccc_capacity'] ) )  
        update_post_meta( $post_id, 'cccc_capacity', wp_kses( $_POST['cccc_capacity'], $allowed ) ); 
    if( isset( $_POST['cccc_desc1'] ) )  
        update_post_meta( $post_id, 'cccc_desc1', wp_kses( $_POST['cccc_desc1'], $allowed ) ); 
    if( isset( $_POST['cccc_desc2'] ) )  
        update_post_meta( $post_id, 'cccc_desc2', wp_kses( $_POST['cccc_desc2'], $allowed ) ); 
    if( isset( $_POST['cccc_desc3'] ) )  
        update_post_meta( $post_id, 'cccc_desc3', wp_kses( $_POST['cccc_desc3'], $allowed ) ); 
    if( isset( $_POST['cccc_type_or_series'] ) )  
        update_post_meta( $post_id, 'cccc_type_or_series', wp_kses( $_POST['cccc_type_or_series'], $allowed ) ); 
}  

?>