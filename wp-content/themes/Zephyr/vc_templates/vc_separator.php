<?php
$attributes = shortcode_atts(
	array(
		'type' => "",
		'size' => "",
		'icon' => "",
		'text' => "",
		'el_class' => "",
	), $atts);

$simple_class = '';

$attributes['icon'] = trim($attributes['icon']);

if ($attributes['icon'] == '' AND $attributes['text'] == '') {
	$simple_class = ' no_icon';
}

if ($attributes['text'] != '') {
	$simple_class = ' with_text';
	$content_part = '<h6>'.$attributes['text'].'</h6>';
} else {
	if (substr($attributes['icon'], 0, 4) == 'mdfi') {
		$content_part = '<i class="'.str_replace('-', '_', $attributes['icon']).'"></i>';
	} else {
		if (substr($attributes['icon'], 0, 3) == 'fa-') {
			$content_part = '<i class="fa '.$attributes['icon'].'"></i>';
		} else {
			$content_part = '<i class="fa fa-'.$attributes['icon'].'"></i>';
		}

	}
}

$type_class = ($attributes['type'] != '')?' type_'.$attributes['type']:'';
$size_class = ($attributes['size'] != '')?' size_'.$attributes['size']:'';
if ($attributes['el_class'] != '') {
	$attributes['el_class'] = ' '.$attributes['el_class'];
}

$output = 	'<div class="g-hr'.$type_class.$size_class.$simple_class.$attributes['el_class'].'">
						<span class="g-hr-h">
							'.$content_part.'
						</span>
					</div>';

echo $output;
