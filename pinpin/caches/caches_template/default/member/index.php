<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("member","header"); ?>

<div class="main">
	<div id="memberArea">
		<div class="col-left col-1 left-memu">
			<h5 class="title">账号管理</h5>
			<ul>
				<li><a href="index.php?m=member&c=index&a=account_manage_info&t=1"><img src="/statics/images/icon/user_edit.png" width="16" /> 修改个人信息</a></li>
				<li><a href="index.php?m=member&amp;c=index&amp;a=account_manage_avatar&amp;t=1"><img src="/statics/images/icon/vcard.png" width="16"> 修改头像</a></li>

				<li><a href="index.php?m=member&amp;c=index&amp;a=account_manage_password&amp;t=1"><img src="/statics/images/icon/icon_key.gif" width="16" height="16"> 修改密码</a></li>

				<li><a href="index.php?m=member&amp;c=index&amp;a=account_manage_email&amp;t=1"><img src="/statics/images/icon/vcard.png"> 修改邮箱/手机号</a></li>
			</ul>
			<span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
		</div>
		<div class="col-auto">
			<div class="col-1 ">
				<h5 class="title">个人信息：</h5>
				<div class="content">
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=b4ae4eea6a794ca481c1b1122adcd84e&sql=select+%2A+from+jzk_member+where+userid%3D%27%24_userid%27\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_member where userid='$_userid' LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
					<div class="col-1 member-info">
						<div class="content" style="position: relative;">
							<div class="himg" style="position: absolute;top: 10px;left: 10px;">
								<a title="修改头像" href="index.php?m=member&amp;c=index&amp;a=account_manage_avatar&amp;t=1"><img src="http://www.xiaojindou123.com/phpsso_server/statics/images/member/nophoto.gif" width="60" height="60" onerror="this.src='http://www.xiaojindou123.com/phpsso_server/statics/images/member/nophoto.gif'"></a>
							</div>
							<div class="col-auto" style="width: 90%;float: right;">
								<h5><img src="/statics/images/icon/vip-expired.gif" title="已过期，过期时间：1">
								<font color="#000000"><?php echo $_username;?></font>（<?php echo $data['0']['email'];?>）</h5>
								<p class="blue">
									会员积分：<font style="color:#F00; font-size:12px;font-family:Georgia,Arial; font-weight:700"><?php echo $data['0']['point'];?></font> 积分	
								</p>
							</div>
							<div style="clear: both;"></div>
						</div>
					</div>
					<div class="bk10"></div>	
					<div class="col-1 ">
						<h5 class="title">详细信息</h5>
						<div class="content">
							<table width="100%" cellspacing="0" class="table_form">
								<tbody>
								<tr>
									<th width="120">用户名：</th>        
									<td><?php echo $_username;?></td>
								</tr>
								<tr>
									<th width="120">注册时间：</th>        
									<td><?php echo date("Y-m-d H:i:s",$data[0][regdate]);?></td>
								</tr>
								<tr>
									<th width="120">最后登录：</th>        
									<td><?php echo date("Y-m-d H:i:s",$data[0][lastdate]);?></td>
								</tr>
								<tr>
									<th width="120">注册ip：</th>        
									<td><?php echo $data['0']['regip'];?></td>
								</tr>
								<tr>
									<th width="120">上次登录ip：</th>        
									<td><?php echo $data['0']['lastip'];?></td>
								</tr>
								<tr>
									<th width="120">手机号码：</th>        
									<td style="color:#ff6600;"><strong><?php echo $data['0']['mobile'];?></strong> 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="更换手机" class="button" onclick="redirect('?m=member&c=index&a=account_change_mobile&t=1')">
									</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div> 
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include template("member","footer"); ?>