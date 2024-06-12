<?php

/**
 * Elementor AZ Title Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Harika_HF_StickySidebar_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'HarikaHFStickySidebar';
	}

	public function get_title() {
		return __( 'سایدبار چسبنده', 'harika' );
	}

	public function get_icon() {
		return 'harika-icon';
	}

	public function get_categories() {
		return [ 'HarikaHeaderFooter' ];
	}
	
	private function get_available_menus() {
		$menus = wp_get_nav_menus();

		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
	}
	private function harika_get_elementor_templates_list() {
		$templates = \Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items('section');
		foreach ( $templates as $template ) {
			$list[$template['template_id']] = $template['title'].'( '.$template['type'].' )';
		}
		return $list;
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
			'menu_in_mobile_show',
			[
				'label' => esc_html__( 'نمایش منو در موبایل', 'harika' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'نمایش', 'harika' ),
				'label_off' => esc_html__( 'مخفی', 'harika' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$menus = $this->get_available_menus();

		if ( ! empty( $menus ) ) {
			$this->add_control(
				'menu',
				[
					'label' => esc_html__( 'منو در حالت موبایل', 'harika' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'save_default' => true,
					'separator' => 'after',
					'description' => sprintf(
						esc_html__( 'برای مدیریت منو های خود به %1$sصفحه منو ها%2$s مراجعه کنید', 'harika' ),
						sprintf( '<a href="%s" target="_blank">', admin_url( 'nav-menus.php' ) ),
						'</a>'
					),
					'condition' => [
						'menu_in_mobile_show' => 'yes',
					],
				]
			);
		} else {
			$this->add_control(
				'menu',
				[
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . esc_html__( 'شما تا کنون هیچ منویی ایجاد نکرده اید', 'harika' ) . '</strong><br>' .
							sprintf(
								/* translators: 1: Link open tag, 2: Link closing tag. */
								esc_html__( 'برای ایجاد یک منو به %1$sصفحه منو ها%2$s مراجعه کنید.', 'harika' ),
								sprintf( '<a href="%s" target="_blank">', admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
								'</a>'
							),
					'separator' => 'after',
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
					'condition' => [
						'menu_in_mobile_show' => 'yes',
					],
				]
			);
		}

		$this->add_control(
			'template_show',
			[
				'label' => esc_html__( 'نمایش تمپلیت', 'harika' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'نمایش', 'harika' ),
				'label_off' => esc_html__( 'مخفی', 'harika' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
            'template', [
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->harika_get_elementor_templates_list(),
                'multiple' => false,
                'label' =>   esc_html__('تمپلیت', 'harika'),
                'label_block' => true,
				'condition' => [
					'template_show' => 'yes',
				],
            ]
        );

		$this->add_control(
			'hr_template_one',
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
				'default' => 'flex-start',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .harika-sticky-side-widget' => 'justify-content: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'open-nav-side',
			[
				'label' => esc_html__( 'از کدام سمت باز شود؟', 'harika' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => esc_html__( 'چپ', 'harika' ),
					'right' => esc_html__( 'راست', 'harika' ),
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
					'{{WRAPPER}} .harika-sticky-side-widget .toggle' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-sticky-side-widget .toggle' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'انتخاب آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-bars',
					'library' => 'fa-solid',
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
				'selector' => '{{WRAPPER}} .harika-sticky-side-widget .toggle i',
			]
		);
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-sticky-side-widget .toggle i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-sticky-side-widget .toggle svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-sticky-side-widget .toggle svg path[fill-rule=evenodd], {{WRAPPER}} .harika-sticky-side-widget .toggle svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .harika-sticky-side-widget .toggle',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-sticky-side-widget .toggle',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-sticky-side-widget .toggle',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-sticky-side-widget .toggle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-sticky-side-widget .toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-sticky-side-widget .toggle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .harika-sticky-side-widget:hover i',
			]
		);
        $this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-sticky-side-widget:hover i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_hover',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-sticky-side-widget:hover svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_hover',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-sticky-side-widget:hover svg path[fill-rule=evenodd], {{WRAPPER}} .harika-sticky-side-widget:hover svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .harika-sticky-side-widget .toggle:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_hover',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-sticky-side-widget .toggle:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_hover',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-sticky-side-widget .toggle:hover',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-sticky-side-widget .toggle:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-sticky-side-widget .toggle:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-sticky-side-widget .toggle:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle i',
			]
		);
        $this->add_control(
			'icon_color_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_dark',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_dark',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle svg path[fill-rule=evenodd], {{WRAPPER}} .harika-sticky-side-widget .toggle svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle:hover i',
			]
		);
        $this->add_control(
			'icon_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle:hover i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle:hover svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle:hover svg path[fill-rule=evenodd], {{WRAPPER}} .harika-sticky-side-widget:hover svg ellipse' => 'fill: {{VALUE}}',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_hover_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_hover_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle:hover',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_hover_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-sticky-side-widget .toggle:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		

		<?php echo '<div class="harika-sticky-side-widget '.$id.' open-from-'.$settings['open-nav-side'].'" data-harika-stickyside =\''.wp_json_encode($options).'\'>';?>


            <a class="toggle"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
			<span class="back-shadow"></span>

			
				<nav class="harika-navigation-dropdown sticky-side-container sidebar-col n-1111111" role="navigation">
					<a class="closebtn">×</a>
					<?php if($settings['menu_in_mobile_show'] === 'yes') : ?>
					<?php
						wp_nav_menu( [
							'menu'            => $settings['menu'],
							'theme_location'  => 'menu-1',
							'fallback_cb'     => false,
							'menu_class'      => 'menu side menu-ul n-1111111',
							'container_class' => 'sidemenu-container',
						] );
					?>
					<?php endif;
					if($settings['template_show'] === 'yes') : ?>
						<?php echo'<div class="side-widget-tmpl">'.do_shortcode('[HARIKA_INSERT_TPL id="'.$settings['template'].'"]').'</div>'; ?>
					<?php endif; ?>
				</nav>
				
        </div>
<?php
	}

	protected function content_template() {

	}

}