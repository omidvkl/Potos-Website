<?php

namespace Harika\Includes\Settings;
use Elementor\Core\Kits\Documents\Tabs\Tab_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Settings_More extends Tab_Base {

	public function get_id() {
		return 'harika-settings-more';
	}

	public function get_title() {
		return __( 'بیشتر ...', 'harika' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_help_url() {
		return '';
	}

	public function get_group() {
		return 'global';
	}

	protected function register_tab_controls() {

		$this->start_controls_section(
			'harika_more_section',
			[
				'tab' => 'harika-settings-more',
				'label' => __( 'تنظیمات بیشتر', 'harika' ),
			]
		);

        $this->add_control(
			'heading_harika_sidebar_widget_title_layout',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'عنوان ابزارک های سایدبار', 'harika' ),
			]
		);
		
		$this->add_control(
			'harika_sidebar_widget_title_layout',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __( 'طرح بندی', 'harika' ),
				'options' => [
					'1' => __( 'یک', 'harika' ),
					'2' => __( 'دو', 'harika' ),
					'3' => __( 'سه', 'harika' ),
					'4' => __( 'چهار', 'harika' ),
				],
				'default' => '1',
			]
		);

		$this->add_control(
			'heading_harika_default_skin',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'پوسته پیش فرض', 'harika' ),
			]
		);
		
		$this->add_control(
			'harika_default_skin',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __( 'طرح بندی', 'harika' ),
				'options' => [
					'light' => __( 'روشن', 'harika' ),
					'dark' => __( 'تاریک', 'harika' ),
				],
				'default' => 'light',
			]
		);

        





		$this->end_controls_section();

}


}
