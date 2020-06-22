<?
include_once("./_common.php");
include_once("./head.sub.php");
?>
<style>
	body {margin:0;}
</style>

<link rel="stylesheet" href="<?=$g4[path]?>/css/common.css" type="text/css">
<link rel="stylesheet" href="<?=$g4[path]?>/css/sub.css" type="text/css">

<div class="privacy_pop_wrap">
<div class="privacy_title">개인정보취급방침</div>
<div class="privacy_con">	<?=nl2br($config[cf_privacy])?></div>
<div class="privacy_btn"><a href="#" onclick="self.close()"><img src="<?=$g4[path]?>/img/btn_close.gif" border="0"></a></div>
</div>