jQuery(document).ready(function($) {

    // PopUp button
    jQuery('body').on('click', 'a.wltemplateimp', function(e) {
        e.preventDefault();

        var $this = $(this),
            template_opt = $this.data('templpateopt');

        $('.harikatemplate-edit').html('');
        $('#harikapagetitle').val('');
        $(".harikapopupcontent").show();
        $(".harikamessage").hide();
        $(".harikamessage p").html( template_opt.message );

        // dialog header
        $("#harikatemplate-popup-area").attr( "title", template_opt.templpattitle );

        var harikabtnMarkuplibrary = `<a href="#" class="wlimpbtn" data-templateid="${template_opt.templpateid}">${template_opt.harikabtnlibrary}</a>`;
        var harikabtnMarkuppage = `<a href="#" class="wlimpbtn harikadisabled" data-templateid="${template_opt.templpateid}">${template_opt.harikabtnpage}</a>`;

        // Enter page title then enable button
        $('#harikapagetitle').on('input', function () {
            if( !$('#harikapagetitle').val() == '' ){
                $(".harikaimport-button-dynamic-page .wlimpbtn").removeClass('harikadisabled');
            } else {
                $(".harikaimport-button-dynamic-page .wlimpbtn").addClass('harikadisabled');
            }
        });
        
        // button Dynamic content
        $( ".harikaimport-button-dynamic" ).html( harikabtnMarkuplibrary );
        $( ".harikaimport-button-dynamic-page" ).html( harikabtnMarkuppage );
        $( ".ui-dialog-title" ).html( template_opt.templpattitle );

        // call dialog
        $( "#harikatemplate-popup-area" ).dialog({
            modal: true,
            minWidth: 500,
            minHeight:300,
            buttons: {
                Close: function() {
                  $( this ).dialog( "close" );
                }
            }
        });


    });

    // Preview PopUp
    jQuery('body').on('click', 'a.wlpreview', function(e) {
        e.preventDefault();

        var $this = $(this),
            preview_opt = $this.data('preview');

         // dialog header
        var previimage = `<img src="${preview_opt}" alt="" style="width:100%;"/>`;
        $( "#harikatemplate-popup-prev" ).html( previimage );

        $( "#harikatemplate-popup-prev" ).dialog({
            modal: true,
            width: 'auto',
            minHeight:300,
            buttons: {
                Close: function() {
                  $( this ).dialog( "close" );
                }
            }
        });


    });

    // Import data request
    jQuery('body').on('click', 'a.wlimpbtn', function(e) {
        e.preventDefault();

        var $this = $(this),
            pagetitle = ( $('#harikapagetitle').val() ) ? ( $('#harikapagetitle').val() ) : '',
            templpateid = $this.data('templateid');
        $.ajax({
            url: ajaxurl,
            data: {
                'action': 'harikamegamenu_ajax_request',
                'harikatemplateid' : templpateid,
                'pagetitle' : pagetitle,
            },
            dataType: 'JSON',
            beforeSend: function(){
                $(".harikaspinner").addClass('loading');
                $(".harikapopupcontent").hide();
            },
            success:function(data) {
                console.log( templpateid );
                $(".harikamessage").show();
                var tmediturl = HARIKAMENUTM.adminURL+"/post.php?post="+ data.id +"&action=elementor";
                $('.harikatemplate-edit').html('<a href="'+ tmediturl +'" target="_blank">'+ data.edittxt +'</a>');
            },
            complete:function(data){
                $(".harikaspinner").removeClass('loading');
                $(".harikamessage").css( "display","block" );
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });

    });
    
});