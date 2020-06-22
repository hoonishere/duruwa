<?
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$head_skin_url.'/header_inc.css">', 10);
?>
	<div class="admin_btn">
		<p>[<? if (strlen($member['mb_id']) == 0) {?>
			<a href="<?=G5_BBS_URL?>/login.php">로그인</a>
			<span>|</span> 
			<a href="<?=G5_BBS_URL?>/register.php">회원가입</a>
		<?} else {?>
			<a href="<?=G5_BBS_URL?>/logout.php">로그아웃</a>
			<span>|</span> 
			<a href="<?=G5_BBS_URL?>/member_confirm.php?url=register_form_iboard.php">회원수정</a>
			<?if($member[mb_level] > 8){?><span>|</span> <a href="<?=G5_URL?>/adm/">관리자</a><?}?>
		<?}?>]</p>
</div>
<div class="header_t" id="header_t_id">
	<h1 class="header_logo"><a href="<?=G5_URL?>"><img src="<?=$head_skin_url?>/img/top_logo.png" alt="<?=$config[cf_title]?>"></a></h1>
	<div class="header_gnb" ><?=topmenu($config[skin_top]);?></div>
	<div class="clear"></div>
</div>

<div class="clear"></div>