<style>
	.new_navi h4 { font-size:15px; }
	.ns_1 {margin-left:20px;margin-top:6px;font-size:12px;line-height:22px;}
	.ns_1 a {text-decoration:none;color:#858585;text-decoration:none;font-family:"맑은 고딕";}
	/* 2013.04.19 추가 */
	.ns_1 li {font-weight:bold;}
	.dis_none { display:none; }
</style>
<script type="text/javascript">
	$(function(){
		$("ul.new_navi > li > h4").click(function(_aa){

			$("ul.new_navi > li >  h4").not($(this)).parent().find("ul[class^='ns_']").hide('fast');
			$(this).parent().find("ul[class^='ns_']").show('fast');
		});
		
		$(".atag").live('mouseover',function(){
			$(".atag").removeClass('selected highlight');
			$(".atag").css('color','#858585');

			$(this).addClass('selected highlight');
			$(this).css('color','#f51f54');
		});

		$(".ns_1").click(function(){
			$(this).parent().find("img").attr("src", $(this).parent().find("img").attr("src").replace("_over.jpg", "_over.jpg"));
		});
		/**/
	});
</script>
<ul class="new_navi">
	<li style='cursor:pointer;'><h4>메뉴1</h4>
		<ul class="ns_1 dis_none">
			<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=869" class="atag">공지사항</a></li>
			<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=29676" class="atag">수업자료공유</a></li>
			<li><a href="/app/public_contents/lecturer/lecturer_01_work.asp?menuidx=-15000" class="atag">강사교육신청</a></li>
			<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=29678" class="atag">토론방</a></li>
			<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=29679" class="atag">건의방</a></li>
			<li><a href="/app/ios/board/skin/photo_work/board_list.asp?menuidx=29680" class="atag">갤러리</a></li>
		</ul>
	</li>
	<li style='cursor:pointer;'><h4>메뉴2</h4>
		<ul class="ns_1 dis_none">
			<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=3727" class="atag">공지사항</a></li>
			<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=875" class="atag">지사소식</a></li>
			<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=3728" class="atag">영업자료공유</a></li>
			<li><a href="/app/ios/branch/branch_stat_list_work.asp?menuidx=12781" class="atag">학원관리</a></li>
			<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=3729" class="atag">토론방</a></li>
			<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=29687" class="atag">건의방</a></li>
			<li><a href="/app/ios/board/skin/photo_work/board_list.asp?menuidx=3730" class="atag">갤러리</a></li>
		</ul>
	</li>
	<li style='cursor:pointer;'><h4>메뉴3</h4>
		<ul class="ns_1 dis_none">
			<li><a href="/app/public_contents/teacher/teacher_eclass_work.asp?menuidx=4138" class="atag">온라인학습</a></li>
			<li><a href="http://www.high-plus.com/app/ios/board/skin/basic/board_list.asp?menuidx=870" class="atag">학습자료</a></li>
			<li><a href="/app/public_contents/teacher/teacher_card_word_work.asp?menuidx=-13601" class="atag">학습카드제작</a></li>
			<li><a href="/app/ios/board/skin/basic/board_list.asp?menuidx=2618" class="atag">홍보자료</a></li>
			<li><a href="/app/ios/board/skin/basic_movie/board_list.asp?menuidx=11895" class="atag">강사 교육 동영상</a></li>
			<!-- li><a href="/app/ios/board/skin/photo_work/board_list.asp?menuidx=29695" class="atag">갤러리</a></li -->
		</ul>
	</li>
	<li style='cursor:pointer;'><h4>메뉴4</h4>
		<ul class="ns_1 dis_none">
			<li><a href="/company/contents/program/goods_cate_work.asp?menuIdx=14471&main=1" class="atag">홍보자료</a></li>
			<li><a href="/company/contents/program/goods_cate_work.asp?menuIdx=14471&main=2" class="atag">교육자료</a></li>
			<li><a href="/company/contents/program/goods_cate_work.asp?menuIdx=14471&main=5" class="atag">수업교재</a></li>
		</ul>
	</li>
</ul>
