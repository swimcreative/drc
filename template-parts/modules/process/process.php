<?php if(get_field('process_steps')) : ?>

<section id="process">

<?php

$steps = get_field('process_steps');
$i = 1;
foreach ($steps as $step) : ?>
<div class='step'>
  <div class="container">
  <div class="support-content">
    <div class="img-wrapper">
    <img data-object-fit="cover" src="<?php echo $step['step_side_image']['url']; ?>"/>
  </div>
  </div>

<div class="content">
  <span class="step-count"><?php echo $i; ?></span>

    <?php echo $step['step_content']; ?>

  <!--  <a href="#" class="btn">Button Here</a> -->
  <?php if($step['step_quote']) :
    $quote = $step['step_quote'];
    //echo $quote;
    foreach ($quote as $q) : ?>
    <?php if($q['quote_quote'] != '') { ?>
    <div class="quote">
      <?php if($q['quote_image']) : ?>
      <img src="<?php echo $q['quote_image']['sizes']['thumbnail']; ?>"/>
    <?php endif; ?>
      <div class="wrap">
        <blockquote><?php echo $q['quote_quote']; ?></blockquote>
        <?php if($q['quote_attribution']) : ?><strong>&mdash; <?php echo $q['quote_attribution']; ?></strong><?php endif; ?>
      </div>
    </div>
  <?php } $i++; endforeach; endif; ?>
</div>
</div>
</div>

<?php endforeach; ?>

<?php endif; ?>


<?php get_template_part('template-parts/modules/process/cta-grid'); ?>

</section>
