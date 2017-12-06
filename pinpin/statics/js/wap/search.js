function stripquote(s) { 
    var pattern = new RegExp("[']");
    var rs = ""; 
    for (var i = 0; i < s.length; i++) { 
        rs = rs + s.substr(i, 1).replace(pattern, ''); 
    } 
    rs = rs.replace(/\s/g, "");
    return rs; 
}

function stripscript(s) { 
    var pattern = new RegExp("[`~%!#$^&*()=|{}':;,\\[\\]<>/?+-{}￥……（）——【】‘；：！”“。，、？]");
    var rs = ""; 
    for (var i = 0; i < s.length; i++) { 
        rs = rs + s.substr(i, 1).replace(pattern, ''); 
    } 
    rs = rs.replace(/\s/g, "");
    return rs; 
}

function filterquote(textbox) { 
	var s = textbox.value;
    var pattern = new RegExp("[']");
    var rs = ""; 
    for (var i = 0; i < s.length; i++) { 
        rs = rs + s.substr(i, 1).replace(pattern, ''); 
    } 
    rs = rs.replace(/\s/g, "");
	textbox.value=rs;
}

function filterscript(textbox) { 
	var s = textbox.value;
    var pattern = new RegExp("[`~%!#$^&*()=|{}':;,\\[\\]<>/?+-{}￥……（）——【】‘；：！”“。，、？]");
    var rs = ""; 
    for (var i = 0; i < s.length; i++) { 
        rs = rs + s.substr(i, 1).replace(pattern, ''); 
    } 
    rs = rs.replace(/\s/g, "");
	textbox.value=rs;
}

$(function() {
	var searchTxt = $("#formsearch input:text[name='q']").val();
	searchTxt = stripquote(searchTxt);
	$("#formsearch").submit( function() {
		var s_searchTxt = $(this).find("input:text[name='q']").val();
		s_searchTxt = stripquote(s_searchTxt);
		if (s_searchTxt == "" || s_searchTxt == searchTxt || s_searchTxt == "请输入关键字" ) {
			$(this).find("input:text[name='q']").val("请输入关键字");
			return false;
		}
		else if(s_searchTxt.length < 2){
            alert('请输入至少两个关键字');
            return false;
        }
	});
	$("#btnsearch").click( function() {
		var s_searchTxt = $("#q").val();
		s_searchTxt = stripquote(s_searchTxt);
		if (s_searchTxt == "" || s_searchTxt == searchTxt || s_searchTxt == "请输入关键字" ) {
			alert("请输入关键字");
			$("#q").val("请输入关键字");
			$("#q").focus();
			return false;
		}
		else if(s_searchTxt.length < 2){
            alert('请输入至少两个关键字');
            return false;
        }
		else {
			$("#formsearch").submit();
		}
	});
});
