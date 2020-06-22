<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

?>
<link rel="stylesheet" href="<?=$latest_skin_url?>/css/font-awesome.min.css">
<style>
	#slides<?=$bo_table?> {
		display: none;
	}

	.slidesjs-navigation {
		margin-top:3px;
	}

	.slidesjs-previous {
		margin-right: 5px;
	 
	}

	.slidesjs-next {
		margin-right: 5px;
		
	}

	.slidesjs-pagination {
		margin: 6px 0 0;
		float: right;
		list-style: none;
	}

	.slidesjs-pagination li {
		float: left;
		margin: 0 1px;
	}

	.slidesjs-pagination li a {
		display: block;
		width: 13px;
		height: 0;
		padding-top: 13px;
		background-image: url("<?=$latest_skin_url?>/img/pagination.png");
		background-position: 0 0;
		float: left;
		overflow: hidden;
	}

	.slidesjs-pagination li a.active,
	.slidesjs-pagination li a:hover.active {
		background-position: 0 -13px
	}

	.slidesjs-pagination li a:hover {
		background-position: 0 -26px
	}

</style>
<div style="width:<?=$options[0]?>px;position:relative;">
<div id="slides<?=$bo_table?>" >
<?
for ($i=0; $i<count($list); $i++) { 
	$noimage = "$latest_skin_url/img/no-image.gif";
	$list[$i][file] =get_file($bo_table, $list[$i][wr_id]);
	$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
?>
<?if(strlen($list[$i][wr_link1]) > 0){?><a href="<?=set_http($list[$i][wr_link1])?>"><?}?><img src="<?=$imagepath?>" alt="<?=$list[$i][wr_subject]?>" style='width:<?=$options[0]?>px;height:<?=$options[1]?>px;'><?if(strlen($list[$i][wr_link1]) > 0){?></a><?}?>
<?}?>
<a href="#" style="position:absolute;top:<?=(($options[1]/2)-11)?>px;z-index:999;left:20px;" class="slidesjs-previous slidesjs-navigation" ><img src="<?=$latest_skin_url?>/img//btn_prev.png" alt=""></a>
<a href="#" style="position:absolute;top:<?=(($options[1]/2)-11)?>px;z-index:999;right:20px;" class="slidesjs-next slidesjs-navigation" ><img src="<?=$latest_skin_url?>/img/btn_next.png" alt=""></a>
</div>
</div>
<script src="<?=$latest_skin_url?>/js/jquery.slides.min.js"></script>
<script>
	$(function() {
		$('#slides<?=$bo_table?>').slidesjs({
			width: <?=$options[0]?>,
			height: <?=$options[1]?>,
			navigation: false,
			pagination: false,
			play: {
			active: false,
				// [boolean] Generate the play and stop buttons.
				// You cannot use your own buttons. Sorry.
			effect: "slide",
				// [string] Can be either "slide" or "fade".
			interval: 4000,
				// [number] Time spent on each slide in milliseconds.
			auto: true,
				// [boolean] Start playing the slideshow on load.
			swap: true,
				// [boolean] show/hide stop and play buttons
			pauseOnHover: false,
				// [boolean] pause a playing slideshow on hover
			restartDelay: 2500
				// [number] restart delay on inactive slideshow
			}
		});
	});
</script>