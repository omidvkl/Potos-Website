<?php


class Harika_HF_HotTopics_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'HarikaHFHotTopics';
	}

	public function get_title() {
		return __( 'موضوعات پرطرفدار', 'harika' );
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
			'title-tag',
			[
				'label' => __( 'تگ عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h3',
				'options' => [
					'h1'  => __( 'h1', 'harika' ),
					'h2' => __( 'h2', 'harika' ),
					'h3' => __( 'h3', 'harika' ),
					'h4' => __( 'h4', 'harika' ),
					'h5' => __( 'h5', 'harika' ),
					'h6' => __( 'h6', 'harika' ),
					'p' => __( 'p', 'harika' ),
				],
			]
		);
		$this->add_control(
			'widget_title',
			[
				'label' => __( 'عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'موضوعات پرطرفدار', 'harika' ),
				'placeholder' => __( 'عنوان خود را وارد کنید', 'harika' ),
			]
		);
		$this->add_control(
			'post_count',
			[
				'label' => esc_html__( 'تعداد دسته بندی', 'harika' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 30,
				'step' => 1,
				'default' => 20,
			]
		);
		$this->add_control(
			'height',
			[
				'label' => esc_html__( 'ارتفاع', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 22,
				],
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'hottopics_main_padding',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_style_section',
			[
				'label' => __( 'استایل عنوان', 'harika' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
        	'style_tabs'
        );
        $this->start_controls_tab(
        	'title_style_normal_tab',
        	[
        		'label' => esc_html__( 'عادی', 'harika' ),
        	]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hottopics_title_typography',
				'label' => esc_html__( 'تایپوگرافی عنوان', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-hottopics-widget .title',
			]
		);
		$this->add_control(
			'hottopics_title_color',
			[
				'label' => esc_html__( 'رنگ عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget .title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hottopics_title_background',
				'label' => esc_html__( 'پس زمینه عنوان', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-hottopics-widget .title',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hottopics_title_border',
				'label' => esc_html__( 'کادر دور عنوان', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-hottopics-widget .title',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hottopics_title_box_shadow',
				'label' => esc_html__( 'سایه کادر عنوان', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-hottopics-widget .title',
			]
		);
		$this->add_control(
			'hottopics_title_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget .title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hottopics_title_padding',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		
		$this->start_controls_tab(
        	'title_style_dark_tab',
        	[
        		'label' => esc_html__( 'دارک مود', 'harika' ),
        	]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hottopics_title_typography_dark',
				'label' => esc_html__( 'تایپوگرافی عنوان', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget .title',
			]
		);
		$this->add_control(
			'hottopics_title_color_dark',
			[
				'label' => esc_html__( 'رنگ عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-hottopics-widget .title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hottopics_title_background_dark',
				'label' => esc_html__( 'پس زمینه عنوان', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget .title',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hottopics_title_border_dark',
				'label' => esc_html__( 'کادر دور عنوان', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget .title',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hottopics_title_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر عنوان', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget .title',
			]
		);
		$this->add_control(
			'hottopics_title_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-hottopics-widget .title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hottopics_title_padding_dark',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-hottopics-widget .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
		
        $this->end_controls_tabs();
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'cat_style_section',
			[
				'label' => __( 'استایل دسته ها', 'harika' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
        	'cat_style_tabs'
        );
        $this->start_controls_tab(
        	'cat_style_normal_tab',
        	[
        		'label' => esc_html__( 'عادی', 'harika' ),
        	]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hottopics_cat_typography',
				'label' => esc_html__( 'تایپوگرافی دسته ها', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-hottopics-widget a:not(.title)',
			]
		);
		$this->add_control(
			'hottopics_cat_color',
			[
				'label' => esc_html__( 'رنگ دسته ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget a:not(.title)' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hottopics_cat_background',
				'label' => esc_html__( 'پس زمینه دسته ها', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-hottopics-widget a:not(.title)',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hottopics_cat_border',
				'label' => esc_html__( 'کادر دور دسته ها', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-hottopics-widget a:not(.title)',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hottopics_cat_box_shadow',
				'label' => esc_html__( 'سایه کادر دسته ها', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-hottopics-widget a:not(.title)',
			]
		);
		$this->add_control(
			'hottopics_cat_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget a:not(.title)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hottopics_cat_padding',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget a:not(.title)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		
		$this->start_controls_tab(
        	'cat_style_normal_tab_hover',
        	[
        		'label' => esc_html__( 'هاور', 'harika' ),
        	]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hottopics_cat_typography_hover',
				'label' => esc_html__( 'تایپوگرافی دسته ها', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-hottopics-widget a:not(.title):hover',
			]
		);
		$this->add_control(
			'hottopics_cat_color_hover',
			[
				'label' => esc_html__( 'رنگ دسته ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget a:not(.title):hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hottopics_cat_background_hover',
				'label' => esc_html__( 'پس زمینه دسته ها', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-hottopics-widget a:not(.title):hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hottopics_cat_border_hover',
				'label' => esc_html__( 'کادر دور دسته ها', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-hottopics-widget a:not(.title):hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hottopics_cat_box_shadow_hover',
				'label' => esc_html__( 'سایه کادر دسته ها', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-hottopics-widget a:not(.title):hover',
			]
		);
		$this->add_control(
			'hottopics_cat_border_radius_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget a:not(.title):hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hottopics_cat_padding_hover',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-hottopics-widget a:not(.title):hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		
		$this->start_controls_tab(
        	'cat_style_dark_tab',
        	[
        		'label' => esc_html__( 'دارک مود', 'harika' ),
        	]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hottopics_cat_typography_dark',
				'label' => esc_html__( 'تایپوگرافی دسته ها', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title)',
			]
		);
		$this->add_control(
			'hottopics_cat_color_dark',
			[
				'label' => esc_html__( 'رنگ دسته ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title)' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hottopics_cat_background_dark',
				'label' => esc_html__( 'پس زمینه دسته ها', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title)',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hottopics_cat_border_dark',
				'label' => esc_html__( 'کادر دور دسته ها', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title)',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hottopics_cat_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر دسته ها', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title)',
			]
		);
		$this->add_control(
			'hottopics_cat_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hottopics_cat_padding_dark',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
        
        
        
        $this->start_controls_tab(
        	'cat_style_dark_tab_hover',
        	[
        		'label' => esc_html__( 'هاور دارک', 'harika' ),
        	]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hottopics_cat_typography_dark_hover',
				'label' => esc_html__( 'تایپوگرافی دسته ها', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title):hover',
			]
		);
		$this->add_control(
			'hottopics_cat_color_dark_hover',
			[
				'label' => esc_html__( 'رنگ دسته ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title):hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hottopics_cat_background_dark_hover',
				'label' => esc_html__( 'پس زمینه دسته ها', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title):hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hottopics_cat_border_dark_hover',
				'label' => esc_html__( 'کادر دور دسته ها', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title):hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hottopics_cat_box_shadow_dark_hover',
				'label' => esc_html__( 'سایه کادر دسته ها', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title):hover',
			]
		);
		$this->add_control(
			'hottopics_cat_border_radius_dark_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title):hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hottopics_cat_padding_dark_hover',
			[
				'label' => esc_html__( 'فاصله داخلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-hottopics-widget a:not(.title):hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
        
        
		
        $this->end_controls_tabs();
		
		$this->end_controls_section();
		
		

	}

	protected function render() {
		$settings = $this->get_settings_for_display();  ?>
		
		<div class="harika-hottopics-widget">
    	        <<?php echo $settings['title-tag']; ?> class="title"><?php echo $settings['widget_title']; ?></<?php echo $settings['title-tag']; ?>>
            	    <?php wp_list_categories( array(
                        'orderby' => 'comment_count',
                        'order' => 'DESC',
                        'title_li' => '',
                        'style' => false,
                        'separator' => '',
                        'number' => $settings['post_count'],
                    ) ); ?> 
    	</div>
		
	<?php }

	protected function content_template() {

	}

}