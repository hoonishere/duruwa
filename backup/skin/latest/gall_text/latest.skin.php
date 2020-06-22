<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
$image_width = 97;
$image_height = 70;
?>

<style>
/**/
div.center_b2 					{float:left; width:325px; margin-left:15px; border-bottom:2px solid #a7a9ac; }
.center_b2 > h2								{background:#888888 url('<?=$latst_skin_url?>/img/la_tit_bg.jpg') no-repeat right top; width:100%; height:40px; position:relative;}
.center_b2 > h2 p							{color:#ffffff; font-size:14px; font-weight:700; padding-top:8px; text-indent:10px;}
.center_b2 > h2 p a						{position:absolute; right:13px; top:10px;}
.center_b2 > h3										{font-weight:700; margin:10px 0 7px 0;}

</style>

<table width="100%" cellpadding="0" cellspacing="0" style="padding-top:10px;">
	<tbody>
	
<? for ($i=0; $i<count($list); $i++) {
		$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $image_width, $image_height);

		if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$image_width.'" height="'.$image_height.'">';
		} else {
				$img_content = '<span style="width:'.$image_width.'px;height:'.$image_height.'px">no image</span>';
		}
	?>
	<tr>
		<td width="97px" height="49px" style="font-size:11px;<?if(($i+1) != count($list)){?>padding-bottom:15px<?}?>"><a href="<?=$list[$i][href]?>" ><?=$img_content?></a></td>
		<td style="padding-left:5px;vertical-align:top;display:inline-block;">
			<h3><b><a href="<?=$list[$i][href]?>" style="color:#333;"><?=cut_str($list[$i][wr_subject],67)?></a></b></h3>
			<p style="margin-bottom:2px;color:#ccc;"><?php echo date("Y.m.d", strtotime($list[$i]['wr_datetime'])) ?></p>
			<p style="font-size:13px;"><a href="<?=$list[$i][href]?>" style="color:#555;"><?=cut_str(strip_tags($list[$i][wr_content]), 30)?></a></p>
		</td>
	</tr>
	<?}?>
	<? if (count($list) == 0) { ?><h3>게시물이 없습니다.</h3><? } ?>
</tbody></table>