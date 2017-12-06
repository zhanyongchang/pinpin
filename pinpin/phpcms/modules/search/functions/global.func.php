<?php

/**
 * 解析分类url路径
 */
function list_url($typeid) {
    //return WAP_SITEURL."&amp;a=lists&amp;typeid=$typeid";
	return "/mobile/list-$typeid".'.html'; 
}

/**
 * 解析单页url路径
 */
function page_url($catid) {
    //return WAP_SITEURL."&amp;a=page&amp;catid=$catid";
	return "/mobile/page-$catid".'.html'; 
}

/**
 * 解析内容url路径
 * $catid 栏目id
 * $typeid wap分类id
 * $id 文章id
 */
function show_url($catid, $id, $typeid='') {
	global $WAP;
	if(empty($catid) || empty($id)) {
	    return "javascript:;";
	}
	if($typeid=='') {
		$types = getcache('wap_type','wap');
		foreach ($types as $type) {
			if($type['cat']==$catid) {
				$typeid = $type['typeid'];
				break;
			}
		}
	}
    //return WAP_SITEURL."&amp;a=show&amp;catid=$catid&amp;typeid=$typeid&amp;id=$id";
	return "/mobile/show-$catid-$typeid-$id".'.html'; 
}

?>