<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>    
<div class="left">
    <div class="left_1">
        <strong>影片推荐</strong><span><a href="<?php echo $CATEGORYS['1']['url'];?>" class="white">更多>></a></span>
    </div>
    <div class="left_2">
        <div id="masterdiv">
            <ul>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e5144b8ebea45b671c0cd05753a72c40&action=position&posid=17&catid=1&order=listorder+DESC&num=20\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'17','catid'=>'1','order'=>'listorder DESC','limit'=>'20',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $nn) { ?> 
                <li><a href="<?php echo $nn['url'];?>"><?php echo $nn['title'];?></a></li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
</div>

<div class="left">
    <div class="left_1">
        <strong>拼片推荐</strong><span><a href="<?php echo $CATEGORYS['2']['url'];?>" class="white">更多>></a></span>
    </div>
    <div class="left_2">
        <div id="masterdiv">
            <ul>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0dc679765051ef97bf867193e26b5033&action=position&posid=16&catid=2&order=listorder+DESC&num=20\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'16','catid'=>'2','order'=>'listorder DESC','limit'=>'20',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $nn) { ?> 
                <li><a href="<?php echo $nn['url'];?>"><?php echo $nn['title'];?></a></li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
</div>