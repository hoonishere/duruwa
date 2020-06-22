<?php
$sub_menu = "100110";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');


$sql = " update {$g5['config_table']}
            set cf_title = '{$_POST['cf_title']}',
                cf_possible_ip = '".trim($_POST['cf_possible_ip'])."',
                cf_intercept_ip = '".trim($_POST['cf_intercept_ip'])."',
								cf_analytics = '{$_POST['cf_analytics']}',
                cf_add_meta = '{$_POST['cf_add_meta']}',
                cf_stipulation = '{$_POST['cf_stipulation']}',
                cf_privacy = '{$_POST['cf_privacy']}',
								cf_1 = '{$_POST['cf_1']}'";
sql_query($sql);

// cf_title g5_board_group 에 있는 gr_subject도 모두 업데이트
// 왜냐??? 우린 안쓰기 때문에...
$sql = " update g5_group set gr_subject = '$_POST[cf_title]'  where gr_id = 'shop' ";
sql_query($sql);

goto_url('./config_form_root.php', false);
?>