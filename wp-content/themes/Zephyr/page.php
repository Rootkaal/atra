<?php
define('THEME_TEMPLATE', TRUE);
define('IS_FULLWIDTH', TRUE);
global $smof_data;
get_header(); ?>
<?php if (have_posts()) { while(have_posts()) { the_post(); ?>
	<?php get_template_part( 'templates/pagehead' ); ?>
	<?php if (us_is_vc_fe()) { ?>
		<div class="l-submain">
			<div class="l-submain-h g-html i-cf">
				<?php the_content(); ?>
			</div>
		</div>
	<?php } else { ?>
		<?php the_content(); ?>
		<?php
		$link_pages_args = array(
			'before'           => '<div class="w-blog-pagination"><nav class="navigation pagination" role="navigation">',
			'after'            => '</nav></div>',
			'next_or_number'   => 'next_and_number',
			'nextpagelink'     => '>',
			'previouspagelink' => '<',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'echo'             => 1
		);
		if (function_exists('us_wp_link_pages')) {
			us_wp_link_pages($link_pages_args);
		} else {
			wp_link_pages();
		}
		?>
	<?php } ?>
	<?php if (@$smof_data['page_comments'] == 1 AND (comments_open() || get_comments_number() != '0')) { ?>
	<div class="l-submain for_comments color_alternate">
		<div class="l-submain-h g-html i-cf">
		<?php comments_template();?>
		</div>
	</div>
	<?php } ?>
<?php }  } else { ?>
	<?php _e('No posts were found.', 'us'); ?>
<?php } ?>
<?php get_footer(); ?>
