<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drc
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">

	<?php if(get_field('sidebar_content')) :

		echo '<section class="widget sidebar-content"><div class="textwidget">';
		echo get_field('sidebar_content');
		echo '</div></section>';

		endif;

	  dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
