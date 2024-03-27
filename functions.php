<?php
/**
 * mexclusive2 functions and definitions
 * @link https://developer.wordpress.org/themers/basivs/theme-functions
 * @package mexclusive2
 */

require_once( 'functions/block-patterns.php' );
require_once( 'functions/class-wp-bootstrap-navwalker.php' );
require_once( 'functions/config-theme-support.php' );
require_once( 'functions/custom-background.php' );
require_once( 'functions/customizer.php' );
require_once( 'functions/editor-styles.php' );
require_once( 'functions/enqueue.php' );
require_once( 'functions/get-author.php' );
require_once( 'functions/last-ten-posts-in-category.php' );
require_once( 'functions/popular-tags.php' );
require_once( 'functions/post-views-counter.php' );
require_once( 'functions/posted-on.php' );
require_once( 'functions/random-order.php' );
require_once( 'functions/reading-time.php' );
require_once( 'functions/reply-comment.php' );
require_once( 'functions/sidebars.php' );
require_once( 'functions/woocommerce-cart.php' );
require_once( 'functions/woocommerce-support.php' );
require_once( 'functions/dynamic-meta.php' );
function custom_headings_color_customize_register($wp_customize) {


	// Add setting for h1 color
	$wp_customize->add_setting('h1_color_setting', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// Add control for h1 color
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h1_color_control', array(
		'label' => __('H1 Color', 'mexclusive2'),
		'section' => 'colors',
		'settings' => 'h1_color_setting',
	)));

	// Add setting for h2 color
	$wp_customize->add_setting('h2_color_setting', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// Add control for h2 color
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h2_color_control', array(
		'label' => __('H2 Color', 'mexclusive2'),
		'section' => 'colors',
		'settings' => 'h2_color_setting',
	)));

	// Add setting for h3 color
	$wp_customize->add_setting('h3_color_setting', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// Add control for h3 color
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h3_color_control', array(
		'label' => __('H3 Color', 'mexclusive2'),
		'section' => 'colors',
		'settings' => 'h3_color_setting',
	)));

	// Add setting for link color
	$wp_customize->add_setting('link_color_setting', array(
		'default' => '#1b7dff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// Add control for link color
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_color_control', array(
		'label' => __('Link Color', 'mexclusive2'),
		'section' => 'colors',
		'settings' => 'link_color_setting',
	)));

	// Add setting for primary color
	$wp_customize->add_setting('primary_color_setting', array(
		'default' => '#1b7dff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// Add control for paragraph color
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color_control', array(
		'label' => __('Primary Color', 'mexclusive2'),
		'section' => 'colors',
		'settings' => 'primary_color_setting',
	)));

}



add_action('customize_register', 'custom_headings_color_customize_register');

function custom_headings_color_styles() {
	$h1_color = get_theme_mod('h1_color_setting', '#000000');
	$h2_color = get_theme_mod('h2_color_setting', '#000000');
	$h3_color = get_theme_mod('h3_color_setting', '#000000');
	$link_color = get_theme_mod('link_color_setting', '#1b7dff');
	$primary_color = get_theme_mod('primary_color_setting', '#1b7dff');

	echo "<style>
        /* Custom h1 color */
        h1 {
            color: $h1_color!important;
        }

        /* Custom h2 color */
        h2 {
            color: $h2_color!important;
        }

        /* Custom h3 color */
        h3 {
            color: $h3_color!important;
        }

        /* Custom link color */
        a, h1 a, h2 a, h3 a, h4 a, span a, a span, a h1, a h2, a h3, a h4, a span, p a, a p   {
            color: $link_color!important;
        }

        /* Custom Primary color */
        .add_to_cart_button , .btn-primary, #submit, .rounded-circle, .post-counter, .bg-primary {
            background: $primary_color!important;
        }
    </style>";
}

add_action('wp_head', 'custom_headings_color_styles');