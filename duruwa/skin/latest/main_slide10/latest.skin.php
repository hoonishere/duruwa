<?include_once(G5_LIB_PATH.'/thumbnail.lib.php');?>
<?
$image_width = 1000;
$image_height = 500;
?>
<style>
/*
 *	generated by WOW Slider 4.2
 *	template Native
 */

#wowslider-container1 { 
	zoom: 1; 
	position: relative; 
	max-width:994px;
	margin:0px auto;
	right:0px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container1{ width:994px }
#wowslider-container1 .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container1 .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container1 .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container1 .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container1 img{
	max-width: none !important;
}
#wowslider-container1 .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container1 a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container1  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container1  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container1  .wsl{
	display:none;
}
#wowslider-container1 sound, 
#wowslider-container1 object{
	position:absolute;
}


#wowslider-container1  .ws_bullets { 
	padding: 10px 0 0 0 ; 
}
#wowslider-container1 .ws_bullets a { 
	width:15px;
	height:15px;
	background: url(<?=$latest_skin_url?>/img/bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:1px;
	color:transparent;
}
#wowslider-container1 .ws_bullets a:hover{
	background-position: 0 50%;
}
#wowslider-container1 .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container1 a.ws_next, #wowslider-container1 a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-22px;
	z-index:60;
	height: 45px;
	width: 45px;
	background-image: url(./arrows.png);
}
#wowslider-container1 a.ws_next{
	background-position: 100% 0;
	right:11px;
}
#wowslider-container1 a.ws_prev {
	left:11px;
	background-position: 0 0; 
}
* html #wowslider-container1 a.ws_next,* html #wowslider-container1 a.ws_prev{display:block}
#wowslider-container1:hover a.ws_next, #wowslider-container1:hover a.ws_prev {display:block}

/*playpause*/
#wowslider-container1 .ws_playpause {
	display:none;
    width: 45px;
    height: 45px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -22px;
    margin-top: -22px;
    z-index: 59;
}

#wowslider-container1:hover .ws_playpause {
	display:block;
}

#wowslider-container1 .ws_pause {
    background-image: url(./pause.png);
}

#wowslider-container1 .ws_play {
    background-image: url(./play.png);
}

#wowslider-container1 .ws_pause:hover, #wowslider-container1 .ws_play:hover {
    background-position: 100% 100% !important;
}/* bottom center */
#wowslider-container1  .ws_bullets {
    bottom: 10px;
	left:92%;
}
#wowslider-container1  .ws_bullets div{
	left:-50%;
}
#wowslider-container1 .ws-title{
	position:absolute;
	display:block;
	bottom: 17px;
	left: 0px;
	margin: 9px;
	padding:15px;
	background:#FFFFFF;
	color:#333333;
	z-index: 50;
	font-family:"Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
	font-size: 14px;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	
}
#wowslider-container1 .ws-title div{
	padding-top:5px;
	font-size: 12px;
}

#wowslider-container1 .ws_images ul{
	animation: wsBasic 21.6s infinite;
	-moz-animation: wsBasic 21.6s infinite;
	-webkit-animation: wsBasic 21.6s infinite;
}
@keyframes wsBasic{0%{left:-0%} 5.09%{left:-0%} 8.33%{left:-100%} 13.43%{left:-100%} 16.67%{left:-200%} 21.76%{left:-200%} 25%{left:-300%} 30.09%{left:-300%} 33.33%{left:-400%} 38.43%{left:-400%} 41.67%{left:-500%} 46.76%{left:-500%} 50%{left:-600%} 55.09%{left:-600%} 58.33%{left:-700%} 63.43%{left:-700%} 66.67%{left:-800%} 71.76%{left:-800%} 75%{left:-900%} 80.09%{left:-900%} 83.33%{left:-1000%} 88.43%{left:-1000%} 91.67%{left:-1100%} 96.76%{left:-1100%} }
@-moz-keyframes wsBasic{0%{left:-0%} 5.09%{left:-0%} 8.33%{left:-100%} 13.43%{left:-100%} 16.67%{left:-200%} 21.76%{left:-200%} 25%{left:-300%} 30.09%{left:-300%} 33.33%{left:-400%} 38.43%{left:-400%} 41.67%{left:-500%} 46.76%{left:-500%} 50%{left:-600%} 55.09%{left:-600%} 58.33%{left:-700%} 63.43%{left:-700%} 66.67%{left:-800%} 71.76%{left:-800%} 75%{left:-900%} 80.09%{left:-900%} 83.33%{left:-1000%} 88.43%{left:-1000%} 91.67%{left:-1100%} 96.76%{left:-1100%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 5.09%{left:-0%} 8.33%{left:-100%} 13.43%{left:-100%} 16.67%{left:-200%} 21.76%{left:-200%} 25%{left:-300%} 30.09%{left:-300%} 33.33%{left:-400%} 38.43%{left:-400%} 41.67%{left:-500%} 46.76%{left:-500%} 50%{left:-600%} 55.09%{left:-600%} 58.33%{left:-700%} 63.43%{left:-700%} 66.67%{left:-800%} 71.76%{left:-800%} 75%{left:-900%} 80.09%{left:-900%} 83.33%{left:-1000%} 88.43%{left:-1000%} 91.67%{left:-1100%} 96.76%{left:-1100%} }

#wowslider-container1  .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	position:absolute;
	z-index: -1;
	left:-1.01%;
	top:-2.17%;
	width:102.01%;
	height:106.28%;
}
* html #wowslider-container1 .ws_shadow{/*ie6*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src='engine1/bg.png', sizingMethod='scale');
}
*+html #wowslider-container1 .ws_shadow{/*ie7*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src='engine1/bg.png', sizingMethod='scale');
}

</style>
<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
<?
$image_width = 1000;
$image_height = 500;
?>
<? for ($i=0; $i<count($list); $i++) { ?>

<?php
	$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $image_width, $image_height);

	if($thumb['src']) {
			$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$image_width.'" height="'.$image_height.'">';
	} else {
			$img_content = '<span style="width:'.$image_width.'px;height:'.$image_height.'px">no image</span>';
	}
?>
<li><?if(strlen($list[$i][wr_link1]) > 0){?><a href="<?=set_http($list[$i][wr_link1])?>"><?}?><?=$img_content?><?if(strlen($list[$i][wr_link1]) > 0){?></a><?}?></li>
<? } ?>
</ul></div>
<div class="ws_bullets"><div>
<? for ($i=0; $i<count($list); $i++) { ?>
<a href="#" title=""><?=($i+1)?></a>
<? } ?>
</div></div>
</div>
<script type="text/javascript" src="<?=$latest_skin_url?>/js/wowslider.js"></script>
<script type="text/javascript" src="<?=$latest_skin_url?>/js/script_main.js"></script>
<!-- End WOWSlider.com BODY section -->