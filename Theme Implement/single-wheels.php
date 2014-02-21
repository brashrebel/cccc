<?php get_header(); ?>

<?php 
  $img = get_post_meta(get_the_ID(), 'cccc_img', true);
  $archive_img = get_post_meta(get_the_ID(), 'cccc_archive_img', true);
  $capacity = get_post_meta(get_the_ID(), 'cccc_capacity', true);
  $desc1 = get_post_meta(get_the_ID(), 'cccc_desc1', true);
  $desc2 = get_post_meta(get_the_ID(), 'cccc_desc2', true);
  $desc3 = get_post_meta(get_the_ID(), 'cccc_desc3', true);
  $table = get_post_meta(get_the_ID(), 'cccc_table', true); 
?>

<div class="container">

  <div id="topFrame"></div>
  <div class="frame">
    <h1><?php the_title();?></h1>
    <div class="description">
      <ul>
        <li><?php echo $desc1; ?></li>
        <li><?php echo $desc2; ?></li>
        <li><?php echo $desc3; ?></li>
      </ul>
    </div><!--Description-->
  </div>
  <div id="bottomFrame"></div>
  <div id="bottomFrameBottom"></div>

</div><!--Container-->

<div id="main">

  <?php if(have_posts()):?>

  <div id="content">
    
    <?php while(have_posts()): the_post();?>

      <?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>

      <div style="clear:both;"></div>

      <?php dynamic_sidebar('sharebar'); ?>

      <a class="cccc-button" style="float:left;" href="#table">View Series</a>
      <a class="cccc-button" style="float:right;" href="/wheels">Back to Wheels</a>

      <div style="clear:both;height: 20px;"></div>

      <div id="cccc-img"><img src="<?php echo $img; ?>" /></div>
        
      <?php the_content(); ?>

      <div id="table"><?php echo do_shortcode('[table id='.$table.' /]'); ?></div>

      <div id="cccc-footer">
        <p><i>For further information or a quote please contact us at <a href="mailto:sales@casterconcepts.com">sales@casterconcepts.com</a> or call 517-629-8838</i></p>
      </div>

    <?php endwhile;?>

  </div><!--Content-->

  <?php else: ?>

  <div id="content">
    <h1>Not Found</h1>
    <p>Sorry, but you are looking for something that isn't here.</p>
  </div>

  <?php endif;?>

  <div id="sidebar">
    <?php dynamic_sidebar("main"); ?>
  </div>
  
</div><!--Main-->

<?php get_footer(); ?>
