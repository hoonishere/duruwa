<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
	require_once(G5_THEME_PATH.'/tail.php');
	return;
}

if (G5_IS_MOBILE) {
	include_once(G5_MOBILE_PATH.'/tail.php');
	return;
}
?>
<!-- } 콘텐츠 끝 -->
<!-- 하단 시작 { -->
		<div id="wrap_footer">
			<? include_once(G5_PATH."/include/footer/$config[skin_footer]/footer_inc.php"); // 상단 include ?>
		</div><!-- wrap_footer end -->
	</div><!-- wrap end -->
</div><!-- total_wrap end -->
<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { 
	if(preg_match('/iphone|ipod|ios|blackberry|android|windows ce|lg|mot|samsung|sonyericsson|nokia/i', $_SERVER['HTTP_USER_AGENT'])){
	?>
<a href="<?php echo get_device_change_url(); ?>" id="device_change">모바일 버전으로 보기</a> 
<?php
	}
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->
	
<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_PATH."/tail.sub.php");
?>