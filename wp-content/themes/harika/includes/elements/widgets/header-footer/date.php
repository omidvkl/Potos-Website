<?php

class Harika_HF_Date_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaHFDate';
	}

	public function get_title() {
		return __( 'تاریخ', 'harika' );
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
			'format', [
				'label' => esc_html__( 'فرمت تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'j F Y' , 'harika' ),
				'label_block' => true,
			]
		);

	    $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-calendar',
					'library' => 'fa-regular',
				],
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
			'heading_date_style',
			[
				'label' => esc_html__( 'استایل تاریخ (عادی)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی تاریخ', 'harika' ),
                'name' => 'date_typography',
				'selector' => '{{WRAPPER}} .harika-date-widget .date',
			]
		);
        $this->add_control(
			'date_color',
			[
				'label' => esc_html__( 'رنگ تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-date-widget .date' => 'color: {{VALUE}}',
				],
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
				'selector' => '{{WRAPPER}} .harika-date-widget i',
			]
		);
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-date-widget i' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'icon_margin_left',
			[
				'label' => esc_html__( 'فاصله آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-date-widget i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
        	'style_normal_tab_dark',
        	[
        		'label' => esc_html__( 'دارک مود', 'harika' ),
        	]
        );

        $this->add_control(
			'heading_date_style_dark',
			[
				'label' => esc_html__( 'استایل تاریخ (دارک مود)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی تاریخ', 'harika' ),
                'name' => 'date_typography_dark',
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-date-widget .date',
			]
		);
        $this->add_control(
			'date_color_dark',
			[
				'label' => esc_html__( 'رنگ تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-date-widget .date' => 'color: {{VALUE}}',
				],
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-date-widget i',
			]
		);
        $this->add_control(
			'icon_color_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-date-widget i' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'icon_margin_left_dark',
			[
				'label' => esc_html__( 'فاصله آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-date-widget i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display();

        $date_format = 'j F Y';

        if($settings['format'] !== ''){
            $date_format = $settings['format'];
        }

        echo '<div class="harika-date-widget">';

            \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
            echo '<a class="date">'. date_i18n($date_format) .'</a>';

        echo '</div>';

	}

	protected function content_template() {

	}

}