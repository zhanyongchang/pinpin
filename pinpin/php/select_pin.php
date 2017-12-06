<?php
	include "./database.php";
	$str = explode(",",$_POST['str']);
	$str_num = count($str);
	for($i=0;$i<$str_num;$i++){
		$str_each[$i] = explode("|",$str[$i]);
	}
	$video_type = $str_each[0][1];
	$video_where = $str_each[1][1];
	$video_style = $str_each[2][1];
	$video_uptime = $str_each[3][1];
	$selecttype = $str_each[4][1];

	$sql_a = "SELECT * from jzk_news where catid=2 and status=99 order by id desc";
	
	if($video_type==0 && $video_where==0 && $video_style==0 && $video_uptime==0){
		$sql_a = "SELECT * from jzk_news where catid=2 and status=99";
	}
	elseif($video_type!=0 && $video_where==0 && $video_style==0 && $video_uptime==0){
		$sql_a = "SELECT * from jzk_news where video_type='$video_type' and catid=2 and status=99";
	}
	elseif($video_type==0 && $video_where!=0 && $video_style==0 && $video_uptime==0){
		$sql_a = "SELECT * from jzk_news where video_where='$video_where' and catid=2 and status=99";
	}
	elseif($video_type==0 && $video_where==0 && $video_style!=0 && $video_uptime==0){
		$sql_a = "SELECT * from jzk_news where video_style='$video_style' and catid=2 and status=99";
	}
	elseif($video_type==0 && $video_where==0 && $video_style==0 && $video_uptime!=0){
		$sql_a = "SELECT * from jzk_news where series='$video_uptime' and catid=2 and status=99";
	}
	elseif($video_type!=0 && $video_where!=0 && $video_style==0 && $video_uptime==0){
		$sql_a = "SELECT * from jzk_news where video_type='$video_type' and video_where='$video_where' and catid=2 and status=99";
	}
	elseif($video_type!=0 && $video_where==0 && $video_style!=0 && $video_uptime==0){
		$sql_a = "SELECT * from jzk_news where video_type='$video_type' and video_style='$video_style' and catid=2 and status=99";
	}
	elseif($video_type!=0 && $video_where==0 && $video_style==0 && $video_uptime!=0){
		$sql_a = "SELECT * from jzk_news where video_type='$video_type' and series='$video_uptime' and catid=2 and status=99";
	}
	elseif($video_type==0 && $video_where!=0 && $video_style!=0 && $video_uptime==0){
		$sql_a = "SELECT * from jzk_news where video_where='$video_where' and video_style='$video_style' and catid=2 and status=99";
	}
	elseif($video_type==0 && $video_where!=0 && $video_style==0 && $video_uptime!=0){
		$sql_a = "SELECT * from jzk_news where video_where='$video_where' and series='$video_uptime' and catid=2 and status=99";
	}
	elseif($video_type==0 && $video_where!=0 && $video_style!=0 && $video_uptime!=0){
		$sql_a = "SELECT * from jzk_news where video_style='$video_style' and series='$video_uptime' and catid=2 and status=99";
	}
	elseif($video_type!=0 && $video_where!=0 && $video_style!=0 && $video_uptime==0){
		$sql_a = "SELECT * from jzk_news where video_type='$video_type' and video_where='$video_where' and video_style='$video_style' and catid=2 and status=99";
	}
	elseif($video_type!=0 && $video_where!=0 && $video_style==0 && $video_uptime!=0){
		$sql_a = "SELECT * from jzk_news where video_type='$video_type' and video_where='$video_where' and series='$video_uptime' and catid=2 and status=99";
	}
	elseif($video_type==0 && $video_where!=0 && $video_style!=0 && $video_uptime!=0){
		$sql_a = "SELECT * from jzk_news where video_where='$video_where' and video_style='$video_style' and series='$video_uptime' and catid=2 and status=99";
	}
	elseif($video_type!=0 && $video_where==0 && $video_style!=0 && $video_uptime!=0){
		$sql_a = "SELECT * from jzk_news where video_type='$video_type' and video_style='$video_style' and series='$video_uptime' and catid=2 and status=99";
	}
	elseif($video_type!=0 && $video_where!=0 && $video_style!=0 && $video_uptime!=0){
		$sql_a = "SELECT * from jzk_news where video_type='$video_type' and video_where='$video_where' and video_style='$video_style' and series='$video_uptime' and catid=2 and status=99";
	}


	if($selecttype==0){
		$sql_a.=" order by id desc";
	}elseif($selecttype==1){
		$sql_a.=" order by comment_num desc";
	}elseif($selecttype==2){
		$sql_a.=" order by hits desc";
	}
	mysqli_query($con, "set names utf8");
	$result_a = mysqli_query($con, $sql_a);
	$arr = array();
	while ($rs_a = mysqli_fetch_assoc($result_a)) {
		$arr[]=$rs_a;
	}

	echo json_encode($arr);
?>