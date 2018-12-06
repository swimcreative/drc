<?php if(get_field('bottom_banner', 2)) : ?>
<section id="cta">
  <img src="<?php echo get_stylesheet_directory_uri().'/assets/img/store-bg.jpg'; ?>"/>
  <div class="container">
    <?php echo get_field('bottom_banner', 2); ?>
 </div>
</section>

<?php endif; ?>
