<?php

/**
 * Water Sports Club functions and definitions
 *
 * @subpackage Water Sports Club
 * @since 1.0
 */

// Autoload
include get_theme_file_path('vendor/wptrt/autoload/src/Water_Sports_Club_Loader.php');
$water_sports_club_loader = new \WPTRT\Autoload\Water_Sports_Club_Loader();
$water_sports_club_loader->water_sports_club_add('WPTRT\\Customize\\Section', get_theme_file_path('vendor/wptrt/customize-section-button/src'));
$water_sports_club_loader->water_sports_club_register();

// Theme Setup
function water_sports_club_setup()
{
	load_theme_textdomain('water-sports-club', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('woocommerce');
	add_theme_support('title-tag');
	add_theme_support('responsive-embeds');
	add_theme_support('html5', array('comment-list', 'search-form', 'comment-form'));
	add_theme_support('post-thumbnails');
	add_theme_support('custom-background', array(
		'default-color' => '',
		'default-image' => '',
	));

	$GLOBALS['content_width'] = 525;

	register_nav_menus(array(
		'primary' => __('Primary Menu', 'water-sports-club'),
	));

	add_theme_support('custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	));

	add_theme_support('customize-selective-refresh-widgets');

	add_editor_style(array(
		'assets/css/editor-style.css',
		water_sports_club_fonts_url()
	));

	global $pagenow;
	if (is_admin() && $pagenow === 'themes.php' && isset($_GET['activated'])) {
		add_action('admin_notices', 'water_sports_club_activation_notice');
	}
}
add_action('after_setup_theme', 'water_sports_club_setup');

// Activation Notice
function water_sports_club_activation_notice()
{
	echo '<div class="notice notice-success is-dismissible start-notice">';
	echo '<h3>' . esc_html__('Welcome to Luzuk!!', 'water-sports-club') . '</h3>';
	echo '<p>' . esc_html__('Thank you for choosing Water Sports Club theme. It will be our pleasure to have you on our Welcome page to serve you better.', 'water-sports-club') . '</p>';
	echo '<p><a href="' . esc_url(admin_url('themes.php?page=water_sports_club_guide')) . '" class="button button-primary">' . esc_html__('GET STARTED', 'water-sports-club') . '</a></p>';
	echo '</div>';
}

// Register Widgets
function water_sports_club_widgets_init()
{
	$sidebars = array(
		'sidebar-1' => __('Blog Sidebar', 'water-sports-club'),
		'sidebar-2' => __('Sidebar 2', 'water-sports-club'),
		'sidebar-3' => __('Sidebar 3', 'water-sports-club'),
		'footer-1'  => __('Footer 1', 'water-sports-club'),
		'footer-2'  => __('Footer 2', 'water-sports-club'),
		'footer-3'  => __('Footer 3', 'water-sports-club'),
		'footer-4'  => __('Footer 4', 'water-sports-club'),
	);

	foreach ($sidebars as $id => $name) {
		register_sidebar(array(
			'name'          => $name,
			'id'            => $id,
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
			'after_title'   => '</h2></div>',
		));
	}
}
add_action('widgets_init', 'water_sports_club_widgets_init');

// Fonts
function water_sports_club_fonts_url()
{
	$font_families = array(
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Permanent+Marker'
	);

	$fonts_url = add_query_arg(array(
		'family' => implode('&family=', $font_families),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2');

	return wptt_get_webfont_url(esc_url_raw($fonts_url));
}

// Enqueue Scripts & Styles
function water_sports_club_scripts()
{
	wp_enqueue_style('water-sports-club-fonts', water_sports_club_fonts_url(), array(), null);
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/fontawesome-all.css');
	wp_enqueue_style('custom-animations', get_template_directory_uri() . '/assets/css/animations.css');
	wp_enqueue_style('water-sports-club-basic-style', get_stylesheet_uri());

	if (is_customize_preview()) {
		wp_enqueue_style('water-sports-club-ie9', get_theme_file_uri('/assets/css/ie9.css'), array(), '1.0');
		wp_style_add_data('water-sports-club-ie9', 'conditional', 'IE 9');
	}

	wp_enqueue_style('water-sports-club-ie8', get_theme_file_uri('/assets/css/ie8.css'), array(), '1.0');
	wp_style_add_data('water-sports-club-ie8', 'conditional', 'lt IE 9');

	require get_parent_theme_file_path('/lz-custom-style.php');
	wp_add_inline_style('water-sports-club-basic-style', $water_sports_club_custom_style);

	wp_enqueue_script('water-sports-club-navigation-jquery', get_theme_file_uri('/assets/js/navigation.js'), array('jquery'), '2.1.2', true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), null, true);
	wp_enqueue_script('jquery-superfish', get_template_directory_uri() . '/assets/js/jquery.superfish.js', array('jquery'), null, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'water_sports_club_scripts');

// Template front page
function water_sports_club_front_page_template($template)
{
	return is_home() ? '' : $template;
}
add_filter('frontpage_template', 'water_sports_club_front_page_template');

// Costanti tema
define('WATER_SPORTS_CLUB_LIVE_DEMO', __('http://www.luzukdemo.com/demo/water-sports-club/', 'water-sports-club'));
define('WATER_SPORTS_CLUB_PRO_DOCS', __('http://www.luzukdemo.com/docs/water-sports-club/', 'water-sports-club'));
define('WATER_SPORTS_CLUB_BUY_NOW', __('https://www.luzuk.com/product/water-sports-wordpress-theme/', 'water-sports-club'));
define('WATER_SPORTS_CLUB_SUPPORT', __('https://wordpress.org/support/theme/water-sports-club/', 'water-sports-club'));
define('WATER_SPORTS_CLUB_CREDIT', __('https://www.luzuk.com/themes/free-water-sports-wordpress-theme/', 'water-sports-club'));

// Credit link
if (!function_exists('water_sports_club_credit')) {
	function water_sports_club_credit()
	{
		echo "<a href='" . esc_url(WATER_SPORTS_CLUB_CREDIT) . "' target='_blank'>" . esc_html__('Water Sports WordPress Theme ', 'water-sports-club') . "</a>";
	}
}

// Sanitization functions
function water_sports_club_sanitize_dropdown_pages($page_id, $setting)
{
	$page_id = absint($page_id);
	return (get_post_status($page_id) == 'publish') ? $page_id : $setting->default;
}

function water_sports_club_sanitize_choices($input, $setting)
{
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	return (array_key_exists($input, $control->choices)) ? $input : $setting->default;
}

function water_sports_club_sanitize_checkbox($input)
{
	return isset($input) && $input === true;
}

function water_sports_club_sanitize_phone_number($phone)
{
	return preg_replace('/[^\d+]/', '', $phone);
}

function water_sports_club_sanitize_float($input)
{
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

// Limit excerpt
function water_sports_club_string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	if (count($words) > $word_limit) {
		array_pop($words);
	}
	return implode(' ', $words);
}

// WooCommerce - 3 colonne per riga
function water_sports_club_loop_columns()
{
	return 3;
}
add_filter('loop_shop_columns', 'water_sports_club_loop_columns');

// Banner dinamico
function water_sports_club_banner_image($image_url)
{
	if (is_singular()) {
		global $post;
		return get_the_post_thumbnail_url($post->ID, 'full');
	}
	return $image_url;
}

// Include extra file
require get_parent_theme_file_path('/inc/custom-header.php');
require get_parent_theme_file_path('/inc/template-tags.php');
require get_parent_theme_file_path('/inc/template-functions.php');
require get_parent_theme_file_path('/inc/customizer.php');
require get_parent_theme_file_path('/inc/getting-started/getting-started.php');
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php');

/* CUSTOM CODE BEGIN */

/* CUSTOM POST TYPE E TASSONOMIE */

// CPT Eventi
function windsurf_eventi_post_type()
{
	$args = array(
		'labels' => array(
			'name'               => 'Eventi',
			'singular_name'      => 'Evento',
			'add_new'            => 'Aggiungi nuovo',
			'add_new_item'       => 'Aggiungi nuovo evento',
			'edit_item'          => 'Modifica evento',
			'new_item'           => 'Nuovo evento',
			'view_item'          => 'Visualizza evento',
			'search_items'       => 'Cerca eventi',
			'not_found'          => 'Nessun evento trovato',
			'not_found_in_trash' => 'Nessun evento nel cestino',
			'menu_name'          => 'Eventi'
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array('slug' => 'eventi'),
		'supports'     => array('title', 'editor', 'thumbnail'),
		'show_in_rest' => true,
	);
	register_post_type('eventi', $args);
}
add_action('init', 'windsurf_eventi_post_type');

// Tassonomia Review
function windsurf_review()
{
	$labels = array(
		'name'              => _x('Reviews', 'Taxonomy General Name', 'windsurf'),
		'singular_name'     => _x('Review', 'Taxonomy Singular Name', 'windsurf'),
		'menu_name'         => __('Review', 'windsurf'),
		'all_items'         => __('Tutte le review', 'windsurf'),
		'edit_item'         => __('Modifica Review', 'windsurf'),
		'view_item'         => __('Visualizza Review', 'windsurf'),
		'add_new_item'      => __('Aggiungi nuova Review', 'windsurf'),
		'new_item_name'     => __('Nuovo nome Review', 'windsurf'),
		'search_items'      => __('Cerca Review', 'windsurf'),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'review'),
	);
	register_taxonomy('review', array('eventi'), $args);
}
add_action('init', 'windsurf_review');

// Tassonomia Tipologia
function windsurf_tipologia()
{
	$labels = array(
		'name'              => _x('Tipologie', 'Taxonomy General Name', 'windsurf'),
		'singular_name'     => _x('Tipologia', 'Taxonomy Singular Name', 'windsurf'),
		'menu_name'         => __('Tipologia', 'windsurf'),
		'all_items'         => __('Tutte le tipologie', 'windsurf'),
		'edit_item'         => __('Modifica tipologia', 'windsurf'),
		'view_item'         => __('Visualizza tipologia', 'windsurf'),
		'add_new_item'      => __('Aggiungi nuova tipologia', 'windsurf'),
		'new_item_name'     => __('Nuovo nome tipologia', 'windsurf'),
		'search_items'      => __('Cerca tipologie', 'windsurf'),
	);
	$args = array(
		'hierarchical'      => true, // tipo categoria
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'tipologia'),
		'show_in_rest'      => true,
	);
	register_taxonomy('tipologia', array('eventi'), $args);
}
add_action('init', 'windsurf_tipologia');

function create_review_taxonomy()
{
	// Registrazione della tassonomia 'review'
	$args = array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Reviews',
			'singular_name' => 'Review',
			'menu_name' => 'Reviews',
			'all_items' => 'All Reviews',
			'edit_item' => 'Edit Review',
			'view_item' => 'View Review',
			'add_new_item' => 'Add New Review',
			'new_item_name' => 'New Review Name',
			'search_items' => 'Search Reviews',
		),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'review'),
	);
	register_taxonomy('review', array('eventi'), $args);
}

add_action('init', 'create_review_taxonomy');
