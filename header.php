<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drc
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script>


	</script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<section id="search-box">
  <div class="container">
  <?php get_search_form(); ?>
  </div>
</section>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'drc' ); ?></a>

	<?php do_action('before_header'); ?>

	<header id="masthead" class="site-header notrans">

		<div class="container">
		<div class="site-branding">
			<?php
			the_custom_logo();

			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$drc_description = get_bloginfo( 'description', 'display' );
			if ( $drc_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $drc_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span></span><span></span><span></span></button>
			<?php

			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );



			?>
		</nav><!-- #site-navigation -->
		<!--<nav id="social">
				<ul>
					<li><small>SHARE ON: </small></li>
					<li><a style="background:#125ebb" href="#"><i class="fab fa-facebook-f"></i></a></li>
					<li><a style="background:#0094e4" href="#"><i class="fab fa-twitter"></i></a></li>
				</ul>
		</nav> -->
		<!--<a class="btn-alt">Register To Vote</a> -->
	</div>
	</header><!-- #masthead -->

	<?php do_action('before_content'); ?>

	<section id="info" class="site-content">

		<div class="container">
