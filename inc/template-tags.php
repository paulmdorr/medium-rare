<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Medium_Rare
 */

if (!function_exists('medium_rare_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function medium_rare_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr(get_the_date('c')),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date('c')),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('Posted on %s', 'post date', 'medium-rare'),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x('by %s', 'post author', 'medium-rare'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if (!function_exists('medium_rare_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function medium_rare_entry_footer() {
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			$categories_list = get_the_category_list(esc_html__(' ', 'medium-rare'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<div class="cat-links">' . esc_html__('Categories %1$s', 'medium-rare') . '</div>', $categories_list); // WPCS: XSS OK.
			}

			$tags_list = get_the_tag_list('', esc_html_x(' ', 'list item separator', 'medium-rare'));
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf('<div class="tags-links">' . esc_html__('Tags %1$s', 'medium-rare') . '</div>', $tags_list); // WPCS: XSS OK.
			}
		}

		$show_comments = get_theme_mod('medium_rare_show_comments_link');

		if (!is_single() && $show_comments && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<div class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'medium-rare'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</div>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'medium-rare' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if (!function_exists('medium_rare_featured_image')) :
	/**
	 * Prints a REALLY big featured image
	 */
	function medium_rare_featured_image() {
		if (has_post_thumbnail()) {
			echo '<div class="featured-image">';
				echo '<div class="featured-image-inner">';
					the_post_thumbnail('full');
				echo '</div>';
			echo '</div>';
		}
	}
endif;

if (!function_exists('medium_rare_featured_image_thumbnail')) :
	/**
	 * Prints the featured image as thumbnail
	 */
	function medium_rare_featured_image_thumbnail() {
		if (has_post_thumbnail() && !is_singular()) {
			echo '<div class="featured-image-thumbnail">';
				the_post_thumbnail('thumbnail');
			echo '</div>';
		}
	}
endif;

if (!function_exists('medium_rare_thumbnail_class')) :
	/**
	 * Prints a REALLY big featured image
	 */
	function medium_rare_thumbnail_class() {
		if (has_post_thumbnail() && !is_singular()) {
			echo 'with-thumbnail';
		}
	}
endif;