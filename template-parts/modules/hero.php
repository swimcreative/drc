
  <?php if(!is_front_page()) : ?>

  <section id="hero">

  <div class="slide">

    <style>

     #hero .slide > img {
       object-position: <?php echo get_field('banner_background_position'); ?> !important;
     }

    </style>

  <?php if (get_the_post_thumbnail()) : ?>

  <img  data-object-fit="cover" src="<?php echo get_the_post_thumbnail_url();  ?>"/>

  <?php elseif(count(drc_get_random_header_image() != 0)) : ?>

		<?php echo '<img data-object-fit="cover" src="'.drc_get_random_header_image().'"/>'; ?>

  <?php else : ?>

  <img class="hero-bg" data-object-fit="cover" src="<?php echo get_stylesheet_directory_uri().'/assets/img/drc-hero.jpg'; ?>"/>

  <?php endif; ?>

  <div class="container">

    <div class="hero-content">
      <?php if (is_front_page()) : ?>

      <h1>Runnning.<br>Made Easy.</h1>

      <a href="#info" class="btn">Find Out More</a>

      <?php echo get_field('hero'); ?>

      <?php  else : ?>

      <?php if(get_field('banner_headline')) :

      echo '<h1>'.get_field('banner_headline').'</h1>';

      else :

      echo '<h1>'.get_the_title().'</h1>';

      endif;

      if(get_field('banner_sub_headline')) :

      echo '<p>'.get_field('banner_sub_headline').'</p>';

      endif;

    endif; ?>

    </div>

   </div>

</div>

</section>

<?php else : ?>

  <?php
     $args = array(
        'post_type' => 'slide',
        'post_status' => 'publish',
        'order' => 'menu_order',
     );
     $slider_posts = new WP_Query($args);
  ?>

  <?php if($slider_posts->have_posts()) : ?>

    <section id="hero" <?php if($slider_posts->post_count > 1) : echo 'class="hero-carousel"'; endif; ?>>

     <?php $i = 1; while($slider_posts->have_posts()) : $slider_posts->the_post(); ?>

       <?php
       $time = strtotime(current_time('now'));
       $expire = strtotime(get_field('slide_expiry', $post->ID));


       if($expire > $time) : ?>

        <?php $post2 = array( 'ID' => $post->ID, 'post_status' => $status );
          wp_update_post($post2);
          update_post_meta( $post->ID, 'slide_expiry', null );
        ?>

       <?php else : ?>


        <div class='slide slide-<?php echo $i; ?> <?php if($post->ID == 120) : echo 'default'; endif; ?>'>

          <?php if(get_field('rotating_header_photos')) : ?>



              <?php $photos = get_field('rotating_header_photos');

              shuffle($photos);

              $photo = array_pop($photos);

              if($photo['description']) : ?>

              <style>

               body #hero .slide-<?php echo $i; ?> > img {
                 object-position: <?php echo $photo['description']; ?> !important;
               }

              </style>


              <?php endif;


              echo '<img data-object-fit="cover" class="hero-bg" src="'.$photo['url'].'"/>'; ?>



          <?php else : ?>


          <style>

           .slide-<?php echo $i; ?> > img {
             object-position: <?php echo get_field('slide_background_position'); ?> !important;
           }

          </style>

             <img class="hero-bg" data-object-fit="cover"  src="<?php
             global $post;
             echo get_the_post_thumbnail_url($post->ID);  ?>"/>

           <?php endif; ?>
             <div class="container">

               <div class="hero-content">
                 <?php the_content(); ?>
               </div>
             </div>
        </div>

     <?php $i++; endif; endwhile; wp_reset_postdata(); ?>
   </section>

 <?php else : ?>

   <style>
   #info {
      margin-top:40px;
    }
   @media (min-width:768px) {
   #info {
      margin-top:80px;
    }
   }
   </style>

  <?php endif ?>

  <?php endif; ?>
  <?php get_template_part('template-parts/modules/crumb'); ?>
