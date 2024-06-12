<?php



///*******************************************************///
///             *CUSTOM FONT FOR ELEMENTOR*               ///
///*******************************************************///

add_filter( 'elementor/fonts/groups', function( $font_groups ) {
	$font_groups['HARIKA'] = __( 'هاریکا' );
	return $font_groups;
} );
add_filter( 'elementor/fonts/additional_fonts', function( $additional_fonts ) {
	$additional_fonts['IRANSans'] = 'HARIKA';
	return $additional_fonts;
} );



///*******************************************************///
///                   *CUSTOM CSS and JS*                 ///
///*******************************************************///

function harika_register_styles() {
	//$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'harika-style', get_template_directory_uri() . '/assets/css/harika-style.css',  __FILE__ ) ;
	wp_enqueue_style( 'plyr-css', get_template_directory_uri() . '/assets/plyr/plyr.css',false,'1.1','all');

}
add_action( 'wp_enqueue_scripts', 'harika_register_styles' );
add_action( 'admin_enqueue_scripts', 'harika_register_styles' );


function harika_register_scripts() {
    wp_enqueue_script( 'harika-js', get_template_directory_uri() . '/assets/js/harika-script.js', array('jquery'), NULL, true);
	wp_enqueue_script( 'plyr-js', get_template_directory_uri() . '/assets/plyr/plyr.js');

	//$theme_version = wp_get_theme()->get( 'Version' );
}
add_action( 'wp_enqueue_scripts', 'harika_register_scripts' );



///*******************************************************///
///                *Add User Social Links*                  ///
///*******************************************************///
function harika_add_user_social_links( $user_contact ) {

    /* Add user contact methods */
    $user_contact['twitter']   = __('لینک توئیتر', 'textdomain');
    $user_contact['facebook']  = __('لینک فیس بوک', 'textdomain');
    $user_contact['linkedin']  = __('لینک لینکدین', 'textdomain');
    $user_contact['github']    = __('لینک گیت هاب', 'textdomain');
    $user_contact['instagram'] = __('لینک اینستاگرام', 'textdomain');
    $user_contact['dribbble']  = __('لینک دریبل', 'textdomain');
    $user_contact['behance']   = __('لینک بیهانس', 'textdomain');
    $user_contact['skype']     = __('لینک اسکایپ', 'textdomain');

    return $user_contact;
}
add_filter('user_contactmethods', 'harika_add_user_social_links');

function harika_get_user_social_links() {
    $return  = '<ul class="list-inline">';
    if(!empty(get_the_author_meta('twitter'))) {
        $return .= '<li><a href="'.get_the_author_meta('twitter').'" title="Twitter" target="_blank" id="twitter"><i class="fab fa-twitter"></i></a></li>';
    }
    if(!empty(get_the_author_meta('facebook'))) {
        $return .= '<li><a href="'.get_the_author_meta('facebook').'" title="Facebook" target="_blank" id="facebook"><i class="fab fa-facebook-f"></i></a></li>';
    }
    if(!empty(get_the_author_meta('linkedin'))) {
        $return .= '<li><a href="'.get_the_author_meta('linkedin').'" title="LinkedIn" target="_blank" id="linkedin"><i class="fab fa-linkedin-in"></i></a></li>';
    }
    if(!empty(get_the_author_meta('github'))) {
        $return .= '<li><a href="'.get_the_author_meta('github').'" title="Github" target="_blank" id="github"><i class="fab fa-github"></i></a></li>';
    }
    if(!empty(get_the_author_meta('instagram'))) {
        $return .= '<li><a href="'.get_the_author_meta('instagram').'" title="Instagram" target="_blank" id="instagram"><i class="fab fa-instagram"></i></a></li>';
    }
    if(!empty(get_the_author_meta('dribbble'))) {
        $return .= '<li><a href="'.get_the_author_meta('dribbble').'" title="Dribbble" target="_blank" id="dribbble"><i class="fab fa-dribbble"></i></a></li>';
    }
    if(!empty(get_the_author_meta('behance'))) {
        $return .= '<li><a href="'.get_the_author_meta('behance').'" title="Behance" target="_blank" id="behance"><i class="fab fa-behance"></i></a></li>';
    }
    if(!empty(get_the_author_meta('skype'))) {
        $return .= '<li><a href="'.get_the_author_meta('skype').'" title="Skype" target="_blank" id="skype"><i class="fab fa-skype"></i></a></li>';
    }
    $return .= '</ul>';

    return $return;
}



///*******************************************************///
///                      *Allow SVG*                      ///
///*******************************************************///

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

  
///*******************************************************///
///                *SIDEBAR*                  ///
///*******************************************************///
function harika_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Blog sidebar
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'سایدبار عمومی', 'harika' ),
				'id'          => 'blog-sidebar',
				'description' => __( 'ابزارک های موجود در اینجا در تمامی سایدبار ها نمایش داده خواهند شد.', 'harika' ),
			)
		)
	);

}
add_action( 'widgets_init', 'harika_sidebar_registration' );




///*******************************************************///
///             *DISABLE Widgets Block Editor*            ///
///*******************************************************///
function example_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );


///*******************************************************///
///                   *ADD IMAGE SIZES*                   ///
///*******************************************************///
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'harika-80', 80, 80, true );
    add_image_size( 'single-image', 1200 );
    add_image_size( 'archives-image', 400 );
    add_image_size( 'harika-700-450', 700, 450, false );
    add_image_size( 'harika-300', 300, 300, true );
    
}



///*******************************************************///
///                     *CUSTOM SVGs*                     ///
///*******************************************************///
function post_is_audio_svg(){
	return '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="16" viewBox="0 0 23 16" fill="none">
	<line x1="22" y1="6.99998" x2="22" y2="8.99998" stroke="white" stroke-width="2" stroke-linecap="round"/>
	<line x1="19" y1="6.00001" x2="19" y2="10" stroke="white" stroke-width="2" stroke-linecap="round"/>
	<line x1="16" y1="3.00002" x2="16" y2="13" stroke="white" stroke-width="2" stroke-linecap="round"/>
	<line x1="13" y1="6.00001" x2="13" y2="10" stroke="white" stroke-width="2" stroke-linecap="round"/>
	<line x1="10" y1="1.00001" x2="10" y2="15" stroke="white" stroke-width="2" stroke-linecap="round"/>
	<line x1="7" y1="3.00002" x2="7" y2="13" stroke="white" stroke-width="2" stroke-linecap="round"/>
	<line x1="4" y1="6.00001" x2="4" y2="10" stroke="white" stroke-width="2" stroke-linecap="round"/>
	<line x1="1" y1="6.99998" x2="1" y2="8.99998" stroke="white" stroke-width="2" stroke-linecap="round"/>
	</svg>';
}
function post_is_video_svg(){
	return '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
	<path d="M2.2917 14.6951L2.80769 13.8385L2.2917 14.6951C3.10808 15.1868 3.96709 15.0056 4.70317 14.7022C5.41337 14.4095 6.27489 13.8905 7.29085 13.2784L7.36215 13.2354L9.78523 11.7758L9.85486 11.7339C10.8723 11.1211 11.7334 10.6024 12.3302 10.1081C12.9535 9.59181 13.5 8.93142 13.5 8C13.5 7.06858 12.9535 6.4082 12.3302 5.89189C11.7334 5.39761 10.8723 4.87895 9.85486 4.26612C9.83173 4.25219 9.80852 4.23821 9.78522 4.22418L7.36215 2.76456C7.33829 2.75019 7.31452 2.73587 7.29084 2.7216C6.27488 2.10954 5.41337 1.59051 4.70317 1.2978C3.96709 0.994423 3.10808 0.813176 2.2917 1.30495C1.49124 1.78713 1.22431 2.62268 1.11093 3.41946C0.999906 4.19974 0.999948 5.23137 0.999998 6.46163C0.999999 6.4878 1 6.51405 1 6.54039L1 9.45962L0.999998 9.53837C0.999948 10.7686 0.999906 11.8003 1.11093 12.5805C1.22431 13.3773 1.49124 14.2129 2.2917 14.6951Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>';
}
function video_title_link_svg(){
	return '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" viewBox="0 0 18 25" fill="none">
	<path d="M7.82059 9.0416C7.276 8.89686 6.71437 9.22127 6.57399 9.76288C4.69908 16.9967 5.23315 18.8366 9.12271 19.8704C13.1829 20.9494 14.5194 19.4544 16.6953 11.4002C18.8711 3.34597 18.4672 1.38844 14.4071 0.309378C11.9991 -0.330579 10.5491 -0.0651694 9.31392 1.93692C8.98386 2.47189 9.30837 3.14738 9.91916 3.30971L9.95222 3.3185C10.4206 3.44298 10.9 3.21477 11.1705 2.81554C11.2658 2.67486 11.3562 2.55877 11.4418 2.46306C11.7109 2.16204 11.9105 2.08048 12.1351 2.04535C12.4487 1.99629 12.9677 2.02338 13.8786 2.26548C14.7896 2.50758 15.2527 2.74151 15.4995 2.93951C15.6763 3.08131 15.8081 3.25094 15.8894 3.6451C15.987 4.11805 15.9984 4.87709 15.8082 6.11623C15.6207 7.33711 15.2613 8.88386 14.7231 10.8761C14.1849 12.8683 13.7165 14.3861 13.2634 15.5363C12.8035 16.7038 12.4109 17.3555 12.088 17.7167C11.8189 18.0177 11.6192 18.0993 11.3947 18.1344C11.0811 18.1834 10.5621 18.1564 9.65114 17.9143C8.7402 17.6722 8.27706 17.4382 8.03023 17.2402C7.85347 17.0984 7.7217 16.9288 7.64038 16.5346C7.5428 16.0617 7.53134 15.3026 7.7216 14.0635C7.87714 13.0505 8.15105 11.8132 8.54723 10.2833C8.68748 9.74167 8.36518 9.18633 7.82059 9.0416Z" fill="#2B39BE"/>
	<path d="M4.12137 22.7345C5.03232 22.9766 5.55134 23.0037 5.86491 22.9547C6.08946 22.9195 6.28909 22.838 6.55821 22.5369C6.64378 22.4412 6.73423 22.3251 6.82952 22.1845C7.09996 21.7852 7.57939 21.557 8.04778 21.6815L8.08084 21.6903C8.69163 21.8526 9.01614 22.5281 8.68608 23.0631C7.45086 25.0652 6.00089 25.3306 3.59294 24.6906C-0.467222 23.6116 -0.871087 21.654 1.30475 13.5998C3.48058 5.54556 4.81713 4.05058 8.87729 5.12964C12.7669 6.16337 13.3009 8.00329 11.426 15.2371C11.2856 15.7787 10.724 16.1031 10.1794 15.9584C9.63482 15.8137 9.31252 15.2583 9.45277 14.7167C9.84895 13.1868 10.1229 11.9495 10.2784 10.9365C10.4687 9.69736 10.4572 8.93832 10.3596 8.46536C10.2783 8.07121 10.1465 7.90157 9.96977 7.75978C9.72294 7.56178 9.2598 7.32784 8.34886 7.08574C7.43791 6.84364 6.91889 6.81655 6.60532 6.86562C6.38076 6.90075 6.18114 6.98231 5.91201 7.28333C5.58909 7.64453 5.19653 8.29619 4.73665 9.46368C4.28354 10.6139 3.81508 12.1317 3.27689 14.1239C2.7387 16.1161 2.37929 17.6629 2.19183 18.8838C2.00157 20.1229 2.01303 20.8819 2.11061 21.3549C2.19193 21.7491 2.3237 21.9187 2.50046 22.0605C2.74729 22.2585 3.21043 22.4924 4.12137 22.7345Z" fill="#2B39BE"/>
	</svg>';
}
function playlist_video_svg(){
	return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	<path d="M1 12C1 14.4477 1.13246 16.3463 1.46153 17.827C1.78807 19.2963 2.29478 20.2921 3.00136 20.9986C3.70794 21.7052 4.70365 22.2119 6.17298 22.5385C7.65366 22.8675 9.55232 23 12 23C14.4477 23 16.3463 22.8675 17.827 22.5385C19.2963 22.2119 20.2921 21.7052 20.9986 20.9986C21.7052 20.2921 22.2119 19.2963 22.5385 17.827C22.8675 16.3463 23 14.4477 23 12C23 9.55232 22.8675 7.65366 22.5385 6.17298C22.2119 4.70365 21.7052 3.70794 20.9986 3.00136C20.2921 2.29478 19.2963 1.78807 17.827 1.46153C16.3463 1.13246 14.4477 1 12 1C9.55232 1 7.65366 1.13246 6.17298 1.46153C4.70365 1.78807 3.70794 2.29478 3.00136 3.00136C2.29478 3.70794 1.78807 4.70365 1.46153 6.17298C1.13246 7.65366 1 9.55232 1 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	<path d="M12.6403 15.7758L14.2557 14.8027C14.277 14.7899 14.2982 14.7771 14.3194 14.7644C14.9825 14.365 15.5755 14.0079 15.993 13.6621C16.4368 13.2945 16.8936 12.7692 16.8936 12C16.8936 11.2308 16.4368 10.7055 15.993 10.3379C15.5755 9.99207 14.9825 9.63499 14.3194 9.23562C14.2982 9.22287 14.277 9.21009 14.2557 9.19725L12.6403 8.22418C12.6186 8.21106 12.5969 8.19799 12.5752 8.18496C11.9134 7.78619 11.3201 7.42868 10.8227 7.22369C10.2997 7.00815 9.59778 6.84042 8.91602 7.2511C8.25018 7.65219 8.05056 8.33908 7.97083 8.89935C7.89342 9.4434 7.89348 10.1518 7.89355 10.9545C7.89355 10.9785 7.89355 11.0027 7.89355 11.0269L7.89355 12.9731C7.89355 12.9973 7.89355 13.0215 7.89355 13.0455C7.89348 13.8482 7.89342 14.5566 7.97083 15.1006C8.05056 15.6609 8.25018 16.3478 8.91602 16.7489C9.59778 17.1596 10.2997 16.9918 10.8227 16.7763C11.32 16.5713 11.9134 16.2138 12.5752 15.815C12.5969 15.802 12.6185 15.7889 12.6403 15.7758Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>';
}
