<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>    
            <div class="left">
                <div class="left_1">
                    <strong>产品分类</strong><span><a href="<?php echo $CATEGORYS['3']['url'];?>" class="white">更多>></a></span>
                </div>
                <div class="left_2">
                    <div id="masterdiv">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3a729369c45e7d202e2083498c0134f9&action=category&catid=3&num=20&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'3','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'20',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                        <div id="div<?php echo $v['catid'];?>" class="menudiv">
                            <dl id="Usub<?php echo $v['catid'];?>" class="<?php if($catid==$v[catid] || $CAT[parentid]==$v[catid] || $CATEGORYS[$catid][parentid]==$v[catid]) { ?>menutitleSub<?php } else { ?>menutitle<?php } ?>" onclick="SwitchMenu('<?php echo $v['catid'];?>')"><a href="<?php echo $v['url'];?>" title="<?php echo $v['catname'];?>"><?php echo $v['catname'];?></a></dl>
                            <ul id="sub<?php echo $v['catid'];?>" class="submenu" style="display:<?php if($catid==$v[catid] || $CAT[parentid]==$v[catid] || $CATEGORYS[$catid][parentid]==$v[catid]) { ?>block<?php } else { ?>none<?php } ?>">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ea66b7cc0dd7b0891c1c373328a8833a&action=category&catid=%24v%5Bcatid%5D&num=20&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$v[catid],'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'20',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li id="li<?php echo $v['catid'];?>_<?php echo $r['catid'];?>" class="checkstyle"><a href="<?php echo $r['url'];?>" title="<?php echo $r['catname'];?>"><?php echo $r['catname'];?></a></li>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                            </ul>
                        </div>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </div>
                </div>
                <div class="left_1 mt10">
                    <strong>解决方案</strong><span><a href="<?php echo $CATEGORYS['19']['url'];?>" class="white">更多>></a></span>
                </div>
                <div class="left_4">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=10e4031ebe4557b00dff2fb1a83c56b9&action=lists&catid=19&num=1&order=listorder+DESC%2Cid+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'19','order'=>'listorder DESC,id DESC','limit'=>'1',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                    <dl>
                        <dt><a href='<?php echo $v['url'];?>' title='<?php echo $v['title'];?>' target="_blank"><img alt='<?php echo $v['title'];?>' src='<?php echo getImgPath($v[thumb]);?>' onload="DrawImage(this,227,60)" /></a></dt>
                    </dl>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    <ul>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=26d241c3ce7b8b3f20d48e0a665ac160&action=lists&catid=19&num=5&order=listorder+DESC%2Cid+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'19','order'=>'listorder DESC,id DESC','limit'=>'5',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                        <li><a href='<?php echo $v['url'];?>' title='<?php echo $v['title'];?>' target="_blank" class="black"><?php echo str_cut($v[title],48,'...');?></a></li>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </ul>
                </div>
                <div class="left_1 mt10">
                    <strong>荣誉资质</strong><span><a href="<?php echo $CATEGORYS['4']['url'];?>" class="white">更多>></a></span>
                </div>
                <div class="left_4">
                    <div id="tickerContainer">
                        <dl id="ticker">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f9e53fc3c76ca510f586150b0ac3cfa9&action=lists&catid=4&num=4&order=listorder+DESC%2Cid+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'4','order'=>'listorder DESC,id DESC','limit'=>'4',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
    <dt class="heading"><a href='<?php echo $v['url'];?>' target="_blank" title='<?php echo $v['title'];?>'><img src='<?php echo getImgPath($v[thumb]);?>' onload="DrawImage(this,220,165)" alt='<?php echo $v['title'];?>' /></a></dt>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        </dl>
                    </div>
                </div>
                <div class="left_1 mt10">
                    <strong>联系我们</strong><span><a href="<?php echo $CATEGORYS['8']['url'];?>" class="white">更多>></a></span>
                </div>
                <div class="left_4">
                    <div class="divContactUs">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=fa86c58299faf935a37b1c7417bcb15a&sql=SELECT+%2A+FROM+jzk_page+WHERE+catid%3D12\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM jzk_page WHERE catid=12 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
    <?php echo $val['content'];?>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                    </div>
                </div>
            </div>
