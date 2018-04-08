$(document).ready(function(){


    $('.slide_block').slick({
        autoplay: true,
        autoplaySpeed: 4000,
        dots:true,
        arrows: false
    });




    $('.pop_list').slick({
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        pauseOnHover: true,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {

                }
            }
        ]

    });

    $('.slide_rest_one').slick({
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: true,
        dots:true,
    });

});