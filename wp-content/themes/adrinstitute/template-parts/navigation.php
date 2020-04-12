<?php

/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package PtasDevz
 * @subpackage Adrinsitute
 * @since 1.0.0
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ($next_post || $prev_post) {

	$pagination_classes = '';

	if (!$next_post) {
		$pagination_classes = ' only_one only_prev';
	} elseif (!$prev_post) {
		$pagination_classes = ' only_one only_next';
	}

?>

	<nav class="pagination_single <?php echo esc_attr($pagination_classes); ?>">

		<div class="pagination_single_inner">

			<?php
			if ($prev_post) {
			?>

				<a class="previous_post" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
					<span class="arrow"><i class="fa fa-chevron-left"></i>&nbsp;Previous</span>
					<span class="title"><span class="title_inner"><?php echo wp_kses_post(get_the_title($prev_post->ID)); ?></span></span>
				</a>

			<?php
			}

			if ($next_post) {
			?>

				<a class="next_post" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
					<span class="arrow">Next&nbsp;<i class="fa fa-chevron-right"></i></span>
					<span class="title"><span class="title_inner"><?php echo wp_kses_post(get_the_title($next_post->ID)); ?></span></span>
				</a>
			<?php
			}
			?>

		</div>

	</nav>
<?php
}
