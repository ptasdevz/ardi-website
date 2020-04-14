<?php

/**
 * Custom comment walker for this theme.
 *
 * @package WordPress
 * @subpackage Adri
 * @since 1.0.0
 */

if (!class_exists('Adri_Walker_Comment')) {

	/**
	 * CUSTOM COMMENT WALKER
	 * A custom walker for comments
	 */
	class Adri_Walker_Comment extends Walker_Comment
	{

		/**
		 * Outputs a comment in the HTML5 format.
		 *
		 * @see wp_list_comments()
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author/
		 * @see https://developer.wordpress.org/reference/functions/get_avatar/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
		 * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
		 *
		 * @param WP_Comment $comment Comment to display.
		 * @param int        $depth   Depth of the current comment.
		 * @param array      $args    An array of arguments.
		 */
		protected function html5_comment($comment, $depth, $args)
		{

			$tag = ('div' === $args['style']) ? 'div' : 'li';

?>
			<<?php echo $tag; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output 
				?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : '', $comment); ?>>
				<article id="div_comment_<?php comment_ID(); ?>" class="comment_body">

					<div class="comment_author_img">
						<?php
						$comment_author_url = get_comment_author_url($comment);
						$comment_author     = get_comment_author($comment);
						$avatar             = get_avatar($comment, $args['avatar_size']);
						if (0 !== $args['avatar_size']) {
							if (empty($comment_author_url)) {
								echo wp_kses_post($avatar);
							} else {
								printf('<a href="%s" rel="external nofollow" class="url">', $comment_author_url); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Escaped in https://developer.wordpress.org/reference/functions/get_comment_author_url/
								echo wp_kses_post($avatar);
							}
						}

						// printf(
						// 	'<span class="fn">%1$s</span><span class="screen_reader_text says">%2$s</span>',
						// 	esc_html( $comment_author ),
						// 	__( 'says:', 'adrinstitute' )
						// );

						// if ( ! empty( $comment_author_url ) ) {
						// 	echo '</a>';
						// }
						?>
					</div>
					<div class="comment_info">

						<div class="comment_meta">

							<div class="comment_metadata">
								<?php
								printf(
									'<span class="fn">%1$s</span><span class="screen_reader_text says">%2$s</span>',
									esc_html(adri_capitalize_each_word($comment_author)),
									__('', 'adrinstitute')
								);

								if (!empty($comment_author_url)) {
									echo '</a>';
								}
								?>
								<div class="date_time_reply_link">
									<a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
										<?php
										/* Translators: 1 = comment date, 2 = comment time */
										$comment_timestamp = sprintf(__('%1$s at %2$s', 'adrinstitute'), get_comment_date('', $comment), get_comment_time());
										?>
										<time datetime="<?php comment_time('c'); ?>" title="<?php echo esc_attr($comment_timestamp); ?>">
										&nbsp;&nbsp;<i class='fa fa-calendar-alt'></i>&nbsp;<?php echo esc_html($comment_timestamp); ?>
										</time>
									</a>
									<?php
									if (get_edit_comment_link()) {
										// echo ' <span>&bull;</span> <a class="comment_edit_link" href="' . esc_url(get_edit_comment_link()) . '">' . __('Edit', 'adrinstitute') . '</a>';
										echo '&nbsp <a class="comment_edit_link" href="' . esc_url(get_edit_comment_link()) . '"> <i class="fa fa-edit"></i></a>';
									}
									?>
								</div>
							</div>

						</div>

						<div class="comment_content entry_content">

							<?php

							comment_text();

							if ('0' === $comment->comment_approved) {
							?>
								<p class="comment_awaiting_moderation"><?php _e('Your comment is awaiting moderation.', 'adrinstitute'); ?></p>
							<?php
							}

							?>

						</div>

						<?php

						$comment_reply_link = get_comment_reply_link(
							array_merge(
								$args,
								array(
									'add_below' => 'div_comment',
									'depth'     => $depth,
									'max_depth' => $args['max_depth'],
									'before'    => '<span class="comment_reply">',
									'after'     => '</span>',
								)
							)
						);

						$by_post_author = adrinstitute_is_comment_by_post_author($comment);

						if ($comment_reply_link || $by_post_author) {
						?>

							<footer class="comment_footer_meta">

								<?php
								if ($comment_reply_link) {
									echo $comment_reply_link .'&nbsp'; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Link is escaped in https://developer.wordpress.org/reference/functions/get_comment_reply_link/
								}
								if ($by_post_author) {
									echo '<span class="by_post_author">' . __('By: Post Author', 'adrinstitute') . '</span>';
								}
								?>

							</footer>

						<?php
						}
						?>
					</div>

				</article>

	<?php
		}
	}
}
