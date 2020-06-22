<?
function leftmenu($skin_dir=""){
	global $g5,$fmenu,$tp,$com_menu,$cmenu;
	if ($skin_dir){
			$leftmenu_skin_path = G5_PATH."/skin/leftmenu/$skin_dir";
			$leftmenu_skin_url = G5_URL."/skin/leftmenu/$skin_dir";
	}else{
			$leftmenu_skin_path = G5_PATH."/skin/leftmenu/01";
			$leftmenu_skin_url = G5_URL."/skin/leftmenu/01";
	}

	ob_start();
	include_once "$leftmenu_skin_path/leftmenu.skin.php";
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

function topmenu($skin_dir=""){
	global $g5,$fmenu,$tp;
	if ($skin_dir){
			$topmenu_skin_path = G5_PATH."/skin/topmenu/$skin_dir";
			$topmenu_skin_url = G5_URL."/skin/topmenu/$skin_dir";
	}else{
			$topmenu_skin_path = G5_PATH."/skin/topmenu/h01";
			$topmenu_skin_url = G5_URL."/skin/topmenu/h01";
	}

	ob_start();
	include_once "$topmenu_skin_path/topmenu.skin.php";
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

?>