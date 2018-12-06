<?php

$args = array(
    'numberposts' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_type' => 'staff'
);

$staff = new WP_Query($args);

if ( $staff->have_posts() ) :

  echo '<div id="staff">';

while ( $staff->have_posts() ) : $staff->the_post();

//print_r($staff);
global $post;
$name = strtolower($post->post_title);

  echo '<div id="'.$name.'" class="staff-item">';
  get_template_part('template-parts/modules/staff/single-staff');
  echo '</div>';

  echo '<hr>';

endwhile; wp_reset_postdata();

echo '</div>';

else :

  echo '<h5>No Staff To Display<h5>';

endif;

?>
