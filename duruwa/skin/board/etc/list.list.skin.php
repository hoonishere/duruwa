<?
$colspan = 5;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

?>
    <table cellspacing="0" cellpadding="0" class="board_list">
		<col width="50" />
		<? if ($is_checkbox) { ?><col width="20" /><? } ?>
		<col />
		<col width="110" />
		<col width="70" />
		<col width="50" />
		<? if ($is_good) { ?><col width="40" /><? } ?>
		<? if ($is_nogood) { ?><col width="40" /><? } ?>
    <tr>
        <th>번호</th>
        <? if ($is_checkbox) { ?><th><input onclick="if (this.checked) all_checked(true); else all_checked(false);" type="checkbox"></th><?}?>
        <th>제&nbsp;&nbsp;&nbsp;목</th>
        <th>글쓴이</th>
        <th><?=subject_sort_link('wr_datetime', $qstr2, 1)?>날짜</a></th>
        <th><?=subject_sort_link('wr_hit', $qstr2, 1)?>조회</a></th>
        <? if ($is_good) { ?><th><?=subject_sort_link('wr_good', $qstr2, 1)?>추천</a></th><?}?>
        <? if ($is_nogood) { ?><th><?=subject_sort_link('wr_nogood', $qstr2, 1)?>비추</a></th><?}?>
    </tr>
    <? for ($i=0; $i<count($list); $i++) { ?>
    <tr> 
        <td class="num">
            <?php
            if ($list[$i]['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list[$i]['wr_id'])
                echo "<span class=\"bo_current\">{$list[$i]['num']}</span>";
            else
                echo $list[$i]['num'];
             ?>
        </td>
        <? if ($is_checkbox) { ?><td class="checkbox"><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
        <td class="subject">
            <?php
                echo $list[$i]['icon_reply'];
                if ($is_category && $list[$i]['ca_name']) {
                 ?>
                <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link">[<?php echo $list[$i]['ca_name'] ?>]</a>
                <?php } ?>

                <a href="<?php echo $list[$i]['href'] ?>">
                    <?php echo $list[$i]['wr_1'] ?>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
                </a>

                <?php
                // if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
                // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

                if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
                if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
                if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
                if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];

                 ?>
        </td>
        <td class="name"><?=$list[$i][name]?></td>
        <td class="datetime"><?=date("y-m-d", strtotime($list[$i][wr_datetime]))?></td>
        <td class="hit"><?=$list[$i][wr_hit]?></td>
        <? if ($is_good) { ?><td class="good"><?=$list[$i][wr_good]?></td><? } ?>
        <? if ($is_nogood) { ?><td class="nogood"><?=$list[$i][wr_nogood]?></td><? } ?>
    </tr>
    <? } // end for ?>

    <? if (count($list) == 0) { echo "<tr><td colspan='$colspan' style='line-height:120px; text-align:center;'>게시물이 없습니다.</td></tr>"; } ?>

    </table>
