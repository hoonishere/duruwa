<?
include_once("./_common.php");
include_once(G5_PATH."/head.sub.php");
include_once(G5_LIB_PATH."/thumbnail.lib.php");

// 글이 없을 경우 해당 게시판 목록으로 이동
if (!$write['wr_id']) {
		$msg = '글이 존재하지 않습니다.\\n\\n글이 삭제되었거나 이동된 경우입니다.';
		alert_close($msg, './board.php?bo_table='.$bo_table);
}

// 그룹접근 사용
if (isset($group['gr_use_access']) && $group['gr_use_access']) {
		if ($is_guest) {
				$msg = "비회원은 이 게시판에 접근할 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.";
				alert_close($msg, './login.php?wr_id='.$wr_id.$qstr.'&amp;url='.urlencode(G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.$qstr));
		}

		// 그룹관리자 이상이라면 통과
		if ($is_admin == "super" || $is_admin == "group") {
				;
		} else {
				// 그룹접근
				$sql = " select count(*) as cnt from {$g5['group_member_table']} where gr_id = '{$board['gr_id']}' and mb_id = '{$member['mb_id']}' ";
				$row = sql_fetch($sql);
				if (!$row['cnt']) {
						alert_close("접근 권한이 없으므로 글읽기가 불가합니다.\\n\\n궁금하신 사항은 관리자에게 문의 바랍니다.", G5_URL);
				}
		}
}

// 로그인된 회원의 권한이 설정된 읽기 권한보다 작다면
if ($member['mb_level'] < $board['bo_read_level']) {
		if ($is_member)
				alert_close('글을 읽을 권한이 없습니다.', G5_URL);
		else
				alert_close('글을 읽을 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.', './login.php?wr_id='.$wr_id.$qstr.'&amp;url='.urlencode(G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.$qstr));
}

$view = get_view($write, $board, $board_skin_path);
if (strstr($view['wr_option'], 'html1'))
    $html = 1;
else if (strstr($view['wr_option'], 'html2'))
    $html = 2;

$view['content'] = conv_content($view['wr_content'], $html);
if (strstr($sfl, 'content'))
    $view['content'] = search_font($stx, $view['content']);
?>
<style>
.prnit_wrap	{padding:10px 15px;}
.post_tit{position:relative}
.post_tit .bu{display:block;overflow:hidden;position:absolute;top:0;left:0;width:40px;height:5px;background:#383838}
.post_tit h2{margin:0;padding:33px 0 0}
.post_tit h2 img,.post_tit category img{display:block}
/* .post_tit .category{display:block;padding:18px 0 57px} */
.post_tit .category{display:block;padding:0 0 57px}

.write_info {
    position: relative;
    width: 100%;
    padding-top: 13px;
		margin-top:20px;
    border-top: 2px solid #d9d9d9;
    background: #fff;
    font-size: 11px;
    zoom: 1;
}
</style>
<script>
$(function(){
	window.print();
});
</script>
<div class="prnit_wrap">
<div class="post_tit">
	<span class="bu"></span>
    <h2><?=$view[wr_subject]?></h2>
	<span class="category"></span>
</div>
<div class="cont">
<div class="view_image">
		<?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count && $board[bo_2] != "movie") { //사진이 있으면서 무비가 아니라면
            echo "<div id=\"bo_v_img\" >\n";

            for ($i=0; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
                    echo get_view_thumbnail($view['file'][$i]['view']);
                }
            }

            echo "</div>\n";
        }
         ?>
	</div>
	<!-- 내용 출력 -->
	<!-- 본문 내용 시작 { -->
	<div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
</div>
<div class="write_info">발행일 : <?=$view[datetime]?> | 글쓴이 : <?=$view[name]?></div>
</div>
<?
include_once(G5_PATH."/tail.sub.php");
?>