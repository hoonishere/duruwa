<?if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once($head_skin_path.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<a id="home"></a>
<!-- 
top 
  <form class="navbar-form navbar-left newsletter" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter Your Email Id Here">
        </div>
        <button type="submit" class="btn btn-inverse">Subscribe</button>
    </form>
top 
-->
<?
/*
navigation 위치 변경시 

왼쪽으로 변경시 시작
<nav class="pushy pushy-left">
pushy-right------------>pushy-left로 변경

<button type="button" class="navbar-toggle collapsed menu-btn float_left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
float_left 클래스명 삽입 

<a class="navbar-brand" href="<?=G5_URL?>"><img src="<?=$head_skin_url?>/img/logo.png"  alt="<?=$config[cf_title]?>"></a>
main_logo-------------->navbar-brand 로 변경

-------------------------------------------------------------------------------------------------------------------------------

오른쪽으로 변경시 시작
<nav class="pushy pushy-right">
pushy-left------------>pushy-right로 변경
<button type="button" class="navbar-toggle collapsed menu-btn " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

float_left 클래스명 삭제 

<a class="main_logo" href="<?=G5_URL?>"><img src="<?=$head_skin_url?>/img/logo.png"  alt="<?=$config[cf_title]?>"></a>
navbar-brand-------------->main_logo 로 변경

css 경로 : /assets/css/pushy.css 
"pushy" 검색
*/
?>
<nav class="pushy pushy-right">
	<ul>
		<?for($i = 0; $i < count($fmenu);$i++){?>
			<?if(count($fmenu[$i][5]) > 0){?>
				<li class="pushy-submenu">
					<a href="#"><?=$fmenu[$i][0]?></a>
					<ul>
						<?for($j = 0; $j < count($fmenu[$i][5]);$j++){?>
							<li class="pushy-link"><a href="<?=$fmenu[$i][5][$j][1]?>"><?=$fmenu[$i][5][$j][0]?></a></li>
						<?}?>
					</ul>
				</li>
			<?}else{?>
				<li class="pushy-link"><a href="<?=$fmenu[$i][1]?>"><?=$fmenu[$i][0]?></a></li>
			<?}?>
		<?}?>
	</ul>
<style>
.admin_btn			{margin-top:20px; padding-left:10px;}
.admin_btn a		{display:inline-block; padding:0; margin:0; padding:10px; border:1px solid #aaa;}
</style>

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

</nav>

<div id="container">
<!-- header -->
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed menu-btn" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar top-bar"></span>
          <span class="icon-bar middle-bar"></span>
          <span class="icon-bar bottom-bar"></span>
        </button>
      <a class="navbar-brand" href="<?=G5_URL?>"><img src="<?=$head_skin_url?>/img/top_logo.png"  alt="<?=$config[cf_title]?>"></a>
    </div>
  </div><!-- container-fluid -->
</nav>
<!-- header -->

<!-- Site Overlay -->
<div class="site-overlay"></div>

<?if(!defined('_INDEX_')) { // index가 아닐때만 실행?>
<!-- container 시작 -->
<script>
$(function(){
	$(".s20_btn > a").click(function(){
		$(".s20_btn > a").removeClass();
		$(this).addClass("on20");
		idx = $(".s20_btn > a").index($(this));
		$(".s20").hide();
		$(".s20").eq(idx).show();
		return false;
	});
});
</script>

<div class="container subcontainer">
	<div class="content_title">
		<div class="title_subject"><?=$tp[navi2]?></div>
		<div class="title_bar"></div>
		<div class="title_navi">체계적이고 전문적인 드루와뷰티와 함께하세요</div>
	</div>
<?}?>