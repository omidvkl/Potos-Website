<?php
/**
 * Template library templates
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<script type="text/template" id="tmpl-harikamenubutton">
    <span class="harika-megamenu-trigger" data-item-id="{{ data.id }}" data-item-depth="{{ data.depth }}"><span class="dashicons dashicons-admin-generic"></span>مگامنو</span>
</script>
<script type="text/template" id="tmpl-harikamenupopup">
    <div class="harika-megamenu-popup" id="harikamega-popup-{{ data.id }}" data-id="{{ data.id }}" data-depth="{{ data.depth }}">
        <span class="harika-megamenu-popup-close"></span>

        <div class="harika-megamenu-popup-content">

            <span class="harika-megamenu-popup-close-btn">&#10005;</span>

            <form class="harika-megamenu-data" id="harika-megamenu-form-{{ data.id }}">

                <# 
                    if( data.depth > 0 ){
                        active = 'active';
                    }else{
                        active = '';
                    }

                    icon_string = data.content['menu-item-ficon-'+data.id];
                    icon_prefix = icon_string.substring(0,3);
                    icon_values = icon_string.replace( icon_prefix, icon_prefix+" ");

                #>

                

                <!-- Tab Menu Area Start -->
                <ul class="harika-megamenu-popup-tab-menu">
                    <# if( data.depth === 0 ){ #>
                    <li class="harika-megamenu-popup-tab-list-item">
                        <a class="active" href="javascript:void();" data-target="harika-megamenu-popup-tab-content">محتوا</a>
                    </li>
                    <li class="harika-megamenu-popup-tab-list-item">
                        <a href="javascript:void();" data-target="harika-megamenu-popup-tab-settings">تنظیمات</a>
                    </li>
                    <# } #>
                </ul>
                <!-- Tab Menu Area End -->

                <!-- Tab Menu Content Area Start -->
                <div class="harika-megamenu-popup-tab-content">
                    <# if( data.depth === 0 ){ #>

                    <!-- Settings Tab Field Area Start -->
                    <div class="harika-megamenu-popup-tab-pane" data-id="harika-megamenu-popup-tab-settings">
                        <ul>
                            <li>
                                <label for="menu-item-menuwidth-{{ data.id }}">عرض منو</label>
                                <input type="text" id="menu-item-menuwidth-{{ data.id }}" name="menu-item-menuwidth-{{ data.id }}" class="widefat" value="{{ data.content['menu-item-menuwidth-'+data.id] }}">
                            </li>

                            <li>
                                <label for="menu-item-menuposition-{{ data.id }}">موقعیت زیرمنو<br>(left , center , right)</label>
                                <input type="text" id="menu-item-menuposition-{{ data.id }}" name="menu-item-menuposition-{{ data.id }}" class="widefat" value="{{ data.content['menu-item-menuposition-'+data.id] }}">
                            </li>
                        </ul>
                    </div>
                    <!-- Settings Tab Field Area End -->   
                    <!-- Content Tab Field Area Start -->
                    <div class="harika-megamenu-popup-tab-pane active" data-id="harika-megamenu-popup-tab-content">
                        <ul>
                            <li>
                                <label for="menu-item-template-{{ data.id }}">تمپلیت منو</label>
                                <select id="menu-item-template-{{ data.id }}" class="widefat" name="menu-item-template-{{ data.id }}">
                                    <# 
                                        _.each( data.templatelist, function( tilte, key ) {

                                            menu_template = data.content['menu-item-template-'+data.id];

                                            if( key === menu_template ){
                                                #><option value="{{ key }}" selected>{{{ tilte }}}</option><#
                                            }else{
                                                #><option value="{{ key }}">{{{ tilte }}}</option><#
                                            }

                                        } );
                                    #>
                                </select>
                            </li>
                        </ul>
                    </div>
                    <!-- Content Tab Field Area End -->

                    <# } #>

                    <div class="harika-megamenu-save-btn-area">
                        <button data-id="{{ data.id }}" class="harika-megamenu-submit-btn button button-primary disabled" type="submit" disabled="disabled">تمامی داده ها ذخیره شده اند.</button>
                    </div>

                </div>
                <!-- Tab Menu Content Area End -->

            </form>

        </div>

    </div>
</script>