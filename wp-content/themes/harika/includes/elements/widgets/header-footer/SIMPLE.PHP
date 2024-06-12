<?php

class Harika_Name_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaName';
	}

	public function get_title() {
		return __( 'name abc', 'harika' );
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

	    // insert content controls here ...

	    $this->end_controls_section();
		
		
		
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'استایل', 'harika' ),
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