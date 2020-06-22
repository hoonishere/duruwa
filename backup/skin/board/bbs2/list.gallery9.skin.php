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
#masonry-container > li						{border: 1px solid #747474; /* !test */margin:0 15px 15px 15px; list-style:none; border-radius:9px;}
#masonry-container > li div a img			{border-radius:9px 9px 0 0;}
.ma_tit			/* li 하단제목*/			{padding:15px 10px; margin-bottom:10px; border-bottom:1px solid #ddd; font-size:15px; font-weight:600;}
.ma_cont		/* li 하단내용*/			{padding:0px 10px; line-height:150%;}
</style>

<script  src="https://npmcdn.com/masonry-layout@4.0.0/dist/masonry.pkgd.min.js"></script>
<ul id="masonry-container" class="small-block-grid-2 medium-block-grid-4 large-block-grid-6"  >
		<? for ($i=0; $i<count($list); $i++) { 
		$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
		//$noimage = $board_skin_path."/img/noimage.gif";

		if($imagepath =="/"){
			$file_exist = false; // 즉 에디터 파일이란 말
		}else{
			$file_exist = true; // 즉 파일첨부된 file 사진이 있다는 말!
		}
		$thumfile =get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], "");
			
		if($thumfile[src]){
		$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='auto' class=image  onerror='this.src=\"".G5_URL."/img/noimg.png\";this.style.border=\"none\";this.style.width=\"".$image_height."px\""."'>";
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
		$arr_thum = explode("/" , $thumfile[src]);

				if($file_exist ==true){ // file 있을때 
					$image_info = G5_PATH."/data/file/".$bo_table."/".$arr_thum[6] ;  // 비율대로 추출한 썸네일의 width랑 height 값에 따라서 li의 사이즈를 조절
				}else if($file_exist == false){
					$image_info = G5_PATH."/data/editor/".$arr_thum[5]."/".$arr_thum[6] ;  // 비율대로 추출한 썸네일의 width랑 height 값에 따라서 li의 사이즈를 조절
				}
		$size = @getimagesize($image_info);
		?>
		<li style="height:<?=($size[1]+50)?>;">
			<div><?=$image?></div>
			<div class="ma_tit">
					<?php if ($is_checkbox) { ?>
					<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
					<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
					<?php } ?>
				<?=$list[$i][wr_subject]?>
			</div>
			<div class="ma_cont"><?=cut_str( nl2br($list[$i][wr_content]),"430" )?></div>
		</li>
		<?}?>
</ul>

<script>
$(window).load(function(){
  $('#masonry-container').masonry({
    itemSelector: '#masonry-container li'
  });

});
</script>