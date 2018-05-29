jQuery(document).ready(function($) {
    "use strict";
    var carousel = $(".single-testimonial-area");
    carousel.owlCarousel({
        loop : true,
        items : 5,
        margin:0,
        nav : true,
        dots : false,
        center: true,
        navText: ['<i class="fa fa-angle-double-left" aria-hidden="true"></i>','<i class="fa fa-angle-double-right" aria-hidden="true"></i>'],
        autoplay: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            750:{
                items:5
            }
        },
    });

    checkClasses();
    carousel.on('translated.owl.carousel', function(event) {
        checkClasses();
    });

    function checkClasses(){
        var total = $('.single-testimonial-area .owl-stage .owl-item.active').length;

        $('.single-testimonial-area .owl-stage .owl-item').removeClass('firstActiveItem lastActiveItem');

        $('.single-testimonial-area .owl-stage .owl-item.active').each(function(index){
            if (index === 1) {
                // this is the first one
                $(this).addClass('firstActiveItem');
            }
            if (index === total - 2 && total>1) {
                // this is the last one
                $(this).addClass('lastActiveItem');
            }
        });
    }


});