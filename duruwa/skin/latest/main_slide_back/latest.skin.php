<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
//메인 비쥬얼 높이 지정

$str_height = 570;

$cnct_width = count($list) * 10;
?>
<link rel="stylesheet" href="<?=$latest_skin_url?>/responsiveslider.css">
<script src="<?=$latest_skin_url?>/responsiveslides.min.js"></script>
<style>
.rslides_nav{height:100px;width:70px;position:absolute; top:<?=($str_height/2)-57?>px; left:50px;text-indent:-9999px;overflow:hidden;text-decoration:none;background:url(<?=$latest_skin_url?>/img/prevnext.png) no-repeat; z-index:777}
.rslides_nav:active{opacity:1.0}
.rslides_nav.next{left:auto;background-position:-90px 0px;right:50px}

.rslides_tabs{position:absolute; display:block; padding:0px 0px 0px 0px; bottom:10px; width:1200px; margin-left:-600px; text-align:center;}
.rslides_tabs li{display:inline;float:none;_float:left;*float:left;margin-right:5px}
.rslides_tabs a{text-indent:-9999px; overflow:hidden; background:#fff; display:inline-block; _display:block;*display:block; width:15px;height:15px; border-radius:2em; box-shadow:0px 0px 5px #ddd;}
.rslides_tabs .rslides_here a{background:#eb5999;}

.mslide<?=$bo_table?>{width:100%;height:<?=$str_height?>px;position:relative;float:left; z-index:777;}
.rslides<?=$bo_table?>{width:100%;height:<?=$str_height?>px;position:relative;list-style:none;z-index:777;overflow:hidden;}

<? for ($i=0; $i<count($list); $i++) { 
	$list[$i][file] = get_file($bo_table,$list[$i][wr_id]);
	?>
.rslides<?=$bo_table?> li.bg<?=($i+1)?>{width:100%; height:<?=$str_height?>px; background:url("<?=$list[$i][file][0][path]?>/<?=$list[$i][file][0][file]?>") top center no-repeat;background-size:cover;}
<?}?>
</style>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      $("#slider<?=$bo_table?>").responsiveSlides({
        auto: true,
        pager: true,
		nav: false,
				//maxwidth: 540,
        speed:600
      });
			$(".rslides_tabs").css("left","50%");
			$(".rslides_tabs").css("z-index", "99999");
			$( window ).resize(function() {
				$(".rslides_tabs").css("left","50%");
				$(".rslides_tabs").css("z-index", "99999");
			});
    });
  </script>
<div class="mslide<?=$bo_table?>" >
	<ul class="rslides<?=$bo_table?>" id="slider<?=$bo_table?>">
		<? for ($i=0; $i<count($list); $i++) { ?>
		<li class="bg<?=($i+1)?>"></li>
		<?}?>
	</ul>
	<div class="clear"></div>
</div>
<div class="clear"></div>
<?
/*

if($bo_table == "main_img"){
	$str_height = 650;
}else if($bo_table == "main_img2"){
	$str_height = 900;
}
*/?>