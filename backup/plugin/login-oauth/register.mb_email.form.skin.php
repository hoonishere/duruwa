<?
include_once('../../common.php');
include_once('../../head.sub.php');
?>
<style>
table.tb_order			{width:100%; border-collapse:collapse; padding:0; margin:0;}
table.tb_order th, table.tb_order td		{padding:10px; border:1px solid #d7d7d7; text-align:left;}
table.tb_order th		{
padding: 10px 0 10px 20px;
text-align: left;
border-bottom: 1px solid #d9d9d9;
background: #f7f7f7;
font-size:13px;
}

.input		{border:1px solid #ddd ; line-height:30px; height:30px;}
div	> p		{margin:25px 20px; font-weight:bold;}

span.ico {  display: inline-block;  margin-right: 6px;  width: 110px; height: 30px; line-height: 30px; vertical-align: middle; text-align: center;  font-weight: 700  font-size: 12px;  color: #fff;  border-radius: 4px;  background: #3881b1;  zoom: 1;  letter-spacing: 0;}
span.ico  > a{	color:#fff;	text-decoration:none;}
</style>

<form name="fmember_email" id="fmember_email" action="./mb_email_form_update.php" onsubmit="return fmember_submit(this);" method="post" enctype="multipart/form-data">
	<table class="tb_order">
		<tr >
			<th colspan="2">
			반갑습니다 <?=$member[mb_nick]?>님<br>
		소셜로그인을 통해 최초의 로그인 했을때<br>
		각 소셜 로그인 회사 마다 최소의 정보만으로 회원 정보를 입력 받게 되어 있습니다.<br><br>
		저희 <?=$config[cf_title]?> 에서는 <?=$member[mb_nick]?>님의 정보를 타인과 식별하기 위해 필수적으로 필요한
		이메일 주소를 등록받습니다.<br><br>
		이메일 주소는 추후에 계정정보를 확인할 때 사용되며, 타인과 중복된 이메일을 사용할 수 없음을 안내 드립니다.<br><br>
		<span style="color:#B70000;">※이메일 등록을 완료하셔야 정상적으로 가입처리가 됩니다.</span>
			</th>
		</tr>
	</table>
	<div style="border-bottom:1px solid #ddd;">
			<p>E-mail 주소 등록 : <input type="text" class = "input"name="mb_femail" id="mb_email"> <span class="ico"><a href="#null" id="submit_alink">메인으로돌아가기</a></span></p> 
		</div>
</form>


<script>
$(document).ready(function(){
	$("#submit_alink").click(function(){
		$("#fmember_email").submit();
	});
});
function fmember_submit(f)
{
    if (f.mb_femail.value =="") {
        alert('사용하실 이메일을 입력해주세요\n\n입력을 완료하셔야 정상적으로 이용가능합니다.');
        return false;
				f.mb_femail.focus();
    }



    return true;
}
</script>