<div class="involvement-list">

<?php
global $post;
$links =  get_field('involvement_link', $post->ID);

if($links) :
  foreach ($links as $link) : ?>
  <div class="involvement-item">
  <h4><a href="<?php echo get_the_permalink($link); ?>"><?php echo get_the_title($link); ?></a></h4>
  <p><?php echo get_the_excerpt($link); ?></p>
</div>
  <hr>

  <?php endforeach; endif; ?>
</div>
