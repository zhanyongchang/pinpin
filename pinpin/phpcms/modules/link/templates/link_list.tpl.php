<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
		<td><div class="explain-col"> 
		<?php echo L('all_linktype')?>: &nbsp;&nbsp; <a href="?m=link&c=link"><?php echo L('all')?></a> &nbsp;&nbsp;
		<a href="?m=link&c=link&typeid=0">默认分类</a>&nbsp;
		<?php
	if(is_array($type_arr)){
	foreach($type_arr as $typeid => $type){
		?><a href="?m=link&c=link&typeid=<?php echo $typeid;?>"><?php echo $type;?></a>&nbsp;
		<?php }}?>
		</div>
		</td>
		</tr>
    </tbody>
</table>
<form name="myform" id="myform" action="?m=link&c=link&a=listorder" method="post" >
<div class="table-list">
<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<th width="6%" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('linkid[]');"></th>
			<th width="6%" align="center"><?php echo L('listorder')?></th>
			<th width="25%"><?php echo L('link_name')?></th>
			<th align="center">链接地址</th>
			<th width="10%" align="center"><?php echo L('typeid')?></th>
			<th width='10%' align="center"><?php echo L('link_type')?></th>
			<th width="6%" align="center"><?php echo L('status')?></th>
			<th width="8%" align="center"><?php echo L('operations_manage')?></th>
		</tr>
	</thead>
<tbody>
<?php
if(is_array($infos)){
	foreach($infos as $info){
		?>
	<tr>
		<td align="center"><input type="checkbox" name="linkid[]" value="<?php echo $info['linkid']?>"><?php echo $info['linkid']?></td>
		<td align="center"><input name='listorders[<?php echo $info['linkid']?>]' type='text' size='3' value='<?php echo $info['listorder']?>' class="input-text-c" onkeyup="value=value.replace(/[^\d]/g,'')" onkeypress="event.returnValue=IsDigit();"></td>
		<td ><input name="title" type="text" value="<?php echo $info['name'];?>" data="<?php echo $info['linkid']?>" style="display:none;width:95%;" maxlength="255" /><span><?php echo $info['name']?></span><img src="/statics/images/admin_img/tdedit.gif" class="img1" style="cursor:pointer;" /></td>
		<td ><input name="url" type="text" value="<?php echo $info['url'];?>" data="<?php echo $info['linkid']?>" style="display:none;width:95%;" maxlength="255" /><span><?php echo $info['url']?></span><img src="/statics/images/admin_img/tdedit.gif" class="img2" style="cursor:pointer;" /></td>
		<td align="center"><?php if($info['typeid']==0){echo "默认分类";}else{echo $type_arr[$info['typeid']];}?></td>
		<td align="center"><?php if($info['linktype']==0){echo L('word_link');}else{echo L('logo_link');}?></td>
		<td align="center"><?php if($info['passed']=='0'){?><a
			href='?m=link&c=link&a=check&linkid=<?php echo $info['linkid']?>'
			onClick="return confirm('<?php echo L('pass_or_not')?>')"><font color=red><?php echo L('audit')?></font></a><?php }else{echo L('passed');}?></td>
		<td align="center"><a href="###"
			onclick="edit(<?php echo $info['linkid']?>, '<?php echo new_addslashes(new_html_special_chars($info['name']))?>')"
			title="<?php echo L('edit')?>"><?php echo L('edit')?></a> |  <a
			href='?m=link&c=link&a=delete&linkid=<?php echo $info['linkid']?>'
			onClick="return confirm('<?php echo L('confirm', array('message' => new_addslashes(new_html_special_chars($info['name']))))?>')"><?php echo L('delete')?></a> 
		</td>
	</tr>
	<?php
	}
}
?>
</tbody>
</table>
</div>
<div class="btn"> 
<input name="dosubmit" type="submit" class="button"
	value="<?php echo L('listorder')?>">&nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onClick="document.myform.action='?m=link&c=link&a=delete'" value="<?php echo L('delete')?>"/></div>
<div id="pages"><?php echo $pages?></div>
</form>
</div>
<script type="text/javascript">
$(document).ready(function () {
	$("td img.img1").click(function () {
		var text = $(this).parent().find("input");
		var span = $(this).parent().find("span");
		var img = $(this);
		if (img) {
			text.show();
			text.select();
			$(this).hide();
			if (span) {
				span.hide();
			}
			text.blur(function () {
				if ($.trim(text.val()) == "") {
					alert("请输入网站名称");
					return false;
				}
				text.hide();
				span.show();
				img.show();

				var title=$.trim(text.val());
				var id = text.attr("data");
				if($.trim(text.val()) != $.trim(span.text())) {
					$.ajax({
						type: "GET",
						contentType: "application/json",
						url: "/api.php",
						data:"op=edit_title&LinkName="+encodeURIComponent(title)+"&LinkId="+id,
						dataType: 'json',
						success: function(re) {
							
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							alert(XMLHttpRequest.responseText);
						}
					})
				}
				span.html(text.val());
			});
		}
	});
	$("td img.img2").click(function () {
		var text = $(this).parent().find("input");
		var span = $(this).parent().find("span");
		var img = $(this);
		if (img) {
			text.show();
			text.select();
			$(this).hide();
			if (span) {
				span.hide();
			}
			text.blur(function () {
				if ($.trim(text.val()) == "") {
					alert("请输入链接地址");
					return false;
				}
				text.hide();
				span.show();
				img.show();

				var title=$.trim(text.val());
				var id = text.attr("data");
				if($.trim(text.val()) != $.trim(span.text())) {
					$.ajax({
						type: "GET",
						contentType: "application/json",
						url: "/api.php",
						data:"op=edit_title&LinkUrl="+encodeURIComponent(title)+"&LinkId="+id,
						dataType: 'json',
						success: function(re) {
							
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							alert(XMLHttpRequest.responseText);
						}
					})
				}
				span.html(text.val());
			});
		}
	});
});
function edit(id, name) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit')?> '+name+' ',id:'edit',iframe:'?m=link&c=link&a=edit&linkid='+id,width:'700',height:'450'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
function checkuid() {
	var ids='';
	$("input[name='linkid[]']:checked").each(function(i, n){
		ids += $(n).val() + ',';
	});
	if(ids=='') {
		window.top.art.dialog({content:"<?php echo L('before_select_operations')?>",lock:true,width:'200',height:'50',time:1.5},function(){});
		return false;
	} else {
		myform.submit();
	}
}
//向下移动
function listorder_up(id) {
	$.get('?m=link&c=link&a=listorder_up&linkid='+id,null,function (msg) { 
	if (msg==1) { 
	//$("div [id=\'option"+id+"\']").remove(); 
		alert('<?php echo L('move_success')?>');
	} else {
	alert(msg); 
	} 
	}); 
} 
</script>
</body>
</html>
