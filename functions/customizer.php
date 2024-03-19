<?php
/**
 * Theme customizer
 *
 * @package mexclusive2
 */

function mexclusive2_customizer($wp_customize) {
	// Copyright section
	$wp_customize->add_section(
		'sec_copyright', array (
			'title' => __('Copyright Settings', 'mexclusive2'),
			'description' => __('Add copyright text to the footer', 'mexclusive2'),
		)
	);

	// Field1 - copyright text box;
	$wp_customize->add_setting(
		'set_copyright',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'set_copyright',
		array (
			'label' => __('Copyright', 'mexclusive2'),
			'description' => __('Enter your copyright information here', 'mexclusive2'),
			'section' => 'sec_copyright',
			'type' => 'text',
		)
	);

	// Slider section
	$wp_customize->add_section(
		'sec_slider', array (
			'title' => __('Slider Settings', 'mexclusive2'),
			'description' => __('Home page slider settings', 'mexclusive2'),
		)
	);

	// Slider fields
	for ($i = 1; $i <= 3; $i++) {
		// Slider page
		$wp_customize->add_setting(
			'set_slider_page' . $i,
			array (
				'type' => 'theme_mod',
				'default' => '',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'set_slider_page' . $i,
			array (
				'label' => __('Set slider page', 'mexclusive2') . ' ' . $i,
				'description' => __('Select page for slider', 'mexclusive2') . ' ' . $i,
				'section' => 'sec_slider',
				'type' => 'dropdown-pages',
			)
		);

		// Slider button text
		$wp_customize->add_setting(
			'set_slider_button_text' . $i,
			array (
				'type' => 'theme_mod',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_slider_button_text' . $i,
			array (
				'label' => __('Button text for slider page', 'mexclusive2') . ' ' . $i,
				'description' => __('Enter button text for slider page', 'mexclusive2') . ' ' . $i,
				'section' => 'sec_slider',
				'type' => 'text',
			)
		);

		// Slider button URL
		$wp_customize->add_setting(
			'set_slider_url' . $i,
			array (
				'type' => 'theme_mod',
				'default' => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'set_slider_url' . $i,
			array (
				'label' => __('URL for slider page', 'mexclusive2') . ' ' . $i,
				'description' => __('Enter URL for button on slider page', 'mexclusive2') . ' ' . $i,
				'section' => 'sec_slider',
				'type' => 'url',
			)
		);
	}

	// Home and blog settings section
	$wp_customize->add_section(
		'sec_home_page', array (
			'title' => __('Home page products and blog settings', 'mexclusive2'),
			'description' => __('Settings for homepage and blog', 'mexclusive2'),
		)
	);

	// Popular products max number
	$wp_customize->add_setting(
		'set_popular_max_num',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'set_popular_max_num',
		array (
			'label' => __('Popular products max number', 'mexclusive2'),
			'description' => __('Set maximum number of popular products', 'mexclusive2'),
			'section' => 'sec_home_page',
			'type' => 'number',
		)
	);

	// Popular products max columns
	$wp_customize->add_setting(
		'set_popular_max_col',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'set_popular_max_col',
		array (
			'label' => __('Popular products max columns', 'mexclusive2'),
			'description' => __('Set maximum columns of popular products', 'mexclusive2'),
			'section' => 'sec_home_page',
			'type' => 'number',
		)
	);

	// New products max number
	$wp_customize->add_setting(
		'set_new_arrivals_max_num',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'set_new_arrivals_max_num',
		array (
			'label' => __('New products max number', 'mexclusive2'),
			'description' => __('Set maximum number of new products', 'mexclusive2'),
			'section' => 'sec_home_page',
			'type' => 'number',
		)
	);

	// New products max columns
	$wp_customize->add_setting(
		'set_new_arrivals_max_col',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'set_new_arrivals_max_col',
		array (
			'label' => __('New products max columns', 'mexclusive2'),
			'description' => __('Set maximum columns of new products', 'mexclusive2'),
			'section' => 'sec_home_page',
			'type' => 'number',
		)
	);

	// Deal of the week - is it active?
	$wp_customize->add_setting(
		'set_deal_show',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'mexclusive2_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'set_deal_show',
		array (
			'label' => __('Show deal of the week?', 'mexclusive2'),
			'section' => 'sec_home_page',
			'type' => 'checkbox',
		)
	);

	// Deal of the week product - if active
	$wp_customize->add_setting(
		'set_deal',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'set_deal',
		array (
			'label' => __('Deal of the week product ID', 'mexclusive2'),
			'description' => __('Set product ID for the deal of the week', 'mexclusive2'),
			'section' => 'sec_home_page',
			'type' => 'number',
		)
	);


	/*################## FOOTER SETTINGS ########################*/

	$wp_customize->add_section('mexclusive_footer_options', array(
		'title' => esc_html__( 'Footer Options', 'mexclusive2' ),
		'description' => esc_html__( 'You can change footer options from here.', 'mexclusive2' )
	));

	$wp_customize->add_setting('mexclusive_site_info', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('mexclusive_site_info', array(
		'type' => 'textarea',
		'label' => esc_html__( 'Site Info', 'mexclusive2' ),
		'section' => 'mexclusive_footer_options'
	));

	$wp_customize->add_setting('mexclusive_footer_bg', array(
		'default' => 'dark',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_key'
	));

	$wp_customize->add_control('mexclusive_footer_bg', array(
		'type' => 'select',
		'label' => esc_html__( 'Footer Background', 'mexclusive2' ),
		'choices' => array(
			'light' => esc_html__( 'Light', 'mexclusive2' ),
			'dark' => esc_html__( 'Dark', 'mexclusive2' ),
		),
		'section' => 'mexclusive_footer_options'
	));

	$wp_customize->add_setting('mexclusive_footer_layout', array(
		'default' => '3,3,3,3',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
		'validate_callback' => 'mexclusive_validate_footer_layout'
	));

	$wp_customize->add_control('mexclusive_footer_layout', array(
		'type' => 'text',
		'label' => esc_html__( 'Footer Layout', 'mexclusive2' ),
		'section' => 'mexclusive_footer_options'
	));

}

add_action( 'customize_register', 'mexclusive2_customizer' );

function mexclusive_validate_footer_layout( $validity, $value) {
	if(!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
		$validity->add('invalid_footer_layout', esc_html__( 'Footer layout is invalid', 'mexclusive2' ));
	}
	return $validity;
}

function mexclusive2_sanitize_checkbox ($checked) {
	return ((isset($checked) && true == $checked) ? true : false);
}
