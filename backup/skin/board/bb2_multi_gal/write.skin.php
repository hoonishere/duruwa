<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$tmp_subject = "";
if(!$subject)$subject=$tmp_subject;
?>
<link rel="stylesheet" href="<?=$board_skin_url?>/style.css" type="text/css">

<div class="total_board_view_wrap" style="width:<?=$width?>px;">
<form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
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
<!-- 
		<input type="hidden" name="wr_name" id="wr_name" value="작성자">
		<input type="hidden" name="wr_password" id="wr_password" value="<?=date("YmdHis")?>">
		<input type="hidden" name="wr_subject" id="wr_subject" value="제목입니다.">
 -->
		<?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>

	<!-- <h2 class="title"><?=$board[bo_subject]?> <?=$title_msg?></h2>	 -->

	<?php if ($is_name) { ?>
	<table class="guest_table">
		<colgroup>
			<col width="120px" />
			<col width="160px" />
			<col width="120px" />
			<col />
		</colgroup>
		<tr>
			<th>이름</th>
			<td><input class='inputbox required' maxlength="20" name="wr_name" title="이름" value="<?=$name?>"></td>
			<th>패스워드</th>
			<td><input class='inputbox ' type="password" maxlength="20" name="wr_password" title="패스워드" <?=$password_required?>></td>
		</tr>
		<tr style="display:none;">
			<th>이메일</th>
			<td><input class='inputbox email' name="wr_1"  title="이메일" value="<?=$write[wr_1]?>"></td>
			<th>연락처</th>
			<td><input class='inputbox' name="wr_2" title="연락처" value="<?=$write[wr_2]?>"></td>
		</tr>
	</table>
	<?}?>
	<div class="wr_subject"><input class='subject_inputbox required' name="wr_subject" id="wr_subject" title="제목" value="<?=$subject?>"></div>
	
	<?php if($write_min || $write_max) { ?>
	<!-- 최소/최대 글자 수 사용 시 -->
	<p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
	<?php } ?>
	<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
	<?php if($write_min || $write_max) { ?>
	<!-- 최소/최대 글자 수 사용 시 -->
	<div id="char_count_wrap"><span id="char_count"></span>글자</div>
	<?php } ?>

	<table class="option_table">
		<colgroup>
			<col width="120px" />
			<col width="160px" />
			<col width="120px" />
			<col />
		</colgroup> 
		<?php if ($option) { ?>
		<tr>
			<th>옵션</th>
			<td colspan=3>
				<?php echo $option ?>
			</td></tr>
		<?}?>

		<?php if ($is_category) { ?>
		<tr>
				<th><label for="ca_name">분류<strong class="sound_only">필수</strong></label></th>
				<td colspan=3>
					<select name="ca_name" id="ca_name" class="frm_input required" title="분류">
						<option value="">선택하세요</option>
						<?php echo $category_option ?>
					</select>
				</td>
		</tr>
		<?php } ?>

		<? if($board[bo_2]=="movie"){?>
		<tr>
			<th>동영상코드</th>
			<td colspan=3><textarea  id="wr_9" name="wr_9"  class=textareabox rows="3" ><?=$write["wr_9"]?></textarea></td>
		</tr>
		<?}else if ($is_link) { ?>
		<? for ($i=1; $i<=G5_LINK_COUNT; $i++) { ?>
		<tr>
			<th>링크 #<?=$i?></th>
			<td colspan=3><input type='text' class='inputbox' name='wr_link<?=$i?>' itemname='링크 #<?=$i?>' value='<?=$write["wr_link{$i}"]?>'></td>
		</tr>
		<? } ?>
		<? } ?>

		<!-- SWF업로더 시작-->
<? if ($is_file) { ?>
<tr>
<td class=mw_basic_write_title>· 멀티업로더 </td>
<td colspan=3 class=mw_basic_write_content><? include_once("$board_skin_path/swfupload/index.php"); ?></td>
</tr>
<tr><td colspan=4 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>
<!-- SWF업로더 끝 -->

		<? if ($is_trackback) { ?>
		<tr>
			<th>트랙백주소</th>
			<td colspan=3><input class='inputbox' size=50 name=wr_trackback itemname="트랙백" value="<?=$trackback?>">
				<? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">핑 보냄<? } ?></td>
		</tr>
		<? } ?>
	</table>

	<? if ($is_guest) { ?>
	<table class="guest_table">
		<colgroup>
			<col width="120px" />
			<col />
		</colgroup>
		<tr>
			<th>자동등록방지</th>
			<td>
			<?php echo $captcha_html ?>
			</td>
		</tr>
	</table>
	<? } ?>
	<div class="board_btn">
		<input type='submit' id="btn_submit" border=0 accesskey='s' value="확인">
        <a href="./board.php?bo_table=<?=$bo_table?>">목록</a>
	</div>
</form>



</div><!-- total_board_view_wrap 게시판전체틀끝 -->





<script>
<?php if($write_min || $write_max) { ?>
// 글자수 제한
var char_min = parseInt(<?php echo $write_min; ?>); // 최소
var char_max = parseInt(<?php echo $write_max; ?>); // 최대
check_byte("wr_content", "char_count");

$(function() {
		$("#wr_content").on("keyup", function() {
				check_byte("wr_content", "char_count");
		});
});

<?php } ?>
function html_auto_br(obj)
{
		if (obj.checked) {
				result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
				if (result)
						obj.value = "html2";
				else
						obj.value = "html1";
		}
		else
				obj.value = "";
}

function fwrite_submit(f)
{
		<?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

		var subject = "";
		var content = "";
		$.ajax({
				url: g5_bbs_url+"/ajax.filter.php",
				type: "POST",
				data: {
						"subject": f.wr_subject.value,
						"content": f.wr_content.value
				},
				dataType: "json",
				async: false,
				cache: false,
				success: function(data, textStatus) {
						subject = data.subject;
						content = data.content;
				}
		});

		if (subject) {
				alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
				f.wr_subject.focus();
				return false;
		}

		if (content) {
				alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
				if (typeof(ed_wr_content) != "undefined")
						ed_wr_content.returnFalse();
				else
						f.wr_content.focus();
				return false;
		}

		if (document.getElementById("char_count")) {
				if (char_min > 0 || char_max > 0) {
						var cnt = parseInt(check_byte("wr_content", "char_count"));
						if (char_min > 0 && char_min > cnt) {
								alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
								return false;
						}
						else if (char_max > 0 && char_max < cnt) {
								alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
								return false;
						}
				}
		}

		<?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

		document.getElementById("btn_submit").disabled = "disabled";

		return true;
}
</script>
