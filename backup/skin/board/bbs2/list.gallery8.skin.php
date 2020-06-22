<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$image_width = 250;
$image_height = 300;

// 컨텐츠 가로 px 사이즈 입력
$content_width = 804;
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
.jcarousel-skin-tango .jcarousel-container {
	position:relative;
	left:0px;
}

.jcarousel-skin-tango .jcarousel-direction-rtl {
	direction: rtl;
}

.jcarousel-skin-tango .jcarousel-container-horizontal {
    width: <?=$content_width?>px;
    padding: 5px 15px;
}

.jcarousel-skin-tango .jcarousel-clip {
    overflow: hidden;
}

.jcarousel-skin-tango .jcarousel-clip-horizontal {
    width:  <?=$content_width-27?>px;
    height: <?=$image_height?>px;
}

.jcarousel-skin-tango .jcarousel-item {
    width: <?=$image_width?>px;
    height: <?=$image_height?>px;
}

.jcarousel-skin-tango .jcarousel-item-horizontal {
	margin-left: 0;
	margin-right: 10px;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-item-horizontal {
	margin-left: 10px;
    margin-right: 0;
}



.jcarousel-skin-tango .jcarousel-item-placeholder {
    background: #fff;
    color: #000;
}

/**
 *  Horizontal Buttons
 */
.jcarousel-skin-tango .jcarousel-next-horizontal {
    position: absolute;
    top: <?=($image_height/2)-11?>px;
    right: 5px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url("<?=$board_skin_path?>/img/next-horizontal.png") no-repeat 0 0;
}

.jcarousel-skin-tango .jcarousel-prev-horizontal {
    position: absolute;
    top: <?=($image_height/2)-11?>px;
    left: 5px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url("<?=$board_skin_path?>/img/prev-horizontal.png") no-repeat 0 0;
}
</style>
<script type="text/javascript" src="<?=$board_skin_path?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function() {
	<? for ($i=0; $i<count($list); $i++) { ?>
    jQuery('#mycarousel<?=$i?>').jcarousel({
			auto: 4,
			scroll: 1,
			wrap: 'circular'
    });
	<?}?>
});
</script>
<? for ($i=0; $i<count($list); $i++) { ?>
<ul id="mycarousel<?=$i?>" class="jcarousel-skin-tango">
	<? for ($j=0; $j<$list[$i][file][count]; $j++) { 
	$imagepath = $list[$i][file][$j][path]."/".$list[$i][file][$j][file];
	$noimage = $board_skin_path."/img/noimage.gif";
	//$thumfile = thumnail($imagepath, $image_width, $image_height, 100, 1, 1,1, $noimage);
	//$image = "<img src='$thumfile' width='$image_width' height='$image_height' class=image > ";
	
	$thumfile = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
	$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image > ";
	//print_r2($thumfile);
	?>
			<li><?=$image?></li>
	<?}?>
</ul>
<?if($member[mb_level] > 6){?><a href="<?=$list[$i][href]?>">[수정]</a><?}?>
<?if(($i+1) != count($list)){?><p style="border-top:1px solid #ddd;vertical-align:middle;display:block;margin:10px 0;"></p><?}?>
<?}?>