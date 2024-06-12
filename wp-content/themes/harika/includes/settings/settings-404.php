<?php

namespace Harika\Includes\Settings;
use Elementor\Core\Kits\Documents\Tabs\Tab_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Settings_404Page extends Tab_Base {

	public function get_id() {
		return 'harika-settings-404-page';
	}

	public function get_title() {
		return __( 'صفحه خطای 404', 'harika' );
	}

	public function get_icon() {
		return 'eicon-error-404';
	}

	public function get_help_url() {
		return '';
	}

	public function get_group() {
		return 'global';
	}

	protected function register_tab_controls() {

		$this->start_controls_section(
			'harika_404_page_section',
			[
				'tab' => 'harika-settings-404-page',
				'label' => __( 'صفحه 404', 'harika' ),
			]
		);

        $this->add_control(
			'heading_404_page_contents',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'محتوای صفحه', 'harika' ),
			]
		);

        $this->add_control(
			'harika_404_page_title',
			[
                'label' => __( 'عنوان صفحه', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'صفحه یافت نشد!', 'harika' ),
			]
		);

        $this->add_control(
			'harika_404_page_404_type',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __( '404', 'harika' ),
				'options' => [
					'text' => __( 'متن', 'harika' ),
					'image' => __( 'تصویر', 'harika' ),
				],
				'default' => 'text',
			]
		);

        $this->add_control(
			'harika_404_page_404',
			[
                'label' => __( 'متن خطا', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '404', 'harika' ),
                'condition' => [
					'harika_404_page_404_type' => 'text',
				],
			]
		);

        $this->add_control(
			'harika_404_page_image',
			[
				'label' => esc_html__( 'انتخاب تصویر', 'harika' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'condition' => [
					'harika_404_page_404_type' => 'image',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'harika_404_page_image_size', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
				'separator' => 'none',
                'condition' => [
					'harika_404_page_404_type' => 'image',
				],
			]
		);


        $this->add_control(
			'harika_404_page_description',
			[
                'label' => __( 'توضیحات', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'به نظر می رسد محتوایی که به دنبال آن هستید یافت نشد.', 'harika' ),
			]
		);

        $this->add_control(
			'heading_404_page_content_style',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'استایل محتوا', 'harika' ),
			]
		);

        $this->add_responsive_control(
			'harika_404_page_image_width',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => __( 'عرض تصویر', 'harika' ),
				'size_units' => [
					'%',
					'px',
				],
				'range' => [
					'px' => [
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'.harika-layouts .harika-404-page .page-404-image' => 'width: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
					'harika_404_page_404_type' => 'image',
				],
			]
		);

		$this->add_responsive_control(
			'harika_404_page_image_height',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => __( 'ارتفاع تصویر', 'harika' ),
				'size_units' => [
					'%',
					'px',
				],
				'range' => [
					'px' => [
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'.harika-layouts .harika-404-page .page-404-image' => 'height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
					'harika_404_page_404_type' => 'image',
				],
			]
		);

        $this->add_responsive_control(
			'harika_404_page_image_object_fit',
			[
				'label' => esc_html__( 'متناسب با Object', 'harika' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options' => [
					'' => esc_html__( 'پیش فرض', 'harika' ),
					'fill' => esc_html__( 'پر', 'harika' ),
					'cover' => esc_html__( 'پوشش', 'harika' ),
					'contain' => esc_html__( 'دربرگیرنده', 'harika' ),
				],
				'default' => '',
				'selectors' => [
					'.harika-layouts .harika-404-page .page-404-image' => 'object-fit: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'harika_404_page_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
					'harika_404_page_404_type' => 'image',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی عنوان', 'harika' ),
                'name' => 'harika_404_page_title_typography',
				'selector' => '.harika-layouts .harika-404-page .entry-title',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی متن خطا', 'harika' ),
                'name' => 'harika_404_page_404_typography',
				'selector' => '.harika-layouts .harika-404-page .page-content .error-404',
                'condition' => [
					'harika_404_page_404_type' => 'text',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی توضیحات', 'harika' ),
                'name' => 'harika_404_page_description_typography',
				'selector' => '.harika-layouts .harika-404-page .page-content .description',
			]
		);

		$this->end_controls_section();

}


}
