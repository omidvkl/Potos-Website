<?php


class Harika_HF_DarkMode_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaHFDarkMode';
	}


	public function get_title() {
		return __( 'دارک مود', 'harika' );
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
				'label' => __( 'تنظیمات', 'harika' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'light_icon',
			[
				'label' => esc_html__( 'آیکن حالت روشن', 'harika' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-moon',
					'library' => 'fa-regular',
				],
			]
		);

		$this->add_control(
			'dark_icon',
			[
				'label' => esc_html__( 'آیکن حالت دارک', 'harika' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-sun',
					'library' => 'fa-regular',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'ترازبندی', 'harika' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-end' => [
						'title' => __( 'چپ', 'harika' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'وسط', 'harika' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-start' => [
						'title' => __( 'راست', 'harika' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .harika-darkmode-widget' => 'justify-content: {{VALUE}};',
				],
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
					'{{WRAPPER}} .harika-darkmode-widget .switcher' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-darkmode-widget .switcher' => 'height: {{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .harika-darkmode-widget .switcher i',
			]
		);
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-darkmode-widget .switcher .moon i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-darkmode-widget .switcher .moon svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-darkmode-widget .switcher .moon svg path[fill-rule=evenodd], {{WRAPPER}} .harika-darkmode-widget .switcher svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .harika-darkmode-widget .switcher',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-darkmode-widget .switcher',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-darkmode-widget .switcher',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-darkmode-widget .switcher' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-darkmode-widget .switcher' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-darkmode-widget .switcher' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .harika-darkmode-widget .switcher:hover i',
			]
		);
        $this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-darkmode-widget .switcher:hover .moon i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_hover',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-darkmode-widget .switcher:hover .moon svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_hover',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-darkmode-widget .switcher:hover .moon svg path[fill-rule=evenodd], {{WRAPPER}} .harika-darkmode-widget .switcher:hover svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .harika-darkmode-widget .switcher:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_hover',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-darkmode-widget .switcher:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_hover',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-darkmode-widget .switcher:hover',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-darkmode-widget .switcher:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-darkmode-widget .switcher:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-darkmode-widget .switcher:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher i',
			]
		);
        $this->add_control(
			'icon_color_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher .sun i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_dark',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher .sun svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_dark',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher .sun svg path[fill-rule=evenodd], {{WRAPPER}} .harika-darkmode-widget .switcher svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher:hover i',
			]
		);
        $this->add_control(
			'icon_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher:hover .sun i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher:hover .sun svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher:hover .sun svg path[fill-rule=evenodd], {{WRAPPER}} .harika-darkmode-widget .switcher:hover svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_hover_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_hover_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher:hover',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_hover_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-darkmode-widget .switcher:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		
        $this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$body_classes = get_body_class();

		$harika_default_skin = harika_get_setting( 'harika_default_skin' );

		 if ( $harika_default_skin == 'dark' && !isset($_COOKIE['night_mode'])){
			$is_night = 'checked';
		 $dark_now = ' dark-now';
		 } else if(isset($_COOKIE['night_mode']) && $_COOKIE['night_mode']== "1" ) {
         $is_night = 'checked';
		 $dark_now = ' dark-now';
         }
         else if (in_array('dark_mode',$body_classes)) {
			$is_night = 'checked';
		 $dark_now = ' dark-now';
		 } else {
          $is_night = '';
		  $dark_now = '';
         }

		
		
		?>
		
		<div class="harika-darkmode-widget">
			<span class="switcher<?php echo $dark_now; ?>">
				<input class="input" type="checkbox" '.$checked.' <?php echo $is_night; ?>>
				<div class="moon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['light_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<div class="sun">
					<?php \Elementor\Icons_Manager::render_icon( $settings['dark_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
			</span>
		</div>

	<?php }

	protected function content_template() {

	}

}