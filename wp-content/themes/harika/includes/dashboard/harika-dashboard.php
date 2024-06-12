<?php
if(!defined('ABSPATH')){ exit; }

require get_template_directory() . '/includes/dashboard/welcome.php';
//require get_template_directory() . '/includes/dashboard/dashboard.php';

function harika_dashboard_menu() {
    $my_page = add_menu_page(
      __('تنظیمات قالب', 'harika'),
      __('تنظیمات قالب', 'harika'),
        'administrator',
        'harika-welcome',
        'harika_welcome_page',
        get_template_directory_uri() . '/assets/images/fav1.png',
        3
    );

}
add_action( 'admin_menu', 'harika_dashboard_menu' );

function harika_let_to_num( $size ) {
    $l   = substr( $size, -1 );
    $ret = substr( $size, 0, -1 );
    switch ( strtoupper( $l ) ) {
      case 'P':
        $ret *= 1024;
      case 'T':
        $ret *= 1024;
      case 'G':
        $ret *= 1024;
      case 'M':
        $ret *= 1024;
      case 'K':
        $ret *= 1024;
    }
    return $ret;
}