<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
pc_base::load_sys_class('form', '', 0);
pc_base::load_app_func('global','wap'); 
class sitemap extends admin {
	function __construct() {
		parent::__construct();
		//栏目级别选项
		$this->siteid = $this->get_siteid();
		$this->categorys = getcache('category_content_'.$this->siteid,'commons');
		$this->wap_site = getcache('wap_site','wap');
		$this->types = getcache('wap_type','wap');
		$this->wap = $this->wap_site[$this->siteid];
	}

	/**
	* 
	* Enter google sitemap, 百度新闻协议
	*/
	function init() {
		$hits_db = pc_base::load_model('hits_model');
		$CATEGORYS = $this->categorys;
		$SEO = seo($this->siteid, '', '网站地图');
		//读站点缓存
		$siteid = $this->siteid;
		$siteinfo = siteinfo($siteid);
		$sitecache = getcache('sitelist','commons');
		//根据当前站点,取得文件存放路径
		$systemconfig = pc_base::load_config('system');
		$html_root = substr($systemconfig['html_root'], 1);
		//判断当前站点目录,是则把文件写到根目录下, 不是则写到分站目录下.(分站目录用由静态文件路经html_root和分站目录dirname组成)
		if($siteid==1){
			$dir = PHPCMS_PATH;
		}
		else {
			$dir = PHPCMS_PATH.$html_root.DIRECTORY_SEPARATOR.$sitecache[$siteid]['dirname'].DIRECTORY_SEPARATOR;
		}
		//模型缓存
		$modelcache = getcache('model','commons');
		if(!defined('HTML')) define('HTML',1);
		//获取当前站点域名,下面URL时会用到.
		$this_domain = substr($sitecache[$siteid]['domain'], 0,strlen($sitecache[$siteid]['domain'])-1);
		
		$file = $dir.'sitemap.html';
		ob_start();
		include template('content', 'sitemap');
		$data = ob_get_contents();
		ob_clean();
		if(!is_dir($dir)) {
			mkdir($dir, 0777,1);
		}
		file_put_contents($file, $data);
		@chmod($file,0777);
		
		if($this->wap['status']==1 && $this->siteid==1)  { 
		    $dirwap = PHPCMS_PATH.'mobile';
			$filewap = $dirwap.'/sitemap.html';
		    $WAP = $this->wap;
		    $TYPE = $this->types;
		    $SEO = wapseo($this->siteid,'','网站地图');
			ob_start();
			include template('wap', 'maps');
			$data = ob_get_contents();
			ob_clean();
			if(!is_dir($dirwap)) {
				mkdir($dirwap, 0777,1);
			}
			file_put_contents($filewap, $data);
			@chmod($filewap,0777);
		}
		showmessage('更新html网站地图成功!'); 
	}
} 

?>