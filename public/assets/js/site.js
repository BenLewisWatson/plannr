(function($){
	// JS
	window.Site = {        
		/**
		 * PLACEHOLDER TEXT : adds place holder text as the value of an input
		 * and removes it on focus for older browsers that don't support placeholder text
		 */
		placeholdertext: function()
		{
			$('input, textarea').each(function(){
				if(!Modernizr.input.placeholder){
					var $this = $(this),
						placeholderText = this.getAttribute('placeholder'),
						initVal = ( $this.val() !== '' ) ? $this.val() : placeholderText,
						parentForm = $this.closest('form');
 
					if(placeholderText){
						$this 
							.addClass('placeholder-text')
							.val(initVal)
							.on('focus',function(){
								if(this.value == placeholderText){ 
									$this
										.val('')
										.removeClass('placeholder-text');
								}
							})
							.on('blur',function(){
								if(this.value == ''){
									$this
										.val(placeholderText)
										.addClass('placeholder-text');
								}
							});

						parentForm.on('submit', function(){
							if ($this.val() == placeholderText) {
								$this.val('');
							}
						});        
					}
				}
			});
		},
		initAnimateCSS: function() {
			$.fn.extend({
			    animateCss: function (animationName, callback) {
			        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
			        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
			            callback();
			        });
			    }
			});
		},
		initWysiwyg: function() {
			$('textarea.wysiwyg').trumbowyg({
				    btns: [
						['formatting'],
						'btnGrp-semantic',
						['link'],
						'btnGrp-justify',
						'btnGrp-lists',
						['horizontalRule'],
						['removeformat'],
				    ]
			});
		},
		inputCurrency: function() {
			$('.input-currency').on('input change', function() {
			    this.value = this.value.replace(/[^0-9\.]/g,''); 
			});

			jQuery.validator.addMethod("currency", function(value, element) {
			  	return this.optional(element) ||  /(?=.)^\$?(([1-9][0-9]{0,2}(,[0-9]{3})*)|[0-9]+)?(\.[0-9]{1,2})?$/.test(value);
			}, "Please enter a valid amount");
			
		},
		stickyHeader: function() {
			$("#header").sticky({topSpacing:0});
		},
		headerSearch: function() {
			$(".header_search").searchable({ search: {url: '/api/search/client/'}});
		},
		mobileMenu: function() {
			var subMenuActive = false;
			// Open menu
			function openMenu() {
				if ($('.mobile-menu').is(':visible') == false) {
					$('.mobile-menu').fadeIn().css('display', 'table').addClass('mobile-menu-active');
					$('.mobile_mobileMenuToggle').removeClass('mobile_mobileMenuToggle-clicked');
					$('html, body').css({
						'margin': 0,
						'height': '100%',
						'overflow': 'hidden'
					});
				}
			}
			// Close menu
			function closeMenu() {
			  $('.mobile-menu').fadeOut(800).removeClass('mobile-menu-active');
				$('.mobile_mobileMenuToggle').addClass('mobile_mobileMenuToggle-clicked');
				$('html, body').css({
					'margin': '',
					'height': '',
					'overflow': ''
				});  
			}
			// Close submenu
			function closeSubmenu() {
				$('.mobile-menu .header_nav > li').removeAttr('style');
				$('.mobile-menu .header_nav > li ul').slideUp().removeClass('animated bounceInUp submenu-active');
				subMenuActive = false;
			}
			// Open menu button
			$(".header_mobileMenuToggle").click(function() {
				openMenu();
			});

			// Close menu button
			$('.mobile_mobileMenuToggle').click(function() {
				closeMenu();
			});

			// Submenu open handler
			$('.mobile-menu .header_nav li.menu-item-has-children').click(function(e) {
				if (subMenuActive == false) {
					e.preventDefault();
					$('.mobile-menu .header_nav > li').not($(this)).slideUp();
					$(this).find('ul').addClass('animated bounceInUp submenu-active').show();
					subMenuActive = true;
				}
			});

			// Submenu and menu close handler
			$('.mobile-menu').click(function(e) {
				if (!$(e.target).is('.mobile-menu a')) {
					if (subMenuActive) {
						closeSubmenu();
					}
					else {
						closeMenu();
					}
				}
			});

			$(window).resize(function() {
				if ($(document).width() >= 768) {
					closeMenu();   
				}
			});
		},
		tabs: function() { 
			$('.tabs .tab_select-btn').click(function(e) {
				e.preventDefault();
				var tabBtn = $(this);
				var tab = $('.tab[data-tab-id="'+$(this).data('tab-id')+'"]');
				if(!tab.is(':visible')) {
					if (!tab.is(':animated')) {
						$('.tab').not(tab).fadeOut(750);
						tab.slideDown(750);
						$('.tab.tab-active').not(tab).removeClass('tab-active');
						$('.tab_select-btn.tab_select-btn-active').not(tabBtn).removeClass('tab_select-btn-active');
						tab.addClass('tab-active');
						tabBtn.addClass('tab_select-btn-active');
					}
				}
			})
		},
		parallaxBanner: function() {
			$(window).on("load", function() {
				var height = $(".page_banner img").height();
				$(".page_banner").css("height", height);
			});

			$(window ).resize(function() {
				var height = $(".page_banner img").height();
				$(".page_banner").css("height", height);
				console.log('Funct');
			});
		},
		homePageNewsSlider: function() {
			$('.homePageNews').slick({
				infinite: true,
				centerMode: true,
				touchThreshold: 300,
				slidesToShow: 5,
				swipeToSlide: true,
				nextArrow: '.homePageNews_arrow-left',
				prevArrow: '.homePageNews_arrow-right',
				responsive: [{
					breakpoint: 460,
					settings: {
						arrows: false,
						slidesToShow: 1,
						centerPadding: '10px'
					}
				}]
			});
		},
		initSelectboxIt: function() {
			$("select").selectBoxIt();
		},
		contactAddressInputSelect: function() {
			$('.btn-address-select').click(function(e) {
				if (!$(this).hasClass('btn-disabled')) {
					e.preventDefault();
					if ($(this).hasClass('btn-address-select-map') && !$('#map').is(':visible')) {
						if(navigator.geolocation) {
							console.log("Finding Location.");
							navigator.geolocation.getCurrentPosition(function(position) {
							  initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
							  map.setCenter(initialLocation);
							});
						}
					}
					$('.form-group_address .form-group_controls').slideUp();
					$('.form-group_address .form-group_controls#'+$(this).data("reveal")).slideDown();					
					google.maps.event.trigger(map,'resize');
				}
			});
		},
		contactBoxExpand: function() {
			$('.form-group_title').click(function() {
				var row = $(this).next('.form-group_controls');
				$(row).stop().slideToggle();
			});

			$('.btn-form-group-next').click(function() {
				$(this).hide();
				var thisForm = $(this).closest('.form-group');
				var nextForm = $(this).closest('.form-group').next('.form-group');
				$(thisForm).find('.form-group_controls').slideUp();
				$(nextForm).find('.form-group_controls').show();
				$(nextForm).slideDown();
			});
		},
		addNewClient: function() {
			$('.btn-add-client').click(function() {
				$('.clients').find('.client').fadeIn();
			});
		},
		btnToggle: function() {
			// Hides element with id specified using data-show-id atribute
			var btnToggle;
			$('.btn-toggle').click(function(e) {
				e.preventDefault();
				if (btnToggle != null) {
					btnToggle.slideUp();
				}
				if ($(this).data('show-id') != "") {
					btnToggle = $("#"+$(this).data('show-id')).slideToggle();
				}
			});
		},
		validatorPostcodeMethod: function() {
			// UK Postcode
			jQuery.validator.addMethod("postcode", function(value, element) {
			  	return this.optional(element) ||  /^([a-zA-Z]){1}([0-9][0-9]|[0-9]|[a-zA-Z][0-9][a-zA-Z]|[a-zA-Z][0-9][0-9]|[a-zA-Z][0-9]){1}([ ])([0-9][a-zA-z][a-zA-z]){1}$/.test(value);
			}, "Please enter a valid uk postcode");

			// UK Phone Number
			// jQuery.validator.addMethod("postcode", function(value, element) {
			// 	// var regex = [A-PR-UWYZa-pr-uwyz0-9][A-HK-Ya-hk-y0-9][AEHMNPRTVXYaehmnprtvxy0-9]?[ABEHMNPRVWXYabehmnprvwxy0-9]?{1,2}[0-9][ABD-HJLN-UW-Zabd-hjln-uw-z]{2}|(GIRgir){3} 0(Aa){2})$/g;
			//   	return this.optional(element) ||  /^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/.test(value);
			// }, "Please enter a valid phone number");
		}
	}
	// Run
	$(function(){
		Site.headerSearch();
		Site.tabs();
		Site.initAnimateCSS();
		Site.initWysiwyg();
		Site.inputCurrency();
		Site.btnToggle();
	});
}(jQuery));