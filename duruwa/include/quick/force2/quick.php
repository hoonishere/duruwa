<style>
	.close	{display:block;}
	#right2									{position:fixed; right:0px; top:85px; z-index:999;font-family:'맑은 고딕'; display:none; cursor:pointer; width:34px; height:183px; background:url('<?=$quick_skin_url?>/img/right_quick_open_bg.png') no-repeat left 11px;}
#right2 #open_txt				{color:#fff; width:20px; line-height:110%; margin:10px 0 0 8px;}
#right									{position:fixed; right:0px; top:100px; z-index:999; }
#right_btn							{position:fixed; top:60px; right:70px;margin-top:26px; width:30px; height:30px; clear:both;z-index:50;}
#right_con							{position:relative; float:left;width:105px; height:340px; background:url('<?=$quick_skin_url?>/img/right_quick_bg.png') no-repeat right top;}
.q_sms									{margin-left:7px; height:145px;}
.q_sms li								{margin-bottom:2px;}
.q_sms li.q_stitle					{margin:28px 0px 7px 0px; color:#ffffff; font:bold 11pt 'malgun gothic';}
span.sms_title						{color:#1de7ce; display:inline-block; width:35px; font:normal 9pt 'malgun gothic'; text-align:right; margin-right:5px;}
.sms_title								{color:#1de7ce; font:normal 9pt 'malgun gothic'; }
.q_sms_input						{border:none; background:#fff; width:50px; height:18px;color:#3697dc;}
.q_sms_input_name			{border:none; background:#fff; width:90px; height:18px;color:#3697dc;}
.q_sms_input_tel					{border:none; background:#fff; width:27px; height:18px;color:#3697dc;}
.q_cus									{margin-left:7px; border:0px solid red; *margin-top:45px;}
.q_cus li.q_stitle					{margin:15px 0px 7px 0px; color:#ffffff; font:bold 11pt 'malgun gothic';}
.q_cus li								{font-family:'malgun gothic';}
li.cus_num							{color:#1de7ce; font-size:11.5pt; font-weight:bold;}
li.cus_time							{color:#999; font-size:9pt; }
li.cus_go a							{color:#ff9c00; font-size:11pt;font-weight:bold;}
</style>
<script src="<?=$quick_skin_url?>/js/jquery.cookie.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$(".close").click(function(){
		$("#right").hide(100);
		$("#right2").show();
		$.cookie('right_quick', 'close', { expires: 1, path: '/', domain: '<?=$_SERVER[HTTP_HOST]?>', secure: false });
	});

	$("#right2").click(function(){
	$.cookie('right_quick', 'open', { expires: 1, path: '/', domain: '<?=$_SERVER[HTTP_HOST]?>', secure: false });
		$("#right2").hide();
		$("#right").show(500);
	});

	if($.cookie("right_quick") == "close"){
		$("#right").css("display","none");
		$("#right2").css("display","block");
	}else{
		$("#right").css("display","block");
		$("#right2").css("display","none");
	}
});
	//alert($.cookie("right_quick"));
</script>
<div  id="right2" style="display:none;">
	<img src="<?=$quick_skin_url?>/img/quick_open.png" />
	<div id="open_txt">빠른상담문의</div>
</div>
<div id="right" style="display:none;">
	<div id="right_btn"><a href="#"  class="close"><img src="<?=$quick_skin_url?>/img/quick_close.png" /></a></div>
	<div id="right_con">
		<form action="<?=$quick_skin_url?>/sms/write_update2.php" onsubmit="return smssend_submit2(this)" name="smsform2" method="post">
		<input type="hidden" name="mh_hp" value="01024600226" />
		<input type="hidden" name="mh_reply" value="" />
			<ul class="q_sms">
				<li class="q_stitle">빠른상담문의</li>
				<li class="sms_title">Name</li>
				<li><input  type="txt" class="q_sms_input_name" name="customer" maxlength="20"></li>
				<li class="sms_title">Tel</li>
				<li style="margin-bottom:10px;"><input  type="txt" class="q_sms_input_tel" name="num1" maxlength="4"> <input  type="txt" class="q_sms_input_tel" name="num2" maxlength="4"> <input  type="txt" class="q_sms_input_tel" name="num3" maxlength="4"></li>
				<li><input type="image" src="<?=$quick_skin_url?>/img/quick_send.gif"/></li>
			</ul>
		</form>
		<ul class="q_cus">
			<li class="q_stitle">상담전화</li>
			<li class="cus_num">02)325-4820</li>
			<li class="cus_time">am09~pm06</li>
			<li><img src="<?=$quick_skin_url?>/img/quick_line.gif"/></li>
			<li class="cus_go"><a href="<?=$g4[path]?>/request.php">견적문의  GO</a></li>
		</ul>
	<!-- 	<p style="margin-top:25px;"><img src="<?=$g4[path]?>/img/quick/asia.png"></p> -->
	</div>
</div>
<script>
function smssend_submit2(f)
{
		if (!f.customer.value)
    {
        alert('성명이나 상호명을 입력해주세요.');
				f.customer.focus();
        return false;
    }

    if (!f.num1.value)
    {
        alert('전화번호를 입력해주세요.');
				f.num1.focus();
        return false;
    }

    if (!f.num1.value) {
        alert(' 전화번호를 입력해주세요.');
				f.num1.focus();
        return false;
    }
    if (!f.num2.value) {
        alert(' 전화번호를 입력해주세요.');
				f.num2.focus();
        return false;
    }
    if (!f.num3.value) {
        alert(' 전화번호를 입력해주세요.');
				f.num3.focus();
        return false;
    }
    f.mh_reply.value = f.num1.value + "-" + f.num2.value + "-" + f.num3.value ;

    return true;
}
</script>
<script>
	$('.close').click(function(){
			var idx = $(".open").index($(this));
		$('.open').eq(idx).css('display','block');
		$('.banner_wrap').eq(idx).css('display','none');

	});
	
	$('.open_btn').click(function(){
		var idx = $(".banner_wrap").index($(this));
		$('.banner_wrap').eq(idx).css('display','block');
		$('.open_btn').eq(idx).css('display','none');

	});
	var ua = window.navigator.userAgent.toLowerCase(); 
	if ( /iphone/.test(ua) || /android/.test(ua) || /opera/.test(ua) || /bada/.test(ua) ) { 
			$("#right").css('display','none');
	}
</script>