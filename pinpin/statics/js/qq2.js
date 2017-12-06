var tips; var theTop = 100;   /*这是默认高度,越大越往下*/
var old = theTop;
function initFloatTips() {
    tips = document.getElementById('divQQbox');
    moveTips();
};

function moveTips() {
    var tt = 50;
    if (window.innerHeight) {
        pos = window.pageYOffset;
    }
    else if (document.documentElement && document.documentElement.scrollTop) {
        pos = document.documentElement.scrollTop;
    }
    else if (document.body) {
        pos = document.body.scrollTop;
    }
    pos = pos - tips.offsetTop + theTop;
    pos = tips.offsetTop + pos / 10;    //滑动速度 数字越大滑动越慢
    if (pos < theTop) pos = theTop;
    if (pos != old) {
        tips.style.top = pos + "px";
        tt = 10;
        //alert(tips.style.top);
    }
    old = pos;
    setTimeout(moveTips, tt);
}

initFloatTips();
function OnlineOver() {
    document.getElementById("divOnline").style.display = "block";
    document.getElementById("divQQbox").style.width = "145px";
}

function OnlineOut() {
    document.getElementById("divOnline").style.display = "none";
}
function CloseQQ() {
    document.getElementById("divOnline").style.display = "none";
    return true;
}
function hideMsgBox(theEvent) {      //theEvent用来传入事件，Firefox的方式
    if (theEvent) {
        var browser = navigator.userAgent;     //取得浏览器属性
        if (browser.indexOf("Firefox") > 0) {   //如果是Firefox
            if (document.getElementById('divOnline').contains(theEvent.relatedTarget)) {   //如果是子元素
                return;
            }
        }
        if (browser.indexOf("MSIE") > 0) {   //如果是IE
            if (document.getElementById('divOnline').contains(event.toElement)) {   //如果是子元素
                return;
            }
        }
    }
    /*要执行的操作*/
    document.getElementById("divOnline").style.display = "none";
}