<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가


// 업로드 업데이트
	$cnt = 0;

    $sql = "select * from guploader where bo_table = '$bo_table' and mb_id = '$member[mb_id]' and bf_ip = '$_SERVER[REMOTE_ADDR]' order by bf_no";
    $qry = sql_query($sql, false);
    for ($i=0; $row=sql_fetch_array($qry); $i++) {
        $source = G5_PATH."/data/guploader/$row[bf_file]";
        $dest = G5_PATH."/data/file/$bo_table/$row[bf_file]";

        @copy($source, $dest);
        @unlink($source);


        sql_query("insert into $g5[board_file_table]
                   set bo_table = '$bo_table'
                     , wr_id = '$wr_id'
                     , bf_no = '$i'
                     , bf_source = '$row[bf_source]'
                     , bf_file = '$row[bf_file]'
                     , bf_filesize = '$row[bf_filesize]'
                     , bf_width = '$row[bf_width]'
                     , bf_height = '$row[bf_height]'
                     , bf_type = '$row[bf_type]'
                     , bf_datetime = '$row[bf_datetime]'");
		$cnt++;
    }

	sql_query(" update {$write_table} set wr_file = '{$cnt}' where wr_id = '{$wr_id}' ");

   sql_query("delete from guploader where bo_table = '$bo_table' and mb_id = '$member[mb_id]' and bf_ip = '$_SERVER[REMOTE_ADDR]'", false);


?>
