import './scss/main.scss'

$(document).ready(function() {
    $("#content-slider").lightSlider({
        loop:true,
        keyPress:true
    });
    $('#image-gallery').lightSlider({
        gallery:true,
        item:1,
        thumbItem:6,
        slideMargin: 0,
        speed:500,
        loop:true,
        onSliderLoad: function() {
            $('#image-gallery').removeClass('cS-hidden');
        }
    });
});
var btn = document.querySelector('.town');
btn.addEventListener('click', function(){alert('hello');});

