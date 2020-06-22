<style>
	div.new_navi					{width:100%;}
	div.new_navi:after				{clear:both; content:''; width:100%; display:block;}
	span.ns_1						{display:inline-block; margin:0 0 0 15px;}
	span.ns_1:first-child	{margin-left:0;}
	span.ns_1 a					{display:inline-block; text-decoration:none; color:#313131; font-size:17px; line-height:50px; width:318px; height:48px; text-align:center; border:1px solid #e8e8e8;}

	/* 벡그라운드 컬러를 깔때*/
	span.ns_1 a:hover				{color:#313131; background-color:#f8f8f8;}
	.dis_none						{display:none; }

</style>

<script type="text/javascript">
	$(function(){
		if(<?echo (int)$tp[s_menu]?> > 0){
			$('.new_navi>span:eq(<?=($tp[s_menu]-1)?>) a[href*=<?=$tp[local]?>]').css("color","#fff");
			$('.new_navi>span:eq(<?=($tp[s_menu]-1)?>) a[href*=<?=$tp[local]?>]').css("background","#222222");
			$('.new_navi>span:eq(<?=($tp[s_menu]-1)?>) a[href*=<?=$tp[local]?>]').css("border","1px solid #222222");
		}
	});
</script>


<div class="new_navi">
<?if(is_numeric($tp[local])){?>
	<?for($i = 0; $i < count($fmenu[($tp[m_menu]-1)][5]); $i++){?>
	<span class="ns_1"><a href="<?=$fmenu[($tp[m_menu]-1)][5][$i][1]?>" <?if($fmenu[($tp[m_menu]-1)][5][$i][2] =="1"){echo "target='_blank'";}?>><?=$fmenu[($tp[m_menu]-1)][5][$i][0]?></a></span>
	<?}?>
<?}else{?>
	<?
	// 레프트 cmenu idx 추출 시작
	$cmenu_idx = "";
	for($kk = 0; $kk < count($cmenu); $kk++){
			for($jj = 0; $jj < count($cmenu[$kk][5]); $jj++){
				if(@eregi($tp[local],$cmenu[$kk][5][$jj][1])){	
					$cmenu_idx = $kk;
				}
			}
	}
	// 레프트 cmenu idx 추출 끝
	?>
	<?for($jj = 0; $jj < count($cmenu[$cmenu_idx][5]); $jj++){?>
	<span class="ns_1"><a href="<?=$cmenu[$cmenu_idx][5][$jj][1]?>"><?=$cmenu[$cmenu_idx][5][$jj][0]?></a></span>
	<?}?>
<?}?>

</div>