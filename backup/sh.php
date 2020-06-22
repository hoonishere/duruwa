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
<? include_once(G5_PATH."/include/quick/$config[skin_quick]/quick.php"); ?>
<? include_once(G5_PATH.'/head.php'); ?>

<script>
$(function(){
	$(".s20_btn > a").click(function(){
		$(".s20_btn > a").removeClass();
		$(this).addClass("on20");
		idx = $(".s20_btn > a").index($(this));
		$(".s20").hide();
		$(".s20").eq(idx).show();
		return false;
	});
});
</script>

<?if(!defined('_INDEX_')) { // index에서만 실행?>

<div id="wrap_sub">
	<div class="sub_content">
		<?if (!defined('_SHOP_')){?>
		<div class="content_title">
			<div class="title_subject"><?=$tp[navi1]?></div>
			<div class="title_bar"></div>
			<div class="title_navi">체계적이고 전문적인 드루와뷰티와 함께하세요</div>
		</div>
		<?}?>
		<div class="sub_left">
			<? include_once(G5_PATH."/include/left/$config[skin_lefter]/left_lnb_inc.php"); // 상단 include ?>
		</div>

			<div class="content_desc">
<?}?>
<div id="container_skip"></div>