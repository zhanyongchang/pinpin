$(function() {
    $('.banner6 .show ul li:eq(0)').show();
    //$(".hot .list div").jCarouselLite({ btnNext: ".hot .list .next", btnPrev: ".hot .list .prev", auto: 5000, speed: 300, vertical: true, visible: 1 });
    var speed = 5000, iNum = 0;
    for (i = 0; i < $('.banner6 .show ul li').length; i++) {
        if (i == 0) { $('.tab').append('<a href=\"javascript:;\" class=\"on\">1</a>'); }
        else { $('.tab').append('<a href=\"javascript:;\">' + (i + 1) + '</a>'); }
    }
    $('.banner6 .focus a').bind('click', function() {
        var aIndex = $('.banner6 .focus a').index(this);
        $('.on').removeClass('on');
        $(this).addClass('on');
        $('.banner6 .show ul li').fadeOut().eq(aIndex).fadeIn();
        iNum = aIndex;
    })
    var autoPlay = function() {
        iNum++;
        if (iNum == $('.banner6 .show ul li').length) { iNum = 0; }
        $('.on').removeClass('on');
        $('.banner6 .focus  a').eq(iNum).addClass('on');
        $('.banner6 .show ul li').fadeOut().eq(iNum).fadeIn(1000);
    };
    var timer = setInterval(autoPlay, speed);
    $('.banner6 .show,.banner6 .focus').hover(function() { clearInterval(timer); }, function() { timer = setInterval(autoPlay, speed); });
});
$(".banner6 .close-btn").bind("click", function() {
    $(".news-show").animate({ top: 500 })
});
$(".box_btn").bind("click", function() {
    $(".news-show").animate({ top: 298 });
});