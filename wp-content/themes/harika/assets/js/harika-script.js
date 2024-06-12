//Dark Mode Code
jQuery(function($){
	$(document).ready(function(){

		// Set Cookie function
		function harikadarkSetCookie(c_name,value,exdays) {
			var exdate=new Date();
			exdate.setDate(exdate.getDate() + exdays);
			var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
			document.cookie=c_name + "=" + c_value+"; path=/";
		}

		// Get Cookie function
		function harikadarkGetCookie(c_name) {
			var c_value = document.cookie;
			var c_start = c_value.indexOf(" " + c_name + "=");
			if (c_start == -1) {
			    c_start = c_value.indexOf(c_name + "=");
			}
			if (c_start == -1) {
			    c_value = null;
			}
			else {
			  	c_start = c_value.indexOf("=", c_start) + 1;
			  	var c_end = c_value.indexOf(";", c_start);
			  	if (c_end == -1) {
					c_end = c_value.length;
				}
				c_value = unescape(c_value.substring(c_start,c_end));
			}
			return c_value;
		}

        var input = $('.harika-darkmode-widget .input');
		var switcher = $('.harika-darkmode-widget .switcher');
        var body = $('body');


        

        if ($('body').hasClass('default_dark_skin')) {
            harikadarkSetCookie('night_mode','1');
            $('body').addClass('dark_mode');
            console.log('night mode is on');
        }

		// Toggle Night Mode
		$(document).on('click','.harika-darkmode-widget .switcher',function(){

            jQuery('.harika-darkmode-widget .switcher').toggleClass('dark-now');
			if (input.is(':checked')) {
				harikadarkSetCookie('night_mode','1');
				$('body').addClass('dark_mode');
			    console.log('night mode is on');

			} else {
				harikadarkSetCookie('night_mode','0');
				$('body').removeClass('dark_mode');
			    console.log('night mode is off');
			}
		})

	});
});


































const players = Plyr.setup('video, audio');

jQuery( function () { 
    jQuery('.reply .comment-reply-link').on('click', function(event) { 
        event.preventDefault(); 
        jQuery('section.comments-area .comments-form').addClass('display-none');
    }); 
    jQuery('.comment-respond h2 a').on('click', function(event) { 
        event.preventDefault(); 
        jQuery('section.comments-area .comments-form').removeClass('display-none');
    }); 
});

jQuery( function () { 
    jQuery('#open-share-box.default').on('click', function(event) { 
        event.preventDefault(); 
        jQuery('#share-box.default').addClass('show');
        jQuery('#share-box-back.default').addClass('show');
        jQuery("body").addClass('overflow-hidden');
    }); 
    jQuery('#close-share-box.default').on('click', function(event) { 
        event.preventDefault(); 
        jQuery('#share-box.default').removeClass('show');
        jQuery('#share-box-back.default').removeClass('show');
        jQuery("body").removeClass('overflow-hidden');

    }); 
    jQuery('#share-box-back.default').on('click', function(event) { 
        event.preventDefault(); 
        jQuery('#share-box.default').removeClass('show');
        jQuery('#share-box-back.default').removeClass('show');
        jQuery("body").removeClass('overflow-hidden');

    }); 

});
jQuery( function () { 
    jQuery(document).on("click", ".copy-text-btn", function () {
        jQuery(this).parent(".copy-text").find("input").select(), document.execCommand("copy");
        jQuery('body').append("<div class='harika-message-box success'><i class='fa-regular fa-copy'></i> لینک کپی شد!</div>");
        setTimeout(function() {
          jQuery('.harika-message-box').remove();
        }, 4000);
    })
});

jQuery( function () { 
    jQuery(document).on("mouseover", ".harika-navigation ul.menu li.harikamega_mega_menu .harikamegamenu-content-wrapper.sub-menu", function () {
        jQuery('.harika-shadow-box').addClass('show');
    })
    jQuery(document).on("mouseover", ".harika-shadow-box", function () {
        jQuery('.harika-shadow-box').removeClass('show');
    })
});















    jQuery( document ).ready( function( $ ) {
        
        var settings = $( '.harika-menu-default' ).data('harika-nav');


        // add opened class to menu sidebar
        var toggle = $('.harika-navigation-toggle-holder.n-1111111 .harika-navigation-toggle');
        var dropdown = $('.harika-navigation-dropdown.n-1111111');
        var closebtn = $('.harika-navigation-dropdown.n-1111111 .closebtn');

        closebtn.click(function(j) {

            $(dropdown).removeClass('opened');
            $(dropdown).addClass('closed');
            $(toggle).removeClass('show');
            $(toggle).addClass('none');

            j.preventDefault();
        });
        
        toggle.click(function(j) {
            
            
            if ($(dropdown).hasClass('opened')) {
                $(dropdown).removeClass('opened');
                $(dropdown).addClass('closed');

            } else {
                $(dropdown).removeClass('closed');
                $(dropdown).addClass('opened');
            }

            if ($(this).hasClass('show')) {
                $(this).removeClass('show');
                $(this).addClass('none');

            } else {
                $(this).removeClass('none');
                $(this).addClass('show');
            }

            j.preventDefault();
        });

        

        // open a link
        var a = $('.menu-ul.n-1111111 .menu-item a');

        $(a).click(function(){
            open(this.href,'_self');
            return false;
        });


        // add active class to main menu items
        var saction = $('.menu-ul.n-1111111 .menu-item');
        
        saction.click(function(j) {
            
            
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).closest('.menu-ul').find('.menu-item.active').removeClass('active');
                $(this).addClass('active');
            }

            j.preventDefault();
        });


        // add active class to sub-menu items
        var subsaction = $('.menu-ul.n-1111111 .menu-item .sub-menu .menu-item');

        subsaction.click(function(j) {
            
            if ($(this).hasClass('sub-active')) {
                $(this).removeClass('sub-active');
            } else {
                $(this).closest('.menu-ul').find('.menu-item.sub-active').removeClass('sub-active');
                $(this).addClass('sub-active');
            }

            j.preventDefault();
        });


        // add active class to two-sub-menu items
        var twosubsaction = $('.menu-ul.n-1111111 .menu-item .sub-menu .menu-item .sub-menu .menu-item');

        twosubsaction.click(function(j) {
            
            if ($(this).hasClass('two-sub-active')) {
                $(this).removeClass('two-sub-active');
            } else {
                $(this).closest('.menu-ul').find('.menu-item.two-sub-active').removeClass('two-sub-active');
                $(this).addClass('two-sub-active');
            }

            j.preventDefault();
        });


        // add active class to three-sub-menu items
        var threesubsaction = $('.menu-ul.n-1111111 .menu-item .sub-menu .menu-item .sub-menu .menu-item .sub-menu .menu-item');

        threesubsaction.click(function(j) {
            
            if ($(this).hasClass('three-sub-active')) {
                $(this).removeClass('three-sub-active');
            } else {
                $(this).closest('.menu-ul').find('.menu-item.three-sub-active').removeClass('three-sub-active');
                $(this).addClass('three-sub-active');
            }

            j.preventDefault();
        });

        // add active class to four-sub-menu items
        var foursubsaction = $('.menu-ul.n-1111111 .menu-item .sub-menu .menu-item .sub-menu .menu-item .sub-menu .menu-item .sub-menu .menu-item');

        foursubsaction.click(function(j) {
            
            if ($(this).hasClass('four-sub-active')) {
                $(this).removeClass('four-sub-active');
            } else {
                $(this).closest('.menu-ul').find('.menu-item.four-sub-active').removeClass('four-sub-active');
                $(this).addClass('four-sub-active');
            }

            j.preventDefault();
        });





    });








