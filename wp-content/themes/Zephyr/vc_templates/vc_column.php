<?php
if (us_is_vc_fe()) {
	$default_dir = vc_manager()->getDefaultShortcodesTemplatesDir() . '/';
	if ( is_file( $default_dir . 'vc_column.php' ) ) {
		include( $default_dir . 'vc_column.php' );
		return;
	}
}
$output = $el_class = $width = '';
extract(shortcode_atts(array(
	'el_class' => '',
	'width' => '1/1',
	'animate' => '',
	'animate_delay' => '',
	'bg_color' => '',
	'img' => FALSE,
	'text_color' => '',
	'css' => '',
), $atts));


switch ($width) {
	case '1/2': $width_class = 'one-half';
		break;
	case '1/3': $width_class = 'one-third';
		break;
	case '2/3': $width_class = 'two-thirds';
		break;
	case '1/4': $width_class = 'one-quarter';
		break;
	case '3/4': $width_class = 'three-quarters';
		break;
	case '1/6': $width_class = 'one-sixth';
		break;
	case '5/6': $width_class = 'five-sixths';
		break;
	default: $width_class = 'full-width';
}

$animate_class = ($animate != '')?' animate_'.$animate:'';

$animate_delay_classes = array(
	'0.2' => 'd1',
	'0.4' => 'd2',
	'0.6' => 'd3',
	'0.8' => 'd4',
	'1' => 'd5',
);

$animate_class .= (isset($animate_delay_classes[$animate_delay]))?' '.$animate_delay_classes[$animate_delay]:'';

$custom_css_class = (function_exists('vc_shortcode_custom_css_class'))?vc_shortcode_custom_css_class( $css, ' ' ):'';

$css_class = $width_class.$animate_class.$custom_css_class;

if ($el_class != '') {
	$el_class = ' '.$el_class;
}

$item_style = $item_custom_class = '';

if ($bg_color != '') {
	$item_style .= 'background-color: '.$bg_color.';';
}
if ($text_color != '') {
	$item_style .= ' color: '.$text_color.';';
}

if ($img != '')
{
	if (is_numeric($img))
	{
		$img_id = preg_replace('/[^\d]/', '', $img);
		$img = wp_get_attachment_image_src($img_id, 'full', 0);

		if ( $img != NULL )
		{
			$img = $img[0];
			$item_style .= ' background-image: url('.$img.');';
		}

	}
	else
	{
		$item_style .= ' background-image: url('.$img.');';
	}
}

if ($item_style != '') {
	$item_style = ' style="'.$item_style.'"';
	$item_custom_class = ' color_custom';
}


$output = '<div class="'.$css_class.$item_custom_class.$el_class.'"'.$item_style.'>'.do_shortcode($content).'</div>';

echo $output;
