<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
.mycarouselbannerbanner12 {}
.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-container {
	position:relative;
		width:100%;
		margin:0 auto;
		text-align:center;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-direction-rtl {
	direction: rtl;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-container-horizontal {
	width: 100%;
	padding: 0px 0px;
	position:relative;
	margin:0 auto;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-clip {
	overflow: hidden;
	position:relative;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-clip-horizontal {
    width:100%;
		width:100%;
		margin:0 auto;
		text-align:center;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-item {
    width:50%;
    height:auto;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-item-horizontal {
	margin-left: 5px;
	margin-right:0px;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-direction-rtl .jcarousel-item-horizontal {
	margin-left:20px;
	margin-right: 0;
}



.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-item-placeholder {
	color: #000;
}

/**
 *  Horizontal Buttons
 */

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> li{
	position:relative; 
	
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> li img{
	float:left;
	width:49%; height:auto; margin:1px;
}

</style>

<ul id="mycarousel<?=$bo_table?><?=$skin_dir?>" class="jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?>" style="padding-bottom:380px;">
	<li><a href="<?=G5_URL?>/sp.php?p=21" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q1.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=22" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q2.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=23" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q3.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=24" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q4.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=25" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q8.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=26" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q6.jpg"></a></li>
</ul>

