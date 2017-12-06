<?php
defined('IN_PHPCMS') or exit('No permission resources.');
class index {
	function __construct() {
		pc_base::load_app_func('global');
		$siteid = isset($_GET['siteid']) ? intval($_GET['siteid']) : get_siteid();
  		define("SITEID",$siteid);
		pc_base::load_sys_class('form', '', 0);
	}
	
	public function init() {
		$siteid = SITEID;
		$siteinfo = siteinfo($siteid);
 		$setting = getcache('guestbook', 'commons');
		$SEO = seo(SITEID, '', L('guestbook'), '', '');
		include template('guestbook', 'index');
	}
 	
	 /**
	 *	留言板留言 
	 */
	public function register() { 
 		$siteid = SITEID;
		$siteinfo = siteinfo($siteid);
 		if(isset($_POST['dosubmit'])){
 			if($_POST['introduce']==""){
 				showmessage(L('introduce_not_empty'), "?m=guestbook&c=index&a=register&siteid=$siteid");
 			}	
			$session_storage = 'session_'.pc_base::load_config('system','session_storage'); 
			pc_base::load_sys_class($session_storage); 
			//验证码
			if(($_SESSION['code'] != strtolower($_POST['code'])) || empty($_SESSION['code'])) { 
			    showmessage("验证码错误", HTTP_REFERER); 
			}
 			$guestbook_db = pc_base::load_model(guestbook_model);
			$typeid = isset($_POST['typeid']) ? intval($_POST['typeid']) : 0;
 			$ip = ip();
			$addtime = SYS_TIME;
			$face = "01";
			$gstate = 0;
			$title = safe_replace(strip_tags($_POST['title']));
			$name = safe_replace(strip_tags($_POST['name']));
			$username = safe_replace(strip_tags($_POST['username']));
			$company = safe_replace(strip_tags($_POST['company'])); 
			$tel = safe_replace(strip_tags($_POST['tel']));
			$mobile = safe_replace(strip_tags($_POST['mobile']));
			$email = safe_replace(strip_tags($_POST['email']));
			$address = safe_replace(strip_tags($_POST['address']));
			$introduce = safe_replace(strip_tags($_POST['introduce']));
			$homepage = safe_replace(strip_tags($_POST['homepage']));
			$qq = safe_replace(strip_tags($_POST['qq']));
			$industry = safe_replace(strip_tags($_POST['industry']));
			$province = safe_replace(strip_tags($_POST['province']));
			$city = safe_replace(strip_tags($_POST['city']));
			$county = safe_replace(strip_tags($_POST['county']));
			$position = safe_replace(strip_tags($_POST['position']));
			  
			 /*添加用户数据*/
 			$sql = array('siteid'=>$siteid,'typeid'=>$typeid,'name'=>$name,'tel'=>$tel,'introduce'=>$introduce,'addtime'=>$addtime,'title'=>$title,'email'=>$email,'homepage'=>$homepage,'qq'=>$qq,'face'=>$face,'ip'=>$ip,'company'=>$company,'mobile'=>$mobile,'address'=>$address,'industry'=>$industry,'province'=>$province,'city'=>$city,'county'=>$county,'position'=>$position,'username'=>$username,'gstate'=>$gstate);
 			//print_r( $sql);
 			$guestbook_db->insert($sql);
 			showmessage(L('add_success'), HTTP_REFERER);
 		}
		else {
			$setting = getcache('guestbook', 'commons');
			$SEO = seo(SITEID, '', L('application_guestbook'), '', '');
			include template('guestbook', 'index');
 		}
	} 
}
?>