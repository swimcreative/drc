
	<?php


	$address = nl2br(get_theme_mod('drc_address'));
  echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2731.3672487380622!2d-92.0867729839523!3d46.79707127913946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52ae52d076e9bc8b%3A0x713c878c77c79f3d!2sDuluth+Running+Co!5e0!3m2!1sen!2sus!4v1542685963443" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>';
      echo '<br><br><h2> '. get_bloginfo('name') . '</h2>';
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
