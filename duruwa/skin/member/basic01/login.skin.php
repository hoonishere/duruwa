<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
include_once(G5_PATH."/sh.php");
?>


<!-- 로그인 시작 { -->
<div id="mb_login01" class="mbskin border_bt">
	<form name="flogin" id="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
	<input type="hidden" name="auto_login"  id ="auto_login" value=''>
  <input type="hidden" name="url" value='<?php echo $login_url ?>'>

			<div class="form-item-full border_top border_bt">
					<!-- <h3 class="title-15"><?php echo $g5['title'] ?></h3> -->
					<div class="form-item form-item-full" style="padding:0px;margin-bottom:0px;">
						<label for="login_id">아이디:</label><span id="header_validate_msg_area_id" class="error"></span>
						<input type="text" name="mb_id" id="login_id" required class="frm_input required" size="20" maxLength="20">
					</div>
					<div class="form-item form-item-full" style="padding:0px;margin-bottom:0px;">
						<label for="login_pw">비밀번호:</label><span id="header_validate_msg_area_pw" class="error"></span>
						<input type="password" name="mb_password" id="login_pw" required class="frm_input required" size="20" maxLength="20">
					</div>
			</div>

			<div class="form-item form-item-full">
					<input type="submit" value="로그인" class="btn btn-secondary btn-full" style="width:100%;">
			</div>
		<?/* 자동 로그인 빼버림?>
			<div class="form-item form-item-full">
					<div class="btn btn-secondary btn-full" id="login_auto_login">자동로그인</div>
			</div>
		<?*/?>
			<div class="form-item form-item-full">
					<a href="#null"  onclick="on_popup('<?=G5_URL?>/bbs/password_lost.php','617','450');" style="text-decoration:none;">아이디, 비밀번호를 잊으셨나요?</a>
			</div>

			<div class="form-item form-item-full">
				<!-- <div style="text-align:center; padding-bottom:30px; border-left:1px solid #ddd;  border-right:1px solid #ddd; "> -->
				<?php if($config[cf_9_subj]=="활성화"&& eregi("facebook",$config[cf_9])){ echo get_login_oauth('facebook'); }?>
				<?php if($config[cf_9_subj]=="활성화"&& eregi("kakao",$config[cf_9])){ echo get_login_oauth('kakao'); }?>
				<?php if($config[cf_9_subj]=="활성화"&& eregi("google",$config[cf_9])){ echo get_login_oauth('google'); }?>
				<?php if($config[cf_9_subj]=="활성화"&& eregi("naver",$config[cf_9])){ echo get_login_oauth('naver'); }?>
				<?php if($config[cf_9_subj]=="활성화"&& eregi("instargram",$config[cf_9])){
					include_once(G5_PLUGIN_PATH."/login-oauth/instargram/index.php");
					}
				?>
			</div>

			<div class="form-item form-item-full border_top ">
					<h3 class="title-15">회원이 아니세요?</h3>
					<div class="form-item form-item-full font">
						회원이 아니시라면,<br>가입 후 더 다양한 서비스를 이용해보세요
					</div>
					<div class="form-item form-item-full" style="padding:0;">
							<div class="btn btn-secondary btn-full" id="regi_first">회원가입하기</div>
					</div>
			</div>

	</form>



	<?php // 쇼핑몰 사용시 여기부터 ?>
    <?php if ($default['de_level_sell'] == 1) { // 상품구입 권한 ?>

        <!-- 주문하기, 신청하기 -->
        <?php if (preg_match("/orderform.php/", $url)) { ?>

				<div class="form-item-full border_top border_bt" style="margin:65px 0 20px 0;">
					<h2 class="title-20">비회원 구매</h2>
					<p style="margin:10px;">
							비회원으로 주문하시는 경우 포인트는 지급하지 않습니다.
					</p>
					<div class="term_btn open"> + 보기 </div>
					<div class="term_btn close" style="display:none;">  - 닫기 </div>
					
					<div id="guest_privacy" style="display:none;">
							 <?php echo $default['de_guest_privacy']; ?>
					</div>

				<div class="form-item form-item-full" style="margin-bottom:0px;">
					<input type="checkbox" id="agree" value="1">
					<label for="agree">개인정보수집에 대한 내용을 읽었으며 이에 동의합니다.</label>
				</div>
				<a href="javascript:guest_submit(document.flogin);" ><div class="btn btn-secondary btn-full" >비회원으로 구매하기</div></a>


				</div>

    <section id="mb_login_notmb" style="display:none;">
        <h2 class="">비회원 구매</h2>

        <p>
            비회원으로 주문하시는 경우 포인트는 지급하지 않습니다.
        </p>

        <div id="guest_privacy">
            <?php echo $default['de_guest_privacy']; ?>
        </div>

        <label for="agree">개인정보수집에 대한 내용을 읽었으며 이에 동의합니다.</label>
        <input type="checkbox" id="agree" value="1">

        <div class="btn_confirm">
            <a href="javascript:guest_submit(document.flogin);" class="btn02">비회원으로 구매하기</a>
        </div>

        <script>
        function guest_submit(f)
        {
            if (document.getElementById('agree')) {
                if (!document.getElementById('agree').checked) {
                    alert("개인정보수집에 대한 내용을 읽고 이에 동의하셔야 합니다.");
                    return;
                }
            }

            f.url.value = "<?php echo $url; ?>";
            f.action = "<?php echo $url; ?>";
            f.submit();
        }
        </script>
    </section>

        <?php } else if (preg_match("/orderinquiry.php$/", $url)) { ?>

    <fieldset id="mb_login_od">
        <legend>비회원 주문조회</legend>

        <form name="forderinquiry" method="post" action="<?php echo urldecode($url); ?>" autocomplete="off">

        <label for="od_id" class="od_id">주문서번호<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="od_id" value="<?php echo $od_id; ?>" id="od_id" required class="frm_input required" size="20">
        <label for="id_pwd" class="od_pwd">비밀번호<strong class="sound_only"> 필수</strong></label>
        <input type="password" name="od_pwd" size="20" id="od_pwd" required class="frm_input required">
        <input type="submit" value="확인" class="btn_submit">

        </form>
    </fieldset>

    <section id="mb_login_odinfo">
        <h2>비회원 주문조회 안내</h2>
        <p>메일로 발송해드린 주문서의 <strong>주문번호</strong> 및 주문 시 입력하신 <strong>비밀번호</strong>를 정확히 입력해주십시오.</p>
    </section>

        <?php } ?>

    <?php } ?>
    <?php // 쇼핑몰 사용시 여기까지 반드시 복사해 넣으세요 ?>


</div><!-- mb_login01 end! -->
<script>
$(document).ready(function(){

			$("#login_id").focus();
			$(".open").on("click" , function(){
				$("#guest_privacy").slideDown();
				$(".open").hide();
				$(".close").show();
			});

		$(".close").on("click" , function(){
				$("#guest_privacy").slideUp();
				$(".open").show();
				$(".close").hide();
			});


	$("#login_auto_login").click(function(){
			if(confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?")){
			$("#auto_login").val("on");
			$("#flogin").submit();
			}else{
			$("#auto_login").val("");
			}
	});

	$("#regi_first").on("click" , function(){
		location.replace("<?=G5_URL?>/bbs/register.php");
	});
});

function flogin_submit(f)
{
    return true;
}


function on_popup(url,wid,hei){ // 유알엘 주소, 창 넓이, 창 높이 
	
window.open(url, "pop", "width="+wid+",height="+hei+",scrollbars=yes,menubar=no") ;
}
</script>


<!-- } Login end -->

<?include_once(G5_PATH."/st.php");?>