<?php
/**
 * Theme customizer
 *
 * @package mexclusive2
 */

function mexclusive2_customizer($wp_customize) {

	// Slider section
	$wp_customize->add_section(
		'sec_slider',
		array(
			'title'       => __('Slider Settings', 'mexclusive2'),
			'description' => __('Home page slider settings', 'mexclusive2'),
		)
	);

	// Slider fields
	for ($i = 1; $i <= 3; $i++) {
		// Slider page
		$wp_customize->add_setting(
			'set_slider_page' . $i,
			array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'set_slider_page' . $i,
			array(
				'label'       => __('Set slider page', 'mexclusive2') . ' ' . $i,
				'description' => __('Select page for slider', 'mexclusive2') . ' ' . $i,
				'section'     => 'sec_slider',
				'type'        => 'dropdown-pages',
			)
		);

		// Slider button text
		$wp_customize->add_setting(
			'set_slider_button_text' . $i,
			array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_slider_button_text' . $i,
			array(
				'label'       => __('Button text for slider page', 'mexclusive2') . ' ' . $i,
				'description' => __('Enter button text for slider page', 'mexclusive2') . ' ' . $i,
				'section'     => 'sec_slider',
				'type'        => 'text',
			)
		);

		// Slider button URL
		$wp_customize->add_setting(
			'set_slider_url' . $i,
			array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'set_slider_url' . $i,
			array(
				'label'       => __('URL for slider page', 'mexclusive2') . ' ' . $i,
				'description' => __('Enter URL for button on slider page', 'mexclusive2') . ' ' . $i,
				'section'     => 'sec_slider',
				'type'        => 'url',
			)
		);
	}

	// Home and blog settings section
	$wp_customize->add_section(
		'sec_home_page',
		array(
			'title'       => __('Home page products and blog settings', 'mexclusive2'),
			'description' => __('Settings for homepage and blog', 'mexclusive2'),
		)
	);

	// Popular products max number
	$wp_customize->add_setting(
		'set_popular_max_num',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'set_popular_max_num',
		array(
			'label'       => __('Popular products max number', 'mexclusive2'),
			'description' => __('Set maximum number of popular products', 'mexclusive2'),
			'section'     => 'sec_home_page',
			'type'        => 'number',
		)
	);

	// Popular products max columns
	$wp_customize->add_setting(
		'set_popular_max_col',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'set_popular_max_col',
		array(
			'label'       => __('Popular products max columns', 'mexclusive2'),
			'description' => __('Set maximum columns of popular products', 'mexclusive2'),
			'section'     => 'sec_home_page',
			'type'        => 'number',
		)
	);

	// New products max number
	$wp_customize->add_setting(
		'set_new_arrivals_max_num',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'set_new_arrivals_max_num',
		array(
			'label'       => __('New products max number', 'mexclusive2'),
			'description' => __('Set maximum number of new products', 'mexclusive2'),
			'section'     => 'sec_home_page',
			'type'        => 'number',
		)
	);

	// New products max columns
	$wp_customize->add_setting(
		'set_new_arrivals_max_col',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'set_new_arrivals_max_col',
		array(
			'label'       => __('New products max columns', 'mexclusive2'),
			'description' => __('Set maximum columns of new products', 'mexclusive2'),
			'section'     => 'sec_home_page',
			'type'        => 'number',
		)
	);

	// Deal of the week - is it active?
	$wp_customize->add_setting(
		'set_deal_show',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'mexclusive2_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'set_deal_show',
		array(
			'label'   => __('Show deal of the week?', 'mexclusive2'),
			'section' => 'sec_home_page',
			'type'    => 'checkbox',
		)
	);

	// Deal of the week product - if active
	$wp_customize->add_setting(
		'set_deal',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'set_deal',
		array(
			'label'       => __('Deal of the week product ID', 'mexclusive2'),
			'description' => __('Set product ID for the deal of the week', 'mexclusive2'),
			'section'     => 'sec_home_page',
			'type'        => 'number',
		)
	);

	// Footer settings
	$wp_customize->add_section(
		'mexclusive2_footer_options',
		array(
			'title'       => __('Footer Options', 'mexclusive2'),
			'description' => __('You can change footer options from here.', 'mexclusive2'),
		)
	);

	// Copyright info
	$wp_customize->add_setting(
		'set_copyright',

		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'set_copyright',
		array(
			'label'       => __('Copyright info', 'mexclusive2'),
			'description' => __('Enter your copyright information here', 'mexclusive2'),
			'section'     => 'mexclusive2_footer_options',
			'type'        => 'text',
		)
	);

	// Footer background color
	$wp_customize->add_setting(
		'footer_background_color',
		array(
			'default'           => '#f0f0f0',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_background_color',
			array(
				'label'    => __('Footer Background Color', 'mexclusive2'),
				'section'  => 'mexclusive2_footer_options',
				'settings' => 'footer_background_color',
			)
		)
	);

	// Footer text color
	$wp_customize->add_setting(
		'footer_text_color',
		array(
			'default'           => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_text_color',
			array(
				'label'    => __('Footer Text Color', 'mexclusive2'),
				'section'  => 'mexclusive2_footer_options',
				'settings' => 'footer_text_color',
			)
		)
	);

	// Footer link color
	$wp_customize->add_setting(
		'footer_link_color',
		array(
			'default'           => '#3366cc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_link_color',
			array(
				'label'    => __('Footer Link Color', 'mexclusive2'),
				'section'  => 'mexclusive2_footer_options',
				'settings' => 'footer_link_color',
			)
		)
	);

	// Footer layout
	$wp_customize->add_setting(
		'mexclusive2_footer_layout',
		array(
			'default'           => '3,3,3,3',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
			'validate_callback' => 'mexclusive2_validate_footer_layout',
		)
	);

	$wp_customize->add_control(
		'mexclusive2_footer_layout',
		array(
			'type'     => 'text',
			'label'    => __('Footer Layout', 'mexclusive2'),
			'section'  => 'mexclusive2_footer_options',
		)
	);

	// Footer Menu - is active?
	$wp_customize->add_setting(
		'set_footer_menu_show',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'mexclusive2_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'set_footer_menu_show',
		array(
			'label'   => __('Show footer menu?', 'mexclusive2'),
			'section' => 'mexclusive2_footer_options',
			'type'    => 'checkbox',
		)
	);
}

add_action('customize_register', 'mexclusive2_customizer');

function mexclusive2_validate_footer_layout($validity, $value) {
	if (!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
		$validity->add('invalid_footer_layout', esc_html__('Footer layout is invalid', 'mexclusive2'));
	}
	return $validity;
}

function mexclusive2_sanitize_checkbox($checked) {
	return ((isset($checked) && true == $checked) ? true : false);
}

function mexclusive2_customize_register($wp_customize) {
	// Add section for background settings
	$wp_customize->add_section(
		'background_settings',
		array(
			'title'    => __('Background Settings', 'mexclusive2'),
			'priority' => 30,
		)
	);

	// Add setting for linear gradient background start color
	$wp_customize->add_setting(
		'background_gradient_start_color',
		array(
			'default'           => '#1b7dff', // Default color
			'sanitize_callback' => 'sanitize_hex_color', // Sanitization function
		)
	);

	// Add control for linear gradient background start color
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'background_gradient_start_color',
			array(
				'label'    => __('Gradient Start Color', 'mexclusive2'),
				'section'  => 'background_settings',
			)
		)
	);

	// Add setting for linear gradient background end color
	$wp_customize->add_setting(
		'background_gradient_end_color',
		array(
			'default'           => '#ffffff', // Default color
			'sanitize_callback' => 'sanitize_hex_color', // Sanitization function
		)
	);

	// Add control for linear gradient background end color
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'background_gradient_end_color',
			array(
				'label'    => __('Gradient End Color', 'mexclusive2'),
				'section'  => 'background_settings',
			)
		)
	);
}

add_action('customize_register', 'mexclusive2_customize_register');

function mexclusive2_customizer_styles() {
	$start_color = get_theme_mod('background_gradient_start_color', '#1b7dff');
	$end_color   = get_theme_mod('background_gradient_end_color', 'rgba(255, 255, 255, 0)'); // Set the default end color to transparent
	?>
    <style type="text/css">
        .features {
            background-image: linear-gradient(to bottom, <?php echo esc_attr($start_color); ?>, <?php echo esc_attr($end_color); ?>);
        }
    </style>
	<?php
}

add_action('wp_head', 'mexclusive2_customizer_styles');
