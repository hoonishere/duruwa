<style>
	/* 상단 메뉴 */
#top_menu				{width:100%; height:98px; border-bottom:1px solid #d2d2d2;}
#top_menu_con		{}
#top_menu_m			{background:url('/app/tpl/type_company/new_img/top_menu_line.jpg') center top no-repeat;}
#top_menu_m ul li	{float:left;}

#top_menu_m2 {background-color:#fff; width:100%;background:#fff;border:3px solid #cf1126;height:0px;overflow:hidden; z-index:999;}

#top_menu_m2 ul li.smsm	{float:left; width:141px;}
.smsm ul li { margin-left:26px; padding-top:10px; line-height:150%; font-family:"맑은 고딕"; font-weight:bold;}
.smsm ul li a { text-decoration:none; color:#898989;}
.smsm ul li a:hover { text-decoration:none; color:#fff;}
</style>
<script type="text/javascript" language="javascript">
	 $(document).ready(function () {
	
		$('#top_menu_m').mouseover(function(){
			$('#top_menu_m2').stop().animate({height:"180px"},200);
		});

		$('#top_menu_m').mouseout(function(){
			$('#top_menu_m2').stop().animate({height:"0px"},200);
		});

		$('#top_menu_m2').mouseover(function(){
			$('#top_menu_m2').stop().animate({height:"180px"},200);
		});
		$('#top_menu_m2').mouseout(function(){
			$('#top_menu_m2').stop().animate({height:"0px"},200);
		});

		$('.smsm').mouseover(function(){
			$(".smsm > ul").css('background-color','#fff');
			var idx2 = $('.smsm').index(this);
			$(".smsm > ul > li > a").css('color','#7d7d7d');
			$(this).children('ul').children('li').children('a').css('color','#fff');
			
			$(this).children('ul').css('background-color','#cf1126' );;
			$(this).children('ul').children('li').css('color','#fff');
			
			chng_img(idx2);
		});

		$('.smsm > ul > li').mouseover(function(){
			$(this).parent("ul").css('background-color','#cf1126' );;
		});

		$('#top_menu_m > ul > li').mouseover(function(){
			var idx = $('#top_menu_m > ul > li').index(this);
			$(".smsm > ul").css('background-color','#fff');
			
			$(".smsm > ul > li > a").css('color','#7d7d7d');
			$(".smsm").eq(idx).children('ul').children('li').children('a').css('color','#fff');
			
			$(".smsm").eq(idx).children('ul').css('background-color','#cf1126' );;
			$(".smsm").eq(idx).children('ul').children('li').css('color','#fff');
			chng_img(idx);
		});
	});

	function chng_img(_idx){
		$("#top_menu_m > ul > li > a > img").each(function(){
			$(this).attr("src",$(this).attr("src").replace("_over",""));
		});

		var top_img = $("#top_menu_m > ul > li:eq("+_idx+") > a > img");
		var m_origin = top_img.attr("src").substr(0,(top_img.attr("src").length-4));
		var m_on = top_img.attr("src").substr((top_img.attr("src").length-6),6);

		var m_on = m_origin + "_over.png";
		top_img.attr("src",m_on);
	}
</script>
<div>
<!-- 탑 메뉴 시작 -->
<div id="top_menu">
	<div id="top_menu_con">
		<div id="top_menu_m">
			<ul>
				<li><a href="/company/contents/introduce/introduce_01_work.asp"><img src="http://www.high-plus.com/app/tpl/type_company/new_img/top_menu_01.png" ></a></li>
				<li><a href="/company/contents/program/program_01_work.asp"><img src="http://www.high-plus.com/app/tpl/type_company/new_img/top_menu_02.png" ></a></li>
				<li><a href="/company/contents/curriculum/c_01_work.asp" ><img src="http://www.high-plus.com/app/tpl/type_company/new_img/top_menu_03.png" ></a></li>
				<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=869"><img src="http://www.high-plus.com/app/tpl/type_company/new_img/top_menu_04.png" ></a></li>
				<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=85"><img src="http://www.high-plus.com/app/tpl/type_company/new_img/top_menu_05.png" ></a></li>
			</ul>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<!-- 메뉴 끝 -->
<!-- 탑 서브메뉴 시작 -->
<div id="top_menu_m2">
	<div style="width:1000px; margin:0 auto;">
		<div >
			<ul >
				<li class="smsm">
					<ul >
						<li><a href="/company/contents/introduce/introduce_01_work.asp">인사말</a></li>
						<li><a href="/company/contents/introduce/introduce_02_work.asp">사업영역</a></li>
						<li><a href="/company/contents/introduce/introduce_03_work.asp">브랜드 및 CI소개</a></li>
						<li><a href="/company/contents/introduce/introduce_04_work.asp">오시는길</a></li>
						<li>&nbsp;</li>
						<li style="padding-bottom:10px;">&nbsp;</li>
					</ul>
				</li>
				<li class="smsm">
					<ul >
						<li><a href="/company/contents/program/program_01_work.asp">교육철학</a></li>
						<li><a href="/company/contents/program/program_02_work.asp">소개</a></li>
						<li><a href="/company/contents/program/program_03_work.asp">특징</a></li>
						<li><a href="/company/contents/program/program_04_work.asp">학습법</a></li>
						<li>&nbsp;</li>
						<li style="padding-bottom:10px;">&nbsp;</li>
					</ul>
				</li>
				<li class="smsm">
					<ul >
						<li><a href="/company/contents/curriculum/c_01_work.asp" >커리큘럼소개</a></li>
						<li><a href="/company/contents/curriculum/c_02_1_work.asp">교재소개</a></li>
						<li><a href="/company/contents/curriculum/c_02_online_work.asp">Online 학습소개</a></li>
						<li>&nbsp;</li>
						<li>&nbsp;</li>
						<li style="padding-bottom:10px;">&nbsp;</li>
					</ul>
				</li>
				<li class="smsm">
					<ul >
						<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=869">학원방</a></li>
						<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=3727">지사방</a></li>
						<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=870">자료실</a></li>
						<li><a href="/company/contents/program/goods_cate_work.asp?menuidx=14471&main=5">온라인쇼핑몰</a></li>
						<li>&nbsp;</li>
						<li style="padding-bottom:10px;">&nbsp;</li>
					</ul>
				</li>

				<li class="smsm">
					<ul >
						<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=85">공지사항</a></li>
						<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=29609">영어교육 뉴스</a></li>
						<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=59">홍보센터</a></li>
						<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=29611">우수학원 소개</a></li>
						<li>&nbsp;</li>
						<li style="padding-bottom:10px;">&nbsp;</li>
					</ul>
				</li>
			</ul>
		</div>
		<div style="clear:both;"></div>
	</div>
</div>
<!-- 탑 서브메뉴 끝 -->
<!-- 탑메뉴끝 -->
</div>