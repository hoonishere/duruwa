<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<style>
.lt {position:relative;}
.lt ul {margin:0px; padding:0; list-style:none}
.lt li {padding:3px 0}
.lt .cnt_cmt {display:inline-block; margin:0 0 0 3px;font-weight:bold}
</style>
<?
// 수강문의(bo_table=52)
//print_r2($list);
?>

<!-- <?php echo $bo_subject; ?> 최신글 시작 {
<div class="lt">
	<ul>
	<?php for ($i=0; $i<count($list); $i++) {  ?>
			<li>
					<?php
					if (isset($list[$i]['icon_new'])) echo " " . $list[$i]['icon_new'];
					if (isset($list[$i]['icon_hot'])) echo " " . $list[$i]['icon_hot'];
					//echo $list[$i]['icon_reply']." ";
					echo "<a href=\"".$list[$i]['href']."\">";
					if ($list[$i]['is_notice'])
							echo "<strong>".$list[$i]['subject']."</strong>";
					else
							echo $list[$i]['subject'];
					if ($list[$i]['comment_cnt'])
							echo $list[$i]['comment_cnt'];

					echo "</a>";
					 ?>
			</li>
	<?php }  ?>
	<?php if (count($list) == 0) { //게시물이 없을 때  ?>
	<li>게시물이 없습니다.</li>
	<?php }  ?>
	</ul>
</div>
} <?php echo $bo_subject; ?> 최신글 끝 -->


<style>
.main_qna					{position:relative; padding:3% 3% 0 3%;}
.main_qna li			{position:relative;padding-left:45px; margin-bottom:15px;}
.main_qna li:after		{content:''; display:block; width:100%; clear:both;}
.main_qna li a		{display:block; text-decoration:none;}
.main_qna li a h2		{font-size:1.3em; color:#555555; font-weight:bold; line-height:120%;}
.main_qna li a p		{font-size:1.1em; color:#aaaaaa; font-style:italic;}

.main_qna li			{}
</style>

<?
$arr_cate = explode("|",$board[bo_category_list]);
?>

<ul class="main_qna">
	<?for($i=0; $i < count($list) ; $i++){
			$jj=0; // 이것이 하단의 사진을 불러오는 숫자가 될 것입니다.
			for($k=0;  $k < count($arr_cate) ; $k++){
				if($list[$i][ca_name]==$arr_cate[$k]){
					$jj = $k+1;
				}
			}
			$style = "background:url('".$latest_skin_url."/img/a5.png') no-repeat left top;";
		?>
		<li style="<?=$style?>">
			<a href="<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>">
				<h2><?=cut_str($list[$i][wr_subject] , "20")?></h2>
				<p><?=date("Y.m.d" , strtotime($list[$i][wr_datetime]))?></p>
			</a>
		</li>
	<?} //for end ?>
	<!--
	<li>
		<a href="#">
			<h2>피부관리 수강은 언제부터 가능한가...</h2>
			<p>2016.06.07</p>
		</a>
	</li>
	<li>
		<a href="#">
			<h2>피부관리 수강은 언제부터 가능한가...</h2>
			<p>2016.06.07</p>
		</a>
	</li> -->
</ul>
