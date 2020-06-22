<?php
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$image_width = 1000;
$image_height = 720;

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가?>
<script src="<?=$latest_skin_url?>/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?=$latest_skin_url?>/jquery.bxslider.css" rel="stylesheet" />
<div class="bx-wrapper">
    <ul class="bxslider">
    <?php for ($i=0; $i<count($list); $i++) {
			
			$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $image_width, $image_height);

			if($thumb['src']) {
					$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" style="max-width:100%;height:auto;">';
			} else {
					$img_content = '<span style="max-width:100%;height:auto;">no image</span>';
			}
			/**/
			?>
        <li style="display:none;">
            <!--
						<img src="<?=$list[$i][file][0][path]?>/<?=$list[$i][file][0][file]?>" style="max-width:100%;height:auto;">
						-->
						<?=$img_content?>
        </li>
    <?php } ?>
    <?php if (count($list) == 0) { //게시물이 없을 때 ?>
    <li>게시물이 없습니다.</li>
    <?php } ?>
    </ul>
</div>
<script>
$(function(){
	$(".bxslider > li").show();
	$('.bxslider').bxSlider({
		auto: true
	});
});
</script>