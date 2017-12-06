<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>pinpin/font-awesome.min.css">
<div class="youce">
    <ul>
        <li class="youce_phone">
            <i class="fa fa-phone" style="font-size: 30px;color: #fff;transform:rotate(18deg);margin: 4px 15px 0;"></i>
            <div style="color: #fff;width: 100%;text-align: center;">电话</div>
            <div class="youce_phone_mouse" style="display: none;">
                <div class="number">400-066-1905 转2</div>
                <div class="time">9:00-22:00</div>
            </div>
        </li>
        <li class="youce_kefu">
            <i class="fa fa-user-circle-o" style="font-size: 30px;color: #fff;margin: 4px 14px 0;"></i>
            <div style="color: #fff;width: 100%;text-align: center;">客服</div>
        </li>
        <li class="youce_fankui">
            <i class="fa fa-pencil" style="font-size: 28px;color: #fff;margin: 4px 17px 0;"></i>
            <div style="color: #fff;width: 100%;text-align: center;">反馈</div>
        </li>
        <li class="youce_wap">
            <i class="fa fa-mobile" style="font-size: 34px;color: #fff;margin: 4px 21px 0;"></i>
            <div style="color: #fff;width: 100%;text-align: center;">手机端</div>
            <div class="youce_wap_mouse" style="display: none;">
                <img src="<?php echo $siteinfo['pc_wapqrcode'];?>" style="width: 127px;height: 127px;">
            </div>
        </li>
        <li class="youce_top" style="display: none;">
            <i class="fa fa-chevron-up" style="font-size: 24px;color: #fff;margin: 4px 18px 0;"></i>
            <div style="color: #fff;width: 100%;text-align: center;">返回顶部</div>
        </li>
    </ul>
</div>
<script type="text/javascript">
$(".youce_phone").mouseover(function(){
    $(".youce_phone_mouse").css("display","block");
    $(".youce_phone").css("background","#e14a43");
});
$(".youce_phone").mouseout(function(){
    $(".youce_phone_mouse").css("display","none");
    $(".youce_phone").css("background","#91BCCD");
});
$(".youce_wap").mouseover(function(){
    $(".youce_wap_mouse").css("display","block");
    $(".youce_wap").css("background","#e14a43");
});
$(".youce_wap").mouseout(function(){
    $(".youce_wap_mouse").css("display","none");
    $(".youce_wap").css("background","#91BCCD");
});
$(".youce_top").click(function(){
    scroll(0,0);
});
 
//置顶按钮  
$(window).scroll(function(){if($(document).scrollTop()>160){  
    $('.youce_top').css("display","block"); 
    $('.youce_top').fadeIn();  
    }else{  
        $('.youce_top').fadeOut();  
        }});  
$('.youce_top').click(function(){  
    var timer=setInterval(function(){  
    if($(document).scrollTop()==0){  
        clearInterval(timer);  
        }else{  
    $(document).scrollTop($(document).scrollTop()-30);  
    }  
    },5);  
}); 
</script>


<footer class="f_song no-marg">
    <div class="helpBox">
       <div class="wrap">
        <div class="ele ele_first ele_link">
            <i class="fa fa-handshake-o" style="font-size: 100px;color: #D2D2D2;"></i>
            <div class="txt">
                <div class="tit">帮助中心</div><br>
                <div class="con">
                </div>
            </div>
        </div>
        <div class="ele ele_line">
             <a href="" target="_blank"><i class="fa fa-pencil-square-o" style="font-size: 100px;color: #D2D2D2;"></i></a>
            <div class="txt">
                 <div class="tit"><a href="" target="_blank" style="text-decoration:none;color: #333;">在线反馈</a></div><br>
                <div class="con">
                    <div class="qq"><a target="_blank" href="">QQ咨询</a></div><br>
                    <div class="mail">客服邮箱：<br>vipservice@1905.com</div>
                </div>
            </div>
        </div>
        <div class="ele ele_last ele_tele" style="border: none;">
            <i class="fa fa-user-circle-o" style="font-size: 100px;color: #D2D2D2;"></i>
            <div class="txt">
                <div class="tit">客服电话</div><br>
                <div class="con">
                    <div class="number">400-066-1905 转2</div><br>
                    <div class="time">9:00-22:00</div>
                </div>
            </div>
        </div>
    </div>
 </div>
</footer>
</body>
</html>
