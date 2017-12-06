<?php
// 注意：使用组件上传，不可以使用 $_FILES["Filedata"]["type"] 来判断文件类型
mb_http_input("utf-8");
mb_http_output("utf-8");

error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('PHPCMS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('CACHE_PATH', PHPCMS_PATH.'caches'.DIRECTORY_SEPARATOR);
define('SITE_URL', (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ''));
define('API_URL_GET_KEYWORDS', 'http://tool.phpcms.cn/api/get_keywords.php');
include '../phpcms/libs/functions/iconv.func.php';
include '../phpcms/libs/classes/http.class.php';
$config = include '../caches/configs/database.php';
$system = include '../caches/configs/system.php';
$uploadurl = $system['upload_url'];
$web_path = $system['web_path'];
define('CHARSET',$system['charset']);
$dbtype = $config['default']['type'];
$tablepre = $config['default']['tablepre'];
if(empty($tablepre) || $tablepre=="") {
    $tablepre = "jzk_";
}
switch($dbtype) {
	case 'mysql' :
		include PHPCMS_PATH.'../phpcms/libs/classes/mysql.class.php';
		$db = new mysql();
		break;
	case 'mysqli' :
		include PHPCMS_PATH.'../phpcms/libs/classes/db_mysqli.class.php';
		$db = new db_mysqli();
		break;
	default :
		include PHPCMS_PATH.'../phpcms/libs/classes/mysql.class.php';
		$db = new mysql();
		break;
}
$inputtime = time();
$catid = 0;
$typesid = 0;
$title = "";
$style = "";
$thumb = "";
$keywords = "";
$description = "";
$posids = 0;
$url = "";
$listorder = 0;
$status = 99;
$sysadd = 1;
$islink = 0;
$username = "jzkingadmin";
$updatetime = time();

$d_content = "";
$d_readpoint = 0;
$d_groupids_view = "";
$d_paginationtype = 0;
$d_maxcharperpage = 10000;
$d_template = "";
$d_paytype = 0;
$d_relation = "";
$d_voteid = 0;
$d_allow_comment = 1;
$d_copyfrom = "|0";

$att_module = "";
$att_catid = 0;
$att_filename = "";
$att_filepath = "";
$att_filesize = 0;
$att_fileext = "";
$att_isimage = 1;
$att_isthumb = 0;
$att_downloads = 0;
$att_userid = 1;
$att_uploadtime = time();
$att_uploadip = ip();
$att_status = 0;
$att_authcode = "";
$att_siteid = 1;

//---------------------------------------------------------------------------------------------
//组件设置a.MD5File为2，3时 的实例代码
if(getGet('access2008_cmd')=='2'){ // 提交MD5验证后的文件信息进行验证
	//getGet("access2008_File_name") 	'文件名
	//getGet("access2008_File_size")	'文件大小，单位字节
	//getGet("access2008_File_type")	'文件类型 例如.gif .png
	//getGet("access2008_File_md5")		'文件的MD5签名
	
	die('0'); //返回命令  0 = 开始上传文件， 2 = 不上传文件，前台直接显示上传完成
}
if(getGet('access2008_cmd')=='3'){ //提交文件信息进行验证
	//getGet("access2008_File_name") 	'文件名
	//getGet("access2008_File_size")	'文件大小，单位字节
	//getGet("access2008_File_type")	'文件类型 例如.gif .png
	
	die('1'); //返回命令 0 = 开始上传文件,1 = 提交MD5验证后的文件信息进行验证, 2 = 不上传文件，前台直接显示上传完成
}

//---------------------------------------------------------------------------------------------
$php_path = dirname(__FILE__) . '/';
$php_url = dirname($_SERVER['PHP_SELF']) . '/';
$typeid = getPost("select");
if(empty($typeid) || $typeid=="0" || $typeid=="") {
	exit("返回错误：请选择档案的主类别！");
}
$db->open($config['default']);
$catinfo = $db->get_one('`modelid`,`module`',$tablepre."category",'catid='.$typeid);
if($catinfo['modelid']) {
	$modelid = $catinfo['modelid'];
	$att_module = $catinfo['module'];
} 
else {
	$modelid = 1;
	$att_module = "content";
}
$modelinfo = $db->get_one('`tablename`',$tablepre."model",'type=0 AND modelid='.$modelid);
if($modelinfo['tablename']) {
	$tablename = $modelinfo['tablename'];
}
else {
	$tablename = 'news';
}
$tablename = $tablepre.$tablename;

//文件保存目录路径
$save_path = $php_path . '..'.$uploadurl.date("Y").'/';
//文件保存目录URL
$save_url = $php_url . '..'.$uploadurl.date("Y").'/';
$thumburl = $uploadurl.date("Y").'/';

//定义允许上传的文件扩展名
$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp', 'mp3');
//最大文件大小
$max_size = 1024*500;//(默认500K)
$save_path = realpath($save_path) . '/';

//有上传文件时
if (empty($_FILES) === false) {
    if(empty($typeid) || $typeid=="0" || $typeid=="") {
		exit("返回错误：请选择档案的主类别！");
	}
	//原文件名
	$file_name = $_FILES['Filedata']['name'];
	//服务器上临时文件名
	$tmp_name = $_FILES['Filedata']['tmp_name'];
	//文件大小
	$file_size = $_FILES['Filedata']['size'];
	//检查文件名
	if (!$file_name) {
		exit("返回错误: 请选择文件。");
	}
	//检查目录
	if (@is_dir($save_path) === false) {
		exit("返回错误: 上传目录不存在。($save_path)");
	}
	//检查目录写权限
	if (@is_writable($save_path) === false) {
		exit("返回错误: 上传目录没有写权限。($save_url)");
	}
	//检查是否已上传
	if (@is_uploaded_file($tmp_name) === false) {
		exit("返回错误: 临时文件可能不是上传文件。($file_name)($tmp_name)");
	}
	//检查文件大小
	if ($file_size > $max_size) {
		exit("返回错误: 上传文件($file_name)大小超过限制。最大".($max_size/1024)."KB");
	}
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$oldfile = array_shift($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
    if (in_array($file_ext, $ext_arr) === false) {
	    exit("返回错误: 上传文件扩展名是不允许的扩展名。");
    }
    
    echo "上传的文件: " . $file_name . "<br />";
    echo "文件类型: " . $file_ext . "<br />";
    echo "文件大小: " . ($file_size / 1024) . " Kb<br />";
    echo "临时文件: " . $tmp_name . "<br />";
	//创建文件夹
	$ymd = date("md");
	$thumburl .= $ymd . "/";
	$save_path .= $ymd . "/";
	$save_url .= $ymd . "/";
	if (!file_exists($save_path)) {
		mkdir($save_path);
	}
	//新文件名
	$new_file = date("YmdHi") . rand(10000, 99999);
	$new_file_name =  $new_file . '.' . $file_ext;
	//移动文件
	$file_path = $save_path . $new_file_name;
	@chmod($file_path, 0777);//修改目录权限(Linux)
	if (move_uploaded_file($tmp_name, $file_path) === false) {//开始移动
		exit("返回错误: 上传文件失败。($file_name)");
	}
	$file_url = $save_url . $new_file_name;
	$thumburl .= $new_file_name;
	//echo "原图：<a href=\"".$file_url."\" target=\"_blank\">[$file_url]</a><br />";
	//echo "所在目录：\"$save_url\"<br />";
	//echo "新文件名：\"$new_file_name\"<br />";
	//echo "保存路径：\"$thumburl\"<br />";
    //echo "原文件名: " . $oldfile."<br />";
	//echo "MD5效验：".getGet("access2008_File_md5")."<br />";
	//echo "<br />上传成功！你选择的是<font color='#ff0000'>".getPost("select")."</font>--<font color='#0000ff'>".getPost("select2")."</font>";
	//if(getPost("access2008_box_info_max")!=""){
	//  	echo "<br />组件文件列表统计,总数量：".getPost("access2008_box_info_max").",剩余：".((int)getPost("access2008_box_info_upload")-1).",完成：".((int)getPost("access2008_box_info_over")+1);
	//}
	//echo " <br />旋转角度：".getPost("access2008_image_rotation")."<br />";  
	//MP3信息
	//outMP3Info();
	
	//---------------------------------------------------------------------------------------------  
	$catid = $typeid;
	$title = $oldfile;
	$thumb = $thumburl;
	$keywords = str_replace(array('/','\\','#','.',"'","-","_"),'',$oldfile);	
	$keywords = get_keywords($keywords,3);
	$description = $oldfile;
	$d_content = $oldfile;
	$att_catid = $typeid;
	$att_filename = $file_name;
	$att_filepath = str_replace($system['upload_url'],"",$thumburl);
	$att_filesize = $file_size;
	$att_fileext = $file_ext;
	$att_authcode = md5($att_filepath);

	switch($modelid) {
	    case 1:
			$data = array('catid'=>$catid, 'typeid'=>$typesid, 'title'=>$title, 'style'=>$style, 'thumb'=>$thumb, 'keywords'=>$keywords, 'description'=>$description, 'posids'=>$posids, 'url'=>$url, 'listorder'=>$listorder, 'status'=>$status, 'sysadd'=>$sysadd, 'islink'=>$islink, 'username'=>$username, 'inputtime'=>$inputtime, 'updatetime'=>time());
		    break;
		case 2:
		    $data = array('catid'=>$catid, 'typeid'=>$typesid, 'title'=>$title, 'style'=>$style, 'thumb'=>$thumb, 'keywords'=>$keywords, 'description'=>$description, 'posids'=>$posids, 'url'=>$url, 'listorder'=>$listorder, 'status'=>$status, 'sysadd'=>$sysadd, 'islink'=>$islink, 'username'=>$username, 'inputtime'=>$inputtime, 'updatetime'=>time(), 
'systems'=>'Win2000/WinXP/Win2003', 'copytype'=>'', 'language'=>'', 'classtype'=>'', 'version'=>'', 'filesize'=>'未知', 'stars'=>'');
			break;
		case 3:
		    $data = array('catid'=>$catid, 'typeid'=>$typesid, 'title'=>$title, 'style'=>$style, 'thumb'=>$thumb, 'keywords'=>$keywords, 'description'=>$description, 'posids'=>$posids, 'url'=>$url, 'listorder'=>$listorder, 'status'=>$status, 'sysadd'=>$sysadd, 'islink'=>$islink, 'username'=>$username, 'inputtime'=>$inputtime, 'updatetime'=>time());
			break;
		case 11:
		    $data = array('catid'=>$catid, 'typeid'=>$typesid, 'title'=>$title, 'style'=>$style, 'thumb'=>$thumb, 'keywords'=>$keywords, 'description'=>$description, 'posids'=>$posids, 'url'=>$url, 'listorder'=>$listorder, 'status'=>$status, 'sysadd'=>$sysadd, 'islink'=>$islink, 'username'=>$username, 'inputtime'=>$inputtime, 'updatetime'=>time(), 
'vision'=>'1', 'video_category'=>'1');
			break;
		default:
		    $data = array('catid'=>$catid, 'typeid'=>$typesid, 'title'=>$title, 'style'=>$style, 'thumb'=>$thumb, 'keywords'=>$keywords, 'description'=>$description, 'posids'=>$posids, 'url'=>$url, 'listorder'=>$listorder, 'status'=>$status, 'sysadd'=>$sysadd, 'islink'=>$islink, 'username'=>$username, 'inputtime'=>$inputtime, 'updatetime'=>time());
			break;
	}
	//插入主表
	$id = $db->insert($data,$tablename,true);
	//更新URL地址
	$urls = "/html/show-".$catid."-".$id."-1.html";
    $db->update(array('url'=>$urls),$tablename,"id=$id");
	
	//插入副表
	switch($modelid) {
	    case 1:
			$datainfo = array('id'=>$id, 'content'=>$d_content, 'readpoint'=>$d_readpoint, 'groupids_view'=>$d_groupids_view, 'paginationtype'=>$d_paginationtype, 'maxcharperpage'=>$d_maxcharperpage, 'template'=>$d_template, 'paytype'=>$d_paytype, 'relation'=>$d_relation, 'allow_comment'=>$d_allow_comment, 'voteid'=>$d_voteid, 'copyfrom'=>$d_copyfrom);
		    break;
		case 2:
		    $datainfo = array('id'=>$id, 'content'=>$d_content, 'readpoint'=>$d_readpoint, 'groupids_view'=>$d_groupids_view, 'paginationtype'=>$d_paginationtype, 'maxcharperpage'=>$d_maxcharperpage, 'template'=>$d_template, 'paytype'=>$d_paytype, 'relation'=>$d_relation, 'allow_comment'=>$d_allow_comment, 'downfiles'=>'', 'downfile'=>'|');
			break;
		case 3:
		    $pics['url'] = $thumburl;
			$pics['alt'] = $new_file;
			$pictureurls = json_encode($pics);
			$pictureurls = "{\"0\":".$pictureurls."}";
		    $datainfo = array('id'=>$id, 'content'=>$d_content, 'readpoint'=>$d_readpoint, 'groupids_view'=>$d_groupids_view, 'paginationtype'=>$d_paginationtype, 'maxcharperpage'=>$d_maxcharperpage, 'template'=>$d_template, 'paytype'=>$d_paytype, 'relation'=>$d_relation, 'allow_comment'=>$d_allow_comment, 'copyfrom'=>$d_copyfrom, 'pictureurls'=>$pictureurls);
			break;
		case 11:
		    $datainfo = array('id'=>$id, 'content'=>$d_content, 'readpoint'=>$d_readpoint, 'groupids_view'=>$d_groupids_view, 'paginationtype'=>$d_paginationtype, 'maxcharperpage'=>$d_maxcharperpage, 'template'=>$d_template, 'paytype'=>$d_paytype, 'relation'=>$d_relation, 'allow_comment'=>$d_allow_comment, 'video'=>'0');
			break;
		default:
		    $datainfo = array('id'=>$id, 'content'=>$d_content, 'readpoint'=>$d_readpoint, 'groupids_view'=>$d_groupids_view, 'paginationtype'=>$d_paginationtype, 'maxcharperpage'=>$d_maxcharperpage, 'template'=>$d_template, 'paytype'=>$d_paytype, 'relation'=>$d_relation, 'allow_comment'=>$d_allow_comment, 'voteid'=>$d_voteid, 'copyfrom'=>$d_copyfrom);
	}
	$db->insert($datainfo,$tablename.'_data');
	
	//插入统计表
	$hitinfo = array('hitsid'=>'c-'.$modelid.'-'.$id, 'catid'=>$catid, 'views'=>'0', 'updatetime'=>time());
    $db->insert($hitinfo,$tablepre.'hits');
	
	//插入附件表	
	$attinfo = array('module'=>$att_module, 'catid'=>$att_catid, 'filename'=>$att_filename, 'filepath'=>$att_filepath, 'filesize'=>$att_filesize, 'fileext'=>$att_fileext, 'isimage'=>$att_isimage, 'isthumb'=>$att_isthumb, 'downloads'=>$att_downloads, 'userid'=>$att_userid, 'uploadtime'=>time(), 'uploadip'=>$att_uploadip, 'status'=>$att_status, 'authcode'=>$att_authcode, 'siteid'=>$att_siteid);
	$db->insert($attinfo,$tablepre.'attachment');
	
	//统计栏目数据
	$catinfo = array('items'=>'+=1');
	$db->update($catinfo,$tablepre.'category',"catid=$catid");
	
	//插入search表
	$type_id = 1;
	$typelist = $db->get_one('`typeid`',$tablepre."type","siteid=$att_siteid AND module='search' AND modelid=".$modelid);
	if($typelist['typeid']) {
		$type_id = $typelist['typeid'];
	}
	$typeinfo = array('typeid'=>$type_id,'id'=>$id,'adddate'=>time(),'data'=>$title,'siteid'=>$att_siteid);
	$db->insert($typeinfo,$tablepre.'search');
	
	//插入keyword表和keyword_data表
	$keylist = explode(' ',$keywords); 
	foreach ($keylist as $v) {
		$v = str_replace(array('//','#','.','\''),'',$v);
		$where = "keyword='".$v."' AND siteid=".$att_siteid;
		$keyinfo = $db->get_one('`id`',$tablepre."keyword",$where);
		if($keyinfo['id']) {
			$tagid = $keyinfo['id'];
			//更新keyword表
			$db->update(array('videonum'=>'+=1'),$tablepre."keyword","id=$tagid");
		}
		else {
			//插入keyword表
			$pinyin = gbk_to_pinyin($v);
			if(is_array($pinyin)) {
				$pinyin = implode('', $pinyin);
			}
			$keyinfo = array('siteid'=>$att_siteid,'keyword'=>$v,'pinyin'=>$pinyin,'videonum'=>'1','searchnums'=>'0');
			$tagid = $db->insert($keyinfo,$tablepre.'keyword',true);
		}
		$contentid = $id.'-'.$modelid;
		$where = "tagid=".$tagid." AND siteid=".$att_siteid." AND contentid='".$contentid."'";
		$keydatainfo = $db->get_one('`id`',$tablepre."keyword_data",$where);
		if(!$keydatainfo['id']) {
			//插入keyword_data表
			$db->insert(array('tagid'=>$tagid,'siteid'=>$att_siteid,'contentid'=>$contentid),$tablepre.'keyword_data');
		}
	}
}

function getCookie($value) //获取cookie
{
	return getPost("access2008_cookie_".$value);
}

function outMP3Info()
{
	$info = getPost("access2008_mp3_info");
	if(strlen($info)>0)
	{
		$arr = explode("|",$info);
		if(count($arr) == 9){
		  echo "<br />MP3文件信息:<br/>";
		  echo "版本:$arr[0]<br/>";
		  echo "层:$arr[1]<br/>";
		  if($arr[2] == 0)
		  {
			  echo "CRC校验:校验<br/>";
		  }else{
			  echo "CRC校验:不校验<br/>";
		  }
		  echo "位率:$arr[3]Kbps<br/>";
		  echo "采样频率:$arr[4]Hz<br/>";
		  if($arr[5] == 0){
			  echo "声道模式:立体声Stereo<br/>";
		  }else if($arr[5] == 1){
			  echo "声道模式:Joint Stereo<br/>";
		  }else if($arr[5] == 2){
			  echo "声道模式:双声道<br/>";
		  }else{
			  echo "声道模式:单声道<br/>";
		  }
		  
		  if($arr[6] == 0){
			  echo "版权:不合法<br/>";
		  }else{
			  echo "版权:合法<br/>";
		  }
		  
		  if($arr[7] == 0){
			  echo "原版标志:非原版<br/>";
		  }else{
			  echo "原版标志:原版<br/>";
		  }

		  echo "播放时长:".((int)$arr[8]/1000)."秒<br/>";
		}
	}
}

function filekzm($a)
{
	$c=strrchr($a,'.');
	if($c)
	{
		return $c;
	}else{
		return '';
	}
}

function getGet($v)// 获取GET
{
  if(isset($_GET[$v]))
  {
	 return $_GET[$v];
  }else{
	 return '';
  }
}

function getPost($v)// 获取POST
{
  if(isset($_POST[$v]))
  {
	  return $_POST[$v];
  }else{
	  return '';
  }
}

/**
 * 安全过滤函数
 *
 * @param $string
 * @return string
 */
function safe_replace($string) {
	$string = str_replace('%20','',$string);
	$string = str_replace('%27','',$string);
	$string = str_replace('%2527','',$string);
	$string = str_replace('*','',$string);
	$string = str_replace('"','&quot;',$string);
	$string = str_replace("'",'',$string);
	$string = str_replace('"','',$string);
	$string = str_replace(';','',$string);
	$string = str_replace('<','&lt;',$string);
	$string = str_replace('>','&gt;',$string);
	$string = str_replace("{",'',$string);
	$string = str_replace('}','',$string);
	$string = str_replace('\\','',$string);
	return $string;
}

/**
 * 安全过滤函数
 *
 * @param $string
 * @return string
 */
function safe_replace_char($string) {
	$string = strip_tags($string);
	$string = str_replace('%20','',$string);
	$string = str_replace('%27','',$string);
	$string = str_replace('%2527','',$string);
	$string = str_replace('&','',$string);
	$string = str_replace('emsp','',$string);
	$string = str_replace('ensp','',$string);
	$string = str_replace('nbsp','',$string);
	$string = str_replace('amp','',$string);
	$string = str_replace('*','',$string);
	$string = str_replace('"','',$string);
	$string = str_replace("'",'',$string);
	$string = str_replace('"','',$string);
	$string = str_replace(';','',$string);
	$string = str_replace('<','',$string);
	$string = str_replace('>','',$string);
	$string = str_replace("{",'',$string);
	$string = str_replace('}','',$string);
	$string = str_replace('\\','',$string);
	return $string;
}

/**
 * 获取请求ip
 *
 * @return ip地址
 */
function ip() {
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
		$ip = getenv('HTTP_CLIENT_IP');
	} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
		$ip = getenv('HTTP_X_FORWARDED_FOR');
	} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
		$ip = getenv('REMOTE_ADDR');
	} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
}

/**
* 将字符串转换为数组
*
* @param	string	$data	字符串
* @return	array	返回数组格式，如果，data为空，则返回空数组
*/
function string2array($data) {
	$data = trim($data);
	if($data == '') return array();
	if(strpos($data, 'array')===0){
		@eval("\$array = $data;");
	}else{
		if(strpos($data, '{\\')===0) $data = stripslashes($data);
		$array=json_decode($data,true);
		if(strtolower(CHARSET)=='gbk'){
			$array = mult_iconv("UTF-8", "GBK//IGNORE", $array);
		}
	}
	return $array;
}

/**
* 将数组转换为字符串
*
* @param	array	$data		数组
* @param	bool	$isformdata	如果为0，则不使用new_stripslashes处理，可选参数，默认为1
* @return	string	返回字符串，如果，data为空，则返回空
*/
function array2string($data, $isformdata = 1) {
	if($data == '' || empty($data)) return '';
	
	if($isformdata) $data = new_stripslashes($data);
	if(strtolower(CHARSET)=='gbk'){
		$data = mult_iconv("GBK", "UTF-8", $data);
	}
	if (version_compare(PHP_VERSION,'5.3.0','<')){
		return addslashes(json_encode($data));
	}else{
		return addslashes(json_encode($data,JSON_FORCE_OBJECT));
	}
}

function get_keywords($data, $number = 3) {
	$data = trim(strip_tags($data));
    if(empty($data)) return '';
	$http = new http();
	if(CHARSET != 'utf-8') {
		$data = iconv('utf-8', CHARSET, $data);
	} else {
		$data = iconv('utf-8', 'gbk', $data);
	}
	$http->post(API_URL_GET_KEYWORDS, array('siteurl'=>SITE_URL, 'charset'=>CHARSET, 'data'=>$data, 'number'=>$number));
	if($http->is_ok()) {
		if(CHARSET != 'utf-8') {
			return $http->get_data();
		} else {
			return iconv('gbk', 'utf-8', $http->get_data());
		}
	}
	return '';
}

?>
