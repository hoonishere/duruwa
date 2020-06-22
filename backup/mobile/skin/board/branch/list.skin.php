<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 2;

if ($is_checkbox) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style_branch.css">', 1);
add_javascript('<script src="'.$board_skin_url.'/js/raphael_min.js"></script>', 1);
add_javascript('<script src="'.$board_skin_url.'/js/raphael_path_s.korea.js"></script>', 2);

?>
<style>
.m_s2											{margin:20px 0;}
.m_s2_t										{margin-bottom:20px;}
.m_s2_t table							{width:100%; border-top:1px solid #333;}
.m_s2_t tr th							{border-bottom:1px solid #aaa; text-align:center; padding:5px 10px; font-size:1em; height:40px;}
.m_s2_t tr td:first-child	{border-right:1px solid #eee;}
.m_s2_t tr td							{border-bottom:1px solid #d7d7d7; padding:0.7rem 1rem; text-align:left; line-height:1.5rem;font-size:1.1rem; position:relative;}

.m_s2_t tr td a						{line-height:20px; color:#000; text-decoration:none;}
.m_s2_t tr td	.btn_ab	{position:absolute; top:25%; right:3%; font-size:1.5rem;}
.m_s2_t tr td a img		{width:20px; margin:0 0 0 8px;}

@media (max-width:419px){
.add_block	{display:block; }
.m_s2_t tr td:nth-of-type(2)	.btn_ab	{top:30%;}
}
input.btn_b02 {display:inline-block;margin:0 0 3px;padding:8px 7px 7px;border:1px solid #666;background:#6c6c6c;color:#fff;text-decoration:none;vertical-align:middle}
input.btn_b02:focus, .btn_b02:hover {text-decoration:none}


/* Extra Small Devices, .visible-xs-* */
@media (max-width: 767px) {
	.map_bg{display:none;}
	#bo_cate	{display:block;}
}

/* Small Devices, .visible-sm-* */
@media (min-width: 768px) and (max-width: 991px) {
	.map_bg{display:none;}
	#bo_cate	{display:block;}
	
}

/* Medium Devices, .visible-md-* */
@media (min-width: 992px) and (max-width: 1199px) {
	#bo_cate	{display:none;}
}

/* Large Devices, .visible-lg-* */
@media (min-width: 1200px) {
	#bo_cate	{display:none;}
}


</style>
<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>

<!-- 게시판 목록 시작 -->
<div id="bo_list<?php if ($is_admin) echo "_admin"; ?>">
	
	<div class="map_bg">
    <div id="canvas">
	    <div id="south"></div>
	    <div id="loc_01" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=서울">서울</a></h4></div>
	    <div id="loc_02" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=부산">부산</a></h4></div>
	    <div id="loc_03" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=대구">대구</a></h4></div>
	    <div id="loc_04" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=인천">인천</a></h4></div>
	    <div id="loc_05" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=광주">광주</a></h4></div>
	    <div id="loc_06" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=대전">대전</a></h4></div>
	    <div id="loc_07" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=울산">울산</a></h4></div>
	    <div id="loc_08" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=세종">세종</a></h4></div>
	    <div id="loc_09" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=경기도">경기도</a></h4></div>
	    <div id="loc_10" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=강원도">강원도</a></h4></div>
	    <div id="loc_11" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=충청북도">충청북도</a></h4></div>
	    <div id="loc_12" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=충청남도">충청남도</a></h4></div>
	    <div id="loc_13" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=전라북도">전라북도</a></h4></div>
	    <div id="loc_14" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=전라남도">전라남도</a></h4></div>
	    <div id="loc_15" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=경상북도">경상북도</a></h4></div>
	    <div id="loc_16" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=경상남도">경상남도</a></h4></div>
	    <div id="loc_17" class="loc_div"><h4><a href="<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca=제주도">제주도</a></h4></div>
    </div>
    <div id="map_right_wrapper">
        <!-- 게시판 검색 시작 { -->
        <fieldset id="bo_sch" style="display:none;">
	        <p>주소,지점명 검색</p>
            <legend>게시물 검색</legend>
        </fieldset>
        <!-- } 게시판 검색 끝 -->
        <div class="tit_category"><!-- <span class="tit">매장찾기</span><span class="cont"> 매장을 검색해주세요.</span> --></div>
        <!-- 게시판 카테고리 시작 { -->
        <?php if ($is_category) { ?>
        <nav id="bo_cate2">
        <!-- <h2><?php echo $board['bo_subject'] ?> 카테고리</h2> -->
        <div>
					<form name="fsearch" method="get">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
            <input type="hidden" name="sop" value="and">
            <label for="sfl" class="sound_only">검색대상</label>
            <select name="sfl" id="sfl" style="display:none;">
                <option value="wr_subject||wr_content||wr_1||wr_2" <?php echo get_selected($sfl, 'wr_subject', true); ?>>지점명</option>
            </select>
            <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
            
					<div id="select_box" style="">
						<select name="sca" id="sca2" class="form-control" style="margin:0; width:100%; border:1px solid #999;" onchange="location.href='<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca='+encodeURIComponent(this.value);">
							<option value="">전체지역</option>
							<?
								$categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음
								for ($i=0; $i<count($categories); $i++) {
							?>
							<option value="<?=$categories[$i]?>" style="font-size:1.2rem;"><?=$categories[$i]?></option>
							<?}?>
							</select>
							<script>$("#sca2").val("<?=$_GET[sca]?>")</script>
					</div>
					
					<div style="clear:both;"></div>
					<div style="margin-top:10px;">
						<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" class="inputbox2" size="15" style="width:100%;" maxlength="15" placeholder="매장명을 입력하세요.">
					</div>
					<div style="margin-top:10px;">
						<input type="submit" class="btn_b02" style="width:100%;"value="검색">
					</div>
					</form>
				</div>
        </nav>
        <?php } ?>
        <!-- } 게시판 카테고리 끝 -->
    </div>
    <div style="clear:both;"></div>
	</div>

    <div class="bo_fx">
        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
<?php if ($is_category) { ?>
<nav id="bo_cate" >
<select name="sca" id="sca" class="form-control" onchange="location.href='<?=G5_URL?>/bbs/board.php?bo_table=<?=$bo_table?>&sca='+encodeURIComponent(this.value);">
<option value="">전체지역</option>
<?
	$categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음
	for ($i=0; $i<count($categories); $i++) {
?>
<option value="<?=$categories[$i]?>" style="font-size:1.2rem;"><?=$categories[$i]?></option>
<?}?>
</select>
<script>$("#sca").val("<?=$_GET[sca]?>")</script>
</nav>
<?php } ?>
    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

<div class="m_s2_t">
	<table cellpadding="0" border="0" >
		<colgroup>
			<col width="100%">
			<!-- <col width="40%"> -->
		</colgroup>
		<tbody>
			<tr>
				<th><?php if ($is_checkbox) { ?>
                <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            <?php } ?>대리점</th>
				<!-- <th>Tel</th> -->
			</tr>

<!-- 관리되어야할 곳 시작 -->
<?php
        for ($i=0; $i<count($list); $i++) {
        ?>
			<tr>
				<td>
						<?php if ($is_checkbox) { ?>
							<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
							<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
						<?php } ?>

						<?if($member[mb_level]>8){?> <a href="<?php echo $list[$i]['href'] ?>"><?}?><span style="font-size:1em; color:#000; font-weight:600;">[<?=$list[$i][wr_subject]?>]</span><?if($member[mb_level]>8){?></a><?}?><!-- tab -->
						<span class="add_block"><?=$list[$i][wr_1]?></span><a href="<?=set_http($list[$i][wr_link1])?>" target="_blank"><!-- <img src="<?=G5_URL?>/img/s2_v.png"> --><i class="fa fa-map-marker btn_ab"></i></a>
				</td>
				<!-- <td>
					<a href="tel:<?=$list[$i][wr_2]?>"><?=$list[$i][wr_2]?> <i class="fa fa-phone btn_ab"></i></a>
				</td> -->
			</tr>
			<?}?>
			<?if(count($list) == 0){?>
			<tr>
			<td colspan="2" style="text-align:center;height:25px;line-height:25px;">등록된 데이터가 없습니다.</td>
			</tr>
			<?}?>
		</tbody>
	</table>
</div>


    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <ul class="btn_bo_adm">
            <?php if ($list_href) { ?>
            <li><a href="<?php echo $list_href ?>" class="btn_b01"> 목록</a></li>
            <?php } ?>
            <?php if ($is_checkbox) { ?>
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></li>
            <?php } ?>
        </ul>
        <ul class="btn_bo_user">
            <li><?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a><?php } ?></li>
        </ul>
    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages; ?>

<fieldset id="bo_sch">
    <legend>게시물 검색</legend>

    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
        <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
    </select>
    <input name="stx" value="<?php echo stripslashes($stx) ?>" placeholder="검색어(필수)" required id="stx" class="required frm_input" size="15" maxlength="20">
    <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset>

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

    if (sw == 'copy')
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
<!-- 게시판 목록 끝 -->
