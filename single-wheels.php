<?php get_header(); ?>


<div class="container">

  <div id="topFrame"></div>
  <div class="frame">
    <h1><?php the_title();?></h1>
  </div>
  <div id="bottomFrame"></div>
  <div id="bottomFrameBottom"></div>

</div><!--Container-->

<div id="main">

  <?php if(have_posts()):?>

  <div id="content">

    <?php dynamic_sidebar('sharebar'); ?>
    
    <?php while(have_posts()): the_post();?>

      <?php 
      $img = get_post_meta(get_the_ID(), 'cccc_img', true);
      $archive_img = get_post_meta(get_the_ID(), 'cccc_archive_img', true);
      $capacity = get_post_meta(get_the_ID(), 'cccc_capacity', true);
      $desc1 = get_post_meta(get_the_ID(), 'cccc_desc1', true);
      $desc2 = get_post_meta(get_the_ID(), 'cccc_desc2', true);
      $desc3 = get_post_meta(get_the_ID(), 'cccc_desc3', true);
      $table = get_post_meta(get_the_ID(), 'cccc_table', true); 
      ?>
      <?php if (!$img || !$archive_img || !$capacity || !$desc1 || !$desc2 || !$desc3): ?>
        <p style="color:#f00;font-size:20px;"><strong>Please correct the following errors</strong></p>
        <?php if (!$img): ?>
          <p><b>*Please select an image</b></p>
        <?php endif; ?>
        <?php if (!$archive_img): ?>
          <p><b>*Please select an archive image</b></p>
        <?php endif; ?>
        <?php if (!$capacity): ?>
          <p><b>*Please input a capacity</b></p>
        <?php endif; ?>
        <?php if (!$desc1 || !$desc2 || !$desc3): ?>
          <p><b>*Please input all 3 description points</b></p>
        <?php endif; ?>
      <?php else: ?>

        <?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
        <div style="clear:both;"></div>

        <a class="cccc-button" style="float:left;" href="#table">View Series</a>
        <a class="cccc-button" style="float:right;" href="/caster-wheels">Back to Wheels</a>

        <div style="clear:both;"></div>

        <div id="cccc-img"><img src="<?php echo $img; ?>" /></div>
        
        <?php the_content(); ?>

        <div id="table"><?php do_shortcode('[table id='.$table.' /]'); ?></div>

        <div id="cccc-footer">
          <p><i>For further information or a quote please contact us at <a href="mailto:sales@casterconcepts.com">sales@casterconcepts.com</a> or call 517-629-8838</i></p>
        </div>

      <?php endif; ?>

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