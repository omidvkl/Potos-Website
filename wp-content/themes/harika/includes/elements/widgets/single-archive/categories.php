<?php

class Harika_SA_Categories_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaSACategories';
	}

	public function get_title() {
		return __( 'دسته بندی ها', 'harika' );
	}

	public function get_icon() {
		return 'harika-icon';
	}

	public function get_categories() {
		return [ 'HarikaSingleArchive' ];
	}






	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'محتوا', 'harika' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

	    $this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'ترازبندی', 'harika' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'چپ', 'harika' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'وسط', 'harika' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'راست', 'harika' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .harika-categories-widget' => 'text-align: {{VALUE}};',
				],
			]
		);

	    $this->end_controls_section();
		
		
		
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'استایل', 'harika' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
		

        $this->start_controls_tabs(
        	'style_tabs'
        );
        $this->start_controls_tab(
        	'style_normal_tab',
        	[
        		'label' => esc_html__( 'عادی', 'harika' ),
        	]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_text_typography',
				'label' => esc_html__( 'تایپوگرافی دسته', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-categories-widget a',
			]
		);
		$this->add_control(
			'cat_text_color',
			[
				'label' => esc_html__( 'رنگ متن دسته', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-categories-widget a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'cat_background',
			[
				'label' => esc_html__( 'رنگ زمینه دسته', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-categories-widget a' => 'background: {{VALUE}} !important',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'cat_border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-categories-widget a',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'cat_box_shadow',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-categories-widget a',
			]
		);
		
		$this->add_control(
			'cat_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-categories-widget a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'cat_padding',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-categories-widget a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
        	'style_hover_tab',
        	[
        		'label' => esc_html__( 'هاور', 'harika' ),
        	]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_text_typography_hover',
				'label' => esc_html__( 'تایپوگرافی دسته', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-categories-widget a:hover',
			]
		);
		$this->add_control(
			'cat_text_color_hover',
			[
				'label' => esc_html__( 'رنگ متن دسته', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-categories-widget a:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'cat_background_hover',
			[
				'label' => esc_html__( 'رنگ زمینه دسته', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-categories-widget a:hover' => 'background: {{VALUE}} !important',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'cat_border_hover',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-categories-widget a:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'cat_box_shadow_hover',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-categories-widget a:hover',
			]
		);
		
		$this->add_control(
			'cat_border_radius_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-categories-widget a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'cat_padding_hover',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-categories-widget a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();


        $this->start_controls_tab(
        	'style_normal_tab_dark',
        	[
        		'label' => esc_html__( 'دارک', 'harika' ),
        	]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_text_typography_dark',
				'label' => esc_html__( 'تایپوگرافی دسته', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-categories-widget a',
			]
		);
		$this->add_control(
			'cat_text_color_dark',
			[
				'label' => esc_html__( 'رنگ متن دسته', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-categories-widget a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'cat_background_dark',
			[
				'label' => esc_html__( 'رنگ زمینه دسته', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-categories-widget a' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'cat_border_dark',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-categories-widget a',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'cat_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-categories-widget a',
			]
		);
		
		$this->add_control(
			'cat_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-categories-widget a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'cat_padding_dark',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-categories-widget a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
        	'style_hover_tab_dark',
        	[
        		'label' => esc_html__( 'هاور دارک', 'harika' ),
        	]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_text_typography_hover_dark',
				'label' => esc_html__( 'تایپوگرافی دسته', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-categories-widget a:hover',
			]
		);
		$this->add_control(
			'cat_text_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ متن دسته', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-categories-widget a:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'cat_background_hover_dark',
			[
				'label' => esc_html__( 'رنگ زمینه دسته', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-categories-widget a:hover' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'cat_border_hover_dark',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-categories-widget a:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'cat_box_shadow_hover_dark',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-categories-widget a:hover',
			]
		);
		
		$this->add_control(
			'cat_border_radius_hover_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-categories-widget a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'cat_padding_hover_dark',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-categories-widget a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();
		
        $this->end_controls_tabs();

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display();
		echo '<div class="harika-categories-widget">';
            echo harika_get_category();
        echo '</div>';
	}

	protected function content_template() {

	}

}