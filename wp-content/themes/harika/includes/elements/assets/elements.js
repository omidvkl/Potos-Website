


(function ($) {
    "use strict";
    

		var VideoPlayListWidget = function ($scope, $) {
            const players = Plyr.setup('video, audio');
    
            $scope.find('.harika-videoplaylist-widget .item').each(function () {
    
                var settings = $(this).data('harika-vid');

                var thumb = $('.harika-videoplaylist-widget .item.'+ settings['id']+ '');
				var present = $('.harika-videoplaylist-widget .video.'+ settings['id']+ '');
    
                thumb.click(function(j) {
					var allvideos = $(this).closest('.harika-videoplaylist-widget').find('.video');
					var allthumbs = $(this).closest('.harika-videoplaylist-widget').find('.item');
					allvideos.removeClass('active');
					allthumbs.removeClass('active');

					jQuery('.harika-videoplaylist-widget video').trigger('pause');

					present.addClass('active');
					$(this).addClass('active');

					j.preventDefault();
                });
    
    
            });
    
        };

		var StickySide = function ($scope, $) {
    
            $scope.find('.harika-sticky-side-widget').each(function () {
    
                var settings = $(this).data('harika-stickyside');
                
                var toggle = $('.harika-sticky-side-widget.'+ settings['id']+ ' ' +'.toggle');
				var back_shadow = $('.harika-sticky-side-widget.'+ settings['id']+ ' ' +'.back-shadow');
				var closebtn = $('.harika-sticky-side-widget.'+ settings['id']+ ' ' +'.closebtn');
    
                
    
                toggle.click(function(j) {
					j.preventDefault();
					jQuery('.harika-sticky-side-widget.'+ settings['id']+ '').addClass('its-open');
					jQuery("body").addClass('overflow-hidden');
                });

				back_shadow.click(function(j) {
					j.preventDefault();
					jQuery('.harika-sticky-side-widget.'+ settings['id']+ '' +'.its-open').removeClass('its-open');
					jQuery("body").removeClass('overflow-hidden');
                });

				closebtn.click(function(j) {
					j.preventDefault();
					jQuery('.harika-sticky-side-widget.'+ settings['id']+ '' +'.its-open').removeClass('its-open');
					jQuery("body").removeClass('overflow-hidden');
                });
    
    
            });
    
        };

		var SearchWidget = function ($scope, $) {
    
            $scope.find('.harika-search-widget').each(function () {
    
                var settings = $(this).data('harika-search');
                
                var toggle = $('.harika-search-widget.'+ settings['id']+ ' ' +'.toggle-search-box');
				var back_shadow = $('.harika-search-widget.'+ settings['id']+ ' ' +'.harika-search .back-shadow');
				var closebtn = $('.harika-search-widget.'+ settings['id']+ ' ' +'.harika-search .close');
    
                
    
                toggle.click(function(j) {
					j.preventDefault();
					jQuery('.harika-search-widget.'+ settings['id']+ ' ' +'.harika-search').addClass('open');
					jQuery("body").addClass('overflow-hidden');
                });

				back_shadow.click(function(j) {
					j.preventDefault();
					jQuery('.harika-search-widget.'+ settings['id']+ ' ' +'.harika-search').removeClass('open');
					jQuery("body").removeClass('overflow-hidden');
                });

				closebtn.click(function(j) {
					j.preventDefault();
					jQuery('.harika-search-widget.'+ settings['id']+ ' ' +'.harika-search').removeClass('open');
					jQuery("body").removeClass('overflow-hidden');
                });
    
    
            });
    
        };

		var ShareWidget = function ($scope, $) {
    
            $scope.find('.harika-share-widget').each(function () {
    
                var settings = $(this).data('harika-share');
                
                var open_share_box = $('.harika-share-widget.'+ settings['id']+ ' ' +'#open-share-box');
				var close_share_box = $('.harika-share-widget.'+ settings['id']+ ' ' +'#close-share-box');
				var share_box_back = $('.harika-share-widget.'+ settings['id']+ ' ' +'#share-box-back');
				var copy_text_btn = $('.harika-share-widget.'+ settings['id']+ ' ' +'.copy-text-btn');
    
                
    
                open_share_box.click(function(j) {
					j.preventDefault();
					jQuery('.harika-share-widget.'+ settings['id']+ ' ' +'#share-box').addClass('show');
					jQuery('.harika-share-widget.'+ settings['id']+ ' ' +'#share-box-back').addClass('show');
					jQuery("body").addClass('overflow-hidden');
                });
				close_share_box.click(function(j) {
					j.preventDefault();
					jQuery('.harika-share-widget.'+ settings['id']+ ' ' +'#share-box').removeClass('show');
					jQuery('.harika-share-widget.'+ settings['id']+ ' ' +'#share-box-back').removeClass('show');
					jQuery("body").removeClass('overflow-hidden');
                });
				share_box_back.click(function(j) {
					j.preventDefault();
					jQuery('.harika-share-widget.'+ settings['id']+ ' ' +'#share-box').removeClass('show');
					jQuery('.harika-share-widget.'+ settings['id']+ ' ' +'#share-box-back').removeClass('show');
					jQuery("body").removeClass('overflow-hidden');
                });
				copy_text_btn.click(function(j) {
					j.preventDefault();
					jQuery(this).parent(".copy-text").find("input").select(), document.execCommand("copy");
					jQuery('body').append("<div class='harika-message-box success'><i class='fa-regular fa-copy'></i> لینک کپی شد!</div>");
					setTimeout(function() {
				  	jQuery('.harika-message-box').remove();
					}, 4000);
                });
    
    
            });
    
        };


		

		var HARIKAnav = function ($scope, $) {
    
            $scope.find('.harika-menu-widget').each(function () {


                var settings = $(this).data('harika-nav');


				// add opened class to menu sidebar
				var toggle = $('.harika-navigation-toggle-holder.'+ settings['id']+ ' ' +'.harika-navigation-toggle');
				var dropdown = $('.harika-navigation-dropdown.'+ settings['id']+ ' ');
				var closebtn = $('.harika-navigation-dropdown.'+ settings['id']+ ' ' +'.closebtn');

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
				var a = $('.menu-ul.'+ settings['id']+ ' ' +'.menu-item a');

				$(a).click(function(){
					open(this.href,'_self');
					return false;
				});


				// add active class to main menu items
                var saction = $('.menu-ul.'+ settings['id']+ ' ' +'.menu-item');
				
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
                var subsaction = $('.menu-ul.'+ settings['id']+ ' ' +'.menu-item .sub-menu .menu-item');

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
                var twosubsaction = $('.menu-ul.'+ settings['id']+ ' ' +'.menu-item .sub-menu .menu-item .sub-menu .menu-item');

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
                var threesubsaction = $('.menu-ul.'+ settings['id']+ ' ' +'.menu-item .sub-menu .menu-item .sub-menu .menu-item .sub-menu .menu-item');

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
                var foursubsaction = $('.menu-ul.'+ settings['id']+ ' ' +'.menu-item .sub-menu .menu-item .sub-menu .menu-item .sub-menu .menu-item .sub-menu .menu-item');

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
    
        };
    
        $(window).on('elementor/frontend/init', function () {
    
            if (elementorFrontend.isEditMode()) {
				elementorFrontend.hooks.addAction('frontend/element_ready/HarikaHFMenu.default', HARIKAnav);
				elementorFrontend.hooks.addAction('frontend/element_ready/HarikaHFStickySidebar.default', StickySide);
				elementorFrontend.hooks.addAction('frontend/element_ready/HarikaHFSearch.default', SearchWidget);
				elementorFrontend.hooks.addAction('frontend/element_ready/HarikaSAShare.default', ShareWidget);
				elementorFrontend.hooks.addAction('frontend/element_ready/HarikaVideoPlayList.default', VideoPlayListWidget);
            }
            else {
				elementorFrontend.hooks.addAction('frontend/element_ready/HarikaHFMenu.default', HARIKAnav);
				elementorFrontend.hooks.addAction('frontend/element_ready/HarikaHFStickySidebar.default', StickySide);
				elementorFrontend.hooks.addAction('frontend/element_ready/HarikaHFSearch.default', SearchWidget);
				elementorFrontend.hooks.addAction('frontend/element_ready/HarikaSAShare.default', ShareWidget);
				elementorFrontend.hooks.addAction('frontend/element_ready/HarikaVideoPlayList.default', VideoPlayListWidget);
            }
        });
    
    })(jQuery);
    
    


