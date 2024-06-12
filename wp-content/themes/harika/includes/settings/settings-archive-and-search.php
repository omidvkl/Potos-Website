<?php

namespace Harika\Includes\Settings;
use Elementor\Core\Kits\Documents\Tabs\Tab_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Settings_ArchiveAndSearch extends Tab_Base {

	public function get_id() {
		return 'harika-settings-archive-and-search';
	}

	public function get_title() {
		return __( 'آرشیو و جستجو', 'harika' );
	}

	public function get_icon() {
		return 'eicon-archive-posts';
	}

	public function get_help_url() {
		return '';
	}

	public function get_group() {
		return 'global';
	}

	protected function register_tab_controls() {

		$this->start_controls_section(
			'harika_archive_pages_section',
			[
				'tab' => 'harika-settings-archive-and-search',
				'label' => __( 'صفحه آرشیو و جستجو', 'harika' ),
			]
		);

        $this->add_control(
			'heading_archive_pages_archives',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'آرشیو ها', 'harika' ),
			]
		);

        $this->add_control(
			'harika_archive_pages_sidebar_display',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __( 'سایدبار', 'harika' ),
				'default' => 'yes',
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
			]
		);

        $this->add_control(
			'heading_archive_pages_post_featured',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'تصویر پست', 'harika' ),
			]
		);

        $this->add_responsive_control(
			'harika_archive_pages_featured_width',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => __( 'عرض تصویر پست', 'harika' ),
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
					'.harika-layouts.archive main.site-main article.post .image img, .harika-layouts.search main.site-main article.post .image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'harika_archive_pages_featured_height',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => __( 'ارتفاع تصویر پست', 'harika' ),
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
					'.harika-layouts.archive main.site-main article.post .image img, .harika-layouts.search main.site-main article.post .image img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'harika_archive_pages_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'harika_archive_pages_featured_border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '.harika-layouts.archive main.site-main article.post .image img, .harika-layouts.search main.site-main article.post .image img',
			]
		);

		$this->add_control(
			'harika_archive_pages_featured_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'.harika-layouts.archive main.site-main article.post .image img, .harika-layouts.search main.site-main article.post .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'harika_archive_pages_featured_box_shadow',
				'label' => esc_html__( 'سایه', 'harika' ),
				'selector' => '.harika-layouts.archive main.site-main article.post .image img, .harika-layouts.search main.site-main article.post .image img',
			]
		);

        $this->add_control(
			'heading_archive_pages_post_content',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'محتوای پست', 'harika' ),
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی عنوان', 'harika' ),
                'name' => 'harika_archive_pages_title_typography',
				'selector' => '.harika-layouts.archive main.site-main article.post .content .entry-title, .harika-layouts.archive main.site-main article.post .content .entry-title a, .harika-layouts.search main.site-main article.post .content .entry-title, .harika-layouts.search main.site-main article.post .content .entry-title a',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی چکیده', 'harika' ),
                'name' => 'harika_archive_pages_excerpt_typography',
				'selector' => '.harika-layouts.archive main.site-main article.post .content p, .harika-layouts.search main.site-main article.post .content p',
			]
		);

        $this->add_control(
			'harika_archive_pages_excerpt_length',
			[
				'label' => __( 'طول چکیده', 'harika' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '32',
			]
		);

        $this->add_control(
			'heading_archive_pages_post_meta',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'متا پست', 'harika' ),
			]
		);

        $this->add_control(
			'harika_archive_pages_meta_categories_display',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __( 'دسته بندی ها', 'harika' ),
				'default' => 'yes',
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
			]
		);

		$this->add_control(
			'harika_archive_pages_meta_date_display',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __( 'تاریخ', 'harika' ),
				'default' => 'yes',
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
			]
		);

		$this->add_control(
			'harika_archive_pages_meta_comments_count_display',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __( 'تعداد نظرات', 'harika' ),
				'default' => 'yes',
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
			]
		);

		




		$this->end_controls_section();

}


}
