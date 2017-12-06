<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
    <div class="layout-wrapper" id="movieReviews">
        <div class="layout movieReviews">
            <h3 class="movieReviews-title">大家拼片子</h3>
            <div class="pin_movie">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=47a68c1f7e2463255ce49c3ed5f60bcf&action=position&posid=2&catid=2&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'2','catid'=>'2','order'=>'listorder DESC','limit'=>'20',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $aa) { ?>
                <figure class="frame-room hot-item ">
                    <div class="hot-picWrapper picHover">
                        <a href="<?php echo $aa['url'];?>" title="<?php echo $aa['title'];?>" target="_blank" data-hrefexp="fr=homepc_rbdp_rbdp">
                            <img src="<?php echo $aa['thumb'];?>" alt="<?php echo $aa['title'];?>" style="display: inline;width: 160px;">
                            <span class="hot-score">7.2</span>
                        </a>
                    </div>
                    <figcaption class="hot-description">
                        <p class="title-hot">
                            <a href="<?php echo $aa['url'];?>" title="<?php echo $aa['title'];?>" target="_blank"><?php echo $aa['title'];?></a>
                        </p>
                        <p class="context-hot"><?php echo $aa['description'];?></p>
                    </figcaption>
                </figure>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                <div style="clear: both;"></div>
            
            </div>
            <div class="buttonRadiusMore">
                <a class="buttonRadiusMore-button" href="/html/list-2-1.html" target="_blank">查看更多</a>
            </div>
        </div>
    </div>

    <div class="layout-wrapper" id="level">
        <div class="layout">
            <div class="frame news">
                <div class="news-roomImportant frame-room">
                    <div class="news-title"><span>收藏排行榜</span></div>
                    <ul>
                        <li>1</li>
                        <li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li><li>1</li>
                    </ul>
                </div>
                <div class="news-roomFast frame-room">
                    <div class="news-title"><span>点赞排行榜</span></div>
                    <ul>
                        <li>2</li>
                        <li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li><li>2</li>
                    </ul>
                    
                </div>
                <div class="news-roomDeep frame-room">
                    <div class="news-title"><span>下载排行榜</span></div>
                    <ul>
                        <li>3</li>
                        <li>3</li><li>3</li><li>3</li><li>3</li><li>3</li><li>3</li><li>3</li><li>3</li><li>3</li><li>3</li><li>3</li><li>3</li><li>3</li><li>3</li><li>3</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="layout-wrapper" style="background: #fff;">
        <div class="layout">
            <div class="column-title">会员推荐</div>
            <div class="frame">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=7b5c6ac9400b184f47210b2bec302f30&action=position&posid=1&catid=1&order=listorder+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'1','catid'=>'1','order'=>'listorder desc','limit'=>'20',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $bb) { ?>
                <figure class="frame-room hot-item">
                    <div class="hot-picWrapper picHover">
                        <a href="<?php echo $bb['url'];?>" title="<?php echo $bb['title'];?>" target="_blank">
                            <img src="<?php echo $bb['thumb'];?>" alt="<?php echo $bb['title'];?>" style="display: inline;width: 160px;">
                            <span class="hot-score">**</span>
                            <span class="hot-flag hot-flag-free">最新更新</span>
                        </a>
                    </div>
                    <figcaption class="hot-description">
                        <p class="title-hot">
                            <a href="<?php echo $bb['url'];?>" title="<?php echo $bb['title'];?>" target="_blank" style="color: #333;"><?php echo $bb['title'];?></a>
                        </p>
                        <p class="context-hot"><?php echo $bb['description'];?></p>
                    </figcaption>
                </figure>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
            <div class="buttonRadiusMore">
                <a class="buttonRadiusMore-button" href="/html/list-1-1.html" target="_blank">查看更多</a>
            </div>
        </div>
    </div>

    <div class="layout-wrapper" id="watchtell">
        <div class="layout watchtell">
            <h3 class="movieReviews-title">观后有话</h3>
            <div class="movieReviews-conts clearfix" id="marquee">
                <ul>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=a5e6ff5c00d4b30770f2c6fd364e6d61&sql=select+%2A+from+jzk_comment_data_1+where+reply%3D0\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_comment_data_1 where reply=0 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $cc) { ?>
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=bf143ad430cf621c446398cd2b1548fd&sql=select+%2A+from+jzk_comment+where+commentid%3D%27%24cc%5Bcommentid%5D%27&return=data1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_comment where commentid='$cc[commentid]' LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data1 = $a;unset($a);?>
                    <li>
                        <?php if($cc[userid]>0) { ?>
                        <div class="afterwatch_thumb"><img src="<?php echo get_memberavatar($cc[userid],1,45);?>"></div>
                        <?php } else { ?>
                        <div class="afterwatch_thumb"><img src="<?php echo IMG_PATH;?>pinpin/noavatar_small.gif"></div>
                        <?php } ?>
                        <div class="afterwatch_who"><?php echo $cc['username'];?></div>
                        <div class="afterwatch_text"><?php echo $cc['content'];?></div>
                        <div class="afterwatch_from">来自<a href="<?php echo $data1['0']['url'];?>">《<?php echo $data1['0']['title'];?>》</a>的评论</div>
                    </li>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
                <script type="text/javascript">
                    new Marquee("marquee","top",1,734,330,50,5000);
                </script>
            </div>
            <div class="buttonRadiusMore">
                <a class="buttonRadiusMore-button" href="/html/list-2-1.html" target="_blank">查看更多</a>
            </div>
        </div>
        <div class="news-roomImportant dowm-room">
            <div class="news-title"><span>下载排行榜</span></div>
            <ul>
                <li>4</li>
                <li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li><li>4</li>
            </ul>
        </div>
        <div style="clear: both;"></div>
    </div>







</div>

<?php include template("content","footer"); ?>