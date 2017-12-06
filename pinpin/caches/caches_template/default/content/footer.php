<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><footer class="footer_my">
    <div class="footer-inner">
        <div style="width: 120px;padding: 20px 0;"><img src="<?php echo $siteinfo['pc_logo'];?>" style="width: 100%;"></div>
        <div class="sp"></div>
        <div class="footer-inner-links">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=39d8ccf8d530289992e2651239a5ffd6&action=type_list&siteid=%24siteid&order=listorder+DESC&return=dat\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'type_list')) {$dat = $link_tag->type_list(array('siteid'=>$siteid,'order'=>'listorder DESC','limit'=>'20',));}?>
        <?php $n=1;if(is_array($dat)) foreach($dat AS $v) { ?>
        <a href="<?php echo $v['url'];?>" target="_blank" data-hrefexp="fr=homepc_bottom" style="color: #fff;"><?php echo $v['name'];?></a><span>|</span>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

        </div>

    </div>
</footer>
</body>
</html>
