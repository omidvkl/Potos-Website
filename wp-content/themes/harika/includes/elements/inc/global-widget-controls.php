<?php

namespace Harika\Traits;
use Harika\Elementor\Controls\Dynamic_Select;

defined('ABSPATH') || die();

trait Global_Widget_Controls {


	protected function register_query_controls() {

		$this->start_controls_section(
			'query_section',
			[
				'label' => __( 'کوئری', 'harika' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'posts_source',
            [
                'label'   => __('منبع', 'harika'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => $this->getGroupControlQueryPostTypes(),
                'default' => 'post',
            ]
        );
		$this->add_control(
            'posts_selected_ids',
            [
                'label'       => __('جستجو و انتخاب کنید', 'harika'),
                'type'        => Dynamic_Select::TYPE,
                'multiple'    => true,
                'label_block' => true,
                'query_args'  => [
                    'query' => 'posts',
                ],
                'condition'   => [
                    'posts_source' => 'manual_selection',
                ]
            ]
        );

        $this->start_controls_tabs(
            'tabs_posts_include_exclude',
            [
                'condition' => [
                    'posts_source!' => ['manual_selection', 'current_query'],
                ]
            ]
        );

        $this->start_controls_tab(
            'tab_posts_include',
            [
                'label'     => __('شامل', 'harika'),
                'condition' => [
                    'posts_source!' => ['manual_selection', 'current_query'],
                ]
            ]
        );

        $this->add_control(
            'posts_include_by',
            [
                'label'       => __('شامل موارد', 'harika'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'multiple'    => true,
                'label_block' => true,
                'options'     => [
                    'authors' => __('نویسنده ها', 'harika'),
                    'terms'   => __('شرایط (دسته بندی، برچسب و...)', 'harika'),
                ],
                'condition'   => [
                    'posts_source!' => ['manual_selection', 'current_query'],
                ]
            ]
        );

        $this->add_control(
            'posts_include_author_ids',
            [
                'label'       => __('نویسنده ها', 'harika'),
                'type'        => Dynamic_Select::TYPE,
                'multiple'    => true,
                'label_block' => true,
                'query_args'  => [
                    'query' => 'authors',
                ],
                'condition'   => [
                    'posts_include_by' => 'authors',
                    'posts_source!'    => ['manual_selection', 'current_query'],
                ]
            ]
        );

        $this->add_control(
            'posts_include_term_ids',
            [
                'label'       => __('شرایط', 'harika'),
                'description' => __('شرایط شامل تکسونومی ها می شود، همانند دسته بندی ها ، برچسب ها ، ساختار ها و سایر تکسومونی های سفارشی.', 'harika'),
                'type'        => Dynamic_Select::TYPE,
                'multiple'    => true,
                'label_block' => true,
                'placeholder' => __('جستجو و انتخاب کنید', 'harika'),
                'query_args'  => [
                    'query'        => 'terms',
                    'widget_props' => [
                        'post_type' => 'posts_source'
                    ]
                ],
                'condition'   => [
                    'posts_include_by' => 'terms',
                    'posts_source!'    => ['manual_selection', 'current_query'],
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_posts_exclude',
            [
                'label'     => __('عدم شامل', 'harika'),
                'condition' => [
                    'posts_source!' => ['manual_selection', 'current_query'],
                ]
            ]
        );

        $this->add_control(
            'posts_exclude_by',
            [
                'label'       => __('عدم شامل موارد', 'harika'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'multiple'    => true,
                'label_block' => true,
                'options'     => [
                    'authors'          => __('نویسنده ها', 'harika'),
                    'current_post'     => __('پست فعلی', 'harika'),
                    'manual_selection' => __('انتخاب دستی', 'harika'),
                    'terms'            => __('شرایط', 'harika'),
                ],
                'condition'   => [
                    'posts_source!' => ['manual_selection', 'current_query'],
                ]
            ]
        );

        $this->add_control(
            'posts_exclude_ids',
            [
                'label'       => __('جستجو و انتخاب کنید', 'harika'),
                'type'        => Dynamic_Select::TYPE,
                'multiple'    => true,
                'label_block' => true,
                'query_args'  => [
                    'query'        => 'posts',
                    'widget_props' => [
                        'post_type' => 'posts_source'
                    ]
                ],
                'condition'   => [
                    'posts_source!'    => ['manual_selection', 'current_query'],
                    'posts_exclude_by' => 'manual_selection',
                ]
            ]
        );

        $this->add_control(
            'posts_exclude_author_ids',
            [
                'label'       => __('نویسنده ها', 'harika'),
                'type'        => Dynamic_Select::TYPE,
                'multiple'    => true,
                'label_block' => true,
                'query_args'  => [
                    'query' => 'authors',
                ],
                'condition'   => [
                    'posts_exclude_by' => 'authors',
                    'posts_source!'    => ['manual_selection', 'current_query'],
                ]
            ]
        );

        $this->add_control(
            'posts_exclude_term_ids',
            [
                'label'       => __('شرایط', 'harika'),
                'description' => __('شرایط شامل تکسونومی ها می شود، همانند دسته بندی ها ، برچسب ها ، ساختار ها و سایر تکسومونی های سفارشی.', 'harika'),
                'type'        => Dynamic_Select::TYPE,
                'multiple'    => true,
                'label_block' => true,
                'placeholder' => __('جستجو و انتخاب کنید', 'harika'),
                'query_args'  => [
                    'query'        => 'terms',
                    'widget_props' => [
                        'post_type' => 'posts_source'
                    ]
                ],
                'condition'   => [
                    'posts_exclude_by' => 'terms',
                    'posts_source!'    => ['manual_selection', 'current_query'],
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'posts_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'posts_offset',
            [
                'label'   => __('رد کردن پست (افست)', 'harika'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );

        $this->add_control(
            'posts_select_date',
            [
                'label'     => __('تاریخ', 'harika'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'anytime',
                'options'   => [
                    'anytime' => __('همه زمان', 'harika'),
                    'today'   => __('روز گذشته', 'harika'),
                    'week'    => __('هفته گذشته', 'harika'),
                    'month'   => __('ماه گذشته', 'harika'),
                    'quarter' => __('3 ماه گذشته', 'harika'),
                    'year'    => __('سال گذشته', 'harika'),
                    'exact'   => __('سفارشی', 'harika'),
                ],
                'condition' => [
                    'posts_source!' => 'current_query',
                ]
            ]
        );

        $this->add_control(
            'posts_date_before',
            [
                'label'       => __('قبل از', 'harika'),
                'type'        => \Elementor\Controls_Manager::DATE_TIME,
                'description' => __('پست هایی که قبل از تاریخ مشخص شده منتشر شده اند', 'harika'),
                'condition'   => [
                    'posts_select_date' => 'exact',
                    'posts_source!'     => 'current_query',
                ]
            ]
        );

        $this->add_control(
            'posts_date_after',
            [
                'label'       => __('بعد از', 'harika'),
                'type'        => \Elementor\Controls_Manager::DATE_TIME,
                'description' => __('پست هایی که بعد از تاریخ مشخص شده منتشر شده اند', 'harika'),
                'condition'   => [
                    'posts_select_date' => 'exact',
                    'posts_source!'     => 'current_query',
                ]
            ]
        );

        $this->add_control(
            'posts_orderby',
            [
                'label'     => __('مرتب سازی بر اساس', 'harika'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'date',
                'options'   => [
                    'title'         => __('عنوان', 'harika'),
                    'ID'            => __('شناسه', 'harika'),
                    'date'          => __('تاریخ', 'harika'),
                    'author'        => __('نویسنده', 'harika'),
                    'comment_count' => __('تعداد نظرات', 'harika'),
                    'menu_order'    => __('سفارش منو', 'harika'),
                    'rand'          => __('تصادفی', 'harika'),
                ],
                'condition' => [
                    'posts_source!' => 'current_query',
                ]
            ]
        );

        $this->add_control(
            'posts_order',
            [
                'label'     => __('سفارش', 'harika'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'desc',
                'options'   => [
                    'asc'  => __('صعودی', 'harika'),
                    'desc' => __('نزولی', 'harika'),
                ],
                'condition' => [
                    'posts_source!' => 'current_query',
                ]
            ]
        );

        $this->add_control(
            'posts_ignore_sticky_posts',
            [
                'label'        => __('نادیده گرفتن پست های ثابت', 'harika'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'posts_source' => ['post', 'current_query'],
                ]
            ]
        );

        $this->add_control(
            'posts_only_with_featured_image',
            [
                'label'        => __('فقط پست های دارای تصویر شاخص', 'harika'),
                'description'  => __('تنها پست هایی که تصویر شاخص دارند نمایش داده خواهند شد.', 'harika'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'condition'    => [
                    'posts_source!' => 'current_query',
                ]
            ]
        );

        $this->add_control(
            'query_id',
            [
                'label'       => __('شناسه کوئری', 'harika'),
                'description' => __('به کوئری خود یک شناسه منحصر به فرد سفارشی بدهید تا امکان فیلتر سمت سرور فراهم شود', 'harika'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'separator'   => 'before',
            ]
        );

		$this->end_controls_section();
	}




	function register_query_codes() {

	}







}
