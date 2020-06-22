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
    width:  1000px;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-item {
    width: 320px;
    height: 320px;
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
    top:145px;
    right:-55px;
    width:48px;
    height:48px;
    cursor: pointer;
    background: transparent url("<?=$latest_skin_url?>/img/next.png") no-repeat 0 0;
}

.jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?> .jcarousel-prev-horizontal {
    position: absolute;
    top:145px;
    left: -55px;
    width:48px;
    height:48px;
    cursor: pointer;
    background: transparent url("<?=$latest_skin_url?>/img/prev.png") no-repeat 0 0;
}





/* css-method */
span.rollover {
	background:url('<?=$latest_skin_url?>/img/over_bg.png') center center no-repeat;
	cursor: pointer;
	height: 320px;
	width: 320px;
	position: absolute;
	z-index: 10;
	opacity: 0;
}

span.rollover:hover {
	opacity:1;
}


</style>

<?
$image_width = 320;
$image_height = 320;
?>
<ul id="mycarousel<?=$bo_table?><?=$skin_dir?>" class="jcarousel-skin-tango<?=$bo_table?><?=$skin_dir?>">
	<? for ($i=0; $i<count($list); $i++) { 
		$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $image_width, $image_height);

		if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$image_width.'" height="'.$image_height.'">';
		} else {
				$img_content = '<span style="width:'.$image_width.'px;height:'.$image_height.'px"><img src="'.G5_URL.'/img/noimg.png" width="'.$image_width.'" height="'.$image_height.'"></span>';
		}
		?>
		<li>
			<a href="<?=$list[$i][href]?>" class="image"><span class="rollover" ></span>
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