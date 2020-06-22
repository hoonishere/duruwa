<?
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$main_skin_url.'/main_inc.css">', 10);
?>
<div id="container_skip"></div>
<div class="main_visual" >
	<?=latest("main_slide_back", "main_img", 3, 20, 1);?>
</div>

<div class="main_quick_banner" style="text-align:center;">
	<a href="<?=G5_URL?>/sp.php?p=21"><img src="<?=$main_skin_url?>/img/qb1.jpg" alt="헤어"></a>
	<a href="<?=G5_URL?>/sp.php?p=22"><img src="<?=$main_skin_url?>/img/qb2.jpg" alt="피부관리"></a>
	<a href="<?=G5_URL?>/sp.php?p=23"><img src="<?=$main_skin_url?>/img/qb3.jpg" alt="메이크업"></a>
	<a href="<?=G5_URL?>/sp.php?p=24"><img src="<?=$main_skin_url?>/img/qb4.jpg" alt="네일아트"></a>
	<a href="<?=G5_URL?>/sp.php?p=25"><img src="<?=$main_skin_url?>/img/qb5.jpg" alt="대학입시반"></a>
	<a href="<?=G5_URL?>/sp.php?p=26"><img src="<?=$main_skin_url?>/img/qb6.jpg" alt="속눈썹/왁싱"></a>
	<a href="<?=G5_URL?>/sp.php?p=27"><img src="<?=$main_skin_url?>/img/qb7.jpg" alt="뷰티전문가"></a>
	<a href="#"><img src="<?=$main_skin_url?>/img/qb_prev.png"></a>
	<a href="#"><img src="<?=$main_skin_url?>/img/qb_next.png"></a>
</div>
<? //<!-- 아래껀 디자인 확인용 -->//?>
<div class="main_quick_banner"  style="background:#fff url('<?=$main_skin_url?>/img/sam1.jpg') no-repeat center 55px; height:195px;"></div>
<? //<!-- 참고사이트 http://www.waplez.com/ -->//?>


<div class="main_board">
	<div class="board_a">
		<div class="board_a1">
			<h1><img src="<?=$main_skin_url?>/img/tit_1.png" alt="수강문의"><a href="<?=G5_URL?>/bbs/board.php?bo_table=52"><img src="<?=$main_skin_url?>/img/more.png" alt="수강문의 바로가기"></a></h1>
			<div><?php echo latest("main_board", "52", "4", "30");?></div>
		</div>
		<div class="board_a2">
			<h1><img src="<?=$main_skin_url?>/img/tit_2.png" alt="수강후기"><a href="<?=G5_URL?>/bbs/board.php?bo_table=31"><img src="<?=$main_skin_url?>/img/more.png" alt="후강후기 바로가기"></a></h1>
			<div><?php echo latest("main_board2", "31", "4", "30");?></div>
		</div>
	</div>
	<div class="board_b">
		<div class="bb_a"><a href="#"><img src="<?=$main_skin_url?>/img/ba1.png" alt=""></a></div>
		<div class="bb_b">
			<a href="#"><img src="<?=$main_skin_url?>/img/ba2.png" alt=""></a>
			<a href="#"><img src="<?=$main_skin_url?>/img/ba3.png" alt=""></a>
		</div>
	</div>
	<div class="board_c">
		<a href="<?=G5_URL?>/bbs/board.php?bo_table=52"><img src="<?=$main_skin_url?>/img/qr1.png" alt="수강문의"></a>
		<a href="<?=G5_URL?>/sp.php?p=21"><img src="<?=$main_skin_url?>/img/qr2.png" alt="과정소개"></a>
		<a href="<?=G5_URL?>/bbs/board.php?bo_table=41"><img src="<?=$main_skin_url?>/img/qr3.png" alt="자격증 정보"></a>
		<a href="<?=G5_URL?>"><img src="<?=$main_skin_url?>/img/qr4.png" alt="블로그"></a>
		<a href="<?=G5_URL?>"><img src="<?=$main_skin_url?>/img/qr5.png" alt="카페"></a>
		<a href="<?=G5_URL?>/sp.php?p=11"><img src="<?=$main_skin_url?>/img/qr6.png" alt="소개"></a>
	</div>
</div>

<div class="main_family" style="text-align:center;">
	<a href="#"><img src="<?=$main_skin_url?>/img/family_prev.png"></a>
	<a href="#"><img src="<?=$main_skin_url?>/img/fam1.png"></a>
	<a href="#"><img src="<?=$main_skin_url?>/img/fam2.png"></a>
	<a href="#"><img src="<?=$main_skin_url?>/img/fam1.png"></a>
	<a href="#"><img src="<?=$main_skin_url?>/img/fam2.png"></a>
	<a href="#"><img src="<?=$main_skin_url?>/img/fam1.png"></a>
	<a href="#"><img src="<?=$main_skin_url?>/img/fam2.png"></a>
	<a href="#"><img src="<?=$main_skin_url?>/img/fam2.png"></a>
	<a href="#"><img src="<?=$main_skin_url?>/img/family_next.png"></a>
</div>
<? //<!-- 아래껀 디자인 확인용 -->//?>
<div class="main_family"  style="background:#fff url('<?=$main_skin_url?>/img/sam2.jpg') no-repeat center 45px; height:60px;"></div>




<div class="main_text_bg">
	<div class="main_text">
		<div class="mt_title"><img src="<?=$main_skin_url?>/img/mb_txt.png"></div>
		<div class="mt_btn"><a href="<?=G5_URL?>/bbs/board.php?bo_table=52"><img src="<?=$main_skin_url?>/img/mb_btn.png" alt="수강문의"></a></div>
		<div class="mt_box">
			<div class="mt_box_a">
				<div>
					<h1>단순한 자격증 취득만을 고집하는 것은 NO! </h1>
					<p>드루와뷰티는 1:1 수업과, 이론과 실기 모두 배울 수 있는 완벽한 커리큘럼을 바탕으로 기술자가 아닌 뷰티전문가로서 더 높게 성장할 수 있도록 지원하고 있습니다. </p>
				</div>
				<div class="mt_img"><img src="<?=$main_skin_url?>/img/mb_a.png"></div>
			</div>
			<div class="mt_box_b">
				<div>
					<h1>멘토링 시스템으로 진로확정까지 한번에 </h1>
					<p>나에게 맞는 것인지? 앞으로 비전은 어떠한지?<br> 요즘 핫한 트렌드는 무엇인지? 고민만 하지마세요<br> 드루와 뷰티는 완벽한 멘토링 시스템으로, 추가 수업에 대한 불필요한 비용은 줄이고, 뷰티기술 전문가로 거듭날 수 있도록 책임지고 있습니다. </p>
				</div>
				<div class="mt_img"><img src="<?=$main_skin_url?>/img/mb_b.png"></div>
			</div>
			<div class="mt_box_c">
				<div>
					<h1>최고의 강사진과 함께 꿈을 펼치세요 </h1>
					<p>수업만족도 100%, 드루와뷰티는 최고의 강사진으로 구성되어 있어 보다 더 높은 퀄리티의 수업을 진행하고 있습니다. 기초 부터, 테크닉을 중요시 하는 전문기술 까지 한번에 습득하세요 </p>
				</div>
				<div class="mt_img"><img src="<?=$main_skin_url?>/img/mb_c.png"></div>
			</div>
			<div class="mt_box_d">
				<div>
					<h1>협회주관 믿을 수 있는 학원</h1>
					<p>법인인증기업 뷰티디자인 연구소에서 끊임없는 연구 및 수강완료 시, 강사활동 시, 창업 시 지정기관이 되셔서 활동하실 수 있는 기회가 주어집니다. </p>
				</div>
				<div class="mt_img"><img src="<?=$main_skin_url?>/img/mb_d.png"></div>
			</div>
		</div>
	</div>
</div>