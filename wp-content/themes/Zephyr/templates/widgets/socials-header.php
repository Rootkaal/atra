<?php defined('ABSPATH') OR die('This script cannot be accessed directly.'); ?>

<?php
/**
 * Header socials block
 *
 * (!) Important: do not overload this template in child theme, as it will be moved to other location in one of the
 * next updates.
 *
 * Dev Note: Before loading this file we should make sure that either $smof_data['header_show_contacts']) or
 * $smof_data['header_show_custom'] is true
 */
global $smof_data;
$socials = array (
	'email' => 'Email',
	'facebook' => 'Facebook',
	'twitter' => 'Twitter',
	'google' => 'Google+',
	'linkedin' => 'LinkedIn',
	'youtube' => 'YouTube',
	'vimeo' => 'Vimeo',
	'flickr' => 'Flickr',
	'instagram' => 'Instagram',
	'behance' => 'Behance',
	'xing' => 'Xing',
	'pinterest' => 'Pinterest',
	'skype' => 'Skype',
	'tumblr' => 'Tumblr',
	'dribbble' => 'Dribbble',
	'vk' => 'Vkontakte',
	'soundcloud' => 'SoundCloud',
	'yelp' => 'Yelp',
	'twitch' => 'Twitch',
	'deviantart' => 'DeviantArt',
	'foursquare' => 'Foursquare',
	'github' => 'GitHub',
	'rss' => 'RSS',
);

$output = '';

foreach ( $socials as $social_key => $social ) {
	if ( ! isset( $smof_data[ 'header_social_' . $social_key ] ) OR empty( $smof_data[ 'header_social_' . $social_key ] ) ) {
		continue;
	}

	$social_url = $smof_data[ 'header_social_' . $social_key ];
	if ( $social_key == 'email' ) {
		if ( filter_var( $social_url, FILTER_VALIDATE_EMAIL ) ) {
			$social_url = 'mailto:' . $social_url;
		}
	}
	elseif ( $social_key == 'skype' ) {
		// Skype link may be some http(s): or skype: link. If protocol is not set, adding "skype:"
		if ( strpos( $social_url, ':' ) === FALSE ) {
			$social_url = 'skype:' . esc_attr($social_url);
		}
	}
	else {
		$social_url = esc_url($social_url);
	}

	$output .= '<div class="w-socials-item '.$social_key.'">
		<a class="w-socials-item-link" target="_blank" href="' . $social_url . '"></a>
		<div class="w-socials-item-popup">
			<span>' . $social . '</span>
		</div>
	</div>';
}

if ( ! empty($output) ) {
	?><div class="w-socials">
		<div class="w-socials-list">
			<?php echo $output; ?>
		</div>
	</div><?php
}

