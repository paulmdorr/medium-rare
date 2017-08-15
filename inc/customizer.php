<?php
/**
 * Medium Rare Theme Customizer
 *
 * @package Medium_Rare
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function medium_rare_customize_register($wp_customize) {
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'medium_rare_customize_partial_blogname',
		));
		$wp_customize->selective_refresh->add_partial('blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'medium_rare_customize_partial_blogdescription',
		));
	}

	// Show or hide "Leave a comment" link on the posts list
  $wp_customize->add_setting('medium_rare_show_comments_link', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => 0,
		'transport' => 'refresh',
	));
	$wp_customize->add_section('medium_rare', array(
		'title' => __('Medium Rare Settings'),
		'description' => __('Change theme behaviour here'),
		'priority' => 10,
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control('medium_rare_show_comments_link', array(
		'type' => 'checkbox',
		'priority' => 10,
		'section' => 'medium_rare',
		'label' => __('Show comments link'),
		'description' => __('Shows or hides the comments link in posts list.')
	));
	// Show or hide "Leave a comment" link on the posts list
  $wp_customize->add_setting('medium_rare_show_footer', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => 0,
		'transport' => 'refresh',
	));
	$wp_customize->add_control('medium_rare_show_footer', array(
		'type' => 'checkbox',
		'priority' => 10,
		'section' => 'medium_rare',
		'label' => __('Show footer'),
		'description' => __('Shows or hides the footer.')
	));
}
add_action('customize_register', 'medium_rare_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function medium_rare_customize_partial_blogname() {
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function medium_rare_customize_partial_blogdescription() {
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function medium_rare_customize_preview_js() {
	wp_enqueue_script('medium-rare-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'medium_rare_customize_preview_js');
