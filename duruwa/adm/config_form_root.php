<?php
$sub_menu = "100110";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

?>

<? // sql 생성
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

if ($mb_10) {

    $sql_search .= " and ( ";
		if($mb_10 == "승인"){
			$sql_search .= "mb_10 = '$_GET[mb_10]'";
		}else{
			$sql_search .= " ( mb_10 = '' or mb_10 = '미승인' )";
		}

    $sql_search .= " ) ";
}

if ($is_admin != 'super')
    $sql_search .= " and mb_level <= '{$member['mb_level']}' ";

if (!$sst) {
    $sst = "mb_datetime";
    $sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

// 탈퇴회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_leave_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$leave_count = $row['cnt'];

// 차단회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_intercept_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$intercept_count = $row['cnt'];

$listall = '<a href="'.$_SERVER['PHP_SELF'].'" class="ov_listall">전체목록</a>';

$g5['title'] = '회원관리';
include_once('./admin.head.php');

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$colspan = 16;
?>
<style>
.tit_s																	{ padding:10px 4px; font-size:14.5px; font-weight:bold;}
table.tb_order													{width:100%; border-collapse:collapse; padding:0; margin:0;}
table.tb_order th, table.tb_order td		{padding:10px; border:1px solid #d7d7d7; text-align:left;}
table.tb_order th												{padding: 10px 0 10px 20px;text-align: left;border-bottom: 1px solid #d9d9d9;background: #f7f7f7;}
#submit_btn															{padding:8px; font-size:13.5px; background:#555; color:#fff; text-align:center; width:50px; margin:10px auto;}

</style>

<div class="tit_s">환경설정</div>
<form name="config_root" method="post" id="config_root" action="./config_form_update_root.php">
	<table class="tb_order">
		<colgroup>
			<col width="160px"/>
			<col width=""/>
		</colgroup>
		<tr>
			<th>홈페이지 제목</th>
			<td><input type="text" name="cf_title" value="<?php echo $config['cf_title'] ?>" id="cf_title" required="" class="required frm_input" size="40"></td>
		</tr>
		<tr>
			<th>접근가능 IP</th>
			<td>
				 <?php echo help('입력된 IP의 컴퓨터만 접근할 수 있습니다.<br>123.123.+ 도 입력 가능. (엔터로 구분)') ?>
				<textarea name="cf_possible_ip" id="cf_possible_ip" rows="10"><?php echo $config['cf_possible_ip'] ?></textarea>
			</td>
		</tr>
		<tr>
			<th>접근차단 IP</th>
			<td>
				 <?php echo help('입력된 IP의 컴퓨터는 접근할 수 없음.<br>123.123.+ 도 입력 가능. (엔터로 구분)') ?>
				 <textarea name="cf_intercept_ip" id="cf_intercept_ip" rows="10"><?php echo $config['cf_intercept_ip'] ?></textarea>
			</td>
		</tr>
		<tr>
			<th>방문자분석 스크립트</th>
			<td>
				<?php echo help('방문자분석 스크립트 코드를 입력합니다. 예) 구글 애널리틱스'); ?>
				<textarea name="cf_analytics" id="cf_analytics" rows="10" ><?php echo $config['cf_analytics']; ?></textarea>
			</td>
		</tr>
		<tr>
			<th>추가 메타태그</th>
			<td>
					<?php echo help('추가로 사용하실 meta 태그를 입력합니다.'); ?>
					<textarea name="cf_add_meta" id="cf_add_meta" rows="10" ><?php echo $config['cf_add_meta']; ?></textarea>
			</td>
		</tr>
		<tr>
			<th>회원가입약관</th>
			<td>
				<textarea name="cf_stipulation" id="cf_stipulation" rows="10"><?php echo $config['cf_stipulation'] ?></textarea>
			</td>
		</tr>
		<tr>
			<th>개인정보처리방침</th>
			<td>
				<textarea id="cf_privacy" name="cf_privacy" rows="10"><?php echo $config['cf_privacy'] ?></textarea>
			</td>
		</tr>
		<?
				$arr_cf_1 = explode("|" , $config['cf_1']  );
				$arr_tit = array("상호명","대표자","대표전화","FAX","주소","사업자 번호","통신판매번호","E-MAIL");
		?>
		<?for($i=0; $i<count($arr_tit); $i++){?>
		<tr style="display:none;">
			<th><?=$arr_tit[$i]?></th>
			<td><input type="text" name="cf_1_<?=($i+1)?>" value="<?php echo $arr_cf_1[$i]; ?>" id="cf_1_<?=($i+1)?>" class="frm_input" size="30"></td>
		</tr>
		<?}?>

		<!-- <tr>
			<th>상호명</th>
			<td><input type="text" name="cf_1_1" value="<?php echo $arr_cf_1[0]; ?>" id="cf_1_1" class="frm_input" size="30"></td>
		</tr>
		<tr>
			<th>대표자</th>
			<td><input type="text" name="cf_1_2" value="<?php echo $arr_cf_1[1]; ?>" id="cf_1_2" class="frm_input" size="30"></td>
		</tr>
		<tr>
			<th>대표전화</th>
			<td><input type="text" name="cf_1_3" value="<?php echo $arr_cf_1[2]; ?>" id="cf_1_3" class="frm_input" size="30"></td>
		</tr>
		<tr>
			<th>FAX</th>
			<td><input type="text" name="cf_1_4" value="<?php echo $arr_cf_1[3]; ?>" id="cf_1_4" class="frm_input" size="30"></td>
		</tr>
		<tr>
			<th>주소</th>
			<td><input type="text" name="cf_1_5" value="<?php echo $arr_cf_1[4]; ?>" id="cf_1_5" class="frm_input" size="30"></td>
		</tr>
		<tr>
			<th>사업자 번호</th>
			<td><input type="text" name="cf_1_6" value="<?php echo $arr_cf_1[5]; ?>" id="cf_1_6" class="frm_input" size="30"></td>
		</tr>
		<tr>
			<th>통신판매번호</th>
			<td><input type="text" name="cf_1_7" value="<?php echo $arr_cf_1[6]; ?>" id="cf_1_7" class="frm_input" size="30"></td>
		</tr>
		<tr>
			<th>E-MAIL</th>
			<td><input type="text" name="cf_1_8" value="<?php echo $arr_cf_1[7]; ?>" id="cf_1_8" class="frm_input" size="30"></td>
		</tr> -->
	</table>
	<input type="hidden" name="cf_1" style="width:100%;" value="<?echo $config['cf_1'] ;?>" id="cf_1" class="frm_input">

		<div id="submit_btn"> 확 인 </div>
</form>

<script>
	$(document).ready(function(){

		$("#submit_btn").on("click" , function(){
			$("#config_root").submit();
		});
		$("#cf_1_1").on("change" , function(){footer_plus();});
		$("#cf_1_2").on("change" , function(){footer_plus();});
		$("#cf_1_3").on("change" , function(){footer_plus();});

		$("#cf_1_4").on("change" , function(){footer_plus();});
		$("#cf_1_5").on("change" , function(){footer_plus();});
		$("#cf_1_6").on("change" , function(){footer_plus();});
		$("#cf_1_7").on("change" , function(){footer_plus();});
		$("#cf_1_8").on("change" , function(){footer_plus();});
	});

	function footer_plus(){
		$("#cf_1").val($("#cf_1_1").val()+"|"+$("#cf_1_2").val()+"|"+$("#cf_1_3").val()+"|"+$("#cf_1_4").val()+"|"+$("#cf_1_5").val()+"|"+$("#cf_1_6").val()+"|"+$("#cf_1_7").val()+"|"+$("#cf_1_8").val());
	}

</script>



<?php
include_once ('./admin.tail.php');
?>
