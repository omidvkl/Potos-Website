<?php

namespace Harika\Includes\Settings;
use Elementor\Core\Kits\Documents\Tabs\Tab_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Settings_Boxes extends Tab_Base {

	public function get_id() {
		return 'harika-settings-boxes';
	}

	public function get_title() {
		return __( 'باکس ها', 'harika' );
	}

	public function get_icon() {
		return 'eicon-lightbox';
	}

	public function get_help_url() {
		return '';
	}

	public function get_group() {
		return 'global';
	}

	protected function register_tab_controls() {

		$this->start_controls_section(
			'harika_boxes_section',
			[
				'tab' => 'harika-settings-boxes',
				'label' => __( 'باکس های صفحات داخلی', 'harika' ),
			]
		);

        $this->add_control(
			'heading_harika_boxes_content_box',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'باکس های محتوا', 'harika' ),
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'harika_boxes_content_box_background',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.harika-layouts.single .page-content,
				.harika-layouts .single-meta,
				.harika-layouts section.comments-area > div,
				.harika-layouts .comments-list ol.comment-list li .comment-respond,
				.harika-layouts.archive main.site-main article.post,
				.harika-layouts.search main.site-main article.post,
				.harika-layouts .harika-box,
				.harika-layouts .harika-404-page,
				.harika-layouts main.page-box-template .page-content,
				.harika-layouts main.page-box-sidebar-template .page-content,
				.harika-layouts .archive-description,
				.harika-layouts .search-no-content',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'harika_boxes_content_box__border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '.harika-layouts.single .page-content,
				.harika-layouts .single-meta,
				.harika-layouts section.comments-area > div,
				.harika-layouts .comments-list ol.comment-list li .comment-respond,
				.harika-layouts.archive main.site-main article.post,
				.harika-layouts.search main.site-main article.post,
				.harika-layouts .harika-box,
				.harika-layouts .harika-404-page,
				.harika-layouts main.page-box-template .page-content,
				.harika-layouts main.page-box-sidebar-template .page-content,
				.harika-layouts .archive-description,
				.harika-layouts .search-no-content',
			]
		);

		$this->add_control(
			'harika_boxes_content_box__border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'.harika-layouts.single .page-content,
					.harika-layouts .single-meta,
					.harika-layouts section.comments-area > div,
					.harika-layouts .comments-list ol.comment-list li .comment-respond,
					.harika-layouts.archive main.site-main article.post,
					.harika-layouts.search main.site-main article.post,
					.harika-layouts .harika-box,
					.harika-layouts .harika-404-page,
					.harika-layouts main.page-box-template .page-content,
					.harika-layouts main.page-box-sidebar-template .page-content,
					.harika-layouts .archive-description,
					.harika-layouts .search-no-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'harika_boxes_content_box__box_shadow',
				'label' => esc_html__( 'سایه', 'harika' ),
				'selector' => '.harika-layouts.single .page-content,
				.harika-layouts .single-meta,
				.harika-layouts section.comments-area > div,
				.harika-layouts .comments-list ol.comment-list li .comment-respond,
				.harika-layouts.archive main.site-main article.post,
				.harika-layouts.search main.site-main article.post,
				.harika-layouts .harika-box,
				.harika-layouts .harika-404-page,
				.harika-layouts main.page-box-template .page-content,
				.harika-layouts main.page-box-sidebar-template .page-content,
				.harika-layouts .archive-description,
				.harika-layouts .search-no-content',
			]
		);

		$this->add_control(
			'heading_harika_boxes_sidebar_box',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__( 'باکس های سایدبار', 'harika' ),
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'harika_boxes_sidebar_box_background',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.harika-layouts .harika-flex-row .sidebar-col .widget',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'harika_boxes_sidebar_box__border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '.harika-layouts .harika-flex-row .sidebar-col .widget',
			]
		);

		$this->add_control(
			'harika_boxes_sidebar_box__border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'.harika-layouts .harika-flex-row .sidebar-col .widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'harika_boxes_sidebar_box__box_shadow',
				'label' => esc_html__( 'سایه', 'harika' ),
				'selector' => '.harika-layouts .harika-flex-row .sidebar-col .widget',
			]
		);





		$this->end_controls_section();

}


}
