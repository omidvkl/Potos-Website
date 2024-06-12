;(function($){
"use strict";


    var HARIKAMegaMenuAdmin = {

        instance: [],
        menuId: 0,
        depth: 0,

        init: function() {
            this.menuButton();

             $( document )
                 .on( 'click.HARIKAMegaMenuAdmin', '.harikamegamenu-menu-settings-save', this.saveMenuOpt )
                 .on( 'click.HARIKAMegaMenuAdmin', '.harika-megamenu-trigger', this.openPopup )
                 .on( 'click.HARIKAMegaMenuAdmin', '.harika-megamenu-popup-close', this.closePopup )
                 .on( 'click.HARIKAMegaMenuAdmin', '.harika-megamenu-popup-close-btn', this.closePopup )
                 .on( 'click.HARIKAMegaMenuAdmin', '.harika-megamenu-submit-btn', this.saveMenuData );
        },

        saveMenuOpt: function() {
            var spinner = $(this).parent().find('.spinner');
            spinner.addClass('loading');
            HARIKAMegaMenuAdmin.save_menu_options( $(this) );
        },

        save_menu_options: function( that ){
            var parent = that.parents("#HARIKA_Mega_Menu_meta_box"),
                settings = {
                    'enable_menu': ( parent.find("#harikamegamenu-menu-metabox-input-is-enabled").is(':checked') === true ) ? 'on' : 'off'
                };
                
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action          : "HARIKA_Mega_Menu_Panels_ajax_requests",
                    sub_action      : "save_menu_options",
                    settings        : settings,
                    menu_id         : $("#harikamegamenu-metabox-input-menu-id").val(),
                    nonce           : HARIKAMEGAMENU.nonce
                },
                cache: false,
                success: function(response) {
                    that.parent().find('.spinner').removeClass('loading');
                }
            });

        },
      

        menuButton: function(){
            var button = wp.template( 'harikamenubutton' );

            $( '#menu-to-edit .menu-item' ).each( function() {
                var $this = $( this ),
                    depth = HARIKAMegaMenuAdmin.getItemDepth( $this ),
                    id    = HARIKAMegaMenuAdmin.getItemId( $this );

                $this.find( '.item-title' ).append( button( {
                    id: id,
                    depth: depth,
                    label: 'HARIKA Mega Menu'
                } ) );
            });

        },

        getItemId: function( $item ) {
            var id = $item.attr( 'id' );
            return id.replace( 'menu-item-', '' );
        },

        getItemDepth: function( $item ) {
            var depthClass = $item.attr( 'class' ).match( /menu-item-depth-\d/ );
            if ( ! depthClass[0] ) {
                return 0;
            }
            return depthClass[0].replace( 'menu-item-depth-', '' );
        },

        openPopup: function() {
            var $this   = $( this ),
                id      = $this.data( 'item-id' ),
                depth   = $this.data( 'item-depth' ),
                popupid = '#harikamega-popup-' + id,
                content = null,
                wrapper = wp.template( 'harikamenupopup' );

                if ( ! HARIKAMegaMenuAdmin.instance[ id ] ) {

                $('body').append('<div class="harika-megamenu-loader"></div>');

                $.ajax({ 
                    url: ajaxurl,
                    type: 'GET',
                    dataType: 'JSON',
                    data: {
                        action          : "HARIKA_Mega_Menu_Panels_ajax_requests",
                        sub_action      : "get_menu_options",
                        menu_item_id    : id,

                    },
                    cache: false,
                    beforeSend: function(){
                        $('.harika-megamenu-loader').html('<span class="harika-megamenu-loading-close"></span><div class="harika-megamenu-loading"><div></div>');
                    },
                     success: function( response ) {

                        $( '.harika-megamenu-loader' ).hide();

                        content = wrapper( {
                            id: id,
                            depth: depth,
                            content:response.data.content,
                            templatelist:response.data.temp_list,
                        } );

                        $( 'body' ).append( content );

                        var savebtn = $(popupid).find('.harika-megamenu-submit-btn');

                        $('.harikamega-color-picker-field').wpColorPicker({
                            change: function(event, ui) {
                                savebtn.removeClass('disabled').attr('disabled', false).text( HARIKAMEGAMENU.button.text );
                            }
                        });
                        $( popupid+' .wp-picker-clear' ).on( 'click',function(){
                            savebtn.removeClass('disabled').attr('disabled', false).text( HARIKAMEGAMENU.button.text );
                        });

                        var iconfield = $( popupid ).find('.harika-megamenu-icon');
                        HARIKAMegaMenuAdmin.init_fontpicker( iconfield );
                        HARIKAMegaMenuAdmin.init_tab( '.harika-megamenu-popup-tab-menu' );

                        $( popupid +' form.harika-megamenu-data').on( 'keyup', 'input[type="text"]' , function() {
                            savebtn.removeClass('disabled').attr('disabled', false).text( HARIKAMEGAMENU.button.text );
                        });
                        $( popupid +' form.harika-megamenu-data').on( 'change', 'select.widefat' , function() {
                            savebtn.removeClass('disabled').attr('disabled', false).text( HARIKAMEGAMENU.button.text );
                        });

                        $( popupid +' form.harika-megamenu-data').on('change', 'select.harikamenu-bg-type', function() {

                            if( this.value == 'gradient' ){
                                $(popupid+' .harikamenu-gradient-field').show();
                                $(popupid+' .harikamenu-default-field').css('border-width','1px');
                            }else{
                                $(popupid+' .harikamenu-gradient-field').hide();
                                $(popupid+' .harikamenu-default-field').css('border-width','0');
                            }
                        });

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

                        $(".harikamegamenu-pro .wp-picker-container .wp-color-result,.harikamegamenu-pro input,.harikamegamenu-pro select").attr("disabled", true);

                        $(".harikamegamenu-pro .wp-picker-container").css({"z-index": "-1"});

                    },

                    complete: function( data ) {
                        $( 'body' ).removeClass('harika-megamenu-loading');
                    },

                });

                HARIKAMegaMenuAdmin.instance[ id ] = popupid;
            }

            $( HARIKAMegaMenuAdmin.instance[ id ] ).removeClass( 'harikamega-hide' );
        },

        closePopup: function( e ) {
            e.preventDefault();
            $( this ).closest( '.harika-megamenu-popup' ).addClass( 'harikamega-hide' );
        },

        saveMenuData: function(){
            var $this   = $( this ),
                id      = $this.data( 'id' );

            var $menu_form = $('#harika-megamenu-form-'+id),
            $savebtn = $menu_form.find('.harika-megamenu-submit-btn');

            $menu_form.on('submit', function( event ) {
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                        action          : "HARIKA_Mega_Menu_Panels_ajax_requests",
                        sub_action      : "save_menu_settings",
                        settings        : $menu_form.serialize(),
                        menu_item_id    : id,
                        nonce           : HARIKAMEGAMENU.nonce
                    },
                    cache: false,
                    beforeSend: function(){
                        $savebtn.text( HARIKAMEGAMENU.button.lodingtext ).addClass('updating-message');
                    },
                    success: function( response ) {
                        $savebtn.removeClass('updating-message').addClass('disabled').attr('disabled', true).text( HARIKAMEGAMENU.button.successtext );
                    },
                    complete: function( data ) {
                        $savebtn.removeClass('updating-message').addClass('disabled').attr('disabled', true).text( HARIKAMEGAMENU.button.successtext );
                    },

                });

            });

        },
       
       init_fontpicker: function( $el ){

            $el.fontIconPicker({
                source: HARIKAMEGAMENU.iconlist,
                emptyIcon: true,
                hasSearch: true,
                theme: 'fip-bootstrap'
            });

            $('.submit-add-to-menu').on('click', function(){
                $el.fontIconPicker({
                    source: HARIKAMEGAMENU.iconlist,
                    emptyIcon: true,
                    hasSearch: true,
                    theme: 'fip-bootstrap'
                });
            })

        },

        init_tab: function( menu ){
            $( menu ).on('click', 'a', function (e) {
                e.preventDefault();
                var $this = $(this),
                $target = $this.data('target'),
                $tabPane = $this.closest( menu ).siblings('.harika-megamenu-popup-tab-content').find('.harika-megamenu-popup-tab-pane[data-id='+$target+']');
                $this.addClass('active').closest('li').siblings().find('a').removeClass('active');
                $tabPane.addClass('active').siblings().removeClass('active');
            })
        },
        
    };

    HARIKAMegaMenuAdmin.init();
    
})(jQuery);