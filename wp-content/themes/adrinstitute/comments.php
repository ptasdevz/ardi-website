<?php
/**
 * The template file for displaying the comments and comment form for the
 * Adrinsitute theme.
 *
 * @package PtasDevz
 * @subpackage Adrinsitute
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}

if ( $comments ) {
	?>

	<div class="comments" id="comments">

		<?php
		$comments_number = absint( get_comments_number() );
		?>

		<div class="comments_header">

			<h2 class="comment_reply_title">
			<?php
			if ( ! have_comments() ) {
				_e( 'Leave a comment', 'adrinstitute' );
			} elseif ( '1' === $comments_number ) {
				/* translators: %s: post title */
				// printf( _x( 'One reskply on &ldquo;%s&rdquo;', 'comments title', 'adrinstitute' ), esc_html( get_the_title() ) );
				printf( _x( 'One Comment on &ldquo;%s&rdquo;', 'comments title', 'adrinstitute' ), esc_html( get_the_title() ) );
			} else {
				echo sprintf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Comment',
						'%1$s Comments',
						$comments_number,
						'comments title',
						'adrinstitute'
					),
					number_format_i18n( $comments_number ),
					esc_html( get_the_title() )
				);
			}
			// _nx(
			// 	'%1$s comment on &ldquo;%2$s&rdquo;',
			// 	'%1$s comments on &ldquo;%2$s&rdquo;',
			// 	$comments_number,
			// 	'comments title',
			// 	'adrinstitute'
			// )

			?>
			</h2>
			<i class="close_open_arrow fa fa-chevron-up"></i>

		</div>

		<div class="comments_inner">

			<?php
			wp_list_comments(
				array(
					'walker'      => new Adri_Walker_Comment(),
					'avatar_size' => 40,
					'style'       => 'div',
				)
			);

			$comment_pagination = paginate_comments_links(
				array(
					'echo'      => false,
					'end_size'  => 0,
					'mid_size'  => 0,
					'next_text' => __( 'Newer Comments', 'adrinstitute' ) . ' <span aria-hidden="true">&rarr;</span>',
					'prev_text' => '<span aria-hidden="true">&larr;</span> ' . __( 'Older Comments', 'adrinstitute' ),
				)
			);

			if ( $comment_pagination ) {
				$pagination_classes = '';

				// If we're only showing the "Next" link, add a class indicating so.
				if ( false === strpos( $comment_pagination, 'prev page-numbers' ) ) {
					$pagination_classes = ' only-next';
				}
				?>

				<nav class="comments-pagination pagination<?php echo $pagination_classes; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>" aria-label="<?php esc_attr_e( 'Comments', 'adrinstitute' ); ?>">
					<?php echo wp_kses_post( $comment_pagination ); ?>
				</nav>

				<?php
			}
			?>

		</div>

	</div>

	<?php
}

if ( comments_open() || pings_open() ) {

	if ( $comments ) {
		echo '<hr class="styled_separator" />';
	}

	comment_form(
		array(
			'class_form'         => 'section-inner',
			'title_reply_before' => '<h2 id="reply_title" class="comment_reply_title">',
			'title_reply_after'  => '</h2>',
		)
	);

} elseif ( is_single() ) {

	if ( $comments ) {
		echo '<hr class="styled_separator />';
	}

	?>

	<div class="comment_respond" id="respond">

		<p class="comments_closed"><?php _e( 'Comments are closed.', 'adrinstitute' ); ?></p>

	</div>

	<?php
}
