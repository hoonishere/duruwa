
<div class="tbl_head01 tbl_wrap">
	<table>
	<thead>
	<tr>
			<?php if ($is_checkbox) { ?>
			<th scope="col" class="hidden-xs">
					<label for="chkall">현재 페이지 게시물 전체</label>
					<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
			</th>
			<?php } ?>
			<th scope="col" class="hidden-xs">제목</th>
			<th scope="col" class="hidden-xs">작성자</th>
			<th scope="col" class="hidden-xs"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜</a></th>
			<th scope="col" class="hidden-xs ">조회</th>
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
			</td><?php } ?>
			<td class="td_subject">
			
					<?php
					echo $list[$i]['icon_reply'];
					if ($is_category && $list[$i]['ca_name']) {
					?>
					<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
					<?php } ?>

					<a href="<?php echo $list[$i]['href'] ?>">
					<?=$img_content;?>
							<?php echo $list[$i]['subject'] ?>
							<?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
							<?php
							// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
							// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

							if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
							if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
							if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
							if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
							if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];

							?>
							
					</a>
					<div class="hidden-sm visible-xs" ><?=$list[$i][wr_name]?> ／ <?php echo $list[$i]['datetime2'] ?></div>
					
			</td>
			<td class="td_date hidden-xs"><?=$list[$i][wr_name]?></td>

			<td class="td_date hidden-xs"><?php echo $list[$i]['datetime2'] ?></td>

			<td class="td_date hidden-xs"><?=$list[$i][wr_hit]?></td>
	</tr>
	<?php } ?>
	<?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
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