<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// 스넵이미지 생성함수
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$n_thumb_width = 2000;  //썸네일 가로 크기
$n_thumb_height = 415; //썸네일 세로 크기
?>
<script type="text/javascript" src="<?=$latest_skin_url?>/js/jquery.bxslider.min.js"></script>
<script>
$(function(){
	var sliderBanner = $('.main-slider .bxslider').bxSlider({
		mode:'fade',
		auto:true,
		autoControls: true
	});
})
</script>
<div class="main-slider">
	<ul class="bxslider">
		<?php for ($i = 0; $i < count($list); $i++) { ?>
		<?php
			$n_thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $n_thumb_width, $n_thumb_height);
			// 스넵이미지 생성하고 뷰어 시킨다.
			$n_noimg = "$latest_skin_url/img/noimg.gif";
			// 이미지가 없을경우의 이미지 위치
		if($n_thumb['src']) {
				$img_content = '<img src="'.$n_thumb['src'].'" width="'.$n_thumb_width.'" height="'.$n_thumb_height.'" alt="'.$list[$i]['subject'].'" title="" />';
		} else {
				$img_content = '<img src="'.$n_noimg.'" width="'.$n_thumb_width.'" height="'.$n_thumb_height.'" alt="이미지없음" title="" />';
		}
		?>
	 <li style="width:100%;height:415px;background:url('<?=$n_thumb['src']?>') no-repeat center top;display:inline-block;">
		</li>
		<?php } ?> 
	</ul>
</div>