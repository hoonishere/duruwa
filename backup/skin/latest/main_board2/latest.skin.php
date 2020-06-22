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
.main_review					{position:relative;}
.main_review li			{position:relative;padding-left:45px; margin-bottom:15px;}
.main_review li:after		{content:''; display:block; width:100%; clear:both;}
.main_review li a		{display:block; text-decoration:none;}
.main_review li a h2		{font-size:12px; color:#aaaaaa; font-style:italic;}
.main_review li a h2 span		{font-size:15px; color:#555555; font-weight:bold; font-style:normal;}
.main_review li a p		{font-size:13px; color:#555555;}

.main_review li			{}

</style>

<?
$arr_cate = explode("|",$board[bo_category_list]);
?>


<ul class="main_review">
	<?for($i=0; $i < count($list) ; $i++){
		$jj=0; // 이것이 하단의 사진을 불러오는 숫자가 될 것입니다.
		for($k=0;  $k < count($arr_cate) ; $k++){
			if($list[$i][ca_name]==$arr_cate[$k]){
				$jj = $k+1;
			}
		}
		$style = "background:url('".$latest_skin_url."/img/b5.png') no-repeat left top;";
	//	$style = "background:url('".$latest_skin_url."/img/b".$jj.".png') no-repeat left top;";


		$content = cut_str(strip_tags(str_replace("&nbsp;"," ",$list[$i][wr_content])) , "20");
		?>
	<li style="<?=$style?>" >
		<a href="<?=$list[$i][href]?>">
			<h2><span><?=$list[$i][wr_name]?></span> - <?=date("Y.m.d" , strtotime($list[$i][wr_datetime]))?></h2>
			<p><?=$content?></p>
		</a>
	</li>
	<?}?>
	<!-- <li>
		<a href="#">
			<h2><span>홍길동</span> - 2016.06.07</h2>
			<p>지금까지 다녔던 곳중에 최고입니다. 강...</p>
		</a>
	</li>
	<li>
		<a href="#">
			<h2><span>홍길동</span> - 2016.06.07</h2>
			<p>지금까지 다녔던 곳중에 최고입니다. 강...</p>
		</a>
	</li>
		<li>
		<a href="#">
			<h2><span>홍길동</span> - 2016.06.07</h2>
			<p>후기 같은거 잘 안쓰는데 처음으로 남겨...</p>
		</a>
	</li>
	-->

</ul>
