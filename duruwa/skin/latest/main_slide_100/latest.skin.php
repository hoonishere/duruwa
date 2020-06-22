<script type="text/javascript" src="<?=$latest_skin_url?>/js/superslide.2.1.js"></script>
<style>

.slider {
width: 100%;
min-width: 960px;
height: 470px;
position: relative;
overflow: hidden;
background: #fff;
text-align: center;
delaytime: 40000;
}


.slider {
	width:100%;
	min-width:960px;
	height:470px;
	position:relative;
	overflow:hidden;
	background:#fff;
	text-align:center;
        delaytime:40000;
}
.slider .bd {
	width:960px;
	position:absolute;
	left:50%;
	margin-left:-480px
}
.slider .bd li {
	width:960px;
	overflow:hidden;
}
.slider .bd li img {
	display:block;
	width:960px;
	height:470px;
}
.slider .tempWrap {

	overflow:visible !important
}

.slider .hd {
	position:absolute;
	width:100%;
	left:0;
	z-index:1;
	height:8px;
	bottom:20px;
	text-align:center;
}
.slider .hd li {
	display:inline-block;
	*display:inline;
	zoom:1;
	width:8px;
	height:8px;
	line-height:99px;
	overflow:hidden;
	margin:0 5px;
	cursor:pointer;
	filter:alpha(opacity=60);
	opacity:0.6;
}
.slider .hd li.on {
	background-position:0 0;
	filter:alpha(opacity=100);
	opacity:1;
}
.slider .pnBtn {
	position:absolute;
	z-index:1;
	top:0;
	width:100%;
	height:335px;
	cursor:pointer;
}
.slider .prev {
	left:-50%;
	margin-left:-480px;
}
.slider .next {
	left:50%;
	margin-left:480px;
}
.slider .pnBtn .blackBg {
	display:block;
	position:absolute;
	left:0;
	top:0;
	width:100%;
	height:470px;
	background:#fff;
	filter:alpha(opacity=50);
	opacity:0.5;
}
.slider .pnBtn .arrow {
	display:none;
	position:absolute;
	top:0;
	z-index:1;
	width:60px;
	height:470px;
}
.slider .pnBtn .arrow:hover {
	filter:alpha(opacity=30);
	opacity:0.3;
}
.slider .prev .arrow {
	right:-57px;
	background:url(<?=$latest_skin_url?>/img/slider-arrow.png) -120px 25% no-repeat;
}
.slider .next .arrow {
	left:-51px;
	background:url(<?=$latest_skin_url?>/img/slider-arrow.png) 0 25% no-repeat;
}


</style>
<div class="slider">
  <div class="bd">
    <ul>
<?
for ($i=0; $i<count($list); $i++) { 
	$noimage = "$latest_skin_url/img/no-image.gif";
	$list[$i][file] =get_file($bo_table, $list[$i][wr_id]);
	$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
?>
      <li><?if(strlen($list[$i][wr_link1]) > 0){?><a href="<?=set_http($list[$i][wr_link1])?>"><?}?><img src="<?=$imagepath?>" /><?if(strlen($list[$i][wr_link1]) > 0){?></a><?}?></li>  
<?}?>
    </ul>
  </div>
 <!-- 
 <div class="hd">
    <ul>
    </ul>
  </div> 
	-->
  <div class="pnBtn prev"> <span class="blackBg"></span> <a class="arrow" href="javascript:void(0)"></a> </div>
  <div class="pnBtn next"> <span class="blackBg"></span> <a class="arrow" href="javascript:void(0)"></a> </div>
</div>

<script type="text/javascript">
jQuery(".slider .bd li").first().before( jQuery(".slider .bd li").last() );
jQuery(".slider").hover(function(){
	 jQuery(this).find(".arrow").stop(true,true).fadeIn(300) 
	 },function(){ 
	 	jQuery(this).find(".arrow").fadeOut(300) });				
	 jQuery(".slider").slide(
	 	{ delayTime:1000, interTime:4000, titCell:".hd ul", mainCell:".bd ul", effect:"leftLoop",autoPlay:true, vis:3, autoPage:true, trigger:"click"}
	);
</script>