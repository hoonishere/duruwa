<?if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 ?>
<html>
<body>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>[<?=$_POST[wr_1]?>]<?=$_POST[wr_2]?>님의 문의메일</title>
</head>

<table width="690" border="0" cellpadding="0" cellspacing="0" align="center" style="font-family:Dotum">
	
	<tbody>
	<tr>
			<td style="padding:40px 24px 0 34px;border-left:1px solid #d8d8d8;border-right:1px solid #d8d8d8;border-top:1px solid #d8d8d8">
			<a href="http://www.certkorea.co.kr" target="_blank"><img src="http://bz130614f.ilogin.biz/include/header/force/img/top_logo.png" border="0"></a>
			</td>
	</tr>
	<tr>
			<td style="padding:0 34px;border-left:1px solid #d8d8d8;border-right:1px solid #d8d8d8">
<p style="font-size:16px;vertical-align:top"><strong>문의정보</strong></p>

<table cellpadding="0" cellspacing="0" style="width:620px;border-top:1px #bcbcbc solid;border-bottom:1px #bcbcbc solid">
<colgroup><col width="140"><col>
</colgroup><tbody>
<tr>
<th style="border-top:1px #e6e6e6 solid;border-right:1px #e6e6e6 solid;background-color:#fafafa;font:11px/1.2em dotum;text-align:left;color:#888"><p style="margin:0;padding:8px 10px 7px">접수일시</p></th>
<td style="border-top:1px #e6e6e6 solid;padding:6px 10px 5px;font:12px/1.4em verdana;color:#444"><?=date("Y-m-d H:i:s")?></td>
</tr>
<tr>
<th style="border-top:1px #e6e6e6 solid;border-right:1px #e6e6e6 solid;background-color:#fafafa;font:11px/1.2em dotum;text-align:left;color:#888"><p style="margin:0;padding:8px 10px 7px">회사명</p></th>
<td style="border-top:1px #e6e6e6 solid;padding:6px 10px 5px;font:12px/1.4em verdana;color:#444"><?=$_POST[wr_1]?></td>
</tr>

<tr>
<th style="border-top:1px #e6e6e6 solid;border-right:1px #e6e6e6 solid;background-color:#fafafa;font:11px/1.2em dotum;text-align:left;color:#888"><p style="margin:0;padding:8px 10px 7px">담당자명</p></th>
<td style="border-top:1px #e6e6e6 solid;padding:6px 10px 5px;font:12px/1.4em verdana;color:#444"><?=$_POST[wr_2]?></td>
</tr>
<tr>
<th style="border-top:1px #e6e6e6 solid;border-right:1px #e6e6e6 solid;background-color:#fafafa;font:11px/1.2em dotum;text-align:left;color:#888"><p style="margin:0;padding:8px 10px 7px">전화번호</p></th>
<td style="border-top:1px #e6e6e6 solid;padding:6px 10px 5px;font:12px/1.4em verdana;color:#444"><?=$_POST[wr_3]?></td>
</tr>
<tr>
<th style="border-top:1px #e6e6e6 solid;border-right:1px #e6e6e6 solid;background-color:#fafafa;font:11px/1.2em dotum;text-align:left;color:#888"><p style="margin:0;padding:8px 10px 7px">휴대폰</p></th>
<td style="border-top:1px #e6e6e6 solid;padding:6px 10px 5px;font:12px/1.4em verdana;color:#444"><?=$_POST[wr_4]?></td>
</tr>
<tr>
<th style="border-top:1px #e6e6e6 solid;border-right:1px #e6e6e6 solid;background-color:#fafafa;font:11px/1.2em dotum;text-align:left;color:#888"><p style="margin:0;padding:8px 10px 7px">이메일</p></th>
<td style="border-top:1px #e6e6e6 solid;padding:6px 10px 5px;font:12px/1.4em verdana;color:#444"><?=$_POST[wr_5]?></td>
</tr>
</tbody></table>
<br>
<br>
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tbody><tr>
									<td height="30" style="font-size:16px;vertical-align:top">
											<strong>문의 내용</strong>
									</td>
							</tr>
							<tr>
									<td>
											<table width="100%" cellpadding="0" cellspacing="0" border="0">
													<tbody>
													<tr>
															<td style="border: 1px solid #ebebeb;border-bottom:none;background-color:#fafafa">&nbsp;&nbsp;</td>
													</tr>
													<tr>
															<td style="padding:15px 18px 0;border-left:1px solid #ebebeb;border-right:1px solid #ebebeb;font-family:Verdana,Dotum;font-size:12px;color:#444;background-color:#fafafa">
																	<table width="100%" cellpadding="0" cellspacing="0" border="0">
																			<tbody><tr>
																					<td style="padding:18px 15px;border-top:1px solid #ebebeb;font-size:12px;line-height:20px;background:#fff">
																					<?=nl2br($_POST[wr_content])?>
																					</td>
																			</tr>
																	</tbody></table>
															</td>
													</tr>
													<tr>
															<td style="border: 1px solid #ebebeb;border-top:none;background-color:#fafafa">&nbsp;&nbsp;</td>
													</tr>
											</tbody></table>
									</td>
							</tr>
							<tr>
									<td height="40"></td>
							</tr>
							<tr>
									<td style="text-align:center;height:30px;padding-bottom:20px;">
											<a href="http://<?=$_SERVER[HTTP_HOST]?>/bbs/board.php?bo_table=<?=$_POST[bo_table]?>&wr_id=<?=$wr_id?>" style="padding:5px 10px;background-color:#000;color:#fff;border-radius:19px;text-decoration:none;font-size:12px;" target="_blank" >문의보기</a>
									</td>
							</tr>
					</tbody></table>
			</td>
	</tr>


</tbody></table>

<!-- 	<?if($_POST[file][count] > 0){ /////////// 파일이 존재할 경우 뿌려주기 위해서~?>
	<div style="background:#ca1111; width:24px; height:3px; margin:25px 0 0px 0"></div>
	<div style="font-weight:bold;">파일첨부 다운로드</div>
		<ul style="margin-top:5px;border-top:1px solid #ddd;">
			<?for($j = 0; $j < $_POST[file][count]; $j++){?>
				<li style="border-bottom:1px solid #ddd;padding:3px 0;"><a href="<?=$_POST[file][$j][href]?>">- <?=$_POST[file][$j][source]?></a></li>
			<?}?>
		</ul>
	<?}?> -->
</body>
</html>