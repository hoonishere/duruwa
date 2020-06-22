<style>
/* ----------------------------------------------------------- */
/* ------------------------ 헤더 영역 ------------------------ */
/* ----------------------------------------------------------- */

#navigation {
  width: 1024px;
	position:relative;
	height: 76px;
	left:-20px;
	top:-10px;
	padding-top: 8px;
	background-color:#0a83a0;
	background: url(<?=$topmenu_skin_path?>/img/menu_bg.png) no-repeat 0 0;
}
#navigation li {
	float:left;
	font-size: 1.25em;
	line-height: 3;
	font-weight: bold;
	padding:0px 8px 0px 68px;
	background: url(<?=$topmenu_skin_path?>/img/main_menu_line.gif) no-repeat 25px 15px;
}
#navigation li.first {
  background: none;
}
#navigation li a {
	color: #fff;
}
#navigation li a:hover, #navigation li a:focus {
	color: #fff;
	text-decoration:none;
}
#navigation li ul {
	position: absolute;
	width: 1000px;
	top: 58px;
}
#navigation li ul li {
	float:left;
	font-size: 0.75em;
	padding: 0;
	margin-top: -5px;
	line-height: 2.5;
	font-weight: bold;
	background: none;
}
#navigation li ul li.left {
  background: url(<?=$topmenu_skin_path?>/img/subBar_left.png) no-repeat left 0px;
	padding-left: 10px;
}
#navigation li ul li {
  background: url(<?=$topmenu_skin_path?>/img/subBar_middle.png) no-repeat -1px 0px;
}
#navigation li ul li.right {
  	background: url(<?=$topmenu_skin_path?>/img/subBar_right.png) no-repeat right 0px;
	padding-right: 10px;
}
#navigation li ul li a {
	padding:0px 8px;
	color: #7f7f7f;
}
#navigation li ul a:hover, #navigation li ul a:focus {
	color: #0a83a0;
	text-decoration:none;
}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js "></script>
<!--[if lt IE 9]> <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->

<script>
$(function(){
	//메인메뉴 컨트롤
	var arrayX = ["10px","90px","195px","380px","460px"];
	$("ul.naviSub").hide();
	
	$("ul#navigation > li").hover(function(){
		$("ul.naviSub").hide();
		$("ul.naviSub").css("left",arrayX[$(this).index()]);
		$("ul.naviSub:not(:animated)",this).slideDown("fast");
		$(">a",this).css("color","#a4dde2");
	},
	function(){
		$("ul.naviSub").hide();
		$(">a",this).css("color","#fff");
		$("ul.naviSub:not(:animated)",this).slideUp("fast");
	});
});
</script>
<ul id="navigation">
  <li class="first"><a href="m_1_1.php">회사소개</a>
    <ul class="naviSub">
      <li class="left"><a href="m_1_1.php">대표이사 인사말</a></li>
      <li><a href="m_1_2.php">회사연혁</a></li>
			<li><a href="m_1_3.php">생산공정</a></li>
			<li><a href="m_1_4.php">인증특허</a></li>
			<li><a href="m_1_5.php">채용정보</a></li>
			<li class="right"><a href="m_1_6.php">찾아오시는길</a></li>
    </ul>
  </li>
  <li><a href="m_2_1.php">제품소개</a>
    <ul class="naviSub">
       <li class="left"><a href="m_2_1.php?CatNo=1">LEGEND Series</a></li>
<li ><a href="m_2_1.php?CatNo=2">Black Hawk Series</a></li>
<li ><a href="m_2_1.php?CatNo=12">Dokdo Series</a></li>
<li ><a href="m_2_1.php?CatNo=14">REX III Series</a></li>
<li ><a href="m_2_1.php?CatNo=13">REX Q Series</a></li>
<li ><a href="m_2_1.php?CatNo=16">MICRO (m-ATX)</a></li>
<li class="right"><a href="m_2_1.php?CatNo=17">SLIM (TFX Type)</a></li>
    </ul>
  </li>
  <li><a href="m_3_1.php">총판및대리점현황</a>
    <ul class="naviSub">
      <li class="left"><a href="m_3_1.php">총판및대리점현황</a></li>
      <li><a href="m_3_2.php">OEM/ODM 총판문의</a></li>
      <li class="right"><a href="m_3_3.php">대량구매문의</a></li>
    </ul>
  </li>
  <li><a href="m_4_1.php">고객지원</a>
    <ul class="naviSub">
      <li class="left"><a href="m_4_1.php">AS규정</a></li>
      <li><a href="m_4_3.php">AS문의하기</a></li>
      <li><a href="m_4_4.php">AS진행상황</a></li>
      <li><a href="m_4_6.php">개발의뢰</a></li>
      <li class="right"><a href="m_4_2.php">FAQ</a></li>
    </ul>
  </li>
	<li><a href="m_5_1.php">커뮤니티</a>
    <ul class="naviSub">
      <li class="left"><a href="m_5_3.php">뉴스 및 공지사항</a></li>
      <li><a href="m_5_1.php">자유게시판</a></li>
      <li><a href="m_5_2.php">리뷰/필드테스트</a></li>
			<li class="right"><a href="m_4_5.php">이벤트</a></li>
    </ul>
  </li>
</ul>