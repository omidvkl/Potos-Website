<?php

namespace Elementor;

if ( ! function_exists('harika_insert_elementor') ){

	function harika_insert_elementor($atts){
	    if(!class_exists('Elementor\Plugin')){
	        return '';
	    }else
	    if($atts['id']){
			$post_id = $atts['id'];

			$response = Plugin::instance()->frontend->get_builder_content_for_display($post_id);
			if ($response){
				return $response;
			} else {
				return esc_html__('لطفا یک تمپلیت را جهت نمایش محتوا انتخاب کنید', 'harika');
			}
	    } else {
			return esc_html__('لطفا یک تمپلیت را جهت نمایش محتوا انتخاب کنید', 'harika');
		}
	}
 
}

add_shortcode('HARIKA_INSERT_TPL','Elementor\harika_insert_elementor');





