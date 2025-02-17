<?php



    /**
     * Elementor category
     */
    if( !function_exists('harikamega_menu_elementor_init') ){
        function harikamega_menu_elementor_init(){
            \Elementor\Plugin::instance()->elements_manager->add_category(
                'harikamegamenu-addons',
                [
                    'title'  => __( 'HARIKA Mega Menu','harika-megamenu'),
                    'icon' => 'font'
                ],
                1
            );
        }
        add_action('elementor/init','harikamega_menu_elementor_init');
    }

    /*
     * Elementor Templates List
     * return array
     */
    if( !function_exists('harikamega_menu_elementor_template') ){
        function harikamega_menu_elementor_template() {
            $templates = '';
            if( class_exists('\Elementor\Plugin') ){
                $templates = \Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
            }
            if ( empty( $templates ) ) {
                $template_lists = [ '0' => __( 'تمپلیت ذخیره شده ای وجود ندارد.', 'harika-megamenu' ) ];
            } else {
                $template_lists = [ '0' => __( 'انتخاب تمپلیت', 'harika-megamenu' ) ];
                foreach ( $templates as $template ) {
                    if($template['type'] == 'section'){
                        $template['type'] = "بخش"; 
                    }else if($template['type'] == 'page'){
                        $template['type'] = "صفحه"; 
                    }
                    $template_lists[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
                }
            }
            return $template_lists;
        }
    }

    /**
     * Get all menu list
     * return array
     */
    if( !function_exists('harikamega_get_all_create_menus') ){
        function harikamega_get_all_create_menus() {
            $raw_menus = wp_get_nav_menus();
            $menus     = wp_list_pluck( $raw_menus, 'name', 'term_id' );
            $parent    = isset( $_GET['parent_menu'] ) ? absint( $_GET['parent_menu'] ) : 0;
            if ( 0 < $parent && isset( $menus[ $parent ] ) ) {
                unset( $menus[ $parent ] );
            }
            return $menus;
        }
    }

    /**
    * Options return
    */
    if( !function_exists('harikamega_menu_get_option') ){
        function harikamega_menu_get_option( $option, $section, $default = '' ){
            $options = get_option( $section );
            if ( isset( $options[$option] ) ) {
                return $options[$option];
            }
            return $default;
        }
    }