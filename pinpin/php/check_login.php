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
session_start(); 

$username = $_POST['username'];
$password = $_POST['password'];
$session_code = $_POST['session_code'];
$code = $_SESSION["code"];
$rememberme = $_POST['rememberme'];

$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
if(strlen($username)==11){
	$mobile = $username;
	$sql_a="SELECT * from jzk_member where mobile='$mobile'";
	mysqli_query($con, "set names utf8");
	$result_a = mysqli_query($con, $sql_a);
	$ishad = 0;
	while ($rs_a=mysqli_fetch_assoc($result_a)) {
		$password_data = $rs_a['password'];
		$userid_data = $rs_a['userid'];
		$username_data = $rs_a['username'];
		$ishad++;
	}
}elseif (preg_match($pattern, $username)) {
	$email = $username;
	$sql_a="SELECT * from jzk_member where email='$email'";
	mysqli_query($con, "set names utf8");
	$result_a = mysqli_query($con, $sql_a);
	$ishad = 0;
	while ($rs_a=mysqli_fetch_assoc($result_a)) {
		$password_data = $rs_a['password'];
		$userid_data = $rs_a['userid'];
		$username_data = $rs_a['username'];
		$ishad++;
	}
}

if($code == $session_code){
	if($ishad>0){
		$password = md5($password);
		$password_end = md5($password."zhan");
		if($password_end == $password_data){
			$_SESSION['userid'] = $userid_data;
			$_SESSION['username'] = $username_data;
			$lastdate = time();
			$lastip = $_SERVER["REMOTE_ADDR"];
			$sql_b="UPDATE jzk_member set lastdate='$lastdate', lastip='$lastip' where userid='$userid_data'";
			mysqli_query($con, "set names utf8");
			$result_b = mysqli_query($con, $sql_b);
			if($rememberme == "true"){
				setcookie('userid', $userid_data, time()+3600*24);
				setcookie('username', $username_data, time()+3600*24);
				setcookie('password', $password_end, time()+3600*24);
				echo json_encode(3);
			}else{
				echo json_encode(3);
			}
		}else{
			echo json_encode(2);
		}
	}else{
		echo json_encode(1);
	}
}else{
	echo json_encode(0);
}

?>