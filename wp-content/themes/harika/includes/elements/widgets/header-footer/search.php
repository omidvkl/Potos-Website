<?php


class Harika_HF_Search_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'HarikaHFSearch';
	}

	public function get_title() {
		return __( 'فرم جستجو', 'harika' );
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
			'search_layout',
			[
				'label' => esc_html__( 'طرح بندی', 'harika' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'minimal',
				'options' => [
					'minimal'  => esc_html__( 'مینیمال', 'harika' ),
					'classic' => esc_html__( 'کلاسیک', 'harika' ),
				],
			]
		);
		$this->add_control(
			'hr_layout',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
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
					'{{WRAPPER}} .harika-search-widget' => 'justify-content: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'search_title_first',
			[
				'label' => esc_html__( 'بخش اول عنوان جستجو', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( ':: برای جستجو', 'harika' ),
				'condition' => [
        			'search_layout' => 'minimal',
        		],
			]
		);
		$this->add_control(
			'search_title_second',
			[
				'label' => esc_html__( 'بخش دوم عنوان جستجو', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'تایپ', 'harika' ),
				'condition' => [
        			'search_layout' => 'minimal',
        		],
			]
		);
		$this->add_control(
			'search_title_third',
			[
				'label' => esc_html__( 'بخش سوم عنوان جستجو', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'کنید ::', 'harika' ),
				'condition' => [
        			'search_layout' => 'minimal',
        		],
			]
		);
		$this->add_control(
			'hr_one_22',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' => [
        			'search_layout' => 'minimal',
        		],
			]
		);
		$this->add_control(
			'search_input_title',
			[
				'label' => esc_html__( 'متن فرم جستجو', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'جستجو ...', 'harika' ),
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-search',
					'library' => 'fa-solid',
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
					'{{WRAPPER}} .harika-search-widget .toggle-search-box' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-search-widget .toggle-search-box' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'استایل', 'harika' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
        			'search_layout' => 'minimal',
        		],
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
				'selector' => '{{WRAPPER}} .harika-search-widget .toggle-search-box i',
			]
		);
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-search-widget .toggle-search-box i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-search-widget .toggle-search-box svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-search-widget .toggle-search-box svg path[fill-rule=evenodd], {{WRAPPER}} .harika-search-widget .toggle-search-box svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .harika-search-widget .toggle-search-box',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-search-widget .toggle-search-box',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-search-widget .toggle-search-box',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-search-widget .toggle-search-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-search-widget .toggle-search-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-search-widget .toggle-search-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_search_box_style',
			[
				'label' => esc_html__( 'استایل باکس کلی جستجو (عادی)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'search_box_icon_typography',
				'selector' => '{{WRAPPER}} .harika-search .btn i',
			]
		);
        $this->add_control(
			'search_box_icon_color',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-search .btn i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'search_box_icon_svg_stroke_color',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-search .btn svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'search_box_icon_svg_fill_color',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-search .btn svg path[fill-rule=evenodd], {{WRAPPER}} .harika-search .btn svg ellipse' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'hr_search_box_one',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'search_box_main_color',
			[
				'label' => esc_html__( 'رنگ اصلی باکس جستجو', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-search .close, {{WRAPPER}} .harika-search h3 span' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .harika-search input[type="text"]' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .harika-search .btn:hover i' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .harika-search-widget .toggle-search-box:hover i',
			]
		);
        $this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-search-widget .toggle-search-box:hover i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_hover',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-search-widget .toggle-search-box:hover svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_hover',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-search-widget .toggle-search-box:hover svg path[fill-rule=evenodd], {{WRAPPER}} .harika-search-widget .toggle-search-box svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .harika-search-widget .toggle-search-box:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_hover',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-search-widget .toggle-search-box:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_hover',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-search-widget .toggle-search-box:hover',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-search-widget .toggle-search-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-search-widget .toggle-search-box:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-search-widget .toggle-search-box:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
        	'style_dark_tab',
        	[
        		'label' => esc_html__( 'دارک', 'harika' ),
        	]
        );
        
		$this->add_control(
			'heading_icon_style_dark',
			[
				'label' => esc_html__( 'استایل آیکن (دارک مود)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography_dark',
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box i',
			]
		);
        $this->add_control(
			'icon_color_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_dark',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_dark',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box svg path[fill-rule=evenodd], {{WRAPPER}} .harika-search-widget .toggle-search-box svg ellipse' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_icon_box_style_dark',
			[
				'label' => esc_html__( 'استایل باکس آیکن (دارک مود)', 'harika' ),
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box:hover i',
			]
		);
        $this->add_control(
			'icon_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box:hover i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box:hover svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box:hover svg path[fill-rule=evenodd], {{WRAPPER}} .harika-search-widget .toggle-search-box svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_hover_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_hover_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box:hover',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_hover_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-search-widget .toggle-search-box:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
        
        



		
        $this->end_controls_tabs();
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$id = 'd-'.substr( $this->get_id_int(), 0, 3 );
		$options = [
            'id' => $id,
        ];
		?>
		
		<!------------------------------------------------------------------------------------------------------------------>
		
		<?php if($settings['search_layout'] == 'minimal'):
    		echo '<div class="harika-search-widget minimal '.$id.'" data-harika-search =\''.wp_json_encode($options).'\'>';?>
        	    <a class="toggle-search-box"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
        	    <div class="harika-search">
					<span class="back-shadow"></span>
					<button type="button" class="close">×</button>
					<h3><?php echo $settings['search_title_first']; ?><span><?php echo '&nbsp;'.$settings['search_title_second'].'&nbsp;'; ?></span><?php echo $settings['search_title_third']; ?></h3>
					<form role="search" class="form-search" method="get" id="searchform" action="<?php echo home_url( '/' );?>" >
						<div class="harika-search-box">
							<input type="text" value="" name="s" placeholder="<?php echo $settings['search_input_title']; ?>" />
							<button type="submit" class="btn btn-primary"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></button>
						</div>
					</form>
                </div>
            </div>
		<?php endif; ?>
		
		<!------------------------------------------------------------------------------------------------------------------>
		
		<?php if($settings['search_layout'] == 'classic'):
    		echo '<div class="harika-search-widget classic '.$id.'" data-harika-stickyside =\''.wp_json_encode($options).'\'>';?>
                <form role="search" class="form-search" method="get" id="searchform" action="<?php echo home_url( '/' );?>" >
                    <div class="harika-search-box">
                        <input type="text" value="" name="s" placeholder="<?php echo $settings['search_input_title']; ?>" />
                        <button type="submit" class="btn btn-primary"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></button>
                    </div>
                </form>
            </div>
		<?php endif; ?>
		
		<!------------------------------------------------------------------------------------------------------------------>
		
	<?php }

	protected function content_template() {

	}

}