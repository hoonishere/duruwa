<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/menu.lib.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>

<?
include_once(G5_PATH."/include/quick/$config[skin_quick]/quick.php");
?>
<!-- 상단 시작 { -->
<h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
<div id="skip_to_container"><a href="#container_skip">본문 바로가기</a><a href="#header_t_id">주메뉴 바로가기</a></div>
<?php
if(defined('_INDEX_')) { // index에서만 실행
	include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
}
?>
<!-- 상단 시작 { -->
<div id="total_wrap">
	<div id="wrap">

		<div id="wrap_header">
			<? include_once(G5_PATH."/include/header/$config[skin_header]/header_inc.php"); // 상단 include ?>
		</div><!-- wrap_header end -->
