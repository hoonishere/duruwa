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
			<td><input class='inputbox' maxlength=20 name=wr_name itemname="이름" required value="<?=$name?>"></td>
			<th>패스워드</th>
			<td><input class='inputbox' type=password maxlength=20 name=wr_password itemname="패스워드" <?=$password_required?>></td>
			</tr>
	</table>
	<?}?>
	<div class="wr_subject"></div>
	<table class="guest_table">
		<colgroup>
			<col width="120px" />
			<col />
		</colgroup>
		<tr>
			<th>페이지제목</th>
			<td><input class='inputbox required' maxlength=20 name="wr_1" title="페이지코드" value="<?=$write[wr_1]?>"></td>
			</tr>
		<tr>
			<th>페이지코드</th>
			<td><input class='subject_inputbox required' name="wr_subject" id="wr_subject" title="제목" value="<?=$subject?>"></td>
			</tr>
	</table>
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
		<tr>
			<th>옵션</th>
			<td colspan=3><? if ($is_category) { ?><select class="selectbox" id="ca_name" name=ca_name required itemname="분류"><option value="">선택하세요<?=$category_option?></select><? } ?><?=$option?>
			<script>$("#ca_name").val("<?=$write[ca_name]?>");</script>
			</td></tr>
		

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
		<? if ($is_file) { ?>
		<tr>
			<th valgin="middle" style="vertical-align:middle;">
			<span style="display:inline-block;vertical-align:middle;">
			파일첨부
			</span>
			<span style="display:inline-block;">
			<img src="<?=$board_skin_url?>/img/btn_file_add.gif" onclick="add_file();" style="cursor:pointer;display:inline-block;vertical-align:middle;" ><img src="<?=$board_skin_url?>/img/btn_file_minus.gif" onclick="del_file();" style="cursor:pointer;display:inline-block;vertical-align:middle;" >
			<span>
			</th>
			<td colspan=3><table id="variableFiles" cellpadding=0 cellspacing=0></table></td>
		</tr>
		<? } ?>
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




<? if ($is_file) { ?>
<script type="text/javascript">
        var flen = 0;
        function add_file(delete_code)
        {
            var upload_count = <?=(int)$file_count?>;
            if (upload_count && flen >= upload_count)
            {
                alert("이 게시판은 "+upload_count+"개 까지만 파일 업로드가 가능합니다.");
                return;
            }

            var objTbl;
            var objRow;
            var objCell;
            if (document.getElementById)
                objTbl = document.getElementById("variableFiles");
            else
                objTbl = document.all["variableFiles"];

            objRow = objTbl.insertRow(objTbl.rows.length);
            objCell = objRow.insertCell(0);

            objCell.innerHTML = "<input type='file' class='ed' name='bf_file[]' title='파일 용량 <?=$upload_max_filesize?> 이하만 업로드 가능'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class='ed' size=50 name='bf_content[]' title='업로드 이미지 파일에 해당 되는 내용을 입력하세요.'>";
                <? } ?>
                ;
            }

            flen++;
        }

        <?=$file_script; //수정시에 필요한 스크립트?>

        function del_file()
        {
            // file_length 이하로는 필드가 삭제되지 않아야 합니다.
            var file_length = <?=(int)$file_length?>;
            var objTbl = document.getElementById("variableFiles");
            if (objTbl.rows.length - 1 > file_length)
            {
                objTbl.deleteRow(objTbl.rows.length - 1);
                flen--;
            }
        }
        </script>
<?}?>
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
