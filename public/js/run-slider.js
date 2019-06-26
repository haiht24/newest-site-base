var slider=$("#Glide").glide(), slider_api=slider.data("glide_api");
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        center: true,
        dots: true,
        nav: false,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        scrollPerPage: true,
        responsiveClass: true,
        dotsContainer: '.owl-pagation',
        itemElement: 'div',
        margin: 20,
        responsive:{
            0: {
                items:1,
                nav: false
            },
            320:{
                items:1,
            },
            425: {
                items:2,
            },
            768:{
                items:3,
            },
            1024:{
                items:4,
            },
            1240:{
                items:6,
            }
        }
    })
});



