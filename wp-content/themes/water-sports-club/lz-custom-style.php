<?php 

	$water_sports_club_custom_style = '';

	// Logo Size
	$water_sports_club_logo_top_padding = get_theme_mod('water_sports_club_logo_top_padding');
	$water_sports_club_logo_bottom_padding = get_theme_mod('water_sports_club_logo_bottom_padding');
	$water_sports_club_logo_left_padding = get_theme_mod('water_sports_club_logo_left_padding');
	$water_sports_club_logo_right_padding = get_theme_mod('water_sports_club_logo_right_padding');

	if( $water_sports_club_logo_top_padding != '' || $water_sports_club_logo_bottom_padding != '' || $water_sports_club_logo_left_padding != '' || $water_sports_club_logo_right_padding != ''){
		$water_sports_club_custom_style .=' .logo {';
			$water_sports_club_custom_style .=' padding-top: '.esc_attr($water_sports_club_logo_top_padding).'px; padding-bottom: '.esc_attr($water_sports_club_logo_bottom_padding).'px; padding-left: '.esc_attr($water_sports_club_logo_left_padding).'px; padding-right: '.esc_attr($water_sports_club_logo_right_padding).'px;';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_logo_size = get_theme_mod('water_sports_club_logo_size');
	if( $water_sports_club_logo_size != '') {
		if($water_sports_club_logo_size == 100) {
			$water_sports_club_custom_style .=' .custom-logo-link img {';
				$water_sports_club_custom_style .=' width: 350px;';
			$water_sports_club_custom_style .=' }';
		} else if($water_sports_club_logo_size >= 10 && $water_sports_club_logo_size < 100) {
			$water_sports_club_custom_style .=' .custom-logo-link img {';
				$water_sports_club_custom_style .=' width: '.esc_attr($water_sports_club_logo_size).'%;';
			$water_sports_club_custom_style .=' }';
		}
	}

	// service section padding
	$water_sports_club_courses_section_padding = get_theme_mod('water_sports_club_courses_section_padding');

	if( $water_sports_club_courses_section_padding != ''){
		$water_sports_club_custom_style .=' #our-services {';
			$water_sports_club_custom_style .=' padding-top: '.esc_attr($water_sports_club_courses_section_padding).'px; padding-bottom: '.esc_attr($water_sports_club_courses_section_padding).'px;';
		$water_sports_club_custom_style .=' }';
	}

	// Site Title Font Size
	$water_sports_club_site_title_font_size = get_theme_mod('water_sports_club_site_title_font_size');
	if( $water_sports_club_site_title_font_size != ''){
		$water_sports_club_custom_style .=' .logo h1.site-title, .logo p.site-title {';
			$water_sports_club_custom_style .=' font-size: '.esc_attr($water_sports_club_site_title_font_size).'px;';
		$water_sports_club_custom_style .=' }';
	}

	// Site Tagline Font Size
	$water_sports_club_site_tagline_font_size = get_theme_mod('water_sports_club_site_tagline_font_size');
	if( $water_sports_club_site_tagline_font_size != ''){
		$water_sports_club_custom_style .=' .logo p.site-description {';
			$water_sports_club_custom_style .=' font-size: '.esc_attr($water_sports_club_site_tagline_font_size).'px;';
		$water_sports_club_custom_style .=' }';
	}

	//layout width
	$water_sports_club_boxfull_width = get_theme_mod('water_sports_club_boxfull_width');
	if ($water_sports_club_boxfull_width !== '') {
		switch ($water_sports_club_boxfull_width) {
			case 'container':
				$water_sports_club_custom_style .= ' body, #header, .bottom-header {
					max-width: 1140px;
					width: 100%;
					padding-right: 15px;
					padding-left: 15px;
					margin-right: auto;
					margin-left: auto;
					}';
				break;
			case 'container-fluid':
				$water_sports_club_custom_style .= ' body, #header, .bottom-header { 
					width: 100%;
					padding-right: 15px;
					padding-left: 15px;
					margin-right: auto;
					margin-left: auto;
				 }';
				break;
			case 'none':
				// No specific width specified, so no additional style needed.
				break;
			default:
				// Handle unexpected values.
				break;
		}
	}

	//Menu animation
	$water_sports_club_dropdown_anim = get_theme_mod('water_sports_club_dropdown_anim');

	if ( $water_sports_club_dropdown_anim != '') {
		$water_sports_club_custom_style .=' .nav-menu ul ul {';
			$water_sports_club_custom_style .=' animation:'.esc_attr($water_sports_club_dropdown_anim).' 1s ease;';
		$water_sports_club_custom_style .=' }';
	}

	// Header Image
	$header_image_url = water_sports_club_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$water_sports_club_custom_style .=' #inner-pages-header {';
			$water_sports_club_custom_style .=' background-image: url('. esc_url( $header_image_url ).'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$water_sports_club_custom_style .=' }';
		$water_sports_club_custom_style .=' .header-overlay {';
			$water_sports_club_custom_style .=' position: absolute; 	width: 100%; height: 100%; 	top: 0; left: 0; background: #000; opacity: 0.3;';
		$water_sports_club_custom_style .=' }';
	} else {
		$water_sports_club_custom_style .=' #inner-pages-header {';
			$water_sports_club_custom_style .=' background: linear-gradient(0deg,#0de9df,#81e3f2 80%) no-repeat; ';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_slider_hide_show = get_theme_mod('water_sports_club_slider_hide_show',false);
	if( $water_sports_club_slider_hide_show == true){
		$water_sports_club_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$water_sports_club_custom_style .=' display:none;';
		$water_sports_club_custom_style .=' }';
	}

	// Copyright Css
	$water_sports_club_footer_copy_font_size = get_theme_mod('water_sports_club_footer_copy_font_size');
	if( $water_sports_club_footer_copy_font_size != ''){
		$water_sports_club_custom_style .=' .site-info p, .site-info a {';
			$water_sports_club_custom_style .=' font-size: '.esc_attr($water_sports_club_footer_copy_font_size).'px;';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_copyright_padding = get_theme_mod('water_sports_club_copyright_padding');
	if( $water_sports_club_copyright_padding != ''){
		$water_sports_club_custom_style .=' .site-info {';
			$water_sports_club_custom_style .=' padding-top: '.esc_attr($water_sports_club_copyright_padding).'px; padding-bottom: '.esc_attr($water_sports_club_copyright_padding).'px;';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_footer_title_color = get_theme_mod('water_sports_club_footer_title_color');
	if ( $water_sports_club_footer_title_color != '') {
		$water_sports_club_custom_style .=' .site-footer h2.widget-title a, .site-footer h2.widget-title {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_footer_title_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_footer_menu_color = get_theme_mod('water_sports_club_footer_menu_color');
	if ( $water_sports_club_footer_menu_color != '') {
		$water_sports_club_custom_style .=' .site-footer label, .site-footer caption, .site-footer .widget ul li, .site-footer .widget ul li a, .site-footer p, .site-footer table, .site-footer .widget_rss .rss-date, .site-footer .widget_rss li cite, .site-footer .widget_rss p {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_footer_menu_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_copyright_color = get_theme_mod('water_sports_club_copyright_color');
	if ( $water_sports_club_copyright_color != '') {
		$water_sports_club_custom_style .=' .site-info p, .site-info a {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_copyright_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_copyrightbg_color = get_theme_mod('water_sports_club_copyrightbg_color');
	if ( $water_sports_club_copyrightbg_color != '') {
		$water_sports_club_custom_style .=' .copyright {';
			$water_sports_club_custom_style .=' background-color:'.esc_attr($water_sports_club_copyrightbg_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_tbarrow_color = get_theme_mod('water_sports_club_tbarrow_color');
	if ( $water_sports_club_tbarrow_color != '') {
		$water_sports_club_custom_style .=' .back-to-top-text {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_tbarrow_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_tbarrowbg_color = get_theme_mod('water_sports_club_tbarrowbg_color');
	if ( $water_sports_club_tbarrowbg_color != '') {
		$water_sports_club_custom_style .=' .back-to-top {';
			$water_sports_club_custom_style .=' background-color:'.esc_attr($water_sports_club_tbarrowbg_color).';';
		$water_sports_club_custom_style .=' }';
	}

	//topbar color
	$water_sports_club_topbar_color = get_theme_mod('water_sports_club_topbar_color');
	if ( $water_sports_club_topbar_color != '') {
		$water_sports_club_custom_style .=' .topbar .social-icons i, .topbar .social-icons p, .topbar .mail a, .topbar .call a {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_topbar_color).';';
		$water_sports_club_custom_style .=' }';
	}
	$water_sports_club_topbarbg_color = get_theme_mod('water_sports_club_topbarbg_color');
	if ( $water_sports_club_topbarbg_color != '') {
		$water_sports_club_custom_style .=' .topbar {';
			$water_sports_club_custom_style .=' background-color:'.esc_attr($water_sports_club_topbarbg_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_menu_color = get_theme_mod('water_sports_club_menu_color');
	if ( $water_sports_club_menu_color != '') {
		$water_sports_club_custom_style .=' .page-template-custom-home-page .nav-menu ul li a {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_menu_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_serchicon_color = get_theme_mod('water_sports_club_serchicon_color');
	$water_sports_club_serchiconbg_color = get_theme_mod('water_sports_club_serchiconbg_color');
	if ( $water_sports_club_serchicon_color != '') {
		$water_sports_club_custom_style .=' .page-template-custom-home-page .search-box i {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_serchicon_color).'; background-color:'.esc_attr($water_sports_club_serchiconbg_color).';';
		$water_sports_club_custom_style .=' }';
	}

	//Slider css
	$water_sports_club_slider_title_font_size = get_theme_mod('water_sports_club_slider_title_font_size');
	if( $water_sports_club_slider_title_font_size != ''){
		$water_sports_club_custom_style .=' #slider .inner_carousel h2 {';
			$water_sports_club_custom_style .=' font-size: '.esc_attr($water_sports_club_slider_title_font_size).'px;';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_slider_text_font_size = get_theme_mod('water_sports_club_slider_text_font_size');
	if( $water_sports_club_slider_text_font_size != ''){
		$water_sports_club_custom_style .=' #slider .inner_carousel p {';
			$water_sports_club_custom_style .=' font-size: '.esc_attr($water_sports_club_slider_text_font_size).'px;';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_slider_color = get_theme_mod('water_sports_club_slider_color');
	if ( $water_sports_club_slider_color != '') {
		$water_sports_club_custom_style .=' #slider .inner_carousel h2 a  {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_slider_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_sliderbtn_color = get_theme_mod('water_sports_club_sliderbtn_color');
	$water_sports_club_sliderbtnbg_color = get_theme_mod('water_sports_club_sliderbtnbg_color');

	if ( $water_sports_club_sliderbtn_color != '') {
		$water_sports_club_custom_style .=' #slider .read-btn a {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_sliderbtn_color).'; background-color:'.esc_attr($water_sports_club_sliderbtnbg_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_sliderbtnhvr_color = get_theme_mod('water_sports_club_sliderbtnhvr_color');
	$water_sports_club_sliderbtnhvrbg_color = get_theme_mod('water_sports_club_sliderbtnhvrbg_color');

	if ( $water_sports_club_sliderbtnhvr_color != '') {
		$water_sports_club_custom_style .=' #slider .read-btn a:hover {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_sliderbtnhvr_color).'; background-color:'.esc_attr($water_sports_club_sliderbtnhvrbg_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_slidernp_color = get_theme_mod('water_sports_club_slidernp_color');
	$water_sports_club_slidernpbg_color = get_theme_mod('water_sports_club_slidernpbg_color');

	if ( $water_sports_club_slidernp_color != '') {
		$water_sports_club_custom_style .=' #slider .carousel-control-next i, #slider .carousel-control-prev i {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_slidernp_color).'; background-color:'.esc_attr($water_sports_club_slidernpbg_color).';';
		$water_sports_club_custom_style .=' }';
	}

	//courses color
	$water_sports_club_courses_img_size = get_theme_mod('water_sports_club_courses_img_size');
	if( $water_sports_club_courses_img_size != ''){
		$water_sports_club_custom_style .=' #our-services img{';
			$water_sports_club_custom_style .=' width: '.esc_attr($water_sports_club_courses_img_size).'px; height: '.esc_attr($water_sports_club_courses_img_size).'px;';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_course_heading_font_size = get_theme_mod('water_sports_club_course_heading_font_size');
	if( $water_sports_club_course_heading_font_size != ''){
		$water_sports_club_custom_style .=' .service-title h2 {';
			$water_sports_club_custom_style .=' font-size: '.esc_attr($water_sports_club_course_heading_font_size).'px;';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_course_text_font_size = get_theme_mod('water_sports_club_course_text_font_size');
	if( $water_sports_club_course_text_font_size != ''){
		$water_sports_club_custom_style .=' .service-title p {';
			$water_sports_club_custom_style .=' font-size: '.esc_attr($water_sports_club_course_text_font_size).'px;';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_courses_font_size = get_theme_mod('water_sports_club_courses_font_size');
	if( $water_sports_club_courses_font_size != ''){
		$water_sports_club_custom_style .=' .service-content h3 a {';
			$water_sports_club_custom_style .=' font-size: '.esc_attr($water_sports_club_courses_font_size).'px;';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_courses_text_font_size = get_theme_mod('water_sports_club_courses_text_font_size');
	if( $water_sports_club_courses_text_font_size != ''){
		$water_sports_club_custom_style .=' .service-content p {';
			$water_sports_club_custom_style .=' font-size: '.esc_attr($water_sports_club_courses_text_font_size).'px;';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_course_heading_color = get_theme_mod('water_sports_club_course_heading_color');
	if ( $water_sports_club_course_heading_color != '') {
		$water_sports_club_custom_style .=' .service-title h2 {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_course_heading_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_course_subheading_color = get_theme_mod('water_sports_club_course_subheading_color');
	if ( $water_sports_club_course_subheading_color != '') {
		$water_sports_club_custom_style .=' .service-title p {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_course_subheading_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_course_boxtitle_color = get_theme_mod('water_sports_club_course_boxtitle_color');
	if ( $water_sports_club_course_boxtitle_color != '') {
		$water_sports_club_custom_style .=' .service-content h3 a {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_course_boxtitle_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_course_boxtitlebg_color = get_theme_mod('water_sports_club_course_boxtitlebg_color');
	if ( $water_sports_club_course_boxtitlebg_color != '') {
		$water_sports_club_custom_style .=' .service-content h3 {';
			$water_sports_club_custom_style .=' background-color:'.esc_attr($water_sports_club_course_boxtitlebg_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_course_boxtext_color = get_theme_mod('water_sports_club_course_boxtext_color');
	if ( $water_sports_club_course_boxtext_color != '') {
		$water_sports_club_custom_style .=' .service-content p {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_course_boxtext_color).';';
		$water_sports_club_custom_style .=' }';
	}

	$water_sports_club_coursebtn_color = get_theme_mod('water_sports_club_coursebtn_color');
	$water_sports_club_coursebtnbg_color = get_theme_mod('water_sports_club_coursebtnbg_color');

	if ( $water_sports_club_coursebtn_color != '') {
		$water_sports_club_custom_style .=' .service-content .read-btn a {';
			$water_sports_club_custom_style .=' color:'.esc_attr($water_sports_club_coursebtn_color).'; background-color:'.esc_attr($water_sports_club_coursebtnbg_color).';';
		$water_sports_club_custom_style .=' }';
	}