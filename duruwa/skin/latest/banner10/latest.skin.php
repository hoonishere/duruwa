<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<?
$image_width = 150;
$image_height = 60;
?>
<style>
.jcarousel-skin-tango<?=$bo_table?> .jcarousel-container {
	position:relative;
	left:10px;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-direction-rtl {
	direction: rtl;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-container-horizontal {
    width: 966px;
    padding: 5px 15px;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-clip {
    overflow: hidden;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-clip-horizontal {
    width:  1210px;
    height: 60px;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-item {
    width: 150px;
    height: 60px;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-item-horizontal {
	margin-left: 0;
	margin-right: 25px;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-direction-rtl .jcarousel-item-horizontal {
	margin-left: 10px;
    margin-right: 0;
}



.jcarousel-skin-tango<?=$bo_table?> .jcarousel-item-placeholder {
    background: #fff;
    color: #000;
}

/**
 *  Horizontal Buttons
 */
.jcarousel-skin-tango<?=$bo_table?> .jcarousel-next-horizontal {
    position: absolute;
    top: 8px;
    right: -245px;
    width: 20px;
    height: 54px;
    cursor: pointer;
    background: transparent url("<?=G5_URL?>/include/main/force/img/family_next.png") no-repeat 0 0;/*<?=$latest_skin_url?>/img/next-horizontal.png*/
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-prev-horizontal {
    position: absolute;
    top: 8px;
    left: -10px;
    width: 20px;
    height: 54px;
    cursor: pointer;
    background: transparent url("<?=G5_URL?>/include/main/force/img/family_prev.png") no-repeat 0 0;/*<?=$latest_skin_url?>/img/prev-horizontal.png*/
}
</style>
<script type="text/javascript" src="<?=$latest_skin_url?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#mycarousel<?=$bo_table?>').jcarousel({
			auto: 7,
			scroll: 1,
			wrap: 'circular'
    });
});
</script>
<ul id="mycarousel<?=$bo_table?>" class="jcarousel-skin-tango<?=$bo_table?>">
	<? for ($i=0; $i<count($list); $i++) { ?>
<?php
	$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $image_width, $image_height);

	if($thumb['src']) {
			$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$image_width.'" height="'.$image_height.'">';
	} else {
			$img_content = '<span style="width:'.$image_width.'px;height:'.$image_height.'px">no image</span>';
	}
?>
			<li>
			<?if(strlen($list[$i][wr_link1]) > 0){?><a href="<?=set_http($list[$i][wr_link1])?>" <?if(strlen($list[$i][wr_10]) > 0){ echo "target='_blank'";}?>><?}?>
			<?=$img_content?><?if(strlen($list[$i][wr_link1]) > 0){?></a><?}?></li>
	<?}?>
</ul>