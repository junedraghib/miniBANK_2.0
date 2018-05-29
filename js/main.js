(function($){
	"use strict";
	// Mobile Menu
	$('.mobile-menu').slicknav();

	// Main Slider
	$('.slider-contents').owlCarousel({
		loop: true,
		items: 1,
		autoplay: true
		
	});
	
	//What We Offer slider
	$('.what-we-offer-slider').owlCarousel({
		loop: true,
		items: 3,
		autoplay: true,
		center: true,
		responsive:{
				0:{
					items:1
				},
				750:{
					items:2
				},
				950:{
					items:3
				},

		},
		
	});

	// Our Team Member Slider
	$('.our-team-content-area').owlCarousel({
		loop: true,
		items: 3,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			750:{
				items:3
			}
		},			
		
	});

	// Project counting
	$('.counter').counterUp({
		delay: 10,
		time: 1000,
	});


	// Header Area position fixed
	$(window).on('scroll', function(){

		var headerHeight = $('.header-area').height();
		var screenWidth = $(window).width();

		if($(window).scrollTop() > headerHeight && screenWidth > 767) {
			$('.header-area').addClass('menufixed');
		}
		else{
			$('.header-area').removeClass('menufixed');
		}

	})

		// scroll menu hover effect 
		// Cache selectors
		var lastId,
		    topMenu = $(".mobile-menu"), // ul class/id
		    topMenuHeight = topMenu.outerHeight()+15,
		    // All list items
		    menuItems = topMenu.find("a"),
		    // Anchors corresponding to menu items
		    scrollItems = menuItems.map(function(){
		      var item = $($(this).attr("href"));
		      if (item.length) { return item; }
		    });

		// Bind click handler to menu items
		// so we can get a fancy scroll animation
		menuItems.on('click',function(e){
		  var href = $(this).attr("href"),
		      offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
		  $('html, body').stop().animate({ 
		      scrollTop: offsetTop
		  }, 300);
		  e.preventDefault();
		});

		// Bind to scroll
		$(window).on('scroll', function(){
		   // Get container scroll position
		   var fromTop = $(this).scrollTop()+topMenuHeight;
		   
		   // Get id of current scroll item
		   var cur = scrollItems.map(function(){
		     if ($(this).offset().top < fromTop)
		       return this;
		   });
		   // Get the id of the current element
		   cur = cur[cur.length-1];
		   var id = cur && cur.length ? cur[0].id : "";
		   
		   if (lastId !== id) {
		       lastId = id;
		       // Set/remove active class
		       menuItems
		         .parent().removeClass("active-menu")
		         .end().filter("[href='#"+id+"']").parent().addClass("active-menu");
		   }                   
		});
	
})(jQuery);


