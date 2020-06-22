<style>
/* global navigation bar */
.gnb{position:absolute;z-index:50}
/* gnb Common */
.menu{position:relative;overflow:visible;line-height:normal;white-space:nowrap; border:0px solid red; }
.menu:after{content:"";display:block;clear:both}
.menu ul{float:left;list-style:none;margin:0;padding:0}
.menu ul:after{content:"";display:block;clear:both;}
.menu li{position:relative;z-index:1;float:left}
.menu li a{position:relative;float:left;padding:0;color:#111;text-decoration:none !important}
.menu li a span{display:inline-block;height:31px;margin:0 19px;padding:10px 1px 0 2px;font-size:15px !important;}

/* gnb Hover */
.menu .major li.active{z-index:2}
.menu .major li a:hover span,.menu .major li a:active span,.menu .major li a:focus span{height:28px;border-bottom:3px solid #ea002b;color:#ea002b}
.menu .major li.active a span{height:28px;border-bottom:3px solid #ea002b;color:#ea002b}
/*대메뉴 포커스 효과 변경시 */
.menu .major li.pactive a span{height:28px;border-bottom:3px solid #ea002b;color:#ea002b}
.menu .major li.pactive ul.sub{display:block}
/*대메뉴 포커스 효과 변경시 */

/* gnb 2depth */
.menu .major ul.sub{position:absolute;top:41px;display:none}
.menu .major li.active ul.sub{display:block}

.menu .major ul.sub{margin:0;padding:0;font-size:11px !important;}
.menu .major ul.sub li{display:inline;margin:0;padding:11px 9px}
.menu .major ul.sub li a{color:#555}
.menu .major ul.sub li a:hover{color:#ea002b}

/* gnb 2depth  */
li.m1 ul.sub{left:19px; width:80px; border:1px solid #ea002b; background:#fff;}
li.m2 ul.sub{left:-81px;width:580px; border:1px solid #ea002b;background:#fff;}
li.m3 ul.sub{left:19px; width:63px; border:1px solid #ea002b;background:#fff;}
li.m4 ul.sub{left:-29px;width:370px; border:1px solid #ea002b;background:#fff;}
li.m5 ul.sub{left:-600px;width:830px; border:1px solid #ea002b;background:#fff;}
li.m6 ul.sub{left:-140px;width:250px; border:1px solid #ea002b;background:#fff;}
</style>
<script>
	/* 메뉴 시작*/
$(function(){
	var menu = $('div.menu');
	var major = $('div.major');
	var li_list = major.find('>ul>li');

	// 서브메뉴 보이기
	function show_menu(){
		t = $(this);
		li_list.removeClass('active');
		li_list.removeClass('pactive');
		t.parent('li').addClass('active');
	}
	// 서브메뉴 숨기기
	function hide_menu(){
		li_list.removeClass('active');

		// 페이지 active 효과살리기
		<?if($tp[m_menu] > 0 && !eregi("index.php",$_SERVER[SCRIPT_NAME])){?>
			li_list.eq(<?=($tp[m_menu]-1)?>).addClass("pactive");

			// 탑메뉴에 서브 포커스효과
			$(".pactive").find("ul.sub > li > a[href$='<?=$tp[local]?>]'").css("color","red");
		<?}?>
	}

	li_list.find('>a').mouseover(show_menu).focus(show_menu);

	menu.mouseleave(hide_menu);
	li_list.find('ul.sub').mouseleave(hide_menu);
	$('*:not(".menu *")').focus(hide_menu);

	hide_menu();
	/* 메뉴 끝*/
})

</script>
<!-- 1뎁스:시스템폰트, 2뎁스 : 시스템폰트 -->
<div class="gnb">
	<div id="menu" class="menu">
		<div class="major">
			<ul>
			<?for($i = 0; $i < count($fmenu);$i++){?>
				<li class="m<?=($i+1)?>"><a href="<?=$fmenu[$i][1]?>"><span><?=$fmenu[$i][0]?></span></a>
					<?if(count($fmenu[$i][5]) > 0){?>
					<ul class="sub"><!--sub1 -->
						<?for($j = 0; $j < count($fmenu[$i][5]);$j++){?>
						<li><a href="<?=$fmenu[$i][5][$j][1]?>"><?=$fmenu[$i][5][$j][0]?></a></li>
						<?}?>
					</ul>
					<?}?>
				</li>
			<?}?>
			</ul>
		</div>
	</div>
</div>