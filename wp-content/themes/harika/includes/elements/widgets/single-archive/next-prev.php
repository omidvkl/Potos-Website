<?php

class Harika_SA_NextPrev_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaSANextPrev';
	}

	public function get_title() {
		return __( 'پست بعدی/قبلی', 'harika' );
	}

	public function get_icon() {
		return 'harika-icon';
	}

	public function get_categories() {
		return [ 'HarikaSingleArchive' ];
	}






	protected function register_controls() {

		//$this->start_controls_section(
		//	'content_section',
		//	[
		//		'label' => __( 'محتوا', 'harika' ),
		//		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		//	]
		//);

	    // insert content controls here ...

	    //$this->end_controls_section();
		
		
		
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
			'main_color',
			[
				'label' => esc_html__( 'رنگ اصلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-nextprev-widget .post-nav.prev, {{WRAPPER}} .harika-nextprev-widget .post-nav.next' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .harika-nextprev-widget .post-nav span.post-l-attr span:last-child, {{WRAPPER}} .harika-nextprev-widget .post-nav span.post-n-attr span:first-child' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .harika-nextprev-widget .post-nav a:hover' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'post_color',
			[
				'label' => esc_html__( 'رنگ پست', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-nextprev-widget .post-nav a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'post_bg_color',
			[
				'label' => esc_html__( 'رنگ زمینه پست', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-nextprev-widget .post-nav' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_box',
			[
				'label' => esc_html__( 'باکس کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-nextprev-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-nextprev-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-nextprev-widget',
			]
		);
		
		$this->add_control(
			'box_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-nextprev-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'box_padding',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-nextprev-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'main_color_dark',
			[
				'label' => esc_html__( 'رنگ اصلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-nextprev-widget .post-nav.prev, body.dark_mode {{WRAPPER}} .harika-nextprev-widget .post-nav.next' => 'border-color: {{VALUE}}',
                    'body.dark_mode {{WRAPPER}} .harika-nextprev-widget .post-nav span.post-l-attr span:last-child, body.dark_mode {{WRAPPER}} .harika-nextprev-widget .post-nav span.post-n-attr span:first-child' => 'background-color: {{VALUE}}',
                    'body.dark_mode {{WRAPPER}} .harika-nextprev-widget .post-nav a:hover' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'post_color_dark',
			[
				'label' => esc_html__( 'رنگ پست', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-nextprev-widget .post-nav a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'post_bg_color_dark',
			[
				'label' => esc_html__( 'رنگ زمینه پست', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-nextprev-widget .post-nav' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_box_dark',
			[
				'label' => esc_html__( 'باکس کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background_dark',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-nextprev-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border_dark',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-nextprev-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-nextprev-widget',
			]
		);
		
		$this->add_control(
			'box_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-nextprev-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'box_padding_dark',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-nextprev-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
		
        $this->end_controls_tabs();


		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display(); ?>
		
        <div class="harika-nextprev-widget">
            <p class="post-nav prev"><?php previous_post_link('<span class="post-l-attr"><span>&laquo</span><span>'.__('پست قبلی', 'harika').'</span></span> %link') ?></p>
            <p class="post-nav next"><?php next_post_link('%link <span class="post-n-attr"><span>'.__('پست بعدی', 'harika').'</span><span>&raquo</span></span>') ?></p>
        </div>

	<?php
    }

	protected function content_template() {

	}

}