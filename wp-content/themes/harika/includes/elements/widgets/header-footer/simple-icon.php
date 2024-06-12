<?php

class Harika_HF_Simple_Icon_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaHFSimpleIcon';
	}

	public function get_title() {
		return __( 'آیکن ساده', 'harika' );
	}

	public function get_icon() {
		return 'harika-icon';
	}

	public function get_categories() {
		return [ 'HarikaHeaderFooter' ];
	}






	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'محتوا', 'harika' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

	    $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle-notch',
					'library' => 'fa-solid',
				],
			]
		);

        $this->add_control(
			'link',
			[
				'label' => esc_html__( 'لینک', 'harika' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'harika' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_responsive_control(
			'align_items',
			[
				'label' => esc_html__( 'ترازبندی', 'harika' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-end' => [
						'title' => esc_html__( 'چپ', 'harika' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'وسط', 'harika' ),
						'icon' => 'eicon-h-align-center',
					],
					'flex-start' => [
						'title' => esc_html__( 'راست', 'harika' ),
						'icon' => 'eicon-h-align-right',
					],
				],
                'selectors' => [
					'{{WRAPPER}} a.simple-icon-widget-link' => 'justify-content: {{VALUE}};',
				],
				'prefix_class' => 'harika-simple-icon-widget__align-',
			]
		);

		$this->add_control(
			'hr_content_one',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'عرض', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__( 'ارتفاع', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => 'px',
				],
				'mobile_default' => [
					'unit' => 'px',
				],
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget' => 'height: {{SIZE}}{{UNIT}};',
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

        $this->add_control(
			'heading_icon_style',
			[
				'label' => esc_html__( 'استایل آیکن (عادی)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} .harika-simpleicon-widget i',
			]
		);
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget svg path[fill-rule=evenodd], {{WRAPPER}} .harika-simpleicon-widget svg ellipse' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_icon_box_style',
			[
				'label' => esc_html__( 'استایل باکس آیکن (عادی)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_background',
				'label' => esc_html__( 'پس زمینه کلی', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-simpleicon-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-simpleicon-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-simpleicon-widget',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'hr_one',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'icon_box_padding',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'icon_box_margin',
			[
				'label' => esc_html__( 'فاصله خارجی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$this->add_control(
			'heading_icon_style_hover',
			[
				'label' => esc_html__( 'استایل آیکن (هاور)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography_hover',
				'selector' => '{{WRAPPER}} .harika-simpleicon-widget:hover i',
			]
		);
        $this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget:hover i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_hover',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget:hover svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_hover',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget:hover svg path[fill-rule=evenodd], {{WRAPPER}} .harika-simpleicon-widget:hover svg ellipse' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_icon_box_style_hover',
			[
				'label' => esc_html__( 'استایل باکس آیکن (هاور)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_background_hover',
				'label' => esc_html__( 'پس زمینه کلی', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-simpleicon-widget:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_hover',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-simpleicon-widget:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_hover',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-simpleicon-widget:hover',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'hr_one_hover',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'icon_box_padding_hover',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'icon_box_margin_hover',
			[
				'label' => esc_html__( 'فاصله خارجی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-simpleicon-widget:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_control(
			'heading_icon_style_dark',
			[
				'label' => esc_html__( 'استایل آیکن (دارک)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography_dark',
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget i',
			]
		);
        $this->add_control(
			'icon_color_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_dark',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_dark',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget svg path[fill-rule=evenodd], {{WRAPPER}} .harika-simpleicon-widget svg ellipse' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_icon_box_style_dark',
			[
				'label' => esc_html__( 'استایل باکس آیکن (دارک)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_background_dark',
				'label' => esc_html__( 'پس زمینه کلی', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'hr_one_dark',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'icon_box_padding_dark',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'icon_box_margin_dark',
			[
				'label' => esc_html__( 'فاصله خارجی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$this->add_control(
			'heading_icon_style_hover_dark',
			[
				'label' => esc_html__( 'استایل آیکن (هاور دارک)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography_hover_dark',
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget:hover i',
			]
		);
        $this->add_control(
			'icon_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget:hover i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget:hover svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget:hover svg path[fill-rule=evenodd], {{WRAPPER}} .harika-simpleicon-widget:hover svg ellipse' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_icon_box_style_hover_dark',
			[
				'label' => esc_html__( 'استایل باکس آیکن (هاور دارک)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_background_hover_dark',
				'label' => esc_html__( 'پس زمینه کلی', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_hover_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_hover_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget:hover',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_hover_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'hr_one_hover_dark',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'icon_box_padding_hover_dark',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'icon_box_margin_hover_dark',
			[
				'label' => esc_html__( 'فاصله خارجی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-simpleicon-widget:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		
        $this->end_controls_tabs();

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display();
        if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'link', $settings['link'] );
		}

        if ( ! empty( $settings['link']['url'] ) ) {
            echo '<a '.$this->get_render_attribute_string( 'link' ).' class="simple-icon-widget-link">';
            }
                echo '<div class="harika-simpleicon-widget">';

                    \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );

                echo '</div>';
        if ( ! empty( $settings['link']['url'] ) ) {echo '</a>';}
	}

	protected function content_template() {

	}

}