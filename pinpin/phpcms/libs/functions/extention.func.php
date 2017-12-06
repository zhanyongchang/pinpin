<?php
/**
 *  extention.func.php 用户自定义函数库
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-10-27
 */

global $_URLCFG;
$_URLCFG = array();
$_URLCFG['urlmode'] = 2;
$_URLCFG['urlsuffix'] = 'index.html';
getQueryString();

/**
* 获得友好的URL访问
*
* @access  public
* @return  array
*/
function getQueryString(){
    global $_URLCFG;
    if($_URLCFG['urlmode']!=2) return $_GET;
    $path = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : @getenv('PATH_INFO');
    if(!$path){
        $script_name=$_SERVER['SCRIPT_NAME'];//获取当前文件的路径
        $path= $_SERVER['REQUEST_URI'];//获取完整的路径，包含"?"之后的字符串
        //去除url包含的当前文件的路径信息
        if($path && @strpos($path,$script_name,0)!==false){
            if($path!=$script_name) $path=substr($path,strlen($script_name));
        }
		else{
            $script_name=str_replace(basename($script_name),'',$script_name);
            if($path && @strpos($path,$script_name,0)!==false){
                $path=substr($path,strlen($script_name));
            }
        }
        //第一个字符是'/'，则去掉
        if($path[0]!='/'){
            $path='/'.$path;
        }
        if(strpos($path,'/index.php')===0) $path=preg_replace('|^/index\\.php|','',$path);
        //去除问号后面的查询字符串
        if($path && false!==($pos=@strrpos($path,'?'))){
            $path=substr($path,0,$pos);
        }
    }
    $_SGETS = explode('/',substr($path,1));
    $_SLEN =  count($_SGETS);
    $_SGET =& $_GET;
    for($i=0;$i<$_SLEN;$i+=2){
        if(!empty($_SGETS[$i]) && !empty($_SGETS[$i+1])) $_SGET[$_SGETS[$i]]=$_SGETS[$i+1];
    }
    $_SGET['m'] = !empty($_SGET['m']) && is_string($_SGET['m']) ? trim($_SGET['m']) : '';
$_SGET['c'] = !empty($_SGET['c']) && is_string($_SGET['c']) ? trim($_SGET['c']) : '';
    $_SGET['a'] = !empty($_SGET['a']) && is_string($_SGET['a']) ? trim($_SGET['a']) : '';
    return $_SGET;
}

?>