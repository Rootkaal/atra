<?php defined('ABSPATH') OR die('This script cannot be accessed directly.'); ?>

<?php
/**
 * Header search block
 *
 * (!) Important: do not overload this template in child theme, as it will be moved to other location in one of the
 * next updates.
 *
 * Dev Note: Before loading this file we should make sure that $smof_data['header_show_search']) is true
 */
global $smof_data;

?>
<div class="w-search">
	<span class="w-search-show"><i class="mdfi_action_search"></i></span>
	<div class="w-search-form-overlay"></div>
	<form class="w-search-form" action="<?php echo home_url( '/' ); ?>">
		<div class="w-search-form-h">
			<div class="w-search-form-row">
				<?php if (defined('ICL_LANGUAGE_CODE') AND ICL_LANGUAGE_CODE != '') { ?><input type="hidden" name="lang" value="<?php echo ICL_LANGUAGE_CODE; ?>"><?php } ?>
				<div class="w-search-label">
					<label for="s"><?php echo __("Just type and press 'enter'", 'us' ); ?></label>
				</div>
				<div class="w-search-input">
					<input type="text" value="" id="s" name="s"/>
					<span class="w-search-input-bar"></span>
				</div>
				<div class="w-search-submit">
					<input type="submit" id="searchsubmit"  value="Search" />
				</div>
				<div class="w-search-close"> &#10005; </div>
			</div>
		</div>
	</form>
</div>
