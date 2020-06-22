<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}
// 모바일 스킨 변경시 아래의 force 를 변경해주세요.
$skin_folder = "force";

$config[skin_header] = 
$config[skin_main] = 
$config[skin_footer] = 
$config[skin_lefter] = 
$config[skin_quick] = $skin_folder;

/*
force 상수 재정의
http://new.ilogin.kr/?device=mobile&skin=booster
http://new.ilogin.kr/?device=mobile&skin=clean
http://new.ilogin.kr/?device=mobile&skin=crew
http://new.ilogin.kr/?device=mobile&skin=display
*/
// 레이아웃 스킨 변수
$head_skin_path = G5_MOBILE_PATH."/include/$config[skin_header]";		// header
$main_skin_path = G5_MOBILE_PATH."/include/$config[skin_main]";			// main
$footer_skin_path = G5_MOBILE_PATH."/include/$config[skin_footer]";		// footer
$sub_left_skin_path = G5_MOBILE_PATH."/include/$config[skin_lefter]";		// sub_left
$quick_skin_path = G5_MOBILE_PATH."/include/$config[skin_quick]";		// sub_left

$head_skin_url = G5_MOBILE_URL."/include/$config[skin_header]";		// header
$main_skin_url = G5_MOBILE_URL."/include/$config[skin_main]";			// main
$footer_skin_url = G5_MOBILE_URL."/include/$config[skin_footer]";		// footer
$sub_left_skin_url = G5_MOBILE_URL."/include/$config[skin_lefter]";		// sub_left
$quick_skin_url = G5_MOBILE_URL."/include/$config[skin_quick]";		// sub_left

$mobile_skin_path = G5_MOBILE_PATH."/include/$config[skin_header]";
$mobile_skin_url = G5_MOBILE_URL."/include/$config[skin_header]";

include_once(G5_MOBILE_PATH."/include/$config[skin_header]/head.php");
?>