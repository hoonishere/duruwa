<?if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once($head_skin_path.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<!-- 상단 메뉴 가로로 나열하는 소스 -->
<style>
.ulul_nav > li {float:left;width:25%;text-align:center;height:45px;}
</style>
<a id="home"></a>
<!-- top 
  <form class="navbar-form navbar-left newsletter" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter Your Email Id Here">
        </div>
        <button type="submit" class="btn btn-inverse">Subscribe</button>
    </form>
 top -->

<!-- header -->
<nav class="navbar  navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="">
      
      <div class="top_logo"><a class="navbar-brand" href="<?=G5_URL?>"><img src="<?=G5_MOBILE_URL?>/images/header/top_logo.png"  alt="HUNG-A FORMING" class="img-responsive"></a></div>
			<div class="top_lang">
				<a href="#null" style="color:#f58220;">KOREAN</a>
				<a href="#null">ENGLISH</a>
			</div>
    </div>

		
  </div><!-- container-fluid -->
	<div style="border-top:1px solid #ddd;padding:0;margin:0;">
		<ul class="ulul_nav">
			<?for($i = 0; $i < count($fmenu);$i++){?>
				<?if(count($fmenu[$i][5]) > 0){?>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="display:block;height:100%;padding-top:16px;"><?=$fmenu[$i][0]?></a>
						<ul class="dropdown-menu">
							<?for($j = 0; $j < count($fmenu[$i][5]);$j++){?>
								<li><a href="<?=$fmenu[$i][5][$j][1]?>"><?=$fmenu[$i][5][$j][0]?></a></li>
							<?}?>
						</ul>
					</li>
				<?}else{?>
				<li><a href="<?=$fmenu[$i][1]?>"><?=$fmenu[$i][0]?></a></li>
				<?}?>
			<?}?>
		</ul>
	</div>
</nav>

<!-- header -->

<?if(!defined('_INDEX_')) { // index가 아닐때만 실행?>
<!-- container 시작 -->
<div class="container">
<div class="sub_wrap">
<h1 class="title"><?=$tp[navi2]?></h1>
<?}?>