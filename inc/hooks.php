<?php

function home_top() {
	if(is_page()) {
		get_template_part('template-parts/modules/hero');
	}
}

add_action('before_content', 'home_top');

function home_brands() {
	if(is_front_page()) {
		get_template_part('template-parts/modules/homepage/brands');
	}
}

add_action('add_homepage_content', 'home_brands');

function home_bottom() {
	if(is_front_page()) {
		get_template_part('template-parts/modules/homepage/more');
	} else {
		if(!is_search() && !is_404()) {
			get_template_part('template-parts/modules/homepage/insta');
		}
	}
	if(!is_search() && !is_404()) {
		get_template_part('template-parts/modules/homepage/cta');
	}
}

add_action('after_content', 'home_bottom');

function drc_process() {

if(is_page_template('page-template-process-template.php')) {
		get_template_part('template-parts/modules/process/process');
	}
}

add_action('after_content', 'drc_process', 1);
