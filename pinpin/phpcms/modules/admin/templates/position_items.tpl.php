<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
?>
<script type="text/javascript" src="<?php echo JS_PATH?>pic_auto.js"></script>
<script type="text/javascript">
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
<form name="myform" action="?m=admin&c=position&a=public_item" method="post">
<input type="hidden" value="<?php echo $posid?>" name="posid">
<div class="pad_10">
<div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
            <th width="5%" align="left"><input type="checkbox" value="" id="check_box" onclick="selectall('items[]');"></th>
            <th width="6%" align="left"><?php echo L('listorder');?></th>
            <th width="6%" align="left">ID</th>
            <th align="left"><?php echo L('title');?></th>
            <th width="15%"><?php echo L('catname');?></th>
            <th width="15%"><?php echo L('inputtime')?></th>
            <th width="18%"><?php echo L('posid_operation');?></th>
            </tr>
        </thead>
    <tbody>
 <?php 
if(is_array($infos)){
	foreach($infos as $info){
?>   
	<tr onMouseMove="javascript:getId('<?php echo $info['id']?>').style.display='block';" onMouseOut="javascript:getId('<?php echo $info['id']?>').style.display='none';">
	<td><input type="checkbox" name="items[]" value="<?php echo $info['id'],'-',$info['modelid']?>" id="items" boxid="items">
	</td>	
	<td>
	<input name='listorders[<?php echo $info['catid'],'-',$info['id']?>]' type='text' size='3' value='<?php echo $info['listorder']?>' class="input-text-c">
	</td>	
	<td align="left"><?php echo $info['id']?></td>
	<td align="left"><?php echo $info['title']?> <?php if($info['thumb']!='') {echo '<img src="'.IMG_PATH.'icon/small_img.gif">'; }?></td>
	<td align="center"><?php echo $info['catname']?></td>
	<td align="center"><?php echo date('Y-m-d H:i:s',$info['inputtime'])?></td>
	<td align="center"><a href="<?php echo $info['url']?>" target="_blank"><?php echo L('posid_item_view')?></a> | <a onclick="javascript:openwinx('?m=content&c=content&a=edit&catid=<?php echo $info['catid']?>&id=<?php echo $info['id']?>','')" href="javascript:;"><?php echo L('posid_item_edit');?></a> | <a href="javascript:item_manage(<?php echo $info['id']?>,<?php echo $info['posid']?>, <?php echo $info['modelid']?>,'<?php echo $info['title']?>')"><?php echo L('posid_item_manage')?></a>
         <div id='<?php echo $info['id']?>' style="position:absolute;left:50%;height:100px;z-index:99;display:none;">
           <img src='<?php echo $info['thumb']?>' onload="DrawImage(this,300,225)" border="0" alt="" />
         </div>
	</td>
	</tr>
<?php 
	}
}
?>
    </tbody>
    </table>
  
    <div class="btn"><label for="check_box"><?php echo L('select_all')?>/<?php echo L('cancel')?></label> <input type="button" class="button" value="<?php echo L('listorder')?>" onclick="myform.action='?m=admin&c=position&a=public_item_listorder';myform.submit();"/> <input type="submit" class="button" name="dosubmit" value="<?php echo L('posid_item_remove')?>" /> </div></div>

 <div id="pages"> <?php echo $pages?></div>
</div>
</div>
</form>
</body>
</html>
<script type="text/javascript">
	function item_manage(id,posid, modelid, name) {
	window.top.art.dialog({title:'<?php echo L('edit')?>--'+name, id:'edit', iframe:'?m=admin&c=position&a=public_item_manage&id='+id+'&posid='+posid+'&modelid='+modelid ,width:'550px',height:'430px'}, 	function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;
	var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
</script>