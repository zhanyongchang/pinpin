﻿function showandhide(h_id,hon_class,hout_class,c_id,totalnumber,activeno) {
    var h_id,hon_id,hout_id,c_id,totalnumber,activeno;
    for (var i=1;i<=totalnumber;i++) {
        document.getElementById(c_id+i).style.display='none';
        document.getElementById(h_id+i).className=hout_class;
    }
    document.getElementById(c_id+activeno).style.display='block';
    document.getElementById(h_id+activeno).className=hon_class;
}
var tips; 
var theTop = 100;
var old = theTop;
function initFloatTips() 
{ 
	tips = document.getElementById('divQQbox');
	moveTips();
}
function moveTips()
{
 	var tt=50; 
	if (window.innerHeight) 
	{
	    pos = window.pageYOffset  
	}
	else if (document.documentElement && document.documentElement.scrollTop) {
	    pos = document.documentElement.scrollTop  
	}
	else if (document.body) {
	    pos = document.body.scrollTop;  
	}
	pos=pos-tips.offsetTop+theTop; 
	pos=tips.offsetTop+pos/10; 
	if (pos < theTop){
	    pos = theTop;
	}
	if (pos != old) { 
	    tips.style.top = pos+"px";
	    tt=10;  
	}
	old = pos;
	setTimeout(moveTips,tt);
}
initFloatTips();
if(typeof(HTMLElement)!="undefined")
{  
	 HTMLElement.prototype.contains=function (obj)  
	 {  
		 while(obj!=null&&typeof(obj.tagName)!="undefind"){
   　　     if(obj==this) return true;  
   　　　	　obj=obj.parentNode;
   　　	 }  
		 return false;  
	 }
}
function show()
{
	document.getElementById("meumid").style.display="none"
	document.getElementById("contentid").style.display="block"
}
function hideMsgBox(theEvent) {
    if (theEvent){
	    var browser=navigator.userAgent;
	    if (browser.indexOf("Firefox")>0){
	        if (document.getElementById("contentid").contains(theEvent.relatedTarget)) {
			    return
		    }
	    }
	    if (browser.indexOf("MSIE") > 0 || browser.indexOf("Presto") >= 0 || browser.indexOf("WebKit") >= 0) {
	        if (document.getElementById('contentid').contains(event.toElement)) {
		        return;
	        }
	    }
    }
    document.getElementById("meumid").style.display = "block";
    document.getElementById("contentid").style.display = "none";
}
