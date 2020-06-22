<?
$str_wr_1 = @implode("|",$_POST[wr_1]);
$str_wr_content = @implode("|",$_POST[wr_content]);

$sql = " update $g5[write_prefix]$bo_table set wr_1 = '$str_wr_1', wr_content = '$str_wr_content' where wr_id = '$wr_id'";

sql_query($sql);
?>