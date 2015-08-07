<?php global $smof_data; ?><!DOCTYPE HTML>
<?php
$no_responsive_class = ( ! isset($smof_data['responsive_layout']) OR $smof_data['responsive_layout'] == 1) ? '':'no-responsive';
?>
<html class="<?php echo $no_responsive_class;?>" <?php language_attributes('html')?>>
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(''); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

<?php if ( ! empty( $smof_data['custom_favicon'] ) ): ?>
	<link rel="shortcut icon" href="<?php echo esc_url( $smof_data['custom_favicon'] ); ?>">
<?php endif; ?>

	<?php wp_head(); ?>
	<?php
	global $load_styles_directly;
	if ( isset( $load_styles_directly ) AND $load_styles_directly ) {
		get_template_part( 'templates/custom_css' );
	}
	?>

</head><?php
$body_background_styles_text = '';

$body_background_image = (@$smof_data['body_background_image'] != '')?@$smof_data['body_background_image']:'';

if ($body_background_image != '')
{
	$body_background_styles = array( 'background-image' => 'url('.$body_background_image.')');

	$body_background_image_stretch = (@$smof_data['body_background_image_stretch'] == 1)?TRUE:FALSE;
	if ($body_background_image_stretch) {
		$body_background_styles['background-size'] = 'cover';
	}

	if (@$smof_data['body_background_image_repeat'] != '') {
		$backgroundRepeatCss = array(
			'Repeat' => 'repeat',
			'Repeat Horizontally' => 'repeat-x',
			'Repeat Vertically' => 'repeat-y',
			'Do Not Repeat' => 'no-repeat',
		);
		$body_background_styles['background-repeat'] = $backgroundRepeatCss[@$smof_data['body_background_image_repeat']];
	}

	if (@$smof_data['body_background_image_position'] != '') {
		$body_background_styles['background-position'] = @$smof_data['body_background_image_position'];
	}

	if (@$smof_data['body_background_image_attachment_fixed'] == 1) {

		$body_background_styles['background-attachment'] = 'fixed';
	}

	foreach ($body_background_styles as $body_background_style => $body_background_style_val)
	{
		$body_background_styles_text .= $body_background_style.': '.$body_background_style_val.';';
	}
}
$woocommerce_class = '';
if (defined('COLUMNS_QTY_CLASS')) {
	$woocommerce_class .= ' '.COLUMNS_QTY_CLASS;
}
if (defined('WOO_STYLING_CLASS')) {
	$woocommerce_class .= ' '.WOO_STYLING_CLASS;
}

$theme_version = str_replace('.', '-', us_get_main_theme_version());
$theme_class = 'us-theme_zephyr_'.$theme_version;
?>
<body <?php body_class('l-body '.$theme_class.$woocommerce_class); ?><?php echo  ($body_background_styles_text != '')?' style="'.$body_background_styles_text.'"':''; ?>>
<?php
if (defined('IS_FULLWIDTH') AND IS_FULLWIDTH)
{
	$sidebar_position_class = 'col_cont';
}
elseif (defined('IS_POST') AND IS_POST)
{
	$sidebar_position_class = (@$smof_data['post_sidebar_pos'] == 'Right')?'col_contside':'col_sidecont';
}
elseif (defined('IS_BLOG') AND IS_BLOG)
{
	$sidebar_position_class = (@$smof_data['blog_sidebar_pos'] == 'Right')?'col_contside':'col_sidecont';
}
else
{
	$sidebar_position_class = (defined('SIDEBAR_POS') AND SIDEBAR_POS == 'right')?'col_contside':'col_sidecont';
}

$layout_class = (isset($smof_data['boxed_layout']) AND $smof_data['boxed_layout'] == 1)?'type_boxed':'type_wide';

$extended_header_class = ' headerlayout_standard';
if (isset($smof_data['main_header_layout'])){
	$extended_header_class = ' headerlayout_'.$smof_data['main_header_layout'];
}

$logo_pos_class = '';
if (isset($smof_data['header_invert_logo_pos']) AND $smof_data['header_invert_logo_pos']) {
	$logo_pos_class = ' logopos_right';
}

$header_transparent_class = $header_position_class = '';
if (isset($smof_data['header_is_sticky']) AND $smof_data['header_is_sticky'] == 1){
	$header_position_class = ' headerpos_fixed';
	if (isset($smof_data['header_bg_transparent']) AND $smof_data['header_bg_transparent'] == 1){
		$header_position_class .= ' headerbg_transparent';
		$header_transparent_class = ' transparent';
	}
}else{
	$header_position_class = ' headerpos_static';
}

if (rwmb_meta('us_header_type') == 'Sticky Transparent') {
	$header_position_class = ' headerpos_fixed headerbg_transparent';
	$header_transparent_class = ' transparent';
} elseif (rwmb_meta('us_header_type') == 'Sticky Solid') {
	$header_position_class = ' headerpos_fixed';
	$header_transparent_class = '';
} elseif (rwmb_meta('us_header_type') == 'Non-sticky') {
	$header_position_class = '';
	$header_transparent_class = '';
}

if (defined('IS_BLOG') AND IS_BLOG) {
	$header_transparent_class = '';
	if ($header_position_class == ' headerpos_fixed headerbg_transparent') {
		$header_position_class = ' headerpos_fixed';
	}
}

$lang_class = (defined('ICL_LANGUAGE_CODE') AND ICL_LANGUAGE_CODE != '')?' wpml_lang_'.ICL_LANGUAGE_CODE:'';


?>
<!-- CANVAS -->
<div class="l-canvas <?php echo $layout_class.' '.$sidebar_position_class.$extended_header_class.$header_position_class.$lang_class; ?>">

	<!-- HEADER -->
	<div class="l-header<?php echo $logo_pos_class.$header_transparent_class; ?>">

		<div class="l-subheader at_top"<?php if ( ! empty($smof_data['header_extra_height']) AND $smof_data['header_extra_height'] >= 36 AND $smof_data['header_extra_height'] <= 60) { echo ' style="line-height: '.intval($smof_data['header_extra_height']).'px; "'; } ?>>
			<div class="l-subheader-h i-cf">
			<?php if (isset($smof_data['main_header_layout']) AND $smof_data['main_header_layout'] == 'extended'): ?>

			<?php if ((isset($smof_data['header_show_contacts']) AND $smof_data['header_show_contacts']) OR (isset($smof_data['header_show_custom']) AND $smof_data['header_show_custom'])): ?>
				<?php get_template_part( 'templates/widgets/contacts', 'header' ); ?>
			<?php endif; ?>

			<?php if ( $smof_data['header_show_language'] ): ?>
				<?php get_template_part( 'templates/widgets/lang', 'header' ); ?>
			<?php endif; ?>

			<?php if (isset($smof_data['header_show_socials']) AND $smof_data['header_show_socials']): ?>
				<?php get_template_part( 'templates/widgets/socials', 'header' ); ?>
			<?php endif; ?>

			<?php endif; /* Ended extended header */ ?>
			</div>
		</div>
		<?php
			if (! empty($smof_data['logo_height']) AND (@$smof_data['header_main_height'] < $smof_data['logo_height'])) {
				$smof_data['header_main_height'] = $smof_data['logo_height'];
			}
		?>
		<div class="l-subheader at_middle" <?php if ( ! empty($smof_data['header_main_height']) AND $smof_data['header_main_height'] >= 50 AND $smof_data['header_main_height'] <= 150) {
			$height_part = '';
			if (@$smof_data['main_header_layout'] == 'advanced'OR @$smof_data['main_header_layout'] == 'centered') {
				$height_part = 'height: '.$smof_data['header_main_height'].'px; ';
			}
			echo ' style="'.$height_part.'line-height: '.$smof_data['header_main_height'].'px;"';
		} ?>>
			<div class="l-subheader-h i-widgets i-cf">

				<div class="w-logo <?php if (@$smof_data['logo_as_text'] == 1) { echo ' with_title'; } ?><?php if ( ! empty($smof_data['custom_logo_transparent'])) { echo ' with_transparent'; } ?>">
					<a class="w-logo-link" href="<?php if (function_exists('icl_get_home_url')) echo icl_get_home_url(); else echo esc_url(home_url('/')); ?>">

						<?php if ( ! empty($smof_data['custom_logo']) OR ! empty($smof_data['custom_logo_transparent'])): ?>
						<span class="w-logo-img">
							<?php if ( ! empty($smof_data['custom_logo'])): ?>
								<img class="for_default" src="<?php if (is_page('homepage')) { echo 'http://atrasolmed.com/wp-content/uploads/2015/08/logo_en.png';} else {echo esc_url($smof_data['custom_logo']);} ?>" alt="<?php bloginfo('name'); ?>">
							<?php endif; ?>
							<?php if ( ! empty($smof_data['custom_logo_transparent'])): ?>
								<img class="for_transparent" src="<?php echo esc_url($smof_data['custom_logo_transparent']); ?>" alt="<?php bloginfo('name'); ?>">
							<?php endif; ?>
							
						</span>
						<?php endif; ?>
						<span class="w-logo-title"><?php if (@$smof_data['logo_text'] != ''){ echo @$smof_data['logo_text']; } else { bloginfo('name'); } ?></span>
					</a>
				</div>

				<?php if (isset($smof_data['main_header_layout']) AND $smof_data['main_header_layout'] == 'advanced') { ?>

					<?php if (isset($smof_data['header_show_socials']) AND $smof_data['header_show_socials']): ?>
						<?php get_template_part( 'templates/widgets/socials', 'header' ); ?>
					<?php endif; ?>

					<?php if ((isset($smof_data['header_show_contacts']) AND $smof_data['header_show_contacts']) OR (isset($smof_data['header_show_custom']) AND $smof_data['header_show_custom'])): ?>
						<?php get_template_part( 'templates/widgets/contacts', 'header' ); ?>
					<?php endif; ?>

					<?php if ( $smof_data['header_show_language'] ): ?>
						<?php get_template_part( 'templates/widgets/lang', 'header' ); ?>
					<?php endif; ?>

				<?php } elseif (isset($smof_data['main_header_layout']) AND $smof_data['main_header_layout'] != 'centered') { ?>

					<?php if ( ! isset($smof_data['header_invert_logo_pos']) OR ! $smof_data['header_invert_logo_pos']): ?>
						<?php get_template_part( 'templates/widgets/cart', 'header' ); ?>
					<?php endif; ?>

					<?php if ( isset( $smof_data['header_show_search'] ) AND $smof_data['header_show_search'] AND ( ! isset( $smof_data['header_invert_logo_pos'] ) OR ! $smof_data['header_invert_logo_pos'] ) ) { ?>
						<?php get_template_part( 'templates/widgets/search', 'header' ); ?>
					<?php } ?>

					<?php get_template_part( 'templates/widgets/nav', 'header' ); ?>

					<?php if (isset($smof_data['header_show_search']) AND $smof_data['header_show_search'] AND isset($smof_data['header_invert_logo_pos']) AND $smof_data['header_invert_logo_pos']): ?>
						<?php get_template_part( 'templates/widgets/search', 'header' ); ?>
					<?php endif; ?>

					<?php if (isset($smof_data['header_invert_logo_pos']) AND $smof_data['header_invert_logo_pos']): ?>
						<?php get_template_part( 'templates/widgets/cart', 'header' ); ?>
					<?php endif; ?>

				<?php } ?>
			</div>
		</div>
		<?php if (isset($smof_data['main_header_layout']) AND ($smof_data['main_header_layout'] == 'advanced' OR $smof_data['main_header_layout'] == 'centered')) { ?>
		<div class="l-subheader at_bottom"<?php if ( ! empty($smof_data['header_extra_height']) AND $smof_data['header_extra_height'] >= 36 AND $smof_data['header_extra_height'] <= 60) { echo ' style="line-height: '.intval($smof_data['header_extra_height']).'px; "'; } ?>>
			<div class="l-subheader-h i-cf">

				<?php if (isset($smof_data['main_header_layout']) AND $smof_data['main_header_layout'] == 'advanced'): ?>
					<?php get_template_part( 'templates/widgets/cart', 'header' ); ?>
				<?php endif; ?>

				<?php if (isset($smof_data['header_show_search']) AND $smof_data['header_show_search'] AND isset($smof_data['main_header_layout']) AND ($smof_data['main_header_layout'] == 'advanced')): ?>
					<?php get_template_part( 'templates/widgets/search', 'header' ); ?>
				<?php endif; ?>

				<?php get_template_part( 'templates/widgets/nav', 'header' ); ?>

				<?php if (isset($smof_data['header_show_search']) AND $smof_data['header_show_search'] AND isset($smof_data['main_header_layout']) AND ($smof_data['main_header_layout'] == 'centered')): ?>
					<?php get_template_part( 'templates/widgets/search', 'header' ); ?>
				<?php endif; ?>

				<?php if (isset($smof_data['main_header_layout']) AND $smof_data['main_header_layout'] == 'centered'): ?>
					<?php get_template_part( 'templates/widgets/cart', 'header' ); ?>
				<?php endif; ?>
			</div>
		</div>
		<?php } ?>

	</div>
	<!-- /HEADER -->

	<!-- MAIN -->
	<div class="l-main">
<?php
if ( ! defined('THEME_TEMPLATE') AND FALSE) {
	// Disabling Section shortcode
	global $disable_section_shortcode;
	$disable_section_shortcode = TRUE;
?>
		<div class="l-submain">
			<div class="l-submain-h g-html i-cf">
<?php } ?>
