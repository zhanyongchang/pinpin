<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php 
    $temp="0";
    switch($catid) {
        case "4":
            $temp="0";
            break;
        case "20":
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
                    <div class="news_4">   
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=7f389b243a001c810cc8f4e998e9511b&action=lists&catid=%24catid&num=12&order=listorder+DESC%2Cid+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 12;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'listorder DESC,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'listorder DESC,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>             
                         <div class="divHonorShow">
                            <div class="divHonorShow_1">
                                <a href='<?php echo $r['url'];?>' title='<?php echo $r['title'];?>' target="_blank"><img src='<?php echo getImgPath($r[thumb]);?>' alt='<?php echo $r['title'];?>' onload="DrawImage(this,160,120)" /></a>
                            </div>
                            <div class="divHonorShow_2">
                                <a href='<?php echo $r['url'];?>' title='<?php echo $r['title'];?>' target="_blank"><?php echo str_cut($r[title],40,'...');?></a>
                            </div>
                        </div>     
<?php $n++;}unset($n); ?>
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