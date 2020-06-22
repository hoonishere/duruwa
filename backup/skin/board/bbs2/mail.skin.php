<?
// 게시물 입력시 게시자, 관리자에게 드리는 메일을 수정하고 싶으시다면 이 파일을 수정하십시오.
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<html>
<body>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title><?=$wr_subject?> 메일</title>
</head>

<h4 class="bbs_h4">	<a href="http://dentwist.co.kr/" target="_blank">문의 정보</a></h4>
	<table width="100%" style="border-collapse:collapse; table-layout:fixed; border-bottom:1px solid #ccbeb8; border-top:1px solid #ccbeb8; background:#fff; margin-bottom:20px; font-family:'malgun gothic';" >
		<colgroup>
			<col width="20%"/>
			<col width="80%"/>
		</colgroup>	
		<tr>
			<th  bgcolor="#f3ece9" style="text-align:left; text-indent:10px; font:bold 10pt/30px 'malgun gothic';color:#222;  padding:6px 15px 6px 10px;  border-bottom:1px solid #ccbeb8;">이름</th>
			<td  style="text-align:left;  padding:6px 15px 6px 10px;  border-bottom:1px solid #ccbeb8;"> <?=$_POST[wr_name]?></td>
		</tr>
		<tr>
			<th  bgcolor="#f3ece9" style="text-align:left; text-indent:10px; font:bold 10pt/30px 'malgun gothic';color:#222;  padding:6px 15px 6px 10px;  border-bottom:1px solid #ccbeb8;">이메일</th>
			<td  style="text-align:left;  padding:6px 15px 6px 10px;  border-bottom:1px solid #ccbeb8;">
			<?=$_POST[wr_1]?>
			</td>
		</tr>
		<tr>
			<th  bgcolor="#f3ece9" style="text-align:left; text-indent:10px; font:bold 10pt/30px 'malgun gothic';color:#222;  padding:6px 15px 6px 10px;  border-bottom:1px solid #ccbeb8;">연락처</th>
			<td  style="text-align:left;  padding:6px 15px 6px 10px;  border-bottom:1px solid #ccbeb8;">
			<?=$_POST[wr_2]?>
			</td>
		</tr>


		<tr>
			<th  bgcolor="#f3ece9" style="text-align:left; text-indent:10px; font:bold 10pt/30px 'malgun gothic';color:#222;  padding:6px 15px 6px 10px;  border-bottom:1px solid #ccbeb8;">내용</th>
			<td  style="text-align:left;  padding:6px 15px 6px 10px;  border-bottom:1px solid #ccbeb8;">
				<?=nl2br($_POST[wr_content])?>
			</td>
		</tr>

	</table>
</body>
</html>
