<?
// 최적화 사이트 400x300 강제 지정
$board['bo_mobile_gallery_width'] = 400;
$board['bo_mobile_gallery_height'] = 300;
?>
<?php if ($is_checkbox) { ?>
<div id="gall_allchk">
		<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
		<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
</div>
<?php } ?>

<ul id="gall_ul2">
		<?php for ($i=0; $i<count($list); $i++) {
		?><!-- col-xs-6 col-sm-3 col-md-3  -->
		<li class="gall_li2 <?php if ($wr_id == $list[$i]['wr_id']) { ?>gall_now<?php } ?>">
		 
				<?php if ($is_checkbox) { ?>
				<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
				<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
				<?php } ?>
				<span class="sound_only">
						<?php
						if ($wr_id == $list[$i]['wr_id'])
								echo "<span class=\"bo_current\">열람중</span>";
						else
								echo $list[$i]['num'];
						?>
				</span>
				<ul class="gall_con2 wowload fadeInUp"  >
						<li class="gall_href2">
								<a href="<?php echo $list[$i]['href'] ?>">
								<?php
								if ($list[$i]['is_notice']) { // 공지사항 ?>
										<strong style="width:<?php echo $board['bo_mobile_gallery_width'] ?>px;height:<?php echo $board['bo_mobile_gallery_height'] ?>px">공지</strong>
								<?php
								} else {
										$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_mobile_gallery_width'], $board['bo_mobile_gallery_height']);

										if($thumb['src']) {
												$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" class="gall_img img-responsive">';
										} else {
												$img_content = '<img src="/mobile/skin/board/webzine/img/noimg.gif" class="gall_img img-responsive">';
										}

										echo $img_content;
								}
								?>

								</a>
						</li>
						<li class="gall_text_href2">
								<?php
								// echo $list[$i]['icon_reply']; 갤러리는 reply 를 사용 안 할 것 같습니다. - 지운아빠 2013-03-04
								if ($is_category && $list[$i]['ca_name']) {
								?>
								<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
								<?php } ?>
								<a href="<?php echo $list[$i]['href'] ?>" class="gall_subject">
										<?php echo $list[$i]['subject'] ?>
								</a>
								<p class="content_txt2">
										<?=cut_str(strip_tags($list[$i][wr_content]),"90")?>
								</p>
								<?php
								// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
								// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
								//if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
								//if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
								//if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
								//if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
								//if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];
								?>
						</li>

				</ul>
		</li>
		<?php } ?>
		<?php if (count($list) == 0) { echo "<li class=\"empty_list\">게시물이 없습니다.</li>"; } ?>
</ul>
<!-- <div id="bo_list_total">
		<span>Total <?php echo number_format($total_count) ?>건</span>
		<?php echo $page ?> 페이지
</div>
<div style="clear:both;"></div> -->

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
