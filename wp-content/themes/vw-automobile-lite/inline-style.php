<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_automobile_lite_first_color = get_theme_mod('vw_automobile_lite_first_color');

	$custom_css = '';

	if($vw_automobile_lite_first_color != false){
		$custom_css .='#comments a.comment-reply-link:hover,.sidebar ul li::before,.yearwrap,.date-monthwrap,.logowrapper, #header li.current_page_item, .menubox .nav ul li a:hover, #header .nav ul.sub-menu li a:hover, #header .nav ul.sub-menu li a, .search-box i, .slider .more-btn a, .footer-2, .scrollup i, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .hvr-sweep-to-right:before, .sidebar .custom-social-icons i, .footer .custom-social-icons i:hover{';
			$custom_css .='background-color: '.esc_html($vw_automobile_lite_first_color).';';
		$custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$custom_css .='.search-submit, #comments input[type="submit"].submit{';
			$custom_css .='background-color: '.esc_html($vw_automobile_lite_first_color).'!important;';
		$custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$custom_css .='a, span.email i, span.timings i, span.call i, .sidebar .widget h3, .post-main-box h3, .blogbutton-small, h2.single-post-title, .sidebar .custom-social-icons i:hover{';
			$custom_css .='color: '.esc_html($vw_automobile_lite_first_color).';';
		$custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$custom_css .='.slider .more-btn a, .blogbutton-small{';
			$custom_css .='border-color: '.esc_html($vw_automobile_lite_first_color).';';
		$custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$custom_css .='.search-submit, .blogbutton-small{';
			$custom_css .='border-color: '.esc_html($vw_automobile_lite_first_color).'!important;';
		$custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$custom_css .='.footer h3{';
			$custom_css .='border-bottom-color: '.esc_html($vw_automobile_lite_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_automobile_lite_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.logowrapper{';
			$custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(-70deg, transparent 13%, #ff5400 0%) repeat scroll 0 0; position: relative; left: -1em; transform: none;';
		$custom_css .='}';
		$custom_css .='#header .logo{';
			$custom_css .='padding: 8% 0; text-align: center; transform: skew(-20deg);';
		$custom_css .='}';
		$custom_css .='.menubox{';
			$custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(115deg, transparent 6%, #212121 0%) repeat scroll 0 0';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.logowrapper{';
			$custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(-68deg, transparent 13%, #ff5400 0%) repeat scroll 0 0; position: relative; left: -1em; transform: none;';
		$custom_css .='}';
		$custom_css .='#header .logo{';
			$custom_css .='padding: 8% 0; text-align: center; transform: skew(-10deg);';
		$custom_css .='}';
		$custom_css .='.menubox{';
			$custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(115deg, transparent 6%, #212121 0%) repeat scroll 0 0';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_automobile_lite_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_automobile_lite_slider_content_option','Center');
    if($theme_lay == 'Left'){
		$custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h2{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h2{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h2{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}