<?php
include_once('./_common.php');
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>
<!-- wrap_main start -->
<div id="wrap_main">
	<? include_once(G5_PATH."/include/main/$config[skin_main]/main_inc.php"); // 메인 include ?>
</div>
<!-- wrap_main end -->
<?php
include_once(G5_PATH.'/tail.php');
?>