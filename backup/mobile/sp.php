<?
include_once("./_common.php");
include_once('./_head.php');
include_once(G5_PATH."/lib/latest.lib.php");

/*
if(!$is_member){
	alert("접근권한이 없습니다.",$g4[bbs_path]."/login.php?url=".$urlencode);
}
*/

if($p)
	$p = stripcslashes((strip_tags(trim($p))));
?>
<!-- 사이트 컨텐츠 -->
	<? 
		$p = $_GET['p'];
		if($p){
			if(file_exists(G5_MOBILE_PATH."/include/$config[skin_header]/sub/{$p}.php")){
				include_once(G5_MOBILE_PATH."/include/$config[skin_header]/sub/{$p}.php");
			}else if(file_exists(G5_MOBILE_PATH."/sub/{$p}.php")){
				include_once(G5_MOBILE_PATH."/sub/{$p}.php");
			}else{
			?>
			<div style="width:98%;">
				<?
				if(strlen($bo_table) == 0){
					$bo_table = "etc";
				}

				$local = getLocal($p, $p); // 로컬값을 구함

				$sql = " select * from $g5[write_prefix]$bo_table where wr_subject = '$local' ";
				$board = sql_fetch(" select * from g5_board where bo_table = '$bo_table' ");
				$board_skin_path = G5_PATH."/skin/board/{$board['bo_skin']}";
				$board_skin_url = G5_URL."/skin/board/{$board['bo_skin']}";
				//echo $sql;
				$row2 = sql_fetch($sql);
				$view = get_view($row2, $board, $board_skin_path, 255);
				?>
				<?if($member[mb_level] > 8 && strlen($view[wr_id]) > 0){?>
				
				<img src='<?=$g4[path]?>/skin/board/basic/img/btn_modify.gif' style="cursor:pointer;" onclick="location.href='<?=$g4[admin_path]?>/write.php?bo_table=<?=$bo_table?>&w=u&wr_id=<?=$view[wr_id]?>';"/>
				<br><br>
				<?}?>
				<?
				$html = 1;
				$view[content] = conv_content($view[wr_content], $html);
				if (strstr($sfl, "content"))
						$view[content] = search_font($stx, $view[content]);
				//$view[content] = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 name='target_resize_image[]' onclick='image_window(this)' style='cursor:pointer;' \\2 \\3", $view[content]);
				?>
				
				<?
				echo $view[content];
				?>
			</div>
			<?
			}
		}else{
			alert("잘못된접근입니다.");
		}
	?>

<script>
$(function(){
	$(".subcontainer").find("img").css("max-width", "100%");
	$(".subcontainer").find("img").css("height", "auto");
});
</script>
<!-- 사이트 컨텐츠 -->
<?
include_once('./_tail.php');
?>