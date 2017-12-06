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

$emailormobile = $_POST['emailormobile'];
$password = $_POST['password'];
$session_code = $_POST['session_code'];
$code = $_SESSION["code"];


$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
if(strlen($emailormobile)==11){
	$mobile = $emailormobile;
	$sql_a="SELECT * from jzk_member where mobile='$mobile'";
	mysqli_query($con, "set names utf8");
	$result_a = mysqli_query($con, $sql_a);
	$ishad = 0;
	while ($rs_a=mysqli_fetch_assoc($result_a)) {
		$ishad++;
	}
}elseif (preg_match($pattern, $emailormobile)) {
	$email = $emailormobile;
	$sql_a="SELECT * from jzk_member where email='$email'";
	mysqli_query($con, "set names utf8");
	$result_a = mysqli_query($con, $sql_a);
	$ishad = 0;
	while ($rs_a=mysqli_fetch_assoc($result_a)) {
		$ishad++;
	}
}

if($code == $session_code){
	if($ishad>0){
		echo json_encode(1);
	}else{
		$password = md5($password);
		$password_end = md5($password."zhan");
		$regdate = time();
		$regip = $_SERVER["REMOTE_ADDR"];
		if(!isset($mobile)){
			$sql_b="INSERT jzk_member (username, password, email, regdate, regip) VALUES('$emailormobile', '$password_end', '$email', '$regdate', '$regip')";
		}elseif(!isset($email)){
			$sql_b="INSERT jzk_member (username, password, mobile, regdate, regip) VALUES('$emailormobile', '$password_end', '$mobile', '$regdate', '$regip')";
		}
		mysqli_query($con, "set names utf8");
		$result_b = mysqli_query($con, $sql_b);
		if($result_b){
			echo json_encode(2);
			$sql_c="SELECT * from jzk_member where username='$emailormobile'";
			mysqli_query($con, "set names utf8");
			$result_c = mysqli_query($con, $sql_c);
			$rs_c=mysqli_fetch_assoc($result_c);
			$_SESSION['userid'] = $rs_c['userid'];
			$_SESSION['username'] = $rs_c['username'];
		}
	}
}else{
	echo json_encode(0);
}

?>