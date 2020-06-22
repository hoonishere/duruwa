<?if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가?>
<?include_once(G5_LIB_PATH.'/thumbnail.lib.php');?>
<style>
.lt {position:relative;}
.lt ul {margin:0px; padding:0; list-style:none}
.lt li {padding:3px 0}
.lt .cnt_cmt {display:inline-block; margin:0 0 0 3px;font-weight:bold}
</style>

<style>
.main_qna					{position:relative;}
.main_qna li			{position:relative;padding-left:45px; margin-bottom:15px;}
.main_qna li:after		{content:''; display:block; width:100%; clear:both;}
.main_qna li a		{display:block; text-decoration:none;}
.main_qna li a h2		{font-size:15px; color:#555555; font-weight:bold;}
.main_qna li a p		{font-size:12px; color:#aaaaaa; font-style:italic;}

.main_qna li			{}
</style>

<?
$arr_cate = explode("|",$board[bo_category_list]);
?>

<ul id="bxbx2" class="main_qna bxslider">
	<?for($i=0; $i < count($list) ; $i++){
			$jj=0; // 이것이 하단의 사진을 불러오는 숫자가 될 것입니다.
			for($k=0;  $k < count($arr_cate) ; $k++){
				if($list[$i][ca_name]==$arr_cate[$k]){
					$jj = $k+1;
				}
			}
			$style = "background:url('".$latest_skin_url."/img/b5.png') no-repeat left top;";
		//	$style = "background:url('".$latest_skin_url."/img/a".$jj.".png') no-repeat left top;";
		?>
		<li style="<?=$style?>">
			<a href="<?=$list[$i][href]?>">
				<h2><?=cut_str($list[$i][wr_subject] , "20")?></h2>
				<p><?=date("Y.m.d" , strtotime($list[$i][wr_datetime]))?></p>
			</a>
		</li>
	<?} //for end ?>
</ul>


<link rel="stylesheet" href="<?=$latest_skin_url?>/jquery.bxslider.css" type="text/css" />

<script>
$(function(){
	var slider = $('#bxbx2').bxSlider({
		mode: 'vertical',
	  slideMargin: 15,
		minSlides: 4,
		maxSlides: 4,
		moveSlides:1,
		slideWidth: 340,
		pager:false,
		controls:true,
		auto:true,
		pause:2500,
		onSlideAfter: function() {
			slider.stopAuto();
			slider.startAuto();
		}
	});
});
</script>