<?php
/**
 * Water Sports Club: Customizer
 *
 * @subpackage Water Sports Club
 * @since 1.0
 */

use WPTRT\Customize\Section\Water_Sports_Club_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Water_Sports_Club_Button::class );

	$manager->add_section(
		new Water_Sports_Club_Button( $manager, 'water_sports_club_pro', [
			'title'      => __( 'Water Sports Club Pro', 'water-sports-club' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'water-sports-club' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/water-sports-wordpress-theme/', 'water-sports-club')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'water-sports-club-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'water-sports-club-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function water_sports_club_customize_register( $wp_customize ) {

	$wp_customize->add_setting('water_sports_club_logo_size',array(
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_logo_size',array(
		'type' => 'range',
		'label' => __('Logo Size','water-sports-club'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('water_sports_club_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('water_sports_club_logo_padding',array(
		'label' => __('Logo Padding','water-sports-club'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('water_sports_club_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','water-sports-club'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('water_sports_club_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','water-sports-club'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('water_sports_club_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','water-sports-club'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('water_sports_club_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','water-sports-club'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('water_sports_club_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'water_sports_club_sanitize_checkbox'
 	));
 	$wp_customize->add_control('water_sports_club_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','water-sports-club'),
		'section' => 'title_tagline'
 	));

	$wp_customize->add_setting('water_sports_club_site_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_site_title_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','water-sports-club'),
		'section' => 'title_tagline',
	));

 	$wp_customize->add_setting('water_sports_club_show_tagline',array(
    	'default' => true,
    	'sanitize_callback'	=> 'water_sports_club_sanitize_checkbox'
 	));
 	$wp_customize->add_control('water_sports_club_show_tagline',array(
    	'type' => 'checkbox',
    	'label' => __('Show / Hide Site Tagline','water-sports-club'),
    	'section' => 'title_tagline'
 	));

	$wp_customize->add_setting('water_sports_club_site_tagline_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_site_tagline_font_size',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','water-sports-club'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_panel( 'water_sports_club_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'water-sports-club' ),
		'description' => __( 'Description of what this panel does.', 'water-sports-club' ),
	) );

	$wp_customize->add_section( 'water_sports_club_theme_options_section', array(
    	'title'      => __( 'General Settings', 'water-sports-club' ),
		'priority'   => 30,
		'panel' => 'water_sports_club_panel_id'
	) );

	$wp_customize->add_setting('water_sports_club_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'water_sports_club_sanitize_choices'
	));
	$wp_customize->add_control('water_sports_club_theme_options',array(
		'type' => 'radio',
		'label' => __('Do you want this section','water-sports-club'),
		'section' => 'water_sports_club_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','water-sports-club'),
		   'Right Sidebar' => __('Right Sidebar','water-sports-club'),
		   'One Column' => __('One Column','water-sports-club'),
		   'Three Columns' => __('Three Columns','water-sports-club'),
		   'Four Columns' => __('Four Columns','water-sports-club'),
		   'Grid Layout' => __('Grid Layout','water-sports-club')
		),
	));

	$wp_customize->add_setting( 'water_sports_club_boxfull_width', array(
		'default'           => '',
		'sanitize_callback' => 'water_sports_club_sanitize_choices'
	));
	
	$wp_customize->add_control( 'water_sports_club_boxfull_width', array(
		'label'    => __( 'Section Width', 'water-sports-club' ),
		'section'  => 'water_sports_club_theme_options_section',
		'type'     => 'select',
		'choices'  => array(
			'container'  => __('Box Width', 'water-sports-club'),
			'container-fluid' => __('Full Width', 'water-sports-club'),
			'none' => __('None', 'water-sports-club')
		),
	));

	$wp_customize->add_setting( 'water_sports_club_dropdown_anim', array(
		'default'           => 'None',
		'sanitize_callback' => 'water_sports_club_sanitize_choices'
	));
	$wp_customize->add_control( 'water_sports_club_dropdown_anim', array(
		'label'    => __( 'Menu Dropdown Animations', 'water-sports-club' ),
		'section'  => 'water_sports_club_theme_options_section',
		'type'     => 'select',
		'choices'  => array(
			'bounceInUp'  => __('bounceInUp', 'water-sports-club'),
			'fadeInUp' => __('fadeInUp', 'water-sports-club'),
			'zoomIn'    => __('zoomIn', 'water-sports-club'),
			'None'    => __('None', 'water-sports-club')
		),
	));

	//Header section
	$wp_customize->add_section( 'water_sports_club_topbar_section' , array(
    	'title' => __( 'Topbar Section', 'water-sports-club' ),
		'priority' => null,
		'panel' => 'water_sports_club_panel_id'
	) );

	$wp_customize->add_setting('water_sports_club_hide_show_topbar',array(
    	'default' => false,
    	'sanitize_callback'	=> 'water_sports_club_sanitize_checkbox'
	));
	$wp_customize->add_control('water_sports_club_hide_show_topbar',array(
   	'type' => 'checkbox',
   	'label' => __('Show / Hide Topbar','water-sports-club'),
   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_mail',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('water_sports_club_mail',array(
   	'type' => 'text',
   	'label' => __('Add Email Address','water-sports-club'),
   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_call',array(
    	'default' => '',
    	'sanitize_callback'	=> 'water_sports_club_sanitize_phone_number'
	));
	$wp_customize->add_control('water_sports_club_call',array(
   	'type' => 'text',
   	'label' => __('Add Phone Number','water-sports-club'),
   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_facebook_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('water_sports_club_facebook_url',array(
   	'type' => 'url',
   	'label' => __('Add Facebook URL','water-sports-club'),
   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_twitter_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('water_sports_club_twitter_url',array(
   	'type' => 'url',
   	'label' => __('Add Twitter URL','water-sports-club'),
   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_linkedin_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('water_sports_club_linkedin_url',array(
   	'type' => 'url',
   	'label' => __('Add Linkedin URL','water-sports-club'),
   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_rss_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('water_sports_club_rss_url',array(
   	'type' => 'url',
   	'label' => __('Add RSS URL','water-sports-club'),
   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_youtube_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('water_sports_club_youtube_url',array(
   	'type' => 'url',
   	'label' => __('Add Youtube URL','water-sports-club'),
   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting( 'water_sports_club_topbar_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_topbar_color', array(
		'label' => 'Text & Icon Color',
		'section' => 'water_sports_club_topbar_section',
	)));

	$wp_customize->add_setting( 'water_sports_club_topbarbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_topbarbg_color', array(
		'label' => 'Topbar Bg Color',
		'section' => 'water_sports_club_topbar_section',
	)));

	$wp_customize->add_setting( 'water_sports_club_menu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_menu_color', array(
		'label' => 'Menu Color',
		'section' => 'water_sports_club_topbar_section',
	)));

	$wp_customize->add_setting( 'water_sports_club_serchicon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_serchicon_color', array(
		'label' => 'Search Icon Color',
		'section' => 'water_sports_club_topbar_section',
	)));

	$wp_customize->add_setting( 'water_sports_club_serchiconbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_serchiconbg_color', array(
		'label' => 'Search Icon Bg Color',
		'section' => 'water_sports_club_topbar_section',
	)));

	//home page slider
	$wp_customize->add_section( 'water_sports_club_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'water-sports-club' ),
		'priority'   => null,
		'panel' => 'water_sports_club_panel_id'
	) );

	$wp_customize->add_setting('water_sports_club_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'water_sports_club_sanitize_checkbox'
	));
	$wp_customize->add_control('water_sports_club_slider_hide_show',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide slider','water-sports-club'),
		'section' => 'water_sports_club_slider_section',
	));

	$wp_customize->add_setting( 'water_sports_club_slider_effect', array(
		'default'           => '',
		'sanitize_callback' => 'water_sports_club_sanitize_choices'
	));
	$wp_customize->add_control( 'water_sports_club_slider_effect', array(
		'label'    => __( 'Onload Transactions Effects', 'water-sports-club' ),
		'section'  => 'water_sports_club_slider_section',
		'type'     => 'select',
		'choices'  => array(
			'bounceInLeft'  => __('bounceInLeft', 'water-sports-club'),
			'bounceInRight' => __('bounceInRight', 'water-sports-club'),
			'bounceInUp'    => __('bounceInUp', 'water-sports-club'),
			'bounceInDown'    => __('bounceInDown', 'water-sports-club'),
			'zoomIn'  => __('zoomIn', 'water-sports-club'),
			'zoomOut' => __('zoomOut', 'water-sports-club'),
			'fadeInDown'    => __('fadeInDown', 'water-sports-club'),
			'fadeInUp'    => __('fadeInUp', 'water-sports-club'),
			'fadeInLeft'  => __('fadeInLeft', 'water-sports-club'),
			'fadeInRight' => __('fadeInRight', 'water-sports-club'),
			'flip-up'    => __('flip-up', 'water-sports-club'),
			'none'    => __('none', 'water-sports-club')
		),
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'water_sports_club_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'water_sports_club_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'water_sports_club_slider' . $count, array(
			'label' => __( 'Select Slide Image Page', 'water-sports-club' ),
	   		'description' => __('Image Size (1400px x 650px)','water-sports-club'),
			'section' => 'water_sports_club_slider_section',
			'type' => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('water_sports_club_slider_excerpt_length',array(
		'default' => '3',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Slider Excerpt Length','water-sports-club'),
		'section' => 'water_sports_club_slider_section',
	));

	$wp_customize->add_setting('water_sports_club_slider_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_slider_title_font_size',array(
		'type' => 'number',
		'label' => __('Title Font Size','water-sports-club'),
		'section' => 'water_sports_club_slider_section',
	));

	$wp_customize->add_setting('water_sports_club_slider_text_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_slider_text_font_size',array(
		'type' => 'number',
		'label' => __('Text Font Size','water-sports-club'),
		'section' => 'water_sports_club_slider_section',
	));

	$wp_customize->add_setting( 'water_sports_club_slider_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_slider_color', array(
		'label' => 'Text Color',
		'section' => 'water_sports_club_slider_section',
	)));

	$wp_customize->add_setting( 'water_sports_club_sliderbtn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_sliderbtn_color', array(
		'label' => 'Button Text Color',
		'section' => 'water_sports_club_slider_section',
	)));

	$wp_customize->add_setting( 'water_sports_club_sliderbtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_sliderbtnbg_color', array(
		'label' => 'Button Bg Color',
		'section' => 'water_sports_club_slider_section',
	)));

	$wp_customize->add_setting( 'water_sports_club_sliderbtnhvr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_sliderbtnhvr_color', array(
		'label' => 'Button Hover Text Color',
		'section' => 'water_sports_club_slider_section',
	)));

	$wp_customize->add_setting( 'water_sports_club_sliderbtnhvrbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_sliderbtnhvrbg_color', array(
		'label' => 'Button Hover Bg Color',
		'section' => 'water_sports_club_slider_section',
	)));

	$wp_customize->add_setting( 'water_sports_club_slidernp_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_slidernp_color', array(
		'label' => 'Next/Pre Arrow Color',
		'section' => 'water_sports_club_slider_section',
	)));

	$wp_customize->add_setting( 'water_sports_club_slidernpbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_slidernpbg_color', array(
		'label' => 'Next/Pre Arrow Bg Color',
		'section' => 'water_sports_club_slider_section',
	)));

	//Our Courses Section
	$wp_customize->add_section('water_sports_club_our_courses',array(
		'title'	=> __('Our Courses','water-sports-club'),
		'description'=> __('<b>Note :</b> This section will appear below the slider.','water-sports-club'),
		'panel' => 'water_sports_club_panel_id',
	));

	$wp_customize->add_setting('water_sports_club_course_heading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('water_sports_club_course_heading',array(
		'type' => 'text',
		'label' => __('Add Section Heading','water-sports-club'),
		'section' => 'water_sports_club_our_courses',
	));

	$wp_customize->add_setting('water_sports_club_course_heading_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_course_heading_font_size',array(
		'type' => 'number',
		'label' => __('Font Size','water-sports-club'),
		'section' => 'water_sports_club_our_courses',
	));

	$wp_customize->add_setting( 'water_sports_club_course_heading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_course_heading_color', array(
		'label' => 'Color',
		'section' => 'water_sports_club_our_courses',
	)));

	$wp_customize->add_setting('water_sports_club_courses_subheading_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('water_sports_club_courses_subheading_text',array(
		'type' => 'text',
		'label' => __('Add Section text','water-sports-club'),
		'section' => 'water_sports_club_our_courses',
	));

	$wp_customize->add_setting('water_sports_club_course_text_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_course_text_font_size',array(
		'type' => 'number',
		'label' => __('Font Size','water-sports-club'),
		'section' => 'water_sports_club_our_courses',
	));

	$wp_customize->add_setting( 'water_sports_club_course_subheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_course_subheading_color', array(
		'label' => 'Color',
		'section' => 'water_sports_club_our_courses',
	)));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('water_sports_club_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'water_sports_club_sanitize_choices',
	));
	$wp_customize->add_control('water_sports_club_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category To Display Post','water-sports-club'),
		'section' => 'water_sports_club_our_courses',
	));

	$wp_customize->add_setting('water_sports_club_courses_img_size',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_courses_img_size',array(
		'type' => 'number',
		'label' => __('Image Size','water-sports-club'),
		'section' => 'water_sports_club_our_courses',
	));

	$wp_customize->add_setting('water_sports_club_courses_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_courses_font_size',array(
		'type' => 'number',
		'label' => __('Title Font Size','water-sports-club'),
		'section' => 'water_sports_club_our_courses',
	));

	$wp_customize->add_setting('water_sports_club_courses_text_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_courses_text_font_size',array(
		'type' => 'number',
		'label' => __('Text Font Size','water-sports-club'),
		'section' => 'water_sports_club_our_courses',
	));

	$wp_customize->add_setting('water_sports_club_courses_section_padding',array(
      'default' => '',
      'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_courses_section_padding',array(
		'type' => 'number',
		'label' => __('Section Top Bottom Padding','water-sports-club'),
		'section' => 'water_sports_club_our_courses',
	));

   $wp_customize->add_setting( 'water_sports_club_course_boxtitle_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_course_boxtitle_color', array(
		'label' => 'Box Title Color',
		'section' => 'water_sports_club_our_courses',
	)));

	$wp_customize->add_setting( 'water_sports_club_course_boxtitlebg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_course_boxtitlebg_color', array(
		'label' => 'Box Title Bg Color',
		'section' => 'water_sports_club_our_courses',
	)));

	$wp_customize->add_setting( 'water_sports_club_course_boxtext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_course_boxtext_color', array(
		'label' => 'Box Text Color',
		'section' => 'water_sports_club_our_courses',
	)));

	$wp_customize->add_setting( 'water_sports_club_coursebtn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_coursebtn_color', array(
		'label' => 'Button Text Color',
		'section' => 'water_sports_club_our_courses',
	)));

	$wp_customize->add_setting( 'water_sports_club_coursebtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_coursebtnbg_color', array(
		'label' => 'Button Bg Color',
		'section' => 'water_sports_club_our_courses',
	)));

	//Footer
   $wp_customize->add_section( 'water_sports_club_footer', array(
    	'title'  => __( 'Footer Settings', 'water-sports-club' ),
		'priority' => null,
		'panel' => 'water_sports_club_panel_id'
	) );

	$wp_customize->add_setting('water_sports_club_show_back_totop',array(
 		'default' => true,
   	'sanitize_callback'	=> 'water_sports_club_sanitize_checkbox'
	));
	$wp_customize->add_control('water_sports_club_show_back_totop',array(
   	'type' => 'checkbox',
   	'label' => __('Show / Hide Back to Top','water-sports-club'),
   	'section' => 'water_sports_club_footer'
	));

   	$wp_customize->add_setting('water_sports_club_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('water_sports_club_footer_copy',array(
		'label'	=> __('Copyright Text','water-sports-club'),
		'section' => 'water_sports_club_footer',
		'setting' => 'water_sports_club_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting('water_sports_club_footer_copy_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
	));
	$wp_customize->add_control('water_sports_club_footer_copy_font_size',array(
		'type' => 'number',
		'label' => __('Font Size','water-sports-club'),
		'section' => 'water_sports_club_footer',
	));

	$wp_customize->add_setting('water_sports_club_copyright_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'water_sports_club_sanitize_float'
 	));
 	$wp_customize->add_control('water_sports_club_copyright_padding',array(
		'type' => 'number',
		'label' => __('Copyright Top Bottom Padding','water-sports-club'),
		'section' => 'water_sports_club_footer',
	));

	$wp_customize->add_setting( 'water_sports_club_footer_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_footer_title_color', array(
		'label' => 'Footer Title Color',
		'section' => 'water_sports_club_footer',
	)));

	$wp_customize->add_setting( 'water_sports_club_footer_menu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_footer_menu_color', array(
		'label' => 'Footer Menu Color',
		'section' => 'water_sports_club_footer',
	)));

	$wp_customize->add_setting( 'water_sports_club_copyright_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_copyright_color', array(
		'label' => 'Copyright Text Color',
		'section' => 'water_sports_club_footer',
	)));

	$wp_customize->add_setting( 'water_sports_club_copyrightbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_copyrightbg_color', array(
		'label' => 'Background Color',
		'section' => 'water_sports_club_footer',
	)));

	$wp_customize->add_setting( 'water_sports_club_tbarrow_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_tbarrow_color', array(
		'label' => 'Back To Top Arrow Text Color',
		'section' => 'water_sports_club_footer',
	)));

	$wp_customize->add_setting( 'water_sports_club_tbarrowbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'water_sports_club_tbarrowbg_color', array(
		'label' => 'Back To Top Arrow Bg Color',
		'section' => 'water_sports_club_footer',
	)));

	$wp_customize->register_section_type( Water_Sports_Club_Button::class );

	$wp_customize->add_section(
		new Water_Sports_Club_Button( $wp_customize, 'water_sports_club_pro_under_panel', [
			'title'      => __( 'Water Sports Club Pro', 'water-sports-club' ),
			'priority'    => null,
			'button_text' => __( 'Go Pro', 'water-sports-club' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/water-sports-wordpress-theme/', 'water-sports-club'),
			'panel' => 'water_sports_club_panel_id'
		] )
	);

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'water_sports_club_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'water_sports_club_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'water_sports_club_customize_register' );

function water_sports_club_customize_partial_blogname() {
	bloginfo( 'name' );
}

function water_sports_club_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function water_sports_club_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function water_sports_club_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}