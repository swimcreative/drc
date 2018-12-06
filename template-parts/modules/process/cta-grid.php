<?php if(get_field('process_cta')) :
  $ctas = get_field('process_cta'); ?>

<div class="cta-grid">
  <?php if(get_field('cta_headline')) : ?>
    <div class="container">
      <span>
      <h2><?php echo get_field('cta_headline'); ?></h2>
    </span>
    </div>

  <?php endif; ?>
  <br>

  <div class="container">
    <?php foreach($ctas as $cta) : ?>
  <div class="cta">
    <span class="fa fa-<?php echo $cta['cta_icon']; ?>"></span>
    <?php echo $cta['cta_content']; ?>

</div>
<?php endforeach; ?>
</div>


<?php endif; ?>
