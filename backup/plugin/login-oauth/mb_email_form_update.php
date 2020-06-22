<?
include_once('../../common.php');

$mb_femail = $_POST[mb_femail] ; 
valid_mb_email($mb_femail);
function valid_mb_email($reg_mb_email)
{
    if (!preg_match("/([0-9a-zA-Z_-]+)@([0-9a-zA-Z_-]+)\.([0-9a-zA-Z_-]+)/", $reg_mb_email)){
        alert( "E-mail 주소가 형식에 맞지 않습니다." ,G5_PLUGIN_URL."/login-oauth/register.mb_email.form.skin.php" );
    }else{
        //return "";
		}
}

$sql = "select * from g5_member where mb_email = '".$mb_femail."'"; 
$row = sql_fetch($sql); // 중복된 회원이 있는지 확인해봄


if( $row[mb_email] != "" ){
  $ori_email = explode("@",$row[mb_email]);
	$len=strlen($ori_email[0]);
	$len = $len -3 ; 
	$test = 	substr($ori_email[0], -3) ; 
		 $star ="";
		for($i = 0; $i< $len ; $i++){
		 $star .= "*";
		}
		 $email= $star.$test."@".$ori_email[1] ; // *로 가려진 것임.
	 alert("중복된 이메일입니다. \\n\\n이메일 주소 :   ".$email, G5_PLUGIN_URL."/login-oauth/register.mb_email.form.skin.php");
}else if($row[mb_email]==""){ // new Email address~

	$sql1 = "update g5_member set mb_email = '".$mb_femail."' where mb_id='".$member[mb_id]."'";
	sql_query($sql1);

	//alert_close($member[mb_nick]." 님의 아이디가\\n\\n".$mb_femail." 로 정상적으로 등록 되었습니다.");
?>

<script>
opener.location.reload();
window.close();
</script>

<?
}
?>