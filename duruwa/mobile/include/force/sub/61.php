<? if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가  ?>
<?
$action_url = G5_URL."/bbs/write_update_iboard.php";
$bo_table="61";
?>


		<div class="s61_img"><img src="<?=$head_skin_url?>/img/s61_a.jpg"></div>

		<div class="s61_bg">
			<div class="s61">
				<h1>드루와 뷰티와 평생<br>함께 할 가족을 모십니다.</h1>
				<h3><!-- 10여년의 경험을 통해 다양한 노하우가 집약된 전문화된 단체로 본인의 프렌차이즈를 구축하고자 하는 분들을 선별하여 지역별 지부를 개설, 공유 아카데미를 개최하며 프렌차이즈를 만들어 드리고자 합니다. --></h3>
			</div>

			<div class="s61_board">
				<form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
					<input type="hidden" name="w" value="<?php echo $w ?>">
					<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
					<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
					<input type="hidden" name="sca" value="<?php echo $sca ?>">
					<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
					<input type="hidden" name="stx" value="<?php echo $stx ?>">
					<input type="hidden" name="spt" value="<?php echo $spt ?>">
					<input type="hidden" name="sst" value="<?php echo $sst ?>">
					<input type="hidden" name="sod" value="<?php echo $sod ?>">
					<input type="hidden" name="page" value="<?php echo $page ?>">
					<input type="hidden" name="wr_name" value="신청자">
					<input type="hidden" name="wr_subject" value="<?php echo $write[wr_subject]?>" id="wr_subject">
					<table>
						<colgroup>
							<col width="30%">
							<col>
						</colgroup>
						<tr>
							<th>회사명</th>
							<td><input type="text" name="wr_1" value="<?=$write[wr_1]?>" id="wr_1" title="회사명" class="required"></td>
						</tr>
						<tr>
							<th>담당자명</th>
							<td><input type="text" name="wr_2" value="<?=$write[wr_2]?>" id="wr_2" title="담당자명" class="required"></td>
						</tr>
						<tr>
							<th>연락처</th>
							<td><input type="text" name="wr_3" value="<?=$write[wr_3]?>" id="wr_3" title="연락처" class="required"></td>
						</tr>
						<tr>
							<th>휴대폰</th>
							<td><input type="text" name="wr_4" value="<?=$write[wr_4]?>" id="wr_4" title="휴대폰" class="required"></td>
						</tr>
						<tr>
							<th>이메일</th>
							<td><input type="text" name="wr_5" value="<?=$write[wr_5]?>" id="wr_5" ></td>
						</tr>
						<tr>
							<th>내용</th>
							<td>
								<textarea name="wr_content"><?=$write[wr_content]?></textarea>
							</td>
						</tr>
					</table>
					<input type="submit" value="문의하기" id="btn_submit">
				</form>
				<img src="<?=G5_URL?>/img/s61_b.jpg">
			</div>

		</div>
		<div class="s61_img"><img src="<?=$head_skin_url?>/img/s61_c.jpg"></div>
		<div class="s61_img"><img src="<?=G5_URL?>/img/s61_d.jpg"></div>







<script>
$(document).ready(function(){
	$("#wr_2").on("blur" , function(){
		$("#wr_subject").val($(this).val()+" 님이 가맹점개설 문의 주셨습니다.");
	});
});

function fwrite_submit(f)
{
/*
		if(!$("#wr_1").val().trim()){
			alert("회사명을 입력해주세요");
			$("#wr_1").focus();
			return false;
		}
*/
		if(!$("#wr_2").val().trim()){
			alert("담당자명을 입력해주세요");
			$("#wr_2").focus();
			return false;
		}

		if(!$("#wr_3").val().trim()){
			alert("전화번호를 입력해주세요");
			$("#wr_3").focus();
			return false;
		}

		if(!$("#wr_4").val().trim()){
			alert("휴대폰번호를 입력해주세요");
			$("#wr_4").focus();
			return false;
		}

		if(!$("#wr_5").val().trim()){
			alert("이메일을 입력해주세요");
			$("#wr_5").focus();
			return false;
		}

		document.getElementById("btn_submit").disabled = "disabled";

		return true;
}
</script>