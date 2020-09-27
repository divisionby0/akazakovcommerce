<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @subpackage Camp
 * @since Camp 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<div id = "comments">
	<?php if ( ! comments_open() && ! is_page() )
			echo '<p>' . __( 'Comments are closed.', 'camp' ) . '</p>'; ?>
	<?php if ( have_comments() ) : ?>
		<!-- comment navigation -->
		<?php if ( get_comment_pages_count() > 1 ) : ?>
			<div class = "navigation">
				<div class = "alignleft">
					<?php previous_comments_link( __( '&larr; Older comments', 'camp' ) ); ?>
				</div>
				<div class = "alignright">
					<?php next_comments_link( __( 'Newer comments &rarr;', 'camp' ) ); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php $args = array(
			'style'		 => 'li',
			'reply_text' => __( 'Reply', 'camp' ),
			'callback'	 => 'akazakov_comment_callback'
		);?>

		<ol class = "commentlist">
			<?php wp_list_comments( $args ); ?>
		</ol>

		<!-- comment navigation -->
		<?php if ( get_comment_pages_count() > 1 ) : ?>
			<div class = "navigation">
				<div class = "alignleft">
					<?php previous_comments_link( __( '&larr; Older comments', 'camp' ) ); ?>
				</div>
				<div class = "alignright">
					<?php next_comments_link( __( 'Newer comments &rarr;', 'camp' ) ); ?>
				</div>
			</div>
		<?php endif;
		endif;
	comment_form(array('title_reply_before'   => '<span id="reply-title" class="comment-reply-title">','title_reply_after'    => '</span>')); ?>
		
</div> <!-- .comments -->