<?
include_once("./_common.php");
include_once(G5_PATH."/lib/latest.lib.php");
$sql = "select * from $g5[write_prefix]$_GET[bo_table] where wr_id = '$_GET[wr_id]'";
$img_path = G5_URL."/skin/board/$board[bo_skin]";
$row = sql_fetch($sql);
$row[file] = get_file($_GET[bo_table], $row[wr_id]);
?>
<div style="position:relative;">
	<div id='pleft' style="position:relative;float:left;width:20px;position:relative;padding-top:170px;padding-left:10px;cursor:pointer;display:block;height:180px; background:url('<?=$img_path?>/img/next_prev_bg.png') no-repeat center top;">
		<img src="<?=$img_path?>/img/icon_prev.gif">
	</div>
	<div id='g_img' style="position:relative;float:left;width:690px;text-align:center;height:350px;overflow:hidden;">
		<a id="close_btn" href="#close" style="position:absolute; right:10px; top:10px; z-index:10"><img src='<?=$img_path?>/img/ex_btn.png'></a>
		<img id="pimg" src="<?=G5_URL?>/data/file/<?=$_GET[bo_table]?>/<?=$row[file][0][file]?>" style="width:690px;height:350px;">
	</div>
	<div id='pright' style="position:relative;float:right;width:15px;position:relative;padding-top:170px;padding-left:15px;display:block;cursor:pointer;height:180px; background:url('<?=$img_path?>/img/next_prev_bg.png') no-repeat center top;">
		<img src="<?=$img_path?>/img/icon_next.gif">
	</div>
	<div style="clear:both;"></div>
	<div style="background:url('<?=$img_path?>/img/bg_black.png');height:40px;padding:0;margin:0;position:absolute;width:750px;bottom:0px;*bottom:163px">
		<div style="float:left;height:50px;padding-top:13px;text-indent:20px;color:#fff;"><?=$row[wr_subject]?></div>
		<div style="float:right;height:50px;padding-top:13px;padding-right:20px;">
			<ul class="pbullet">
			<? for($j = 0; $j < $row[file][count]; $j++){ ?>
			<li style="float: left;margin: 3px;padding: 0;"><a href="<?=G5_URL?>/data/file/<?=$_GET[bo_table]?>/<?=$row[file][$j][file]?>" style="display: block;width: 13px;height: 13px;background: url('<?=$img_path?>/img/icon_list.png') <?if($j == 0){?> top left<?}else{?>top right<?}?> ;"></a></li>
			<?}?>
			</ul>
		</div>
		<div style="clear:both;"></div>
	</div>
<div style="clear:both;"></div>
</div>