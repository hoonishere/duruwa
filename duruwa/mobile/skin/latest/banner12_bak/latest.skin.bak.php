<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-container {
	position:relative;
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
    right:330px;
    width:40px;
    height:80px;
    cursor: pointer;
    background: transparent url("<?=G5_URL?>/include/main/force/img/qb_next.png") no-repeat 0 0;/*<?=$latest_skin_url?>/img/next.png*/
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-prev-horizontal {
    position: absolute;
    top:60px;
    left: 330px;
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
	<? for ($i=0; $i<count($list); $i++) { 
		$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $image_width, $image_height);

		if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$image_width.'" height="'.$image_height.'">';
		} else {
				$img_content = '<span style="width:'.$image_width.'px;height:'.$image_height.'px"><img src="'.G5_URL.'/img/noimg.png" width="'.$image_width.'" height="'.$image_height.'"></span>';
		}

		if($list[$i][wr_link1]){
			$list[$i][href] = $list[$i][wr_link1] ; 
		}else{
			$list[$i][href] = "#null" ; 
		}
		?>
		<li>
			<a href="<?=$list[$i][href]?>" class="image"><!-- <span class="rollover" ></span> -->
			<?=$img_content?>
			</a>
		</li>
	<?}?>
</ul>

<script type="text/javascript" src="<?=$latest_skin_url?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript">

	$('#mycarousel<?=$bo_table?><?=$skin_dir?>').jcarousel({
			auto: 3,
			scroll: 3,
			wrap: 'circular'
	});
</script>