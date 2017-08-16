<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Medium_Rare
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">
	<h2 class="comments-title">
		<?php
			echo esc_html_e('Responses', 'medium-rare');
		?>
	</h2><!-- .comments-title -->

	<?php
		$user = wp_get_current_user();
		
		if ($user) {
			$image_url = esc_url(get_avatar_url($user->ID));
			$logged_in_element = "
			<div class='logged-in-user'>
				<img src='$image_url' class='avatar' />
				<span>$user->display_name</span>
			</div>";
		}
	?>

	<?php 
		comment_form(array(
			/* translators: Response for posts (comments) */
			'title_reply' => __('<p id="write-response">Write a response...</p>', 'medium-rare'),
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'label_submit' => __('Publish', 'medium-rare'),
			'logged_in_as' => $logged_in_element
		));
		the_comments_navigation();
	?>
	<?php
	// You can start editing here -- including this comment!
	if (have_comments()) : ?>
		<ul class="comment-list">
			<?php
				wp_list_comments();
			?>
		</ul><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) : ?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'medium-rare'); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().
	?>

</div><!-- #comments -->
