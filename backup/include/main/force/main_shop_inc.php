<div id="container_skip"></div>
<link rel="stylesheet" href="<?=$main_skin_url?>/main_inc.css" type="text/css">
<div class="main_visual" >
		<?=latest("main_slide10", "main_img", 3, 20, 1);?>
</div>
		<?
		// 메인슬라이드 백그라운드 이미지로 100%
		//echo latest("main_slide_back", "61", 3, 20, 1);
		?>
		<?
		// 메인슬라이드 3장나오는 100%
		//echo latest("main_slide_100", "61", 3, 20, 1);
		?>
		<?
		// 메인슬라이드 가로 사이즈 지정 _ 밑에 페이징
		//echo latest("main_slide10", "61", 20, 3, 1);
		?>
		<?
		// 메인슬라이드 가로 사이즈 지정 _ 밑에 페이징 및 화살표
		//echo latest("main_slide11", "61", 20, 3, 1);
		?>
		<?
		// 메인슬라이드 가로 사이즈 지정 
		/*
		$arr_option = array(1000,600);
		echo latest("main_slide_basic", "61", 3, 20, 1, $arr_option);
		*/
		?>
<div class="main_center" >
	<?php if($default['de_type1_list_use']) { ?>
	<!-- 히트상품 시작 { -->
	<section class="sct_wrap">
			<header>
					<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1">히트상품</a></h2>
					<p class="sct_wrap_hdesc"><?php echo $config['cf_title']; ?> 히트상품 모음</p>
			</header>
			<?php
			$list = new item_list();
			$list->set_type(1);
			$list->set_view('it_img', true);
			$list->set_view('it_id', true);
			$list->set_view('it_name', true);
			$list->set_view('it_basic', true);
			$list->set_view('it_cust_price', true);
			$list->set_view('it_price', true);
			$list->set_view('it_icon', true);
			$list->set_view('sns', false);
			echo $list->run();
			?>
	</section>
	<!-- } 히트상품 끝 -->
	<?php } ?>

	<?php if($default['de_type2_list_use']) { ?>
	<!-- 추천상품 시작 { -->
	<section class="sct_wrap">
			<header>
					<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=2">추천상품</a></h2>
					<p class="sct_wrap_hdesc"><?php echo $config['cf_title']; ?> 추천상품 모음</p>
			</header>
			<?php
			$list = new item_list();
			$list->set_type(2);
			$list->set_view('it_id', false);
			$list->set_view('it_name', true);
			$list->set_view('it_basic', true);
			$list->set_view('it_cust_price', true);
			$list->set_view('it_price', true);
			$list->set_view('it_icon', true);
			$list->set_view('sns', false);
			echo $list->run();
			?>
	</section>
	<!-- } 추천상품 끝 -->
	<?php } ?>

	<?php if($default['de_type3_list_use']) { ?>
	<!-- 최신상품 시작 { -->
	<section class="sct_wrap">
			<header>
					<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3">최신상품</a></h2>
					<p class="sct_wrap_hdesc"><?php echo $config['cf_title']; ?> 최신상품 모음</p>
			</header>
			<?php
			$list = new item_list();
			$list->set_type(3);
			$list->set_view('it_id', false);
			$list->set_view('it_name', true);
			$list->set_view('it_basic', true);
			$list->set_view('it_cust_price', true);
			$list->set_view('it_price', true);
			$list->set_view('it_icon', true);
			$list->set_view('sns', false);
			echo $list->run();
			?>
	</section>
	<!-- } 최신상품 끝 -->
	<?php } ?>

	<?php if($default['de_type4_list_use']) { ?>
	<!-- 인기상품 시작 { -->
	<section class="sct_wrap">
			<header>
					<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=4">인기상품</a></h2>
					<p class="sct_wrap_hdesc"><?php echo $config['cf_title']; ?> 인기상품 모음</p>
			</header>
			<?php
			$list = new item_list();
			$list->set_type(4);
			$list->set_view('it_id', false);
			$list->set_view('it_name', true);
			$list->set_view('it_basic', true);
			$list->set_view('it_cust_price', true);
			$list->set_view('it_price', true);
			$list->set_view('it_icon', true);
			$list->set_view('sns', false);
			echo $list->run();
			?>
	</section>
	<!-- } 인기상품 끝 -->
	<?php } ?>

	<?php if($default['de_type5_list_use']) { ?>
	<!-- 할인상품 시작 { -->
	<section class="sct_wrap">
			<header>
					<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5">할인상품</a></h2>
					<p class="sct_wrap_hdesc"><?php echo $config['cf_title']; ?> 할인상품 모음</p>
			</header>
			<?php
			$list = new item_list();
			$list->set_type(5);
			$list->set_view('it_id', false);
			$list->set_view('it_name', true);
			$list->set_view('it_basic', true);
			$list->set_view('it_cust_price', true);
			$list->set_view('it_price', true);
			$list->set_view('it_icon', true);
			$list->set_view('sns', false);
			echo $list->run();
			?>
	</section>
	<!-- } 할인상품 끝 -->
	<?php }	 ?>

</div><!-- main_center end -->