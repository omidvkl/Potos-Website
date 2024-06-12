<?php

// Comment Reply Script.
if ( comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );

?>

<section id="comments" class="comments-area">

<?php if ( have_comments() ) : ?>
<div class="comments-list">
		<h2 class="title-comments harika-box-title">
			<?php
			$comments_number = get_comments_number();
				printf(
					esc_html( /* translators: 1: number of comments */
						_nx(
							'دیدگاه کاربران (%1$s دیدگاه)',
							'دیدگاه کاربران (%1$s دیدگاه)',
							$comments_number,
							'comments title'
						)
					),
					esc_html( number_format_i18n( $comments_number ) )
				);
			
			?>
		</h2>

		<?php the_comments_navigation(); ?>

	<ol class="comment-list">
		<?php
		wp_list_comments(
			array(
				'walker'      => new Harika_Walker_Comment(),
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 40,
			)
		);
		?>
	</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>
</div>

<?php endif; // Check for have_comments(). ?>




<div class="comments-form">

<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.' ); ?></p>
<?php endif; ?>

<?php
harika_comment_form(
	array(
		'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title harika-box-title">',
		'title_reply_after'  => '</h2>',
	)
);
?>

</div>
</section>

<?php
}