function PCMSAD(PID) {
  this.ID        = PID;
  this.PosID  = 0; 
  this.ADID		  = 0;
  this.ADType	  = "";
  this.ADName	  = "";
  this.ADContent = "";
  this.PaddingLeft = 0;
  this.PaddingTop  = 0;
  this.Width = 0;
  this.Height = 0;
  this.IsHitCount = "Y";
  this.Scroll = "N";
  this.Align  = "N";
  this.UploadFilePath = "";
  this.URL = "";
  this.SiteID = 0;
  this.ShowAD  = showADContent;
  this.Stat = statAD;
}

function statAD() {
	var new_element = document.createElement("script"); 
	new_element.type = "text/javascript";
	new_element.src="/index.php?m=poster&c=index&a=show&siteid="+this.SiteID+"&id="+this.ADID+"&spaceid="+this.PosID;
	document.body.appendChild(new_element);
}

var delta=0.08

function showADContent() {
  var content = this.ADContent;
  var str = "<div id='PCMSAD_"+this.PosID+"' style='left:"+this.PaddingLeft+"px;top:"+this.PaddingTop+"px;width:"+this.Width+"px; height:"+this.Height+"px; position: absolute;visibility: visible;z-index:999998;'>";
  var AD = eval('('+content+')');
  if (this.ADType == "images") {
	  if (AD.Images[0].imgADLinkUrl) str += "<a href='"+this.URL+"?m=poster&c=index&a=poster_click&siteid="+this.SiteID+"&id="+this.ADID+"&url="+AD.Images[0].imgADLinkUrl+"' target='_blank'>";
	  str += "<img title='"+AD.Images[0].imgADAlt+"' src='"+this.UploadFilePath+AD.Images[0].ImgPath+"' width='"+this.Width+"' height='"+this.Height+"' style='border:0px;'>";
	  if (AD.Images[0].imgADLinkUrl) str += "</a>";
  }else if(this.ADType == "flash"){
	  str += "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width='"+this.Width+"' height='"+this.Height+"' id='FlashAD_"+this.PosID+"' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0'>";
	  str += "<param name='movie' value='"+this.UploadFilePath+AD.Images[0].ImgPath+"' />"; 
      str += "<param name='quality' value='autohigh' />";
      str += "<param name='wmode' value='opaque'/>";
	  str += "<embed wmode='opaque' src='"+this.UploadFilePath+AD.Images[0].ImgPath+"' quality='autohigh' name='flashad' swliveconnect='TRUE' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='"+this.Width+"' height='"+this.Height+"'></embed>";
      str += "</object>";	  
  }
  str += "<div style='text-align:right;'><a href='#;' onclick='javascript:document.getElementById(\"PCMSAD_"+this.PosID+"\").style.display=\"none\"'>关闭</a></div>";
  str += "</div>";
  document.write(str);
  setInterval("playFixureAD(\""+this.Align+"\",\"PCMSAD_"+this.PosID+"\")",10);
}

function playFixureAD(Align,ADID){
	var followObj		= document.getElementById(ADID);
	var followObj_x		= 0;
	var followObj_y		= 0;
	var Cwidth  = document.compatMode == "BackCompat" ? document.body.clientWidth : document.documentElement.clientWidth;
	var CHeight = document.compatMode == "BackCompat" ? document.body.clientHeight : document.documentElement.clientHeight;
	if(Align=="Y"){
		followObj_x = parseInt((Cwidth/2)-(followObj.clientWidth/2));
		followObj_y = parseInt((CHeight/2)-(followObj.clientHeight/2));
		if(followObj.offsetLeft!=(document.documentElement.scrollLeft+followObj_x)) {
			var dx=(document.documentElement.scrollLeft+followObj_x-followObj.offsetLeft)*delta;
			dx=(dx>0?1:-1)*Math.ceil(Math.abs(dx));
			followObj.style.left=(followObj.offsetLeft+dx)+"px";
		}
		if(followObj.offsetTop!=(document.documentElement.scrollTop+followObj_y)) {
			var dy=(document.documentElement.scrollTop+followObj_y-followObj.offsetTop)*delta;
			dy=(dy>0?1:-1)*Math.ceil(Math.abs(dy));
			followObj.style.top=(followObj.offsetTop+dy)+"px";
		}
	}
}
 
var cmsAD_4 = new PCMSAD('cmsAD_4'); 
cmsAD_4.PosID = 4; 
cmsAD_4.ADID = 15; 
cmsAD_4.ADType = "images"; 
cmsAD_4.ADName = "电影新力量论坛"; 
cmsAD_4.ADContent = "{'Images':[{'imgADLinkUrl':'%2F','imgADAlt':'昂首新时代阔步新征程','ImgPath':'/uploadfile/2017/1129/20171129090540369.jpg'}],'imgADLinkTarget':'New','Count':'1','showAlt':'Y'}"; 
cmsAD_4.URL = "/index.php?m=poster&c=index"; 
cmsAD_4.SiteID = 1; 
cmsAD_4.PaddingLeft = 0; 
cmsAD_4.PaddingTop = 0; 
cmsAD_4.Scroll = 'Y'; 
cmsAD_4.Align = 'Y'; 
cmsAD_4.Width = 1100; 
cmsAD_4.Height = 460; 
cmsAD_4.UploadFilePath = ""; 
cmsAD_4.ShowAD();

var isIE=!!window.ActiveXObject; 
if (isIE){

	if (document.readyState=="complete"){
		cmsAD_4.Stat();
	} else {
		document.onreadystatechange=function(){
			if(document.readyState=="complete") cmsAD_4.Stat();
		}
	}
} else {
	cmsAD_4.Stat();
}