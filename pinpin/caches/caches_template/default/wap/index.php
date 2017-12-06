<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("wap","header"); ?>
    <div class="clear"></div>
    <div class="search">
        <script type="text/javascript" src="<?php echo JS_PATH;?>wap/search.js"></script>
        <form id="formsearch" name="formsearch" action="<?php echo APP_PATH;?>index.php" method="get" target="_blank">
            <div class="searchA">
                <input type="text" maxlength="20" name="q" id="q" value="请输入关键字" onfocus="if(this.value=='请输入关键字'){this.value='';}" onblur="if(this.value==''){this.value='请输入关键字';}" />
            </div>
            <div class="searchB">
                <input type="hidden" name="m" value="search" />
                <input type="hidden" name="c" value="index" />
                <input type="hidden" name="a" value="init" />
                <input type="hidden" name="typeid" value="1" id="typeid" />
                <input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid" />
                <input type="hidden" name="mobile" id="mobile" value="1" />
                <input type="button" id="btnsearch" name="btnsearch" value="搜 索" />
            </div>
        </form>
    </div>
    <div class="clear"></div>
    <div id="slides" class="slider-focus">
        <div class="bd">
            <div class="tempWrap">
                <ul>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=f8406a9374fd7d279e35d7edc8b1e719&sql=SELECT+id%2Cname%2Csetting+FROM+jzk_poster+WHERE+spaceid%3D3+AND+type%3D%27images%27+AND+siteid%3D%24siteid+AND+disabled%3D0+ORDER+BY+id+DESC&num=4\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT id,name,setting FROM jzk_poster WHERE spaceid=3 AND type='images' AND siteid=$siteid AND disabled=0 ORDER BY id DESC LIMIT 4");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
<?php $narry=json_decode($r[setting],true);?>
<li><a href="<?php echo $narry['1']['linkurl'];?>" target="_blank"><img src="<?php echo $narry['1']['imageurl'];?>" alt="<?php echo $narry['1']['alt'];?>" /></a></li>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        </div>
        <div class="hd">
            <ul>
            </ul>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo JS_PATH;?>wap/TouchSlide.1.1.js"></script>
    <script type="text/javascript">
    TouchSlide({ 
        slideCell:"#slides",
        titCell:".hd ul",
        mainCell:".bd ul", 
        effect:"leftLoop", 
        autoPage:true,
        delayTime:"200",
        interTime:"5000",
        autoPlay:true
    });
    </script>
    <div class="clear"></div>
    <div class="ContentA">
        <div class="content_title">
            <div class="xian"></div>
            <div class="wenzi">
                <p><strong>关于我们</strong><br />ABOUT US</p>
            </div>
        </div>
        <div class="ContentA2">
            <div class="ContentA2b">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=f2f5eb17291181a2194d95a91d25a88d&sql=SELECT+%2A+FROM+jzk_page+WHERE+catid%3D16\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM jzk_page WHERE catid=16 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
    <?php echo $val['content'];?>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
        <div class="content_more"><a href="<?php echo page_url(1);?>">了解更多 &gt;&gt; </a></div>
    </div>
    <div class="clear"></div>
    <div class="ContentB mt10">
        <div class="content_title">
            <div class="xian"></div>
            <div class="wenzi wenziOnly">
                <p><strong>产品分类</strong></p>
            </div>
        </div>
        <div class="Menus1">
            <ul>
<?php $typeid=2;$typenum=0;?>
<?php $n=1;if(is_array(subtypeid($typeid))) foreach(subtypeid($typeid) AS $_s) { ?>
                <li><a href="<?php echo list_url($_s[typeid]);?>"><?php echo $_s['typename'];?></a></li>
<?php $typenum++;?> 
<?php if($typenum==6) break;?>
<?php $n++;}unset($n); ?>
            </ul>  
        </div>
        <div class="content_more"><a href="<?php echo list_url(2);?>">了解更多 &gt;&gt; </a></div>
    </div>
    <div class="clear"></div>
    <div class="ContentE mt10">
        <div class="content_title">
            <div class="xian"></div>
            <div class="wenzi">
                <p><strong>产品展示</strong><br />PRODUCTS</p>
            </div>
        </div>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"wap\" data=\"op=wap&tag_md5=1ebf542bd30fde9fd48b430902b465ab&action=lists&typeid=2&num=6&order=listorder+DESC%2Cid+DESC&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$wap_tag = pc_base::load_app_class("wap_tag", "wap");if (method_exists($wap_tag, 'lists')) {$info = $wap_tag->lists(array('typeid'=>'2','order'=>'listorder DESC,id DESC','limit'=>'6',));}?>
<?php $n=1;if(is_array($info)) foreach($info AS $i) { ?>
        <div class="ContentE2">
            <div class="ContentE2a"><a href="<?php echo show_url($i[catid],$i[id]);?>" target="_blank"><img src="<?php echo getImgPath($i[thumb]);?>" alt="<?php echo $i['title'];?>" /></a></div>
            <div class="ContentE2b"><a href="<?php echo show_url($i[catid],$i[id]);?>" target="_blank" class="black"><?php echo str_cut($i['title'],40,'...');?></a></div>
        </div>  
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <div class="content_more"><a href="<?php echo list_url(2);?>">了解更多 &gt;&gt; </a></div>
    </div>
    <div class="clear"></div>
    <div class="ContentC mt10">
        <div class="content_title">
            <div class="xian"></div>
            <div class="wenzi">
                <p><strong>最新资讯</strong><br />NEWS</p>
            </div>
        </div>
        <div class="newslist1">
            <ul>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"wap\" data=\"op=wap&tag_md5=bddb87ec491eb85a3fb90b9396dca1b9&action=lists&typeid=1&num=5&order=listorder+DESC%2Cid+DESC&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$wap_tag = pc_base::load_app_class("wap_tag", "wap");if (method_exists($wap_tag, 'lists')) {$info = $wap_tag->lists(array('typeid'=>'1','order'=>'listorder DESC,id DESC','limit'=>'5',));}?>
<?php $n=1;if(is_array($info)) foreach($info AS $i) { ?>
                <li><span class="fr"><?php echo date('Y-m-d',$i[inputtime]);?></span><a href="<?php echo show_url($i[catid],$i[id]);?>" target="_blank"><?php echo str_cut($i['title'],65,'...');?></a></li>
        
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
        <div class="content_more"><a href="<?php echo list_url(1);?>">了解更多 &gt;&gt; </a></div>
    </div>
    <div class="clear"></div>
    <div class="footnav">
        <ul>
            <li><a href="<?php echo page_url(1);?>" title="关于我们">关于我们</a></li>
            <li><a href="<?php echo list_url(2);?>" title="产品展示">产品展示</a></li>
            <li><a href="<?php echo list_url(1);?>" title="新闻中心">新闻中心</a></li>
            <li><a href="<?php echo page_url(8);?>" title="联系我们">联系我们</a></li>
        </ul>
    </div>
    <div class="clear"></div>
<?php include template("wap","footer"); ?>