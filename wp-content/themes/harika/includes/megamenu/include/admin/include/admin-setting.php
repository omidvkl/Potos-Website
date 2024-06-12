<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class HARIKA_Mega_Menu_Admin_Settings {

    private $settings_api;

    function __construct() {
        $this->settings_api = new HARIKA_Mega_Menu_Settings_API();

        add_action( 'admin_init', array( $this, 'admin_init' ) );

    }

    function admin_init() {
        //initialize settings
        $this->settings_api->admin_init();
    }


}

new HARIKA_Mega_Menu_Admin_Settings();