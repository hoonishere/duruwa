<style>
/* 중간 레이아웃 */ 
#wrapper {z-index:5;margin:0 auto;width:1010px;zoom:1} 
#wrapper:after {display:block;visibility:hidden;clear:both;content:""} 

.wrap_main{width:100%;margin:0 auto;background:#f2f2f2;} 
.section_main{padding:15px;width:980px;margin:0 auto;zoom:1;} 
.section_main:after{visibility:hidden;content:"";display:block;clear:both} 
.section_main .main{float:left;width:640px;margin-right:20px} 
.section_main .aside{float:right;width:320px;height:300px;} 

#container {margin:0 auto;z-index:4;position:relative;padding:40px 15px 20px;width:980px;min-height:500px;height:auto !important;height:500px;font-size:1em;zoom:1;} 
#container:after {display:block;visibility:hidden;clear:both;content:""} 
#container_title {margin-bottom:20px;font-size:1.2em;font-weight:bold} 

.wrap_mid{zoom:1} 
.wrap_mid:after{visibility:hidden;content:"";display:block;clear:both} 
.inner_left{float:left;padding-right:20px;zoom:1} 
.inner_left .inner_top{zoom:1} 
.inner_left .inner_top:after{visibility:hidden;content:"";display:block;clear:both} 
.inner_left .inner_top .section_mobile1{float:left;padding-right:19px;border-right:1px solid #ccc;} 
.inner_left .inner_top .section_mobile2{float:left;padding-left:20px;} 
.inner_left .inner_bot{padding-top:30px} 
.inner_right{float:right;width:300px;padding-left:19px;min-height:400px;border-left:1px solid #CCC} 

.wrap_bot{margin-top:20px;} 
/*  하단 레이아웃 */ 
</style>

<div class="wrap_main"> 
	<div class="section_main"> 
		<div class="main"><?php echo latest("zmain", "main_img", "3", "80");?></div> 
		<div class="aside"><?php echo latest("zaside", "main_img", "3", "30");?></div> 
	</div> 
</div> 

<div class="wrap_mid"> 
	<div class="inner_left"> 
		<div class="inner_top"> 
			<div class="section_mobile1"><?php echo latest("zsection_vert", "main_img", "4", "30");?></div> 
			<div class="section_mobile2"><?php echo latest("zsection_vert", "main_img", "4", "30");?></div> 
		</div> 
		<div class="inner_bot"><?php echo latest("zsection_hori", "main_img", "5", "30");?></div> 
	</div> 
	<div class="inner_right"> 
			<?php echo latest("zsection_list", "main_img", "5", "30");?> 
			<?php echo latest("zsection_bnr", "main_img", "5", "30");?> 
	</div> 
</div> 

<div class="wrap_bot"><?php echo latest("zsection_bot", "main_img", "10", "30");?></div> 

<div><?php echo latest("banner20", "main_img", "8", "30");?></div>
<div class="clear"></div>

