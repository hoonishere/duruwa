<div class="if_frame" >
	<div  class="if_left">
	<iframe width="590" height="400" src="http://www.youtube.com/embed/<?=$write[wr_9]?>?vq=hd720&autoplay=1&start=60&rel=0" frameborder="0" allowfullscreen>
	</iframe>
	<div class="if_txt"><?=$view[wr_subject]?></div>
	</div>
	<div  class="if_right">
		<?$sql1 = "select * from g5_write_".$bo_table." where wr_id <>'".$wr_id."' order by wr_num, wr_reply limit 0, 4";
			$rowList = getList($sql1);
			foreach($rowList as $line){
				$line_href = './board.php?bo_table='.$bo_table.'&wr_id='.$line[wr_id];
				?>
			<div>
				<a href='<?=$line_href?>'><img src='http://img.youtube.com/vi/<?=$line[wr_9]?>/maxresdefault.jpg' width='142' height='80'></a>
				<b style><a href='<?=$line_href?>' ><?=cut_str($line[wr_subject] , '25')?></a></b>
			</div>
		<?}?>
	</div>
</div>