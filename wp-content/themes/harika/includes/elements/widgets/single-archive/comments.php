<?php

class Harika_SA_Comments_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaSAComments';
	}

	public function get_title() {
		return __( 'نظرات', 'harika' );
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

        // insert style controls here ...

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display(); ?>
		
        <div>
        <?php comments_template(); ?>
        </div>


	<?php
    }

	protected function content_template() {

	}

}