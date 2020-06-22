<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$image_width = $board['bo_gallery_width'];
$image_height = $board['bo_gallery_height'];

$image_width2 = $board['bo_gallery_width'];
$image_height2 = $board['bo_gallery_height'];
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
$thumfile =get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $image_width, $image_height);
$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image > ";
$li_height = $image_height +15;
if ($is_checkbox) {
$li_height = $image_height +45;
}
?>

<li style="height:<?=$li_height?>px;width:<?=$image_width?>px;">
		<?php if ($is_checkbox) { ?>
		<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
		<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
		<?php } ?>
<a href="#inline<?=$list[$i][wr_id]?>" rel="inline-400-600" class="pirobox_gall" title="<?=nl2br($list[$i][wr_content])?>"><?=$image?></a>

<a href="<?=$list[$i][href]?>" style='line-height:20px;height:20px;'><?=$list[$i][subject]?></a></li>
<? } // end for ?>

<? if (count($list) == 0) { echo "<div style='line-height:50px; text-align:center;'>게시물이 없습니다.</div>"; } ?>


</ul>
<? for ($i=0; $i<count($list); $i++) { 
$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
$noimage = $board_skin_path."/img/noimage.gif";
$thumfile =get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $image_width2, $image_height2);
$image2 = "<img src='".$thumfile[src]."' width='".$image_width2."' height='".$image_height2."' class=image > ";
//$image = '<img src="'.$thumbfile[src].'"  width="'.$image_width.'" height="'.$image_height.'">';



?>
<div id="inline<?=$list[$i][wr_id]?>" style="display:none; background:white;">
<p>
<p class="h2" style='text-align:center;padding-top:10px;font-size:14px;font-weight:bold;'><?=$list[$i][wr_subject]?></p>
<p style="text-align:center;padding-top:10px;">
	<?=$image2?>
</p>
<p style="padding:10px;">
<?=nl2br($list[$i][wr_content])?>
</p>
</p>
</div>
<? } ?>
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

// 선택한 게시물 복사 및 이동
function select_order(sw) {
    var f = document.fboardlist;


        str = "정렬";


		 if (!confirm("선택한 게시물을 정렬저장 하시겠습니까?\n\n"))
        return;

		f.action = "./order.php";
    f.submit();
}
</script>