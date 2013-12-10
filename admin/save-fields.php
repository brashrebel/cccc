<?php
add_action( 'save_post', 'kjm_meta_box_save' );  
function kjm_meta_box_save( $post_id )  
{  
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
    if( isset( $_POST['kjm_form_heading'] ) )  
        update_post_meta( $post_id, 'kjm_form_heading', wp_kses( $_POST['kjm_form_heading'], $allowed ) );  
                
    if( isset( $_POST['kjm_color'] ) )  
        update_post_meta( $post_id, 'kjm_color', $_POST['kjm_color'] );

    if( isset( $_POST['kjm_img_title'] ) )  
        update_post_meta( $post_id, 'kjm_img_title', $_POST['kjm_img_title'] );  

    if( isset( $_POST['text_color'] ) )  
        update_post_meta( $post_id, 'text_color', $_POST['text_color'] ); 

    if( isset( $_POST['kjm_img_alt'] ) )  
        update_post_meta( $post_id, 'kjm_img_alt', $_POST['kjm_img_alt'] ); 

    if( isset( $_POST['service-bg'] ) )
    update_post_meta( $post_id, 'service-bg', $_POST['service-bg'] );

// Name
if( isset( $_POST[ 'hide-name' ] ) ) {
    update_post_meta( $post_id, 'hide-name', 'yes' );
} else {
    update_post_meta( $post_id, 'hide-name', '' );
}
 
// Phone
if( isset( $_POST[ 'hide-phone' ] ) ) {
    update_post_meta( $post_id, 'hide-phone', 'yes' );
} else {
    update_post_meta( $post_id, 'hide-phone', '' );
}
// Email
if( isset( $_POST[ 'hide-email' ] ) ) {
    update_post_meta( $post_id, 'hide-email', 'yes' );
} else {
    update_post_meta( $post_id, 'hide-email', '' );
}
 
// Message
if( isset( $_POST[ 'hide-message' ] ) ) {
    update_post_meta( $post_id, 'hide-message', 'yes' );
} else {
    update_post_meta( $post_id, 'hide-message', '' );
}
}  

?>