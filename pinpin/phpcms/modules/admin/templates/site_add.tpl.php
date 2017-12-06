<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
?>
<script type="text/javascript">
<!--
	$(function(){
		$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}});
		$("#name").formValidator({onshow:"<?php echo L("input").L('site_name')?>",onfocus:"<?php echo L("input").L('site_name')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('site_name')?>"}).ajaxValidator({type : "get",url : "",data :"m=admin&c=site&a=public_name",datatype : "html",async:'false',success : function(data){	if( data == "1" ){return true;}else{return false;}},buttons: $("#dosubmit"),onerror : "<?php echo L('site_name').L('exists')?>",onwait : "<?php echo L('connecting')?>"});
		$("#dirname").formValidator({onshow:"<?php echo L("input").L('site_dirname')?>",onfocus:"<?php echo L("input").L('site_dirname')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('site_dirname')?>"}).regexValidator({regexp:"username",datatype:"enum",param:'i',onerror:"<?php echo L('site_dirname_err_msg')?>"}).ajaxValidator({type : "get",url : "",data :"m=admin&c=site&a=public_dirname",datatype : "html",async:'false',success : function(data){	if( data == "1" ){return true;}else{return false;}},buttons: $("#dosubmit"),onerror : "<?php echo L('site_dirname').L('exists')?>",onwait : "<?php echo L('connecting')?>"});
		//$("#domain").formValidator({onshow:"<?php echo L('site_domain_ex')?>",onfocus:"<?php echo L('site_domain_ex')?>",tipcss:{width:'300px'},empty:false}).inputValidator({onerror:"<?php echo L('site_domain_ex')?>"}).regexValidator({regexp:"http:\/\/(.+)\/$",onerror:"<?php echo L('site_domain_ex2')?>"});
		$("#template").formValidator({onshow:"<?php echo L('style_name_point')?>",onfocus:"<?php echo L('select_at_least_1')?>"}).inputValidator({min:1,onerror:"<?php echo L('select_at_least_1')?>"});
		$('#release_point').formValidator({onshow:"<?php echo L('publishing_sites_to_other_servers')?>",onfocus:"<?php echo L('choose_release_point')?>",empty:true}).inputValidator({max:4,onerror:"<?php echo L('most_choose_four')?>"});
		$('#default_style_input').formValidator({tipid:"default_style_msg",onshow:"<?php echo L('please_select_a_style_and_select_the_template')?>",onfocus:"<?php echo L('please_select_a_style_and_select_the_template')?>"}).inputValidator({min:1,onerror:"<?php echo L('please_choose_the_default_style')?>"});
	})
//-->
</script>
<style type="text/css">
.radio-label{ border-top:1px solid #e4e2e2; border-left:1px solid #e4e2e2;}
.radio-label td{ border-right:1px solid #e4e2e2; border-bottom:1px solid #e4e2e2;}
</style>
<div class="pad-10">
<form action="?m=admin&c=site&a=add" method="post" id="myform">
<div>
<fieldset>
	<legend><?php echo L('basic_configuration')?></legend>
	<table width="100%" class="table_form">
  <tr>
    <th width="90"><?php echo L('site_name')?>：</th>
    <td class="y-bg"><input type="text" class="input-text" name="name" id="name" size="30" /></td>
  </tr>
  <tr>
    <th><?php echo L('site_dirname')?>：</th>
    <td class="y-bg"><input type="text" class="input-text" name="dirname" id="dirname" size="30" /></td>
  </tr>
  <tr>
    <th><?php echo L('site_domain')?>：</th>
    <td class="y-bg"><input type="text" class="input-text" name="domain" id="domain" size="30" /></td>
  </tr>
  <tr>
    <th>网站Logo：</th>
    <td class="y-bg"><?php echo form::images('pc_logo', 'pc_logo', '/statics/images/logo.jpg', 'admin');?></td>
  </tr>
  <tr>
    <th>网站Logo2：</th>
    <td class="y-bg"><?php echo form::images('pc_logo2', 'pc_logo2', '/statics/images/logo2.jpg', 'admin');?></td>
  </tr>
  <tr style="display:none;">
    <th>网站Logo3：</th>
    <td class="y-bg"><?php echo form::images('pc_logo3', 'pc_logo3', '', 'admin');?></td>
  </tr>
  <tr>
    <th>Banner宽度：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_bannerwidth" id="pc_bannerwidth" maxlength="8" size="10" value="1920" /></td>
  </tr>
  <tr>
    <th>Banner高度：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_bannerheight" id="pc_bannerheight" maxlength="8" size="10" value="500" /></td>
  </tr>
  <tr>
    <th>微信二维码图片：</th>
    <td class="y-bg"><?php echo form::images('pc_weixinqrcode', 'pc_weixinqrcode', '', 'admin');?></td>
  </tr>
  <tr>
    <th>手机站二维码图片：</th>
    <td class="y-bg"><?php echo form::images('pc_wapqrcode', 'pc_wapqrcode', '', 'admin');?></td>
  </tr>
  <tr>
    <th>公司名称：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_company" id="pc_company" size="30" /></td>
  </tr>
  <tr>
    <th>站长姓名：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_webmaster" id="pc_webmaster" size="30" /></td>
  </tr>
  <tr>
    <th>电话：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_phone" id="pc_phone" size="30" /></td>
  </tr>
  <tr>
    <th>手机：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_mobile" id="pc_mobile" size="30" /></td>
  </tr>
  <tr>
    <th>传真：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_fax" id="pc_fax" size="30" /></td>
  </tr>
  <tr>
    <th>邮箱：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_email" id="pc_email" size="30" /></td>
  </tr>
  <tr>
    <th>QQ：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_qq" id="pc_qq" size="30" /></td>
  </tr>
  <tr>
    <th>QQ列表：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_qqlist" id="pc_qqlist" size="60" /><br /><span>(有多个QQ号码，请在每个号码之间使用半角;分隔)</span></td>
  </tr>
  <tr>
    <th>网站欢迎语句：</th>
    <td class="y-bg"><textarea name="pc_welcome" id="pc_welcome" cols="60" rows="5" class="input-text"></textarea></td>
  </tr>
  <tr>
    <th>网站公告语句：</th>
    <td class="y-bg"><textarea name="pc_announce" id="pc_announce" cols="60" rows="5" class="input-text"></textarea></td>
  </tr>
  <tr>
    <th>备注：</th>
    <td class="y-bg"><textarea name="pc_remark" id="pc_remark" cols="60" rows="5" class="input-text"></textarea></td>
  </tr>
  <tr>
    <th>头部统计代码：</th>
    <td class="y-bg"><textarea name="pc_topcode" id="pc_topcode" cols="60" rows="5" class="input-text"></textarea></td>
  </tr>
  <tr>
    <th>底部统计代码：</th>
    <td class="y-bg"><textarea name="pc_bottomcode" id="pc_bottomcode" cols="60" rows="5" class="input-text"></textarea></td>
  </tr>
  <tr style="display:none;">
    <th>分页记录数：</th>
    <td class="y-bg">
        <p style="padding:5px 0;">新闻 <input type="text" class="input-text" name="pc_pagenews" id="pc_pagenews" maxlength="4" size="4" value="10" />
        产品 <input type="text" class="input-text" name="pc_pageproduct" id="pc_pageproduct" maxlength="4" size="4" value="12" />
        图片 <input type="text" class="input-text" name="pc_pagepicture" id="pc_pagepicture" maxlength="4" size="4" value="12" /></p>
        <p style="padding:5px 0;">下载 <input type="text" class="input-text" name="pc_pagedownload" id="pc_pagedownload" maxlength="4" size="4" value="10" />
        视频 <input type="text" class="input-text" name="pc_pagevideo" id="pc_pagevideo" maxlength="4" size="4" value="12" />
        首页链接 <input type="text" class="input-text" name="pc_indexlinkcount" id="pc_indexlinkcount" maxlength="4" size="4" value="35" /></p>
        </td>
  </tr>
  <tr style="display:none;">
    <th>网站ip数：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_ipcount" id="pc_ipcount" maxlength="8" size="10" value="0" /></td>
  </tr>
  <tr>
    <th>浏览次数：</th>
    <td class="y-bg"><input type="text" class="input-text" name="pc_views" id="pc_views" maxlength="8" size="10" value="1" /></td>
  </tr>
</table>
</fieldset>
<div class="bk15"></div>
<fieldset>
	<legend><?php echo L('seo_configuration')?></legend>
	<table width="100%"  class="table_form">
  <tr>
    <th width="80"><?php echo L('site_title')?>：</th>
    <td class="y-bg"><input type="text" class="input-text" name="site_title" id="site_title" size="60" /></td>
  </tr>
  <tr>
    <th><?php echo L('keyword_name')?>：</th>
    <td class="y-bg"><input type="text" class="input-text" name="keywords" id="keywords" size="60" /></td>
  </tr>
    <tr>
    <th><?php echo L('description')?>：</th>
    <td class="y-bg"><textarea name="description" cols="60" rows="5" id="description" class="input-text"></textarea></td>
  </tr>
</table>
</fieldset>
<div class="bk15"></div>
<fieldset>
	<legend><?php echo L('release_point_configuration')?></legend>
	<table width="100%"  class="table_form">
  <tr>
    <th width="80" valign="top"><?php echo L('release_point')?>：</th>
    <td> <select name="release_point[]" size="3" id="release_point" multiple title="<?php echo L('ctrl_more_selected')?>">
    		<option value='' selected><?php echo L('not_use_the_publishers_some')?></option>
    <?php if(is_array($release_point_list) && !empty($release_point_list)): foreach($release_point_list as $v):?>
		  <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
	<?php endforeach;endif;?>
		</select> </td>
		
  </tr>
</table>
</fieldset>
<div class="bk15"></div>
<fieldset>
	<legend><?php echo L('template_style_configuration')?></legend>
	<table width="100%"  class="table_form">
  <tr>
    <th width="80" valign="top"><?php echo L('style_name')?>：</th>
    <td class="y-bg"> <select name="template[]" size="3" id="template" multiple title="<?php echo L('ctrl_more_selected')?>" onchange="default_list()">
    	<?php if(is_array($template_list)):
    		foreach ($template_list as $key=>$val):
    	?>
		  <option value="<?php echo $val['dirname']?>"><?php echo $val['name']?></option>
		  <?php endforeach;endif;?>
		</select></td>
  </tr>
   </tr>
    <tr>
    <th width="80" valign="top"><?php echo L('default_style')?>：<input type="hidden" name="default_style" id="default_style_input" value="0"></th>
    <td class="y-bg"><span id="default_style"><input type="radio" name="default_style_radio" disabled></span><span id="default_style_msg"></span></td>
  </tr>
</table>
<script type="text/javascript">
function default_list() {
	var html = '';
	var old = $('#default_style_input').val();
	var checked = '';
	$('#template option:selected').each(function(i,n){
		if (old == $(n).val()) {
			checked = 'checked';
		}
		 html += '<label><input type="radio" name="default_style_radio" value="'+$(n).val()+'" onclick="$(\'#default_style_input\').val(this.value);" '+checked+'> '+$(n).text()+'</label>';
	});
	if(!checked)  $('#default_style_input').val('0');
	$('#default_style').html(html);
}
</script>
</fieldset>
<div class="bk15"></div>
<fieldset>
	<legend><?php echo L('site_att_config')?></legend>
	<table width="100%"  class="table_form">
  <tr>
    <th width="130" valign="top"><?php echo L('site_att_upload_maxsize')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[upload_maxsize]" id="upload_maxsize" size="10" value="2000"/> KB </td>
  </tr>
  <tr>
    <th width="130" valign="top"><?php echo L('site_att_allow_ext')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[upload_allowext]" id="upload_allowext" size="65" value="jpg|jpeg|gif|bmp|png|doc|docx|xls|xlsx|ppt|pptx|pdf|txt|rar|zip|iso|swf|flv|mp4|ipa|apk|wps"/></td>
  </tr>    
    <tr>
    <th><?php echo L('site_att_upload_maxsize')?> </th>
    <td class="y-bg"><?php echo $this->check_gd()?></td>
  <tr>
    <th><?php echo L('site_att_watermark_enable')?></th>
    <td class="y-bg">
	  <input class="radio_style" name="setting[watermark_enable]" value="1" type="radio"> <?php echo L('site_att_watermark_open')?>&nbsp;&nbsp;&nbsp;&nbsp;
	  <input class="radio_style" name="setting[watermark_enable]" value="0" checked="checked" type="radio"><?php echo L('site_att_watermark_close')?>
     </td>
  </tr>    
  <tr>
    <th><?php echo L('site_att_watermark_condition')?></th>
    <td class="y-bg"><?php echo L('site_att_watermark_minwidth')?>
<input type="text" class="input-text" name="setting[watermark_minwidth]" id="watermark_minwidth" size="10" value="300" /> X <?php echo L('site_att_watermark_minheight')?><input type="text" class="input-text" name="setting[watermark_minheight]" id="watermark_minheight" size="10" value="300" /> PX
     </td>
  </tr>
  <tr>
    <th width="130" valign="top"><?php echo L('site_att_watermark_img')?></th>
    <td class="y-bg"><input type="text" class="input-text"  name="setting[watermark_img]" id="watermark_img" size="30" value="mark.png" /> <?php echo L('site_att_watermark_img_desc')?></td>
  </tr> 
   <tr>
    <th width="130" valign="top"><?php echo L('site_att_watermark_pct')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[watermark_pct]" id="watermark_pct" size="10" value="100" />  <?php echo L('site_att_watermark_pct_desc')?></td>
  </tr> 
   <tr>
    <th width="130" valign="top"><?php echo L('site_att_watermark_quality')?></th>
    <td class="y-bg"><input type="text" class="input-text" name="setting[watermark_quality]" id="watermark_quality" size="10" value="80" /> <?php echo L('site_att_watermark_quality_desc')?></td>
  </tr> 
   <tr>
    <th width="130" valign="top"><?php echo L('site_att_watermark_pos')?></th>
    <td class="y-bg">
    <table width="100%" class="radio-label">
  <tr>
  <td rowspan="3"><input class="radio_style" name="setting[watermark_pos]" value="10" type="radio" > <?php echo L('site_att_watermark_pos_10')?></td>
    <td><input class="radio_style" name="setting[watermark_pos]" value="1" type="radio" > <?php echo L('site_att_watermark_pos_1')?></td>
	  <td><input class="radio_style" name="setting[watermark_pos]" value="2" type="radio"> <?php echo L('site_att_watermark_pos_2')?></td>
	  <td><input class="radio_style" name="setting[watermark_pos]" value="3" type="radio"> <?php echo L('site_att_watermark_pos_3')?></td>
  </tr>
  <tr>
    <td><input class="radio_style" name="setting[watermark_pos]" value="4" type="radio"> <?php echo L('site_att_watermark_pos_4')?></td>
	  <td><input class="radio_style" name="setting[watermark_pos]" value="5" type="radio"> <?php echo L('site_att_watermark_pos_5')?></td>
	  <td><input class="radio_style" name="setting[watermark_pos]" value="6" type="radio" > <?php echo L('site_att_watermark_pos_6')?></td>
    </tr>
  <tr>
    <td><input class="radio_style" name="setting[watermark_pos]" value="7" type="radio"> <?php echo L('site_att_watermark_pos_7')?></td>
	  <td><input class="radio_style" name="setting[watermark_pos]" value="8" type="radio"> <?php echo L('site_att_watermark_pos_8')?></td>
	  <td><input class="radio_style" name="setting[watermark_pos]" value="9" type="radio" checked> <?php echo L('site_att_watermark_pos_9')?></td>
    </tr>
</table>
</td></tr>
</table>
</fieldset>
</div>
<div class="bk15"></div>
    <input type="submit" class="dialog" id="dosubmit" name="dosubmit" value="<?php echo L('submit')?>" />
</div>
</div>
</form>
</body>
</html>