<?php
	defined('IN_PHPCMS') or exit('No permission resources.'); 
	$db = '';
	if (isset($_GET['LinkName']) && isset($_GET['LinkId'])) {
	    $db = pc_base::load_model('link_model');
		$linkname = urldecode($_GET['LinkName']);
		$linkid = $_GET['LinkId'] ? intval($_GET['LinkId']) : '1';
		$sql = array('name'=>$linkname);
		$db->update($sql,array('linkid'=>$linkid));
	}
	else if (isset($_GET['LinkUrl']) && isset($_GET['LinkId'])) {
	    $db = pc_base::load_model('link_model');
		$linkurl = urldecode($_GET['LinkUrl']);
		$linkid = $_GET['LinkId'] ? intval($_GET['LinkId']) : '1';
		$sql = array('url'=>$linkurl);
		$db->update($sql,array('linkid'=>$linkid));
	}
	else if (isset($_GET['PosterName']) && isset($_GET['PosterId'])) {
	    $db = pc_base::load_model('poster_model');
		$postername = urldecode($_GET['PosterName']);
		$posterid = $_GET['PosterId'] ? intval($_GET['PosterId']) : '1';
		$sql = array('name'=>$postername);
		$db->update($sql,array('id'=>$posterid));
	}
	else if (isset($_GET['Title']) && isset($_GET['Id']) && isset($_GET['CatId']) && isset($_GET['SiteId'])) {  
		$db = pc_base::load_model('content_model');
		$title = urldecode($_GET['Title']);
		$id = $_GET['Id'] ? intval($_GET['Id']) : '0';
		$catid = $_GET['CatId'] ? intval($_GET['CatId']) : '0';
		$siteid = $_GET['SiteId'] ? intval($_GET['SiteId']) : '1';
		
		$categorys = getcache('category_content_'.$siteid,'commons');
		$category = $categorys[$catid];
		$modelid = $category['modelid'];
		if($modelid>0) {
		    $db->set_model($modelid);
		    $table_name = $db->table_name;
		    $sql = array('title'=>$title);
		    $db->update($sql,array('id'=>$id));
		}
	}
?>