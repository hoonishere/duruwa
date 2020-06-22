<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$image_width = $board['bo_gallery_width'];
$image_height = $board['bo_gallery_height'];
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
//갤러리7을 연장해서(extend) 에디터 이미지까지 모두 레이어 팝업으로 뜨게 하는 것입니다. 그리고 게시글의 한장의 사진만 보여주는게 아니라 게시글의 모든 사진을 보여준다.
?>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?=$board_skin_url?>/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?=$board_skin_url?>/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?=$board_skin_url?>/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>

<?php if ($is_checkbox) { ?>
<div id="gall_allchk">
		<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
		<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);"> 전체선택
</div>
<?php } ?>

	<ul class="board_gallery">
	<? for ($i=0; $i<count($list); $i++) { 
	$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
	$noimage = G5_URL."/img/noimg.png";

	$thumfile = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
	if($thumfile[src]){
		$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image > ";
	}else{
		$no_filepath = G5_PATH.'/img';
		$no_img_src = "noimg.png";
		
		$thumb_no = thumbnail($no_img_src, $no_filepath ,$no_filepath , $image_width,$image_height, false);
		$noimage = "<img src='".G5_URL."/img/".$thumb_no."'  width=$image_width height=$image_height>";
		$image = $noimage ;  // 마지막에 
	}
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

		<?if(!$list[$i][wr_9]){ // 즉 사진이라면?>
			<?if($imagepath !="/"){ // 에디터 이미지가 아닌 파일 첨부로 올렸을때?>
				<?for($j = 0; $j < $list[$i][file][count] ; $j++){?>
				<?
					$imagepath = $list[$i][file][$j][path]."/".$list[$i][file][$j][file];
				?>
				<a class="fancybox" <?if($j!=0){?>style="display:none;"<?}?> data-fancybox-group="gallery" class="photo" href="<?=$imagepath?>" title="<?=$list[$i][wr_subject]?>">
					<?=$image?>
				</a>
			<?}?>
			<?}else{ // 에디터 이미지 였을때 ?>
				<?
					$matches = get_editor_image($list[$i]['wr_content'], false);
					for($k=0; $k<count($matches[1]); $k++){ ?>
						<a class="fancybox" <?if($k!=0){?>style="display:none;"<?}?> data-fancybox-group="gallery" class="photo" href="<?=$matches[1][$k]?>" title="<?=$list[$i][wr_subject]?>">
							<?=$image?>
						</a>
				<?}?>
			<?}?>
		<?}else{?>
		<a href="<?=$list[$i][wr_9]?>" data-fancybox-group="gallerymovie" class="fancybox fancybox.iframe" title="<?=$list[$i][wr_subject]?>">
			<?=$image?>
		</a>
		<?}?>
	<?if($member[mb_level] > 6){?><a href="<?=$list[$i][href]?>" class="subject"><?}?><?=$list[$i][subject]?><?if($member[mb_level] > 6){?></a><?}?>

	<? } // end for ?>

	<? if (count($list) == 0) { echo "<div style='line-height:50px; text-align:center;'>게시물이 없습니다.</div>"; } ?>
	</ul>