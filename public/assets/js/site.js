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
		stickyHeader: function() {
			$("#header").sticky({topSpacing:0});
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
		contactComboBox: function() {
			  $("select").selectBoxIt();
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
		contactValidator: function() {
			$('#contact-form').validate({
				rules: {
					first_name: {
						required: true,
						maxlength: 50
					},
					surname: {
						required: true,
						// email:true
					},
					title: {
						required: true,
						// phoneUK: true,
						// minlength: 10
					},
					partner: {
						required: true
					},
					address_1: {
						required: true,
						// minlength: 20
					}            
				},
				messages: {
					enquiry_tel: {
						phoneUK: ' is not a valid number'
					} 
				}
			});
		}
	}
	// Run
	$(function(){
		// Site.placeholdertext(); 
		Site.contactComboBox(); 
		// Site.contactBoxExpand(); 
		Site.contactValidator(); 
		// Site.stickyHeader(); 
		// Site.mobileMenu(); 
		// Site.parallaxBanner(); 
		// Site.homePageNewsSlider();
	});
}(jQuery));