<?php
include_once('./_common.php');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/index.php');
    return;
}

define("_INDEX_", TRUE);

include_once(G5_SHOP_PATH.'/shop.head.php');
?>
<? include_once(G5_PATH."/include/main/$config[skin_main]/main_shop_inc.php"); // 메인 include ?>


<?php
include_once(G5_SHOP_PATH.'/shop.tail.php');
?>