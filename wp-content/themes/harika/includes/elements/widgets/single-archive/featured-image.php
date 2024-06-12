<?php

class Harika_SA_FeaturedImage_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaSAFeaturedImage';
	}

	public function get_title() {
		return __( 'تصویر شاخص', 'harika' );
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
			'featured_type',
			[
				'label' => __( 'نوع شاخص', 'harika' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'just-image',
				'options' => [
					'just-image' => __( 'فقط تصویر', 'harika' ),
					'image-and-format' => __( 'تصویر و پست فرمت', 'harika' ),
                    'just-format' => __( 'فقط پست فرمت', 'harika' ),
				],
			]
		);

	    $this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
				'separator' => 'none',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
                'label' => __( 'در موبایل', 'harika' ),
				'name' => 'm_image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
				'separator' => 'none',
			]
		);

        $this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'ترازبندی', 'harika' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-end' => [
						'title' => esc_html__( 'چپ', 'harika' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'وسط', 'harika' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-start' => [
						'title' => esc_html__( 'راست', 'harika' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-featuredimage-widget' => 'justify-content: {{VALUE}};',
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

        $this->add_responsive_control(
			'width',
			[
				'label' => esc_html__( 'عرض', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' => esc_html__( 'حداکثر عرض', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'label' => esc_html__( 'ارتفاع', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => 'px',
				],
				'mobile_default' => [
					'unit' => 'px',
				],
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'max-height',
			[
				'label' => esc_html__( 'حداکثر ارتفاع', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => 'px',
				],
				'mobile_default' => [
					'unit' => 'px',
				],
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'object-fit',
			[
				'label' => esc_html__( 'متناسب با Object', 'harika' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'پیش فرض', 'harika' ),
					'fill' => esc_html__( 'پر', 'harika' ),
					'cover' => esc_html__( 'پوشش', 'harika' ),
					'contain' => esc_html__( 'دربرگیرنده', 'harika' ),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'separator_panel_style',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video, {{WRAPPER}} .harika-image-widget .bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video',
			]
		);

		$this->add_control(
			'separator_panel_style2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->start_controls_tabs( 'image_effects' );

		$this->start_controls_tab( 'normal',
			[
				'label' => esc_html__( 'نرمال', 'harika' ),
			]
		);

		$this->add_control(
			'opacity',
			[
				'label' => esc_html__( 'شفافیت', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => esc_html__( 'هاور', 'harika' ),
			]
		);

		$this->add_control(
			'opacity_hover',
			[
				'label' => esc_html__( 'شفافیت', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-featuredimage-widget img:hover, {{WRAPPER}} .harika-featuredimage-widget video:hover' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}} .harika-featuredimage-widget img:hover, {{WRAPPER}} .harika-featuredimage-widget video:hover',
			]
		);

		$this->add_control(
			'background_hover_transition',
			[
				'label' => esc_html__( 'مدت زمان جابجایی', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-featuredimage-widget img, {{WRAPPER}} .harika-featuredimage-widget video' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'انیمیشن هاور', 'harika' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display();
        $get_image_size = '';
		$aparat_video = get_post_meta(get_the_ID(), 'harika-meta-aparat-video', true );
        if (wp_is_mobile( 'true' ) ){
            $get_image_size = $settings['m_image_size'];
        } else {
            $get_image_size = $settings['image_size'];
        }
        if($settings['featured_type'] === 'just-image') {
            echo '<div class="harika-featuredimage-widget">';
                the_post_thumbnail($get_image_size);
            echo '</div>';
        } else if($settings['featured_type'] === 'image-and-format') {

            echo '<div class="harika-featuredimage-widget '.$settings['featured_type'].'">';
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), $settings['image_size']); 
            if ( has_post_format( 'video' )) {
                

            $harika_meta_video = get_post_meta(get_the_ID(), 'harika-meta-direct-video', true );
            if (!empty($harika_meta_video)) { ?>
                <video id="player" playsinline controls data-poster="<?php echo $featured_img_url ?>" poster="<?php echo $featured_img_url ?>">
                    <source src="<?php echo $harika_meta_video; ?>" type="video/mp4" />
                </video>
            <?php
            } elseif (!empty($aparat_video)) {
				echo $aparat_video;
			} else { the_post_thumbnail($get_image_size); }

            
            
            } elseif ( has_post_format( 'audio' )) {
                
            the_post_thumbnail($get_image_size);
            $harika_meta_audio = get_post_meta(get_the_ID(), 'harika-meta-direct-audio', true );
            if (!empty($harika_meta_audio)) {
                echo '<audio width="100%" controls><source src="'. $harika_meta_audio .'" type="audio/mpeg"></audio>';
            } else { the_post_thumbnail($get_image_size); }

            } else {
                the_post_thumbnail($get_image_size);
            }
            echo '</div>';

        } else if($settings['featured_type'] === 'just-format') {

            echo '<div class="harika-featuredimage-widget '.$settings['featured_type'].'">';
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), $settings['image_size']); 
            if ( has_post_format( 'video' )) {
            
            $harika_meta_video = get_post_meta(get_the_ID(), 'harika-meta-direct-video', true );
            if (!empty($harika_meta_video)) { ?>
                <video id="player" playsinline controls data-poster="<?php echo $featured_img_url ?>" poster="<?php echo $featured_img_url ?>">
                    <source src="<?php echo $harika_meta_video; ?>" type="video/mp4" />
                </video>
            <?php
            } elseif (!empty($aparat_video)) {
				echo $aparat_video;
			}

            } elseif ( has_post_format( 'audio' )) {
                
            $harika_meta_audio = get_post_meta(get_the_ID(), 'harika-meta-direct-audio', true );
            if (!empty($harika_meta_audio)) {
                echo '<audio width="100%" controls><source src="'. $harika_meta_audio .'" type="audio/mpeg"></audio>';
            }
 
            }
            echo '</div>';
        }



	}

	protected function content_template() {

	}

}