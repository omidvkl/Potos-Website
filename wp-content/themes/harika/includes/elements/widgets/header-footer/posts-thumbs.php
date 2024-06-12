<?php

use Harika\Elementor\Controls\Dynamic_Select;
use Harika\Traits\Global_Widget_Controls;

class Harika_HF_PostsThumbs_Widget extends \Elementor\Widget_Base {

    use Global_Widget_Controls;

    private $_query = null;

	public function get_name() {
		return 'HarikaHFPostsThumbs';
	}

	public function get_title() {
		return __( 'بنر پست ها', 'harika' );
	}

	public function get_icon() {
		return 'harika-icon';
	}

	public function get_categories() {
		return [ 'HarikaHeaderFooter' ];
	}



    public function get_query() {
		return $this->_query;
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
        $this->add_responsive_control(
			'columns_number',
			[
				'label'     => esc_html__('تعداد ستون ها', 'harika'),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 20,
						'step' => 1
					],
				],
                'selectors' => [
					'{{WRAPPER}} .harika-poststhumbs-widget' => 'grid-template-columns: repeat({{SIZE}},1fr);',
				],
			]
		);

	    $this->end_controls_section();
		
		/////////////////////////////////////////////////////////
		//Global query Controls
		$this->register_query_controls();
		/////////////////////////////////////////////////////////
		
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
			'title_style',
			[
				'label' => esc_html__( 'عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'تایپوگرافی عنوان', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-poststhumbs-widget .article .title, {{WRAPPER}} .harika-poststhumbs-widget .article .title a',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'رنگ عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-poststhumbs-widget .article .title, {{WRAPPER}} .harika-poststhumbs-widget .article .title a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'title_color_hover',
			[
				'label' => esc_html__( 'رنگ هاور عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-poststhumbs-widget .article .title:hover, {{WRAPPER}} .harika-poststhumbs-widget .article .title:hover a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'date_style',
			[
				'label' => esc_html__( 'تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'label' => esc_html__( 'تایپوگرافی تاریخ', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-poststhumbs-widget .article .date',
			]
		);
		$this->add_control(
			'date_color',
			[
				'label' => esc_html__( 'رنگ تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .harika-poststhumbs-widget .article .date' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'date_background',
				'label' => esc_html__( 'پس زمینه تاریخ', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .harika-poststhumbs-widget .article .date',
			]
		);


        $this->add_control(
			'main_box_style',
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
				'selector' => '{{WRAPPER}} .harika-poststhumbs-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'main_box_border',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-poststhumbs-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'main_box_box_shadow',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => '{{WRAPPER}} .harika-poststhumbs-widget',
			]
		);
		
		$this->add_control(
			'main_box_border_radius',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .harika-poststhumbs-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .harika-poststhumbs-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'title_style_dark',
			[
				'label' => esc_html__( 'عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography_dark',
				'label' => esc_html__( 'تایپوگرافی عنوان', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget .article .title, body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget .article .title a',
			]
		);
		$this->add_control(
			'title_color_dark',
			[
				'label' => esc_html__( 'رنگ عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget .article .title, body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget .article .title a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'title_color_hover_dark',
			[
				'label' => esc_html__( 'رنگ هاور عنوان', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget .article .title:hover, body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget .article .title:hover a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'date_style_dark',
			[
				'label' => esc_html__( 'تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography_dark',
				'label' => esc_html__( 'تایپوگرافی تاریخ', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget .article .date',
			]
		);
		$this->add_control(
			'date_color_dark',
			[
				'label' => esc_html__( 'رنگ تاریخ', 'harika' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget .article .date' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'date_background_dark',
				'label' => esc_html__( 'پس زمینه تاریخ', 'harika' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget .article .date',
			]
		);


        $this->add_control(
			'main_box_style_dark',
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
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'main_box_border_dark',
				'label' => esc_html__( 'کادر دور کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'main_box_box_shadow_dark',
				'label' => esc_html__( 'سایه کادر کلی', 'harika' ),
				'selector' => 'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget',
			]
		);
		
		$this->add_control(
			'main_box_border_radius_dark',
			[
				'label' => esc_html__( 'شعاع کادر', 'harika' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'body.dark_mode {{WRAPPER}} .harika-poststhumbs-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();
		
        $this->end_controls_tabs();

		$this->end_controls_section();

	}


    
                            ///////////////////////////
                            //                       //
                            //                       //
                            //         QUERY         //
                            //                       //
                            //                       //
                            ///////////////////////////


	private function setMetaQueryArgs() {

        $args = [];

        if ('current_query' === $this->getGroupControlQueryPostType()) {
            return [];
        }

        $args['order']   = $this->get_settings_for_display('posts_order');
        $args['orderby'] = $this->get_settings_for_display('posts_orderby');

        /**
         * Set Feature Images
         */
        if ($this->get_settings_for_display('posts_only_with_featured_image') === 'yes') {
            $args['meta_key'] = '_thumbnail_id';
        }

        /**
         * Set Date
         */

        $selected_date = $this->get_settings_for_display('posts_select_date');

        if (!empty($selected_date)) {
            $date_query = [];

            switch ($selected_date) {
                case 'today':
                    $date_query['after'] = '-1 day';
                    break;

                case 'week':
                    $date_query['after'] = '-1 week';
                    break;

                case 'month':
                    $date_query['after'] = '-1 month';
                    break;

                case 'quarter':
                    $date_query['after'] = '-3 month';
                    break;

                case 'year':
                    $date_query['after'] = '-1 year';
                    break;

                case 'exact':
                    $after_date = $this->get_settings_for_display('posts_date_after');
                    if (!empty($after_date)) {
                        $date_query['after'] = $after_date;
                    }

                    $before_date = $this->get_settings_for_display('posts_date_before');
                    if (!empty($before_date)) {
                        $date_query['before'] = $before_date;
                    }

                    $date_query['inclusive'] = true;
                    break;
            }

            if (!empty($date_query)) {
                $args['date_query'] = $date_query;
            }
        }

        return $args;
    }
	
    /**
     * @return mixed
     */
    private function getGroupControlQueryPostType() {
        return $this->get_settings_for_display('posts_source');
    }

    /**
     * Get Query Params by args
     *
     * @param string $by
     *
     * @return array|mixed
     */
    private function getGroupControlQueryParamBy($by = 'exclude') {
        $mapBy = [
            'exclude' => 'posts_exclude_by',
            'include' => 'posts_include_by',
        ];

        $setting = $this->get_settings_for_display($mapBy[$by]);

        return (!empty($setting) ? $setting : []);
    }

    /**
     * @param array $term_ids
     *
     * @return array
     */
    private function mapGroupControlQuery($term_ids = []) {
        $terms = get_terms(
            [
                'term_taxonomy_id' => $term_ids,
                'hide_empty'       => false,
            ]
        );

        $tax_terms_map = [];

        foreach ($terms as $term) {
            $taxonomy                   = $term->taxonomy;
            $tax_terms_map[$taxonomy][] = $term->term_id;
        }

        return $tax_terms_map;
    }

    /**
     * @return array|string[]|\WP_Post_Type[]
     */
    private function getGroupControlQueryPostTypes() {
        $post_types = get_post_types(['public' => true], 'objects');
        $post_types = array_column($post_types, 'label', 'name');

        $ignorePostTypes = [
            'elementor_library'    => '',
            'attachment'           => '',
            'bdt_template_manager' => '',
            'bdt-custom-template'  => ''
        ];

        $post_types = array_diff_key($post_types, $ignorePostTypes);

        $extra_types = [
            'manual_selection'                         => __('انتخاب دستی', 'harika'),
        ];

        $post_types = array_merge($post_types, $extra_types);

        return $post_types;
    }

    /**
     * @param WP_Query $query fix the offset
     */
    public function fix_query_offset(&$query) {
        if (!empty($query->query_vars['offset_to_fix'])) {
            if ($query->is_paged) {
                $query->query_vars['offset'] = $query->query_vars['offset_to_fix'] + (($query->query_vars['paged'] - 1) * $query->query_vars['posts_per_page']);
            } else {
                $query->query_vars['offset'] = $query->query_vars['offset_to_fix'];
            }
        }
    }

    public function prefix_adjust_offset_pagination($found_posts, $query) {

        if (isset($query->query_vars['offset_to_fix'])) {
            $offset_to_fix = intval($query->query_vars['offset_to_fix']);

            if ($offset_to_fix) {
                $found_posts -= $offset_to_fix;
            }
        }

        return $found_posts;
    }

    public function pre_get_posts_query_filter($wp_query) {
        if ($this) {
            $query_id = $this->get_settings_for_display('query_id');
            do_action("ultimate_post_kit_pro/query/{$query_id}", $wp_query, $this);
        }
    }

	protected function getGroupControlQueryArgs() {

        $settings = $this->get_settings_for_display();
        $args     = $this->setMetaQueryArgs();

        $args['post_status']      = 'publish';
        $args['suppress_filters'] = false;

        if (0 < $settings['posts_offset']) {
            $args['offset_to_fix'] = $settings['posts_offset'];
        }


        /**
         * Set Ignore Sticky
         */
        if (
            $this->getGroupControlQueryPostType() === 'post'
            && $this->get_settings_for_display('posts_ignore_sticky_posts') === 'yes'
        ) {
            $args['ignore_sticky_posts'] = true;
        }


        if ($this->getGroupControlQueryPostType() === 'manual_selection') {
            /**
             * Set Including Manually
             */
            $selected_ids      = $this->get_settings_for_display('posts_selected_ids');
            $selected_ids      = wp_parse_id_list($selected_ids);
            $args['post_type'] = 'any';
            if (!empty($selected_ids)) {
                $args['post__in'] = $selected_ids;
            }
            $args['ignore_sticky_posts'] = 1;
        } elseif ('current_query' === $this->getGroupControlQueryPostType()) {
            /**
             * Make Current Query
             */
            $args = $GLOBALS['wp_query']->query_vars;
            $args = apply_filters('ultimate_post_kit_pro/query/get_query_args/current_query', $args);
        } elseif ('_ultimate_post_kit_pro_related_post_type' === $this->getGroupControlQueryPostType()) {
            /**
             * Set Related Query
             */
            $post_id           = get_queried_object_id();
            $related_post_id   = is_singular() && (0 !== $post_id) ? $post_id : null;
            $args['post_type'] = get_post_type($related_post_id);

            $include_by = $this->getGroupControlQueryParamBy('include');
            if (in_array('authors', $include_by)) {
                $args['author__in'] = wp_parse_id_list($settings['posts_include_author_ids']);
            } else {
                $args['author__in'] = get_post_field('post_author', $related_post_id);
            }

            $exclude_by = $this->getGroupControlQueryParamBy('exclude');
            if (in_array('authors', $exclude_by)) {
                $args['author__not_in'] = wp_parse_id_list($settings['posts_exclude_author_ids']);
            }


            if (in_array('current_post', $exclude_by)) {
                $args['post__not_in'] = [get_the_ID()];
            }

            $args['ignore_sticky_posts'] = 1;
            $args                        = apply_filters('ultimate_post_kit_pro/query/get_query_args/related_query', $args);
        } else {

            /**
             * Set Post Type
             */
            $args['post_type'] = $this->getGroupControlQueryPostType();

            /**
             * Set Exclude Post
             */
            $exclude_by   = $this->getGroupControlQueryParamBy('exclude');
            $current_post = [];

            if (in_array('current_post', $exclude_by) && is_singular()) {
                $current_post = [get_the_ID()];
            }

            if (in_array('manual_selection', $exclude_by)) {
                $exclude_ids          = $settings['posts_exclude_ids'];
                $args['post__not_in'] = array_merge($current_post, wp_parse_id_list($exclude_ids));
            }
            /**
             * Set Authors
             */
            $include_by    = $this->getGroupControlQueryParamBy('include');
            $exclude_by    = $this->getGroupControlQueryParamBy('exclude');
            $include_users = [];
            $exclude_users = [];

            if (in_array('authors', $include_by)) {
                $include_users = wp_parse_id_list($settings['posts_include_author_ids']);
            }

            if (in_array('authors', $exclude_by)) {
                $exclude_users = wp_parse_id_list($settings['posts_exclude_author_ids']);
                $include_users = array_diff($include_users, $exclude_users);
            }

            if (!empty($include_users)) {
                $args['author__in'] = $include_users;
            }

            if (!empty($exclude_users)) {
                $args['author__not_in'] = $exclude_users;;
            }

            /**
             * Set Taxonomy
             */
            $include_by    = $this->getGroupControlQueryParamBy('include');
            $exclude_by    = $this->getGroupControlQueryParamBy('exclude');
            $include_terms = [];
            $exclude_terms = [];
            $terms_query   = [];

            if (in_array('terms', $include_by)) {
                $include_terms = wp_parse_id_list($settings['posts_include_term_ids']);
            }

            if (in_array('terms', $exclude_by)) {
                $exclude_terms = wp_parse_id_list($settings['posts_exclude_term_ids']);
                $include_terms = array_diff($include_terms, $exclude_terms);
            }

            if (!empty($include_terms)) {
                $tax_terms_map = $this->mapGroupControlQuery($include_terms);

                foreach ($tax_terms_map as $tax => $terms) {
                    $terms_query[] = [
                        'taxonomy' => $tax,
                        'field'    => 'term_id',
                        'terms'    => $terms,
                        'operator' => 'IN',
                    ];
                }
            }

            if (!empty($exclude_terms)) {
                $tax_terms_map = $this->mapGroupControlQuery($exclude_terms);

                foreach ($tax_terms_map as $tax => $terms) {
                    $terms_query[] = [
                        'taxonomy' => $tax,
                        'field'    => 'term_id',
                        'terms'    => $terms,
                        'operator' => 'NOT IN',
                    ];
                }
            }

            if (!empty($terms_query)) {
                $args['tax_query']             = $terms_query;
                $args['tax_query']['relation'] = 'AND';
            }
        }

        $query_id = $this->get_settings_for_display('query_id');

        if (!empty($query_id)) {
            add_action('pre_get_posts', [$this, 'pre_get_posts_query_filter']);
        }
        add_action('pre_get_posts', [$this, 'fix_query_offset'], 1);
        add_filter('found_posts', [$this, 'prefix_adjust_offset_pagination'], 1, 2);


        return $args;
    }

	public function query_posts($posts_per_page) {

		$default = $this->getGroupControlQueryArgs();
		if ($posts_per_page) {
			$args['posts_per_page'] = $posts_per_page;
			$args['paged']  = max(1, get_query_var('paged'), get_query_var('page'));
		}

		$args         = array_merge($default, $args);
		$this->_query = new WP_Query($args);
	}









	protected function render() {
		$settings = $this->get_settings_for_display();

        $default = $this->getGroupControlQueryArgs();

		$args         = array_merge($default);
		$this->_query = new WP_Query($args);

		$this->query_posts($settings['item_limit']['size']);
		
		$wp_query = $this->get_query();


		
        echo '<div class="harika-poststhumbs-widget">';
            if ( $wp_query->have_posts() ) :
                while ($wp_query->have_posts()) :
                $wp_query->the_post(); ?>
                    <div class="article">
                            <a class="featured-image" href="<?php the_permalink(); ?>" target="_top"><?php the_post_thumbnail(); ?></a>
                            <div class="content">
                                <h3 class="title"><a href="<?php the_permalink(); ?>" target="_top"><?php the_title(); ?></a></h3>
                                <span class="date"><?php echo get_the_date(); ?></span>
                            </div>
                    </div>
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
        echo '</div>';





	}

	protected function content_template() {

	}

}