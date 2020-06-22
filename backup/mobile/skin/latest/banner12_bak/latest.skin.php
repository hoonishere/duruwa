<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
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
    width:200px;
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
.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-next-horizontal {
    position: absolute;
    top:50%;
		right:0%;
		margin-top:-30px;
    width:30px;
    height:60px;
    cursor: pointer;
    background: transparent url("<?=G5_URL?>/include/main/force/img/qb_next.png") no-repeat 0 0;/*<?=$latest_skin_url?>/img/next.png*/
		background-size:100%;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-prev-horizontal {
    position: absolute;
    top:50%;
		left:0%;
		margin-top:-30px;
    width:30px;
    height:60px;
    cursor: pointer;
    background: transparent url("<?=G5_URL?>/include/main/force/img/qb_prev.png") no-repeat 0 0; /*<?=$latest_skin_url?>/img/prev.png*/
		background-size:100%;
}


.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> li img{
	width:100%; height:auto;
}

</style>

<ul id="mycarousel<?=$bo_table?><?=$skin_dir?>" class="jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?>">
	<li><a href="<?=G5_URL?>/sp.php?p=21" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q1.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=22" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q2.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=23" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q3.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=24" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q4.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=25" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q5.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=26" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q6.jpg"></a></li>
	<li><a href="<?=G5_URL?>/sp.php?p=28" class="image"><img src="<?=G5_URL?>/mobile/include/force/img/q7.jpg"></a></li>
</ul>

<script type="text/javascript" src="<?=$latest_skin_url?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?=$latest_skin_url?>/js/jquery.touchwipe.min.js"></script>
<script type="text/javascript">
$(function(){
	$('#mycarousel<?=$bo_table?><?=$skin_dir?>').jcarousel({
		auto:5,
		scroll:1,
		animation: 'slow',
		wrap: 'circular'
	});
	$('#mycarousel<?=$bo_table?><?=$skin_dir?>').touchwipe({
		wipeLeft: function() {
			$('#mycarousel<?=$bo_table?><?=$skin_dir?>').jcarousel('next');
		},
		wipeRight: function() {
			$('#mycarousel<?=$bo_table?><?=$skin_dir?>').jcarousel('prev');
		},
		min_move_x: 20,
		min_move_y: 20,
		preventDefaultEvents: false
	});
});
</script>