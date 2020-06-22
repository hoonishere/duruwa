<style>
	.new_navi h4 { font-size:15px; }
	.ns_1 {margin-left:20px;margin-top:6px;font-size:12px;line-height:22px;}
	.ns_1 a {text-decoration:none;color:#858585;text-decoration:none;font-family:"맑은 고딕";}
	/* 2013.04.19 추가 */
	.ns_1 li {font-weight:bold;}
	.dis_none { display:none; }
</style>
<script type="text/javascript">
	$(function(){
		if(<?echo (int)$tp[s_menu]?> > 0){
			$imgimg = $("ul.new_navi > li:eq(<?=($tp[s_menu]-1)?>) > a > img");
			$imgimg.attr("src",$imgimg.attr("src").replace(".jpg","_over.jpg"));
		}
			/*
			$("ul.new_navi > li > a > img").mouseover(function(){
				$("ul.new_navi > li > a > img").each(function(idx){
					if((idx+1) != <?=$tp[s_menu]?>){
						$(this).attr("src",$(this).attr("src").replace("_over.jpg",".jpg"));
					}
				});
				$("#test").html($(this).attr("src"));
			});
			*/
	});
</script>
<p><img src="<?=$leftmenu_skin_path?>/img/left_t<?=$tp[left_title]?>.jpg"></p>
<ul class="new_navi">
<?if(is_numeric($tp[local])){?>
	<?for($i = 0; $i < count($fmenu[($tp[m_menu]-1)][5]); $i++){?>
	<li><a href="<?=$fmenu[($tp[m_menu]-1)][5][$i][1]?>" <?if($fmenu[($tp[m_menu]-1)][5][$i][2] =="1"){echo "target='_blank'";}?>><img src="<?=$leftmenu_skin_path?>/img/left_num<?=$tp[m_menu]?><?=($i+1)?>.jpg"></a></li>
	<?}?>
<?}else{?>
	<?for($i = 0; $i < count($com_menu); $i++){?>
	<li><a href="<?=$com_menu[$i][1]?>"><?=$com_menu[$i][0]?></a></li>
	<?}?>
<?}?>
</ul>