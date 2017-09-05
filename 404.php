<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Medium_Rare
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">
						404
					</h1>
					<h2>
						<?php esc_html_e('That&rsquo;s not here! Try searching.', 'medium-rare'); ?>
					</h2>
					<?php get_search_form(); ?>
				</header><!-- .page-header -->

				<div class="page-content">

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

medium_rare_get_footer();
