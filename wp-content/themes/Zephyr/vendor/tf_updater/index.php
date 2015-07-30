<?php
/*
	Plugin Name: Themeforest Themes Update
	Plugin URI: https://github.com/bitfade/themeforest-themes-update
	Description: Updates all themes purchased from themeforest.net
	Author: pixelentity
	Version: 1.0
	Author URI: http://pixelentity.com
*/

global $smof_data;

if (@$smof_data['themeforest_username'] != '' AND @$smof_data['themeforest_api_key'] != '') {
	function us_themeforest_themes_update($updates) {

		global $smof_data;

		if (isset($updates->checked)) {
			require_once(get_template_directory()."/vendor/tf_updater/pixelentity-themes-updater/class-pixelentity-themes-updater.php");

			$username = $smof_data['themeforest_username'];
			$apikey = $smof_data['themeforest_api_key'];
			$author = 'UpSolution';

			$updater = new Pixelentity_Themes_Updater($username, $apikey, $author);
			$updates = $updater->check($updates);
		}
		return $updates;
	}

	add_filter("pre_set_site_transient_update_themes", "us_themeforest_themes_update");

}

//add_filter("pre_set_site_transient_update_plugins", "us_plugins_update");
//
//function us_plugins_update($updates) {
//
//	if (isset($updates->checked)) {
//
//		$plugins = get_plugins();
//		$keys = array_keys( $plugins );
//
//		foreach ( $keys as $key ) {
//			if ( preg_match( '|^revslider/|', $key ) ) {
//				if ( is_plugin_active( $key ) ) {
//					if(version_compare($plugins[$key]['Version'], '4.6.9', '<')) {
//
//
//						$update = new stdClass();
//						$update->slug = 'revslider';
//						$update->new_version = '4.6.9';
//						$update->url = 'http://codanyon.net/item/theme/';
//						$update->package = get_template_directory() . '/vendor/plugins/revslider.zip';
//						$update->name = 'Slider Revolution';
//
//						$updates->response[$key] = $update;
//					}
//				}
//			}
//		}
//
//	}
//	return $updates;
//
//}
