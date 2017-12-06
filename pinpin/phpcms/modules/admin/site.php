<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin', 'admin', 0);
pc_base::load_sys_class('form', '', 0);
class site extends admin {
	private $db;
	public function __construct() {
		$this->db = pc_base::load_model('site_model');
		parent::__construct();
	}
	
	public function init() {
		$total = $this->db->count();
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$pagesize = 20;
		$offset = ($page - 1) * $pagesize;
		$list = $this->db->select('', '*', $offset.','.$pagesize);
		$pages = pages($total, $page, $pagesize);
		$show_dialog = true;
		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=admin&c=site&a=add\', title:\''.L('add_site').'\', width:\'700\', height:\'500\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('add_site'));
		include $this->admin_tpl('site_list');
	}
	
	public function add() {
		header("Cache-control: private"); 
		if (isset($_GET['show_header'])) $show_header = 1;
		if (isset($_POST['dosubmit'])) {
			$name = isset($_POST['name']) && trim($_POST['name']) ? trim($_POST['name']) : showmessage(L('site_name').L('empty'));
			$dirname = isset($_POST['dirname']) && trim($_POST['dirname']) ? strtolower(trim($_POST['dirname'])) : showmessage(L('site_dirname').L('empty'));
			$domain = isset($_POST['domain']) && trim($_POST['domain']) ? trim($_POST['domain']) : '';
			$pc_logo = isset($_POST['pc_logo']) && trim($_POST['pc_logo']) ? trim($_POST['pc_logo']) : '';
			$pc_logo2 = isset($_POST['pc_logo2']) && trim($_POST['pc_logo2']) ? trim($_POST['pc_logo2']) : '';
			$pc_logo3 = isset($_POST['pc_logo3']) && trim($_POST['pc_logo3']) ? trim($_POST['pc_logo3']) : '';
			$pc_bannerwidth = intval($_POST['pc_bannerwidth']) ? intval($_POST['pc_bannerwidth']) : 0;
			$pc_bannerheight = intval($_POST['pc_bannerheight']) ? intval($_POST['pc_bannerheight']) : 0;
			$pc_company = isset($_POST['pc_company']) && trim($_POST['pc_company']) ? trim($_POST['pc_company']) : '';
			$pc_webmaster = isset($_POST['pc_webmaster']) && trim($_POST['pc_webmaster']) ? trim($_POST['pc_webmaster']) : '';
			$pc_phone = isset($_POST['pc_phone']) && trim($_POST['pc_phone']) ? trim($_POST['pc_phone']) : '';
			$pc_mobile = isset($_POST['pc_mobile']) && trim($_POST['pc_mobile']) ? trim($_POST['pc_mobile']) : '';
			$pc_fax = isset($_POST['pc_fax']) && trim($_POST['pc_fax']) ? trim($_POST['pc_fax']) : '';
			$pc_email = isset($_POST['pc_email']) && trim($_POST['pc_email']) ? trim($_POST['pc_email']) : '';
			$pc_qq = isset($_POST['pc_qq']) && trim($_POST['pc_qq']) ? trim($_POST['pc_qq']) : '';
			$pc_qqlist = isset($_POST['pc_qqlist']) && trim($_POST['pc_qqlist']) ? trim($_POST['pc_qqlist']) : '';
			$pc_weixinqrcode = isset($_POST['pc_weixinqrcode']) && trim($_POST['pc_weixinqrcode']) ? trim($_POST['pc_weixinqrcode']) : '';
			$pc_wapqrcode = isset($_POST['pc_wapqrcode']) && trim($_POST['pc_wapqrcode']) ? trim($_POST['pc_wapqrcode']) : '';
			$pc_welcome = isset($_POST['pc_welcome']) && trim($_POST['pc_welcome']) ? trim($_POST['pc_welcome']) : '';
			$pc_announce = isset($_POST['pc_announce']) && trim($_POST['pc_announce']) ? trim($_POST['pc_announce']) : '';
			$pc_remark = isset($_POST['pc_remark']) && trim($_POST['pc_remark']) ? trim($_POST['pc_remark']) : '';
			$pc_topcode = isset($_POST['pc_topcode']) && trim($_POST['pc_topcode']) ? trim($_POST['pc_topcode']) : '';
			$pc_bottomcode = isset($_POST['pc_bottomcode']) && trim($_POST['pc_bottomcode']) ? trim($_POST['pc_bottomcode']) : '';
			$pc_pagenews = intval($_POST['pc_pagenews']) ? intval($_POST['pc_pagenews']) : 10;
			$pc_pageproduct = intval($_POST['pc_pageproduct']) ? intval($_POST['pc_pageproduct']) : 12;
			$pc_pagepicture = intval($_POST['pc_pagepicture']) ? intval($_POST['pc_pagepicture']) : 12;
			$pc_pagedownload = intval($_POST['pc_pagedownload']) ? intval($_POST['pc_pagedownload']) : 10;
			$pc_pagevideo = intval($_POST['pc_pagevideo']) ? intval($_POST['pc_pagevideo']) : 12;
			$pc_indexlinkcount = intval($_POST['pc_indexlinkcount']) ? intval($_POST['pc_indexlinkcount']) : 35;
			$pc_ipcount = intval($_POST['pc_ipcount']) ? intval($_POST['pc_ipcount']) : 0;
			$pc_views = intval($_POST['pc_views']) ? intval($_POST['pc_views']) : 1;
			$site_title = isset($_POST['site_title']) && trim($_POST['site_title']) ? trim($_POST['site_title']) : '';
			$keywords = isset($_POST['keywords']) && trim($_POST['keywords']) ? trim($_POST['keywords']) : '';
			$description = isset($_POST['description']) && trim($_POST['description']) ? trim($_POST['description']) : '';
			$release_point = isset($_POST['release_point']) ? $_POST['release_point'] : '';
			$template = isset($_POST['template']) && !empty($_POST['template']) ? $_POST['template'] : showmessage(L('please_select_a_style'));
			$default_style = isset($_POST['default_style']) && !empty($_POST['default_style']) ? $_POST['default_style'] : showmessage(L('please_choose_the_default_style'));			   
			if ($this->db->get_one(array('name'=>$name), 'siteid')) {
				showmessage(L('site_name').L('exists'));
			} 
			if (!preg_match('/^\\w+$/i', $dirname)) {
				showmessage(L('site_dirname').L('site_dirname_err_msg'));
			}
			if ($this->db->get_one(array('dirname'=>$dirname), 'siteid')) {
				showmessage(L('site_dirname').L('exists'));
			}
			if (!empty($domain) && $domain!="/" && !preg_match('/http:\/\/(.+)\/$/i', $domain)) {
				showmessage(L('site_domain').L('site_domain_ex2'));
			}
			if (!empty($domain) && $this->db->get_one(array('domain'=>$domain), 'siteid')) {
				showmessage(L('site_domain').L('exists'));
			}
			if (!empty($release_point) && is_array($release_point)) {
				if (count($release_point) > 4) {
					showmessage(L('release_point_configuration').L('most_choose_four'));
				}
				$s = '';
				foreach ($release_point as $key=>$val) {
					if($val) $s.= $s ? ",$val" : $val;
				}
				$release_point = $s;
				unset($s);
			} else {
				$release_point = '';
			}
			if (!empty($template) && is_array($template)) {
				$template = implode(',', $template);
			} else {
				$template = '';
			}
			$_POST['setting']['watermark_img'] = IMG_PATH.'water/'.$_POST['setting']['watermark_img'];
			$setting = trim(array2string($_POST['setting']));
			if ($this->db->insert(array('name'=>$name,'dirname'=>$dirname, 'domain'=>$domain, 'site_title'=>$site_title, 'keywords'=>$keywords, 'description'=>$description, 'release_point'=>$release_point, 'template'=>$template,'setting'=>$setting, 'default_style'=>$default_style,'pc_logo'=>$pc_logo,'pc_logo2'=>$pc_logo2,'pc_logo3'=>$pc_logo3,'pc_bannerwidth'=>$pc_bannerwidth,'pc_bannerheight'=>$pc_bannerheight,'pc_company'=>$pc_company,'pc_webmaster'=>$pc_webmaster,'pc_phone'=>$pc_phone,'pc_mobile'=>$pc_mobile,'pc_fax'=>$pc_fax,'pc_email'=>$pc_email,'pc_qq'=>$pc_qq,'pc_qqlist'=>$pc_qqlist,'pc_weixinqrcode'=>$pc_weixinqrcode,'pc_wapqrcode'=>$pc_wapqrcode,'pc_welcome'=>$pc_welcome,'pc_announce'=>$pc_announce,'pc_remark'=>$pc_remark,'pc_topcode'=>$pc_topcode,'pc_bottomcode'=>$pc_bottomcode,'pc_pagenews'=>$pc_pagenews,'pc_pageproduct'=>$pc_pageproduct,'pc_pagepicture'=>$pc_pagepicture,'pc_pagedownload'=>$pc_pagedownload,'pc_pagevideo'=>$pc_pagevideo,'pc_indexlinkcount'=>$pc_indexlinkcount,'pc_ipcount'=>$pc_ipcount,'pc_views'=>$pc_views))) {
				$class_site = pc_base::load_app_class('sites');
				$class_site->set_cache();
				showmessage(L('operation_success'), '?m=admin&c=site&a=init', '', 'add');
			} else {
				showmessage(L('operation_failure'));
			}
		} else {
			$release_point_db = pc_base::load_model('release_point_model');
			$release_point_list = $release_point_db->select('', 'id, name');
			$show_validator = $show_scroll = $show_header = true;
			$template_list = template_list();
			include $this->admin_tpl('site_add');
		}
	}
	
	public function del() {
		$siteid = isset($_GET['siteid']) && intval($_GET['siteid']) ? intval($_GET['siteid']) : showmessage(L('illegal_parameters'), HTTP_REFERER);
		if($siteid==1) showmessage(L('operation_failure'), HTTP_REFERER);
		if ($this->db->get_one(array('siteid'=>$siteid))) {
			if ($this->db->delete(array('siteid'=>$siteid))) {
				$class_site = pc_base::load_app_class('sites');
				$class_site->set_cache();
				showmessage(L('operation_success'), HTTP_REFERER);
			} else {
				showmessage(L('operation_failure'), HTTP_REFERER);
			}
		} else {
			showmessage(L('notfound'), HTTP_REFERER);
		}
	}
	
	public function edit() {
		$siteid = isset($_GET['siteid']) && intval($_GET['siteid']) ? intval($_GET['siteid']) : showmessage(L('illegal_parameters'), HTTP_REFERER);
		if ($data = $this->db->get_one(array('siteid'=>$siteid))) {
			if (isset($_POST['dosubmit'])) {
				$name = isset($_POST['name']) && trim($_POST['name']) ? trim($_POST['name']) : showmessage(L('site_name').L('empty'));
				$dirname = isset($_POST['dirname']) && trim($_POST['dirname']) ? strtolower(trim($_POST['dirname'])) : ($siteid == 1 ? '' :showmessage(L('site_dirname').L('empty')));
				$domain = isset($_POST['domain']) && trim($_POST['domain']) ? trim($_POST['domain']) : '';
				$pc_logo = isset($_POST['pc_logo']) && trim($_POST['pc_logo']) ? trim($_POST['pc_logo']) : '';
				$pc_logo2 = isset($_POST['pc_logo2']) && trim($_POST['pc_logo2']) ? trim($_POST['pc_logo2']) : '';
				$pc_logo3 = isset($_POST['pc_logo3']) && trim($_POST['pc_logo3']) ? trim($_POST['pc_logo3']) : '';
				$pc_bannerwidth = intval($_POST['pc_bannerwidth']) ? intval($_POST['pc_bannerwidth']) : 0;
				$pc_bannerheight = intval($_POST['pc_bannerheight']) ? intval($_POST['pc_bannerheight']) : 0;
				$pc_company = isset($_POST['pc_company']) && trim($_POST['pc_company']) ? trim($_POST['pc_company']) : '';
				$pc_webmaster = isset($_POST['pc_webmaster']) && trim($_POST['pc_webmaster']) ? trim($_POST['pc_webmaster']) : '';
				$pc_phone = isset($_POST['pc_phone']) && trim($_POST['pc_phone']) ? trim($_POST['pc_phone']) : '';
				$pc_mobile = isset($_POST['pc_mobile']) && trim($_POST['pc_mobile']) ? trim($_POST['pc_mobile']) : '';
				$pc_fax = isset($_POST['pc_fax']) && trim($_POST['pc_fax']) ? trim($_POST['pc_fax']) : '';
				$pc_email = isset($_POST['pc_email']) && trim($_POST['pc_email']) ? trim($_POST['pc_email']) : '';
				$pc_qq = isset($_POST['pc_qq']) && trim($_POST['pc_qq']) ? trim($_POST['pc_qq']) : '';
				$pc_qqlist = isset($_POST['pc_qqlist']) && trim($_POST['pc_qqlist']) ? trim($_POST['pc_qqlist']) : '';
				$pc_weixinqrcode = isset($_POST['pc_weixinqrcode']) && trim($_POST['pc_weixinqrcode']) ? trim($_POST['pc_weixinqrcode']) : '';
				$pc_wapqrcode = isset($_POST['pc_wapqrcode']) && trim($_POST['pc_wapqrcode']) ? trim($_POST['pc_wapqrcode']) : '';
				$pc_welcome = isset($_POST['pc_welcome']) && trim($_POST['pc_welcome']) ? trim($_POST['pc_welcome']) : '';
				$pc_announce = isset($_POST['pc_announce']) && trim($_POST['pc_announce']) ? trim($_POST['pc_announce']) : '';
				$pc_remark = isset($_POST['pc_remark']) && trim($_POST['pc_remark']) ? trim($_POST['pc_remark']) : '';
				$pc_topcode = isset($_POST['pc_topcode']) && trim($_POST['pc_topcode']) ? trim($_POST['pc_topcode']) : '';
				$pc_bottomcode = isset($_POST['pc_bottomcode']) && trim($_POST['pc_bottomcode']) ? trim($_POST['pc_bottomcode']) : '';
				$pc_pagenews = intval($_POST['pc_pagenews']) ? intval($_POST['pc_pagenews']) : 10;
				$pc_pageproduct = intval($_POST['pc_pageproduct']) ? intval($_POST['pc_pageproduct']) : 12;
				$pc_pagepicture = intval($_POST['pc_pagepicture']) ? intval($_POST['pc_pagepicture']) : 12;
				$pc_pagedownload = intval($_POST['pc_pagedownload']) ? intval($_POST['pc_pagedownload']) : 10;
				$pc_pagevideo = intval($_POST['pc_pagevideo']) ? intval($_POST['pc_pagevideo']) : 12;
				$pc_indexlinkcount = intval($_POST['pc_indexlinkcount']) ? intval($_POST['pc_indexlinkcount']) : 35;
				$pc_ipcount = intval($_POST['pc_ipcount']) ? intval($_POST['pc_ipcount']) : 0;
				$pc_views = intval($_POST['pc_views']) ? intval($_POST['pc_views']) : 1;
				$site_title = isset($_POST['site_title']) && trim($_POST['site_title']) ? trim($_POST['site_title']) : '';
				$keywords = isset($_POST['keywords']) && trim($_POST['keywords']) ? trim($_POST['keywords']) : '';
				$description = isset($_POST['description']) && trim($_POST['description']) ? trim($_POST['description']) : '';
				$release_point = isset($_POST['release_point']) ? $_POST['release_point'] : '';
				$template = isset($_POST['template']) && !empty($_POST['template']) ? $_POST['template'] : showmessage(L('please_select_a_style'));
				$default_style = isset($_POST['default_style']) && !empty($_POST['default_style']) ? $_POST['default_style'] : showmessage(L('please_choose_the_default_style'));	
				if ($data['name'] != $name && $this->db->get_one(array('name'=>$name), 'siteid')) {
					showmessage(L('site_name').L('exists'));
				}
				if ($siteid != 1) {
					if (!preg_match('/^\\w+$/i', $dirname)) {
						showmessage(L('site_dirname').L('site_dirname_err_msg'));
					}
					if ($data['dirname'] != $dirname && $this->db->get_one(array('dirname'=>$dirname), 'siteid')) {
						showmessage(L('site_dirname').L('exists'));
					}
				} 
				
				if (!empty($domain) && $domain!="/" && !preg_match('/http:\/\/(.+)\/$/i', $domain)) {
					showmessage(L('site_domain').L('site_domain_ex2'));
				}
				if (!empty($domain) && $data['domain'] != $domain && $this->db->get_one(array('domain'=>$domain), 'siteid')) {
					showmessage(L('site_domain').L('exists'));
				}
				if (!empty($release_point) && is_array($release_point)) {
					if (count($release_point) > 4) {
						showmessage(L('release_point_configuration').L('most_choose_four'));
					}
					$s = '';
					foreach ($release_point as $key=>$val) {
						if($val) $s.= $s ? ",$val" : $val;
					}
					$release_point = $s;
					unset($s);
				} else {
					$release_point = '';
				}
				if (!empty($template) && is_array($template)) {
					$template = implode(',', $template);
				} else {
					$template = '';
				}
				$_POST['setting']['watermark_img'] = 'statics/images/water/'.$_POST['setting']['watermark_img'];
				$setting = trim(array2string($_POST['setting']));
				$sql = array('name'=>$name,'dirname'=>$dirname, 'domain'=>$domain, 'site_title'=>$site_title, 'keywords'=>$keywords, 'description'=>$description, 'release_point'=>$release_point, 'template'=>$template, 'setting'=>$setting, 'default_style'=>$default_style,'pc_logo'=>$pc_logo,'pc_logo2'=>$pc_logo2,'pc_logo3'=>$pc_logo3,'pc_bannerwidth'=>$pc_bannerwidth,'pc_bannerheight'=>$pc_bannerheight,'pc_company'=>$pc_company,'pc_webmaster'=>$pc_webmaster,'pc_phone'=>$pc_phone,'pc_mobile'=>$pc_mobile,'pc_fax'=>$pc_fax,'pc_email'=>$pc_email,'pc_qq'=>$pc_qq,'pc_qqlist'=>$pc_qqlist,'pc_weixinqrcode'=>$pc_weixinqrcode,'pc_wapqrcode'=>$pc_wapqrcode,'pc_welcome'=>$pc_welcome,'pc_announce'=>$pc_announce,'pc_remark'=>$pc_remark,'pc_topcode'=>$pc_topcode,'pc_bottomcode'=>$pc_bottomcode,'pc_pagenews'=>$pc_pagenews,'pc_pageproduct'=>$pc_pageproduct,'pc_pagepicture'=>$pc_pagepicture,'pc_pagedownload'=>$pc_pagedownload,'pc_pagevideo'=>$pc_pagevideo,'pc_indexlinkcount'=>$pc_indexlinkcount,'pc_ipcount'=>$pc_ipcount,'pc_views'=>$pc_views);
				if ($siteid == 1) unset($sql['dirname']);
				if ($this->db->update($sql, array('siteid'=>$siteid))) {
					$class_site = pc_base::load_app_class('sites');
					$class_site->set_cache();
					showmessage(L('operation_success'), '', '', 'edit');
				} else {
					showmessage(L('operation_failure'));
				}
			} else {
				$show_validator = true;
				$show_header = true;
				$show_scroll = true;
				$template_list = template_list();
				$setting = string2array($data['setting']);
				$setting['watermark_img'] = str_replace('statics/images/water/','',$setting['watermark_img']);
				$release_point_db = pc_base::load_model('release_point_model');
				$release_point_list = $release_point_db->select('', 'id, name');
				include $this->admin_tpl('site_edit');
			}
		} else {
			showmessage(L('notfound'), HTTP_REFERER);
		}
	}
	
	public function public_name() {
		$name = isset($_GET['name']) && trim($_GET['name']) ? (pc_base::load_config('system', 'charset') == 'gbk' ? iconv('utf-8', 'gbk', trim($_GET['name'])) : trim($_GET['name'])) : exit('0');
		$siteid = isset($_GET['siteid']) && intval($_GET['siteid']) ? intval($_GET['siteid']) : '';
 		$data = array();
		if ($siteid) {
			
			$data = $this->db->get_one(array('siteid'=>$siteid), 'name');
			if (!empty($data) && $data['name'] == $name) {
				exit('1');
			}
		}
		if ($this->db->get_one(array('name'=>$name), 'siteid')) {
			exit('0');
		} else {
			exit('1');
		}
	}
	
	public function public_dirname() {
		$dirname = isset($_GET['dirname']) && trim($_GET['dirname']) ? (pc_base::load_config('system', 'charset') == 'gbk' ? iconv('utf-8', 'gbk', trim($_GET['dirname'])) : trim($_GET['dirname'])) : exit('0');
		$siteid = isset($_GET['siteid']) && intval($_GET['siteid']) ? intval($_GET['siteid']) : '';
		$data = array();
		if ($siteid) {
			$data = $this->db->get_one(array('siteid'=>$siteid), 'dirname');
			if (!empty($data) && $data['dirname'] == $dirname) {
				exit('1');
			}
		}
		if ($this->db->get_one(array('dirname'=>$dirname), 'siteid')) {
			exit('0');
		} else {
			exit('1');
		}
	}

	private function check_gd() {
		if(!function_exists('imagepng') && !function_exists('imagejpeg') && !function_exists('imagegif')) {
			$gd = L('gd_unsupport');
		} else {
			$gd = L('gd_support');
		}
		return $gd;
	}
}