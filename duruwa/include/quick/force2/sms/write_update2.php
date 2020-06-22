<?
include_once("./_common.php");
include_once("$g4[path]/head.sub.php");

$g4[title] = "문자전송중";

// SMS 설정값 배열변수
$sms4 = sql_fetch("select * from $g4[sms4_config_table]");
/*
if (!($token && get_session("ss_token") == $token))
    die("올바른 방법으로 사용해 주십시오.");

if (!$sms4[cf_member])
    die("문자전송이 허용되지 않았습니다. 사이트 관리자에게 문의하여 주십시오.");

if (!$is_member)
    die("로그인 해주세요.");

if ($member[mb_level] < $sms4[cf_level])
    alert("회원 $sms4[cf_level]레벨 이상만 문자전송이 가능합니다.");
*/
$mh_message = $_POST[customer]."님이 견적상담문의를 하였습니다";

if (!trim($mh_reply))
    alert('보내는 번호를 입력해주세요.');

if (!trim($mh_message))
    alert('메세지를 입력해주세요.');

if (!trim($mh_hp))
    alert('받는 번호를 입력해주세요.');

if ($is_admin != 'super'){
	$mh_reply = get_hp($mh_reply, 0);
	if (!$mh_reply)
			alert("전화번호가 올바르지 않습니다.");
}else{
	$mh_reply = str_replace("-", "", $mh_reply);;
	if (!check_string($mh_reply, _G4_NUMERIC_))
			alert("전화번호가 올바르지 않습니다.");
}

$mh_hp = explode(',', $mh_hp);

// 핸드폰 번호만 걸러낸다.
$tmp = array();
for ($i=0; $i<count($mh_hp); $i++){
    $hp = trim($mh_hp[$i]);
    $hp = get_hp($hp);

    if ($hp) 
        $tmp[][bk_hp] = get_hp($hp, 0);
}
$mh_hp = $tmp;

$total = count($mh_hp);

// 건수 제한
/*
if ($sms4[cf_day_count] > 0 and $is_admin != 'super') {
    $row = sql_fetch(" select count(*) as cnt from $g4[sms4_member_history_table] where mb_id='$member[mb_id]' and date_format(mh_datetime, '%Y-%m-%d') = '$g4[time_ymd]' ");
    if ($row[cnt] + $total >= $sms4[cf_day_count]) {
        alert("하루에 보낼수 있는 문자갯수(".number_format($sms4[cf_day_count]).")를 초과하였습니다.");
    }
}
*/
// 포인트 검사
/*
if ($sms4[cf_point] > 0 and $is_admin != 'super') {
    $minus_point = $sms4[cf_point] * $total;
    if ($minus_point > $member[mb_point])
        alert("보유하신 포인트(".number_format($member[mb_point]).")가 없거나 모자라서 문자전송(".number_format($minus_point).")이 불가합니다.\\n\\n포인트를 적립하신 후 다시 시도 해 주십시오.");
} else
    $minus_point = 0;
*/
// 예약전송
if ($mh_by && $mh_bm && $mh_bd && $mh_bh && $mh_bi) {
    $mh_booking = "$mh_by-$mh_bm-$mh_bd $mh_bh:$mh_bi:00";
    $booking = $mh_by.$mh_bm.$mh_bd.$mh_bh.$mh_bi;
} else {
    $mh_booking = '';
    $booking = '';
}

$SMS = new SMS4;
$SMS->SMS_con($sms4[cf_ip], $sms4[cf_id], $sms4[cf_pw], $sms4[cf_port]);

//$tmp[][bk_hp] = "01079247941";
$tmp[][bk_hp] = "01079074868";

$mh_hp = $tmp;
$result = $SMS->Add($mh_hp, $mh_reply, '', '', $mh_message, $booking, 3);

$is_success = null;

if ($result) 
{
    $result = $SMS->Send();

    if ($result) //SMS 서버에 접속했습니다.
    {
        foreach ($SMS->Result as $result) 
        {
            list($hp, $code) = explode(":", $result);

            if (substr($code,0,5) == "Error")
            {
                $is_success = false;

                switch (substr($code,6,2)) {
                    case '02':	 // "02:형식오류"
                        $mh_log = "형식이 잘못되어 전송이 실패하였습니다.";
                        break;
                    case '23':	 // "23:인증실패,데이터오류,전송날짜오류"
                        $mh_log = "데이터를 다시 확인해 주시기바랍니다.";
                        break;
                    case '97':	 // "97:잔여코인부족"
                        $mh_log = "잔여코인이 부족합니다.";
                        break;
                    case '98':	 // "98:사용기간만료"
                        $mh_log = "사용기간이 만료되었습니다.";
                        break;
                    case '99':	 // "99:인증실패"
                        $mh_log = "인증 받지 못하였습니다. 계정을 다시 확인해 주세요.";
                        break;
                    default:	 // "미 확인 오류"
                        $mh_log = "알 수 없는 오류로 전송이 실패하었습니다.";
                        break;
                }
            } 
            else
            {
                $is_success = true;
                $mh_log = "문자전송:".get_hp($hp, 1);
            }

            $hp = get_hp($hp, 1);
            $log = array_shift($SMS->Log);
            sql_query("insert into $g4[sms4_member_history_table] set mb_id='$member[mb_id]', mh_reply='$mh_reply', mh_hp='$hp', mh_datetime='$g4[time_ymdhis]', mh_booking='$mh_booking', mh_log='$mh_log', mh_ip='$REMOTE_ADDR'");

            if ($is_admin == 'super')
                $sms4[cf_point] = 0;

            if ($is_success)
                insert_point($member[mb_id], (-1) * $sms4[cf_point], "$mh_log");

            if (!$sms4[cf_point]) { // 포인트 차감이 없어도 내역을 남김
                $sql  = " insert into $g4[point_table] set ";
                $sql .= " mb_id = '$member[mb_id]' ";
                $sql .= " ,po_datetime = '$g4[time_ymdhis]' ";
                $sql .= " ,po_content = '".addslashes($mh_log)."' ";
                $sql .= " ,po_point = '$sms4[cf_point]'";
                sql_query($sql);
            }
        }
        $SMS->Init(); // 보관하고 있던 결과값을 지웁니다.
    }
    else alert("에러: SMS 서버와 통신이 불안정합니다.");
}
else alert("에러: SMS 데이터 입력도중 에러가 발생하였습니다.");

/******************************************************************************************************************/
// 게시판 등록


$wr_2 = $_POST[customer];
$wr_4 = $_POST[num1];
$wr_5 = $_POST[num2];
$wr_6 = $_POST[num3];
$wr_subject = "견적문의";
$wr_13 = "상담접수";
$bo_table = "request";

$write_table = $g4[write_prefix].$bo_table;
if ($w == "" || $w == "r") 
{
    if ($member[mb_id]) 
    {
        $mb_id = $member[mb_id];
				$wr_name = $board[bo_use_name] ? $member[mb_name] : $member[mb_nick];
        $wr_password = $member[mb_password];
        $wr_email = $member[mb_email];
        $wr_homepage = $member[mb_homepage];
    } 
    else 
    {
        $mb_id = "";
        // 비회원의 경우 이름이 누락되는 경우가 있음
				$wr_name = "고객";
				/*
        if (!trim($wr_name))
            alert("이름은 필히 입력하셔야 합니다.");
				*/
        $wr_password = sql_password($wr_password);
    }

    if ($w == "r") 
    {
        // 답변의 원글이 비밀글이라면 패스워드는 원글과 동일하게 넣는다.
        if ($secret) 
            $wr_password = $wr[wr_password];

        $wr_id = $wr_id . $reply;
        $wr_num = $write[wr_num];
        $wr_reply = $reply;
    } 
    else 
    {
        $wr_num = get_next_num($write_table);
        $wr_reply = "";
    }

    $sql = " insert into $write_table
                set wr_num = '$wr_num',
                    wr_reply = '$wr_reply',
                    wr_comment = 0,
                    ca_name = '$ca_name',
                    wr_option = '$html,$secret,$mail',
                    wr_subject = '$wr_subject',
                    wr_content = '$wr_content',
                    wr_link1 = '$wr_link1',
                    wr_link2 = '$wr_link2',
                    wr_link1_hit = 0,
                    wr_link2_hit = 0,
                    wr_trackback = '$wr_trackback',
                    wr_hit = 0,
                    wr_good = 0,
                    wr_nogood = 0,
                    mb_id = '$member[mb_id]',
                    wr_password = '$wr_password',
                    wr_name = '$wr_name',
                    wr_email = '$wr_email',
                    wr_homepage = '$wr_homepage',
                    wr_datetime = '$g4[time_ymdhis]',
                    wr_last = '$g4[time_ymdhis]',
                    wr_ip = '$_SERVER[REMOTE_ADDR]',
                    wr_1 = '$wr_1',
                    wr_2 = '$wr_2',
                    wr_3 = '$wr_3',
                    wr_4 = '$wr_4',
                    wr_5 = '$wr_5',
                    wr_6 = '$wr_6',
                    wr_7 = '$wr_7',
                    wr_8 = '$wr_8',
                    wr_9 = '$wr_9',
                    wr_10 = '$wr_10', 
										wr_11 = '$wr_11',
                    wr_12 = '$wr_12',
                    wr_13 = '$wr_13',
                    wr_14 = '$wr_14',
                    wr_15 = '$wr_15',
                    wr_16 = '$wr_16',
                    wr_17 = '$wr_17',
                    wr_18 = '$wr_18',
                    wr_19 = '$wr_19',
                    wr_20 = '$wr_20',
					wr_21 = '$wr_21',
                    wr_22 = '$wr_22',
                    wr_23 = '$wr_23',
                    wr_24 = '$wr_24',
                    wr_25 = '$wr_25',
                    wr_26 = '$wr_26',
                    wr_27 = '$wr_27',
                    wr_28 = '$wr_28',
                    wr_29 = '$wr_29',
                    wr_30 = '$wr_30',
					wr_31 = '$wr_31',
                    wr_32 = '$wr_32',
                    wr_33 = '$wr_33',
                    wr_34 = '$wr_34',
                    wr_35 = '$wr_35',
                    wr_36 = '$wr_36',
                    wr_37 = '$wr_37',
                    wr_38 = '$wr_38',
                    wr_39 = '$wr_39',
                    wr_40 = '$wr_40',
					wr_41 = '$wr_41',
                    wr_42 = '$wr_42',
                    wr_43 = '$wr_43',
                    wr_44 = '$wr_44',
                    wr_45 = '$wr_45',
                    wr_46 = '$wr_46',
                    wr_47 = '$wr_47',
                    wr_48 = '$wr_48',
                    wr_49 = '$wr_49',
                    wr_50 = '$wr_50',
					wr_51 = '$wr_51',
                    wr_52 = '$wr_52',
                    wr_53 = '$wr_53',
                    wr_54 = '$wr_54',
                    wr_55 = '$wr_55',
                    wr_56 = '$wr_56',
                    wr_57 = '$wr_57',
                    wr_58 = '$wr_58',
                    wr_59 = '$wr_59',
                    wr_60 = '$wr_60',
					wr_61 = '$wr_61',
                    wr_62 = '$wr_62',
                    wr_63 = '$wr_63',
                    wr_64 = '$wr_64',
                    wr_65 = '$wr_65',
                    wr_66 = '$wr_66',
                    wr_67 = '$wr_67',
                    wr_68 = '$wr_68',
                    wr_69 = '$wr_69',
                    wr_70 = '$wr_70'
					";
    sql_query($sql);

    $wr_id = mysql_insert_id();

    // 부모 아이디에 UPDATE
    sql_query(" update $write_table set wr_parent = '$wr_id' where wr_id = '$wr_id' ");

    // 새글 INSERT
    //sql_query(" insert into $g4[board_new_table] ( bo_table, wr_id, wr_parent, bn_datetime ) values ( '$bo_table', '$wr_id', '$wr_id', '$g4[time_ymdhis]' ) ");
    sql_query(" insert into $g4[board_new_table] ( bo_table, wr_id, wr_parent, bn_datetime, mb_id ) values ( '$bo_table', '$wr_id', '$wr_id', '$g4[time_ymdhis]', '$member[mb_id]' ) ");

    // 게시글 1 증가
    sql_query("update $g4[board_table] set bo_count_write = bo_count_write + 1 where bo_table = '$bo_table'");
}

alert("견적문의를 해주셔서 감사합니다.\\n\\n담당자가 확인하여 바로 연락드리겠습니다.", $g4[path]);
?>