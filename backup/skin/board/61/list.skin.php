<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<link rel="stylesheet" href="<?=$board_skin_url?>/style.css" type="text/css">
<!-- 게시판 목록 시작 -->
<div class="total_board_list_wrap" style="width:<?=$width?>px;">
	<?
	if($board[bo_3]){
	$latest_option = explode("/", $board[bo_3]);
	if(!$latest_option[3]) $latest_option[3] = "";
	echo latest_option($latest_option[0] , $bo_table , $latest_option[1] , $latest_option[2], $latest_option[3] );
	}
	?>
	<? if ($is_category) { 
		$category = explode("|", $board[bo_category_list]);
		if($board[bo_1]=="tab" || $board[bo_1]==""){?>
		
		<div class="board_category_tab">
			<?php if ($is_category) { ?>
			  <nav id="bo_cate">
					 <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
					   <ul id="bo_cate_ul">
					   <?php echo $category_option ?>
					  </ul>
			 </nav>
		 <?php } ?>
			</div> 
		<!---->
		<?}
		if($board[bo_1]=="select"){	
		?>
		<div class="board_category_select">
        <form name="fcategory" method="get" style="margin:0px;">
				<select name=sca onchange="location='<?=$category_href?>&sca='+<?=strtolower($g4[charset])=='utf-8' ? "encodeURIComponent(this.value)" : "this.value"?>;">
				<option value=''>전체</option>
				<?for ($i=0; $i<count($categories); $i++) {?>
					<option value="<?=$categories[$i]?>"><?=$categories[$i]?></option>
				<?}?>
				</select>
        </form>
		</div>
		<?}
		if($board[bo_1]=="list"){	
		?>
		<div class="board_category_list">
			<a href='board.php?bo_table=<?=$bo_table?>' <?=$sca?"":"class='thisList'"?>><span>전체</span></a>
			<? for ($i=0; $i<count($category); $i++){
				$this_style='';
				 if($sca && $category[$i]==$sca)$this_style="class='thisList'"
			?>
			<a href='<?=$category_href?>&sca=<?=urlencode($category[$i])?>' <?=$this_style?>><span><?=$category[$i]?></span></a>
			<?}?>
		</div>
		<?}?>
	<?}?>
    <div class="board_top">
            <!-- <img src="<?=$board_skin_path?>/img/icon_total.gif" align="absmiddle"> -->
            <!-- <span style="color:#888888; font-weight:bold;">Total <?=number_format($total_count)?></span> -->
            <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' align="absmiddle"></a><?}?>
	</div>

    <!-- 제목 -->
    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
    <input type="hidden" name="btn_submit" id="btn_submit" value="">
	<?
	$list_style = "list";
	if($board[bo_2])$list_style = $board[bo_2];
	include_once("$board_skin_path/list.".$list_style.".skin.php");
	?>
    </form>

	<?if($write_pages){?>
	<div class="board_page">
		<?=$write_pages?>
	</div>
	<?}?>

    <div class="board_button">
		<? if ($admin_href) { ?>
		<a href="<?=$admin_href?>">관리자</a>
		<?}?>
        <? if ($list_href) { ?>
       <!-- <a href="<?=$list_href?>">목록</a> --> 
        <? } ?>
        <? if ($is_checkbox) { ?>
        <a href="#null" onclick="document.pressed='선택삭제';$('#btn_submit').val('선택삭제');$('#fboardlist').submit();">선택삭제</a>
        <a href="#null" onclick="document.pressed='선택복사';$('#btn_submit').val('선택복사');$('#fboardlist').submit();">선택복사</a>
        <a href="#null" onclick="document.pressed='선택이동';$('#btn_submit').val('선택이동');$('#fboardlist').submit();">선택이동</a>
        <? } ?>
        <? if ($write_href) { ?>
		<a href="<?=$write_href?>" class="newb">새글쓰기</a>
		<? } ?>
    </div>
    <!-- 검색 -->
    <div class="board_search" style="display:none;">
        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?=$bo_table?>">
        <input type="hidden" name="sca"      value="<?=$sca?>">
		<table cellspacing="6" cellpadding="0" >
		<tr>
			<td><select name="sfl" class="selectbox">
            <option value="wr_subject">제목</option>
            <option value="wr_content">내용</option>
            <option value="wr_subject||wr_content">제목+내용</option>
            <option value="mb_id,1">회원아이디</option>
            <option value="mb_id,0">회원아이디(코)</option>
            <option value="wr_name,1">글쓴이</option>
            <option value="wr_name,0">글쓴이(코)</option>
        </select></td>
			<td><input name="stx" class="inputbox" style="width:120px;" maxlength="15" itemname="검색어" required value='<?=stripslashes($stx)?>'></td>
			<td><input type='submit' class="bs_btn" border=0 accesskey='s' value="확인"></td>
			<td style="display:none;"><input type="radio" name="sop" value="and"> and
        <input type="radio" name="sop" value="or"> or</td>
		</tr>
		</table>
        </form>
    </div>

</div><!-- total_board_list_wrap 게시판전체틀끝 -->

<script type="text/javascript">
<? if ($is_member) { ?>
if ('<?=$sca?>' && "<?=$board[bo_1]?>"=="select") document.fcategory.sca.value = '<?=$sca?>';
if ('<?=$stx?>') {
    document.fsearch.sfl.value = '<?=$sfl?>';

    if ('<?=$sop?>' == 'and') 
        document.fsearch.sop[0].checked = true;

    if ('<?=$sop?>' == 'or')
        document.fsearch.sop[1].checked = true;
} else {
    document.fsearch.sop[0].checked = true;
}
<?}?>
</script>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}

// 선택한 게시물 복사 및 이동
function select_order(sw) {
    var f = document.fboardlist;

    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert("정렬할 게시물을 하나 이상 선택하세요.");
        return false;
    }
        str = "정렬";

		 if (!confirm("선택한 게시물을 정렬저장 하시겠습니까?\n\n"))
        return;

		f.action = "./order.php";
    f.submit();
}

</script>
<?php } ?>
<!-- 게시판 목록 끝 -->