<div class="tbl_head01 tbl_wrap">
	<table>
	<thead>
	<tr>
			<?php if ($is_checkbox) { ?>
			<th scope="col">
					<label for="chkall">현재 페이지 게시물 전체</label>
					<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
			</th>
			<?php } ?>
			<th scope="col">제목</th>
			<th scope="col" class="date111time"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜</a></th>
	</tr>
	</thead>
	<tbody>
	<?php
	for ($i=0; $i<count($list); $i++) {
	?>
	<tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
			<?php if ($is_checkbox) { ?>
			
			<td class="td_chk">
					<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
					<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
			</td><?php } ?><!--공지사항-->


			<td class="td_subject">
					<?php
					echo $list[$i]['icon_reply'];
					if ($is_category && $list[$i]['ca_name']) {
					?>
					<!-- <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"> -->[<?php echo $list[$i]['ca_name'] ?>]<!-- </a> -->
					<?php } ?>

					<a href="<?php echo $list[$i]['href'] ?>">
							<?php echo $list[$i]['subject'] ?>
							<?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
							<?php
							// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
							// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

							//if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
							//if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
							//if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
							//if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
							//if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];

							?><!-- 본문내용 -->
							<td class="td_date"><?php echo $list[$i]['datetime2'] ?></td>
					</a>

			</td>
		 
	</tr>
	<?php } ?>
	<?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">No Post</td></tr>'; } ?>
	</tbody>
	</table>
</div>