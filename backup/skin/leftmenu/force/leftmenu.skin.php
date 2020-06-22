<style>
	div.new_navi					{width:100%; text-align:center;}
	div.new_navi:after		{clear:both; content:''; width:100%; display:block;}
	span.ns_1							{display:inline-block; margin:0px; padding:0; margin-left:-1px;}
	span.ns_1 a						{display:block; text-decoration:none; color:#656565; font-size:13px; line-height:40px; padding:0 20px;text-align:center; border:1px solid #ed63a0;}
	span.ns_1:first-child a	{margin-left:0;}
	/* 벡그라운드 컬러를 깔때*/
	span.ns_1 a:hover				{color:#313131; background-color:#fefefe;}
	.dis_none						{display:none; }

</style>

<script type="text/javascript">
	$(function(){
		if(<?echo (int)$tp[s_menu]?> > 0){
			$('.new_navi>span:eq(<?=($tp[s_menu]-1)?>) a[href*=<?=$tp[local]?>]').css("color","#fff");
			$('.new_navi>span:eq(<?=($tp[s_menu]-1)?>) a[href*=<?=$tp[local]?>]').css("background","#ed63a0");
			$('.new_navi>span:eq(<?=($tp[s_menu]-1)?>) a[href*=<?=$tp[local]?>]').css("border","1px solid #ed63a0");
		}
		if(($('.ns_1').length) <= 1){
			$('.new_navi > span').css("display","none");
		}

	});
</script>


<div class="new_navi">
<?if(is_numeric($tp[local])){?>
	<?for($i = 0; $i < count($fmenu[($tp[m_menu]-1)][5]); $i++){?><span class="ns_1"><a href="<?=$fmenu[($tp[m_menu]-1)][5][$i][1]?>" <?if($fmenu[($tp[m_menu]-1)][5][$i][2] =="1"){echo "target='_blank'";}?>><?=$fmenu[($tp[m_menu]-1)][5][$i][0]?></a></span><?}?>
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