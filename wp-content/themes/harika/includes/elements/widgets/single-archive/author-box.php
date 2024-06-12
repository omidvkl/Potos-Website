<?php

class Harika_SA_AuthorBox_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaSAAuthorBox';
	}

	public function get_title() {
		return __( 'باکس نویسنده', 'harika' );
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

	    // insert content controls here ...

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
				'name' => 'name_typography',
				'label' => esc_html__( 'تایپوگرافی نام نویسنده', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-authorbox-widget .info .top-content h3, {{WRAPPER}} .harika-authorbox-widget .info .top-content h3 a',
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => esc_html__( 'رنگ نام نویسنده', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-authorbox-widget .info .top-content h3, {{WRAPPER}} .harika-authorbox-widget .info .top-content h3 a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'disc_typography',
				'label' => esc_html__( 'تایپوگرافی توضیحات', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-authorbox-widget .info .top-content h3, {{WRAPPER}} .harika-authorbox-widget .info .top-content h3 a',
			]
		);
		$this->add_control(
			'disc_color',
			[
				'label' => esc_html__( 'رنگ توضیحات', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-authorbox-widget .info .top-content h3, {{WRAPPER}} .harika-authorbox-widget .info .top-content h3 a' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .harika-authorbox-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-authorbox-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-authorbox-widget',
			]
		);
		
		$this->add_control(
			'box_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-authorbox-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-authorbox-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'name_typography_dark',
				'label' => esc_html__( 'تایپوگرافی نام نویسنده', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-authorbox-widget .info .top-content h3, body.dark_mode {{WRAPPER}} .harika-authorbox-widget .info .top-content h3 a',
			]
		);
		$this->add_control(
			'name_color_dark',
			[
				'label' => esc_html__( 'رنگ نام نویسنده', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-authorbox-widget .info .top-content h3, body.dark_mode {{WRAPPER}} .harika-authorbox-widget .info .top-content h3 a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'disc_typography_dark',
				'label' => esc_html__( 'تایپوگرافی توضیحات', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-authorbox-widget .info .top-content h3, body.dark_mode {{WRAPPER}} .harika-authorbox-widget .info .top-content h3 a',
			]
		);
		$this->add_control(
			'disc_color_dark',
			[
				'label' => esc_html__( 'رنگ توضیحات', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-authorbox-widget .info .top-content h3, body.dark_mode {{WRAPPER}} .harika-authorbox-widget .info .top-content h3 a' => 'color: {{VALUE}}',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-authorbox-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border_dark',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-authorbox-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-authorbox-widget',
			]
		);
		
		$this->add_control(
			'box_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-authorbox-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-authorbox-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();
		
        $this->end_controls_tabs();

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display(); ?>
		
        <div class="harika-authorbox-widget">
            <div class="avatar">
                <?php echo get_avatar( get_the_author_meta('user_email'), '150', '' ); ?>
            </div>
            <div class="info">
                <div class="top-content">
                    <h3><?php the_author_link(); ?></h3>
                    <div class="author-social-links">
                        <?php echo harika_get_user_social_links(); ?>
                    </div>
                </div>
                <div class="description">
                    <?php the_author_meta('description'); ?>
                </div>
            </div>
        </div>






<?php
	}

	protected function content_template() {

	}

}