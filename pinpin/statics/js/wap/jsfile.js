if (top.location != self.location) {
    top.location = self.location;
}

function strlen(str) {
    var len;
    var i;
    len = 0;
    for (i = 0; i < str.length; i++) {
        if (str.charCodeAt(i) > 255) len += 2; else len++;
    }
    return len;
}

function stripquote(s) {
    var pattern = new RegExp("[']");
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

function SendMessWap() {
    var reg1 = /^1\d{10}$/;
    var ip = "";
    var address = "";
    if (document.getElementById("txtMsgTitle").value == "") {
        alert("请输入留言主题");
        document.getElementById("txtMsgTitle").focus();
        return false;
    }
    else if (document.getElementById("txtMobile").value == "") {
        alert("请输入手机号码");
        document.getElementById("txtMobile").focus();
        return false;
    }
    else if (!reg1.test(document.getElementById("txtMobile").value)) {
        alert("手机号码格式不正确");
        document.getElementById("txtMobile").focus();
        document.getElementById("txtMobile").select();
        return false;
    }
    else if (document.getElementById("txtContent").value == "") {
        alert("请输入留言内容");
        document.getElementById("txtContent").focus();
        return false;
    }
    else if (strlen(document.getElementById("txtContent").value) > 300) {
        alert("最多不超过300个字符");
        document.getElementById("txtContent").focus();
        return false;
    }
    else if (document.getElementById("ChkCode").value == "") {
        alert("请输入验证码");
        document.getElementById("ChkCode").focus();
        return false;
    }
}
