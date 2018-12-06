<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package drc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if(get_post_type() == 'staff') : ?>

			<?php

			$page = get_page_by_title( 'staff' );
			$page = $page->ID;
			//echo $page;
			$page = get_the_permalink($page);
			$page = substr($page, 0, -1);
			$page = $page.'#'.strtolower(get_the_title());

			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( $page ) ), '</a></h2>' ); ?>

		<?php else : ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<?php endif; ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			drc_posted_on();
			drc_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php// drc_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php drc_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
