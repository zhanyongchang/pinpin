<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $siteinfo['name'];?>-登录</title>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="<?php echo CSS_PATH;?>pinpin/passport.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH;?>pinpin/theme/default/layer.css">
<script type="text/javascript" src="<?php echo JS_PATH;?>pinpin/layer.js"></script>
</head>

<body>

<div class="row-fluid head-logo">
    <h1>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=ce0c61e3b0bf5cd4a9849aa42c1b7e71&sql=select+%2A+from+jzk_page+where+catid%3D4&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_page where catid=4 LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <a href="/" title="<?php echo $siteinfo['name'];?>"><img src="<?php echo $data['0']['thumb'];?>" alt="<?php echo $siteinfo['name'];?>" style="width: auto;height: 32px;float: left;"></a>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <span class="nav-header nav-header-login active">登录</span>
        <span class="nav-header nav-header-register">注册</span>
    </h1>
</div>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=37d850836461b179135a5e14a6fba1c4&sql=select+%2A+from+jzk_page+where+catid%3D5&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_page where catid=5 LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
<?php $background=$data[0][thumb];?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<div class="pass-wrapper" style="background: url(<?php echo $background;?>);background-size: cover;">
    <div class="pass-inner clearfix">
        <div class="row-fluid passBox hierarchy">
            <ul class="tag">
                <li class="fl active">登录</li>
                <li class="fr ">注册</li>
            </ul>
            <div class="passContent loginBox active">
                <div class="span8">
                    <form id="login" name="login" method="post">
                        <ul class="list">
                            <li class="normal">
                                <input name="username" type="text" class="input username" id="mail_sug" placeholder="邮箱/手机号" autocomplete="off">
                            </li>
                            <li class="normal passwordBox">
                                <input type="password" name="password" class="input password password_l" placeholder="请输入密码">
                            </li>
                            <li class="normal">
                                <input type="text" name="seccode" placeholder="验证码" class="input loginCode vcode" id="code">
                                <span class="vcodeImg"><img src="<?php echo APP_PATH;?>php/code.php" id="getcode_login"></span>
                            </li>
                            <li>
                              <input type="button" name="btn_login" value="登   录" class="submit btn_login">
                            </li>
                            <li>
                              <fieldset>
                                <span class="remember">
                                  <input type="checkbox" name="rememberme" id="rememberme" class="acceptIpt">
                                  <span class="c-fl">记住密码</span>
                                  <a href="http://passport.1905.com/v2/?m=retakepassword&amp;a=passport" class="c-fr text-link fr">忘记密码</a> 
                                </span>
                              </fieldset>
                            </li>
                        </ul>
                    </form>
                </div>
            </div><!-- loginBox end -->

            <div class="passContent registerBox ">
               <div class="span8">
                <form id="form_reg" name="form_reg" method="get" action="" class="clearfix">
                  <ul class="list">
                    <li class="normal">
                        <input name="emailormobile" type="text" class="input emailormobile" id="mail_reg" placeholder="请输入邮箱或手机号">
                    </li>
                    <li class="normal">
                        <input type="password" name="password" class="input password password_r" placeholder="请输入6-16位密码">
                    </li>
                    <li class="normal">
                        <input type="text" name="seccode" placeholder="验证码" class="input registerCode vcode">
                        <span class="vcodeImg"><img src="<?php echo APP_PATH;?>php/code.php" id="getcode_reg"></span>
                    </li>
                    <li class="normal accept">
                        <fieldset>
                            <span class="agreement">
                              <input type="checkbox" checked="checked" class="agree acceptIpt fl" name="rememberme">
                              <span class="fl pr05">同意</span>
                              <a href="http://www.1905.com/about/service/" class="text-link fl" target="_blank">电影网服务协议</a> 
                            </span>
                        </fieldset>
                    </li>
                    <li class="reg-submit">
                      <input type="button" name="btn_register" class="submit btn_register" value="注   册">
                    </li>
                  </ul>
                </form>
                <div class="login mar-login">
                  <span>已有账号</span>
                  <a href="<?php echo APP_PATH;?>html/list-5-1.html" class="text-link">直接登录</a>
                </div>
              </div>
    
            </div>

        </div><!-- passBox end -->
    </div>
</div>
<div class="row-fluid footer">
    <p><a href="http://www.1905.com/about/aboutus/" target="_blank">关于我们</a> | <a href="http://www.1905.com/sitemap.html" target="_blank">网站地图</a> | <a href="http://www.1905.com/jobs/" target="_blank">诚聘英才</a> | <a href="http://www.1905.com/about/copyright/" target="_blank">版权声明</a> | <a href="http://www.1905.com/about/contactus/" target="_blank">联系我们</a> | <a href="http://www.1905.com/link/" target="_blank">友情链接</a> | <a href="http://www.1905.com/cctv6/advertise/" target="_blank">CCTV6广告招商</a></p>
    <p>国家广播电影电视总局电影卫星频道节目制作中心 版权所有</p>
</div>

<script type="text/javascript">
$(function(){ 
    //数字验证 
    $("#getcode_login").click(function(){ 
        $(this).attr("src",'/php/code.php?' + Math.random()); 
    }); 
 });
$(function(){ 
    //数字验证 
    $("#getcode_reg").click(function(){ 
        $(this).attr("src",'/php/code.php?' + Math.random()); 
    }); 
 });
</script>


<script type="text/javascript">
$(".fl").click(function(){
    $(this).addClass("active");
    $(this).siblings().removeClass("active");
    $(".loginBox").addClass("active");
    $(".registerBox").removeClass("active");
    $(".nav-header-login").addClass("active");
    $(".nav-header-register").removeClass("active");
});
$(".fr").click(function(){
    $(this).addClass("active");
    $(this).siblings().removeClass("active");
    $(".registerBox").addClass("active");
    $(".loginBox").removeClass("active");
    $(".nav-header-register").addClass("active");
    $(".nav-header-login").removeClass("active");
});
</script>
<script type="text/javascript">
$(".btn_login").click(function(){
    var username = $(".username").val();
    var password = $(".password_l").val();
    var session_code = $("#code").val();
    var rememberme = $("#rememberme").is(':checked');
    
    if(username==""){
        layer.alert('请输入邮箱或手机号！');
        return;
    }else if(password==""){
        layer.alert('请输入密码！');
        return;
    }else if(session_code==""){
        layer.alert('请输入验证码！');
        return;
    }else{
        $.ajax({
            type: "POST",  
            url: "/php/check_login.php", 
            data:{username:username, password:password, session_code:session_code, rememberme:rememberme},
            dataType: "json",
            success: function(data) {
                // console.log(data);
                if(data==0){
                    layer.alert('验证码错误！');
                    $("#getcode_login").attr("src",'/php/code.php?' + Math.random());
                }else if(data==1){
                    layer.alert('用户不存在！');
                }else if(data==2){
                    layer.alert('帐号或密码错误！');
                }else if(data==3){
                    layer.alert('登陆成功！');
                    setTimeout("location.href='/'",2000);
                }
            },
        });
    }
});

$(".btn_register").click(function(){
    var emailormobile = $(".emailormobile").val();
    var password = $(".password_r").val();
    var session_code = $(".registerCode").val();
    var agree = $(".acceptIpt").is(':checked');
    var emailormobile_len = $(".emailormobile").val().length;
    var password_len = $(".password_r").val().length;
    var isemail = emailormobile.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/);

    if(agree==false){
        layer.alert('请选择是否同意注册协议！');
        return;
    }else if(emailormobile==""){
        layer.alert('请输入邮箱或手机号');
        return;
    }else if(emailormobile_len!=11 && isemail == null){
        layer.alert('邮箱或手机号格式不正确！');
        return;
    }else if(password==""){
        layer.alert('请输入密码');
        return;
    }else if(password_len<6 || password_len>16){
        layer.alert('请输入6-16位密码！');
        return;
    }else if(session_code==""){
        layer.alert('请输入验证码！');
        $("#getcode_reg").attr("src",'/php/code.php?' + Math.random());
        return;
    }else{
        $.ajax({
            type: "POST",  
            url: "/php/check_reg.php", 
            data:{emailormobile:emailormobile, password:password, session_code:session_code},
            dataType: "json",
            success: function(data) {
                // console.log(data);
                if(data==0){
                    layer.alert('验证码错误！');
                }else if(data==1){
                    layer.alert('手机号或邮箱已被注册！');
                }else if(data==2){
                    layer.alert('注册成功！');
                    setTimeout("location.href='/'",2000);
                }
            },
        });
    }
});
</script>
</body>
</html>