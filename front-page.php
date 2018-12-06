<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package drc
 */

get_header();

?>


<?php if(get_field('featured_content_type') != 'none') : ?>

	<div id="secondary" class="widget-area">
		
		<?php if(get_field('featured_content_type') == 'video') : ?>

			  <a class="video" href="#"><img src="<?php echo get_field('video_thumb')['sizes']['content-image']; ?>"/></a>

			<?php else : ?>

				<img src="<?php echo get_field('home_feature_image')['sizes']['content-image'];?>"/>

			<?php endif; ?>
	</div>

<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->




<?php

get_footer();
