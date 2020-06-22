<?php
include_once('./_common.php');


if($_POST[w] =="id"){
$mb_id = $_POST[mb_id] ; 
$sql = "select * from g5_member where mb_id='$mb_id'";
$row = sql_fetch($sql);

	if($row[mb_id] !=""){
		echo "<span style='color:#e2531f; font-weight:600; font-size:13px;'>중복된 아이디가 있습니다.</span>";
	}else if($row[mb_id] ==""){
		echo "<span style='color:#7aa5d8; font-weight:600; font-size:13px;'>사용할 수 있는 아이디입니다.</span>";
	}
}

else if($_POST[w] =="nick"){
$mb_nick = trim($_POST[mb_nick]) ; 
$sql = "select * from g5_member where mb_name='$mb_nick'";

$row = sql_fetch($sql);

	if($row[mb_id] !=""){
		echo "<span style='color:#e2531f; font-weight:600; font-size:13px;'>이미사용중인 닉네임입니다.</span>";
	}else if($row[mb_id] ==""){
		echo "<span style='color:#7aa5d8; font-weight:600; font-size:13px;'>사용할 수 있는 닉네임입니다.</span>";
	}
}
?>