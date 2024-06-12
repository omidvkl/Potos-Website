<?php

class Harika_SA_RelatedPosts_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'HarikaSARelatedPosts';
	}

	public function get_title() {
		return __( 'مقالات مرتبط', 'harika' );
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
			'layout_style',
			[
				'label' => __('طرح بندی', 'harika'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => esc_html__( 'طرح بندی 1' ),
					'2' => esc_html__( 'طرح بندی 2' ),
                ],
			]
        );

	    $this->add_control(
			'item_limit',
			[
				'label'     => esc_html__('تعداد پست ها', 'harika'),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					],
				],
				'default'   => [
					'size' => 3,
				],
			]
		);

        $this->add_control(
			'hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);


        $this->add_responsive_control(
			'columns_number',
			[
				'label'     => esc_html__('تعداد ستون ها', 'harika'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .harika-posts-grid-2-widget' => 'grid-template-columns: repeat({{SIZE}},1fr);',
				],
			]
		);

        $this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
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

        $this->add_responsive_control(
			'pic_height',
			[
				'label' => __( 'ارتفاع تصویر', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'{{WRAPPER}} .harika-posts-grid-2-widget .article .featured-image' => 'height: {{SIZE}}{{UNIT}};',
				],
                
			]
		);

        $this->add_control(
			'hr3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
			'image_hover_scale',
			[
				'label' => __( 'بزرگنمایی تصویر در هاور', 'harika' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => 'بدون بزرگنمایی',
					'1.1' => '1.1',
					'1.2' => '1.2',
					'1.3' => '1.3',
					'1.4' => '1.4',
					'1.5' => '1.5',
					'1.6' => '1.6',
					'1.7' => '1.7',
					'1.8' => '1.8',
					'1.9' => '1.9',
				],
				'default' => '1.2',
				'selectors' => [
					'{{WRAPPER}} .harika-posts-grid-2-widget .article:hover .featured-image img' => 'transform: scale({{VALUE}});',
				],
			]
		);
        $this->add_responsive_control(
			'scale_speed',
			[
				'label' => __( 'سرعت بزرگنمایی', 'harika' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 3,
                        'step' => 0.1,
					],
				],
                'selectors' => [
					'{{WRAPPER}} .harika-posts-grid-2-widget .featured-image img' => 'transition: {{SIZE}}s;',
				],
                
			]
		);

        $this->add_control(
			'hr4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'show_date',
			[
				'label' => __('تاریخ', 'harika'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
				'default' => 'yes',
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
			'show_date_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
			'show_comments_count',
			[
				'label' => __('تعداد نظرات', 'harika'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
				'default' => 'yes',
			]
		);
        $this->add_control(
			'show_categories',
			[
				'label' => __('دسته بندی ها', 'harika'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
				'default' => 'yes',
			]
		);

        $this->add_control(
			'show_post_type_icon',
			[
				'label' => __('آیکن پست فرمت', 'harika'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
				'default' => 'yes',
			]
		);
        

        $this->add_control(
			'hr5',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'show_excerpt',
			[
				'label' => __('چکیده', 'harika'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'harika' ),
				'label_off' => __( 'مخفی', 'harika' ),
				'default' => 'yes',
			]
		);
        
		$this->add_control(
			'excerpt_length',
			[
				'label' => __('طول چکیده', 'harika'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => apply_filters( 'excerpt_length', 6 ),
				'condition' => [
					'show_excerpt' => 'yes',
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

        // Columns margin.
		$this->add_responsive_control(
			'grid_style_columns_gap',
			[
				'label'     => __( 'فاصله ستون ها' , 'harika' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-posts-grid-2-widget' => 'grid-column-gap: {{SIZE}}{{UNIT}}',
					
				],
			]
		);

		// Row margin.
		$this->add_responsive_control(
			'grid_style_rows_gap',
			[
				'label'     => __( 'فاصله ردیف ها' , 'harika' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .harika-posts-grid-2-widget' => 'grid-row-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
			    'label'     => __( 'عنوان پست' , 'harika' ),
				'name'     => 'post_title_typography',
				'selector' => '{{WRAPPER}} .harika-posts-grid-2-widget .content .title, {{WRAPPER}} .harika-posts-grid-2-widget .content .title a',
			]
		);
		
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
			    'label'     => __( 'تایپوگرافی چکیده' , 'harika' ),
				'name'     => 'excerpt_typography',
				'selector' => '{{WRAPPER}} .harika-posts-grid-2-widget .content .excerpt, {{WRAPPER}} .harika-posts-grid-2-widget .content .excerpt p',
				'condition' => [
					'show_excerpt' => 'yes',
                ],
			]
		);
		
		$this->add_control(
			'post_box_border_radius',
			[
				'label'      => __( 'حاشیه مدور' , 'harika' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .harika-posts-grid-2-widget .article' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .harika-posts-grid-2-widget .featured-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} 0 0;',
				],
                'condition' => [
					'layout_style' => '1',
                ],
			]
		);

        $this->add_control(
			'post_box_border_radius_layout_2',
			[
				'label'      => __( 'حاشیه مدور' , 'harika' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .harika-posts-grid-2-widget.layout-style-2 .article .content, {{WRAPPER}} .harika-posts-grid-2-widget.layout-style-2 .article .featured-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' => [
					'layout_style' => '2',
                ],
			]
		);

		$this->end_controls_section();

	}






	protected function render() {
		$settings = $this->get_settings_for_display();

        global $post;


        $layout_style = 'layout-style-'.$settings['layout_style'];
        $item_limit = 'item-limit-'.$settings['item_limit']['size'];
        $cat_show = 'no-cat';
        if($settings['show_categories'] === 'yes') {$cat_show = 'cat-show';}
        //$title_wrap = 'wrap';
        //if($settings['title_wrap'] === 'yes') {$title_wrap = 'nowrap';}


        //$cats = is_array( get_the_category() ) ? implode( ',', get_the_category() ) : get_the_category();
				
		$posts_per_page = ( ! empty( $settings['posts_per_page'] ) ?  $settings['posts_per_page'] : 3 );
		$query_args = array(
					    'posts_per_page' 		=> $settings['item_limit']['size'],
					    'no_found_rows'  		=> true,
					    'post__not_in'          => array($post->ID),
					    'ignore_sticky_posts'   => true,
					    'category__in' 		=> wp_get_post_categories($post->ID),
                        //'tag__in' => $tag_ids,
				    );

        $all_posts = new \WP_Query( $query_args );

		
		


		echo '<div class="harika-posts-grid-2-widget harika-post-widget harika-post-grid a-grid-layout '.$item_limit.' '.$layout_style.'">';
            while ( $all_posts->have_posts() ) :

            $all_posts->the_post(); ?>
                    <div class="article">
                        

                        <div class="featured-image" href="<?php the_permalink(); ?>" target="_top">
                        
                            

                            <a href="<?php the_permalink(); ?>" target="_top">
                                <?php if ( 'yes' === $settings['show_post_type_icon'] ) : ?>
                                    <?php if ( has_post_format( 'video' )) : ?>
                                    <span class="post-format-icon post-is-video"><?php echo post_is_video_svg(); ?></span>
                                    <?php endif; ?>
                                    
                                    <?php if ( has_post_format( 'audio' )) : ?>
                                    <span class="post-format-icon post-is-audio"><?php echo post_is_audio_svg(); ?></span>
                                    <?php endif;
                                endif; ?>
                                <?php the_post_thumbnail($settings['image_size']); ?>
                            </a>

                            <?php if($settings['show_comments_count'] === 'yes') : ?>
                                <span class="comments-count"><i class="comments-icon"></i>
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


                        <div class="content <?php echo $cat_show; ?>">
                            <h3 class="title"><a href="<?php the_permalink(); ?>" target="_top"><?php the_title(); ?></a></h3>
                            <?php if($settings['show_excerpt'] === 'yes') { $this->render_excerpt(); } ?>

                            <div class="meta">
                                <?php if($settings['show_categories'] === 'yes') : ?>
                                    <div class="categories">
                                        <?php echo harika_get_category(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($settings['show_date'] === 'yes') : ?>
                                <span class="date"><i class="date-icon"></i>
                                    <?php if($settings['date_type'] === 'published') { echo get_the_date($settings['date_format']);} 
                                     else if($settings['date_type'] === 'modified') { echo get_the_modified_date($settings['date_format']);}
                                    ?>
                                </span>
                                <?php endif; ?>
   
                            </div>

                        </div>
                    </div>
                <?php
                endwhile;
            wp_reset_postdata();
        echo '</div>';
	}












	protected function content_template() {

	}

    public function harika_filter_excerpt_length( $length ) {

		$settings = $this->get_settings();

		$excerpt_length = (!empty( $settings['excerpt_length'] ) ) ? absint( $settings['excerpt_length'] ) : 25;

		return absint( $excerpt_length );
	}
    
    public function harika_filter_excerpt_more( $more ) {
		return '…';
	}
    
    
	protected function render_excerpt() {

		$settings = $this->get_settings();

		$show_excerpt = $settings['show_excerpt'];

		if ( 'yes' !== $show_excerpt ) {
			return;
		}
		
		add_filter( 'excerpt_more', [ $this, 'harika_filter_excerpt_more' ], 20 );
		add_filter( 'excerpt_length', [ $this, 'harika_filter_excerpt_length' ], 9999 );

		?>
		
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php

		remove_filter( 'excerpt_length', [ $this, 'harika_filter_excerpt_length' ], 9999 );
		remove_filter( 'excerpt_more', [ $this, 'harika_filter_excerpt_more' ], 20 );
	}

}