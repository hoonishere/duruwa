<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
//메인 비쥬얼 높이 지정
$str_height = 560;
$cnct_width = count($list) * 10;

?>
<link rel="stylesheet" href="<?=$latest_skin_url?>/responsiveslider.css">
<script src="<?=$latest_skin_url?>/responsiveslides.min.js"></script>
<style>
.mslide {padding-top:0px;}
.rslides_nav{height:100px;width:70px;position:absolute; top:<?=($str_height/2)-57?>px; left:50px;text-indent:-9999px;overflow:hidden;text-decoration:none;background:url(<?=$latest_skin_url?>/img/prevnext.png) no-repeat; z-index:777}
.rslides_nav:active{opacity:1.0}
.rslides_nav.next{left:auto;background-position:-90px 0px;right:50px}

.rslides_tabs{position:absolute; display:block; padding:0px 0px 0px 0px; bottom:20px;}
.rslides_tabs li{display:inline;float:none;_float:left;*float:left;margin:0 5px;}
.rslides_tabs a{text-indent:-9999px;overflow:hidden;background:#DDD;display:inline-block;_display:block;*display:block;width:12px;height:12px; border-radius:10px;}
.rslides_tabs .rslides_here a{background:#0082ce;}

.mslide{width:100%;height:<?=$str_height?>px;position:relative;float:left; z-index:777;}
.rslides{width:100%;height:<?=$str_height?>px;position:relative;list-style:none;z-index:777;overflow:hidden;}

<? for ($i=0; $i<count($list); $i++) { ?>
.rslides li.bg<?=($i+1)?>{width:100%; height:<?=$str_height?>px; background:url("<?=$list[$i][file][0][path]?>/<?=$list[$i][file][0][file]?>") top center no-repeat;background-size:cover;}
<?}?>
</style>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      $("#slider2").responsiveSlides({
        auto: true,
        pager: true,
				nav: true,
				//maxwidth: 540,

        speed: 1000
      });
			$(".rslides_tabs").css("margin-left", (($( window ).width() / 2)-<?=$cnct_width?>));
			$(".rslides_tabs").css("z-index", "99999");
			$( window ).resize(function() {
				$(".rslides_tabs").css("margin-left", (($( window ).width() / 2)-<?=$cnct_width?>));
				$(".rslides_tabs").css("z-index", "99999");
			});
    });
  </script>
<div class="mslide">
	<ul class="rslides" id="slider2">
		<? for ($i=0; $i<count($list); $i++) { ?>
		<li class="bg<?=($i+1)?>">
			<?if($list[$i][wr_link1]){?><a href="<?=$list[$i][wr_link1]?>"><?}?>
				<img src="" style="width:100%; height:<?=$str_height?>px;">
			<?if($list[$i][wr_link1]){?></a><?}?>
		</li>
		<?}?>
	</ul>
</div>
<div class="clear"></div>