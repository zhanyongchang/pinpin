<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>pic_auto.js"></script>
<script language="javascript">
function getId(objectId) {
    if (document.getElementById && document.getElementById(objectId)) {
        return document.getElementById(objectId);
    }
    else if (document.all && document.all(objectId)) {
        return document.all(objectId);
    }
    else if (document.layers && document.layers[objectId]) {
        return document.layers[objectId];
    }
    else {
        return false;
    }
}
</script>
<div class="subnav">
    <div class="content-menu ib-a blue line-x">
    <?php if(isset($big_menu)) echo '<a class="add fb" href="'.$big_menu[0].'"><em>'.$big_menu[1].'</em></a>　';?>
    <?php echo admin::submenu($_GET['menuid'],$big_menu); ?><span>|</span>
    </div>
</div>

<div class="pad-lr-10">
<form name="myform" action="?m=poster&c=poster&a=listorder" method="post">
<div class="table-list">
    <table width="100%" cellspacing="0" class="contentWrap">
        <thead>
            <tr>
            <th width="5%" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
			<th width="6%"><?php echo L('listorder')?></th>
			<th align="center"><?php echo L('poster_title')?></th>
            <th width="12%" align="center">链接地址</th>
            <th width="12%" align="center">文字提示</th>
			<th width="8%" align="center"><?php echo L('poster_type')?></th>
			<th width='13%' align="center"><?php echo L('for_postion')?></th>
			<th width="14%" align="center"><?php echo L('addtime')?></th>
			<th width="11%" align="center"><?php echo L('operations_manage')?></th>
            </tr>
        </thead>
        <tbody>
 <?php 
if(is_array($infos)){
	foreach($infos as $info){
		$space = $this->s_db->get_one(array('spaceid'=>$info['spaceid']), 'name');
		$narry=json_decode($info[setting],true);
		
?>   
	<tr onMouseMove="javascript:getId('<?php echo $info['id']?>').style.display='block';" onMouseOut="javascript:getId('<?php echo $info['id']?>').style.display='none';">
	<td align="center"><input type="checkbox" name="id[]" value="<?php echo $info['id']?>"><?php echo $info['id']?></td>
	<td align="center"><input type="text" size="3" name="listorder[<?php echo $info['id']?>]" value="<?php echo $info['listorder']?>" id="listorder" class="input-text-c" onkeyup="value=value.replace(/[^\d]/g,'')" onkeypress="event.returnValue=IsDigit();"></td>
	<td align="left"><input name="title" type="text" value="<?php echo $info['name'];?>" data="<?php echo $info['id']?>" style="display:none;width:95%;" maxlength="255" /><span><?php echo $info['name']?></span><img src="/statics/images/admin_img/tdedit.gif" class="img1" style="cursor:pointer;" /></td>
    <td align="left"><?php echo $narry[1]['linkurl']?></td>
    <td align="left"><?php echo $narry[1]['alt']?></td>
	<td align="center"><?php echo $types[$info['type']]?></td>
	<td align="left"><?php echo $space['name']?></td>
	<td align="center"><?php echo format::date($info['addtime'], 1);?></td>
	<td align="center"><a href="index.php?m=poster&c=poster&a=edit&id=<?php echo $info['id'];?>&pc_hash=<?php echo $_SESSION['pc_hash'];?>&menuid=<?php echo $_GET['menuid']?>" ><?php echo L('edit')?></a>|<a href="?m=poster&c=poster&a=stat&id=<?php echo $info['id']?>&spaceid=<?php echo $_GET['spaceid'];?>"><?php echo L('stat')?></a>|<a href="index.php?m=poster&c=poster&a=delete&id=<?php echo $info['id'];?>&pc_hash=<?php echo $_SESSION['pc_hash'];?>&menuid=<?php echo $_GET['menuid']?>" onClick="return confirm('确认要删除吗？');"><?php echo L('delete')?></a>
        <div id='<?php echo $info['id']?>' style="position:absolute;left:50%;height:100px;z-index:99;display:none;">
           <img src='<?php echo $narry[1]['imageurl']?>' onload="DrawImage(this,300,225)" border="0" alt="" />
         </div></td>
	</tr>
<?php 
	}
}
?>
</tbody>
    </table>
  
    <div class="btn"><label for="check_box"><?php echo L('selected_all')?>/<?php echo L('cancel')?></label>
    	<input name='submit' type='submit' class="button" value='<?php echo L('listorder')?>'>&nbsp;
        <input name='submit' type='submit' class="button" value='<?php echo L('start')?>' onClick="document.myform.action='?m=poster&c=poster&a=public_approval&passed=0'">&nbsp;
        <input name='submit' type='submit' class="button" value='<?php echo L('stop')?>' onClick="document.myform.action='?m=poster&c=poster&a=public_approval&passed=1'">&nbsp;
		<input name="submit" type="submit" class="button" value="<?php echo L('delete')?>" onClick="document.myform.action='?m=poster&c=poster&a=delete';return confirm('<?php echo L('confirm', array('message' => L('selected')))?>')">&nbsp;&nbsp;</div>  </div>
 <div id="pages"><?php echo $this->db->pages;?></div>
</form>
</div>
</body>
</html>
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
					alert("请输入广告标题");
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
						data:"op=edit_title&PosterName="+encodeURIComponent(title)+"&PosterId="+id,
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
<!--
	function edit(id, name) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit_ads')?>--'+name, id:'edit', iframe:'?m=poster&c=poster&a=edit&id='+id ,width:'600px',height:'430px'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;// 使用内置接口获取iframe对象
	var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
//-->
</script>