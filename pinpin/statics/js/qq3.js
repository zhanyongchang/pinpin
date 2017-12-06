$(window).scroll(function(){
	var browser = navigator.userAgent;  
	if ('undefined' == typeof(document.body.style.maxHeight)) {
		var obj = $(".main-im");
        var offset = obj.offset();
        obj.css("top", $(document).scrollTop() + 100);
    } 
});

$(function(){
	$('#close_im').bind('click',function(){
		$('#im_main').hide();
		$('#open_im').show();
	});
	$('#open_im').bind('click',function(){
		$('#im_main').show();
		$(this).hide();
	});
	$('.go-top').bind('click',function(){
		$(window).scrollTop(0);
	});
	$(".weixing-container").bind('mouseenter',function(){
		$('.weixing-show').show();
	})
	$(".weixing-container").bind('mouseleave',function(){        
		$('.weixing-show').hide();
	});
});