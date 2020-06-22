<?
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$footer_skin_url.'/footer_inc.css">', 10);
?>

<?//php echo popular('basic'); // 인기검색어  ?>
<?//php echo visit('basic'); // 접속자집계 ?>
<?
// Top 바로가기 script include
include_once(G5_PATH."/include/topbtn/force/topbtn_inc.php");
?>
<div class="footer_site_link">
	<ul>
		<li><a href="#null" onclick="window.open('<?=G5_URL?>/privacy.php','privacy','width=750,height=700,scrollbars=yes')">개인정보취급방침</a></li>
		<li> | </li>
		<li><a href="#null" onclick="window.open('<?=G5_URL?>/terms.php','terms','width=750,height=700,scrollbars=yes')">이용약관</a></li>
		<li> | </li>
		<li><a href="#null">이메일 무단수집거부</a></li>
	</ul>
</div>

<div class="footer_t">
	<div class="footer_company">(주)드루와 뷰티 아카데미</div>
	<div class="footer_txt">
		<p>사업자등록번호 : 850-86-00336 (학원등록 :제 7206호) / 서울특별시 송파구 백제고분로37길 8 / Tel : 02-2038-0844 / Fax : 02-6959-9188 / E-mail : bestschool123@naver.com</p>
		<p>Copyright&copy; 2016 <b>드루와 뷰티 아카데미</b>. All Rights Reserved.</p>
	</div>
</div>