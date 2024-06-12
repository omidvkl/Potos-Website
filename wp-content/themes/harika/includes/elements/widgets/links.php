<?php

class Harika_Links_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaLinks';
	}

	public function get_title() {
		return __( 'لینک ها', 'harika' );
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
				'label' => esc_html__( 'محتوا', 'harika' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'links_layouts',
			[
				'label' => esc_html__( 'طرح بندی', 'harika' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => esc_html__( 'طرح یک', 'harika' ),
					'2' => esc_html__( 'طرح دو', 'harika' ),
					'3' => esc_html__( 'طرح سه', 'harika' ),
					'4' => esc_html__( 'طرح چهار', 'harika' ),
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'عنوان لینک' , 'harika' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_link', [
				'label' => esc_html__( 'لینک', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'آدرس لینک' , 'harika' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'لیست لینک ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'لینک اول', 'harika' ),
						'list_link' => esc_html__( '#', 'harika' ),
					],
					[
						'list_title' => esc_html__( 'لینک دوم', 'harika' ),
						'list_link' => esc_html__( '#', 'harika' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();


		if ( $settings['list'] ) {
			
        		echo '<div class="harika-links-widget back-bg layout-'. esc_attr( $settings['links_layouts'] ) .'"><div class="front-bg">';
        		foreach (  $settings['list'] as $item ) {
        		echo '<a href='.$item['list_link'].' class="link"> '.$item['list_title'].' </a>';
        		}
        		echo "</div></div>";
		    
		}
	}

	protected function content_template() {

	}

}