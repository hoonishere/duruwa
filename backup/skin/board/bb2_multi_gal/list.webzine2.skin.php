<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$image_width = 150;
$image_height = 200;
include_once("$board_skin_path/fun.php");
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<ul class="board_webzine">
			<? for ($i=0; $i<count($list); $i++) { 
				$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
				$noimage = $board_skin_path."/img/noimage.gif";
				//$thumfile = thumnail($imagepath, $image_width, $image_height, 100, 1, 1,1);
				$thumfile=get_list_thumbnail($board['bo_table'],$list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
				if($thumfile)
				//$image = "<span class='thumb'><img src='$thumfile' width='$image_width' height='$image_height' class=image ></span>";
				//$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image > ";
				$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image>";
				?>
	<li style="display:block; float:left; width:720px; margin-left:10px;">

		<?if($is_admin){?><a href="<?=$list[$i][href]?>"><?}?><?=$image?>
		<strong><?=$list[$i][subject]?></strong>
		</a>
		<p style='display:block; float:left; width:550px; margin-top:10px;'><?=nl2br($list[$i][wr_content])?></p>
		<ul class="wz_info">
		</ul>
	</li>
    <? } // end for ?>

    <? if (count($list) == 0) { echo "<div style='line-height:50px; text-align:center;'>게시물이 없습니다.</div>"; } ?>
    </ul>
