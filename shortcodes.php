<?php
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

    <h2>Our Casters</h2>

    <div id="caster-wheel-list">

      <p class="caster-wheel-display"><span onclick="display_all(this)">All</span> &bull; <span onclick="display_type(this)">Type</span> &bull; <span onclick="display_series(this)">Series</span>

      <?php
      $count = count($casters_array);

      for($i=1;$i<=$count;$i++){ ?>
    
        <p class='item <?php echo $casters_array["caster$i"]["type-or-series"]; ?>' onclick="change_caster_wheel(this,'<?php echo $casters_array["caster$i"]["name"]; ?>','<?php echo $casters_array["caster$i"]["image"]; ?>','<?php echo $casters_array["caster$i"]["capacity"]; ?>','<?php echo $casters_array["caster$i"]["series"]; ?>','<?php echo $casters_array["caster$i"]["desc1"]; ?>','<?php echo $casters_array["caster$i"]["desc2"]; ?>','<?php echo $casters_array["caster$i"]["desc3"]; ?>','<?php echo $casters_array["caster$i"]["link"]; ?>')"><?php echo $casters_array["caster$i"]["name"]; ?></p>

      <?php } ?>

    </div><!--Caster List-->

    <div id="caster-wheel-info">
      
      <div id="caster-wheel-image">
        <div class="mask">Loading...</div>
        <span class="capacity">MAX CAPACITY: <span style="font-size:150%;"><?php echo $casters_array["caster1"]["capacity"]; ?></span> <sup>lbs</sup></span>
        <a style="position:absolute;top:0;" href='<?php echo $casters_array["caster1"]["link"]; ?>'><img src='<?php echo $casters_array["caster1"]["image"]; ?>' /></a>
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

    <?php else: // Else if no photos (there should always be though) ?>

      <p>Sorry, no photos were found.</p>

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

    <h2>Our Wheels</h2>

    <div id="caster-wheel-list">

      <?php
      $count = count($wheels_array);

      for($i=1;$i<=$count;$i++){ ?>
    
        <p class='item <?php echo $wheels_array["wheel$i"]["type-or-series"]; ?>' onclick="change_caster_wheel(this,'<?php echo $wheels_array["wheel$i"]["name"]; ?>','<?php echo $wheels_array["wheel$i"]["image"]; ?>','<?php echo $wheels_array["wheel$i"]["capacity"]; ?>','<?php echo $wheels_array["wheel$i"]["series"]; ?>','<?php echo $wheels_array["wheel$i"]["desc1"]; ?>','<?php echo $wheels_array["wheel$i"]["desc2"]; ?>','<?php echo $wheels_array["wheel$i"]["desc3"]; ?>','<?php echo $wheels_array["wheel$i"]["link"]; ?>')"><?php echo $wheels_array["wheel$i"]["name"]; ?></p>

      <?php } ?>

    </div><!--wheel List-->

    <div id="caster-wheel-info">
      
      <div id="caster-wheel-image">
        <div class="mask">Loading...</div>
        <span class="capacity">MAX CAPACITY: <span style="font-size:150%;"><?php echo $wheels_array["wheel1"]["capacity"]; ?></span> <sup>lbs</sup></span>
        <a style="position:absolute;top:0;" href='<?php echo $wheels_array["wheel1"]["link"]; ?>'><img src='<?php echo $wheels_array["wheel1"]["image"]; ?>' /></a>
      </div>

      <h2 class="name"><a href='<?php echo $wheels_array["wheel1"]["link"]; ?>'><?php echo $wheels_array["wheel1"]["name"]; ?></a></h2>

      <ul>
        <li class="desc1"><?php echo $wheels_array["wheel1"]["desc1"]; ?></li>
        <li class="desc2"><?php echo $wheels_array["wheel1"]["desc2"]; ?></li>
        <li class="desc3"><?php echo $wheels_array["wheel1"]["desc3"]; ?></li>
      </ul>

    </div><!--wheel Info-->

    <div style="clear:both;"></div>

    <?php else: // Else if no photos (there should always be though) ?>

      <p>Sorry, no photos were found.</p>

    <?php endif; ?>
<?php }

//This part first creates a shortcode, then names the function that gets run when we use this shortcode
add_shortcode('wheels', 'wheels_shortcode');

?>