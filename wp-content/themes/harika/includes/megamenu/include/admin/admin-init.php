<?php


class HARIKA_Mega_Menu_Admin_Setting{

    public function __construct(){
        $this->parisanmegamenu_admin_settings_page();
        add_action('admin_enqueue_scripts', array( $this, 'parisanmegamenu_enqueue_admin_scripts' ) );
    }

    /*
    *  Setting Page
    */
    public function parisanmegamenu_admin_settings_page() {
        //require_once('include/template-library.php');
        require_once(get_template_directory() . '/includes/megamenu/include/admin/include/class.settings-api.php');
        require_once(get_template_directory() . '/includes/megamenu/include/admin/include/admin-setting.php');
    }

    /*
    *  Enqueue admin scripts
    */
    public function parisanmegamenu_enqueue_admin_scripts(){

        wp_enqueue_style( 'parisanmegamenu-admin', get_template_directory_uri() . '/includes/megamenu/include/admin/assets/css/admin_optionspanel.css', FALSE, 3.2 );
    }

}

new HARIKA_Mega_Menu_Admin_Setting();