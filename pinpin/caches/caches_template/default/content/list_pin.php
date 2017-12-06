<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header_min"); ?>
<div class="main" style="background: #F1F2F3;padding-bottom: 54px;">
    <div class="shuaixuan">
        <div class="shuaixuan_top">
            <div class="item border" style="display:block;" id="video_type">
                <label>分类：</label>
                <ul>
                    <li class="li_active" data-val="0"><a href="javascript:;">全部</a></li>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=2c38d26649f9d03466e68202c362fd7b&sql=select+%2A+from+jzk_model_field+where+fieldid%3D116\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_model_field where fieldid=116 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $zz) { ?>
                        <?php $yy = string2array($zz[setting]);?>
                        <?php $xx = explode("\r\n",$yy[options]);?>
                        <?php $n=1;if(is_array($xx)) foreach($xx AS $ww) { ?>
                            <?php $vv = explode("|",$ww);?>
                            <li data-val="<?php echo $vv['1'];?>"><a href="javascript:;"><?php echo $vv['0'];?></a></li>
                        <?php $n++;}unset($n); ?>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                </ul>
                <div style="clear: both;"></div>
            </div>
            <div class="item" style="display: block;" id="video_where">
                <label>地区：</label>
                <ul>
                    <li class="li_active" data-val="0"><a href="javascript:;">全部</a></li>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=bc2d9d92e565048b9b6ad2973ee61cd8&sql=select+%2A+from+jzk_model_field+where+fieldid%3D117\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_model_field where fieldid=117 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $zz) { ?>
                        <?php $yy = string2array($zz[setting]);?>
                        <?php $xx = explode("\r\n",$yy[options]);?>
                        <?php $n=1;if(is_array($xx)) foreach($xx AS $ww) { ?>
                            <?php $vv = explode("|",$ww);?>
                            <li data-val="<?php echo $vv['1'];?>"><a href="javascript:;"><?php echo $vv['0'];?></a></li>
                        <?php $n++;}unset($n); ?>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
                <div style="clear: both;"></div>
            </div>
            <div class="item" style="display: block;" id="video_style">
                <label>类型：</label>
                <ul>
                    <li class="li_active" data-val="0"><a href="javascript:;">全部</a></li>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=667ebd1897401066cc6a96c1ee204e0f&sql=select+%2A+from+jzk_model_field+where+fieldid%3D118\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_model_field where fieldid=118 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $zz) { ?>
                        <?php $yy = string2array($zz[setting]);?>
                        <?php $xx = explode("\r\n",$yy[options]);?>
                        <?php $n=1;if(is_array($xx)) foreach($xx AS $ww) { ?>
                            <?php $vv = explode("|",$ww);?>
                            <li data-val="<?php echo $vv['1'];?>"><a href="javascript:;"><?php echo $vv['0'];?></a></li>
                        <?php $n++;}unset($n); ?>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
                <div style="clear: both;"></div>
            </div>
            <div class="item" style="display: block;" id="video_uptime">
                <label>系列：</label>
                <ul>
                    <li class="li_active" data-val="0"><a href="javascript:;">全部</a></li>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=fb40c338fbb7f3b3008238591befd168&sql=select+%2A+from+jzk_model_field+where+fieldid%3D124\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from jzk_model_field where fieldid=124 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $zz) { ?>
                        <?php $yy = string2array($zz[setting]);?>
                        <?php $xx = explode("\r\n",$yy[options]);?>
                        <?php $n=1;if(is_array($xx)) foreach($xx AS $ww) { ?>
                            <?php $vv = explode("|",$ww);?>
                            <li data-val="<?php echo $vv['1'];?>"><a href="javascript:;"><?php echo $vv['0'];?></a></li>
                        <?php $n++;}unset($n); ?>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
                <div style="clear: both;"></div>
            </div>
        </div>
        <div class="shuaixuan_content">
            <div class="selecttype">
                <label>排序：</label>
                <ul>
                    <li class="li_active" data-val="0"><a href="javascript:;">最近更新</a></li>
                    <li data-val="1"><a href="javascript:;">最多评论</a></li>
                    <li data-val="2"><a href="javascript:;">最受欢迎</a></li>
                </ul>
                <!-- <div class="all_num">共<b><span id="total_videonum">***</span></b>个筛选结果</div> -->
                <div style="clear: both;"></div>
            </div>
            
            <script type="text/javascript">
            $(".shuaixuan_top ul li").click(function(){
                $(this).addClass("li_active");
                $(this).siblings().removeClass("li_active");
                var arr = new Array();
                $(".li_active").each(function(){
                    arr.push($(this).text()+"|"+$(this).attr("data-val"));
                });
                var str = arr.join(",");
                $.ajax({
                    type: "POST",  
                    url: "/php/select_pin.php", 
                    data:{str:str},
                    dataType: "json",
                    success: function(data) {
                        var json = eval(data);
                        var content = "";
                        $('.show_content ul').empty(); 
                        for (var i=0; i<json.length; i++){
                            content += '<li>\n'+
                                '<div class="show_movie">\n' +
                                '<div class="movie_thumb">\n' +
                                    '<a href="' + json[i].url +'" title="' + json[i].title + '" target="_blank" style="display: block;">\n' +
                                    '<img src="'+ json[i].thumb +'" alt="'+ json[i].title +'" style="width: 100%;height: 300px;">\n' +
                                    '</a>\n' +
                                '</div>\n' +
                            '<div class="movie_title"><a href="'+ json[i].url +'" title="'+ json[i].title +'" target="_blank">'+ json[i].title +'</a></div>\n' +
                            '<div class="movie_actor"><em>主演：</em>'+ json[i].actors +'</div>\n' +
                            '<div class="movie_click">'+ json[i].hits +'次点击</div>\n' +
                        '</div>\n' +
                    '</li>\n';
                        }
                        $('.show_content ul').append(content); 
                    },
                });
            });
            $(".selecttype ul li").click(function(){
                $(this).addClass("li_active");
                $(this).siblings().removeClass("li_active");
                var arr = new Array();
                $(".li_active").each(function(){
                    arr.push($(this).text()+"|"+$(this).attr("data-val"));
                });
                var str = arr.join(",");
                $.ajax({
                    type: "POST",  
                    url: "/php/select_pin.php", 
                    data:{str:str},
                    dataType: "json",
                    success: function(data) {
                        var json = eval(data);
                        var content = "";
                        $('.show_content ul').empty(); 
                        for (var i=0; i<json.length; i++){
                            content += '<li>\n'+
                                '<div class="show_movie">\n' +
                                '<div class="movie_thumb">\n' +
                                    '<a href="' + json[i].url +'" title="' + json[i].title + '" target="_blank" style="display: block;">\n' +
                                    '<img src="'+ json[i].thumb +'" alt="'+ json[i].title +'" style="width: 100%;height: 300px;">\n' +
                                    '</a>\n' +
                                '</div>\n' +
                            '<div class="movie_title"><a href="'+ json[i].url +'" title="'+ json[i].title +'" target="_blank">'+ json[i].title +'</a></div>\n' +
                            '<div class="movie_actor"><em>主演：</em>'+ json[i].actors +'</div>\n' +
                            '<div class="movie_click">'+ json[i].hits +'次点击</div>\n' +
                        '</div>\n' +
                    '</li>\n';
                        }
                        $('.show_content ul').append(content); 
                    },
                });
            });
            
            </script>

            <div style="clear: both;"></div>
            
            <div class="show_content">
                <ul>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=91cc9c354fa0f0297f3708090ec24cc2&action=lists&catid=2&order=listorder+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'2','order'=>'listorder desc','limit'=>'20',));}?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $a) { ?>
                    <li>
                        <div class="show_movie">
                            <div class="movie_thumb">
                                <a href="<?php echo $a['url'];?>" title="<?php echo $a['title'];?>" target="_blank" style="display: block;">
                                <img src="<?php echo $a['thumb'];?>" alt="<?php echo $a['title'];?>" style="width: 100%;height: 300px;"></a>
                            </div>
                            <div class="movie_title"><a href="<?php echo $a['url'];?>" title="<?php echo $a['title'];?>" target="_blank"><?php echo $a['title'];?></a></div>
                            <div class="movie_actor"><em>主演：</em><?php echo $a['actors'];?></div>
                            <div class="movie_click"><?php echo $a['hits'];?>次点击</div>
                        </div>
                    </li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    <div style="clear: both;"></div>
                </ul>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
</div>
<?php include template("content","footer_min"); ?>