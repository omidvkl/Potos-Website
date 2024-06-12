<?php

namespace Harika\Includes\Settings;
use Elementor\Core\Kits\Documents\Tabs\Tab_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Settings_PostSingle extends Tab_Base {

	public function get_id() {
		return 'harika-settings-post-single';
	}

	public function get_title() {
		return __( 'سینگل پست', 'harika' );
	}

	public function get_icon() {
		return 'eicon-single-page';
	}

	public function get_help_url() {
		return '';
	}

	public function get_group() {
		return 'global';
	}

	private function harika_get_elementor_templates_list_single() {
		$templates = \Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items('single-post');
		$list['0'] = [ '0' => __( 'پیش فرض قالب', 'harika' ) ];
		foreach ( $templates as $template ) {
			if($template['type'] == 'single-post') :
				$template['type'] = 'سینگل';
				$list[$template['template_id']] = $template['title'].'  ('.$template['type'].')';
			endif;
		}
		return $list;
	}

	protected function register_tab_controls() {

		$this->start_controls_section(
			'harika_post_single_choose_section',
			[
				'tab' => 'harika-settings-post-single',
				'label' => __( 'انتخاب طرح سینگل', 'harika' ),
			]
		);

		$this->add_control(
            'harika_single_layout_select', [
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->harika_get_elementor_templates_list_single(),
                'label' =>   esc_html__('انتخاب سینگل پیش فرض', 'harika'),
                'label_block' => true,
				'default' => 0,
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'harika_post_single_section',
			[
				'tab' => 'harika-settings-post-single',
				'label' => __( 'سینگل پیش فرض قالب', 'harika' ),
				'condition' => [
					'harika_single_layout_select' => '0',
				],
			]
		);

		$this->add_control(
			'harika_post_single_sidebar_display',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __( 'سایدبار', 'harika' ),
				'default' => 'yes',
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
			]
		);

        $this->add_control(
			'heading_post_single_featured',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'تصویر شاخص', 'harika' ),
			]
		);

        $this->add_responsive_control(
			'harika_post_single_featured_max_height',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => __( 'حداکثر ارتفاع تصویر شاخص', 'harika' ),
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
					'.harika-layouts .post-single-header .featured-image img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'harika_post_single_featured_height',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => __( 'ارتفاع تصویر شاخص', 'harika' ),
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
					'.harika-layouts .post-single-header .featured-image img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'harika_post_single_featured_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'harika_post_single_featured_background',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.harika-layouts .post-single-header .featured-image:before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'harika_post_single_featured_border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '.harika-layouts .post-single-header .featured-image img',
			]
		);

		$this->add_control(
			'harika_post_single_featured_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'.harika-layouts .post-single-header .featured-image img, .harika-layouts .post-single-header .featured-image:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'harika_post_single_featured_box_shadow',
				'label' => esc_html__( 'سایه', 'harika' ),
				'selector' => '.harika-layouts .post-single-header .featured-image img',
			]
		);

        $this->add_control(
			'heading_post_single_title',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'عنوان پست', 'harika' ),
			]
		);

        $this->add_control(
			'harika_post_single_title_color',
			[
                'label' => esc_html__( 'رنگ عنوان پست', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.harika-layouts .post-single-header .featured-image h1.entry-title' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی عنوان پست', 'harika' ),
                'name' => 'harika_post_single_featured_title_typography',
				'selector' => '.harika-layouts .post-single-header .featured-image h1.entry-title',
			]
		);

        $this->add_control(
			'harika_post_single_featured_title_padding',
			[
				'label' => esc_html__( 'فضای داخلی عنوان پست', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'.harika-layouts .post-single-header .featured-image h1.entry-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'heading_post_single_share',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'دکمه اشتراک گذاری', 'harika' ),
			]
		);

        $this->add_control(
			'harika_post_single_share_icon',
			[
				'label' => esc_html__( 'آیکن اشتراک گذاری', 'harika' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa-light fa-share-nodes',
					'library' => 'fa-light',
				],
			]
		);

        $this->add_control(
			'harika_post_single_featured_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->start_controls_tabs(
        	'harika_post_single_share_tabs'
        );
        $this->start_controls_tab(
        	'harika_post_single_share_normal_tab',
        	[
        		'label' => esc_html__( 'عادی', 'harika' ),
        	]
        );

        $this->add_control(
			'harika_post_single_share_icon_color',
			[
                'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.harika-layouts .post-single-header .featured-image .share-post i' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'harika_post_single_share_background',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.harika-layouts .post-single-header .featured-image .share-post',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'harika_post_single_share_border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '.harika-layouts .post-single-header .featured-image .share-post',
			]
		);

		$this->add_control(
			'harika_post_single_share_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'.harika-layouts .post-single-header .featured-image .share-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'harika_post_single_share_box_shadow',
				'label' => esc_html__( 'سایه', 'harika' ),
				'selector' => '.harika-layouts .post-single-header .featured-image .share-post',
			]
		);

        $this->end_controls_tab();
        
        $this->start_controls_tab(
        	'harika_post_single_share_hover_tab',
        	[
        		'label' => esc_html__( 'هاور', 'harika' ),
        	]
        );

        $this->add_control(
			'harika_post_single_share_icon_color_hover',
			[
                'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.harika-layouts .post-single-header .featured-image .share-post:hover i' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'harika_post_single_share_background_hover',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.harika-layouts .post-single-header .featured-image .share-post:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'harika_post_single_share_border_hover',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '.harika-layouts .post-single-header .featured-image .share-post:hover',
			]
		);

		$this->add_control(
			'harika_post_single_share_border_radius_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'.harika-layouts .post-single-header .featured-image .share-post:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'harika_post_single_share_box_shadow_hover',
				'label' => esc_html__( 'سایه', 'harika' ),
				'selector' => '.harika-layouts .post-single-header .featured-image .share-post:hover',
			]
		);

        $this->end_controls_tab();
		
        $this->end_controls_tabs();


        $this->add_control(
			'harika_post_single_meta',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'متا پست', 'harika' ),
			]
		);

        $this->add_control(
			'harika_post_single_meta_author_display',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __( 'نویسنده', 'harika' ),
				'default' => 'yes',
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
			]
		);

		$this->add_control(
			'harika_post_single_meta_date_display',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __( 'تاریخ', 'harika' ),
				'default' => 'yes',
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
			]
		);

		$this->add_control(
			'harika_post_single_meta_comments_count_display',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __( 'تعداد نظرات', 'harika' ),
				'default' => 'yes',
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
			]
		);

		$this->add_control(
			'harika_post_single_meta_categories_display',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __( 'دسته بندی ها', 'harika' ),
				'default' => 'yes',
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
			]
		);

		$this->add_control(
			'harika_post_single_meta_tags_display',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __( 'برچسب ها', 'harika' ),
				'default' => 'yes',
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
			]
		);





		$this->end_controls_section();

	}


}
