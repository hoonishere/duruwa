<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if($_GET[sca] == "홈페이지" || $_GET[sca] == "쇼핑몰"){
	$image_width = 300;
	$image_height = 220;
}else{
	$image_width = 300;
	$image_height = 450;
}

$image_width2 = "";
$image_width2 = "";
?>

<script>
$(document).ready(function() {
	$.pirobox_ext({
		attribute: 'data-pirobox',
		piro_speed : 100,
		bg_alpha : .5,
		resize : true,
		zoom_mode : true,
		move_mode : 'drag',
		piro_scroll : true,
		share: false
	});

});
</script>
<script type="text/javascript" src="<?=$board_skin_path?>/pirobox/jquery_ui.min.js"></script>
<script type="text/javascript" src="<?=$board_skin_path?>/pirobox/pirobox_extended-1.3.js"></script>
<link id="style" href="<?=$board_skin_path?>/pirobox/piro.css" rel="stylesheet" type="text/css" />
<!-- 750, 550 -->

	<? if ($is_checkbox) { ?>
	<div><input onclick="if (this.checked) all_checked(true); else all_checked(false);" type="checkbox">전체선택&nbsp;<a href="javascript:select_order('order');">[정렬저장]</a></div>
	
	<? } ?>
	<ul class="board_gallery" style="width:1000px;">
	<? for ($i=0; $i<count($list); $i++) { 
		$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];

		$image_width2 = "";
		$image_height2 = "";
		$rollovercss = "rollover";

		if($list[$i][ca_name] == "모바일웹"){
			$image_width2 = 320;
			$image_height2 = 485;
			$rollovercss = "rollover2";
		}

		$noimage = $board_skin_path."/img/noimage.gif";
		$thumfile = thumnail($imagepath, $image_width, $image_height, 100, 1, 1,1, $noimage);
		$image = "<img src='$thumfile' width='$image_width' height='$image_height' alt=image  > ";
		
		if(strlen($image_width2) > 0){
			$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
			$noimage = $board_skin_path."/img/noimage.gif";
			$thumfile2 = thumnail($imagepath, $image_width2, $image_height2, 100, 1, 1,1, $noimage);
			$image2 = "<img src='$thumfile2' width='$image_width' height='$image_height' alt=image  > ";
			$imagepath = $thumfile2;
		}
		?>
	<li class="bstyle" style="height:<?=$image_height +50?>px;width:<?=$image_width?>px;">
	<? if ($is_checkbox) { ?>
		<input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>">&nbsp;<input type="text" style="width:50px;" id="chk_wr_2" name="chk_wr_2[]" value='<?=$list[$i][wr_2]?>'><br>
		<span ><?if ($is_admin) { ?><a href="<?=$list[$i][href]?>" ><? } ?><b >&nbsp;&nbsp; <?=cut_str($list[$i][subject],40)?></b></a></span>	
	<? }?>
	<a href="<?=$imagepath?>" class="pirobox_gall" data-pirobox="gallery" title="<?=$list[$i][wr_subject]?><?if(strlen($list[$i][wr_link1]) > 0){?>&nbsp;&nbsp;<a href='<?=set_http($list[$i][wr_link1])?>' target='_blank' style='color:#fff;'>[<?=set_http($list[$i][wr_link1])?>]</a><?}?> <a href='<?=$g4[path]?>/sp.php?p=21' style='color:#fff;'>&nbsp;&nbsp;[견적문의하기]</a>"><span class="<?=$rollovercss?>" ></span><?=$image?></a>
	<?
		if(strlen($list[$i][file][1][file]) > 0){
			$imagepath2 = $list[$i][file][1][path]."/".$list[$i][file][1][file];
	?>
	<a href="<?=$imagepath2?>" class="pirobox_gall" data-pirobox="gallery" style="display:none;" title="<?=$list[$i][wr_subject]?><?if(strlen($list[$i][wr_link1]) > 0){?>&nbsp;&nbsp;<a href='<?=set_http($list[$i][wr_link1])?>' target='_blank' style='color:#fff;'>[<?=set_http($list[$i][wr_link1])?>]</a><?}?> <a href='<?=$g4[path]?>/sp.php?p=21' style='color:#fff;'>&nbsp;&nbsp;[견적문의하기]</a>"><?=$image?></a>
	<? } ?>
	<?
		if(strlen($list[$i][file][2][file]) > 0){
			$imagepath3 = $list[$i][file][2][path]."/".$list[$i][file][2][file];
	?>
		<a href="<?=$imagepath3?>" class="pirobox_gall" data-pirobox="gallery" style="display:none;" title="<?=$list[$i][wr_subject]?><?if(strlen($list[$i][wr_link1]) > 0){?>&nbsp;&nbsp;<a href='<?=set_http($list[$i][wr_link1])?>' target='_blank' style='color:#fff;'>[<?=set_http($list[$i][wr_link1])?>]</a><?}?> <a href='<?=$g4[path]?>/sp.php?p=21' style='color:#fff;'>&nbsp;&nbsp;[견적문의하기]</a>"><?=$image?></a>
	<?
		}
	?>
	<?if($is_guest){?>
	<span style='font-family:"맑은 고딕";'><?=$list[$i][subject]?></span>
	<?}else{?>
	<a href="<?=$list[$i][href]?>" class="subject" style='font-family:"맑은 고딕";'><?=$list[$i][subject]?></a>
	<?}?>
	</li>
	<? } // end for ?>
	<? if (count($list) == 0) { echo "<div style='line-height:50px; text-align:center;'>게시물이 없습니다.</div>"; } ?>
	</ul>