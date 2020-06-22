<?if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가?>
<?include_once(G5_LIB_PATH.'/thumbnail.lib.php');?>
<style>
.la_gallery_wrap	{padding:0px 0 0 0; width:100%; position:relative;}
.la_gallery_wrap > h2							{width:100%; height:50px; position:relative;}
.la_gallery_wrap > h2 a						{position:absolute; right:0px; top:7px; font-size:11px; font-family:arial; text-decoration:none;}

.la_gallery	{float:left;margin:0 0px; }
.la_gallery_img	{float:left; margin:0 3px; position:relative;}
.la_gallery_img .la_gallery_ab	{display:none;}

.la_gallery_img:hover .la_gallery_ab	{display:block; position:absolute; bottom:0px; left:0px; height:30px; width:100%; background:#000; line-height:30px; 
filter: alpha(opacity=70); /* internet explorer */    
-khtml-opacity: 0.7;       /* khtml, old safari */    
-moz-opacity: 0.7;         /* mozilla, netscape */    
opacity: 0.7;                /* fx, safari, opera */
}

.la_gallery_ab > a	{
		 color:#fff;
		 padding-left:10px;
		 font:bold 13px 'malgun gothic';
		 text-decoration:none;
}
</style>

<div class='la_gallery_wrap'>
<h2><a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>'>more +</a></h2>

	<ul class="la_gallery">

	<?
	$image_width = 230;
	$image_height = 200;
	?>
	<? for ($i=0; $i<count($list); $i++) { 
		$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $image_width, $image_height);

		if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$image_width.'" height="'.$image_height.'">';
		} else {
				$img_content = '<span style="width:'.$image_width.'px;height:'.$image_height.'px">no image</span>';
		}
		?>

		<li class="la_gallery_img">
			<a href=<?=($list[$i]['href'])?> onfocus='blur();'><?=$img_content?></a>
			<div class='la_gallery_ab'><a href=<?=($list[$i]['href'])?>><?=cut_str($list[$i]['subject'],30)?></a></div>
		</li>
		<?}?>
		<div class="clear"></div>
	</ul>

</div>