$(document).ready(function() {
    $("#txtKeywords").keypress(function(event) {
        if (event.keyCode == 13) {
            CheckInput();
        }
    });
});

if (top.location != self.location) {
    top.location = self.location;
}

//function Click(){ 
//    alert('欢迎您！'); 
//    window.event.returnValue=false; 
//} 
//document.oncontextmenu=Click;

//禁止鼠标右键
//document.oncontextmenu=new Function("event.returnValue=false"); 
//document.onselectstart=new Function("event.returnValue=false"); 
//document.oncontextmenu=function(e){            
//	return false;       
//}

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

//更换显示样式
function setTab(name, cursel, n) {
    for (i = 1; i <= n; i++) {
        var menu = document.getElementById(name + i);
        var con = document.getElementById("con_" + name + "_" + i);
        menu.className = i == cursel ? "hover" : "";
        con.style.display = i == cursel ? "block" : "none";
    }
}

//字体大小转换
function doZoom(size) {
    document.getElementById('zoom').style.fontSize = size + 'px';
}

function $g(elmId) {
	
    return document.getElementById(elmId); 
}

function $j(elmId) {
    return $("#" + elmId); 
}

function doc(obj) {
    return document.getElementById(obj);
}

function resize(h) {
    doc("sendinquirybox").style.height = h;
}

function checkLogin() {
    var name = document.getElementById("txtLoginName").value;
    var pass = document.getElementById("txtPassword").value;
    var reg = /\s/g;
    name = name.replace(reg, "");
    if (name == "") {
        alert("请输入登录名！");
        document.getElementById("txtLoginName").focus();
        return false;
    }
    else if (pass == "") {
        alert("请输入密码！");
        document.getElementById("txtPassword").focus();
        return false;
    }
    else {
        return true;
    }
}

function checkLoginEn() {
    var name = document.getElementById("txtLoginName").value;
    var pass = document.getElementById("txtPassword").value;
    var reg = /\s/g;
    name = name.replace(reg, "");
    if (name == "") {
        alert("Please enter the login name");
        document.getElementById("txtLoginName").focus();
        return false;
    }
    else if (pass == "") {
        alert("Please enter the password");
        document.getElementById("txtPassword").focus();
        return false;
    }
    else {
        return true;
    }
}

function checkSearch() {
    var key = document.getElementById("q").value;
	key = stripquote(key);
    if (key == "" || key == "请输入关键字") {
        alert("请输入关键字");
        document.getElementById("q").focus();
        return false;
    }
	else if(key.length < 2){
        alert('请输入至少两个关键字');
		document.getElementById("q").focus();
        return false;
    }
    else {
        document.formSearch.submit();
    }
}

function CheckInput() {
    var key = document.getElementById("q").value;
	key = stripquote(key);
    if (key == "" || key == "请输入关键字") {
        alert("请输入关键字");
        return false;
    }
	else if(key.length < 2){
        alert('请输入至少两个关键字');
        return false;
    }
    else {
        return true;
    }
}

function showInfo(name, enty, count) {
    for (i = 1; i <= count; i++) {
        var tabnew = document.getElementById(name + i);
        var newcontent = document.getElementById(name + "_" + i);
        tabnew.className = i == enty ? "tabon" : "taboff";
        newcontent.style.display = i == enty ? "block" : "none";
    }
}

function showInfo1(name, enty, count) {
    for (i = 1; i <= count; i++) {
        var tabnew = document.getElementById(name + i);
        var newcontent = document.getElementById(name + "_" + i);
        tabnew.className = i == enty ? "pctabon" : "pctaboff";
        newcontent.style.display = i == enty ? "block" : "none";
    }
}

function AddFav() {   //加入收藏  
    var ua = navigator.userAgent.toLowerCase();
    var sURL = document.URL;
    var sTitle = document.title;
    if (ua.indexOf("msie 8") > -1) {
        external.AddToFavoritesBar(sURL, sTitle, '');  
    }
    else {
        try {
            window.external.addFavorite(sURL, sTitle);
        }
        catch (e) {
            try {
                window.sidebar.addPanel(sTitle, sURL, "");
            }
            catch (e) {
                alert("加入收藏失败，请使用Ctrl+D进行添加");
            }
        }
    }
    return false;
}

function AddFavEn() {   //加入收藏，英文版
    var ua = navigator.userAgent.toLowerCase();
    var sURL = document.URL;
    var sTitle = document.title;
    if (ua.indexOf("msie 8") > -1) {
        external.AddToFavoritesBar(sURL, sTitle, '');  
    }
    else {
        try {
            window.external.addFavorite(sURL, sTitle);
        }
        catch (e) {
            try {
                window.sidebar.addPanel(sTitle, sURL, "");
            }
            catch (e) {
                alert("Favorite failed, press Ctrl + D to add");
            }
        }
    }
    return false;
}

function SetHome(obj) {    //设为首页  
    try {
        obj.style.behavior = 'url(#default#homepage)';
        obj.setHomePage(window.location.href);
    } catch (e) {
        if (window.netscape) {
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }
            catch (e) {
                alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
            }
        }
        else {
            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将该网站设置为首页。");
        }
    }
}

function SetHomeEn(obj) {    //设为首页，英文版 
    try {
        obj.style.behavior = 'url(#default#homepage)';
        obj.setHomePage(window.location.href);
    } catch (e) {
        if (window.netscape) {
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }
            catch (e) {
                alert("Sorry, refused to operate\n\nPlease enter 'about:config' in url and press enter, and then set [signed.applets.codebase_principal_support] to 'true'");
            }
        }
        else {
            alert("Sorry, refused to operate\n\nYou need to manually this website be set to home");
        }
    }
}

function closeWindow() {
    if (window.netscape) {
        try {
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
        }
        catch (e) {
            alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'dom.allow_scripts_to_close_windows'设置为'true'");
            return;
        }
    }
    window.opener = null;
    window.open('', '_parent', '');
    window.close();
}

function SetCookie(name, value) {
    var Days = 30;             //此cookie将被保存30天
    var exp = new Date();      //new Date("December 31, 9998");
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
}

function setCookie(c_name, value, expiredays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + expiredays);
    document.cookie = c_name + "=" + escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString());
}

function getCookie(name) {
    var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
    if (arr != null)
        return unescape(arr[2]);
    return null;
}

function GetCookie(cookie_name) {
    var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');
    if (results)
        return (unescape(results[2]));
    else
        return null;
}

function GetCookie(cookie_name, key) {
    var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');
    if (results)
        return ((results[2]));
    else
        return null;
}

function delCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = getCookie(name);
    if (cval != null) document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}

function IsDigit() {
    return ((event.keyCode >= 48) && (event.keyCode <= 57));
}
