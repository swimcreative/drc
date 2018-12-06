<?php
/**
 * drc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package drc
 */

if ( ! function_exists( 'drc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function drc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on drc, use a find and replace
		 * to change 'drc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'drc', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );



		add_post_type_support( 'page', 'excerpt' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'drc' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'drc_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

			add_editor_style('editor-style.css' );

	}
endif;
add_action( 'after_setup_theme', 'drc_setup' );

// new image size for products

add_theme_support('post-thumbnails');

add_image_size( 'content-image', 800, 550, true );

function my_custom_sizes( $sizes ) {
return array_merge( $sizes, array(
'content-image' => __( 'Content Image' ),
) );
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function drc_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'drc_content_width', 640 );
}
add_action( 'after_setup_theme', 'drc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function drc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'drc' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'drc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Social', 'drc' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'drc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'drc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function drc_scripts() {
	wp_enqueue_style( 'drc-style', get_template_directory_uri().'/style.min.css' );

	wp_enqueue_style( 'drc-fa',	'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'jquery');
	//wp_enqueue_script( 'jquery-effects-core');



	wp_enqueue_script( 'drc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'drc-flick', get_template_directory_uri() . '/js/flickity.pkgd.min.js', array(), '20151215', true );

	wp_enqueue_script( 'drc-vids', get_template_directory_uri() . '/vids.js', array(), '20151215');

	wp_enqueue_script( 'drc-main', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );

		wp_enqueue_script( 'drc-object-fit', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );

	wp_enqueue_script( 'drc-skip-link-focus-fix', get_template_directory_uri() . '/js/objectFitPolyfill.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'drc_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/class-customizer.php';

/**
 *  Hooks
 */
require get_template_directory() . '/inc/hooks.php';

/**
 *  Custom Widgets
 */
require get_template_directory() . '/inc/widgets.php';


/*VIDBOX */
include 'template-parts/modules/vidbox.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='button gform_button' id='gform_submit_button_{$form['id']}'><span>Submit</span></button>";
}



add_filter( 'wp_nav_menu_items', 'drc_add_search', 10, 2 );
function drc_add_search ( $items, $args ) {
    if ( $args->theme_location == 'menu-1') {
        $items .= '<li class="mobile-search">'.get_search_form(false).'</li><li class="site-search"><button type="search" class="header-search"><span class="fas fa-search"></span></button></li>';
    }
    return $items;
}

/**
 * Get custom headers
 *
 * @link    http://wordpress.stackexchange.com/q/151850/1685
 *
 * @return  string
 */
function drc_get_random_header_image($size = '') {

  $headers = get_uploaded_header_images();
  shuffle($headers);

	$header = array_pop($headers);

	if($size != '') :

	$header = wp_get_attachment_image_url($header['attachment_id'], $size);

	else:

	$header = $header['url'];

	endif;

  //$header = $header['url'];
	//print_r($headers);
  return $header;

}

// STAFF CPT

function drc_create_post_type_staff() {
  register_post_type( 'staff',
    array(
      'labels' => array(
        'name' => __( 'Staff' ),
        'singular_name' => __( 'Staff' ),
      ),
      'public' => true,
      'has_archive' => false,
			'hierarchical' => true,
      'publicly_queryable' => false,
      'supports'  => array( 'title', 'editor', 'thumbnail', 'revisions'),
      'menu_icon' => 'dashicons-groups'
    )
  );
}

add_action( 'init', 'drc_create_post_type_staff' );

// STAFF CPT

function drc_create_post_type_slides() {
  register_post_type( 'slide',
    array(
      'labels' => array(
        'name' => __( 'Home Slides' ),
        'singular_name' => __( 'Slide' ),
      ),
      'public' => true,
			'hierarchical' => true,
      'has_archive' => false,
      'publicly_queryable' => false,
			'exclude_from_search' => true,
      'supports'  => array( 'title', 'editor', 'thumbnail', 'revisions'),
      'menu_icon' => 'dashicons-images-alt2'
    )
  );
}

add_action( 'init', 'drc_create_post_type_slides' );

function staff_list() {
  ob_start();
  get_template_part('template-parts/modules/staff/staff');
  return ob_get_clean();
}

add_shortcode('staff_list', 'staff_list');


function involvement_list() {
  ob_start();
  get_template_part('template-parts/modules/involvement/involvement');
  return ob_get_clean();
}

add_shortcode('involvement_list', 'involvement_list');


// add conditional statements for mobile devices
function is_ipad() {
	$is_ipad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
	if ($is_ipad)
		return true;
	else return false;
}
function is_iphone() {
	$cn_is_iphone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
	if ($cn_is_iphone)
		return true;
	else return false;
}
function is_ipod() {
	$cn_is_iphone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPod');
	if ($cn_is_iphone)
		return true;
	else return false;
}
function is_ios() {
	if (is_iphone() || is_ipad() || is_ipod())
		return true;
	else return false;
}
function is_android() { // detect ALL android devices
	$is_android = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Android');
	if ($is_android)
		return true;
	else return false;
}
function is_android_mobile() { // detect ALL android devices
	$is_android   = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Android');
	$is_android_m = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Mobile');
	if ($is_android && $is_android_m)
		return true;
	else return false;
}
function is_android_tablet() { // detect android tablets
	if (is_android() && !is_android_mobile())
		return true;
	else return false;
}
function is_mobile_device() { // detect ALL mobile devices
	if (is_android_mobile() || is_iphone() || is_ipod())
		return true;
	else return false;
}
function is_tablet() { // detect ALL tablets
	if ((is_android() && !is_android_mobile()) || is_ipad())
		return true;
	else return false;
}

// add browser name to body class
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome, $is_iphone;
	if(!wp_is_mobile()) {
		if($is_gecko) $classes[] = 'browser-gecko';
		elseif($is_opera) $classes[] = 'browser-opera';
		elseif($is_safari) $classes[] = 'browser-safari';
		elseif($is_chrome) $classes[] = 'browser-chrome';
        elseif($is_IE) {
            $classes[] = 'browser-ie';
            if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
            $classes[] = 'ie-version-'.$browser_version[1];
        }
		else $classes[] = 'browser-unknown';
	} else {
    	if(is_iphone()) $classes[] = 'browser-iphone';
        elseif(is_ipad()) $classes[] = 'browser-ipad';
        elseif(is_ipod()) $classes[] = 'browser-ipod';
        elseif(is_android()) $classes[] = 'browser-android';
        elseif(is_tablet()) $classes[] = 'device-tablet';
        elseif(is_mobile_device()) $classes[] = 'device-mobile';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false) $classes[] = 'browser-kindle';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false) $classes[] = 'browser-blackberry';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false) $classes[] = 'browser-opera-mini';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false) $classes[] = 'browser-opera-mobi';
	}
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'Windows') !== false) $classes[] = 'os-windows';
        elseif(is_android()) $classes[] = 'os-android';
        elseif(is_ios()) $classes[] = 'os-ios';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Macintosh') !== false) $classes[] = 'os-mac';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Linux') !== false) $classes[] = 'os-linux';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false) $classes[] = 'os-kindle';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false) $classes[] = 'os-blackberry';
	return $classes;
}


function lb_editor_remove_meta_box() {
    global $post_type;
/**
 *  Check to see if the global $post_type variable exists
 *  and then check to see if the current post_type supports
 *  excerpts. If so, remove the default excerpt meta box
 *  provided by the WordPress core. If you would like to only
 *  change the excerpt meta box for certain post types replace
 *  $post_type with the post_type identifier.
 */
    if (isset($post_type) && post_type_supports($post_type, 'excerpt')){
        remove_meta_box('postexcerpt', $post_type, 'normal');
    }
}
add_action('admin_menu', 'lb_editor_remove_meta_box');

function lb_editor_add_custom_meta_box() {
    global $post_type;
    /**
     *  Again, check to see if the global $post_type variable
     *  exists and then if the current post_type supports excerpts.
     *  If so, add the new custom excerpt meta box. If you would
     *  like to only change the excerpt meta box for certain post
     *  types replace $post_type with the post_type identifier.
     */
    if (isset($post_type) && post_type_supports($post_type, 'excerpt')){
        add_meta_box('postexcerpt', __('Excerpt'), 'lb_editor_custom_post_excerpt_meta_box', $post_type, 'normal', 'high');
    }
}
add_action( 'add_meta_boxes', 'lb_editor_add_custom_meta_box' );

function lb_editor_custom_post_excerpt_meta_box( $post ) {

    /**
     *  Adjust the settings for the new wp_editor. For all
     *  available settings view the wp_editor reference
     *  http://codex.wordpress.org/Function_Reference/wp_editor
     */
    $settings = array( 'textarea_rows' => '12', 'quicktags' => false, 'tinymce' => true);

    /**
     *  Create the new meta box editor and decode the current
     *  post_excerpt value so the TinyMCE editor can display
     *  the content as it is styled.
     */
    wp_editor(html_entity_decode(stripcslashes($post->post_excerpt)), 'excerpt', $settings);

    // The meta box description - adjust as necessary
  //  echo '&lt;p&gt;&lt;em&gt;Excerpts are optional, hand-crafted, summaries of your content.&lt;/em&gt;&lt;/p&gt;';
}

add_action('wp_trash_post', 'restrict_post_deletion', 10, 1);
add_action('before_delete_post', 'restrict_post_deletion', 10, 1);
function restrict_post_deletion($post_id) {
//  if( ! is_super_admin() ) {
    if( $post_id == 120 ) {
      exit('The page you were trying to delete is protected.');
    }
  //}
}


add_action( 'edit_form_after_title', 'myprefix_edit_form_after_title' );

function myprefix_edit_form_after_title() {
	if(get_post_type() == 'slide') {
			echo '<h2>Please keep H1 headlines from 3-6 words, and sub headline / sentence between 5-10 words.</h2>';
	}
}

add_filter( 'gform_confirmation_anchor', '__return_true' );

// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
