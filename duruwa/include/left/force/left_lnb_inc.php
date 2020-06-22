<?
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$sub_left_skin_url.'/left_lnb_inc.css">', 10);
?>
<div class="left_lnb">
	<!-- 레프트메뉴 인클루드-->
	<?=leftmenu("$config[skin_left]");?>
	<!-- 레프트메뉴 인클루드-->
</div>