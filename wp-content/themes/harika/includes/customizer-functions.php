<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Customizer controls which add Elementor deeplinks
 *
 * @return void
 */
add_action( 'customize_register', 'harika_customizer_register' );
function harika_customizer_register( $wp_customize ) {
	require get_template_directory() . '/includes/customizer/elementor-upsell.php';

	$wp_customize->add_section(
		'harika_theme_options',
		[
			'title' => __( 'پنل تنظیمات پارسیان', 'harika' ),
			'capability' => 'edit_theme_options',
			'priority' => 0,
		]
	);

	$wp_customize->add_setting(
		'harika-theme-options',
		[
			'sanitize_callback' => false,
			'transport' => 'refresh',
		]
	);

	$wp_customize->add_control(
		new Harika\Includes\Customizer\Elementor_Upsell(
			$wp_customize,
			'harika-theme-options',
			[
				'section' => 'harika_theme_options',
				'priority' => 20,
			]
		)
	);
}


/**
 * Enqueue Customiser CSS
 *
 * @return string HTML to use in the customizer panel
 */
add_action( 'admin_enqueue_scripts', 'harika_customizer_print_styles' );
function harika_customizer_print_styles() {

	$min_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style(
		'harika-customizer',
		get_template_directory_uri() . '/customizer' . $min_suffix . '.css',
		[],
		HARIKA_VERSION
	);
}
