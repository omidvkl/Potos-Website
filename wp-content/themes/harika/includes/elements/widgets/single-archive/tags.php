<?php

class Harika_SA_Tags_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaSATags';
	}

	public function get_title() {
		return __( 'برچسب ها', 'harika' );
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

	    $this->add_control(
            'main_title', [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' =>   esc_html__('عنوان', 'harika'),
                'label_block' => true,
                'default' =>esc_html__('برچسب ها : ', 'harika'),
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
			'heading_title',
			[
				'label' => esc_html__( 'عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'تایپوگرافی عنوان', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-tags-widget .title',
			]
		);
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'رنگ عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-tags-widget .title' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'heading_tags',
			[
				'label' => esc_html__( 'برچسب ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tag_typography',
				'label' => esc_html__( 'تایپوگرافی برچسب', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-tags-widget .tag-links a',
			]
		);
        $this->add_control(
			'tag_color',
			[
				'label' => esc_html__( 'رنگ برچسب', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-tags-widget .tag-links a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'tag_background',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-tags-widget .tag-links a',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tag_border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-tags-widget .tag-links a',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tag_box_shadow',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-tags-widget .tag-links a',
			]
		);
		
		$this->add_control(
			'tag_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-tags-widget .tag-links a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'tag_padding',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-tags-widget .tag-links a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .harika-tags-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-tags-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-tags-widget',
			]
		);
		
		$this->add_control(
			'box_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-tags-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-tags-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'heading_tags_hover',
			[
				'label' => esc_html__( 'برچسب ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tag_typography_hover',
				'label' => esc_html__( 'تایپوگرافی برچسب', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-tags-widget .tag-links a:hover',
			]
		);
        $this->add_control(
			'tag_color_hover',
			[
				'label' => esc_html__( 'رنگ برچسب', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-tags-widget .tag-links a:hover' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'tag_background_hover',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-tags-widget .tag-links a:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tag_border_hover',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-tags-widget .tag-links a:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tag_box_shadow_hover',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-tags-widget .tag-links a:hover',
			]
		);
		
		$this->add_control(
			'tag_border_radius_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-tags-widget .tag-links a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'tag_padding_hover',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-tags-widget .tag-links a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'heading_title_dark',
			[
				'label' => esc_html__( 'عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography_dark',
				'label' => esc_html__( 'تایپوگرافی عنوان', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget .title',
			]
		);
        $this->add_control(
			'title_color_dark',
			[
				'label' => esc_html__( 'رنگ عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-tags-widget .title' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'heading_tags_dark',
			[
				'label' => esc_html__( 'برچسب ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tag_typography_dark',
				'label' => esc_html__( 'تایپوگرافی برچسب', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a',
			]
		);
        $this->add_control(
			'tag_color_dark',
			[
				'label' => esc_html__( 'رنگ برچسب', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'tag_background_dark',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tag_border_dark',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tag_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a',
			]
		);
		
		$this->add_control(
			'tag_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'tag_padding_dark',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border_dark',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget',
			]
		);
		
		$this->add_control(
			'box_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-tags-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-tags-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'heading_tags_dark_hover',
			[
				'label' => esc_html__( 'برچسب ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tag_typography_dark_hover',
				'label' => esc_html__( 'تایپوگرافی برچسب', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a:hover',
			]
		);
        $this->add_control(
			'tag_color_dark_hover',
			[
				'label' => esc_html__( 'رنگ برچسب', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a:hover' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'tag_background_dark_hover',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tag_border_dark_hover',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tag_box_shadow_dark_hover',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a:hover',
			]
		);
		
		$this->add_control(
			'tag_border_radius_dark_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'tag_padding_dark_hover',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-tags-widget .tag-links a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();
		
        $this->end_controls_tabs();

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display();
		if(has_tag()) : ?>
            <div class="harika-tags-widget">
                <span class="title"><?php echo $settings['main_title']; ?></span>
                <?php the_tags( '<span class="tag-links"> ', ' ', ' </span>' ); ?>
            </div>
        <?php endif;
	}

	protected function content_template() {

	}

}