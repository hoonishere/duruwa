<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$image_width = $board['bo_gallery_width'];
$image_height = $board['bo_gallery_height'];
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<?//print_r2($board);?>
    <ul class="board_gallery">
	<? for ($i=0; $i<count($list); $i++) { 
		$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
		$noimage = $board_skin_path."/img/noimage.gif";
		$thumfile =get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
		$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image > ";
		//$image = '<img src="'.$thumbfile[src].'"  width="'.$image_width.'" height="'.$image_height.'">';
		?>
	<li style="height:<?=$image_height +50?>px;width:<?=$image_width?>px;">
		<a href="<?=$list[$i][href]?>" class="photo" ><?=$image?></a>
		<a href="<?=$list[$i][href]?>" class="subject" ><?=$list[$i][subject]?></a>
		<a href="<?=$list[$i][href]?>" class="datetime"><?=date("y-m-d", strtotime($list[$i][wr_datetime]))?></a></li>
    <? } // end for ?>

    <? if (count($list) == 0) { echo "<div style='line-height:50px; text-align:center;'>게시물이 없습니다.</div>"; } ?>
    </ul>


<?
	/*get_list_thumbnail($bo_table, $wr_id, $thumb_width, $thumb_height, $is_create=false, $is_crop=true, $crop_mode='center', $is_sharpen=false, $um_value='80/0.5/3')


   $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
   if($thumb['src']) {
   $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
    } else {
      $img_content = '<span style="width:'.$board['bo_gallery_width'].'px;height:'.$board['bo_gallery_height'].'px">no image</span>';
    }
       echo $img_content;

*/
?>