<style>
/* 퀵메뉴 왼쪽 오른쪽 */
#quick_wrap						{position:relative; width:100%;margin:0 auto; z-index:999;}
#quick_left						{position:absolute; width:205px; left:0px; top:108px;z-index:999;}
#quick_right					{position:absolute; width:110px; right:0px; top:108px;z-index:999;}

.open_close				{position:absolute; right:-1px;}
.ql_bg						{width:165px; background:#fff; padding:15px 10px; border:1px solid #eaeaea;}
.ql_title					{text-align:center; margin-bottom:10px;}
.ql_form input[type="text"]		{border:1px solid #dfdfdf; background:#f8f8f8; height:28px; text-indent:5px;}
.f_name input			{width:163px; margin-bottom:4px;}
.f_tel input			{width:54px; margin-bottom:4px;}
.f_tel input:first-child			{width:41px;}
.ql_form textarea			{border:1px solid #dfdfdf; background:#f8f8f8; width:153px; min-height:90px; padding:5px;}
.ql_cs						{font-size:15px; color:#454545;text-align:center; margin-top:15px; margin-bottom:10px;}

.qr_tel								{background:url('<?=G5_URL?>/img/quick/b2.jpg') repeat-y center top; height:150px;}
.qr_tel p							{text-align:center; padding-top:70px; font-size:22px; color:#fff; font-weight:bold; line-height:100%;}
a.qr_last img					{border-top:1px solid #aeaeae;}
</style>
<!-- 퀵메뉴소스 -->
<script>
$(function(){
	var margin = 108;
	//$("#quick_menu").animate({top:margin + $(window).scrollTop()},500);
	$(window).scroll(function(){
		$('#quick_right').stop();
		if($(document).scrollTop() > margin){
			$('#quick_right').animate( { top: $(document).scrollTop() + 0}, 500 );
		}else{
			$('#quick_right').animate( { top: margin}, 500 );
		}

		$('#quick_left').stop();
		if($(document).scrollTop() > margin){
			$('#quick_left').animate( { top: $(document).scrollTop() + 30}, 500 );
		}else{
			$('#quick_left').animate( { top: margin}, 500 ); //$(document).scrollTop() + margin ; 
		}
		
	});
});
</script><!-- 퀵메뉴소스 end -->
<div id="quick_wrap" >
		<div id="quick_left">
			<div class="open_close"><a href="#"><img src="<?=G5_URL?>/img/quick/open.png" alt="열기/닫기"></a></div>
			<div class="ql_bg">
				<div class="ql_title"><img src="<?=G5_URL?>/img/quick/title_1.png" alt="수강문의"></div>
				<div class="ql_form">
					<form >
						<div class="f_name"><input type="text" value="" placeholder="이름"></div>
						<div class="f_tel">
							<input type="text" value="" placeholder="010">
							<input type="text" value="" >
							<input type="text" value="" >
						</div>
						<textarea></textarea>
						<input type="image" src="<?=G5_URL?>/img/quick/ok_btn.jpg" value="">
					</form>
				</div>
				<div class="ql_cs">문의전화<br><b>02-2038-0844</b></div>
			</div>
		</div><!-- quick_left end -->


		<div id="quick_right">
			<a href="#unll"><img src="<?=G5_URL?>/img/quick/b1.jpg" alt="카카오톡"></a>
			<div class="qr_tel"><p>02<br>.2038<br>.0844</p></div>
			<a href="<?=G5_URL?>/bbs/board.php?bo_table=52"><img src="<?=G5_URL?>/img/quick/b3.jpg" alt="온라인상담"></a>
			<a href="#"><img src="<?=G5_URL?>/img/quick/b4.jpg" alt="블로그"></a>
			<a href="#"><img src="<?=G5_URL?>/img/quick/b5.jpg" alt="카페"></a>
			<a href="#"><img src="<?=G5_URL?>/img/quick/b6.jpg" alt="인스타그램"></a>
			<a href="#"><img src="<?=G5_URL?>/img/quick/b7.jpg" alt="카카오"></a>
			<a href="#"><img src="<?=G5_URL?>/img/quick/b8.jpg" alt="밴드"></a>
			<a href="#" class="qr_last"><img src="<?=G5_URL?>/img/quick/top.jpg" alt="top"></a>
		</div><!-- quick_right end -->
</div><!-- quick_wrap end  -->