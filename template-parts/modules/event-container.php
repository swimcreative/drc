<?php

if(get_field('support_feature')) :

$id = get_field('support_feature');

else :
$events = get_field('involvement_link', 46);

$shuffle = shuffle($events);

$id = array_pop($events);

endif;

?>


<a style="display:block" href="<?php echo get_the_permalink($id); ?>" class="event-container">
  <?php if(get_the_post_thumbnail($id)) : ?>
  <img src="<?php echo get_the_post_thumbnail_url($id, 'content-image') ?>"/>
<?php else : ?>
<?php echo '<img src="'.drc_get_random_header_image('content-image').'"/>'; ?>
<?php endif; ?>
  <span><?php echo get_the_title($id); ?> &nbsp;|&nbsp;<span>Learn More »<span></span>
</a>
