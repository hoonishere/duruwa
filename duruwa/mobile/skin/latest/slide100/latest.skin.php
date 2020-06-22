<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$image_width = 800;
$image_height = 450;
?>
<div class="wide-container">
	<div id="slides">
		<ul class="slides-container">
		<?php for ($i=0; $i<count($list); $i++) { ?>
		<?
		$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $image_width, $image_height);

		if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$image_width.'" height="'.$image_height.'">';
		} else {
				$img_content = '<span style="width:'.$image_width.'px;height:'.$image_height.'px">no image</span>';
		}
		?>
			<li>
				<?=$img_content?>
			</li>
		<?php } ?>
    <?php if (count($list) == 0) { //게시물이 없을 때 ?>
    <li>게시물이 없습니다.</li>
    <?php } ?>
		</ul>

		<nav class="slides-navigation" style="display:none;">
			<a href="#" class="next">prev</i></a>
			<a href="#" class="prev">next</i></a>
		</nav>
	</div>
</div>
  <script src="<?=$latest_skin_url?>/js/jquery.easing.1.3.js"></script>
  <script src="<?=$latest_skin_url?>/js/jquery.animate-enhanced.min.js"></script>
	<script src="<?=$latest_skin_url?>/js/hammer.min.js"></script>
  <script src="<?=$latest_skin_url?>/js/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
  <script>
    $(function() {


			var $slides = $('#slides');

      Hammer($slides[0]).on("swipeleft", function(e) {
        $slides.data('superslides').animate('next');
      });

      Hammer($slides[0]).on("swiperight", function(e) {
        $slides.data('superslides').animate('prev');
      });


      $('#slides').superslides({
        inherit_width_from: '.wide-container',
        inherit_height_from: '.wide-container'
      });
    });
  </script>