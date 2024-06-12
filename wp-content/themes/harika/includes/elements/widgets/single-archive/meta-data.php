<?php

class Harika_SA_MetaData_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'HarikaSAMetaData';
	}

	public function get_title() {
		return __( 'متا داده', 'harika' );
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
			'date_icon',
			[
				'label' => esc_html__( 'آیکن تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-calendar',
					'library' => 'fa-regular',
				],
			]
		);

        $this->add_control(
			'comments_icon',
			[
				'label' => esc_html__( 'آیکن دیدگاه ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-comment',
					'library' => 'fa-regular',
				],
			]
		);

        $this->add_control(
			'author_show',
			[
				'label' => esc_html__( 'نمایش نویسنده', 'harika' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'نمایش', 'harika' ),
				'label_off' => esc_html__( 'مخفی', 'harika' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'author_before', [
				'label' => esc_html__( 'متن قبل از نویسنده', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'توسط : ',
			]
		);

		$this->add_control(
			'show_date_hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'date_show',
			[
				'label' => esc_html__( 'نمایش تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'نمایش', 'harika' ),
				'label_off' => esc_html__( 'مخفی', 'harika' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'date_before', [
				'label' => esc_html__( 'متن قبل از تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'تاریخ انتشار : ',
			]
		);

		$this->add_control(
			'date_after', [
				'label' => esc_html__( 'متن بعد از تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'date_type',
			[
				'label' => __('نوع تاریخ', 'harika'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'published',
				'options' => [
					'published' => esc_html__( 'تاریخ انتشار', 'harika' ),
					'modified' => esc_html__( 'آخرین ویرایش', 'harika' ),
                ],
			]
        );
        $this->add_control(
			'date_format', [
				'label' => esc_html__( 'فرمت تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'show_date_hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
			'comments_show',
			[
				'label' => esc_html__( 'نمایش دیدگاه ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'نمایش', 'harika' ),
				'label_off' => esc_html__( 'مخفی', 'harika' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
				'name' => 'meta_text_typography',
				'label' => esc_html__( 'تایپوگرافی متن', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-metadata-widget span',
			]
		);
		$this->add_control(
			'meta_text_color',
			[
				'label' => esc_html__( 'رنگ متن', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-metadata-widget span, {{WRAPPER}} .harika-metadata-widget span a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'meta_text_color_dark',
			[
				'label' => esc_html__( 'رنگ متن (دارک مود)', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-metadata-widget span, body.dark_mode {{WRAPPER}} .harika-metadata-widget span a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'meta_icons_typography',
				'label' => esc_html__( 'تایپوگرافی آیکن ها', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-metadata-widget span i',
			]
		);
		$this->add_control(
			'meta_icons_color',
			[
				'label' => esc_html__( 'رنگ آیکن ها', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-metadata-widget span i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'meta_icons_color_dark',
			[
				'label' => esc_html__( 'رنگ آیکن ها (دارک مود)', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-metadata-widget span i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}











	protected function render() {
		$settings = $this->get_settings_for_display(); ?>
		<div class="harika-metadata-widget">

			<?php if(harika_get_setting( 'harika_post_single_meta_author_display' ) == 'yes' and $settings['author_show'] === 'yes') : ?>
				<span class="author"><?php echo get_avatar( get_the_author_meta('user_email'), '34', '' ); ?>
				<?php echo $settings['author_before']; ?>
				<?php the_author_posts_link(); ?>
			</span>
			<?php endif; ?>

			<?php if(harika_get_setting( 'harika_post_single_meta_date_display' ) == 'yes' and $settings['date_show'] === 'yes') : ?>
				<span class="date"><?php \Elementor\Icons_Manager::render_icon( $settings['date_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				
				<?php echo $settings['date_before']; ?>
				<?php if($settings['date_type'] === 'published') { echo get_the_date($settings['date_format']);} 
                 else if($settings['date_type'] === 'modified') { echo get_the_modified_date($settings['date_format']);}
                ?>
				<?php echo $settings['date_after']; ?>
				</span>
			<?php endif; ?>

			<?php if(harika_get_setting( 'harika_post_single_meta_comments_count_display' ) == 'yes' and $settings['comments_show'] === 'yes') : ?>
				<span class="comments-count"><?php \Elementor\Icons_Manager::render_icon( $settings['comments_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        <?php
                                            $comments_number = get_comments_number();
                                                printf(
                                                    esc_html( /* translators: 1: number of comments */
                                                        _nx(
                                                            __('1 دیدگاه', 'harika'),
                                                            __('%1$s دیدگاه', 'harika'),
                                                            $comments_number,
                                                            'comments title'
                                                        )
                                                    ),
                                                    esc_html( number_format_i18n( $comments_number ) )
                                                );
                                        
                                        ?>

                                    </span>
			<?php endif; ?>

		</div>
        <?php
	}
    
	protected function content_template() {

	}

}