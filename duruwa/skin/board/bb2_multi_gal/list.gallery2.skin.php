<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$image_width = $board['bo_gallery_width'];
$image_height = $board['bo_gallery_height'];
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<?php if ($is_checkbox) { ?>
<div id="gall_allchk">
		<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
		<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);"> 전체선택
</div>
<?php } ?>

<ul class="board_gallery">
<? for ($i=0; $i<count($list); $i++) { 
$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
$noimage = $board_skin_path."/img/noimage.gif";
//$thumfile = thumnail($imagepath, $image_width, $image_height, 100, 1, 1,1, $noimage);
//$image = "<img src='$thumfile' width='$image_width' height='$image_height' class=image > ";

$thumfile = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image > ";

	
	if($i>0 && ($i % $bo_gallery_cols == 0))
			$style = 'clear:both;';
	else
			$style = '';
	if ($i == 0) $k = 0;
	$k += 1;
	if ($k % $bo_gallery_cols == 0) $style .= "margin:0 !important;";

?>
<li style="<?php echo $style ?>width:<?php echo $board['bo_gallery_width'] ?>px">

		<?php if ($is_checkbox) { ?>
		<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
		<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
		<?php } ?>

<a href="<?=$list[$i][file][0][path] .'/'. $list[$i][file][0][file]?>" rel="gallery"  class="pirobox_gall" title="<?=$list[$i][subject]?>"><?=$image?></a>

<a href="<?=$list[$i][href]?>" class="datetime"><?=$list[$i][subject]?></a></li>
<? } // end for ?>

<? if (count($list) == 0) { echo "<div style='line-height:50px; text-align:center;'>게시물이 없습니다.</div>"; } ?>
</ul>

<link href="<?=$board_skin_url?>/piro/css_pirobox/style_5/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$board_skin_url?>/piro/js/jquery_1.5-jquery_ui.min.js"></script>
<script type="text/javascript" src="<?=$board_skin_url?>/piro/js/pirobox_extended_feb_2011.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$.piroBox_ext({
	piro_speed :400,
	bg_alpha : 0.5,
	piro_scroll : true,
	piro_drag :true,
	piro_nav_pos: 'bottom'
});
});
</script>