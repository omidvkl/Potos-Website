<?php

namespace Harika\Includes\Settings;

use Elementor\Plugin;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Core\Responsive\Responsive;
use Elementor\Core\Kits\Documents\Tabs\Tab_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Settings_Header extends Tab_Base {

	public function get_id() {
		return 'harika-settings-header';
	}

	public function get_title() {
		return __( 'هدر', 'harika' );
	}

	public function get_icon() {
		return 'eicon-header';
	}

	public function get_help_url() {
		return '';
	}

	public function get_group() {
		return 'global';
	}

	private function harika_get_elementor_templates_list_header() {
		$templates = \Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items('header');
		$list['0'] = [ '0' => __( 'پیش فرض قالب', 'harika' ) ];
		foreach ( $templates as $template ) {
			if($template['type'] == 'header') :
				$template['type'] = 'هدر';
				$list[$template['template_id']] = $template['title'].'  ('.$template['type'].')';
			endif;
		}
		return $list;
	}

	protected function register_tab_controls() {
		$this->start_controls_section(
			'harika_header_section',
			[
				'tab' => 'harika-settings-header',
				'label' => __( 'هدر', 'harika' ),
			]
		);


		$this->add_control(
            'harika_header_layout_select', [
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->harika_get_elementor_templates_list_header(),
                'label' =>   esc_html__('انتخاب هدر پیش فرض', 'harika'),
                'label_block' => true,
				'default' => 0,
            ]
        );



		$this->end_controls_section();
	}

	public function on_save( $data ) {
		// Save chosen header menu to the WP settings.
		if ( isset( $data['settings']['harika_header_menu'] ) ) {
			$menu_id = $data['settings']['harika_header_menu'];
			$locations = get_theme_mod( 'nav_menu_locations' );
			$locations['menu-1'] = (int) $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}

	public function get_additional_tab_content() {
		if ( ! defined( 'ELEMENTOR_PRO_VERSION' ) ) {
			return sprintf( '
				<div class="harika elementor-nerd-box">
					<img src="%4$s" class="elementor-nerd-box-icon">
					<div class="elementor-nerd-box-message">
						<p class="elementor-panel-heading-title elementor-nerd-box-title">%1$s</p>
						<p>%2$s</p>
					</div>
					<a class="elementor-button elementor-button-default elementor-nerd-box-link" target="_blank" href="https://www.rtl-theme.com/elementor-pro/">%3$s</a>
				</div>
				',
				__( 'یک هدر سفارشی با چندین گزینه ایجاد کنید', 'harika' ),
				__( 'به المنتور پرو ارتقا دهید و از طراحی رایگان و بسیاری از ویژگی های دیگر لذت ببرید', 'harika' ),
				__( 'ارتقا', 'harika' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		} else {
			return sprintf( '
				<div class="harika elementor-nerd-box">
					<img src="%4$s" class="elementor-nerd-box-icon">
					<div class="elementor-nerd-box-message">
						<p class="elementor-panel-heading-title elementor-nerd-box-title">%1$s</p>
						<p class="elementor-nerd-box-message">%2$s</p>
					</div>
					<a class="elementor-button elementor-button-success elementor-nerd-box-link" target="_blank" href="%5$s">%3$s</a>
				</div>
				',
				__( 'هدر خود را با استفاده از صفحه ساز بسازید', 'harika' ),
				__( 'المان ها را جا به جا کنید و هدر سفارشی خود را طراحی کنید.', 'harika' ),
				__( 'ایجاد هدر', 'harika' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg',
				get_admin_url( null, 'admin.php?page=elementor-app#/site-editor/templates/header' )
			);
		}
	}
}
