<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
    <meta name="keywords" content="<?php echo $SEO['keyword'];?>" />
    <meta name="description" content="<?php echo $SEO['description'];?>" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link href="<?php echo CSS_PATH;?>wap/mobile.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo JS_PATH;?>wap/html5shiv.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>wap/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo JS_PATH;?>wap/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>wap/jsfile.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>wap/nav.js"></script><?php echo $WAP['wap_topcode'];?>

</head>
<body>
<div class="duzhan">
    <div class="maintop">
        <div class="Header">
            <div class="Header-logo"><h1><a href="/mobile"><img src="<?php echo $WAP['logo'];?>" alt="<?php echo $WAP['sitename'];?>" /></a></h1></div>
        </div>
        <div class="TopMenus">
            <ul>
                <li><a href="/mobile" title="网站首页">网站首页</a></li>
                <li><a href="<?php echo page_url(1);?>" title="关于我们">关于我们</a></li>
                <li><a href="<?php echo list_url(2);?>" title="产品展示">产品展示</a></li>
                <li><a href="<?php echo list_url(1);?>" title="新闻中心">新闻中心</a></li>
                <li><a href="<?php echo page_url(6);?>" title="服务承诺">服务承诺</a></li>
                <li><a href="<?php echo page_url(8);?>" title="联系我们">联系我们</a></li>
            </ul>
        </div>
        <div class="topbg">
            <span class="navbtn">导航</span>
        </div>
        <div class="navbg">
            <ul>
                <li><a href="/mobile" title="网站首页">网站首页</a></li>
                <li><a href="<?php echo page_url(1);?>" title="关于我们">关于我们</a></li>
                <li><a href="<?php echo list_url(2);?>" title="产品展示">产品展示</a></li>
                <li><a href="<?php echo list_url(1);?>" title="新闻中心">新闻中心</a></li>
                <li><a href="<?php echo list_url(3);?>" title="荣誉资质">荣誉资质</a></li>
                <li><a href="<?php echo page_url(6);?>" title="服务承诺">服务承诺</a></li>
                <li><a href="<?php echo page_url(7);?>" title="在线留言">在线留言</a></li>
                <li><a href="<?php echo page_url(8);?>" title="联系我们">联系我们</a></li>
            </ul>
        </div>  
    </div>
