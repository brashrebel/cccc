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
    $cccc_capacity = get_post_meta($post->ID, 'cccc_capacity', true);
    $cccc_diameter_low = get_post_meta($post->ID, 'cccc_diameter_low', true);
    $cccc_diameter_high = get_post_meta($post->ID, 'cccc_diameter_high', true);
    $cccc_width_low = get_post_meta($post->ID, 'cccc_width_low', true);
    $cccc_width_high = get_post_meta($post->ID, 'cccc_width_high', true);
    $cccc_materials = get_post_meta($post->ID, 'cccc_materials', true);

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>  
    <!-- Capacity -->
    <label for="cccc_capacity">Enter the capacity for the Caster (in lbs)</label><br/>
    <input type="text" name="cccc_capacity" id="cccc_capacity" value="<?php echo $cccc_capacity; ?>" /><br/>
    <p class="description">Whatever format desired. Standard would be with comma (##,###).</p>

    <!--- Diameter -->
    <label for="cccc_diameter_low">Diameter low -> high (in inches)</label><br/>
    <label for="cccc_diameter_low">Low</label>
    <input type="text" name="cccc_diameter_low" id="cccc_diameter_low" value="<?php echo $cccc_diameter_low; ?>" />
    <label for="cccc_diameter_high">High</label>
    <input type="text" name="cccc_diameter_high" id="cccc_diameter_high" value="<?php echo $cccc_diameter_high; ?>" />
    <p class="description">Format of regular integers (#)</p>

    <!-- Width -->
    <label for="cccc_width_low">Width low -> high (in inches)</label><br/>
    <label for="cccc_width_low">Low</label>
    <input type="text" name="cccc_width_low" id="cccc_width_low" value="<?php echo $cccc_width_low; ?>" />
    <label for="cccc_width_high">High</label>
    <input type="text" name="cccc_width_high" id="cccc_width_high" value="<?php echo $cccc_width_high; ?>" />
    <p class="description">Format of floating integers to hundredth degree (#.##)</p>

    <label for="cccc_materials">Available materials for caster</label><br/>
    <?php materials_select($cccc_materials); ?>
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
    <?php backend_media_uploader('cccc_img', $cccc_img); ?>
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
    <?php backend_media_uploader('cccc_archive_img', $cccc_archive_img); ?>
    <span class="description">Image to display on wheel archive page.<br/>
        Needs to be in "jpg" format<br/>
        Minimum resolution: 400px
        Needs to have exactly square aspect ratio (1:1)</span>
</p>
<?php
}

// For image uploader
function cccc_backend_media_uploader_script() {
    // Registers and enqueues the required javascript.
    wp_localize_script( 'meta-box-image', 'meta_image',
        array(
            'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
            'button' => __( 'Use this image', 'prfx-textdomain' ),            
        )
    );
    wp_enqueue_script( 'meta-box-image' );
}
add_action( 'admin_enqueue_scripts', 'cccc_backend_media_uploader_script' );

/*-----------------
Add wheels fields
------------------*/
// Callback function to show fields in meta box

function wheels_description( $post ) {
    global $post;
    $cccc_capacity = get_post_meta($post->ID, 'cccc_capacity', true);
    $cccc_diameter_low = get_post_meta($post->ID, 'cccc_diameter_low', true);
    $cccc_diameter_high = get_post_meta($post->ID, 'cccc_diameter_high', true);
    $cccc_width_low = get_post_meta($post->ID, 'cccc_width_low', true);
    $cccc_width_high = get_post_meta($post->ID, 'cccc_width_high', true);
    $cccc_hub_low = get_post_meta($post->ID, 'cccc_hub_low', true);
    $cccc_hub_high = get_post_meta($post->ID, 'cccc_hub_high', true);

// We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
        $example_stored_meta = get_post_meta( $post->ID );
    ?>

    <!-- Capacity -->
    <label for="cccc_capacity">Enter the capacity for the Caster (in lbs)</label><br/>
    <input type="text" name="cccc_capacity" id="cccc_capacity" value="<?php echo $cccc_capacity; ?>" /><br/>
    <p class="description">Whatever format desired. Standard would be with comma (##,###).</p>

    <!--- Diameter -->
    <label for="cccc_diameter_low">Diameter low -> high (in inches)</label><br/>
    <label for="cccc_diameter_low">Low</label>
    <input type="text" name="cccc_diameter_low" id="cccc_diameter_low" value="<?php echo $cccc_diameter_low; ?>" />
    <label for="cccc_diameter_high">High</label>
    <input type="text" name="cccc_diameter_high" id="cccc_diameter_high" value="<?php echo $cccc_diameter_high; ?>" />
    <p class="description">Format of regular integers (#)</p>

    <!-- Width -->
    <label for="cccc_width_low">Width low -> high (in inches)</label><br/>
    <label for="cccc_width_low">Low</label>
    <input type="text" name="cccc_width_low" id="cccc_width_low" value="<?php echo $cccc_width_low; ?>" />
    <label for="cccc_width_high">High</label>
    <input type="text" name="cccc_width_high" id="cccc_width_high" value="<?php echo $cccc_width_high; ?>" />
    <p class="description">Format of floating integers to hundredth degree (#.##)</p>

    <!-- Hub Length -->
    <label for="cccc_hub_low">Hub Length low -> high (in inches)</label><br/>
    <label for="cccc_hub_low">Low</label>
    <input type="text" name="cccc_hub_low" id="cccc_hub_low" value="<?php echo $cccc_hub_low; ?>" />
    <label for="cccc_hub_high">High</label>
    <input type="text" name="cccc_hub_high" id="cccc_hub_high" value="<?php echo $cccc_hub_high; ?>" />
    <p class="description">Format of floating integers with fraction decimal representation (# #/#)</p>
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
    <?php backend_media_uploader('cccc_img', $cccc_img); ?>
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
    <?php backend_media_uploader('cccc_archive_img', $cccc_archive_img); ?>
    <span class="description">Image to display on wheel archive page.<br/>
        Needs to be in "jpg" format<br/>
        Minimum resolution: 400px
        Needs to have exactly square aspect ratio (1:1)</span>
</p>
<?php
}

function materials_select($meta_value){
    $materials = array(
        'Polyurethanes' => 'optgroup',

        // Polyurethane
        'Polyurethane' => 'option',
        'Soft Polyurethane' => 'option',
        'T/R Polyurethane' => 'option',
        'H.D. T/R Polyurethane' => 'option',
        'T/R 95 Polyurethane' => 'option',
        'HPPT Polyurethane' => 'option',
        'H.D. Polyurethane' => 'option',
        '70D H.D. Polyurethane' => 'option',
        'Polyurethane Press On' => 'option',

        'Polyurethanes End' => 'end-optgroup',
        'Soft Materials' => 'optgroup',

        // Soft Materials
        'Solid Elastomer' => 'option',
        'Softech' => 'option',
        'Mold On Rubber' => 'option',
        'Import Mold On Rubber' => 'option',

        'Soft Materials End' => 'end-optgroup',
        'Harder Materials' => 'optgroup',

        // Harder Materials
        'Envirothane' => 'option',
        'Phenolic Resin' => 'option',
        'H.D. Phenolic Resin' => 'option',
        'Laminated Phenolic' => 'option',
        'Ductile Iron' => 'option',
        'Forged Steel' => 'option',
        'H.D. Forged Steel' => 'option',
        'Cast Iron' => 'option',
        'Import Cast Iron' => 'option',
        'Steel' => 'option',

        'Harder Materials End' => 'end-optgroup',
        'Other Materials' => 'optgroup',

        // Other Materials
        'Pneumatic Wheel' => 'option',

        'Other Materials End' => 'end-optgroup'
    );

    echo '<select class="chosen" name="cccc_materials[]" multiple>';
    foreach ($materials as $material => $type):
        // Check to see if current material is selected
        if (in_array($material, $meta_value))
            $selected = true;
        else 
            $selected = false;

        if ($type == 'option')
            echo '<option value="'.$material.'" '.($selected ? 'selected' : '').'>'.$material.'</option>';
        elseif ($type == 'optgroup')
            echo '<optgroup label="'.$material.'">';
        elseif ($type == 'end-optgroup')
            echo '</optgroup>';
    endforeach;
    echo '</select>';
}
?>