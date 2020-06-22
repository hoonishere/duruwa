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
			<div class="regi_term">
				<h2>회원가입약관</h2>
				<div class="term_btn open"> + 보기 </div>
				<div class="term_btn close_2" style="display:none;">  - 닫기 </div>
				<div class="term_cont" style="display:none;">
				<?php echo nl2br($config['cf_stipulation']) ?>
				</div>
			</div>

			<div class="regi_term">
				<h2>개인정보처리방침안내</h2>
				<div class="term_btn open2"> + 보기 </div>
				<div class="term_btn close2" style="display:none;">  - 닫기 </div>
				<div class="term_cont2" style="display:none;">
				<?php echo nl2br($config['cf_privacy']) ?>
				</div>
			</div>

			<div class="chk_box">
				<input type="checkbox" name="agree" value="1" id="agree11">
				<label for="agree11">회원가입약관 동의</label> &nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="agree2" value="1" id="agree21">
				<label for="agree21">개인정보처리방침안내 동의</label>
			<div class="tot_chk" ><input type="checkbox" name="agree" value="1" id="allCheck">
			<label for="allCheck">&nbsp;모두 동의&nbsp;</label>
			
			</div>
			</div>
    <div class="btn_confirm">
        <input type="submit" class="btn_submit" value="회원가입">
    </div>

		</form>
</div>

<script type="text/javascript">
	$(function(){
			
			$(".open").on("click" , function(){
				$(".term_cont").slideDown();
				$(".open").hide();
				$(".close_2").show();
			});

		$(".close_2").on("click" , function(){
				$(".term_cont").slideUp();
				$(".open").show();
				$(".close_2").hide();
			});

				$(".open2").on("click" , function(){
				$(".term_cont2").slideDown();
				$(".open2").hide();
				$(".close2").show();
			});

		$(".close2").on("click" , function(){
				$(".term_cont2").slideUp();
				$(".open2").show();
				$(".close2").hide();
			});



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

<!-- } 회원가입 약관 동의 끝 -->