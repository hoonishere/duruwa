<? if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가  ?>
<?
// top 버튼 색깔이나 디자인변경하고 싶다면...
// css 에서 background:url("../img/ui.totop7.png") no-repeat left top;
// 위에 부분 ui.top1.png ~ ut.top7.png 까지 다 있음 변경해서 사용하면 됨.
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_URL.'/include/topbtn/force/css/ui.totop.css">', 10);
?>
<script src="<?=G5_URL?>/include/topbtn/force/js/easing.js" type="text/javascript"></script>
<script src="<?=G5_URL?>/include/topbtn/force/js/jquery.ui.totop.min.js" type="text/javascript"></script>
<script>
$(function(){
	$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>