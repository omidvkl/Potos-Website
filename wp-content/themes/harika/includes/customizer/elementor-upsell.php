<?php

namespace Harika\Includes\Customizer;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Upsell extends \WP_Customize_Control {

	// Whitelist content parameter
	public $content = '';

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   2.4.0
	 * @return  void
	 */
	public function render_content() {
		$this->print_customizer_upsell();

		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . wp_kses_post( $this->description ) . '</span>';
		}
	}

	private function print_customizer_upsell() {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$customizer_content = '';

		// Get Plugins
		$plugins = get_plugins();

		if ( ! isset( $plugins['elementor/elementor.php'] ) ) {
			$customizer_content .= $this->get_customizer_upsell_html(
				__( 'نصب المنتور', 'harika' ),
				__( 'یک سایت بی نظیر با استفاده از المنتور و قالب پارسیان بسازید.', 'harika' ),
				wp_nonce_url(
					add_query_arg(
						[
							'action' => 'install-plugin',
							'plugin' => 'elementor',
						],
						admin_url( 'update.php' )
					),
					'install-plugin_elementor'
				),
				__( 'نصب و قعالسازی', 'harika' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		} elseif ( ! defined( 'ELEMENTOR_VERSION' ) ) {
			$customizer_content .= $this->get_customizer_upsell_html(
				__( 'نصب و فعالسازی', 'harika' ),
				__( 'یک سایت بی نظیر با استفاده از المنتور و قالب پارسیان بسازید.', 'harika' ),
				wp_nonce_url( 'plugins.php?action=activate&plugin=elementor/elementor.php', 'activate-plugin_elementor/elementor.php' ),
				__( 'نصب و فعالسازی', 'harika' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		} elseif ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.0.12', '<' ) ) {
			$customizer_content .= $this->get_customizer_upsell_html(
				__( 'بروزرسانی المنتور', 'harika' ),
				__( 'شما نیاز به المنتور نسخه 3.1.0 و به بالاتر دارید.', 'harika' ),
				wp_nonce_url( 'update-core.php' ),
				__( 'بروزرسانی المنتور', 'harika' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		} else {
			$customizer_content .= $this->get_customizer_upsell_html(
				__( 'گزینه های خود را از طریق المنتور تنظیم کنید', 'harika' ),
				__( 'نسل جدید پنل تنظیمات برای وردپرس اینبار با استفاده از المنتور و برای اولین بار در ایران.', 'harika' ),
				wp_nonce_url( 'post.php?post=' . get_option( 'elementor_active_kit' ) . '&action=elementor' ),
				__( 'پنل تنظیمات پارسیان', 'harika' ),
				get_template_directory_uri() . '/assets/images/harika-icon.png'
			);
		}

		echo wp_kses_post( $customizer_content );
	}

	private function get_customizer_upsell_html( $title, $text, $url, $button_text, $image ) {
		return sprintf( '
			<div class="customize-control-harika-theme-options-holder">
				<img src="%5$s">
				<div class="elementor-nerd-box-message">
					<p class="elementor-panel-heading-title elementor-section-title">%1$s</p>
					<p class="elementor-section-body">%2$s</p>
				</div>
				<a class="button button-primary" target="_blank" href="%3$s">%4$s</a>
			</div>',
			$title,
			$text,
			$url,
			$button_text,
			$image
		);
	}
}
