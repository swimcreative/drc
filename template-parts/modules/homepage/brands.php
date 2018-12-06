<?php
$brands = get_field('brands');

if($brands) :

?>
<section id="brands">
  <div class="container">
    <div><h6>Brands We Carry</h6></div>
    <div class="carousel">

      <?php foreach($brands as $brand) : ?>

      <div class="item">
        <?php echo wp_get_attachment_image( $brand['ID'], 'medium' ); ?>
      </div>

    <?php endforeach; ?>


    </div>
 </div>
</section>

<?php endif ;?>
