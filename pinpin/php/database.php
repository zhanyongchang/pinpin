<?php
header("Content-Type: text/html;charset=utf-8");
$database = "pinpin";
$root = "root";
$password = "root";
$con = mysqli_connect("127.0.0.1",$root,$password,$database);
if(mysqli_connect_errno()){
	echo "连接数据库失败：".mysqli_connect_error();
	$con=null;
	exit;
}