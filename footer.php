<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drc
 */

?>





</div>
</section><!-- #content -->

<?php do_action('add_homepage_content'); ?>

	<?php do_action('after_content'); ?>


	<footer id="colophon" class="site-footer">
		<div class="container">


		<?php get_template_part('template-parts/modules/footer/footer-nav'); ?>
		<?php get_template_part('template-parts/modules/footer/site-contact'); ?>
		<?php get_template_part('template-parts/modules/footer/site-info'); ?>



	</div> <!-- container -->
	</footer><!-- #colophon -->

	<!-- end splash page -->
<div class="lightbox" style="display:none">
	<a href="#" class="close"><span></span><span></span></a>
	<div class="video-box">

	</div>
</div>

<?php

$vid = get_field('video', 2);
vidbox($vid); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
