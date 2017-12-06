<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header_min"); ?>
    <link href="<?php echo CSS_PATH;?>jqzoom.css" rel="stylesheet" type="text/css" />
    <input type="hidden" id="temp" value="<?php echo $temp;?>" />
    <div class="main">
        <div class="indexCenter">
            <div class="indexLeft">
                <?php include template("content","left2"); ?>
            </div>
            <div class="indexRight">
                <div class="right_1"></div>
                <div class="neiye_line2Video">
                    <div class="right_2">
                        <div class="right_3">
                            当前位置：<a href="/">首页</a><span> &gt; </span><?php echo catpos($catid);?>
                        </div>
                    </div>
                    <div class="details_2">
                        <div class="zx_top">
                            <h2><?php echo $title;?></h2>
                            <p><span>发布时间：<?php echo $inputtime;?></span><span>点击率：<span id="hits"></span></span></p>
                            <input id="Hidden1" type="hidden" value='<?php echo $id;?>' />
                        </div>
                        <div class="zx_middle">
                            <div class="zx_from">
                                <p><span></span></p>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div id="cntrBody" class="zx_txt">
                            <?php echo $content;?>

                        </div>
                        <div class="sxyip b">
                            <p><strong>上一篇：</strong><a href="<?php echo $previous_page['url'];?>"><?php echo str_cut($previous_page[title],120,'...');?></a></p>
                            <p><strong>下一篇：</strong><a href="<?php echo $next_page['url'];?>"><?php echo str_cut($next_page[title],120,'...');?></a></p>
                        </div>

                        <div class="clear"></div>

                        <?php if($allow_comment && module_exists('comment')) { ?>
                            <div class="divcomment"><iframe src="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=init&commentid=<?php echo id_encode("content_$catid",$id,$siteid);?>&iframe=1" width="100%" height="100%" id="comment_iframe" frameborder="0" scrolling="no"></iframe></div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>
<?php include template("content","footer_min"); ?>