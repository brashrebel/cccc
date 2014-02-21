<?php get_header(); ?>

<?php 
  $img = get_post_meta(get_the_ID(), 'cccc_img', true);
  $archive_img = get_post_meta(get_the_ID(), 'cccc_archive_img', true);
  $capacity = get_post_meta(get_the_ID(), 'cccc_capacity', true);
  $desc1 = get_post_meta(get_the_ID(), 'cccc_desc1', true);
  $desc2 = get_post_meta(get_the_ID(), 'cccc_desc2', true);
  $desc3 = get_post_meta(get_the_ID(), 'cccc_desc3', true);
  $keyword = get_post_meta(get_the_ID(), 'cccc_keyword', true);
  $series = get_post_meta(get_the_ID(), 'cccc_series', true);
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

  <div id="content" class="no-sidebar">
    
    <?php while(have_posts()): the_post();?>

      <?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>

      <?php dynamic_sidebar('sharebar'); ?>
      
      <div style="clear:both;"></div>

      <a class="cccc-button" style="float:left;" href="#table">View Series</a>
      <a class="cccc-button" style="float:right;" href="/casters">Back to Casters</a>

      <div style="clear:both;height: 20px;"></div>

      <div id="cccc-img"><img src="<?php echo $img; ?>" /></div>

      <?php the_content(); ?>

      <p><i>For further information or a quote please contact us at <a href="mailto:sales@casterconcepts.com">sales@casterconcepts.com</a> or call 517-680-7920</i></p>
      
      <?php if ($series || $keyword): ?>
        <div id="table" class="casters">
          <?php
            require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/scswp.php');
            $scswp=new scswp_class('Casters',$series,$keyword);
          ?>
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
  
</div><!--Main-->

<?php get_footer(); ?>
