<?
include_once("./_common.php");
$count_write = 0;
$count_comment = 0;

$tmp_array = array();
$tmp_array2 = array();
$tmp_array3 = array();
if ($wr_id){ // 건별삭제
    $tmp_array[0] = $wr_id;
    $tmp_array2[0] = $wr_2;
    $tmp_array3[0] = $wr_3;
		
}else{ // 일괄삭제
    $tmp_array = $_POST[chk_wr_id];
    $tmp_array2 = $_POST[chk_wr_2];
		$tmp_array3 = $_POST[chk_wr_3];
}

if($member[mb_level] < 6){
	alert("관리자만 접근가능합니다.");
}
// 거꾸로 읽는 이유는 답변글부터 삭제가 되어야 하기 때문임
for ($i=count($tmp_array)-1; $i>=0; $i--) {
    $write = sql_fetch(" select * from $write_table where wr_id = '{$tmp_array[$i]}' ");

    // 게시글 삭제
		//echo " update $write_table set wr_2 = '{$tmp_array2[$i]}',ca_name = '{$tmp_array3[$i]}' where wr_id = '$write[wr_id]' <br> ";
    sql_query(" update $write_table set wr_2 = '{$tmp_array2[$i]}' where wr_id = '$write[wr_id]' ");
}

goto_url("./board.php?bo_table=$bo_table&page=$page" . $qstr);
?>
