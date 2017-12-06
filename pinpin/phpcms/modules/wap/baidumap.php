<?php 
defined('IN_PHPCMS') or exit('No permission resources.'); 
pc_base::load_app_class('admin','admin',0);
class baidumap extends admin {
	private $db,$type_db;
	function __construct() {

	}
	
	function init() {	
		include $this->admin_tpl('baidumap');
	}
}
?>