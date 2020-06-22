<?
$colspan = 1;
if ($is_checkbox){ $colspan +=2;}
?>

<div class="tbl_head01 tbl_wrap">
<? if ($is_checkbox) { ?><input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);"> 전체선택<? } ?>
	<table>
	<thead>

	</thead>
	<tbody>
	<?php
	for ($i=0; $i<count($list); $i++) {
	?>
	<tr> 
				<td class="num">Q</td>
				<? if ($is_checkbox) { ?><td ><input type=checkbox name="chk_wr_id[]" value="<?=$list[$i][wr_id]?>"></td><? } ?>
				<? if ($is_checkbox) { ?><td><a href="<?=G5_BBS_URL?>/write.php?w=u&bo_table=<?=$bo_table?>&wr_id=<?=$list[$i][wr_id]?>">[수정]</a></td><? } ?>
				<td style="text-align:left;">
						<? 
			echo "<a href='javascript:viewContent({$list[$i][wr_id]})' >";
						echo $list[$i][wr_subject];
						echo "</a>";
						?>
				</td>
		</tr>
	<tr style="display:none" id="content<?=$list[$i][wr_id]?>"><td colspan="<?=$colspan?>" style="background-color:#ebebeb;">A</td><td class="content" style="text-align:left;background-color:#ebebeb;">
	<?=nl2br($list[$i][wr_content])?>
	</td></tr>
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
<script language="JavaScript">
	var pnum = "";
	function viewContent(id){
		var v = document.getElementById("content"+id);
		var p = document.getElementById("content"+pnum);
		
	
		if(pnum == ""){
			v.style.display = "";
			pnum = id;
		}else if(pnum == id){
			v.style.display = "none";
			pnum = "";
		}else{
			p.style.display = "none";
			v.style.display = "";
			pnum = id;
		}
	}
	//viewContent(<?=$list[0][wr_id]?>);
	</script>