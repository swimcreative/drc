<?php

global $post;
if(get_the_post_thumbnail($post->ID)) :
echo '<div class="staff-image">';
echo get_the_post_thumbnail($post->ID, 'medium');
echo '</div>';
endif;
echo '<div class="staff-content">';
echo '<h3 style="display:inline-block;margin-bottom:1em;">'.get_the_title().'<small style="display:block">'.get_field('staff_title').'</small></h3>';
//echo '<hr>';
echo the_content();
echo '</div>';
