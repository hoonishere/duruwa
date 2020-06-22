<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<style>
a.active	{background-position: top left;}
</style>
<script>
	$(function(){
		var ul_cur_idx = null;
		var li_cur_idx = 0;
		var bullet_li_cur_idx = 0;

		$("ul.board_gallery3 > li > a.photo").live("click",function(){
			bullet_li_cur_idx = 0;
			var $aobj = $(this);

			$("ul.board_gallery3 > li > a.photo").children("div").css("color", "#333");
			$("ul.board_gallery3 > li > a.photo").children("div").css("font-weight", "normal");


			ul_idx = $("ul.board_gallery3").index($aobj.parent().parent());
			li_cur_idx = $("ul.board_gallery3:eq(" + ul_idx + ") > li").index($aobj.parent());

			if(ul_cur_idx == null || ul_idx != ul_cur_idx){
				$(".pview").remove();
				$aobj.parent().parent().after('<div style="clear:both;"></div><div class="pview" style="margin-bottom:6px;"></div>');
			}

			$( ".pview" ).load( "<?=$board_skin_url?>/inc_gallery4.php?wr_id=" + $(this).attr('id') + "&bo_table=<?=$bo_table?>", function() {
				if(ul_cur_idx == null || ul_idx != ul_cur_idx){
					ul_cur_idx = ul_idx;
					var ul_height = $aobj.parent().parent().offset();
					$('html, body').animate( {scrollTop: ul_height.top + "px" } );
				}else{
					var ul_height = $aobj.parent().parent().offset();
					$('html, body').scrollTop(ul_height.top);
				}
			});
			
			$aobj.children("div").css("color", "#0072bb");
			$aobj.children("div").css("font-weight", "bold");
		});
		
		$("ul.pbullet > li > a").live("click", function(){
			bullet_li_cur_idx = $('ul.pbullet > li').index($(this).parent());

			$("ul.pbullet > li > a").css("background-position", "top right");
			$("#g_img").append( '<img id="oimg" src="' + $("#pimg").attr("src") + '" alt="" style="overflow:hidden;width:690px;height:350px;" />');
			imghref = $(this).attr('href');
			$("#pimg").attr("src", $(this).attr('href'));

			$("#oimg").stop().fadeOut( 500, function() { $("#oimg").remove(); } );
			$("#pimg").css("display", "none").stop().fadeIn( 500 );

			$(this).css("background-position", "top left");
			return false;
		});
		$("#close_btn").live("click", function(){
			$(".pview").slideUp("300");
			$(this).parent().parent().after('<div style="clear:both;"></div><div class="pview" style="margin-bottom:6px;"></div>');

			ul_cur_idx = null;
			li_cur_idx = 0;
			bullet_li_cur_idx = 0;
			$("ul.board_gallery3 > li > a.photo").children("div").css("color", "#333");
			$("ul.board_gallery3 > li > a.photo").children("div").css("font-weight", "normal");
		});

		$("#pleft").live("click",function(){
			if(bullet_li_cur_idx != 0){
				bullet_li_cur_idx = bullet_li_cur_idx - 1;
				$("ul.pbullet > li > a").css("background-position", "top right");
				$("ul.pbullet > li:eq(" + bullet_li_cur_idx + ") > a").css("background-position", "top right");
				$("#g_img").append( '<img id="oimg" src="' + $("#pimg").attr("src") + '" alt="" style="overflow:hidden;width:690px;height:350px;" />');
				imghref = $("ul.pbullet > li:eq(" + bullet_li_cur_idx + ") > a").attr('href');
				$("#pimg").attr("src", $("ul.pbullet > li:eq(" + bullet_li_cur_idx + ") > a").attr('href'));

				$("#oimg").stop().fadeOut( 500, function() { $("#oimg").remove(); } );
				$("#pimg").css("display", "none").stop().fadeIn( 500 );

				$("ul.pbullet > li:eq(" + bullet_li_cur_idx + ") > a").css("background-position", "top left");

			}else{
				if(li_cur_idx == 0 && ul_idx == 0){
					return false;
				}

				if(li_cur_idx == 0 && ul_idx > 0){
					li_cur_idx = 3;
					ul_idx = ul_idx - 1;
				}else{
					li_cur_idx = li_cur_idx - 1;
				}
				
//				alert("ul.board_gallery3:eq(" + ul_idx + ") > li:eq(" + li_cur_idx + ") > a.photo");
				var $aobj= $("ul.board_gallery3:eq(" + ul_idx + ") > li:eq(" + li_cur_idx + ") > a.photo");
				$("ul.board_gallery3 > li > a.photo").children("div").css("color", "#333");
				$("ul.board_gallery3 > li > a.photo").children("div").css("font-weight", "normal");

				ul_idx = $("ul.board_gallery3").index($aobj.parent().parent());
				li_cur_idx = $("ul.board_gallery3:eq(" + ul_idx + ") > li").index($aobj.parent());

				if(ul_cur_idx == null || ul_idx != ul_cur_idx){
					$(".pview").remove();
					$aobj.parent().parent().after('<div style="clear:both;"></div><div class="pview" style="margin-bottom:6px;"></div>');
				}

				$( ".pview" ).load( "<?=$board_skin_url?>/inc_gallery4.php?wr_id=" + $aobj.attr('id') + "&bo_table=<?=$bo_table?>", function() {
					if(ul_cur_idx == null || ul_idx != ul_cur_idx){
						ul_cur_idx = ul_idx;
						var ul_height = $aobj.parent().parent().offset();
						$('html, body').animate( {scrollTop: ul_height.top + "px" } );
					}else{
						var ul_height = $aobj.parent().parent().offset();
						$('html, body').scrollTop(ul_height.top);
					}
				});
				$aobj.children("div").css("color", "#0072bb");
				$aobj.children("div").css("font-weight", "bold");
				bullet_li_cur_idx = 0;
			}
		});
		$("#pright").live("click",function(){
			if((bullet_li_cur_idx+1) != $(".pbullet > li").length){
				bullet_li_cur_idx = bullet_li_cur_idx + 1;
				$("ul.pbullet > li > a").css("background-position", "top right");
				$("ul.pbullet > li:eq(" + bullet_li_cur_idx + ") > a").css("background-position", "top right");
				$("#g_img").append( '<img id="oimg" src="' + $("#pimg").attr("src") + '" alt="" style="overflow:hidden;width:690px;height:350px;" />');
				imghref = $("ul.pbullet > li:eq(" + bullet_li_cur_idx + ") > a").attr('href');
				$("#pimg").attr("src", $("ul.pbullet > li:eq(" + bullet_li_cur_idx + ") > a").attr('href'));

				$("#oimg").stop().fadeOut( 500, function() { $("#oimg").remove(); } );
				$("#pimg").css("display", "none").stop().fadeIn( 500 );

				$("ul.pbullet > li:eq(" + bullet_li_cur_idx + ") > a").css("background-position", "top left");
			}else{
				limit_li_idx = $("ul.board_gallery3:eq(" + ul_idx + ") > li").length - 1;
				if(li_cur_idx == limit_li_idx && ((ul_idx+1) == $("ul.board_gallery3").length)){
					return false;
				}
				
				if(li_cur_idx == limit_li_idx && ul_idx < $("ul.board_gallery3").length){
					li_cur_idx = 0;
					ul_idx = ul_idx + 1;
				}else{
					li_cur_idx = li_cur_idx + 1;
				}
				
//				alert("ul.board_gallery3:eq(" + ul_idx + ") > li:eq(" + li_cur_idx + ") > a.photo");
				var $aobj= $("ul.board_gallery3:eq(" + ul_idx + ") > li:eq(" + li_cur_idx + ") > a.photo");
				$("ul.board_gallery3 > li > a.photo").children("div").css("color", "#333");
				$("ul.board_gallery3 > li > a.photo").children("div").css("font-weight", "normal");

				ul_idx = $("ul.board_gallery3").index($aobj.parent().parent());
				li_cur_idx = $("ul.board_gallery3:eq(" + ul_idx + ") > li").index($aobj.parent());

				if(ul_cur_idx == null || ul_idx != ul_cur_idx){
					$(".pview").remove();
					$aobj.parent().parent().after('<div style="clear:both;"></div><div class="pview" style="margin-bottom:6px;"></div>');
				}

				$( ".pview" ).load( "<?=$board_skin_url?>/inc_gallery4.php?wr_id=" + $aobj.attr('id') + "&bo_table=<?=$bo_table?>", function() {
					if(ul_cur_idx == null || ul_idx != ul_cur_idx){
						ul_cur_idx = ul_idx;
						var ul_height = $aobj.parent().parent().offset();
						$('html, body').animate( {scrollTop: ul_height.top + "px" } );
					}else{
						var ul_height = $aobj.parent().parent().offset();
						$('html, body').scrollTop(ul_height.top);
					}
				});
				$aobj.children("div").css("color", "#0072bb");
				$aobj.children("div").css("font-weight", "bold");
				bullet_li_cur_idx = 0;
				
			}
		});
	});
</script>
<?
$image_width = 162;
$image_height = 106;

	for ($i=0; $i<count($list); $i++) { 
		$imagepath = $list[$i][file][0][path]."/".$list[$i][file][0][file];
		$noimage = $board_skin_url."/img/noimage.gif";
		//$thumfile = thumnail($imagepath, $image_width, $image_height, 100, 1, 1,1, $noimage);
		//$image = "<img src='$thumfile' width='$image_width' height='$image_height' class=image > ";
		
		$thumfile = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
		$image = "<img src='".$thumfile[src]."' width='".$image_width."' height='".$image_height."' class=image > ";

		?>
		<?if($i == 0){?>
		<ul class="board_gallery3">
		<?}?>
			<li>
			<a href="#null" id="<?=$list[$i][wr_id]?>" class="photo"><?=$image?>
			<div><?if($member[mb_level] > 6){?><a href="<?=$list[$i][href]?>"><?}?><?=cut_str($list[$i][subject],20)?><?if($member[mb_level] > 6){?></a><?}?></div></a>
			</li>
		<?if(($i+1) % 4 == 0 && $i != 0){?>
			<div style="clear:both;"></div>
    </ul>
		<div style="clear:both;"></div>
		<?}else if(count($list) - 1 == $i){?>
			<div style="clear:both;"></div>
    </ul>
		<div style="clear:both;"></div>
		<?}?>
		<?if(($i+1) % 4 == 0){?>
		<ul class="board_gallery3">
		<?}?>
	<?
	} // end for 
	?>

<? if (count($list) == 0) { echo "<div style='line-height:50px; text-align:center;'>게시물이 없습니다.</div>"; } ?>
<style>
.pview	{}
</style>