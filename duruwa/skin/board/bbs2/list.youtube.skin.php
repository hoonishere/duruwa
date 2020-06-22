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
<style>
.if_tot			{border:1px solid #555; padding:18px; width:720px; height:260px;}
.if_big			{float:left; border:0px solid blue; width:420px;}
.if_info		{float:left; border:0px solid blue; width:290px;}
.info_txt		{ font-size:16px; border-bottom:1px solid #111; font-weight:bold; display:block; padding:8px 0;}
.info_txt	>a{color:#167ac6; text-decoration:none;}
.info_cont	{ line-height:23px; display:block; word-break:break-all; font-size:14px; padding:12px 6px 4px 6px ; border-bottom:1px solid #111; height:120px; overflow:hidden;}
.info_sub		{line-height:23px; display:block; word-break:break-all; font-size:14px; padding:12px 6px 4px 6px ; border:0px solid red;  overflow:hidden;}
</style>

<?
$content_main = preg_replace("(\<(/?[^\>]+)\>)", "", $list[0][wr_content]); 
?>
		<div class='if_tot'>
			<div class='if_big'>
				<iframe width="402" height="246" src="https://www.youtube.com/embed/<?=$list[0][wr_9]?>" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class='if_info'>
				<span class='info_txt'><a href='<?=$list[0][href]?>'><?=$list[0][wr_subject]?></a></span>
				<span class='info_cont'><?=$content_main?><!-- 나랏말싸미뒹긱에달아나랏말싸미뒹나랏말싸미뒹긱에달아나랏말싸미뒹 --></span>
				<span class ='info_sub'>조회수 : <?=$list[0][wr_hit]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=date("y-m-d", strtotime($list[0][wr_datetime]))?></span>
			</div>
		</div>

    <ul class="board_gallery">
	<? for ($i=1; $i<count($list); $i++) { 
		$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
		$noimage = $board_skin_path."/img/noimage.gif";
		$thumfile =get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);

		if($thumfile[src]){
			$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image  onerror='this.src=\"".G5_URL."/img/noimg.png\";this.style.border=\"none\";this.style.width=\"".$image_height."px\""."'>";
		}else{
			$image = "<img src='http://img.youtube.com/vi/".$list[$i][wr_9]."/maxresdefault.jpg' width='".$image_width."' height='".$image_height."'";
		}

		if($i>1 && ($i % $bo_gallery_cols == 1))
				$style = 'clear:both;';
		else
				$style = '';
		if ($i == 1) $k = 1;
		$k += 1;
		if ($k % $bo_gallery_cols == 1) $style .= "margin:0 !important;";
		?>
	<li style="<?php echo $style ?>width:<?php echo $board['bo_gallery_width'] ?>px; border:1px solid #555; <?if($i!=1){?>margin-left:8px;<?}?>">
		<?php if ($is_checkbox) { ?>
		<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
		<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
		<?php } ?>

		<a href="<?=$list[$i][href]?>" class="photo" ><?=$image?></a>
		<a href="<?=$list[$i][href]?>" class="subject2" style='text-decoration:none;'><?=cut_str($list[$i][subject],'40')?></a>
		<a href="#null" class="datetime" style="text-decoration:none;">조회수 :<?=$list[$i][wr_hit]?> <?=date("y-m-d", strtotime($list[$i][wr_datetime]))?></a></li>
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