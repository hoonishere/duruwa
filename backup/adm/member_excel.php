<?
include_once("./_common.php");
echo '<meta charset="utf-8">';
/**/
@Header("Content-type: application/vnd.ms-excel");
@Header("Content-type: charset=utf-8");
@header("Content-Disposition: attachment; filename=member_".date("YmdHis").".xls");
@Header("Content-Description: PHP4 Generated Data");
@Header("Pragma: no-cache");
@Header("Expires: 0");

$sql_common = " from {$g5['member_table']} ";

$sql_search = " where (1) ";
if ($stx) {
		$sql_search .= " and ( ";
		switch ($sfl) {
				case 'mb_point' :
						$sql_search .= " ({$sfl} >= '{$stx}') ";
						break;
				case 'mb_level' :
						$sql_search .= " ({$sfl} = '{$stx}') ";
						break;
				case 'mb_tel' :
				case 'mb_hp' :
						$sql_search .= " ({$sfl} like '%{$stx}') ";
						break;
				default :
						$sql_search .= " ({$sfl} like '{$stx}%') ";
						break;
		}
		$sql_search .= " ) ";
}
if ($mb_1) {
	$sql_search .= " and ( ";
	$sql_search .= "mb_1 = '$_GET[mb_1]'";
	$sql_search .= " ) ";
}
if ($mb_2) {
	$sql_search .= " and ( ";
	$sql_search .= "mb_2 = '$_GET[mb_2]'";
	$sql_search .= " ) ";
}

if ($is_admin != 'super')
		$sql_search .= " and mb_level <= '{$member['mb_level']}' ";

if (!$sst) {
		$sst = "mb_datetime";
		$sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";
$sql = " select * {$sql_common} {$sql_search} {$sql_order} ";
$rowList = getList($sql);

?>
<table border="1">
<tr>
        <th>아이디</th>
				<th>이름</th>
				<th>이메일</th>
				
				<th>휴대폰번호</th>
				<th>전화번호</th>
				<th>주소(우편번호)</th>
				<th>주소</th>
				<th>SMS 수신</th>
        <th>메일 수신</th>
        <th>등록일</th>
    </tr>
    <? 
		$j = 1;
		foreach($rowList as $list) {
			$write = $list;
			?>
    <tr> 
				<td class=""><?=$write[mb_id]?></td>
				<td class=""><?=$write[mb_name]?></td>
				<td class=""><?=$write[mb_email]?></td>
				<td class=""><?=$write[mb_hp]?></td>
				<td class=""><?=$write[mb_tel]?></td>
				<td class=""><?=$write[mb_zip]?></td>
				<td class=""><?=$write[mb_addr1]?> <?=$write[mb_addr2]?></td>
				<td class=""><?if($write[mb_mailling] == "1"){ echo "O";}else{ echo "X";}?></td>
				<td class=""><?if($write[mb_sms] == "1"){ echo "O";}else{ echo "X";}?></td>
				<td class=""><?=$write[mb_datetime]?></td>
    </tr>
    <? $j++;} // end for ?>
</table>