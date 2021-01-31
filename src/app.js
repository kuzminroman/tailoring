import './scss/main.scss'

$(document).ready(function() {
    $("#content-slider").lightSlider({
        loop:true,
        keyPress:true
    });
    $('#image-gallery').lightSlider({
        gallery:true,
        item: 1,
        thumbItem: 6,
        slideMargin: 0,
        speed: 500,
        loop: true,
        onSliderLoad: function () {
            $('#image-gallery').removeClass('cS-hidden');
        }
    });

    $('#content-slider-photoshoot').lightSlider({
        keyPress:true,
        item: 5,
       // thumbItem: 4,
     //   slideMargin: 0,
        speed: 500,
        loop: true,
        onSliderLoad: function () {
            $('#image-gallery').removeClass('cS-hidden');
        }
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    var favorite = document.querySelector('.object-page__header__right-block__title__favorite');

// favorite.addEventListener('mouseover', function () {
//     this.classList.add('in-favorite');
// });
//
// favorite.addEventListener('mouseout', function () {
//     this.classList.remove('in-favorite');
// });

    if (favorite) {
        favorite.addEventListener('click', function () {
            this.classList.toggle('in-favorite');
        });
    }

    $(".show_more").click(function () {
        $(".all-reports").toggle();
        $(".show_more").toggle();
        $(".hide_reports").toggle();
    });

    $(".hide_reports__button").click(function () {
        $(".all-reports").toggle();
        $(".hide_reports").toggle();
        $(".show_more").toggle();
    });


    $(".fancybox").fancybox({
        prevEffect	: 'none',
        nextEffect	: 'none',
        helpers	: {
            title	: {
                type: 'outside'
            },
            thumbs	: {
                width	: 50,
                height	: 50
            }
        }
    });


   let h_slider_options =  {
        gallery: true,
        item: 1,
        loop:true,
        slideMargin: 0,
        thumbItem: 6,
        galleryMargin: 10,
        thumbMargin: 10,
    };

   let v_slider_options = {
        gallery: true,
        item: 1,
        loop:true,
        slideMargin: 0,
        thumbItem: 6,
        galleryMargin: 10,
        thumbMargin: 10,
        vertical: true
    };

    var h_slider = $('#lightSlider').lightSlider(h_slider_options);
    var v_slider = $('#lightSliderVertical').lightSlider(v_slider_options);

    /* Fancybox & lightSlider Sync - Bug Fix */
    var selector = '#lightSlider li:not(".clone") a';
    selector += ',#lightSliderVertical li:not(".clone") a';

    $().fancybox({
        selector : selector,
        backFocus : false, //The most important options for sync bug fix
        buttons : [
            'slideShow',
            'share',
            'zoom',
            'fullScreen',
            'thumbs',
            'download',
            'close'
        ]
    });

});


$( window ).resize(function() {
    slider.destroy();
    h_slider = $('#ocassions-slider').lightSlider(h_slider_options);
});
