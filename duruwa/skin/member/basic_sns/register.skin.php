<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
$config['cf_stipulation'] = @str_replace("★★★★★", $config[cf_title], $config['cf_stipulation']);
$config['cf_privacy'] = @str_replace("★★★★★", $config[cf_title], $config['cf_privacy']);
?>

<!-- 회원가입약관 동의 시작 { -->
<div class="mbskin">
    <form  name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

    <p>회원가입약관 및 개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.</p>

    <section id="fregister_term">
        <h2>회원가입약관</h2>
        <textarea readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
        <fieldset class="fregister_agree">
            <label for="agree11">회원가입약관의 내용에 동의합니다.</label>
            <input type="checkbox" name="agree" value="1" id="agree11">
        </fieldset>
    </section>

    <section id="fregister_private">
        <h2>개인정보처리방침안내</h2>
        <textarea readonly><?php echo get_text($config['cf_privacy']) ?></textarea>
        <fieldset class="fregister_agree">
            <label for="agree21">개인정보처리방침안내의 내용에 동의합니다.</label>
            <input type="checkbox" name="agree2" value="1" id="agree21">
        </fieldset>
    </section>
		

		<div class="tot_chk" >전체동의 확인&nbsp;&nbsp; <input type="checkbox" name="agree" value="1" id="allCheck"></div>
    <div class="btn_confirm">
        <input type="submit" class="btn_submit" value="회원가입">
    </div>

    </form>




<script type="text/javascript">
	$(function(){
	    //전체선택 체크박스 클릭
		$("#allCheck").click(function(){
			//만약 전체 선택 체크박스가 체크된상태일경우
			if($("#allCheck").prop("checked")) {
				//해당화면에 전체 checkbox들을 체크해준다
				$("input[type=checkbox]").prop("checked",true);
			// 전체선택 체크박스가 해제된 경우
			} else {
				//해당화면에 모든 checkbox들의 체크를해제시킨다.
				$("input[type=checkbox]").prop("checked",false);
			}
		})
	})
</script>

    <script>
    function fregister_submit(f)
    {
        if (!$("#agree11").prop("checked")) {
            alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            $(this).focus();
            return false;
        }

        if (!$("#agree21").prop("checked")) {
            alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            $(this).focus();
            return false;
        }

        return true;
    }
    </script>
</div>
<!-- } 회원가입 약관 동의 끝 -->