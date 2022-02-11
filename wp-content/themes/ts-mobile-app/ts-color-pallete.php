<?php
/*-------------------------- Button Settings option------------------*/

	$bb_mobile_application_button_padding_top_bottom = get_theme_mod('bb_mobile_application_button_padding_top_bottom');
	$bb_mobile_application_button_padding_left_right = get_theme_mod('bb_mobile_application_button_padding_left_right');
	$bb_mobile_application_custom_css .='#slider .know-btn a, #about-mobile .know-btn a{';
		$bb_mobile_application_custom_css .='padding-top: '.esc_attr($bb_mobile_application_button_padding_top_bottom).'px; padding-bottom: '.esc_attr($bb_mobile_application_button_padding_top_bottom).'px; padding-left: '.esc_attr($bb_mobile_application_button_padding_left_right).'px; padding-right: '.esc_attr($bb_mobile_application_button_padding_left_right).'px; display:inline-block;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_button_border_radius = get_theme_mod('bb_mobile_application_button_border_radius');
	$bb_mobile_application_custom_css .='#slider .know-btn a, #about-mobile .know-btn a{';
		$bb_mobile_application_custom_css .='border-radius: '.esc_attr($bb_mobile_application_button_border_radius).'px;';
	$bb_mobile_application_custom_css .='}';

	// css
	$bb_mobile_application_show_header = get_theme_mod( 'bb_mobile_application_slider_hide_show', false);
	if($bb_mobile_application_show_header == false){
		$bb_mobile_application_custom_css .='.page-template-custom-front-page #header{';
			$bb_mobile_application_custom_css .=' background: #b73558;';
		$bb_mobile_application_custom_css .='}';
	}
