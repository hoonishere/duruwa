<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-container {
	position:relative;
		min-width:1200px;
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
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-clip {
    overflow: hidden;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-clip-horizontal {
    width:  100%; /*width:  1000px;*/
		min-width:1200px;
		margin:0 auto;
		text-align:center;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-item {
    width: 285px;
    height: 195px;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-item-horizontal {
	margin-left: 0;
	margin-right: 20px;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-direction-rtl .jcarousel-item-horizontal {
	margin-left: 20px;
	margin-right: 0;
}



.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-item-placeholder {
	color: #000;
}

/**
 *  Horizontal Buttons
 */
.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-next-horizontal {
    position: absolute;
    top:60px;
		right:50%;
		margin-right:-600px;
    width:40px;
    height:80px;
    cursor: pointer;
    background: transparent url("<?=G5_URL?>/include/main/force/img/qb_next.png") no-repeat 0 0;/*<?=$latest_skin_url?>/img/next.png*/
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-prev-horizontal {
    position: absolute;
    top:60px;
		left:50%;
		margin-left:-600px;
    width:40px;
    height:80px;
    cursor: pointer;
    background: transparent url("<?=G5_URL?>/include/main/force/img/qb_prev.png") no-repeat 0 0; /*<?=$latest_skin_url?>/img/prev.png*/
}





/* css-method */
span.rollover {
	background:url('<?=$latest_skin_url?>/img/over_bg.png') center center no-repeat;
	cursor: pointer;
	height: 195px;
	width: 285px;
	position: absolute;
	z-index: 10;
	opacity: 0;
}

span.rollover:hover {
	opacity:1;
}


</style>

<?
$image_width = 285;
$image_height = 195;
?>
<ul id="mycarousel<?=$bo_table?><?=$skin_dir?>" class="jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?>">
	<li><a href="<?=G5_URL?>/sp.php?p=21" class="image"><img src="<?=G5_URL?>/include/main/force/img/qb1.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=22" class="image"><img src="<?=G5_URL?>/include/main/force/img/qb2.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=23" class="image"><img src="<?=G5_URL?>/include/main/force/img/qb3.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=24" class="image"><img src="<?=G5_URL?>/include/main/force/img/qb4.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=25" class="image"><img src="<?=G5_URL?>/include/main/force/img/qb8.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=26" class="image"><img src="<?=G5_URL?>/include/main/force/img/qb6.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=28" class="image"><img src="<?=G5_URL?>/include/main/force/img/qb7.jpg"></a></li>
</ul>

<script type="text/javascript" src="<?=$latest_skin_url?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript">
$(function(){
	$('#mycarousel<?=$bo_table?><?=$skin_dir?>').jcarousel({
		auto:3,
		scroll:1,
		animation: 'slow',
		wrap: 'circular'
	});
});
</script>