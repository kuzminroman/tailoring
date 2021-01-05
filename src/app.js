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
