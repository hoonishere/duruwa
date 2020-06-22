<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
.jcarousel-skin-tango<?=$bo_table?> .jcarousel-container {
	position:relative;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-direction-rtl {
	direction: rtl;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-container-horizontal {
    width: 1000px;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-clip {
    overflow: hidden;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-clip-horizontal {
    width:  1000px;
    height: 543px;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-item {
    width: 1000px;
    height: 543px;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-item-horizontal {
	margin-left: 0;
	margin-right: 5px;
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
    top: 228px;
    right: -35px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url("<?=$latest_skin_url?>/img/btn_right.gif") no-repeat 0 0;
}

.jcarousel-skin-tango<?=$bo_table?> .jcarousel-prev-horizontal {
    position: absolute;
    top: 228px;
    left: -15px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url("<?=$latest_skin_url?>/img/btn_left.gif") no-repeat 0 0;
}
</style>
<script type="text/javascript" src="<?=$latest_skin_url?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
			auto: 5,
			scroll: 1,
			wrap: 'circular'
    });
});
</script>
<?
$width = "1000";
$height = "543";
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$board['bo_gallery_width'] = $width;
$board['bo_gallery_height'] = $height;
?>
<ul id="mycarousel" class="jcarousel-skin-tango<?=$bo_table?>">
	<? for ($j=0; $j<count($list); $j++) { 
		$noimage = "$latest_skin_url/img/no-image.gif";
		$list[$j][file] =get_file($bo_table, $list[$j][wr_id]);
		$imagepath = $list[$j][file][0][path]."/".$list[$j][file][0][file];

		$thumb = get_list_thumbnail($board['bo_table'], $list[$j]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
		if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
		} else {
				$img_content = '<span style="width:'.$board['bo_gallery_width'].'px;height:'.$board['bo_gallery_height'].'px">no image</span>';
		}
		?>
			<li><a href="<?=set_http($list[$j][wr_link1])?>"><?=$img_content?></a></li>
	<?}?>
</ul>