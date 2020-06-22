<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$image_width = 230;
$image_height = 170;
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>


<style>
.tab_type01					{height:40px;margin-bottom:20px;border-bottom:1px solid #ccc;}
.tab_type01 li:first-child	{margin-left:260px;}
.tab_type01 li					{float:left;margin-left:30px;}
.tab_type01 li a				{text-decoration:none;height:40px;font-family:'malgun gothic';font-size:12px;color:#333;line-height:40px;text-align:center;}
.tab_type01 li a:hover		{color:#959595;border-top:3px solid #acacac;}

body {
    font-family: Arial;
}

.tab_type01 a				{margin-right: 10px;color:#666;text-decoration:none;}
.tab_type01 a.current	{font-weight:bold;}

.portfolioContainer		{margin-bottom: 15px;}
.portfolioContainer a		{display:block;text-decoration:none;text-align:center;font-family:'malgun gothic';font-size:12px;color:#111;line-height:24px;}

.size							{margin:0 5px 30px 5px;}
.isotope-item				{z-index: 2;}
.isotope-hidden.isotope-item {pointer-events: none; z-index: 1;}

.isotope,
.isotope .isotope-item {
  /* change duration value to whatever you like */
 
    -webkit-transition-duration: 0.8s;
    -moz-transition-duration: 0.8s;
    transition-duration: 0.8s;
}
.isotope {
    -webkit-transition-property: height, width;
    -moz-transition-property: height, width;
    transition-property: height, width;
}
.isotope .isotope-item {
    -webkit-transition-property: -webkit-transform, opacity;
    -moz-transition-property: -moz-transform, opacity;
    transition-property: transform, opacity;
}
</style>

<div class="tab_type01">
	<li class=""><a href="#" data-filter="*"  class="current" >All</a></li>
	<li><a href="#" data-filter=".Conceptual" >Conceptual</a></li>
	<li><a href="#" data-filter=".Portrait">Portrait</a></li>
	<li><a href="#" data-filter=".Wedding">Wedding</a></li>
	<li><a href="#" data-filter=".Kids">Kids</a></li>
	<li><a href="#" data-filter=".landscape">landscape</a></li>
	<div class="clear"></div>
</div>

<div class="portfolioContainer" > <!--class="board_gallery"-->
	<? for ($i=0; $i<count($list); $i++) { 
		$list[$i][file] = get_file($bo_table, $list[$i][wr_id]);
	$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
	$noimage = $board_skin_url."/img/noimage.gif";
		$name= $list[$i][ca_name];

	$thumfile = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
	$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image > ";
	?>

	<div style="height:<?=$image_height +5?>px;width:<?=$image_width?>px;" class="<?=$name?> size" >
		<a href="<?=$list[$i][file][0][path]?>/<?=$list[$i][file][0][file]?>" rel="gallery"  class="pirobox_gall" title="<?=$list[$i][subject]?>"><?=$image?></a>
		<?if($is_admin){?><a href="<?=$list[$i][href]?>" class="subject_t"><?=$list[$i][subject]?></a> <?}?>
	</div>
	<? } // end for ?>

	<? if (count($list) == 0) { echo "<div style='line-height:50px; text-align:center;'>게시물이 없습니다.</div>"; } ?>
</div>

<link href="<?=$board_skin_url?>/piro/css_pirobox/style_5/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$board_skin_url?>/piro/js/jquery_1.5-jquery_ui.min.js"></script>
<script type="text/javascript" src="<?=$board_skin_url?>/piro/js/pirobox_extended_feb_2011.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$.piroBox_ext({
	piro_speed :400,
	bg_alpha : 0.5,
	piro_scroll : true,
	piro_drag :true,
	piro_nav_pos: 'bottom'
	});

}); // jquery end
</script>
<script type="text/javascript" src="<?=$board_skin_url?>/js/jquery.isotope.js"></script>
<script type="text/javascript">
$(window).load(function(){
    var $container = $('.portfolioContainer');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
 
    $('.tab_type01 a').click(function(){
        $('.tab_type01 .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});
</script>