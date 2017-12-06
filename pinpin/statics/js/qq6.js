$(window).scroll(function(){
	var browser = navigator.userAgent;  
	if ('undefined' == typeof(document.body.style.maxHeight)) {
		var obj = $(".Amain-im");
        var offset = obj.offset();
        obj.css("top", $(document).scrollTop() + 100);
    } 
});

$(function(){
	$('#Aclose_im').bind('click',function(){
		$('#Aim_main').hide();
		$('#Aopen_im').show();
	});
	$('#Aopen_im').bind('click',function(){
		$('#Aim_main').show();
		$(this).hide();
	});
	$('.Ago-top').bind('click',function(){
		$(window).scrollTop(0);
	});
});
