function abrirWhatsApp() {
    const url = "https://chat.whatsapp.com/HvXqVxPXjB5J2mlRwec4w8";
    window.open(url, '_blank');
}



function abrirWhatsAppPublicidad() {
    const url = "https://wa.me/+5491124953030?text=Hola%20estoy%20interesado%20en%20en%20publicar%20mi%20empresa.";
    window.open(url, '_blank');
}

function abrirSpotify() {
    const url = "https://open.spotify.com/playlist/5HMGeV7r8I6ell1bxiJPBy?si=f7a05b0edfcb47d2";
    window.open(url, '_blank');
}


function link1000() {
    const url = "https://mpago.la/1EREfd9";
    window.open(url, '_blank');
}
function link3000() {
    const url = "https://mpago.la/22kn4Cx";
    window.open(url, '_blank');
}

function link5000() {
    const url = "https://mpago.la/2axwfwa";
    window.open(url, '_blank');
}
function link10000() {
    const url = "https://mpago.la/174CuRc";
    window.open(url, '_blank');
}
function link25000() {
    const url = "https://mpago.la/32yGAzM";
    window.open(url, '_blank');
}




(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Initiate the wowjs
    new WOW().init();

    //$('.botonesDePago').css('display', 'none');

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.nav-bar').addClass('sticky-top shadow-sm');
        } else {
            $('.nav-bar').removeClass('sticky-top shadow-sm');
        }
    });

    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 5,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        /*var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })*/
    });


    // Testimonial-carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        center: false,
        dots: false,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:2
            },
            1200:{
                items:2
            }
        }
    });



   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });






})(jQuery);


