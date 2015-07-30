<?php
if (us_is_vc_fe()) {
	$default_dir = vc_manager()->getDefaultShortcodesTemplatesDir() . '/';
	if ( is_file( $default_dir . 'vc_row.php' ) ) {
		include( $default_dir . 'vc_row.php' );
		return;
	}
}
$output = $el_class = '';
extract(shortcode_atts(array(
	'el_class' => '',
	'boxed_columns' => '',
	'section' => '',
	'full_width' => '',
	'full_height' => '',
	'full_screen' => '',
	'vertical_centering' => '',
	'background' => '',
	'img' => '',
	'bg_fade' => '',
	'parallax' => '',
	'class' => '',
	'section_id' => '',
	'video' => '',
	'video_mp4' => '',
	'video_ogg' => '',
	'video_webm' => '',
	'overlay' => '',
	'bg_color' => '',
	'text_color' => '',
	'enable_overlay' => null,
	'overlay_color' => '',
	'css' => '',
), $atts));

//wp_enqueue_script( 'wpb_composer_front_js' );

if ($el_class != '') {
	$class = $el_class;
}

$additional_class = ($class != '' AND $section != 'yes')?' '.$class:'';

$custom_css_class = (function_exists('vc_shortcode_custom_css_class'))?vc_shortcode_custom_css_class( $css, ' ' ):'';

$column_class = ($boxed_columns == 'yes')?' offset_none type_boxed':' offset_wide';

$css_class =  'g-cols wpb_row'.$column_class.$custom_css_class;

$row_id_param = '';

if ($section == 'yes') {
	$bg_params = '';
	if ($bg_fade != '') {
		$bg_params = ' bg_fade="'.$bg_fade.'"';
	}
	$parallax_params = '';
	if ($parallax != '' and $img != '') {
		$parallax_speed = 0.6;
		if ($parallax == 'still') {
			$parallax = 'vertical';
			$parallax_speed = 0;
		}
		$parallax_params = ' parallax="'.$parallax.'" parallax_speed="'.$parallax_speed.'"';
	}
	$full_width_params = '';
	if ($full_width == 'yes') {
		$full_width_params .= ' full_width="1"';
	}
	if ($full_height == 'yes') {
		$full_width_params .= ' full_height="1"';
	}
	if ($full_screen == 'yes') {
		$full_width_params .= ' full_screen="1"';
	}
	if ($vertical_centering == 'yes') {
		$full_width_params .= ' vertical_centering="1"';
	}
	$section_class_param = ($class != '')?' class="'.$class.'"':'';
	$section_id_param = ($section_id != '')?' id="'.$section_id.'"':'';
	$video_params = '';
	if ($video == 'yes') {
		$video_params = ' video="1" video_mp4="'.$video_mp4.'" video_ogg="'.$video_ogg.'" video_webm="'.$video_webm.'"';
	}

	$us_overlay_color = '';
	if ($overlay_color != '' AND empty($enable_overlay)) {
		$us_overlay_color = $overlay_color;
	}
	$output .= '[section background="'.$background.'" bg_color="'.$bg_color.'" text_color="'.$text_color.'" overlay_color="'.$us_overlay_color.'" img="'.$img.'"'.$bg_params.$full_width_params.$parallax_params.$section_class_param.$section_id_param.$video_params.']';
} else {
	$row_id_param = ($section_id != '')?' id="'.$section_id.'"':'';
}

$output .= '<div class="'.$css_class.$additional_class.'"'.$row_id_param.'>';
$output .= do_shortcode($content);
$output .= '</div>';

if ($section == 'yes') {
	$output .= '[/section]';
}
echo $output;

