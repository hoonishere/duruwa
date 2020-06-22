<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include_once $board_skin_path."/board_head.skin.php";
?>
<link rel="stylesheet" href="<?php echo $board_skin_url ?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $board_skin_url ?>/css/lightbox.css" media="screen" />

<?php if (!$wr_id) { ?><div id="container_title" class="no_text_resize"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></div><?php } ?>

<div class="sub_con">

	<div class="history_div mt55">
    <form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

		<!-- 게시판 목록 시작 -->
		<?
		$sql = "SELECT * FROM $write_table ORDER BY wr_subject $board[bo_4], wr_1, wr_2 ";

		$result=sql_query($sql);
		$num_rows = mysql_num_rows($result);
		$count = 0;
		while($data=sql_fetch_array($result)) {
			
			$count++;
			$hList[]=$data;	

			if($preYear != $data[wr_subject]) {
				$preYear = $data[wr_subject];



					if($count > 1) {
						$cicle_img = '<div class="year_body"><span>'.$data[wr_subject].'</span></div>';
					}elseif($count == 1){
						$cicle_img = '<div class="year_body first"><span>'.$data[wr_subject].'</span></div>';
					}

				echo '				<div class="p_box '.$margin_top.'">';
				echo '					<div class="history_img">'.$cicle_img.'</div>';
				echo '					<div class="history_txt">';


				$tmp_write_table = $g5['write_prefix'] . $board['bo_table']; // 게시판 테이블 전체이름
				$sql_detail = " select * from {$tmp_write_table} where wr_subject = {$data[wr_subject]} order by wr_subject $board[bo_4], wr_1, wr_2 ";
				$result_detail = sql_query($sql_detail);
				$history_icon = '';
				
				for ($i=0; $hList = sql_fetch_array($result_detail); $i++) {
					if($i == 0) {
						 if($i > -1) $margin_top = "mt30";
						echo '<div class="tit">';
						echo '	<h4>'.$hList[wr_subject].'</h4>';
						echo '	<div class="bar"></div>';
						echo '</div>';
					}
					$disp_month = $hList[wr_1];
					$disp_day = $hList[wr_2];
					if($board[bo_3]=="d") {
						$display = $disp_month.".".$disp_day." ";
					}else{
						$display = $disp_month.". ";
					}

					echo '<p class="mt5">';
					if($is_admin || $is_checkbox) echo '<input type="checkbox" name="chk_wr_id[]" value="'.$hList[wr_id].'" title="'.$hList[wr_subject].'"> ';

					if($is_admin) {
						echo ' <a href="'.G5_BBS_URL.'/write.php?bo_table='.$bo_table.'&w=u&wr_id='.$hList[wr_id].'">';
					}

					echo $display.nl2br($hList[wr_content]);
					if ($is_admin)
					{
						set_session("ss_delete_token", $token = uniqid(time()));
						$delete_href ='./delete_all.php?bo_table='.$bo_table.'&amp;wr_id='.$hList[wr_id];
						echo ' </a> ';
						echo '<a href="javascript:del(\''.$delete_href.'\');"><img src="'.$board_skin_url.'/img/btn_close.gif" alt="Delete" width="15px" height="14px" /></a>';
					}	
					echo '</p>';

					$thumb = get_list_thumbnail($bo_table, $hList['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
					$sql = " select bf_file, bf_content from {$g5['board_file_table']}
								where bo_table = '$bo_table' and wr_id = '$hList[wr_id]' and bf_type between '1' and '3' order by bf_no limit 0, 1 ";
					$row = sql_fetch($sql);

					if($thumb['src']) {
						$history_icon .= '<div class="history_icon">';
						$history_icon .= '<strong>'.$hList[wr_subject].'</strong>';
						$history_icon .= '<p class="tit">'.$thumb['alt'].'</p>';
						$history_icon .= '<p class="mt5"><a href="'.G5_DATA_URL.'/file/'.$bo_table.'/'.$row['bf_file'].'" data-lightbox="history-image-set" class="light-box-image"><img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'"></a></p>';
						$history_icon .= '</div>';
					}

				}
				echo '					</div>';
				echo $history_icon;
				echo '				</div>';
			}
		}

		?>
		<div class="p_box">
			<div class="history_img"><img src="<?=$board_skin_url?>/img/history_start.gif" style="position:absolute;bottom:0;left:83px;" alt="history_start"></div>
			<div class="history_txt">
			</div>
		</div>


	</div>

	<div class="mt40"></div>


    <?php if ($is_admin || $list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
	</form>



<!-- 페이지 -->
<?php //echo $write_pages;  ?>

<!-- 게시판 검색 시작 { 
<fieldset id="bo_sch">
    <legend>게시물 검색</legend>

    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
        <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required  class="frm_input required" size="15" maxlength="15">
    <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset>
<!-- } 게시판 검색 끝 -->


</div>




	<script type="text/javascript">
	var num = 0;
		jQuery(document).ready(function(){
			jQuery(".history_img").animate({opacity:0, marginTop:"-200px"}, 0);
			jQuery(".history_txt").animate({opacity:0, marginTop:"-50px"}, 0);
				$(".history_icon").animate({opacity:0, marginTop:"-50px"}, 0);
		})
		
		jQuery(window).load(function(){
			jQuery(".history_img").each(function(index){
				jQuery.easing.def = "easeOutQuart";
				num++;
				jQuery(".history_img").eq(index).delay((450 * num)).animate({opacity:1, marginTop:"0px"}, 900);
				jQuery(".history_txt").eq(index).delay((650 * num)).animate({opacity:1, marginTop:"0px"}, 900);
					$(".history_icon").eq(index).delay((650 * num)).animate({opacity:1, marginTop:"0px"}, 600);
			})
		})
	</script>
<script type="text/javascript">
if ('<?=$sca?>') document.fcategory.sca.value = '<?=$sca?>';
if ('<?=$stx?>') {
    document.fsearch.sfl.value = '<?=$sfl?>';

    if ('<?=$sop?>' == 'and') 
        document.fsearch.sop[0].checked = true;

    if ('<?=$sop?>' == 'or')
        document.fsearch.sop[1].checked = true;
} else {
    document.fsearch.sop[0].checked = true;
}
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
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다"))
            return false;
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
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
<script type="text/javascript" src="<?php echo $board_skin_url ?>/js/lightbox-2.6.min.js"></script>
 