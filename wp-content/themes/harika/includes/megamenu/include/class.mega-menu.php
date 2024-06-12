<?php

namespace HarikaMegaMenuLite;



class HARIKA_Mega_Menu_Elementor {

    private static $_instance = null;
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {


        add_action( 'init', [ $this, 'init' ] );

        // Body Class
        add_filter( 'body_class', [ $this, 'body_classes' ] );


        // Ajax Callback
        add_action( 'wp_ajax_HARIKA_Mega_Menu_Panels_ajax_requests', [ $this, 'panel_ajax_requests' ] );
    }

    protected function setMode() {
        if ( is_admin() ) {
            $this->mode = 'admin';
        } else {
            $this->mode = 'frontend';
        }
    }

    // Body Class
    public function body_classes( $classes ){
        $classes[] = 'harika-megamenu-active';
        return $classes;
    }

    public function init() {
        // Set current mode
        $this->setMode();

        // Plugins Required File
        $this->includes();


        if( $this->mode === 'admin' ) {
            // If the user can manage options, let the fun begin!
            if ( current_user_can( 'manage_options' ) ) {
                add_action( 'admin_init', array( $this, 'register_nav_meta_box' ), 9 );
            }
        }

        // Admin Scripts
        add_action('admin_enqueue_scripts', array( $this, 'harikamega_megamenu_admin_scripts_method' ) );

        add_action( 'admin_footer', array( $this, 'harikamega_menu_pop_up_content' ) );

        // Frontend Scripts
        add_action( 'wp_enqueue_scripts', array( $this, 'harikamega_menu_styles_inline' ) );

    }

    // Meta Box Field render
    public function register_nav_meta_box() {
        global $pagenow;
        if ( 'nav-menus.php' == $pagenow ) {
            add_meta_box(
                'HARIKA_Mega_Menu_meta_box',
                __("تنظیمات مگامنو", ""),
                array( $this, 'metabox_contents' ),
                'nav-menus',
                'side',
                'core'
            );
        }
    }

    public function metabox_contents(){
        // Get recently edited nav menu.
        $recently_edited = absint( get_user_option( 'nav_menu_recently_edited' ) );
        $nav_menu_selected_id = isset( $_REQUEST['menu'] ) ? absint( $_REQUEST['menu'] ) : 0;
        if ( empty( $recently_edited ) && is_nav_menu( $nav_menu_selected_id ) )
            $recently_edited = $nav_menu_selected_id;
        
        // Use $recently_edited if none are selected.
        if ( empty( $nav_menu_selected_id ) && ! isset( $_GET['menu'] ) && is_nav_menu( $recently_edited ) )
            $nav_menu_selected_id = $recently_edited;
        
        $options = get_option( "harika_menu_options_" . $nav_menu_selected_id );

    ?>
        <div id="harikamegamenu-menu-metabox">

            <?php wp_nonce_field( basename( __FILE__ ), 'harikamegamenu_menu_metabox_noce' ); ?>
            <input type="hidden" value="<?php echo esc_attr( $nav_menu_selected_id ); ?>" id="harikamegamenu-metabox-input-menu-id" />
            <p>
                <label><strong><?php esc_html_e( "فعالسازی مگامنو؟", 'harika-megamenu' ); ?></strong></label>
                <input type="checkbox" class="alignright pull-right-input" id="harikamegamenu-menu-metabox-input-is-enabled" <?php echo isset($options['enable_menu']) && $options['enable_menu'] == 'on' ? 'checked="true"' : '' ?>>
            </p>
            <p>
                <?php echo get_submit_button( esc_html__('ذخیره', 'harika-megamenu'), 'harikamegamenu-menu-settings-save button-primary alignright','', false); ?>
                <span class='spinner'></span>
            </p>

        </div>

    <?php
    }

    public function panel_ajax_requests(){

        $action = isset( $_POST['sub_action'] ) ? $_POST['sub_action'] : '';
        
        if( $action === 'save_menu_settings' ){

            if ( ! check_ajax_referer( 'harikamega_menu_nonce', 'nonce' ) ) {
                wp_send_json_error();
            }

            $form_data = ( !empty( $_POST['settings'] ) ?  sanitize_text_field( $_POST['settings'] ) : '' );

            if( !empty( $form_data ) ) {
                parse_str( $form_data, $data );
            } else {
                return;
            }

            $menu_item_id = absint( $_POST['menu_item_id'] );

            update_post_meta( $menu_item_id, 'harikamega_menu_settings', $data );

            wp_send_json_success([
                'message' => esc_html__( 'Successfully data saved','harikamega-addons' )
            ]);

        }
        
        else if( $action === 'save_menu_options' ){

            if ( ! check_ajax_referer( 'harikamega_menu_nonce', 'nonce' ) ) {
                wp_send_json_error();
            }

            $settings = isset( $_POST['settings'] ) ? $_POST['settings'] : array();
            $menu_id = absint( $_POST['menu_id'] );
            update_option( 'harika_menu_options_' . $menu_id, $settings );
            wp_die();
        }else{
            $menu_item_id = absint( $_REQUEST['menu_item_id'] );

            $menu_data = !empty( get_post_meta( $menu_item_id, 'harikamega_menu_settings', true ) ) ? get_post_meta( $menu_item_id, 'harikamega_menu_settings', true ) : '';

            if( empty( $menu_data ) ){
                $menu_data = [
                    'menu-item-menuwidth-'.$menu_item_id => get_post_meta( $menu_item_id, '_menu_item_menuwidth', true ),
                    'menu-item-menuposition-'.$menu_item_id => get_post_meta( $menu_item_id, '_menu_item_menuposition', true ),
                    'menu-item-template-'.$menu_item_id => get_post_meta( $menu_item_id, '_menu_item_template', true ),
                    'menu-item-ficon-'.$menu_item_id => get_post_meta( $menu_item_id, '_menu_item_ficon', true ),
                    'menu-item-ficoncolor-'.$menu_item_id => get_post_meta( $menu_item_id, '_menu_item_ficoncolor', true ),
                    'menu-item-menutag-'.$menu_item_id => get_post_meta( $menu_item_id, '_menu_item_menutag', true ),
                    'menu-item-menutagcolor-'.$menu_item_id => get_post_meta( $menu_item_id, '_menu_item_menutagcolor', true ),
                    'menu-item-menutagbgcolor-'.$menu_item_id => get_post_meta( $menu_item_id, '_menu_item_menutagbgcolor', true ),
                ];
            }else{
                if(!array_key_exists('menu-item-menuwidth-'.$menu_item_id, $menu_data)){
                    $menu_data['menu-item-menuwidth-'.$menu_item_id] = get_post_meta( $menu_item_id, '_menu_item_menuwidth', true );
                }
                if(!array_key_exists('menu-item-menuposition-'.$menu_item_id, $menu_data)){
                    $menu_data['menu-item-menuposition-'.$menu_item_id] = get_post_meta( $menu_item_id, '_menu_item_menuposition', true );
                }
                if(!array_key_exists('menu-item-template-'.$menu_item_id, $menu_data)){
                    $menu_data['menu-item-template-'.$menu_item_id] = get_post_meta( $menu_item_id, '_menu_item_template', true );
                }
              $menu_data['menu-item-ficon-'.$menu_item_id] = '';  
              $menu_data['menu-item-ficoncolor-'.$menu_item_id] = '';  
              $menu_data['menu-item-menutag-'.$menu_item_id] = '';  
              $menu_data['menu-item-menutagcolor-'.$menu_item_id] = '';  
              $menu_data['menu-item-menutagbgcolor-'.$menu_item_id] = '';   
            }

            wp_send_json_success( array(
                'content'   => $menu_data,
                'temp_list' => harikamega_menu_elementor_template(),
            ) );
        } 
    }



    public function includes() {
        // Include files
        require_once ( get_template_directory() . '/includes/megamenu/include/helper-function.php' );
        require_once ( get_template_directory() . '/includes/megamenu/include/admin/admin-init.php' );
        require_once ( get_template_directory() . '/includes/megamenu/include/menu/harika_menu_menu.php' );
    }



    public function harikamega_megamenu_admin_scripts_method($hook){

        wp_enqueue_style( 'fonticonpicker', get_template_directory_uri() . '/includes/megamenu/include/admin/assets/css/jquery.fonticonpicker.min.css' );
        
        wp_enqueue_style( 'fonticonpicker-bootstrap', get_template_directory_uri() . '/includes/megamenu/include/admin/assets/css/jquery.fonticonpicker.bootstrap.min.css');
        wp_enqueue_style( 'wp-jquery-ui-dialog' ); 
  
        
        wp_enqueue_script('fonticonpicker.js', get_template_directory_uri() . '/includes/megamenu/include/admin/assets/js/jquery.fonticonpicker.min.js',
            array('jquery'));
        wp_enqueue_script( 'jquery-ui-dialog' );
        wp_enqueue_script( 'harikamenu-admin', get_template_directory_uri() . '/includes/megamenu/include/admin/assets/js/admin_scripts.js', array('jquery'), 3.2, TRUE );

        wp_localize_script(
                'harikamenu-admin', 
                'HARIKAMEGAMENU',
                [
                    'nonce'    => wp_create_nonce( 'harikamega_menu_nonce' ),
                    'iconlist' => $this->harikamega_menu_get_icon_sets(),
                    'button'   => [
                        'text'       => esc_html__( 'ذخیره', 'harikamega-addons' ),
                        'lodingtext' => esc_html__( 'در حال ذخیره کردن …', 'harikamega-addons' ),
                        'successtext'=> esc_html__( 'تمامی داده ها ذخیره شدند', 'harikamega-addons' ),
                    ],
                ]
            );

    }

    public function harikamega_menu_get_icon_sets(){

        $icon_set = array();
        $icon_set['FontAwesome'][] = 'Pro';
           
        ob_start(); ?>
        <script type="text/javascript">
            var harikamegaIconsSet = <?php echo json_encode($icon_set); ?>;

            ( function( $ ) {
                    
                $(function() {
                    $( '.harikamegamenu-pro' ).click(function() {
                        $( "#harikamegapro-dialog" ).dialog({
                            modal: true,
                            minWidth: 500,
                            buttons: {
                                Ok: function() {
                                  $( this ).dialog( "close" );
                                }
                            }
                        });
                    });
                    $(".harikamegamenu-pro .wp-picker-container .wp-color-result,.harikamegamenu-pro input").attr("disabled", true);
                });

            } )( jQuery );
        </script>
        <?php
        $r = ob_get_clean();
        $remove = array('<script type="text/javascript">', '</script>');
        $r = str_replace($remove, '', $r);
        return $r;
    }

    public function harikamega_menu_pop_up_content(){
        require_once ( get_template_directory() . '/includes/megamenu/include/menu/templates.php' );
        //echo ob_get_clean();
    }

    /**
    * Add Inline CSS.
    */
    public function harikamega_menu_styles_inline() {

        $menu_item_color = $menu_item_hover_color = $sub_menu_width = $sub_menu_bg = $sub_menu_itemcolor = $sub_menu_itemhover_color = $mega_menu_width = $mega_menu_bg = '';

        $menuitemscolor         = harikamega_menu_get_option( 'menu_items_color', 'harikamegamenu_style_tabs' );
        $menuitemshovercolor    = harikamega_menu_get_option( 'menu_items_hover_color', 'harikamegamenu_style_tabs' );
        $submenuwidth           = harikamega_menu_get_option( 'sub_menu_width', 'harikamegamenu_style_tabs' );
        $submenubg              = harikamega_menu_get_option( 'sub_menu_bg_color', 'harikamegamenu_style_tabs' );
        $submenuitemcolor       = harikamega_menu_get_option( 'sub_menu_items_color', 'harikamegamenu_style_tabs' );
        $submenuitemhovercolor  = harikamega_menu_get_option( 'sub_menu_items_hover_color', 'harikamegamenu_style_tabs' );
        $megamenuwidth          = harikamega_menu_get_option( 'mega_menu_width', 'harikamegamenu_style_tabs' );
        $megamenubg             = harikamega_menu_get_option( 'mega_menu_bg_color', 'harikamegamenu_style_tabs' );

        if( !empty($menuitemscolor) ){
            $menu_item_color = "
                .harika-megamenu-container ul > li > a{
                    color: {$menuitemscolor};
                }
            ";
        }

        if( !empty($menuitemshovercolor) ){
            $menu_item_hover_color = "
                .harika-megamenu-container ul > li.current_page_item  > a,
                .harika-megamenu-container ul > li > a:hover{
                    color: {$menuitemshovercolor};
                }
            ";
        }

        if( !empty($submenuwidth) ){
            $sub_menu_width = "
                .harika-megamenu-container .sub-menu{
                    width: {$submenuwidth}px;
                }
            ";
        }

        if( !empty($submenubg) ){
            $sub_menu_bg = "
                .harika-megamenu-container .sub-menu{
                    background-color: {$submenubg};
                }
            ";
        }

        if( !empty($submenuitemcolor) ){
            $sub_menu_itemcolor = "
                .harika-megamenu-container .sub-menu li a{
                    color: {$submenuitemcolor};
                }
            ";
        }

        if( !empty($submenuitemhovercolor) ){
            $sub_menu_itemhover_color = "
                .harika-megamenu-container .sub-menu li a:hover{
                    color: {$submenuitemhovercolor};
                }
            ";
        }

        if( !empty($megamenuwidth) ){
            $mega_menu_width = "
                .harika-megamenu-container .harikamegamenu-content-wrapper{
                    width: {$megamenuwidth}px;
                }
            ";
        }

        if( !empty($megamenubg) ){
            $mega_menu_bg = "
                .harika-megamenu-container .harikamegamenu-content-wrapper{
                    background-color: {$megamenubg};
                }
            ";
        }

        $custom_css = "
            $menu_item_color
            $menu_item_hover_color
            $sub_menu_width
            $sub_menu_bg
            $sub_menu_itemcolor
            $sub_menu_itemhover_color
            $mega_menu_width
            $mega_menu_bg
            ";
        wp_add_inline_style( 'harika-megamenu', $custom_css );
    }


}

HARIKA_Mega_Menu_Elementor::instance();