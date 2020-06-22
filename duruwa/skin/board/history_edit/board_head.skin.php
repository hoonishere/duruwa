<?
if(!$board[bo_1]) {
	$msg[]="여분필드1에 시작연도를 입력하세요";
}
if(!$board[bo_2]) {
	$msg[]="여분필드2에 마지막연도를 입력하세요 ";
	
}
if(!$board[bo_3]) {
	$msg[]="여분필드3에 월일 출력 설정을 하세요(m:월만 d:일자까지)";
}
if(!$board[bo_4]) {
	$msg[]="여분필드4에 정렬순서를 입력하세요(asc,desc)";
}

$amsg=@implode("\\n",$msg);

if($amsg) {
	alert($amsg,G5_URL."/adm/board_form.php?w=u&bo_table=".$bo_table);
}
?>
<!--- mandooya.com ---->
