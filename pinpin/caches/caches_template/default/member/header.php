<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?> <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
    <meta name="keywords" content="<?php echo $SEO['keyword'];?>" />
    <meta name="description" content="<?php echo $SEO['description'];?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>member.css">
    <link href="<?php echo CSS_PATH;?>style.css" rel="stylesheet" type="text/css" />
<?php 
    $mdetect = "    <script type=\"text/javascript\" src=\"/statics/js/mdetect.js\"></script>\r\n";
    if ($WAP['status']=='1') {
        $w_wapurl=strtolower(rtrim(trim($WAP['domain']),'/'));
        $mdetect=$mdetect."    <script type=\"text/javascript\">";
        $mdetect=$mdetect."var href = location.href.toLowerCase();";
        if($w_wapurl=="" || empty($w_wapurl)) {
            $mdetect=$mdetect."if(href.indexOf('mobile=1') < 0 && MobileEsp.IsMobilePhone) {";
            $mdetect=$mdetect."location.href='/mindex.html"."';";
        }
        else {
            $mdetect=$mdetect."if (href.indexOf('".$w_wapurl."') > -1 || (href.indexOf('mobile=1') < 0 && MobileEsp.IsMobilePhone)) {";
            $mdetect=$mdetect."location.href='".$w_wapurl."/mindex.html';";
        }
        $mdetect=$mdetect."document.write('');}</script>"."\r\n";
        echo $mdetect;
    }
?>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo JS_PATH;?>PIE_IE678.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>pic_auto.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>js.js"></script>

</head>
<body>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>pinpin/main.css">
<!-- <script type="text/javascript" src="<?php echo JS_PATH;?>pinpin/saved_resource.js"></script> -->
<?php
header("Content-Type: text/html;charset=utf-8");
$database = "pinpin";
$root = "root";
$password = "root";
$con = mysqli_connect("127.0.0.1",$root,$password,$database);
if(mysqli_connect_errno()){
    echo "连接数据库失败：".mysqli_connect_error();
    $con=null;
    exit;
}

session_start(); 
if(isset($_COOKIE['userid'])){
    $userid_ck = $_COOKIE['userid'];
    $username_ck = $_COOKIE['username'];
    $password_ck = $_COOKIE['password'];
    $sql="select * from jzk_member where userid='$userid_ck'";
    mysqli_query($con, "set names utf8");
    $result = mysqli_query($con, $sql);
    $rs=mysqli_fetch_assoc($result);
    $username_data = $rs['username'];
    $password_data = $rs['username'];
    if($username_data == $username_ck && $password_data == $password_ck){
        $_SESSION['userid'] = $userid_ck;
        $_SESSION['username'] = $username_ck;
    }
}

if(isset($_SESSION['userid'])){
    $_userid = $_SESSION['userid'];
    $_username = $_SESSION['username'];
}
?>

<div class="head">
    <div class="head-bar">
        <div class="head-bar-logo">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=ce0c61e3b0bf5cd4a9849aa42c1b7e71&sql=select+%2A+from+jzk_page+where+catid%3D4&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_page where catid=4 LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
            <a href="/" title="<?php echo $data['0']['title'];?>">
                <img src="<?php echo $data['0']['thumb'];?>" style="width: 70;height: 70px;">
            </a>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
        <ul class="nav-bar-menu">
            <li><a class="nav-bar" href="/" title="首页">首页</a></li>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=6189132fea0f4128f154e580a2ee9321&action=category&catid=0&num=3&order=listorder+asc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','order'=>'listorder asc','limit'=>'3',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $a) { ?>
            <li><a href="<?php echo $a['url'];?>" title="<?php echo $a['catname'];?>"><?php echo $a['catname'];?></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
        <div class="nav-bar-seach">
            <div class="bar-seach-form">
                <form method="get" action="" name="bar-seach-form" target="_blank">
                    <input class="bar-seach-txt" type="text" name="q" placeholder="aaa">
                    <input class="icon-home i-search bar-seach-btn" type="submit" value="">
                </form>
            </div>
        </div>

        <div class="nav-bar-user">
            <div class="bar-user-login">
                <div class="user-login-reg">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=6555d5fbe72f8a3f0eacc2a147b4b060&sql=select+%2A+from+jzk_category+where+catid%3D5&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_category where catid=5 LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <a href="<?php echo $data['0']['url'];?>" target="_blank">
                        <i class="icon-home i-profile"></i><br><span class="user-login-span">登录</span>
                    </a>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
                <div class="user-login-img" style="display: none;">
                    <img src="<?php echo IMG_PATH;?>pinpin/noavatar_small.gif">
                </div>
                <div class="user-login-plane" style="display: none;">
                    <i class="arrow-up login-plane-position"></i>
<!--                     <div class="login-plane-winterVip" id="loginPlaneWinterVip" style="display: none;">
                        <div class="plane-winterVip-infoBox">
                            <p class="winterVip-infoBox-title"><i class="icon-home i-crown"></i></p>
                            <p class="winterVip-infoBox-term">会员有效期：<span></span></p>
                            <p><a href="http://pay.m1905.com/Gateway/month/number/3/" target="_blank"><button type="button" class="login-renewal-btn">续费</button></a></p>
                        </div>
                        <span class="loginOutBtn">退出</span>
                    </div> -->
                    <div class="login-plane-winterUnvip" id="loginPlaneWinterUnvip">
                        <div class="plane-winterVip-infoBox">
                            <a href="/index.php?m=member&c=index&a=init" target="_blank" title="<?php echo $_username;?>"><img src="http://nuc.m1905.com/images/noavatar_middle.gif" alt="<?php echo $_username;?>" width="60" height="60"></a>
                            <p class="winterVip-infoBox-title">
                                <a href="/index.php?m=member&c=index&a=init" target="_blank" title="<?php echo $_username;?>"><?php echo $_username;?></a>
                                <i class="icon-home i-crownGray"></i>
                            </p>
                            <p>立即开通VIP 大片随意看</p>
                            <p style="width: 70%;margin-left: 30%;">
                                <a href="http://vip.1905.com/privilege/index" target="_blank">
                                    <button type="button" class="login-renewal-btn">开通</button>
                                </a>
                            </p>
                        </div>
                        <span class="loginOutBtn">退出</span>
                    </div>
                </div>
            </div>
<!--             <div class="bar-user-history">
                <i class="icon-home i-history"></i><br><span class="user-history-span">观看记录</span>

                <div class="user-history-plane" style="display: none;">
                    <i class="arrow-up history-plane-position"></i>
                    <ul class="history-plane-list">

                    </ul>
                    <div class="history-plane-empty" id="historyPlaneEmpty" style="display: block;">
                        <i class="icon-home i-history-empty"></i>
                        <p style="margin: 14px 0;">最近您还没有任何观影记录</p>
                    </div>
                </div>
            </div> -->
            <div class="bar-user-phone">
                <a href="/" target="_blank"><i class="icon-home i-phone"></i><br><span class="user-history-span">移动端</span></a>
                <div class="user-phone-plane" style="display: none;">
                    <i class="arrow-up phone-plane-position"></i>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=39477fb51082133b6041f51866117aa1&sql=select+%2A+from+jzk_page+where+catid%3D3&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_page where catid=3 LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <img src="<?php echo $data['0']['thumb'];?>" width="117" height="117" style="margin-top:42px;">
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    <p style="font-size:17px; color:#000;margin-top: 18px;margin-bottom: 10px;">扫描打开移动端</p>
                    <p style="font-size:14px; color:#666;padding: 0px;">更多好电影 手机随时拼</p>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
$(".bar-user-phone").mouseover(function(){
    $(".user-phone-plane").css("display","block");
});
$(".bar-user-phone").mouseout(function(){
    $(".user-phone-plane").css("display","none");
});
</script>
<script type="text/javascript">
$(".loginOutBtn").click(function(){
    $.ajax({
        type: "POST",  
        url: "/php/session_des.php", 
        data:{},
        // dataType: "json",
        success: function(data) {
            console.log(data)
            window.location.href="/";
        },
    });
});
</script>
<script type="text/javascript">
<?php if($_userid=="") { ?>
var userid = 0;
<?php } else { ?>
var userid = <?php echo $_userid;?>;
<?php } ?>
if(userid != 0){
    $(".user-login-reg").css("display","none");
    $(".bar-user-history").css("display","block");
    $(".user-login-img").css("display","block");

    $(".bar-user-history").mouseover(function(){
        $(".user-history-plane").css("display","block");
    });
    $(".bar-user-history").mouseout(function(){
        $(".user-history-plane").css("display","none");
    });
    $(".bar-user-login").mouseover(function(){
        $(".user-login-plane").css("display","block");
    });
    $(".bar-user-login").mouseout(function(){
        $(".user-login-plane").css("display","none");
    });
}else{
    $(".user-login-reg").css("display","block");
    $(".bar-user-history").css("display","none");
    $(".user-login-img").css("display","none");
}
</script>

