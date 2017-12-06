<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title><?php echo L('phpcms_logon')?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/statics/js/html5shiv.min.js"></script>
    <script type="text/javascript" src="/statics/js/respond.min.js"></script>
    <![endif]-->
    <!--[if lte IE 6]>
    <script type="text/javascript" src="/statics/js/PNG.js"></script>
    <script type="text/javascript">
        PNG.fix('.png');PNG.fix('.num li');
    </script>
    <![endif]-->
    <script type="text/javascript" src="/statics/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/statics/js/login.js"></script>
    <script type="text/javascript" src="/statics/js/placeholder.js"></script>
    <style type="text/css">
        body,div,ul,ol,li,dl,dt,dd,p,span,h1,h2,h3,h4,h5,h6,form,pre,fieldset,legend,input,textarea,img {margin:0;padding:0;}
        body {font-size:12px;line-height:18px;color:#000000;text-decoration:none;font-family:Arial,Verdana,Helvetica,sans-serif;margin:0px;padding:1px;}
        div,ul,ol,li,dd,dl,dt {list-style:none;}
        img {vertical-align:middle;border:0px;}
        .clear,.cl {clear:both;height:0;}
        .footer {width:100%;margin:0 auto;margin-top:40px;_margin-top:20px;}
        .login_1 {width:1080px;padding:20px 0px 20px 0px;margin:0 auto;}
        .login_2 {width:100%;}
        .login_2_1 {width:1080px;margin:0 auto;}
        .button_submit1 {background:#008ae1;border:0;cursor:pointer;cursor:hand;width:290px;height:50px;line-height:50px;text-align:center;font-size:18px;font-family:Microsoft YaHei;color:#fff;letter-spacing:5px;border-radius:5px;}
        .button_submit1:hover {background:#0197f5;}
        .login_box {width:360px;height:573px;float:right;background:url('/statics/images/admin_img/login_box.png') no-repeat;margin-top:-6px;_margin-top:-6px;margin-right:-6px;_margin-right:-6px;overflow:hidden;}
        .login_box .txt {height:100px;line-height:100px;text-align:center;}
        .login_box .txt font {font-size:36px;font-family:Microsoft YaHei;color:#505050;margin-right:10px;}
        .login_box .txt span {font-size:36px;font-family:Arial;color:#9f9e9f;}
        .login_box .divinput {padding:35px 0px 0px 30px;}
        .login_box .divinput td {border:0px;}
        .login_box .divinput table tr td.user {background:#f7f6f7 url('/statics/images/admin_img/user.jpg') center no-repeat;}
        .login_box .divinput table tr td.password {background:#f7f6f7 url('/statics/images/admin_img/password.jpg') center no-repeat;}
        .login_box .table1 {border:1px solid #CCCCCC;height:35px;}
        .login_box .table2 {border:1px solid #CCCCCC;height:35px;margin-top:20px;}
        .login_box .table2 img {border:none;cursor:pointer;margin:0px 5px 0px 5px;}
        .login_box .table3 {border:0px;margin-top:30px;}
        .login_box .textinput1 {border:0px;font-size:12px;height:35px;width:235px;line-height:35px;padding-left:15px;color:#a4a4a4;}
        .login_box .textinput3 {border:0px;font-size:12px;height:35px;width:115px;line-height:35px;padding-left:15px;color:#a4a4a4;border-right:1px solid #CCCCCC;}
        .login_box .news {margin-top:55px;_margin-top:35px;margin-left:30px;}
        .login_box .news p {height:30px;line-height:30px;font-size:18px;font-family:Microsoft YaHei;color:#333333;}
        .login_box .news div {margin-top:6px;}
		.safe-tips{border:1px solid #F2DD8C;color:#666;height:35px;line-height:35px;margin-top:10px;padding-left:15px;zoom:1;overflow:hidden;}
    </style>
    <script type="text/javascript">
	if(top!=self)
	if(self!=top) top.location=self.location;
    </script>
</head>
<body>
    <div class="login_1">
        <a href="http://www.jzking.com" target="_blank"><img id="admin_log" src="http://images.jzking.com/images/admin/admin_logo.jpg" alt="邦邻科技" class="png" onerror="reload()" /></a>
    </div>
    <div class="login_2" style="background:url('http://images.jzking.com/images/admin/admin_banner.jpg') center top no-repeat;">
        <div class="login_2_1">
            <div class="login_box png">
                <div class="txt">
                    <font>后台登录</font>
                    <span>LOGIN</span>
                </div>
                <div class="divinput">
                    <form action="index.php?m=admin&c=index&a=login&dosubmit=1" method="post" name="myform" onSubmit="return loginCheck(this);">
                    <table cellpadding="0" cellspacing="0" class="table1">
                        <tr>
                            <td width="40" class="user"></td>
                            <td width="250">
                                <input name="username" id="userid" type="text" class="textinput1" value="" maxLength="20" placeholder="请输入用户名" />
                            </td>
                        </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="table2">
                        <tr>
                            <td width="40" class="password"></td>
                            <td width="250">
                                <input name="password" id="pwd" type="password" class="textinput1" value="" maxlength="20" placeholder="请输入密码" />
                            </td>
                        </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="table2">
                        <tr>
                            <td width="40" class="password"></td>
                            <td width="130">
                                <input name="code" id="validate" type="text" class="textinput3" maxlength="4" placeholder="请输入验证码" />
                            </td>
                            <td>
                                <?php echo form::checkcode('code_img','4','14',100,26)?>
                            </td>
                        </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="table3">
                        <tr>
                            <td>
                                <input name="dosubmit" value="登录" type="submit" class="button_submit1" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <div class="clear"></div>
                <div class="news">
                    <p>喜讯</p>
                    <div><iframe id="frmright" name="frmright" width="320" height="105" src="http://images.jzking.com/source/ty/LoginNews.aspx" frameborder="0"></iframe></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="footer">
            <iframe id="frmbottom" name="frmbottom" width="100%" height="100" src="http://images.jzking.com/source/ty/LoginCopyright.html" frameborder="0"></iframe>
        </div>
    </div>
    <script type="text/javascript">
        function reload() {
            this.onerror = '';
            $("#admin_log").onerror = null;
            $("#admin_log").attr('src', '/statics/images/admin_img/admin_logo.jpg');
            $(".login_2").css('background', 'url(/statics/images/admin_img/admin_banner.jpg) center top no-repeat');
            document.getElementById("frmright").src = "";
            document.getElementById("frmbottom").src = "/statics/images/admin_img/copyright.html";
        }
    </script>
</body>
</html>
