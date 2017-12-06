<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
<form name="myform" id="myform" action="?m=link&c=link&a=check_register" method="post" onsubmit="checkuid();return false;">
<div class="table-list">
<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<th width="6%" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('linkid[]');"></th>
			<th width="6%" align="center"><?php echo L('listorder')?></th>
			<th width="12%"><?php echo L('link_name')?></th>
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
		<td width="6%" align="center"><input type="checkbox" name="linkid[]" value="<?php echo $info['linkid']?>"><?php echo $info['linkid']?></td>
		<td width="6%" align="center"><input name='listorders[<?php echo $info['linkid']?>]' type='text' size='3' value='<?php echo $info['listorder']?>' class="input-text-c"></td>
		<td width="12%"><a href="<?php echo $info['url'];?>" title="<?php echo L('go_website')?>" target="_blank"><?php echo new_html_special_chars($info['name'])?></a> </td>
		<td width="12%"><?php echo $info['url'];?></td>
		<td width="10%" align="center"><?php if($info['typeid']==0){echo "默认分类";}else{echo $type_arr[$info['typeid']];}?></td>
		<td width="10%" align="center"><?php if($info['linktype']==0){echo L('word_link');}else{echo L('logo_link');}?></td>
		<td width="6%" align="center"><?php if($info['passed']=='0'){?><a
			href='?m=link&c=link&a=check&linkid=<?php echo $info['linkid']?>'
			onClick="return confirm('<?php echo L('pass_or_not')?>')"><font color=red><?php echo L('audit')?></font></a><?php }else{echo L('passed');}?></td>
		<td width="8%" align="center"><a href="###"
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
<div class="btn"><a href="#"
	onClick="javascript:$('input[type=checkbox]').attr('checked', true)"><?php echo L('selected_all')?></a>/<a
	href="#"
	onClick="javascript:$('input[type=checkbox]').attr('checked', false)"><?php echo L('cancel')?></a>
<input name="dosubmit" type="submit" class="button"
	value="<?php echo L('pass_check')?>"
	onClick="return confirm('<?php echo L('pass_or_not')?>')">&nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onclick="document.myform.action='?m=link&c=link&a=delete'" value="<?php echo L('delete')?>"/> </div>
<div id="pages"><?php echo $this->pages?></div>
</form>
</div>
</body>
</html>
<script type="text/javascript">
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
</script>
