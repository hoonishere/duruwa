<?


if($bo_table=="cont" && $member[mb_level] < 5  && $w == ""){
  $wr_message = $_POST[wr_1]."님이 빠른상담을 남겼습니다.".chr(10).$_POST[wr_2]."-".$_POST[wr_3]."-".$_POST[wr_4];
	$mbmb = get_member("root");

	include_once(G5_LIB_PATH.'/icode.sms.lib.php');

	$_POST[wr_2] = $_POST[wr_2].$_POST[wr_3].$_POST[wr_4];

	$sql = " select * from $g5[write_prefix]sms where wr_is_comment = 0 limit 0, 1 ";
	$sms_cont = sql_fetch($sql);

	if(@strlen(@trim($sms_cont[wr_content])) > 0){
		$wr_message2 = $sms_cont[wr_content];
		$sms_contents = array($wr_message,$wr_message2);
		//$recv_numbers = array($mbmb['mb_hp'],$_POST[wr_2]);	//받는 번호
		$recv_numbers = array($mbmb['mb_hp'],$_POST[wr_2]);	//받는 번호
		$send_numbers = array("0220380844","0220380844");	//보내는 번호
	}else{
		$sms_contents = array($wr_message);
		//$recv_numbers = array($mbmb['mb_hp'],$_POST[wr_2]);	//받는 번호
		$recv_numbers = array($mbmb['mb_hp']);	//받는 번호
		$send_numbers = array("0220380844");	//보내는 번호
	}
	/*
	여러명일 경우
	$sms_contents = array($wr_message, $wr_message2);
	$recv_numbers = array($mbmb['mb_hp'], $mbmb[mb_hp2]);	//받는 번호
	$send_numbers = array("0220380844","0220380844");	//보내는 번호
	*/

	$sms_count = 0;
	$sms_messages = array();

	for($s=0; $s<count($sms_contents); $s++) {
			$sms_content = $sms_contents[$s];
			$recv_number = preg_replace("/[^0-9]/", "", $recv_numbers[$s]);
			$send_number = preg_replace("/[^0-9]/", "", $send_numbers[$s]);

			if($recv_number) {
					$sms_messages[] = array('recv' => $recv_number, 'send' => $send_number, 'cont' => $sms_content);
					$sms_count++;
			}
	}
	$SMS = new SMS; // SMS 연결
	$SMS->SMS_con($config['cf_icode_server_ip'], $config['cf_icode_id'], $config['cf_icode_pw'], $config['cf_icode_server_port']);

	for($s=0; $s<count($sms_messages); $s++) {
			$recv_number = $sms_messages[$s]['recv'];
			$send_number = $sms_messages[$s]['send'];
			$sms_content = iconv_euckr($sms_messages[$s]['cont']);
			$SMS->Add($recv_number, $send_number, $config['cf_icode_id'], $sms_content, "");
	}

	$SMS->Send();
	$SMS->Init(); // 보관하고 있던 결과값을 지웁니다.
	alert("문의가 접수되었습니다.\\n\\n담당자 확인 후 연락드리겠습니다.",G5_URL);
	//alert("빠른상담 신청이 정상적으로 되었습니다.\\n\\n빠른 시일 내에 연락드리겠습니다.\\n\\n감사합니다.",G5_URL);
}











if($member[mb_level] < 5 && $w == "" && ($bo_table == "cont" || $bo_table == "61")){
	alert("문의가 접수되었습니다.\\n\\n담당자 확인 후 연락드리겠습니다.",G5_URL);
}
?>