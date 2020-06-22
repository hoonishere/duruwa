<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$image_width = 250;
$image_height = 150;
include_once("$board_skin_path/fun.php");
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>

<ul class="board_webzine">
	<? for ($i=0; $i<count($list); $i++) { 
		$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
		$noimage = $board_skin_path."/img/noimage.gif";
		//$thumfile = thumnail($imagepath, $image_width, $image_height, 100, 0, 1,1);
			$thumfile=get_list_thumbnail($board['bo_table'],$list[$i]['wr_id'], $board['bo_gallery_width'],$board['bo_gallery_height']);
		if($thumfile)
		//$image = "<img class='simg' src='$thumfile' width='$image_width' height='$image_height'>";
		//$image = "<span class='thumb'><img src='$imagepath' width='$image_width' height='$image_height' class=image ></span>";
		$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image > ";

		?>
	<li>
	<div class="dtlimg" style="position:absolute;top:10px;left:310px;display:none;z-index:100"><img src="<?=$imagepath?>" style="max-width:670px;max-height:380px;" /></div>
		<a href="<?=$list[$i][href]?>"><?=$image?>
		<strong><?=$list[$i][subject]?></strong>
		</a>
		<p class="wz_content" style="height:<?=($image_height-40)?>px;overflow:hidden;"><?=cut_str(strip_tags($list[$i][wr_content]),"500")?><br><br></p>
		<ul class="wz_info">
			<li class="wz_info_name"><?=$list[$i][name]?></li>
			<li class="wz_info_date"><?=date("y-m-d", strtotime($list[$i][wr_datetime]))?></li>
			<li class="wz_info_hit"><?=$list[$i][wr_hit]?></li>
		</ul>
	</li>
    <? } // end for ?>

    <? if (count($list) == 0) { echo "<div style='line-height:50px; text-align:center;'>게시물이 없습니다.</div>"; } ?>
    </ul>

<script>
/*
	$(document).ready(function(){
		$(".simg").mouseover(function(){
			var idx = $(".simg").index($(this));
			$(".dtlimg").eq(idx).delay(200).show(0);
			event.stopPropagation();
		});
		$(".simg").mouseout(function(){
			var idx = $(".simg").index($(this));
			$(".dtlimg").eq(idx).hide(0);
			event.stopPropagation();
		});
	});
*/
</script>