<?php
include_once('./_common.php');

$count = count($_POST['chk_wr_id']);



if($_POST['btn_submit'] =="분류수정"){

	$sql = "update g5_board set bo_category_list='{$_POST[bo_category_list]}', bo_use_category='{$_POST[bo_use_category]}' where bo_table = '{$_POST[bo_table]}'";
	sql_query($sql);
	goto_url(G5_URL."/bbs/board.php?bo_table=$_POST[bo_table]");
}


if(!$count) {
    alert($_POST['btn_submit'].' 하실 항목을 하나 이상 선택하세요.');
}

if($_POST['btn_submit'] == '선택삭제') {
    include './delete_all.php';
} else if($_POST['btn_submit'] == '선택복사') {
    $sw = 'copy';
    include './move.php';
} else if($_POST['btn_submit'] == '선택이동') {
    $sw = 'move';
    include './move.php';
} else if($_POST['btn_submit'] == '선택수정') {
			foreach($_POST[ca_list] as  $k => $v){	
				$sql = "update g5_write_{$_POST[bo_table]} set ca_name='$v' where wr_id = '$k'";
				sql_query($sql);
			}
				goto_url(G5_URL."/bbs/board.php?bo_table=$_POST[bo_table]");
}else {
    alert('올바른 방법으로 이용해 주세요.');
}
?>