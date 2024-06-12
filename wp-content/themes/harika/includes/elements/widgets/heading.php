<?php

class Harika_Heading_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaHeading';
	}

	public function get_title() {
		return __( 'سرتیتر', 'harika' );
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
                'label' => esc_html__( 'تایپوگرافی عنوان', 'harika' ),
                'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .harika-heading-widget .title',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} .harika-heading-widget i',
			]
		);
        
        
		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display();


		echo '<div class="harika-heading-widget">';

            echo '<span class="title">'.$settings['title'].'</span>';
			\Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );

        echo '</div>';
	}

	protected function content_template() {

	}

}