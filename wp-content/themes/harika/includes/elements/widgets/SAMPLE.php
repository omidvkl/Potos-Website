<?php

class Parsian_Title_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ParsianTitle';
	}

	public function get_title() {
		return __( 'widget name ABC', 'parsian' );
	}

	public function get_icon() {
		return 'parsian-icon';
	}

	public function get_categories() {
		return [ 'ParsianElements' ];
	}






	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'محتوا', 'parsian' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

	    // insert content controls here ...

	    $this->end_controls_section();
		
		
		
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'استایل', 'parsian' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // insert style controls here ...

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display();
		echo 'hello world!';
	}

	protected function content_template() {

	}

}