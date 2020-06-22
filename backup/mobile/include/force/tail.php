<?if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가?>
<?if(!defined('_INDEX_')) { // index가 아닐때만 실행?>
</div>
<!-- container 시작 -->
<?}?>

<div class="footer_link">
	<a href="http://plus.kakao.com/home/%40%EB%93%9C%EB%A3%A8%EC%99%80%EB%B7%B0%ED%8B%B0" target="_blank">카카오톡 : @드루와뷰티</a>
	<span>|</span>
	<a href="http://blog.naver.com/bestschool7" target="_blank">드루와 공식블로그</a>
	<span>|</span>
	<a href="http://www.뷰티연구소.com/" target="_blank">카페</a>
	<br>
	<a href="https://www.instagram.com/comebeauty1/" target="_blank">인스타그램</a>
	<span>|</span>
	<a href="https://story.kakao.com/ch/mybeautycbe" target="_blank">카카오스토리</a>
	<span>|</span>
	<a href="http://band.us/home" target="_blank">밴드 : 드루와뷰티</a>
</div>

<footer class="spacer">
	<div class="container footer">
	<p><b>드루와 뷰티 아카데미</b></p>
	<p>사업자등록번호 : 850-86-00336 (학원등록 :제 7206호)<br>
	서울특별시 송파구 백제고분로37길 8<br>
	Tel : 02-2038-0844 / Fax : 02-6959-9188<br>
	E-mail : bestschool123@naver.com</p>
	<div class="copyright">Copyright&copy; 2016 <b>드루와 뷰티 아카데미.</b> All Rights Reserved.</div>
	</div>
</footer>


<div class='scrolltop'>
<a href="#home" class="toTop scroll"><i class="fa fa-angle-up"></i></a>
</div>


<!-- wow script -->
<script src="<?=G5_MOBILE_URL?>/include/<?=$config[skin_header]?>/assets/wow/wow.min.js"></script>

<!-- boostrap -->
<script src="<?=G5_MOBILE_URL?>/include/<?=$config[skin_header]?>/assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="<?=G5_MOBILE_URL?>/include/<?=$config[skin_header]?>/assets/mobile/touchSwipe.min.js"></script>

<!-- jquery mobile -->
<script src="<?=G5_MOBILE_URL?>/include/<?=$config[skin_header]?>/assets/respond/respond.js"></script>

<!-- menu script -->
<script src="<?=$head_skin_url?>/assets/js/pushy.js"></script>

<!-- custom script -->


<?php
if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
<!-- <a href="<?php echo get_device_change_url(); ?>" id="device_change">PC 버전으로 보기</a> -->
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>
</div><!-- </div id='container'> -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<script>
var wow = new WOW({
	boxClass:     'wowload',      // animated element css class (default is wow)
	animateClass: 'animated', // animation css class (default is animated)
	offset:       0,          // distance to the element when triggering the animation (default is 0)
	mobile:       true,       // trigger animations on mobile devices (default is true)
	live:         true        // act on asynchronously loaded content (default is true)
});
</script>

<!--[if gt IE 8]>
<script type="text/javascript">
//if(!navigator.userAgent.match(/(iPhone|android|iPad)/)){
wow.init();
//}
</script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
//if(!navigator.userAgent.match(/(iPhone|android|iPad)/)){
wow.init();
//}
</script>
<!-- <![endif]-->


<?php
include_once(G5_PATH."/tail.sub.php");
?>