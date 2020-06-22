<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$image_width = 300;
$image_height = 250;
?>

<div style="background:url('<?=$g4[path]?>/img/staff_bg1.png') no-repeat right bottom">
<table style="border:0px solid #cdcdcd; width:100%; margin-top:20px;">

	<? for ($i=0; $i<count($list); $i++) { 
		$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];

		
		?>
	<tr>
		<td valign="top" align="center">
			<?=$image?><br><span style="font-weight:bold; font-size:20px;"><?=$list[$i][subject]?></span>
			<br>
			<?if($is_admin){?>
			<a href="<?=$g4[path]?>/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$i][wr_id]?>">[수정]</a>
			<?}?>
		</td>
		<td style="padding-left:25px; line-height:17px;" valign="top">
			<?=$list[$i][wr_content]?><br>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="border-top:1px solid #cfcfcf;">&nbsp;</td>
		<td style="border-top:1px solid #cfcfcf;">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	    <? } // end for ?>
</table>

    <? if (count($list) == 0) { echo "<div style='line-height:50px; text-align:center;'>게시물이 없습니다.</div>"; } ?>
</div>

<script>
/*
	$(document).ready(function(){
		$(".simg").mouseover(function(){
			var idx = $(".simg").index($(this));
			$(".dtlimg").eq(idx).delay(200).show(0);
			event.stopPropagation();
		});
		$(".simg").mouseout(function(){
			var idx = $(".simg").index($(this));
			$(".dtlimg").eq(idx).hide(0);
			event.stopPropagation();
		});
	});
*/
</script>