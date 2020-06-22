<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if(defined('G5_THEME_PATH')) {
	require_once(G5_THEME_PATH.'/tail.php');
	return;
}

if (G5_IS_MOBILE) {
	include_once(G5_MOBILE_PATH.'/tail.php');
	return;
}

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>

<?if(!defined('_INDEX_')) { // index에서만 실행?>
			</div><!-- content_desc end -->
	</div><!-- sub_content end -->
	<div class="clear"></div>
</div><!-- wrap_sub end -->
<?}?>
<?
include_once(G5_PATH."/tail.php");
include_once(G5_PATH."/tail.sub.php");
?>