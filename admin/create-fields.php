<?php

// Callback function to show fields in meta box
function kjm_service_box( $post )  
{  
        global $post;
$values = get_post_custom( $post->ID );  
$text = isset( $values['kjm_form_heading'] ) ? esc_attr( $values['kjm_form_heading'][0] ) : '';  
$img_title = isset( $values['kjm_img_title'] ) ? esc_attr( $values['kjm_img_title'][0] ) : '';
$img_alt = isset( $values['kjm_img_alt'] ) ? esc_attr( $values['kjm_img_alt'][0] ) : '';
$color = isset( $values['kjm_color'] ) ? esc_attr( $values['kjm_color'][0] ) : '';
$text_color = isset( $values['text_color'] ) ? esc_attr( $values['text_color'][0] ) : '';
$hide_name = isset( $values['hide-name'] ) ? esc_attr( $values['hide-name'][0] ) : '';
$hide_phone = isset( $values['hide-phone'] ) ? esc_attr( $values['hide-phone'][0] ) : '';
$hide_email = isset( $values['hide-email'] ) ? esc_attr( $values['hide-email'][0] ) : '';
$hide_message = isset( $values['hide-message'] ) ? esc_attr( $values['hide-message'][0] ) : '';
$service_bg = isset( $values['service-bg'] ) ? esc_attr( $values['service-bg'][0] ) : '';

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
<p>  
    <label for="kjm_form_heading">Form heading</label>  
    <input type="text" name="kjm_form_heading" id="kjm_form_heading" value="<?php echo $text; ?>" />
<br/>This field accepts shortcodes as well as the following HTML tags: a, div, span, p.
        </p>

        <p>
    <h3>Hide form fields</h3>
    <div class="hide-fields">
        <label for="hide-name">
            <input type="checkbox" name="hide-name" id="hide-name" value="yes" <?php if (!empty($hide_name)) { ?>checked="checked"<?php } else { } ?> />
            Name
        </label>
        <label for="hide-phone">
            <input type="checkbox" name="hide-phone" id="hide-phone" value="yes" <?php if (!empty($hide_phone)) { ?>checked="checked"<?php } else { } ?> />
            Phone
        </label>
        <label for="hide-email">
            <input type="checkbox" name="hide-email" id="hide-email" value="yes" <?php if (!empty($hide_email)) { ?>checked="checked"<?php } else { } ?> />
            Email
        </label>
        <label for="hide-message">
            <input type="checkbox" name="hide-message" id="hide-message" value="yes" <?php if (!empty($hide_message)) { ?>checked="checked"<?php } else { } ?> />
            Message
        </label>
    </div>
</p>
        <p>
            <script type='text/javascript'>
            jQuery(document).ready(function($){
    $('#kjm_color').wpColorPicker();
    $('#text_color').wpColorPicker();
});
            </script>
Choose your content background color <input name="kjm_color" type="text" id="kjm_color" value="<?php echo $color; ?>" data-default-color="#ffffff">
        </p>
        <p>
Choose the form text color <input name="text_color" type="text" id="text_color" value="<?php echo $text_color; ?>" data-default-color="#ffffff">
        </p>
        <p> 
<?php  
    //The service images
//Get all the attachments that are service backgrounds
    $attachments = get_posts( array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'meta_key'         => '_kjm_is_service',
            'meta_value'       => '1'
        ) );
            if ( $attachments ) {
                echo "<h2>Choose your background image</h2><ul class='service-bg-options'>";
            foreach ( $attachments as $attachment ) {
            $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
            $image_title = $attachment->post_title;
            $att_url = wp_get_attachment_url( $attachment->ID , false );
            ?>
<li>
<input type="radio" name="service-bg" id="<?php echo $att_url; ?>" value="<?php echo $att_url; ?>" <?php if ($service_bg == $att_url) { ?>checked="checked"<?php } else { } ?> />
<?php echo $image_title; ?><br/>
<img src='<?php echo $att_url; ?>' alt="<?php echo $alt; ?>"  width="200px" height="100px"/>
</li>
        <?php
            }
            echo '</ul>';
        }
        ?>
    </p> 
<p>  
    <label for="kjm_img_title">Background image title tag</label>  
    <input type="text" name="kjm_img_title" id="kjm_img_title" value="<?php echo $img_title; ?>" />
        </p>
        <p>  
    <label for="kjm_img_alt">Background image alt tag</label>  
    <input type="text" name="kjm_img_alt" id="kjm_img_alt" value="<?php echo $img_alt; ?>" />
        </p>
<?php
}
?>