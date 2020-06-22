<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
 <link rel="stylesheet" href="<?=$board_skin_url?>/style.css" type="text/css">
 <script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<?
// 파일 첨부 및 링크 주소 가 있는지 없는지 체크여부
$wflag = false;

for ($i=0; $i<count($view[file]); $i++) {
	if ($view[file][$i][source] && !$view[file][$i][view]) {
		$wflag = true;
	}
}

for ($i=1; $i<=G5_LINK_COUNT; $i++) {
	if ($view[link][$i]) {
		$wflag = true;
	}
}
?>


<div id="bo_v_table"><?php echo $board['bo_subject']; ?></div>
<!-- 게시글 보기 시작 -->
<div class="total_board_view_wrap board_table" style="width:<?=$width?>px;">


<ul class="write_info">
		<li class="info_name"><?=$view[name]?><? if ($is_ip_view) { echo " <em>( IP: $ip )</em>"; } ?></li>
		<li class="info_date"><?=date("y-m-d H:i", strtotime($view[wr_datetime]))?></li>
		<? if ($scrap_href) { ?><li class="info_scrap"><a href="javascript:;" onclick="win_scrap('<?=$scrap_href?>');">Scrap</a></li><?}?>
		<? if ($trackback_url) { ?><li class="info_trackback"><a href="javascript:trackback_send_server('<?=$trackback_url?>');">Trackback</a></li><?}?>

		<li class="info_hit"><?=number_format($view[wr_hit])?></li>
		<? if ($is_good) { ?><li class="info_good"><?=number_format($view[wr_good])?></li><? } ?>
		<? if ($is_nogood) { ?><li class="info_nogood"><?=number_format($view[wr_nogood])?></li><? } ?>
	</ul>
	<h3 class="subject"><? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?> <?=cut_hangul_last(get_text($view[wr_subject]))?>
	<?php if(number_format($view['wr_comment']) > 0){ echo "(".number_format($view['wr_comment']).")"; }?>
	</h3>
	<br>
	<!-- 내용 출력 -->
	<!-- 본문 내용 시작 { -->
	<div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
	<?php//echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
	<!-- } 본문 내용 끝 -->

	<? if($board[bo_2] != "movie"){?>
	<?if( $wflag ){?>
	<div class="fileLink">
		<ul class="info_file">
			<?
			// 가변 파일
			for ($i=0; $i<count($view[file]); $i++) {
				if ($view[file][$i][source] && !$view[file][$i][view]) {
					echo "<li>";
					echo "<a href=\"{$view['file'][$i]['href']}\" title='{$view[file][$i][content]}' class='view_file_download'>";
					echo "{$view[file][$i][source]} ";
					echo "<span class='file_size'>({$view[file][$i][size]})</span>";
					echo "<span class='file_hit'>[{$view[file][$i][download]}]</span>";
					echo "</a></li>";
				}
			}
			?>
		</ul>
		<ol class="info_link">
			<?
			// 링크
			for ($i=1; $i<=G5_LINK_COUNT; $i++) {
				if ($view[link][$i]) {
					$link = cut_str($view[link][$i], 70);
					echo "<li>";
					echo "<a href='{$view[link_href][$i]}' target=_blank>";
					echo "{$link}";
					echo "<span class='link_hit'>[{$view[link_hit][$i]}]</span>";
					echo "</a></li>";
				}
			}
			?> 
		</ol>
	</div>
	<?}?>
	<?}?>
	<? if($board[bo_2] == "movie"){
		if($view[wr_link1]){
		?>
	<div class="movie_box"><?=$view[wr_link1]?></div>
	<?}
	}else{?>
	<div class="view_image">
		<h2 id="bo_v_atc_title">본문</h2>

		<?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\">\n";

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
	<?}?>
	<br><br>
	

	<?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>


<!-- 스크랩 추천 비추천 시작 { -->
<?php if ($scrap_href || $good_href || $nogood_href) { ?>
<div id="bo_v_act">
		<?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="btn_b01" onclick="win_scrap(this.href); return false;">스크랩</a><?php } ?>
		<?php if ($good_href) { ?>
		<span class="bo_v_act_gng">
				<a href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="btn_b01">추천 <strong><?php echo number_format($view['wr_good']) ?></strong></a>
				<b id="bo_v_act_good"></b>
		</span>
		<?php } ?>
		<?php if ($nogood_href) { ?>
		<span class="bo_v_act_gng">
				<a href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="btn_b01">비추천  <strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
				<b id="bo_v_act_nogood"></b>
		</span>
		<?php } ?>
</div>
<?php } else {
		if($board['bo_use_good'] || $board['bo_use_nogood']) {
?>
<div id="bo_v_act">
		<?php if($board['bo_use_good']) { ?><span>추천 <strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
		<?php if($board['bo_use_nogood']) { ?><span>비추천 <strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
</div>
<?php
		}
}
?>
	

<?php
include_once(G5_SNS_PATH."/view.sns.skin.php");
?>

<? 
    ob_start(); 
?>


<div class="view_btn">
<!--     <div style="float:left;">
    <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    </div>
 -->
    <!-- 링크 버튼 -->
    <div style="float:right;">
    <? if ($copy_href) { echo "<a href=\"$copy_href\" onclick=\"board_move(this.href); return false;\">복사</a> "; } ?>
    <? if ($move_href) { echo "<a href=\"$move_href\" onclick=\"board_move(this.href); return false;\">이동</a> "; } ?>

    <? if ($search_href) { echo "<a href=\"$search_href\">검색목록</a> "; } ?>
    <? echo "<a href=\"$list_href\">목록</a> "; ?>
    <? if ($update_href) { echo "<a href=\"$update_href\">수정</a> "; } ?>
    <? if ($delete_href) { echo "<a href=\"$delete_href\" onclick=\"del(this.href); return false;\">삭제</a> "; } ?>
    <? if ($reply_href) { echo "<a href=\"$reply_href\">답변</a> "; } ?>
    <? if ($write_href) { echo "<a href=\"$write_href\" class=\"newb\">새글쓰기</a> "; } ?>
    </div>
</div>

<div class="view_btn_ne_pr">
		<? if ($prev_href) {?>
			<div>
			<span> 이전글</span><a href="<?=$prev_href?>" title="<?=$prev_wr_subject?>"><?=$prev[ca_name]?" [$prev[ca_name]] ":""?> <?=$prev_wr_subject?></a> 
			</div>
		<?}?>
		<? if ($next_href) {?>
			<div>
			<span>다음글</span><a href="<?=$next_href?>" title="<?=$next_wr_subject?>"><?=$next[ca_name]?" [$next[ca_name]] ":""?> <?=$next_wr_subject?></a>
			</div>
		<?}?>
</div>
<?
	$link_buttons = ob_get_contents();
	ob_end_flush();

// 코멘트 권한이 없을경우 아예 안보여주기
// 코멘트 입출력
include_once("./view_comment.php");
?>
</div><!-- total_board_view_wrap 게시판전체틀끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->