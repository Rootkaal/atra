<?php defined('ABSPATH') OR die('This script cannot be accessed directly.'); ?>

<?php
/**
 * Header contacts block
 *
 * (!) Important: do not overload this template in child theme, as it will be moved to other location in one of the
 * next updates.
 *
 * Dev Note: Before loading this file we should make sure that $smof_data['header_show_socials']) is true
 */
global $smof_data; ?>

<div class="w-contacts">
	<div class="w-contacts-list">
	<?php if (isset($smof_data['header_phone']) AND ! empty($smof_data['header_phone'])): ?>
		<div class="w-contacts-item for_phone">
			<span class="w-contacts-item-value"><?php echo wp_kses($smof_data['header_phone'], '<a><strong><span>'); ?></span>
		</div>
	<?php endif; /* header phone */ ?>
	<?php if (isset($smof_data['header_email']) AND ! empty($smof_data['header_email'])): ?>
		<div class="w-contacts-item for_email">
			<span class="w-contacts-item-value"><a href="mailto:<?php echo sanitize_email($smof_data['header_email']); ?>"><?php echo $smof_data['header_email']; ?></a></span>
		</div>
	<?php endif; /* header email */ ?>
	<?php if (isset($smof_data['header_custom_text']) AND ! empty($smof_data['header_custom_text'])): ?>
		<div class="w-contacts-item for_custom">
			<?php
			if (isset($smof_data['header_custom_icon']) AND ! empty($smof_data['header_custom_icon'])) {
				// mdfi-toggle-check-box => mdfi_toggle_check_box
				if (substr($smof_data['header_custom_icon'], 0, 4) == 'mdfi'){
					?><i class="<?php echo str_replace('-', '_', $smof_data['header_custom_icon']); ?>"></i><?php
				}
				// fa-check => fa fa-check
				elseif (substr($smof_data['header_custom_icon'], 0, 3) == 'fa-'){
					?><i class="fa <?php echo $smof_data['header_custom_icon'];?>"></i><?php
				}
				// check => fa fa-check
				else {
					?><i class="fa fa-<?php echo $smof_data['header_custom_icon'];?>"></i><?php
				}
			}
			?>
			<span class="w-contacts-item-value"><?php echo wp_kses($smof_data['header_custom_text'], '<a><strong><span>'); ?></span>
		</div>
	<?php endif; /* header custom text */ ?>
	</div>
</div>

