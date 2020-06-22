<?if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가?>
<!-- banner -->
<div class="main_banner"><?=latest("bxslider", "main_img_mo", 5, 10)?></div>

<div class="main_quick"><?php echo latest("banner12", "banner", "7", "30",1,"메인롤링이미지");?></div>
<div class="main_board">
	<div class="mb_a">
		<h1><a href="<?=G5_URL?>/bbs/board.php?bo_table=52">수강문의</a></h1>
		
		<div><?php echo latest("vertical_bx_slider", "52", "30", "30");?></div>
		
		<div><?php //echo latest("main_board", "52", "4", "30");?></div>
	</div>
	
	<div class="mb_b">
		<h1><a href="<?=G5_URL?>/bbs/board.php?bo_table=31">수강후기</a></h1>
		
		<div><?php echo latest("vertical_bx_slider2", "31", "30", "30");?></div>
		
		<div><?php// echo latest("main_board2", "31", "4", "30");?></div>
		<?if($_SERVER[REMOTE_ADDR] == "106.244.205.196"){?><?}else{?><?}?>
	</div>
</div>


<div class="main_qa">
	<div class="main_tel">
		<img src="<?=$head_skin_url?>/img/tel_icon.png">
		<p><a href="tel:0220380844">02-2038-0844</a></p>
	</div>

	<div class="main_qa_bg">
		<div class="main_qa_bg_title"><img src="<?=$head_skin_url?>/img/dot_icon.png"> 빠른상담 <img src="<?=$head_skin_url?>/img/dot_icon.png"></div>
<?
	$left_action = G5_URL."/bbs/write_update_iboard_q.php"; //board_03
?>
		<form name="left_f" id="left_f" action="<?=$left_action?>" onsubmit="return left_fsubmit(this);" method="post" enctype="multipart/form-data" autocomplete="off"> 
		<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
			<input type="hidden" name="q" value="">
			<input type="hidden" name="q_table" value="cont">
			<input type="hidden" name="q_subject" id="q_subject" value="">
			<input type="hidden" name="q_name" id="q_name" value="신청자">
			<div class="main_qa_form">
				<div><input type="text" name="q_1" class="required" title="이름" placeholder="이름"></div>
				<div>
				<input type="text" name="q_2" class="required" title="연락처" placeholder="" maxlength="3" style="width:32%;margin-right:0.5%;">
				<input type="text" name="q_3" class="required" title="연락처" maxlength="4" style="width:32%;margin-right:0.5%;">
				<input type="text" name="q_4" class="required" title="연락처" maxlength="4" style="width:32%;">
				</div>
				<div><textarea name="q_content" placeholder="내용"></textarea></div>
				<div><input type="submit" value="신청하기"></div>
			</div>
		</form>
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
	</div>

</div>

<div class="main_btn_bg">
	<div class="main_btn">
		<div><a href="<?=G5_URL?>/bbs/board.php?bo_table=52"><img src="<?=$head_skin_url?>/img/b1.png"></a><p>수강문의</p></div>
		<div><a href="<?=G5_URL?>/bbs/board.php?bo_table=41"><img src="<?=$head_skin_url?>/img/b2.png"></a><p>자격증 정보</p></div>
		<div><a href="http://www.뷰티연구소.com/" target="_blank"><img src="<?=$head_skin_url?>/img/b3.png"></a><p>카페</p></div>
		<div><a href="<?=G5_URL?>/sp.php?p=21"><img src="<?=$head_skin_url?>/img/b4.png"></a><p>과정소개</p></div>
		<div><a href="http://blog.naver.com/bestschool7" target="_blank"><img src="<?=$head_skin_url?>/img/b5.png"></a><p>블로그</p></div>
		<div><a href="<?=G5_URL?>/sp.php?p=11"><img src="<?=$head_skin_url?>/img/b6.png"></a><p>소개</p></div>
	</div>
</div>