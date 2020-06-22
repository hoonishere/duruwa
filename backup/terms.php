<?
include_once("./_common.php");
include_once("./head.sub.php");
?>

<link rel="stylesheet" href="<?=$g4[path]?>/css/common.css" type="text/css">
<link rel="stylesheet" href="<?=$g4[path]?>/css/sub.css" type="text/css">

<div class="terms_pop_wrap">
<div class="terms_title">이용약관</div>
<div class="terms_con">	<?=nl2br($config[cf_stipulation])?></div>
<div class="terms_btn"><a href="#" onclick="self.close()"><img src="<?=$g4[path]?>/img/btn_close.gif" border="0"></a></div>

</div>