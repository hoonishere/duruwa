<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
	require_once(G5_THEME_PATH.'/index.php');
	return;
}
include_once(G5_MOBILE_PATH.'/_head.php');
include_once(G5_MOBILE_PATH."/include/$config[skin_header]/main.php");
include_once(G5_MOBILE_PATH.'/_tail.php');
?>