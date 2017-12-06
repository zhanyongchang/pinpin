<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php 
    $temp="0";
    switch($catid) {
        case "2":
            $temp="0";
            break;
        case "5":
            $temp="0";
            break;
    }
?>
    <input type="hidden" id="temp" value="<?php echo $temp;?>" />
    <div class="main">
        <div class="indexCenter">
            <div class="indexLeft">
                <input type="hidden" id="left_id" value="0" />
                <?php include template("content","left2"); ?>
            </div>
            <div class="indexRight">
                <div class="right_1"></div>
                <div class="neiye_line2Video">
                    <div class="right_2">
                        <div class="right_3">
                            当前位置：<a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?>
                        </div>
                    </div>
                    <div class="zixun">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=69a2e8c835df4ca56cc91e86c3d1d56e&action=lists&catid=%24catid&num=10&order=listorder+DESC%2Cid+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 10;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'listorder DESC,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'listorder DESC,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
                        <ul>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                            <li><em class="fr"><?php echo date('Y-m-d H:i:s',$r[inputtime]);?></em><a href="<?php echo $r['url'];?>" target="_blank" title='<?php echo $r['title'];?>'><?php echo str_cut($r[title],80,'...');?></a></li>
<?php $n++;}unset($n); ?>
                        </ul>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>   
                    </div>
                    <div class="pagesDiv" id="pages">
                        <div class="pagination">
                            <?php echo $pages;?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include template("content","footer"); ?>