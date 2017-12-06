<?php
include $this->admin_tpl('header','admin');
?>
<script type="text/javascript">
<!--
	$(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}}); 

	$("#guestbook_name").formValidator({onshow:"<?php echo L("input").L('guestbook_name')?>",onfocus:"<?php echo L("input").L('guestbook_name')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('guestbook_name')?>"}).ajaxValidator({type : "get",url : "",data :"m=guestbook&c=guestbook&a=public_name&guestid=<?php echo $guestid;?>",datatype : "html",async:'false',success : function(data){	if( data == "1" ){return true;}else{return false;}},buttons: $("#dosubmit"),onerror : "<?php echo L('guestbook_name').L('exists')?>",onwait : "<?php echo L('connecting')?>"}).defaultPassed(); 

	 
	
	})
//-->
</script>

<div class="pad_10">
<form action="?m=guestbook&c=guestbook&a=show&guestid=<?php echo $guestid; ?>" method="post" name="myform" id="myform">
<table cellpadding="2" cellspacing="1" class="table_form" width="100%">

    <tr>
		<th width="20%">Id：</th>
		<td><?php echo $guestid;?></td>
	</tr>
	<tr>
		<th><?php echo L('typeid')?>：</th>
		<td><select name="guestbook[typeid]" id="">
		<option value="0" <?php if($typeid=='0'){echo "selected";}?>>默认分类</option>
		<?php
		  $i=0;
		  foreach($types as $type_key=>$type){
		  $i++;
		?>
		<option value="<?php echo $type['typeid'];?>" <?php if($type['typeid']==$typeid){echo "selected";}?>><?php echo $type['name'];?></option>
		<?php }?>
			 
		</select></td>
	</tr>
	<tr>
		<th>留言主题：</th>
		<td><?php echo $title;?></td>
	</tr>
	<tr>
		<th>您的姓名：</th>
		<td><?php echo $name;?></td>
	</tr>
    <tr>
		<th>公司名称：</th>
		<td><?php echo $company;?></td>
	</tr>
	<tr>
		<th>联系电话：</th>
		<td><?php echo $tel;?></td>
	</tr>
    <tr>
		<th>手机号码：</th>
		<td><?php echo $mobile;?></td>
	</tr>
    <tr>
		<th>邮箱：</th>
		<td><?php echo $email;?></td>
	</tr>
    <tr>
		<th>职位：</th>
		<td><?php echo $position;?></td>
	</tr>
    <tr>
		<th>QQ：</th>
		<td><?php echo $qq;?></td>
	</tr>
    <tr>
		<th>公司主页：</th>
		<td><?php echo $homepage;?></td>
	</tr>
    <tr>
		<th>联系地址：</th>
		<td><?php echo $address;?></td>
	</tr>
    <tr>
		<th>主营行业：</th>
		<td><?php echo $industry;?></td>
	</tr>
    <tr>
		<th>省份：</th>
		<td><?php echo $province;?></td>
	</tr>
    <tr>
		<th>城市：</th>
		<td><?php echo $city;?></td>
	</tr>
    <tr>
		<th>区县：</th>
		<td><?php echo $county;?></td>
	</tr>
	<tr>
		<th>留言内容：</th>
		<td><?php echo $introduce;?></td>
	</tr>
    <tr>
		<th>ip地址：</th>
		<td><?php echo $ip;?></td>
	</tr>
    <tr>
		<th>留言时间：</th>
		<td><?php echo date('Y-m-d H:i:s',$addtime);?></td>
	</tr>
	<tr>
		<th><?php echo L('elite')?>：</th>
		<td><input name="guestbook[elite]" type="radio" value="1" <?php if($elite==1){echo "checked";}?>>&nbsp;<?php echo L('yes')?>&nbsp;&nbsp;<input
			name="guestbook[elite]" type="radio" value="0" <?php if($elite==0){echo "checked";}?>>&nbsp;<?php echo L('no')?></td>
	</tr>
	<tr>
		<th><?php echo L('passed')?>：</th>
		<td><input name="guestbook[passed]" type="radio" value="1" <?php if($passed==1){echo "checked";}?>>&nbsp;<?php echo L('yes')?>&nbsp;&nbsp;<input
			name="guestbook[passed]" type="radio" value="0" <?php if($passed==0){echo "checked";}?>>&nbsp;<?php echo L('no')?></td>
	</tr>
    <tr>
		<th></th>
		<td><input type="hidden" name="forward" value="?m=guestbook&c=guestbook&a=edit"> <input
		type="submit" name="dosubmit" id="dosubmit" class="dialog"
		value=" <?php echo L('submit')?> "></td>
	</tr>
</table>
</form>
</div>

</body>
</html>

