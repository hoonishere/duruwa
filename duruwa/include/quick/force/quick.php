<style>
/* 퀵메뉴 왼쪽 오른쪽 */
#quick_wrap						{position:relative; width:100%;margin:0 auto; z-index:999; min-width:1200px;}
#quick_left						{position:absolute; width:205px; left:0px; top:108px;z-index:999;}
#quick_right					{position:absolute; width:110px; right:0px; top:108px;z-index:999;}

.open_close				{position:absolute; right:-1px;}
.ql_bg						{width:165px; background:#fff; padding:15px 10px; border:1px solid #eaeaea;}
.ql_title					{text-align:center; margin-bottom:10px;}
.ql_form input[type="text"]		{border:1px solid #dfdfdf; background:#f8f8f8; height:28px; text-indent:5px;}
.f_name input			{width:163px; margin-bottom:4px;}
.f_tel input			{width:54px; margin-bottom:4px;}
.f_tel input:first-child			{width:41px;}
.ql_form textarea			{border:1px solid #dfdfdf; background:#f8f8f8; width:153px; min-height:90px; padding:5px;}
.ql_cs						{font-size:15px; color:#454545;text-align:center; margin-top:15px; margin-bottom:10px;}

.qr_tel								{background:url('<?=G5_URL?>/img/quick/b2.jpg') repeat-y center top; height:150px;}
.qr_tel p							{text-align:center; padding-top:70px; font-size:22px; color:#fff; font-weight:bold; line-height:100%;}
a.qr_last img					{border-top:1px solid #aeaeae;}
</style>
<!-- 퀵메뉴소스 -->
<script>
$(function(){
	var margin = 108;
	//$("#quick_menu").animate({top:margin + $(window).scrollTop()},500);
	$(window).scroll(function(){
		$('#quick_right').stop();
		if($(document).scrollTop() > margin){
			$('#quick_right').animate( { top: $(document).scrollTop() + 0}, 500 );
		}else{
			$('#quick_right').animate( { top: margin}, 500 );
		}

		$('#quick_left').stop();
		if($(document).scrollTop() > margin){
			$('#quick_left').animate( { top: $(document).scrollTop() + 30}, 500 );
		}else{
			$('#quick_left').animate( { top: margin}, 500 ); //$(document).scrollTop() + margin ; 
		}
		
	});
});
</script><!-- 퀵메뉴소스 end -->


<?
	$left_action = G5_URL."/bbs/write_update_iboard_q.php"; //board_03
?>

<div id="quick_wrap" >
		<div id="quick_left">
			<div class="open_close"><a href="#null"><img src="<?=G5_URL?>/img/quick/open.png" id="quick_left_btn" alt="열기/닫기"></a></div>
			<div class="ql_bg">
				<div class="ql_title"><img src="<?=G5_URL?>/img/quick/title_1.png" alt="수강문의"></div>
				<div class="ql_form">
					<form name="left_f" id="left_f" action="<?=$left_action?>" onsubmit="return left_fsubmit(this);" method="post" enctype="multipart/form-data" autocomplete="off"> 
						<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
						<input type="hidden" name="q" value="">
						<input type="hidden" name="q_table" value="cont">
						<input type="hidden" name="q_subject" id="q_subject" value="">
						<input type="hidden" name="q_name" id="q_name" value="신청자">

						<div class="f_name"><input type="text" name="q_1" placeholder="이름"></div>
						<div class="f_tel">
							<input type="text" name="q_2" placeholder="010" maxlength="3">
							<input type="text" name="q_3" maxlength="4">
							<input type="text" name="q_4" maxlength="4">
						</div>
						<textarea name="q_content"></textarea>
						<input type="image" src="<?=G5_URL?>/img/quick/ok_btn.jpg"  value=""><!-- id="q_submit" -->
					</form>
				</div>
				<div class="ql_cs">문의전화<br><b>02-2038-0844</b></div>
				<?if($member[mb_level] > 5){?><div class="ql_cs"><a href="<?=G5_URL?>/adm/board.php?bo_table=cont">게시판바로가기</a></div><?}?>
			</div>
		</div><!-- quick_left end -->


		<div id="quick_right">
			<a href="http://plus.kakao.com/home/%40%EB%93%9C%EB%A3%A8%EC%99%80%EB%B7%B0%ED%8B%B0" target="_blank"><img src="<?=G5_URL?>/img/quick/b1.jpg" alt="카카오톡"></a>
			<div class="qr_tel"><p>02<br>.2038<br>.0844</p></div>
			<a href="<?=G5_URL?>/bbs/board.php?bo_table=52"><img src="<?=G5_URL?>/img/quick/b3.jpg" alt="온라인상담"></a>
			<a href="http://blog.naver.com/bestschool7" target="_blank"><img src="<?=G5_URL?>/img/quick/b4.jpg" alt="블로그"></a>
			<a href="http://www.뷰티연구소.com/" target="_blank"><img src="<?=G5_URL?>/img/quick/b5.jpg" alt="카페"></a>
			<a href="https://www.instagram.com/comebeauty1/" target="_blank"><img src="<?=G5_URL?>/img/quick/b6.jpg" alt="인스타그램"></a>
			<a href="https://story.kakao.com/ch/mybeautycbe" target="_blank"><img src="<?=G5_URL?>/img/quick/b7.jpg" alt="카카오"></a>
			<a href="http://band.us/home" target="_blank"><img src="<?=G5_URL?>/img/quick/b8.jpg" alt="밴드"></a>
			<a href="#" class="qr_last"><img src="<?=G5_URL?>/img/quick/top.jpg" alt="top"></a>
		</div><!-- quick_right end -->
</div><!-- quick_wrap end  -->


<script>
$(document).ready(function(){
	$("#q_submit").on("click" , function(){
		//$("#left_f").submit();
	});
	$("#quick_left_btn").on("click" , function(){ // 버튼 왔다갔다 하기 위해서 왼쪽 버튼!!! 
			if($("#quick_left").hasClass("close")){
					$("#quick_left").css("left" , "0px");
					$("#quick_left").removeClass("close");
			}else{
					$("#quick_left").css("left" , "-190px");
					$("#quick_left").addClass("close");
			}
	})
});
</script><!-- 퀵메뉴소스 end -->


<script>
function left_fsubmit(q){

	
	if(q.q_1.value==""){
		alert("이름을 입력해주세요");
		q.q_1.focus();
		return false;
	}

	if(q.q_2.value==""){
		alert("연락처 첫째자리를 입력해주세요");
		q.q_2.focus();
		return false;
	}

	if(q.q_3.value==""){
		alert("연락처 둘째자리를 입력해주세요");
		q.q_3.focus();
		return false;
	}

	if(q.q_4.value==""){
		alert("연락처 셋째자리를 입력해주세요");
		q.q_4.focus();
		return false;
	}

	if(q.q_content.value==""){
		alert("상담내용을 입력해주세요");
		q.q_content.focus();
		return false;
	}
		q.q_subject.value=q.q_1.value + "님이 수강문의 신청을 하였습니다."; // 제목 입력해줌
}
</script>