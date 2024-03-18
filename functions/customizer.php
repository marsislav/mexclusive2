<?php
/**
*Theme customizer
 * @package mexclusive2
 */

function mexclusive2_customizer($wp_customize) {
	// Copyright section
	$wp_customize->add_section(
		'sec_copyright', array (
			'title' => 'Copyright Settings',
			'description' => 'Add copyright text to the footer',
		)
	);

	//Field1 - copyright text box;
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
			 'label' => 'Copyright',
			'description' => 'Enter your copyright information here',
			'section' => 'sec_copyright',
			'type' => 'text',

		)
	);
/*Home-page slider*/


	//Slider section

	$wp_customize->add_section(
		'sec_slider', array (
			'title' => 'Slider Settings',
			'description' => 'Home page slider settings',
		)
	);
/*Page 1*/
	//Field 1 - slider page number 1

	$wp_customize->add_setting(
		'set_slider_page1',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',

		)
	);

	$wp_customize->add_control(
		'set_slider_page1',
		array (
			'label' => 'Set slider page 1',
			'description' => 'Select first page for the slider',
			'section' => 'sec_slider',
			'type' => 'dropdown-pages',

		)
	);

	//Field 2 - slider button text number 1

	$wp_customize->add_setting(
		'set_slider_button_text1',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',

		)
	);

	$wp_customize->add_control(
		'set_slider_button_text1',
		array (
			'label' => 'Button text for slider page 1',
			'description' => 'Please, enter the text for button on slider page 1',
			'section' => 'sec_slider',
			'type' => 'text',

		)
	);

	//Field 3 - slider button URL number 1

	$wp_customize->add_setting(
		'set_slider_url1',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',

		)
	);

	$wp_customize->add_control(
		'set_slider_url1',
		array (
			'label' => 'URL for slider page 1',
			'description' => 'Please, enter the URL for button on slider page 1',
			'section' => 'sec_slider',
			'type' => 'url',

		)
	);

	/*PAGE 2*/
	//Field 4 - slider page number 4

	$wp_customize->add_setting(
		'set_slider_page2',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',

		)
	);

	$wp_customize->add_control(
		'set_slider_page2',
		array (
			'label' => 'Set slider page 2',
			'description' => 'Select second page for the slider',
			'section' => 'sec_slider',
			'type' => 'dropdown-pages',

		)
	);

	//Field 5 - slider button text number 2

	$wp_customize->add_setting(
		'set_slider_button_text2',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',

		)
	);

	$wp_customize->add_control(
		'set_slider_button_text2',
		array (
			'label' => 'Button text for slider page 2',
			'description' => 'Please, enter the text for button on slider page 2',
			'section' => 'sec_slider',
			'type' => 'text',

		)
	);

	//Field 6 - slider button URL number 2

	$wp_customize->add_setting(
		'set_slider_url2',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',

		)
	);

	$wp_customize->add_control(
		'set_slider_url2',
		array (
			'label' => 'URL for slider page 2',
			'description' => 'Please, enter the URL for button on slider page 2',
			'section' => 'sec_slider',
			'type' => 'url',

		)
	);

	/*PAGE3*/
	//Field 7 - slider page number 3

	$wp_customize->add_setting(
		'set_slider_page3',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',

		)
	);

	$wp_customize->add_control(
		'set_slider_page3',
		array (
			'label' => 'Set slider page 3',
			'description' => 'Select third page for the slider',
			'section' => 'sec_slider',
			'type' => 'dropdown-pages',

		)
	);

	//Field 8 - slider button text number 3

	$wp_customize->add_setting(
		'set_slider_button_text3',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',

		)
	);

	$wp_customize->add_control(
		'set_slider_button_text3',
		array (
			'label' => 'Button text for slider page 3',
			'description' => 'Please, enter the text for button on slider page 3',
			'section' => 'sec_slider',
			'type' => 'text',

		)
	);

	//Field 9 - slider button URL number 3

	$wp_customize->add_setting(
		'set_slider_url3',
		array (
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',

		)
	);

	$wp_customize->add_control(
		'set_slider_url3',
		array (
			'label' => 'URL for slider page 3',
			'description' => 'Please, enter the URL for button on slider page 3',
			'section' => 'sec_slider',
			'type' => 'url',

		)
	);


}
add_action('customize_register', 'mexclusive2_customizer');