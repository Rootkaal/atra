<?php
if (us_is_vc_fe()) {
	$default_dir = vc_manager()->getDefaultShortcodesTemplatesDir() . '/';
	if ( is_file( $default_dir . 'vc_tabs.php' ) ) {
		include( $default_dir . 'vc_tabs.php' );
		return;
	}
}
$attributes = shortcode_atts(
	array(
		'timeline' => '',
		'type' => '',
		'el_class' => '',
	), $atts);

global $first_tab, $first_tab_title, $auto_open, $is_timeline;
$auto_open = TRUE;
$first_tab_title = TRUE;
$first_tab = TRUE;

if ($attributes['el_class'] != '') {
	$attributes['el_class'] = ' '.$attributes['el_class'];
}

//$type_class = ($attributes['type'] != '')?' type_'.$attributes['type']:' type_1';

if ($attributes['timeline'] == 'yes') {
	$is_timeline = TRUE;

	$content_titles = str_replace('[vc_tab', '[timepoint_title', $content);
	$content_titles = str_replace('[/vc_tab', '[/timepoint_title', $content_titles);

	$output = '<div class="w-timeline'.$attributes['el_class'].'"><div class="w-timeline-list">'.do_shortcode($content_titles).'</div><div class="w-timeline-sections">'.do_shortcode($content).'</div></div>';
} else {
	$is_timeline = FALSE;

	$tabs_id = 'tabs_'.rand(99999, 999999);
	$tabs_id_string = ' id="'.$tabs_id.'"';

	$content_titles = str_replace('[vc_tab', '[item_title', $content);
	$content_titles = str_replace('[/vc_tab', '[/item_title', $content_titles);

	$output = '<div class="w-tabs'.$attributes['el_class'].'"'.$tabs_id_string.'><div class="w-tabs-list">'.do_shortcode($content_titles).'</div>'.do_shortcode($content).'</div>';
}

$is_timeline = FALSE;
$auto_open = FALSE;
$first_tab_title = FALSE;
$first_tab = FALSE;

echo $output;