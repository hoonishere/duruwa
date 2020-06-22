<? if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가  ?>
<?
if($w == '' && $member[mb_level] < 5){
	include_once(G5_PATH."/lib/mailer.lib.php");

	/**********관리자에게 발송*********/
	$wr_subject = "[".$_POST[wr_1]."]".$_POST[wr_2]."님의 가맹점 개설 문의 메일";
	ob_start();
	include ($board_skin_path."/mail.skin.php");
	$content = ob_get_contents();
	ob_end_clean();
	$type = 1;

	$mail_content = $content;

	$wr_name = $_POST[wr_name];
	$wr_email = $_POST[wr_5];
	$super_admin = get_member("root");
	mailer($wr_name, $wr_email, $super_admin[mb_email], $wr_subject, $mail_content, $type, $file); // 글쓴이에게
	//mailer($wr_name, $wr_email, "sds207103@naver.com", $wr_subject, $mail_content, $type, $file); // 글쓴이에게
	//mailer($wr_name, $wr_email, "gemuse1@naver.com", $wr_subject, $mail_content, $type, $file); // 글쓴이에게
	/**********관리자에게 발송*********/
	alert("가맹점 개설 문의가 접수되었습니다.\\n\\n담당자 확인 후 연락드리겠습니다",G5_URL);
}
?>