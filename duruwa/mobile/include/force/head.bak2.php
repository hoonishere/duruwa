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
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=G5_URL?>"><img src="<?=$head_skin_url?>/img/logo.png"  alt="holiday crown"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			<?for($i = 0; $i < count($fmenu);$i++){?>
				<?if(count($fmenu[$i][5]) > 0){?>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$fmenu[$i][0]?> <b class="caret"></b></a>
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
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->

<?if(!defined('_INDEX_')) { // index가 아닐때만 실행?>
<!-- container 시작 -->
<div class="container">
<h1 class="title"><?=$tp[navi2]?></h1>
<?}?>