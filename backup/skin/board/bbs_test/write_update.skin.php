<?
$wr_6 = @implode("|",$_POST[wr_6]);
$sql = " update $g5[write_prefix]$bo_table set wr_6 = '$wr_6' where wr_id = '$wr_id' ";

sql_query($sql);

?>