<?php

class Harika_SA_Share_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaSAShare';
	}

	public function get_title() {
		return __( 'اشتراک گذاری', 'harika' );
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
			'icon',
			[
				'label' => esc_html__( 'آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-share',
					'library' => 'fa-solid',
				],
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
					'{{WRAPPER}} .harika-share-widget' => 'justify-content: {{VALUE}};',
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
			'heading_icon_style',
			[
				'label' => esc_html__( 'استایل آیکن (عادی)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} .harika-share-widget .share-post i',
			]
		);
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post svg path[fill-rule=evenodd], {{WRAPPER}} .harika-share-widget .share-post svg ellipse' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_icon_box_style',
			[
				'label' => esc_html__( 'استایل باکس آیکن (عادی)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_background',
				'label' => esc_html__( 'پس زمینه کلی', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-share-widget .share-post',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-share-widget .share-post',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-share-widget .share-post',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'hr_one',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'icon_box_padding',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'icon_box_margin',
			[
				'label' => esc_html__( 'فاصله خارجی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'heading_icon_style_hover',
			[
				'label' => esc_html__( 'استایل آیکن (هاور)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography_hover',
				'selector' => '{{WRAPPER}} .harika-share-widget .share-post:hover i',
			]
		);
        $this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post:hover i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_hover',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post:hover svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_hover',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post:hover svg path[fill-rule=evenodd], {{WRAPPER}} .harika-share-widget .share-post svg ellipse' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_icon_box_style_hover',
			[
				'label' => esc_html__( 'استایل باکس آیکن (هاور)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_background_hover',
				'label' => esc_html__( 'پس زمینه کلی', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-share-widget .share-post:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_hover',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-share-widget .share-post:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_hover',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-share-widget .share-post:hover',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_hover',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'hr_one_hover',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'icon_box_padding_hover',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'icon_box_margin_hover',
			[
				'label' => esc_html__( 'فاصله خارجی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-share-widget .share-post:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
        	'style_dark_tab',
        	[
        		'label' => esc_html__( 'دارک', 'harika' ),
        	]
        );
        
		$this->add_control(
			'heading_icon_style_dark',
			[
				'label' => esc_html__( 'استایل آیکن (دارک مود)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography_dark',
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post i',
			]
		);
        $this->add_control(
			'icon_color_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_dark',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_dark',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post svg path[fill-rule=evenodd], {{WRAPPER}} .harika-share-widget .share-post svg ellipse' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_icon_box_style_dark',
			[
				'label' => esc_html__( 'استایل باکس آیکن (دارک مود)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_background_dark',
				'label' => esc_html__( 'پس زمینه کلی', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'hr_one_dark',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'icon_box_padding_dark',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'icon_box_margin_dark',
			[
				'label' => esc_html__( 'فاصله خارجی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'heading_icon_style_hover_dark',
			[
				'label' => esc_html__( 'استایل آیکن (هاور دارک)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'تایپوگرافی آیکن', 'harika' ),
                'name' => 'icon_typography_hover_dark',
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post:hover i',
			]
		);
        $this->add_control(
			'icon_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ آیکن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post:hover i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_stroke_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ stroke های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post:hover svg path[stroke-linejoin=round]' => 'stroke: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_svg_fill_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ fill های svg', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post:hover svg path[fill-rule=evenodd], {{WRAPPER}} .harika-share-widget .share-post svg ellipse' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_icon_box_style_hover_dark',
			[
				'label' => esc_html__( 'استایل باکس آیکن (هاور دارک)', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_box_background_hover_dark',
				'label' => esc_html__( 'پس زمینه کلی', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border_hover_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_box_shadow_hover_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post:hover',
			]
		);
		
		$this->add_control(
			'icon_box_border_radius_hover_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'hr_one_hover_dark',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'icon_box_padding_hover_dark',
			[
				'label' => esc_html__( 'فاصله داخلی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'icon_box_margin_hover_dark',
			[
				'label' => esc_html__( 'فاصله خارجی کلی', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-share-widget .share-post:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
        
        



		
        $this->end_controls_tabs();

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display();
		$id = 'd-'.substr( $this->get_id_int(), 0, 3 );
		$options = [
            'id' => $id,
        ];
		?>
        <?php echo '<div class="harika-share-widget '.$id.'" data-harika-share =\''.wp_json_encode($options).'\'>';?>
            <div id="open-share-box" class="share-post">
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</div>
				<span id="share-box-back"></span>
                <div id="share-box" class="social-share">
                    <div class="info">
                        
                        <h5 class="modal-title" id="shareModalLabel"><?php esc_html_e('اشتراک گذاری', 'harika'); ?></h5>
                        
                        <button id="close-share-box" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa-regular fa-xmark"></i>
                        </button>
                        
                    </div>
                    <div class="share-body">
                        <p><?php esc_html_e('با استفاده از روش‌های زیر می‌توانید این صفحه را با دوستان خود به اشتراک بگذارید.', 'harika'); ?></p>
                        <div class="socials">
                            <a class="share_button_facebook" target="_blank" href="http://www.facebook.com/share.php?u=<?php esc_url(the_permalink());?>title=<?php echo get_the_title(); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                            <a class="share_button_twitter" target="_blank" href="http://twitter.com/intent/tweet?status=<?php echo get_the_title(); ?>+<?php esc_url(the_permalink());?>"><i class="fa-brands fa-twitter"></i></a>
                            <a class="share_button_linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php esc_url(the_permalink());?>&title=<?php echo get_the_title(); ?>&source=<?php echo esc_url(home_url('/'));?>"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a class="share_button_pinterest" target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?url=<?php esc_url(the_permalink());?>&is_video=false&description=<?php echo get_the_title(); ?>"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a class="share_button_telegram" target="_blank" href="https://t.me/share/url?url=<?php esc_url(the_permalink());?>"><i class="fa-brands fa-telegram"></i></a>
                            <a class="share_button_whatsapp" target="_blank" href="https://api.whatsapp.com/send?text=<?php echo get_the_title(); ?>%20<?php esc_url(the_permalink());?>"><i class="fa-brands fa-whatsapp"></i></a>
                            <a class="share_button_mailto" target="_blank" href="mailto:<?php esc_url(the_permalink());?>"><i class="fa-regular fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="filed-link dir-ltr copy-text">
                        <label for="shareLink" class="input-prepend">
                            <i class="fas fa-link"></i>
                        </label>
    
                        <input id="shareLink" type="text" value="<?php esc_url(the_permalink());?>" readonly="">
    
                        <span class="copy-text-btn <?php echo $id; ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="کپی لینک">
                            <i class="fa-regular fa-copy"></i>
                        </span>
                    </div>
            </div>
        </div>
    <?php
	}

	protected function content_template() {

	}

}