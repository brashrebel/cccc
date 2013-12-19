<?php get_header(); ?>

<?php while(have_posts()): the_post();?>

      <?php 
      $img = get_post_meta(get_the_ID(), 'cccc_img', true);
      $archive_img = get_post_meta(get_the_ID(), 'cccc_archive_img', true);
      $capacity = get_post_meta(get_the_ID(), 'cccc_capacity', true);
      $desc1 = get_post_meta(get_the_ID(), 'cccc_desc1', true);
      $desc2 = get_post_meta(get_the_ID(), 'cccc_desc2', true);
      $desc3 = get_post_meta(get_the_ID(), 'cccc_desc3', true);
      $series = get_post_meta(get_the_ID(), 'cccc_series', true); 

      if (!$series)
        $series = '#table';
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
      </div>
    </div>
    <div id="bottomFrame"></div>
    <div id="bottomFrameBottom"></div>

  </div><!--Container-->

  <div id="main">

    <div id="content">

    <?php dynamic_sidebar('sharebar'); ?>

        <?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
        <div style="clear:both;"></div>

        <a class="cccc-button" style="float:left;text-decoration:none;" href="<?php echo $series; ?>">View Series</a>
        <a class="cccc-button" style="float:right;text-decoration:none;" href="/casters">Back to Casters</a>

        <div style="clear:both;height:30px;"></div>

        <div id="cccc-img"><img src="<?php echo $img; ?>" /></div>

        <?php the_content(); ?>

        <?php if ($series != '#table'): ?>
          <p style="text-align:center;font-size:17px;">To view the entire series, click below.</p>
          <p style="text-align:center;"><a href="<?php echo $series; ?>"><img src="http://www.casterconcepts.com/wp-content/themes/casterconcepts/images/caster-types/table.jpg" /></a></p>
        <?php endif; ?>

        <div id="cccc-footer">
          <p><i>For further information or a quote please contact us at <a href="mailto:sales@casterconcepts.com">sales@casterconcepts.com</a> or call 517-629-8838</i></p>
        </div>

    <?php endwhile;?>

  </div><!--Content-->

  <?php get_sidebar(); ?>
  
</div><!--Main-->

<?php get_footer(); ?>
