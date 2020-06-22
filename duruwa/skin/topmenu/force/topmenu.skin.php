<style>
	/* 상단 메뉴 */
#top_menu_con			{}
#top_menu_m:after						{width:100%; clear:both; display:block; content:'';}
#top_menu_m ul:after				{width:100%; clear:both; display:block; content:'';}
#top_menu_m ul li						{float:left; margin-right:77px;}
#top_menu_m ul li.lnb_num6	{margin-right:0px;}
#top_menu_m ul li a					{text-decoration:none; color:#434343; padding-bottom:25px; font-size:18px; font-weight:bold;}
#top_menu_m ul li a:hover	 	{color:#ed1875}
#top_menu_m ul li a.onon	 	{color:#ed1875}

#top_menu_m2	{position:absolute; width:100%; min-width:1200px; top:108px; overflow:hidden; z-index:999; left:0px; height:0; background:#fff; border-top:2px solid #ed63a0; border-bottom:1px solid #ddd;}
.wp_snbonly		{width:880px; padding-left:320px; min-height:219px; margin:0 auto;}
.wp_snbonly:after	{width:100%; clear:both; display:block; content:'';}
.wp_snbonly ul		{float:left; border:0px solid red; margin-top:0px;}

.wp_snbonly ul.lnb2_ul1 {margin-right:55px;} 
.wp_snbonly ul.lnb2_ul2 {margin-right:40px;}
.wp_snbonly ul.lnb2_ul3 {margin-right:45px;}
.wp_snbonly ul.lnb2_ul4 {margin-right:98px;}
.wp_snbonly ul.lnb2_ul5 {margin-right:80px;}
.wp_snbonly ul.lnb2_ul6 {}

.wp_snbonly ul.lnb2_ul1 li	{}
.wp_snbonly ul.lnb2_ul2 li	{}
.wp_snbonly ul.lnb2_ul3 li	{}
.wp_snbonly ul.lnb2_ul4 li	{}
.wp_snbonly ul.lnb2_ul5 li	{}
.wp_snbonly ul.lnb2_ul6 li	{}

.wp_snbonly ul li:first-child	 {padding-top:10px;}
.wp_snbonly ul li	{clear:both; font-size:12px; line-height:215%; }
.wp_snbonly ul li a	{display:block; text-decoration:none; color:#656565; font-family:Noto Sans KR; font-weight:400; font-size:14px;}
.wp_snbonly ul li a:hover	{color:#ed1875;}
.wp_snbonly ul li a.onon	{color:#ed1875;}
</style>

<script type="text/javascript" language="javascript">
	$(document).ready(function () {
		$('#top_menu_m').mouseover(function(){
			$('#top_menu_m2').stop().animate({height:"220px"},300);
		});

		$('#top_menu_m2').mouseover(function(){
			$('#top_menu_m2').stop().animate({height:"220px"},300);
		});

		$('#top_menu_m').mouseout(function(){
			$('#top_menu_m2').stop().animate({height:"0px"},200);
		});

		$('#top_menu_m2').mouseout(function(){
			$('#top_menu_m2').stop().animate({height:"0px"},200);
		});

		function hide_menu(){
			$("#top_menu_m > ul > li").find("a").removeClass("onon");
			<?if($tp[m_menu] > 0 && !eregi("index.php",$_SERVER[SCRIPT_NAME])){?>
				$(".lnb_num"+<?=($tp[m_menu])?>).find("a").addClass("onon");
			<?}?>
		}

		function show_menu(){
			$("#top_menu_m > ul > li").find("a").removeClass("onon");
			$(this).find("a").addClass("onon");
			
		}

		function hide_menu2(){
			$("#top_menu_m > ul > li").find("a").removeClass("onon");
			<?if($tp[m_menu] > 0 && !eregi("index.php",$_SERVER[SCRIPT_NAME])){?>
				$(".lnb_num"+<?=($tp[m_menu])?>).find("a").addClass("onon");
				$(".wp_snbonly > ul:eq("+ <?=($tp[m_menu]-1)?> +") > li").find("a").eq(<?=$tp[s_menu]-1?>).addClass("onon");
			<?}?>
		}

		function show_menu2(){
			var idx = $(".wp_snbonly > ul").index(this);
			$(".wp_snbonly > ul").find("a").removeClass("onon");
			
			$("#top_menu_m > ul > li").find("a").removeClass("onon");
			$("#top_menu_m > ul > li").eq(idx).find("a").addClass("onon");
		}

		$("#top_menu_m > ul > li").mouseover(show_menu).mouseout(hide_menu);
		$(".wp_snbonly > ul").mouseover(show_menu2).mouseout(hide_menu2);

		hide_menu();
		hide_menu2();
	});
</script>


<script>
$(document).ready(function(){
  $("li.lnb_num1").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg1.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
  $("li.lnb_num2").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg2.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
  $("li.lnb_num3").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg3.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
  $("li.lnb_num4").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg4.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
  $("li.lnb_num5").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg5.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
  $("li.lnb_num6").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg6.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
});
</script>


<script>
$(document).ready(function(){
  $("ul.lnb2_ul1").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg1.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
  $("ul.lnb2_ul2").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg2.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
  $("ul.lnb2_ul3").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg3.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
  $("ul.lnb2_ul4").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg4.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
  $("ul.lnb2_ul5").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg5.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
  $("ul.lnb2_ul6").mouseover(function(){
    $(".wp_snbonly").css("background-image","url('<?=$topmenu_skin_url?>/img/bg6.jpg')");
    $(".wp_snbonly").css("background-position","left top");
		$(".wp_snbonly").css("background-repeat","no-repeat");
  });
});
</script>


<!-- 탑 메뉴 시작 -->
<div id="top_menu" >
	<div id="top_menu_m">
		<ul>
			<?for($i = 0; $i < count($fmenu);$i++){?>
				<li class="lnb_num<?=($i+1)?>"><a href="<?=$fmenu[$i][1]?>"><span><?=$fmenu[$i][0]?></span></a></li>
			<?}?>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<!-- 메뉴 끝 -->

<!-- 탑 서브메뉴 시작 -->
<div id="top_menu_m2">
	<div class='wp_snbonly'>
		<?for($i = 0; $i < count($fmenu);$i++){?>
			<?if(count($fmenu[$i][5]) > 0){?>
			<ul class="lnb2_ul<?=$i+1?>">
				<?for($j = 0; $j < count($fmenu[$i][5]);$j++){?>
				<li><a href="<?=$fmenu[$i][5][$j][1]?>" <?if($fmenu[$i][5][$j][2] == "1"){echo "target='_blank'";}?>><?=$fmenu[$i][5][$j][0]?></a></li>
				<?}?>
			</ul>
			<?}?>
		<?}?>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<!-- 탑 서브메뉴 끝 -->
<!-- 탑메뉴끝 -->



