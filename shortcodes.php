<?php
function casters_shortcode_dev($atts) {

  // Query the custom post type, "casters"
  $casters_query = new WP_Query(array(
    'post_type' => 'casters',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'title'
    )
  );

  // Set up the initial array, as to be global
  $all_casters = array();

  // If there are some casters, line em up!
  if ($casters_query->have_posts()): $i=0; while ($casters_query->have_posts()): $casters_query->the_post(); $i++;

    // Initially grab if it's a series or just a "type" of caste
    $type_or_series = get_post_meta(get_the_ID(), 'cccc_type_or_series', true);

    // Fill up our array with all existing casters, sorted out into series and type
    if ($type_or_series == 'series'):
      $all_casters['series'][$i]['name'] = get_the_title();
      $all_casters['series'][$i]['series'] = get_post_meta(get_the_ID(), 'cccc_series', true);
      $all_casters['series'][$i]['image'] = get_post_meta(get_the_ID(), 'cccc_archive_img', true);
      $all_casters['series'][$i]['link'] = get_permalink();
      $all_casters['series'][$i]['capacity'] = get_post_meta(get_the_ID(), 'cccc_capacity', true);
      $all_casters['series'][$i]['diameter_low'] = get_post_meta(get_the_ID(), 'cccc_diameter_low', true);
      $all_casters['series'][$i]['diameter_high'] = get_post_meta(get_the_ID(), 'cccc_diameter_high', true);
      $all_casters['series'][$i]['width_low'] = get_post_meta(get_the_ID(), 'cccc_width_low', true);
      $all_casters['series'][$i]['width_high'] = get_post_meta(get_the_ID(), 'cccc_width_high', true);
      $all_casters['series'][$i]['materials'] = get_post_meta(get_the_ID(), 'cccc_materials', true);
    else:
      $all_casters['type'][$i]['name'] = get_the_title();
      $all_casters['type'][$i]['image'] = get_post_meta(get_the_ID(), 'cccc_archive_img', true);
      $all_casters['type'][$i]['link'] = get_permalink();
      $all_casters['type'][$i]['capacity'] = get_post_meta(get_the_ID(), 'cccc_capacity', true);
      $all_casters['type'][$i]['diameter_low'] = get_post_meta(get_the_ID(), 'cccc_diameter_low', true);
      $all_casters['type'][$i]['diameter_high'] = get_post_meta(get_the_ID(), 'cccc_diameter_high', true);
      $all_casters['type'][$i]['width_low'] = get_post_meta(get_the_ID(), 'cccc_width_low', true);
      $all_casters['type'][$i]['width_high'] = get_post_meta(get_the_ID(), 'cccc_width_high', true);
      $all_casters['type'][$i]['materials'] = get_post_meta(get_the_ID(), 'cccc_materials', true);
    endif;

  endwhile; endif;

  // If there are some series casters, output some html
  if (!empty($all_casters['series'])):
    echo '<h2 class="cccc-list-title title-heading">Series</h2>';
    echo '<div class="cccc-left cccc-series disabled" onclick="cccc_transition(\'series\', \'left\')"><span class="icon"></span></div>';
    echo '<div class="cccc-list-container">';
    echo '<ul style="left:0%;" class="cccc-list cccc-series">'; // Inline percent for JS purposes

    // One by one
    $i=0; foreach ($all_casters['series'] as $caster): $i++;
      $materials = '';

      // Let's clean up and shorten that title to just the series number
      preg_match_all('!\d+!', $caster['name'], $title);
      $title = $title[0][0]; // Not sure why buried, but get it out!

      // Get the image url
      $image = wp_get_attachment_image_src($caster['image'], 'full');

      // Set materials
      $a=0; foreach($caster['materials'] as $material): $a++;
        if ($a == 1)
          $materials = "$material";
        else
          $materials .= ", $material";
      endforeach;

      // Set width
      if (empty($caster['width_high']))
        $width = $caster['width_low'];
      else
        $width = $caster['width_low'].' to '.$caster['width_high'];

      // Set height
      if (empty($caster['diameter_high']))
        $diameter = $caster['diameter_low'];
      else
        $diameter = $caster['diameter_low'].' to '.$caster['diameter_high'];

      // Populate vars with all necessary attributes for changing caster
      $data = 'data-name="'.$caster['name'].'" data-capacity="'.$caster['capacity'].'" data-image="'.$image[0].'" data-diameter="'.$diameter.'" data-width="'.$width.'" data-link="'.$caster['link'].'" data-materials="'.$materials.'"';


      echo '<li class="cccc-item '.($i==1 ? "active" : "").'" onclick="cccc_change(this);cccc_highlight(this);" '.$data.'>';
      echo $title;
      echo '</li>';

    endforeach;

    echo '</ul>'; // .cccc-caster-list
    echo '</div>'; // .cccc-list-container
    echo '<div class="cccc-right cccc-series" onclick="cccc_transition(\'series\', \'right\')"><span class="icon"></span></div>';

  endif; // If casters with series exist

  // Now the same thing but with type
  if (!empty($all_casters['type'])):
    echo '<h2 class="cccc-list-title title-heading">Type</h2>';
    echo '<div class="cccc-left cccc-type disabled" onclick="cccc_transition(\'type\', \'left\')"><span class="icon"></span></div>';
    echo '<div class="cccc-list-container">';
    echo '<ul style="left:0%;" class="cccc-list cccc-type">'; // Inline percent for JS purposes

    // One by one
    foreach ($all_casters['type'] as $caster):

      // Let's clean up and shorten that title to just the series number
      $title = str_replace('Casters', '', $caster['name']);

      // Get the image ready to send
      $image = wp_get_attachment_image_src($caster['image'], 'full');

      $i=0; foreach($caster['materials'] as $material): $i++;
        if ($i == 1)
          $materials = "$material";
        else
          $materials .= ", $material";
      endforeach;

      // Populate vars with all necessary attributes for changing caster
      $data = 'data-name="'.$caster['name'].'" data-capacity="'.$caster['capacity'].'" data-image="'.$image[0].'" data-diameter="'.$caster['diameter_low'].' to '.$caster['diameter_high'].'" data-width="'.$caster['width_low'].' to '.$caster['width_high'].'" data-link="'.$caster['link'].'" data-materials="'.$materials.'"';


      echo '<li class="cccc-item" onclick="cccc_change(this);cccc_highlight(this);" '.$data.'>';
      echo $title;
      echo '</li>';

    endforeach;

    echo '</ul>'; // .cccc-list
    echo '</div>'; // .cccc-list-container
    echo '<div class="cccc-right cccc-type" onclick="cccc_transition(\'type\', \'right\')"><span class="icon"></span></div>';

    // Clear the floated elements
    echo '<div style="clear:both;"></div>';

  endif; // If casters with type exist

  // Now the lists are done, time for the individual output
  if ($all_casters):

    // Get the first caster
    $caster = array_shift(array_shift($all_casters)); // Weird to do twice, but I don't know if just series or just type exists

    // Get the image
    $image = wp_get_attachment_image_src($caster['image'], 'full');

    // Main "go-to" button
    echo '<div class="cccc-view-item"><a class="button" href="'.$caster['link'].'">View Caster</a></div>';

    // Caster name
    echo '<h3 class="cccc-item-title title-heading">'.$caster['name'].'</h3>';

    // Caster image
    echo '<div class="cccc-item-image">';
    echo '<img onload="cccc_remove_loading()" src="'.$image[0].'" />';
    echo '</div>';

    // All caster information
    echo '<div class="cccc-item-info">';
    echo '<ul class="cccc-item-description">';
    echo '<li class="cccc-item-capacity"><span title="Load Rating" class="icon"></span> <span class="change">'.$caster['capacity'].'</span>lbs</li>';
    echo '<li class="cccc-item-diameter"><span title="Diameter" class="icon"></span> <span class="change">'.$caster['diameter_low'].' to '.$caster['diameter_high'].'</span> inches</li>';
    echo '<li class="cccc-item-width"><span title="Width" class="icon"></span> <span class="change">'.$caster['width_low'].' to '.$caster['width_high'].'</span> inches</li>';

    // Materials array
    echo '<li class="cccc-item-materials"><span title="Available Materials" class="icon"></span> <span class="change">';
    $i=0; foreach ($caster['materials'] as $material): $i++;
      if ($i == 1)
        echo $material;
      else
        echo ', '.$material;
    endforeach;
    echo '</span></li>';
    
    echo '</ul>';
    echo '</div>';

  endif; // If any casters
}

//This part first creates a shortcode, then names the function that gets run when we use this shortcode
add_shortcode('casters_dev', 'casters_shortcode_dev');

function casters_shortcode($atts) {

  // Query the custom post type, "casters"
  $casters_query = new WP_Query(array(
    'post_type' => 'casters',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'title'
    )
  ); ?>

  <?php if($casters_query->have_posts()): ?>

    <?php $i = 0; ?>

    <?php while($casters_query->have_posts()) : $casters_query->the_post();

      $i++;

      $capacity = get_post_meta(get_the_ID(), 'cccc_capacity', true); // Get the casters capacity
      $series = get_post_meta(get_the_ID(), 'cccc_series', true); // Get the casters series
      $image = get_post_meta(get_the_ID(), 'cccc_archive_img', true); // Get the casters image
      $desc1 = get_post_meta(get_the_ID(), 'cccc_desc1', true); // Get the description 1
      $desc2 = get_post_meta(get_the_ID(), 'cccc_desc2', true); // Get the description 2
      $desc3 = get_post_meta(get_the_ID(), 'cccc_desc3', true); // Get the description 3
      $type_or_series = get_post_meta(get_the_ID(), 'cccc_type_or_series', true); // Get the description 3
      $name = get_the_title(); // Get name of caster
      $link = get_permalink(); // Get the link to the page

      $casters_array["caster$i"] = array("capacity" => $capacity, "series" => $series, "image" => $image, "name" => $name, "desc1" => $desc1, "desc2" => $desc2, "desc3" => $desc3, "type-or-series" => $type_or_series, "link" => $link); ?>

    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

    <div id="caster-wheel-list" class="casters">

      <p class="caster-wheel-display"><span onclick="display_all(this)">All</span> &bull; <span onclick="display_type(this)">Type</span> &bull; <span onclick="display_series(this)">Series</span>

      <?php
      $count = count($casters_array);

      for($i=1;$i<=$count;$i++){ 
      $img_info = wp_prepare_attachment_for_js($casters_array["caster$i"]["image"]);
      ?>
    
        <p class='item <?php echo $casters_array["caster$i"]["type-or-series"]; ?>' onclick="change_caster_wheel(this,'<?php echo $casters_array["caster$i"]["name"]; ?>','<?php echo $casters_array["caster$i"]["capacity"]; ?>','<?php echo $casters_array["caster$i"]["series"]; ?>','<?php echo $casters_array["caster$i"]["desc1"]; ?>','<?php echo $casters_array["caster$i"]["desc2"]; ?>','<?php echo $casters_array["caster$i"]["desc3"]; ?>','<?php echo $casters_array["caster$i"]["link"]; ?>','<?php echo $img_info[url]; ?>', '<?php echo $img_info[title];?>', '<?php echo $img_info[alt];?>')"><?php echo $casters_array["caster$i"]["name"]; ?></p>

      <?php } ?>

    </div><!--Caster List-->

    <div id="caster-wheel-info">
      
      <div id="caster-wheel-image">
        <div class="mask">Loading...</div>
        <span class="capacity">MAX CAPACITY: <span style="font-size:150%;"><?php echo $casters_array["caster1"]["capacity"]; ?></span> <sup>lbs</sup></span>
        <a style="position:absolute;top:0;" href='<?php echo $casters_array["caster1"]["link"]; ?>'><?php the_attachment_image($casters_array['caster1']['image'], 'full'); ?></a>
      </div>

      <h2 class="name"><a href='<?php echo $casters_array["caster1"]["link"]; ?>'><?php echo $casters_array["caster1"]["name"]; ?></a></h2>

      <ul>
        <li class="desc1"><?php echo $casters_array["caster1"]["desc1"]; ?></li>
        <li class="desc2"><?php echo $casters_array["caster1"]["desc2"]; ?></li>
        <li class="desc3"><?php echo $casters_array["caster1"]["desc3"]; ?></li>
      </ul>

    </div><!--Caster Info-->

    <div style="clear:both;"></div>

    <?php
      $show = $_GET["show"];
      $show = str_replace('/', '', $show);
    ?>

    <!--Show type or series based on shortcode attr query-->
      <?php if($show == 'type'): ?>
        <script type="text/javascript">
          $("#caster-wheel-list p.type").css("display","block") 
          $("#caster-wheel-list p.series").css("display","none")
          $(".caster-wheel-display span").css({borderColor:"transparent",color:"#969696"})
          $(".caster-wheel-display span:nth-child(2)").css({borderColor:"#c4c4c4",color:"#000"})
        </script>
      <?php elseif($show == "series"): ?>
        <script type="text/javascript">
          $("#caster-wheel-list p.series").css("display","block") 
          $("#caster-wheel-list p.type").css("display","none")
          $(".caster-wheel-display span").css({borderColor:"transparent",color:"#969696"})
          $(".caster-wheel-display span:nth-child(3)").css({borderColor:"#c4c4c4",color:"#000"})
        </script>
      <?php endif; ?>
    <!--End-->

    <?php else: ?>

      <p>No Casters!.</p>

    <?php endif; ?>
<?php }

//This part first creates a shortcode, then names the function that gets run when we use this shortcode
add_shortcode('casters', 'casters_shortcode');

function wheels_shortcode() {

  // Query the custom post type, "wheels"
  $wheels_query = new WP_Query(array(
    'post_type' => 'wheels',
    'posts_per_page' => -1
    )
  ); ?>

  <?php if($wheels_query->have_posts()): ?>

    <?php $i = 0; ?>

    <?php while($wheels_query->have_posts()) : $wheels_query->the_post();

      $i++;

      $capacity = get_post_meta(get_the_ID(), 'cccc_capacity', true); // Get the wheels capacity
      $series = get_post_meta(get_the_ID(), 'cccc_series', true); // Get the wheels series
      $image = get_post_meta(get_the_ID(), 'cccc_archive_img', true); // Get the wheels image
      $desc1 = get_post_meta(get_the_ID(), 'cccc_desc1', true); // Get the description 1
      $desc2 = get_post_meta(get_the_ID(), 'cccc_desc2', true); // Get the description 2
      $desc3 = get_post_meta(get_the_ID(), 'cccc_desc3', true); // Get the description 3
      $type_or_series = get_post_meta(get_the_ID(), 'cccc_type_or_series', true); // Get the description 3
      $name = get_the_title(); // Get name of wheel
      $link = get_permalink(); // Get the link to the page

      $wheels_array["wheel$i"] = array("capacity" => $capacity, "series" => $series, "image" => $image, "name" => $name, "desc1" => $desc1, "desc2" => $desc2, "desc3" => $desc3, "type-or-series" => $type_or_series, "link" => $link); ?>

    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

    <div id="caster-wheel-list" class="wheels">

      <?php
      $count = count($wheels_array);

      for($i=1;$i<=$count;$i++){
      $img_info = wp_prepare_attachment_for_js($wheels_array["wheel$i"]["image"]);
      ?>
    
        <p class='item <?php echo $wheels_array["wheel$i"]["type-or-series"]; ?>' onclick="change_caster_wheel(this,'<?php echo $wheels_array["wheel$i"]["name"]; ?>','<?php echo $wheels_array["wheel$i"]["capacity"]; ?>','<?php echo $wheels_array["wheel$i"]["series"]; ?>','<?php echo $wheels_array["wheel$i"]["desc1"]; ?>','<?php echo $wheels_array["wheel$i"]["desc2"]; ?>','<?php echo $wheels_array["wheel$i"]["desc3"]; ?>','<?php echo $wheels_array["wheel$i"]["link"]; ?>','<?php echo $img_info[url]; ?>', '<?php echo $img_info[title];?>', '<?php echo $img_info[alt];?>')"><?php echo $wheels_array["wheel$i"]["name"]; ?></p>

      <?php } ?>

    </div><!--wheel List-->

    <div id="caster-wheel-info">
      
      <div id="caster-wheel-image">
        <div class="mask">Loading...</div>
        <span class="capacity">MAX CAPACITY: <span style="font-size:150%;"><?php echo $wheels_array["wheel1"]["capacity"]; ?></span> <sup>lbs</sup></span>
        <a style="position:absolute;top:0;" href='<?php echo $wheels_array["wheel1"]["link"]; ?>'><?php the_attachment_image($wheels_array['wheel1']['image'], 'full'); ?></a>
      </div>

      <h2 class="name"><a href='<?php echo $wheels_array["wheel1"]["link"]; ?>'><?php echo $wheels_array["wheel1"]["name"]; ?></a></h2>

      <ul>
        <li class="desc1"><?php echo $wheels_array["wheel1"]["desc1"]; ?></li>
        <li class="desc2"><?php echo $wheels_array["wheel1"]["desc2"]; ?></li>
        <li class="desc3"><?php echo $wheels_array["wheel1"]["desc3"]; ?></li>
      </ul>

    </div><!--wheel Info-->

    <div style="clear:both;"></div>

    <?php else: ?>

      <p>No Wheels!.</p>

    <?php endif; ?>
<?php }

//This part first creates a shortcode, then names the function that gets run when we use this shortcode
add_shortcode('wheels', 'wheels_shortcode');

?>