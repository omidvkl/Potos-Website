<?php

class Harika_IconLink_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaIconLink';
	}

	public function get_title() {
		return __( 'لینک آیکن', 'harika' );
	}

	public function get_icon() {
		return 'harika-icon';
	}

	public function get_categories() {
		return [ 'HarikaElements' ];
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
			'title', [
				'label' => esc_html__( 'عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'نمونه عنوان' , 'harika' ),
				'label_block' => true,
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
			'hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'show_btn',
			[
				'label' => esc_html__( 'نمایش دکمه', 'harika' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'نمایش', 'harika' ),
				'label_off' => esc_html__( 'مخفی', 'harika' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'btn_title', [
				'label' => esc_html__( 'عنوان دکمه', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'مشاهده همه' , 'harika' ),
				'label_block' => true,
                'condition' => [
                    'show_btn' => 'yes',
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

	    $this->end_controls_section();
		
		
		
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'استایل', 'harika' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} .harika-iconlink-widget .content i',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی عنوان', 'harika' ),
                'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .harika-iconlink-widget .content .title',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی دکمه', 'harika' ),
                'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .harika-iconlink-widget .btn',
			]
		);

        $this->add_control(
			'main_color',
			[
				'label' => esc_html__( 'رنگ اصلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-iconlink-widget .btn, {{WRAPPER}} .harika-iconlink-widget:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .harika-iconlink-widget:hover .btn' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_main_box',
			[
				'label' => esc_html__( 'باکس اصلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'main_background',
				'label' => esc_html__( 'پس زمینه', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-iconlink-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'main_border',
				'label' => esc_html__( 'کادر دور', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-iconlink-widget',
			]
		);
		$this->add_control(
			'main_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .harika-iconlink-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'main_box_shadow',
				'label' => esc_html__( 'سایه', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-iconlink-widget',
			]
		);

		$this->add_control(
			'main_padding',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-iconlink-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'hover_animation',
			[
				'label' => __( 'انیمیشن هاور', 'az-elements' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
				'prefix_class' => 'elementor-animation-',
			]
		);

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display();

        if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'link', $settings['link'] );
		}

		echo '<a class="harika-iconlink-widget '.$settings['hover_animation'].'" '.$this->get_render_attribute_string( 'link' ).'>';

            echo '<div class="content">';
                \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
                echo '<span class="title">'.$settings['title'].'</span>';
            echo '</div>';
            if($settings['show_btn'] === 'yes'){
            echo '<span class="btn"> ' . $settings['btn_title'] . '</span>';
            }
            
        echo '</a>';
	}

	protected function content_template() {

	}

}