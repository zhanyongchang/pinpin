<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
<form name="myform" id="myform" action="?m=guestbook&c=guestbook&a=check_register" method="post" onsubmit="checkuid();return false;">
<div class="table-list">
 <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="6%" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('guestid[]');">Id</th>
            <th width="5%" align="center"><?php echo L('listorder')?></th>
            <th align="center">留言主题</th>
            <th width="10%" align="center">姓名</th>
            <th width="10%" align="center">手机号码</th>
            <th width="8%" align="center"><?php echo L('typeid')?></th>
            <th width="18%" align="center"><?php echo L('lytime')?></th>
            <th width="7%" align="center"><?php echo L('status')?></th>
            <th width="10%" align="center"><?php echo L('operations_manage')?></th>
          </tr>
        </thead>
        <tbody>
<?php
if(is_array($infos)){
	foreach($infos as $info){
		?>
    <tr>
            <td width="6%" align="center"><input type="checkbox" name="guestid[]" value="<?php echo $info['guestid']?>"><?php echo $info['guestid']?></td>
            <td width="5%" align="center"><input name='listorders[<?php echo $info['linkid']?>]' type='text' size='3' value='<?php echo $info['listorder']?>' class="input-text-c"></td>
            <td align="left"><?php echo $info['title']?></td>
            <td width="10%" align="left"><?php echo $info['name']?></td>
            <td width="10%" align="center"><?php echo $info['mobile'];?></td>
            <td width="8%" align="center"><?php if($info['typeid']==0){echo "默认分类";}else{echo $type_arr[$info['typeid']];}?></td>
            <td width="18%" align="center"><?php echo date('Y-m-d H:i:s',$info['addtime']);?></td>
            <td width="7%" align="center"><?php if($info['passed']=='0'){?>
              <a
			href='?m=guestbook&c=guestbook&a=check&guestid=<?php echo $info['guestid']?>'
			onClick="return confirm('<?php echo L('pass_or_not')?>')"><font color=red><?php echo L('audit')?></font></a>
              <?php }else{echo L('passed');}?></td>
            <td width="10%" align="center"><a href="###"
			onclick="show(<?php echo $info['guestid']?>, '<?php echo new_addslashes($info['name'])?>')"
			title="<?php echo L('show')?>"><?php echo L('show')?></a> | <a
			href='?m=guestbook&c=guestbook&a=delete&guestid=<?php echo $info['guestid']?>'
			onClick="return confirm('<?php echo L('confirm', array('message' => new_addslashes($info['name'])))?>')"><?php echo L('delete')?></a></td>
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
	onClick="return confirm('<?php echo L('pass_or_not')?>')">&nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onclick="document.myform.action='?m=guestbook&c=guestbook&a=delete'" value="<?php echo L('delete')?>"/> </div>
<div id="pages"><?php echo $this->pages?></div>
</form>
</div>

</body>
</html>
<script type="text/javascript">
function show(id, name) {
	window.top.art.dialog({id:'show'}).close();
	window.top.art.dialog({title:'<?php echo L('show')?> '+name+' ',id:'show',iframe:'?m=guestbook&c=guestbook&a=show&guestid='+id,width:'700',height:'450'}, function(){var d = window.top.art.dialog({id:'show'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'show'}).close()});
}
function edit(id, name) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit')?> '+name+' ',id:'edit',iframe:'?m=link&c=guestbook&a=edit&guestbookid='+id,width:'700',height:'450'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
function checkuid() {
	var ids='';
	$("input[name='guestid[]']:checked").each(function(i, n){
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
