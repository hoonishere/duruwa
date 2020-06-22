<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<style>
.social_notice		{font-size:14px; text-align:center ; font-weight:bold; margin:30px 0px;}
</style>

<style>
/*큰 틀 */
.order_frame												{display:block;  padding: 0px 0px 15px 0px; }
.order_frame h3											{margin: 0 0 20px 2%;font-size: 15px;font-weight: 700; font-family: "LacosteSansBold", "맑은 고딕", "Malgun Gothic", "돋움", "Dotum", "AppleGothic";    color: #454545;} 
.form-item-half											{width: 45%;		/*min-height:145px; */border:0px solid red;}
.form-item													{display: inline-block;     margin-bottom: 2px;    padding: 0 0 0 1%;}
.form-item input[type="text"]				{width: 95%; padding:10px;cursor: auto;border: 1px solid #ededed;}
.form-item input[type="password"]		{width: 95%; padding:10px;cursor: auto;border: 1px solid #ededed;}
.form-item label										{font-family: "LacosteSansBold","맑은 고딕", "Malgun Gothic", "돋움", "Dotum", "AppleGothic";font-weight: 700;margin-top: 10px; margin-bottom: 10px; display: inline-block;line-height: 1.7;color: #454545;}
.regi_frame													{width: 100%;  border:0px solid red;  margin: 0 auto;    padding: 10px 0 15px;}
.frm_info														{margin:10px 0px;}
.form-item-full											{ display: block;    width: 99%;    clear: both;}
.form-item-full textarea							{height:50px; width:98%; border: 1px solid #ededed;resize: none;  overflow: auto;}
.form-item-full {    width: 100%;    padding: 8px;    margin-bottom: 20px;}
.upper-clear {    text-transform: none;}
.title-15 {font-size: 15px;font-family: "LacosteSansBold", "맑은 고딕", "Malgun Gothic", "돋움", "Dotum", "AppleGothic";color: #454545;}
.btn {
    float: left;
    width: 180px;
    padding: 10px;
}

.btn {
    background: #285f41;
    border: 1px solid #285f41;
    font-family: "LacosteSansBold", "맑은 고딕", "Malgun Gothic", "돋움", "Dotum", "AppleGothic";
    color: #fff;
    font-size: 12px;
    padding: 10px 40px;
    text-align: center;
    cursor: pointer;
    text-decoration: none;
}

.just_line		{border-top:0.1em solid #ddd; margin:15px 0px;}
.btn-secondary {
    color: #454545;
    border: 1px solid #454545;
    background: #fff;
}

.clearfix {
    clear: both;
}
</style>

<?
	$req = "<span style='color:red;'>*</span>"; // 별표 
?>

<!-- 회원정보 입력/수정 시작 { -->
<div class="mbskin">

    <script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
    <?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
    <script src="<?php echo G5_JS_URL ?>/certify.js"></script>
    <?php } ?>

    <form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" >
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="url" value="<?php echo $urlencode ?>">
    <input type="hidden" name="agree" value="<?php echo $agree ?>">
		<input type="hidden" name="mb_10" value="<?php echo $member[mb_10]?>">
    <input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
    <input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
    <input type="hidden" name="cert_no" value="">
    <?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>
    <?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
    <input type="hidden" name="mb_nick_default" value="<?php echo $member['mb_nick'] ?>">
    <input type="hidden" name="mb_nick" value="<?php echo $member['mb_nick'] ?>">
    <?php }  ?>
		<?if($member[mb_10]=="social_login"){?> 
		<div class="social_notice">
			<?
			$id_str = "";
			$id_dist = explode("_",$member[mb_id]);
				if($id_dist[0]=="i"){
						$id_str = "인스타그램";
						$color="color:#a97b61;";
				}else if($id_dist[0]=="k"){
						$id_str = "카카오톡";
						$color="color:#CEA73D;";
				}else if($id_dist[0]=="f"){
						$id_str = "페이스북";
						$color="color:#3b5b98;";
				}else if($id_dist[0]=="g"){
						$id_str = "구글";
						$color="color:#c63d2d;";
				}else if($id_dist[0]=="n"){
						$id_str = "네이버";
						$color="color:#1edd00;";
				}
			?>

		 <?=$member[mb_nick]?>님은 <span style="<?=$color?>"><?=$id_str?></span>에서 소셜 로그인 하셨습니다.
		</div>
		 <?}?>
		
		<div class="order_frame">
	<!-- <h3>회원정보 입력</h3> -->
	<div class="regi_frame"><!--  / 전체 틀 -->

			<div class="form-item form-item-half"><!-- 여기 부분이 하나의 덩어리임. -->
				<label for="reg_mb_id"><?=$req?> 아이디<strong class="sound_only">필수</strong></label>
         <input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" <?php echo $required ?> <?php echo $readonly ?> class="frm_input01 <?php echo $required ?> <?php echo $readonly ?>" minlength="3" maxlength="20">
					<div id="msg_mb_id" class="frm_info">영문자, 숫자, _ 만 입력 가능. 최소 3자이상 입력하세요.</div>
			</div>

			<div class="form-item form-item-half"><!-- 여기 부분이 하나의 덩어리임. -->
				<label for="reg_mb_nick"><?=$req?> 닉네임<strong class="sound_only">필수</strong></label>
				<input type="hidden" name="mb_nick_default" value="<?php echo isset($member['mb_nick'])?$member['mb_nick']:''; ?>">
				<input type="text" name="mb_nick" value="<?php echo isset($member['mb_nick'])?$member['mb_nick']:''; ?>" id="reg_mb_nick" required class="frm_input01 required nospace" size="10" maxlength="20">
				<div  id="msg_mb_nick" class="frm_info">
						공백없이 한글,영문,숫자만 입력 가능(한글2자,영문4자 이상)
						<!-- 닉네임을 바꾸시면 앞으로 <?php echo (int)$config['cf_nick_modify'] ?>일 이내에는 변경 할 수 없습니다. -->
				</div>
			</div>

			<div class="form-item form-item-half"><!-- 여기 부분이 하나의 덩어리임. -->
				<label for="reg_mb_password"><?=$req?> 비밀번호<strong class="sound_only">필수</strong></label>
				<input type="password" name="mb_password" id="reg_mb_password" <?php echo $required ?> class="frm_input01 <?php echo $required ?>" minlength="3" maxlength="20">
			</div>

			<div class="form-item form-item-half"><!-- 여기 부분이 하나의 덩어리임. -->
				<label for="reg_mb_password_re"><?=$req?> 비밀번호 확인<strong class="sound_only">필수</strong></label>
				<input type="password" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> class="frm_input01 <?php echo $required ?>" minlength="3" maxlength="20">
			</div>

			<div class="form-item form-item-half"><!-- 여기 부분이 하나의 덩어리임. -->
				<label for="reg_mb_name"><?=$req?> 이름<strong class="sound_only">필수</strong></label>
				<?php if ($config['cf_cert_use']) { ?>
					<span class="frm_info">아이핀 본인확인 후에는 이름이 자동 입력되고 휴대폰 본인확인 후에는 이름과 휴대폰번호가 자동 입력되어 수동으로 입력할수 없게 됩니다.</span>
					<?php } ?>
					<input type="text" id="reg_mb_name" name="mb_name" value="<?php echo $member['mb_name'] ?>" <?php echo $required ?> <?php echo $readonly; ?> class="frm_input01 <?php echo $required ?> <?php echo $readonly ?>" size="10">
					<?php
					if($config['cf_cert_use']) {
							if($config['cf_cert_ipin'])
									echo '<button type="button" id="win_ipin_cert" class="btn_frmline">아이핀 본인확인</button>'.PHP_EOL;
							if($config['cf_cert_hp'])
									echo '<button type="button" id="win_hp_cert" class="btn_frmline">휴대폰 본인확인</button>'.PHP_EOL;

							echo '<noscript>본인확인을 위해서는 자바스크립트 사용이 가능해야합니다.</noscript>'.PHP_EOL;
					}
					?>
					<?php
					if ($config['cf_cert_use'] && $member['mb_certify']) {
							if($member['mb_certify'] == 'ipin')
									$mb_cert = '아이핀';
							else
									$mb_cert = '휴대폰';
					?>
					<div id="msg_certify">
							<strong><?php echo $mb_cert; ?> 본인확인</strong><?php if ($member['mb_adult']) { ?> 및 <strong>성인인증</strong><?php } ?> 완료
					</div>
					<?php } ?>
			</div>

			<div class="form-item form-item-half"><!-- 여기 부분이 하나의 덩어리임. -->
				<label for="reg_mb_email"><?=$req?> E-mail<strong class="sound_only">필수</strong></label>
				<?php if ($config['cf_use_email_certify']) {  ?>
					<span class="frm_info">
							<?php if ($w=='') { echo "E-mail 로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다."; }  ?>
							<?php if ($w=='u') { echo "E-mail 주소를 변경하시면 다시 인증하셔야 합니다."; }  ?>
					</span>
					<?php }  ?>
					<input type="hidden" name="old_email" value="<?php echo $member['mb_email'] ?>">
					<input type="text" name="mb_email" value="<?php echo isset($member['mb_email'])?$member['mb_email']:''; ?>" id="reg_mb_email" required class="frm_input01 email required" size="70" maxlength="100">
			</div>

	<!-- 		<div class="form-item form-item-half">
				<label for="namne_input"><?=$req?> 부가 자리</label>
				<input type="text" name="" value="" >
			</div> -->

			<!-- ////////////////////////////////////////////////////////////////// -->

			  <?php if ($config['cf_use_homepage']) {  ?>
        <div class="form-item form-item-half">
          <label for="reg_mb_homepage">홈페이지<?php if ($config['cf_req_homepage']){ ?><strong class="sound_only">필수</strong><?php } ?></label>
          <input type="text" name="mb_homepage" value="<?php echo $member['mb_homepage'] ?>" id="reg_mb_homepage" <?php echo $config['cf_req_homepage']?"required":""; ?> class="frm_input01 <?php echo $config['cf_req_homepage']?"required":""; ?>" size="70" maxlength="255">
        </div>
        <?php }  ?>

        <?php if ($config['cf_use_tel']) {  ?>
         <div class="form-item form-item-half">
            <label for="reg_mb_tel">전화번호<?php if ($config['cf_req_tel']) { ?><strong class="sound_only">필수</strong><?php } ?></label>
            <input type="text" name="mb_tel" value="<?php echo $member['mb_tel'] ?>" id="reg_mb_tel" <?php echo $config['cf_req_tel']?"required":""; ?> class="frm_input01 <?php echo $config['cf_req_tel']?"required":""; ?>" maxlength="20">
        </div>
        <?php }  ?>

        <?php if ($config['cf_use_hp'] || $config['cf_cert_hp']) {  ?>
        <div class="form-item form-item-half">
            <label for="reg_mb_hp">휴대폰번호<?php if ($config['cf_req_hp']) { ?><strong class="sound_only">필수</strong><?php } ?></label>
                <input type="text" name="mb_hp" value="<?php echo $member['mb_hp'] ?>" id="reg_mb_hp" <?php echo ($config['cf_req_hp'])?"required":""; ?> class="frm_input01 <?php echo ($config['cf_req_hp'])?"required":""; ?>" maxlength="20">
                <?php if ($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
                <input type="hidden" name="old_mb_hp" value="<?php echo $member['mb_hp'] ?>">
                <?php } ?>
        </div>
        <?php }  ?>

      <?php if ($config['cf_use_addr']) { ?>
        <div class="form-item form-item-half">
						<label>주소</label>
						<?php if ($config['cf_req_addr']) { ?><strong class="sound_only">필수</strong><?php }  ?>
						<label for="reg_mb_zip" class="sound_only">우편번호<?php echo $config['cf_req_addr']?'<strong class="sound_only"> 필수</strong>':''; ?></label>
						<div> 
							<input style="width:30%; " type="text" name="mb_zip" value="<?php echo $member['mb_zip1'].$member['mb_zip2']; ?>" id="reg_mb_zip" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input01 <?php echo $config['cf_req_addr']?"required":""; ?>" size="5" maxlength="6">
							<button style="width:30%; "  type="button" class="btn_frmline01" onclick="win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');">주소 검색</button>
						</div>
						
						<input type="text" name="mb_addr1" value="<?php echo $member['mb_addr1'] ?>" placeholder="기본주소" id="reg_mb_addr1" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input01 frm_address <?php echo $config['cf_req_addr']?"required":""; ?>" size="50">
						<!-- <label for="reg_mb_addr1">기본주소<?php echo $config['cf_req_addr']?'<strong class="sound_only"> 필수</strong>':''; ?></label><br> -->
						<input type="text" placeholder="상세주소" name="mb_addr2" value="<?php echo $member['mb_addr2'] ?>" id="reg_mb_addr2" class="frm_input01 frm_address" size="50">
						<!-- <label for="reg_mb_addr2">상세주소</label> -->
						<br>
						<input  style="display:none;" type="text" name="mb_addr3" value="<?php echo $member['mb_addr3'] ?>" id="reg_mb_addr3" class="frm_input01 frm_address" size="50" readonly="readonly">
						<!-- <label for="reg_mb_addr3">참고항목</label> -->
						<input type="hidden" name="mb_addr_jibeon" value="<?php echo $member['mb_addr_jibeon']; ?>">
				</div>
        <?php }  ?>
				
				  <?php if ($config['cf_use_signature']) {  ?>
        <div class="form-item form-item-full">
            <th scope="row"><label for="reg_mb_signature">서명<?php if ($config['cf_req_signature']){ ?><strong class="sound_only">필수</strong><?php } ?></label></th>
            <td><textarea name="mb_signature" id="reg_mb_signature" <?php echo $config['cf_req_signature']?"required":""; ?> class="<?php echo $config['cf_req_signature']?"required":""; ?>"><?php echo $member['mb_signature'] ?></textarea></td>
        </div>
        <?php }  ?>

				 <?php if ($config['cf_use_profile']) {  ?>
        <div class="form-item form-item-full">
            <th scope="row"><label for="reg_mb_profile">자기소개</label></th>
            <td><textarea name="mb_profile" id="reg_mb_profile" <?php echo $config['cf_req_profile']?"required":""; ?> class="<?php echo $config['cf_req_profile']?"required":""; ?>"><?php echo $member['mb_profile'] ?></textarea></td>
        </div>
        <?php }  ?>
				<div class="just_line"></div>
				<div class="your-preferences">
						<br>
						<h3 class="title-15">SMS / e-Mail 수신</h3>
						<div class="form-item form-item-full">
							<div class="upper-clear"> +귀사의 정보들을 받아보시기 원하시면 하단에 체크를 해주시기 바랍니다. </div>
						</div>
						<div class="form-item form-item-half">
							<label class="label-inline">
								 <input type="checkbox" name="mb_sms" value="1" id="reg_mb_sms" <?php echo ($w=='' || $member['mb_sms'])?'checked':''; ?>> <label for="reg_mb_sms">SMS 소식받기</label>
								<input type="hidden" name="smssend" id="smssend" value="N">
							</label>
						</div>
						<div class="form-item form-item-half">
							<label class="label-inline">
								 <input type="checkbox" name="mb_mailling" value="1" id="reg_mb_mailling" <?php echo ($w=='' || $member['mb_mailling'])?'checked':''; ?>><label for="reg_mb_mailling">e-Mail 소식받기</label>
								<input type="hidden" name="emailsend" id="emailsend" value="N">
							</label>
						</div>
			</div><!-- //your-preferences -->

		<div class="just_line"></div>
			<div class="form-item form-item-full" style="margin:55px 0px;">
				<div style="width:350px; float:left;font-size: 15px;font-weight:700;font-family: ','LacosteSansBold',', ','맑은 고딕',', ','Malgun Gothic',', ','돋움',', ','Dotum',', ','AppleGothic';color: #454545;">자동등록방지</div>
				<div style="width:350px; float:left "><?php echo captcha_html(); ?></div>
			</div>


	</div><!-- regi_frame end  -->
</div><!--가장 큰 틀  -->

    <div class="tbl_frm01 tbl_wrap" style="display:none;">
        <table>
        <caption>기타 개인설정</caption>
        <tbody>
        <?php if ($config['cf_use_member_icon'] && $member['mb_level'] >= $config['cf_icon_level']) {  ?>
        <tr style="display:none;">
            <th scope="row"><label for="reg_mb_icon">회원아이콘</label></th>
            <td>
                <span class="frm_info">
                    이미지 크기는 가로 <?php echo $config['cf_member_icon_width'] ?>픽셀, 세로 <?php echo $config['cf_member_icon_height'] ?>픽셀 이하로 해주세요.<br>
                    gif만 가능하며 용량 <?php echo number_format($config['cf_member_icon_size']) ?>바이트 이하만 등록됩니다.
                </span>
                <input type="file" name="mb_icon" id="reg_mb_icon" class="frm_input01">
                <?php if ($w == 'u' && file_exists($mb_icon_path)) {  ?>
                <img src="<?php echo $mb_icon_url ?>" alt="회원아이콘">
                <input type="checkbox" name="del_mb_icon" value="1" id="del_mb_icon">
                <label for="del_mb_icon">삭제</label>
                <?php }  ?>
            </td>
        </tr>
        <?php }  ?>

     
        <?php if (isset($member['mb_open_date']) && $member['mb_open_date'] <= date("Y-m-d", G5_SERVER_TIME - ($config['cf_open_modify'] * 86400)) || empty($member['mb_open_date'])) { // 정보공개 수정일이 지났다면 수정가능  ?>
        <tr>
            <th scope="row"><label for="reg_mb_open">정보공개</label></th>
            <td>
                <span class="frm_info">
                    정보공개를 바꾸시면 앞으로 <?php echo (int)$config['cf_open_modify'] ?>일 이내에는 변경이 안됩니다.
                </span>
                <input type="hidden" name="mb_open_default" value="<?php echo $member['mb_open'] ?>">
                <input type="checkbox" name="mb_open" value="1" <?php echo ($w=='' || $member['mb_open'])?'checked':''; ?> id="reg_mb_open">
                다른분들이 나의 정보를 볼 수 있도록 합니다.
            </td>
        </tr>
        <?php } else {  ?>
        <tr>
            <th scope="row">정보공개</th>
            <td>
                <span class="frm_info">
                    정보공개는 수정후 <?php echo (int)$config['cf_open_modify'] ?>일 이내, <?php echo date("Y년 m월 j일", isset($member['mb_open_date']) ? strtotime("{$member['mb_open_date']} 00:00:00")+$config['cf_open_modify']*86400:G5_SERVER_TIME+$config['cf_open_modify']*86400); ?> 까지는 변경이 안됩니다.<br>
                    이렇게 하는 이유는 잦은 정보공개 수정으로 인하여 쪽지를 보낸 후 받지 않는 경우를 막기 위해서 입니다.
                </span>
                <input type="hidden" name="mb_open" value="<?php echo $member['mb_open'] ?>">
            </td>
        </tr>
        <?php }  ?>

        <?php if ($w == "" && $config['cf_use_recommend']) {  ?>
        <tr>
            <th scope="row"><label for="reg_mb_recommend">추천인아이디</label></th>
            <td><input type="text" name="mb_recommend" id="reg_mb_recommend" class="frm_input01"></td>
        </tr>
        <?php }  ?>

        <tr>
            <th scope="row">자동등록방지</th>
            <td></td>
        </tr>
        </tbody>
        </table>
    </div><!-- 기타 개인 설정 완료 -->


<script>
$(document).ready(function(){ // reg_mb_nick
	$("#reg_mb_id").on("change", function(){
		var str= $(this).val();
		var url="./ajax_mb_id.php"; // /bbs/ajax_mb_id.php -> 여기가 글씨가 표현되는 자리입니다.
		var param="mb_id="+encodeURIComponent(str)+"&w=id";
		var method="POST";
		$.ajax({
			type: method, 
			url:url,
			dataType:"html",
			data:param,
			success:function (msg){
				document.getElementById("msg_mb_id").innerHTML = msg;
			}	
		});
	});

	$("#reg_mb_nick").on("change", function(){
		var str= $(this).val();
		var url="./ajax_mb_id.php"; // /bbs/ajax_mb_id.php -> 여기가 글씨가 표현되는 자리입니다.
		var param="mb_nick="+encodeURIComponent(str)+"&w=nick";
		var method="POST";
		$.ajax({
			type: method, 
			url:url,
			dataType:"html",
			data:param,
			success:function (msg){
				document.getElementById("msg_mb_nick").innerHTML = msg;
			}	
		});
	});

	$("#reg_mb_password_re").on("change" , function(){
		var pass1 =$("#reg_mb_password").val(); 
		var pass2 = $(this).val();
		if(pass1.length > 0 ){
			if(pass1 !=pass2){
				alert("입력하신 패스워드가 일치하지 않습니다.");
				$("#reg_mb_password_re").focus();
			}
		}else{
			alert("비밀번호를 입력해주세요");
			$("#reg_mb_password").focus();
		}
	});
});
</script>


	<div class="row clearfix" style="margin-bottom:30px;">
			<div class="form form-sign-in"> 															
				<div class="form-item form-item-half">
					<button class="btn btn-first" id="btn_submit">
						확인
					</button>
				</div>
				<?
					if($w==""){
						$str = "회원가입";
					}else{
						$str = "정보수정";
					}
				?>
				<div class="form-item form-item-half">
					<button class="btn btn-secondary" onclick="if (window.confirm('<?=$str?>을 취소하시겠습니까?')) {location.href='<?=G5_URL?>';}else{return false}">
						취소
					</button>
				</div>																
			</div><!-- //form -->
	</div>
	
	<!-- <div class="form-item form-item-full" >
			<button class="btn btn-secondary" onclick="javascript:location.href='<?=G5_URL?>';" style="width:780px;">
				메인 화면으로 돌아가기
			</button>
	</div> -->

    </form>

    <script>
    $(function() {

			$("#btn_submit").on("click" , function(){
				$("#fregisterform").submit();
			});
        $("#reg_zip_find").css("display", "inline-block");

        <?php if($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
        // 아이핀인증
        $("#win_ipin_cert").click(function() {
            if(!cert_confirm())
                return false;

            var url = "<?php echo G5_OKNAME_URL; ?>/ipin1.php";
            certify_win_open('kcb-ipin', url);
            return;
        });

        <?php } ?>
        <?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
        // 휴대폰인증
        $("#win_hp_cert").click(function() {
            if(!cert_confirm())
                return false;

            <?php
            switch($config['cf_cert_hp']) {
                case 'kcb':
                    $cert_url = G5_OKNAME_URL.'/hpcert1.php';
                    $cert_type = 'kcb-hp';
                    break;
                case 'kcp':
                    $cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
                    $cert_type = 'kcp-hp';
                    break;
                case 'lg':
                    $cert_url = G5_LGXPAY_URL.'/AuthOnlyReq.php';
                    $cert_type = 'lg-hp';
                    break;
                default:
                    echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
                    echo 'return false;';
                    break;
            }
            ?>

            certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>");
            return;
        });
        <?php } ?>
    });

    // submit 최종 폼체크
    function fregisterform_submit(f)
    {
        // 회원아이디 검사
        if (f.w.value == "") {
            var msg = reg_mb_id_check();
            if (msg) {
                alert(msg);
                f.mb_id.select();
                return false;
            }
        }

        if (f.w.value == "") {
            if (f.mb_password.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password.focus();
                return false;
            }
        }

        if (f.mb_password.value != f.mb_password_re.value) {
            alert("비밀번호가 같지 않습니다.");
            f.mb_password_re.focus();
            return false;
        }

        if (f.mb_password.value.length > 0) {
            if (f.mb_password_re.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password_re.focus();
                return false;
            }
        }

        // 이름 검사
        if (f.w.value=="") {
            if (f.mb_name.value.length < 1) {
                alert("이름을 입력하십시오.");
                f.mb_name.focus();
                return false;
            }

            /*
            var pattern = /([^가-힣\x20])/i;
            if (pattern.test(f.mb_name.value)) {
                alert("이름은 한글로 입력하십시오.");
                f.mb_name.select();
                return false;
            }
            */
        }

        <?php if($w == '' && $config['cf_cert_use'] && $config['cf_cert_req']) { ?>
        // 본인확인 체크
        if(f.cert_no.value=="") {
            alert("회원가입을 위해서는 본인확인을 해주셔야 합니다.");
            return false;
        }
        <?php } ?>

        // 닉네임 검사
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
            var msg = reg_mb_nick_check();
            if (msg) {
                alert(msg);
                f.reg_mb_nick.select();
                return false;
            }
        }

        // E-mail 검사
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
            var msg = reg_mb_email_check();
            if (msg) {
                alert(msg);
                f.reg_mb_email.select();
                return false;
            }
        }

        <?php if (($config['cf_use_hp'] || $config['cf_cert_hp']) && $config['cf_req_hp']) {  ?>
        // 휴대폰번호 체크
        var msg = reg_mb_hp_check();
        if (msg) {
            alert(msg);
            f.reg_mb_hp.select();
            return false;
        }
        <?php } ?>

        if (typeof f.mb_icon != "undefined") {
            if (f.mb_icon.value) {
                if (!f.mb_icon.value.toLowerCase().match(/.(gif)$/i)) {
                    alert("회원아이콘이 gif 파일이 아닙니다.");
                    f.mb_icon.focus();
                    return false;
                }
            }
        }

        if (typeof(f.mb_recommend) != "undefined" && f.mb_recommend.value) {
            if (f.mb_id.value == f.mb_recommend.value) {
                alert("본인을 추천할 수 없습니다.");
                f.mb_recommend.focus();
                return false;
            }

            var msg = reg_mb_recommend_check();
            if (msg) {
                alert(msg);
                f.mb_recommend.select();
                return false;
            }
        }

        <?php echo chk_captcha_js();  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>

</div>
<!-- } 회원정보 입력/수정 끝 -->