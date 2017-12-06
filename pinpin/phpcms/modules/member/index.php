<?php
/**
 * 会员前台管理中心、账号管理、收藏操作类
 */

defined('IN_PHPCMS') or exit('No permission resources.');
// pc_base::load_app_class('foreground');
// pc_base::load_sys_class('format', '', 0);
// pc_base::load_sys_class('form', '', 0);

class index{
	
	function __construct() {
		$this->db = pc_base::load_model('member_model');
		session_start();
	}

	public function init() {
		if(isset($_SESSION['userid'])){
			include template('member', 'index');
		}else{
			showmessage(L('please_login', '', 'member'), '/html/list-5-1.html');
		}
	}
}
?>