<link href="<?=$topmenu_skin_path?>/css/helper.css" media="screen" rel="stylesheet" type="text/css" />

<link href="<?=$topmenu_skin_path?>/css/dropdown.linear.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?=$topmenu_skin_path?>/css/default.ultimate.linear.css" media="screen" rel="stylesheet" type="text/css" />

<!--[if lt IE 7]>
<script type="text/javascript" src="<?=$topmenu_skin_path?>/js/jquery.js"></script>
<script type="text/javascript" src="<?=$topmenu_skin_path?>/js/jquery.dropdown.js"></script>
<![endif]-->
<ul id="nav" class="dropdown dropdown-linear">
<? for($i = 0; $i < count($fmenu); $i++){ // 1번째 메뉴?>
 <li><a href="<?=$fmenu[$i][1]?>"><span class="dir"><? if(count($fmenu[$i][5]) > 0){ ?><? } ?><img src="<?=$topmenu_skin_path?>/img/gnb_<?=($i+1)?>0.png"><?//=$fmenu[$i][0]?></span><? if(count($fmenu[$i][5]) > 0){ ?><? } ?></a>
 <? if(count($fmenu[$i][5]) > 0){ ?>
  <ul>
   <? for($j = 0; $j < count($fmenu[$i][5]); $j++){ ?>
   <li><a href="<?=$fmenu[$i][5][$j][1]?>"><?=$fmenu[$i][5][$j][0]?></a></li>
   <? } ?>
   </ul>
 <? } ?>
 </li>
<? } ?>
</ul>
<script>
$(document).ready(function(){
	$("#nav > li > a > span > img").on("mouseover",function(e){
		var x = e.pageX - $(".header_t").offset().left;
		var xx = e.pageX - $(this).offset().left;
		xxx = x - xx;
		$(".header_t").animate({'background-position-x':(xxx-40)}, 100,'linear');
	});
	$("#nav > li > a").attr ('href', function(i, value) {
		if(value.indexOf("<?=$tp[local]?>") >= 0  && "<?=$tp[local]?>" != ""){

			xxx = $("#nav > li > a > span > img").eq(i).offset().left - $(".header_t").offset().left;

			$(".header_t").animate({'background-position-x':(xxx-40)}, 100,'linear');
		}
	});
});
</script>
