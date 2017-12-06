<?php
defined('IN_ADMIN') or exit('No permission resources.'); 
include $this->admin_tpl('header', 'admin');
?>

<div class="pad-10">
<form action="?m=wap&c=wap_admin&a=add" method="post" id="myform">
<input type="hidden" value='<?php echo $siteid?>' name="siteid">
<fieldset>
	<legend><?php echo L('basic_config')?></legend>
	<table width="100%"  class="table_form">
    <tr>
    <th width="120"><?php echo L('wap_sel_site')?></th>
    <td class="y-bg"><?php echo form::select($sitelist,self::get_siteid(),'name="siteid"')?></td>
    </tr>
    <tr>
    <th><?php echo L('wap_sitename')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="sitename" id="sitename" size="30" value="" /></td>
    </tr>
    <tr>
    <th><?php echo L('wap_logo')?></th>
    <td class="y-bg"><?php echo form::images('logo', 'logo', $logo, 'wap');?></td>
    </tr>
    <tr>
    <th><?php echo L('wap_domain')?>：</th>
    <td class="y-bg"><input type="text" class="input-text" name="domain" id="domain" size="50" value="" /> </td>
    </tr>
    <tr>
    <th>手机站Banner宽度：</th>
    <td class="y-bg"><input type="text" class="input-text" name="wap_bannerwidth" id="wap_bannerwidth" size="10" maxlength="8" value="300" /> </td>
    </tr>
    <tr>
    <th>手机站Banner高度：</th>
    <td class="y-bg"><input type="text" class="input-text" name="wap_bannerheight" id="wap_bannerheight" size="10" maxlength="8" value="200" /> </td>
    </tr>
    <tr style="display:none">
    <th>手机站二维码图片：</th>
    <td class="y-bg"><?php echo form::images('wap_qrcode', 'wap_qrcode', $wap_qrcode, 'wap');?> </td>
    </tr>
    <tr>
    <th>手机站地图链接：<br /><a href="<?php echo APP_PATH?>index.php?m=wap&c=baidumap" style="color:#FF0000;cursor:help;" target="_blank">设置方法？</a></th>
    <td class="y-bg"><textarea name="wap_mapcode" id="wap_mapcode" cols="60" rows="3" class="input-text"></textarea> </td>
    </tr>
    <tr>
    <th>手机站头部统计代码：</th>
    <td class="y-bg"><textarea name="wap_topcode" id="wap_topcode" cols="60" rows="5" class="input-text"></textarea> </td>
    </tr>
    <tr>
    <th>手机站底部统计代码：</th>
    <td class="y-bg"><textarea name="wap_bottomcode" id="wap_bottomcode" cols="60" rows="5" class="input-text"></textarea> </td>
    </tr>
    </table> 
  </fieldset>
 <div class="bk10"></div>
 <fieldset>  
 <legend><?php echo L('parameter_config')?></legend>
 <table width="100%"  class="table_form">  
    <tr>
    <th width="120"><?php echo L('wap_listnum')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[listnum]" id="listnum" size="10" value="10"/> 条</td>
    </tr>
    <tr>
    <th><?php echo L('wap_thumb')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[thumb_w]" id="thumb_w" size="5" value="220"/>px　*　<input type="text" class="input-text" name="setting[thumb_h]" id="thumb_h" size="5" value="0"/>px</td>
    </tr>
    <tr>
    <th><?php echo L('wap_content_page')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[c_num]" id="c_num" size="10" value="1000"/></td>
    </tr>   
    <tr>
    <th><?php echo L('wap_index_tpl')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[index_template]" id="index_template" size="20" value="index"/>.html</td>
    </tr> 
     <tr>
    <th><?php echo L('wap_cat_tpl')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[category_template]" id="category_template" size="20" value="category"/>.html</td>
    </tr>             
     <tr>
    <th><?php echo L('wap_list_tpl')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[list_template]" id="list_template" size="20" value="list"/>.html</td>
    </tr>             
     <tr>
    <th><?php echo L('wap_show_tpl')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[show_template]" id="show_template" size="20" value="show"/>.html</td>
    </tr>  
     <tr>
    <th><?php echo L('wap_hotword')?>：</th>
    <td class="y-bg"> <textarea style="height: 100px; width: 90%;" id="options" cols="20" rows="2" name="setting[hotwords]"><?php echo $hotwords?></textarea><br />  <?php echo L('wap_hotword_desc')?></td>
    </tr>                 
</table>

<div class="bk15"></div>
<input type="submit" id="dosubmit" name="dosubmit" class="dialog" value="<?php echo L('submit')?>" />
</fieldset>
</form>
</div>
</body>
</html>