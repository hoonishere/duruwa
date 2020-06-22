<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<?
$image_width = 310;
$image_height = 205;
?>
<style>
.tit_product	{text-align:center;margin-top:5px;font-size:15px;color:#666;letter-spacing:-0.5px;}
</style>
<link rel="stylesheet" type="text/css" href="<?=$latest_skin_url?>/jcarousel.css">
<script type="text/javascript" src="<?=$latest_skin_url?>/js/jquery.jcarousel.min.js"></script>
<div class="jcarousel-wrapper">
		<!-- Carousel -->
		<div class="jcarousel">
			<ul>
				<? for ($i=0; $i<count($list); $i++) { 
				$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $image_width, $image_height);

				if($thumb['src']) {
						$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$image_width.'" height="'.$image_height.'">';
				} else {
						$img_content = '<span style="width:'.$image_width.'px;height:'.$image_height.'px"><img src="'.G5_URL.'/img/noimg.png" width="'.$image_width.'" height="'.$image_height.'"></span>';
				}
				?>
				<li>
					<a href="<?=$list[$i][href]?>" class="image"><!-- <span class="rollover" ></span> -->
					<?=$img_content?>
					<div class="tit_product"><?=$list[$i][wr_subject]?></div>
					</a>
				</li>
				<?}?>
			</ul>
		</div>
		<!-- Prev/next controls -->
		<a href="#" class="jcarousel-control-prev"></a>
		<a href="#" class="jcarousel-control-next"></a>

		<!-- Pagination -->
		<p class="jcarousel-pagination">
				<!-- Pagination items will be generated in here -->
		</p>
</div>

<script>
$(function() {
/*
Carousel initialization
*/
$('.jcarousel').jcarousel({
	// Options go here
	  vertical: true
});

/*
 Prev control initialization
 */
$('.jcarousel-control-prev')
.on('jcarouselcontrol:active', function() {
		//$(this).removeClass('inactive');
})
.on('jcarouselcontrol:inactive', function() {
		//$(this).addClass('inactive');
})
.jcarouselControl({
		// Options go here
		target: '-=4'
});

/*
 Next control initialization
 */
$('.jcarousel-control-next')
		.on('jcarouselcontrol:active', function() {
				//$(this).removeClass('inactive');
		})
		.on('jcarouselcontrol:inactive', function() {
				//$(this).addClass('inactive');
		})
		.jcarouselControl({
				// Options go here
				target: '+=4'
		});

/*
 Pagination initialization
 */
$('.jcarousel-pagination')
.on('jcarouselpagination:active', 'a', function() {
		$(this).addClass('active');
})
.on('jcarouselpagination:inactive', 'a', function() {
		$(this).removeClass('active');
})
.jcarouselPagination({
		// Options go here
		 'perPage': 4
});
});
</script>