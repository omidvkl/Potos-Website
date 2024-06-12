<?php

class Harika_SA_Breadcrumb_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaSABreadcrumb';
	}

	public function get_title() {
		return __( 'بریدکرامب (مسیر صفحه)', 'harika' );
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
                'label' =>   esc_html__('متن شروع', 'harika'),
                'label_block' => true,
                'default' =>esc_html__('صفحه اصلی', 'harika'),
            ]
        );
        $this->add_control(
            'sep', [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' =>   esc_html__('جدا کننده', 'harika'),
                'label_block' => true,
                'default' =>esc_html__(' > ', 'harika'),
            ]
        );

	    $this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'ترازبندی', 'harika' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-end' => [
						'title' => __( 'چپ', 'harika' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'وسط', 'harika' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-start' => [
						'title' => __( 'راست', 'harika' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .harika-breadcrumb-widget' => 'justify-content: {{VALUE}};',
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
			'text_style',
			[
				'label' => esc_html__( 'متن', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => esc_html__( 'تایپوگرافی متن', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-breadcrumb-widget, {{WRAPPER}} .harika-breadcrumb-widget *',
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'رنگ متن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-breadcrumb-widget, {{WRAPPER}} .harika-breadcrumb-widget *' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'links_color',
			[
				'label' => esc_html__( 'رنگ لینک ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-breadcrumb-widget a' => 'color: {{VALUE}} !important;',
				],
			]
		);

        $this->add_control(
			'links_color_hover',
			[
				'label' => esc_html__( 'رنگ هاور لینک ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-breadcrumb-widget a:hover' => 'color: {{VALUE}} !important;',
				],
			]
		);

        $this->add_control(
			'box_style',
			[
				'label' => esc_html__( 'باکس کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'main_box_background',
				'label' => esc_html__( 'پس زمینه کلی', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-breadcrumb-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'main_box_border',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-breadcrumb-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'main_box_box_shadow',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-breadcrumb-widget',
			]
		);
		
		$this->add_control(
			'main_box_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-breadcrumb-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'main_box_padding',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-breadcrumb-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
        	'style_normal_tab_dark',
        	[
        		'label' => esc_html__( 'دارک مود', 'harika' ),
        	]
        );

        $this->add_control(
			'text_style_dark',
			[
				'label' => esc_html__( 'متن', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography_dark',
				'label' => esc_html__( 'تایپوگرافی متن', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget, body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget *',
			]
		);
		$this->add_control(
			'text_color_dark',
			[
				'label' => esc_html__( 'رنگ متن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget, body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget *' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'links_color_dark',
			[
				'label' => esc_html__( 'رنگ لینک ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget a' => 'color: {{VALUE}} !important;',
				],
			]
		);

        $this->add_control(
			'links_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ هاور لینک ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget a:hover' => 'color: {{VALUE}} !important;',
				],
			]
		);

        $this->add_control(
			'box_style_dark',
			[
				'label' => esc_html__( 'باکس کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'main_box_background_dark',
				'label' => esc_html__( 'پس زمینه کلی', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'main_box_border_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'main_box_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget',
			]
		);
		
		$this->add_control(
			'main_box_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'main_box_padding_dark',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-breadcrumb-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();
		
        $this->end_controls_tabs();

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display();
        $sep = '<span class="sep">'.$settings['sep'].'</span>';

        echo '<div class="harika-breadcrumb-widget">';

            if (!is_front_page()) {
            
            // Start the breadcrumb with a link to your homepage
                echo '<a href="';
                echo get_option('home');
                echo '">';
                echo $settings['main_title'];
                echo '</a>' . $sep;
            
            // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
                if (is_category() || is_single() ){
                    the_category('<span class="and">'.__(' و ', 'harika').'</span>');
                } elseif (is_archive() || is_single()){
                    if ( is_day() ) {
                        printf( __( '%s', 'harika' ), get_the_date() );
                    } elseif ( is_month() ) {
                        printf( __( '%s', 'harika' ), get_the_date( _x( 'F Y', 'فرمت تاریخ آرشیو ماهانه', 'harika' ) ) );
                    } elseif ( is_year() ) {
                        printf( __( '%s', 'harika' ), get_the_date( _x( 'Y', 'فرمت تاریخ آرشیو سالانه', 'harika' ) ) );
                    } else {
                        _e( 'آرشیو وبلاگ', 'harika' );
                    }
                }
            
            // If the current page is a single post, show its title with the separator
                if (is_single()) {
                    echo ' : ';
                    echo '<span class="title">';
                    the_title();
                    echo '</span>';
                }
            
            // If the current page is a static page, show its title.
                if (is_page()) {
                    echo the_title();
                }
            
            // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
                if (is_home()){
                    global $post;
                    $page_for_posts_id = get_option('page_for_posts');
                    if ( $page_for_posts_id ) { 
                        $post = get_page($page_for_posts_id);
                        setup_postdata($post);
                        the_title();
                        rewind_posts();
                    }
                }

            }
        
        
        echo '</div>';


	}

	protected function content_template() {

	}

}