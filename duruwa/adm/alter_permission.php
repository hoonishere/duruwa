<?
include_once("./_common.php");
if(!$is_admin){
	alert("최고관리자 권한으로 접속하세요");
}
rootAlter($_GET[mysql_db]);
alert("권한변경이 완료되었습니다.",G5_URL."/adm/config_form.php");
?>