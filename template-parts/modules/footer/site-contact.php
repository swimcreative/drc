<div class="site-contact">
	<?php
	if (get_theme_mod('footer_logo') !='') {
		echo '<a href="/" class="custom-logo-link"><img src="'.get_theme_mod('footer_logo').'"/></a>';
	} else {
  if(has_custom_logo()) {
  	echo get_custom_logo() . '<br style="clear:both">';
  } else {
    echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home"><span class="contact-info-title">' . get_bloginfo('name') . '</span></a><br>';
  	}
	}

	$address = nl2br(get_theme_mod('drc_address'));
	if ($address != '') {
		echo '<span class="contact-info-address">' . $address . '</span><br>';
	}
	if (get_theme_mod('drc_phone') != '') {
		echo '<span class="contact-info-phone"><abbr title="Phone Number">PH</abbr>: <a href="tel:' . get_theme_mod('drc_phone'). '">' . get_theme_mod('drc_phone') . '</a></span><br>';
	}
	if (get_theme_mod('drc_email') !='' ) {
		echo '<span class="contact-info-email"><abbr title="Email Address">E</abbr>: <a href="mailto:' . get_theme_mod('drc_email'). '">' . get_theme_mod('drc_email') . '</a></span>';
	}
	if (get_theme_mod('drc_hours') !='' ) {
		echo '<br><br><br><span class="contact-info-hours"><strong style="font-weight:800">HOURS</strong><br><br>'.nl2br(get_theme_mod('drc_hours')).'</span>';
	}
	?>
</div><!-- .site-contact -->



<?php

if ( is_active_sidebar( 'sidebar-2' ) ) {
	echo '<div class="social" style="clear:both;"><br><br><br>';
	dynamic_sidebar( 'sidebar-2');
	echo '</div>';
}


//GET ADDRESS LINE BY LINE
/*
$address = '';
$lines = explode("\n", get_theme_mod('drc_address'));
$i = 1;
foreach ($lines as $line) {
  if($i == 1) {
    $address .= '<span>'.$line.'</span>';
  } else {
    $address .= '<br><span>'.$line.'</span>';
  }
  $i++;
}
*/

?>
