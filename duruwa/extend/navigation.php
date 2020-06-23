<?
$fmenu = array();
$fsub_menu = array();
$sub_sub_menu = array();

// 메뉴명, 링크주소, 서브(메인) 이미지, 왼쪽메뉴타이틀이미지,컨텐츠타이틀이미지, 하위 메뉴(수정하지말것)
// 1번째 메뉴 시작
$fmenu[] = array("아카데미", G5_URL."/sp.php?p=11", "","","","");
$fsub_menu[] = array("드루와 뷰티", G5_URL."/sp.php?p=11", "","","","");
$fsub_menu[] = array("오시는길", G5_URL."/sp.php?p=12", "","","","");
$fsub_menu[] = array("강사소개", G5_URL."/sp.php?p=13", "","","","");
$fsub_menu[] = array("화장품 제조 견학", G5_URL."/sp.php?p=14", "","","","");
$fmenu[(count($fmenu)-1)][5] = $fsub_menu;
$fsub_menu = array();
// 1번째 메뉴 끝

// 2번째 메뉴 시작
$fmenu[] = array("교육과정", G5_URL."/sp.php?p=21", "","","","");
$fsub_menu[] = array("헤어", G5_URL."/sp.php?p=21", "","","","");
$fsub_menu[] = array("피부&왁싱", G5_URL."/sp.php?p=22", "","","","");
$fsub_menu[] = array("메이크업&속눈썹", G5_URL."/sp.php?p=23", "","","","");
$fsub_menu[] = array("네일아트", G5_URL."/sp.php?p=24", "","","","");
$fsub_menu[] = array("뷰티영재 대학입시반", G5_URL."/sp.php?p=25", "","","","");
$fsub_menu[] = array("속눈썹/왁싱", G5_URL."/sp.php?p=26", "","","","");
$fsub_menu[] = array("뷰티강사과정", G5_URL."/sp.php?p=27", "","","","");
$fmenu[(count($fmenu)-1)][5] = $fsub_menu;
$fsub_menu = array();
// 2번째 메뉴 끝

// 3번째 메뉴 시작
$fmenu[] = array("커뮤니티", G5_URL."/bbs/board.php?bo_table=31", "","","","");
$fsub_menu[] = array("수강후기", G5_URL."/bbs/board.php?bo_table=31", "","","","");
$fsub_menu[] = array("공지사항", G5_URL."/bbs/board.php?bo_table=32", "","","","");
$fsub_menu[] = array("드루와뉴스,이벤트", G5_URL."/bbs/board.php?bo_table=33", "","","","");
$fsub_menu[] = array("작품갤러리", G5_URL."/bbs/board.php?bo_table=34", "","","","");
$fmenu[(count($fmenu)-1)][5] = $fsub_menu;
$fsub_menu = array();
// 3번째 메뉴 끝

// 4번째 메뉴 시작
$fmenu[] = array("취업&진학", G5_URL."/bbs/board.php?bo_table=41", "","","","");
$fsub_menu[] = array("자격증정보", G5_URL."/bbs/board.php?bo_table=41", "","","","");
$fsub_menu[] = array("대학정보", G5_URL."/sp.php?p=42", "","","","");
$fsub_menu[] = array("취업정보", G5_URL."/bbs/board.php?bo_table=43", "","","","");
$fmenu[(count($fmenu)-1)][5] = $fsub_menu;
$fsub_menu = array();
// 4번째 메뉴 끝

// 5번째 메뉴시작
$fmenu[] = array("상담센터", G5_URL."/bbs/board.php?bo_table=51", "","","","");
$fsub_menu[] = array("알고가기", G5_URL."/bbs/board.php?bo_table=51", "","","","");
$fsub_menu[] = array("수강문의", G5_URL."/bbs/board.php?bo_table=52", "","","","");
$fsub_menu[] = array("동영상교육", G5_URL."/bbs/board.php?bo_table=53", "","","","");
$fmenu[(count($fmenu)-1)][5] = $fsub_menu;
$fsub_menu = array();
// 5번째 메뉴 끝

// 5번째 메뉴시작
$fmenu[] = array("사업제휴문의", G5_URL."/sp.php?p=61", "","","","");
$fsub_menu[] = array("개설안내", G5_URL."/sp.php?p=61", "","","","");
$fsub_menu[] = array("제휴/협력사 안내", G5_URL."/sp.php?p=62", "","","","");
$fsub_menu[] = array("뷰티체험", G5_URL."/bbs/board.php?bo_table=63", "","","","");
$fmenu[(count($fmenu)-1)][5] = $fsub_menu;
$fsub_menu = array();
// 5번째 메뉴 끝


// 공통문	//
$com_menu_nm = "회원 및 이용안내";			// 회원 및 공통되는거 타이틀 메뉴명
$com_menu[] = array("로그인", G5_URL."/bbs/login.php?url=".$urlencode, "","","","");
$com_menu[] = array("회원정보", G5_URL."/bbs/register_form_iboard.php", "","","","");
$com_menu[] = array("회원정보", G5_URL."/bbs/member_confirm.php?url=register_form_iboard.php", "","","","");
$com_menu[] = array("회원약관", G5_URL."/bbs/register.php", "","","","");


$cmenu[] =  array("사이트이용안내", G5_URL."", "","","privacy","");
$csub_menu[] = array("개인정보 취급방침", G5_URL."/sp.php?p=privacy", "","","privacy","");
$csub_menu[] = array("이용약관", G5_URL."/sp.php?p=use", "","","privacy","");
$cmenu[(count($cmenu)-1)][5] = $csub_menu;
$csub_menu = array();

$cmenu[] =  array("관리", G5_URL."/bbs/board.php?bo_table=main_img", "","","","");
$csub_menu[] = array("메인상단이미지", G5_URL."/bbs/board.php?bo_table=main_img", "","","","");
$csub_menu[] = array("메인배너", G5_URL."/bbs/board.php?bo_table=banner", "","","","");
$csub_menu[] = array("빠른상담", G5_URL."/bbs/board.php?bo_table=cont", "","","","");
$cmenu[(count($cmenu)-1)][5] = $csub_menu;
$csub_menu = array();


$cmenu[] =  array("모바일", G5_URL."", "","","","");
$csub_menu[] = array("메인이미지", G5_URL."/bbs/board.php?bo_table=main_img_mo", "","","","");
$cmenu[(count($cmenu)-1)][5] = $csub_menu;
$csub_menu = array();



$cmenu[] =  array("로그인", G5_URL."", "","","member","");
$csub_menu[] = array("로그인", G5_URL."/bbs/login.php", "","","member","");
//$csub_menu[] = array("회원가입", G5_URL."/bbs/register.php", "","","member","");
$cmenu[(count($cmenu)-1)][5] = $csub_menu;
$csub_menu = array();


$sub_tab_menu[] = array("유소아난청?","난청&이명", G5_URL."/sp.php?p=35", "","","","");
$sub_tab_menu[] = array("유소아난청","난청&이명", G5_URL."/sp.php?p=35_2", "","","","");
$sub_tab_menu[] = array("유소아난청 ","난청&이명", G5_URL."/sp.php?p=35_3", "","","","");
$sub_tab_menu[] = array("유소아난청","난청&이명", G5_URL."/sp.php?p=35_4", "","","","");

/***************************************************************/

function getLocal($bo_table, $p) {
 global $wr_id, $input, $p;

	if($bo_table=='' && $p){
		$gubun = explode(".",$p);
		$local = $gubun[0];
	} else if($bo_table){
		$local = $bo_table;
	} else if($_GET[ca_id]){
		$local = $_GET[ca_id];
	} else if($_GET[it_id]){
		$sql = " select * from g5_shop_item where it_id = '$_GET[it_id]' ";
		$row = sql_fetch($sql);
		$local = $row[ca_id];
	} else {
		$local = basename($_SERVER[PHP_SELF],".php");
	}
 return $local;
}

function getTp($local){
		
	global $wr_id, $input, $p, $fmenu, $cmenu, $com_menu, $com_menu_nm, $sub_tab_menu;

	$tp = array();


	// 서브메뉴에 왼쪽메뉴 타이틀이미지 공통이미지 변수 추출
	// 컨텐츠 상위 이미지 추출
	// 컨텐츠 타이틀이미지 추출
	// 컨텐츠 네비게이션 문자열 추출
	// 왼쪽메뉴 타이틀 (이미지 or 스트링)
	// 컨텐츠 타이틀 (이미지 or 스트링)
	if(is_numeric(substr($local,0,2))){	//숫자
		$m_menu = substr($local,0,1);
		$s_menu = substr($local,1,1);

		$tp[local] = $local;
		$tp[m_menu] = $m_menu;
		$tp[s_menu] = $s_menu;

		$m_menu = $m_menu - 1;
		$s_menu = $s_menu - 1;
		
		if(strlen($fmenu[$m_menu][5][$s_menu][3]) > 0){
			$tp[left_title] = $fmenu[$m_menu][5][$s_menu][3];
		}else{
			$tp[left_title] = $fmenu[$m_menu][5][$s_menu][3];
		}
		
		if(strlen($fmenu[$m_menu][5][$s_menu][4]) > 0){
			$tp[cont_title] = $fmenu[$m_menu][5][$s_menu][4];
		}else{
			
			$tp[cont_title] = $fmenu[$m_menu][5][$s_menu][0];
		}
		$tp[navi1] = $fmenu[$m_menu][0];
		$tp[navi2] = $fmenu[$m_menu][5][$s_menu][0];
	}else{									//문자
		for($kk = 0; $kk < count($com_menu); $kk++){
			if(eregi($local,$com_menu[$kk][1])){
				
				$tp[local] = $local;
				$tp[m_menu] = $local;
				$tp[s_menu] = $local;
				if(strlen($com_menu[$kk][3]) > 0){
					$tp[left_title] = $com_menu[$kk][3];
				}else{
					$tp[left_title] = $com_menu_nm;
				}
				
				if(strlen($com_menu[$kk][4]) > 0){
					$tp[cont_title] = $com_menu[$kk][4];
				}else{
					$tp[cont_title] = $com_menu[$kk][0];
				}
				
				$tp[navi1] = $com_menu_nm;
				$tp[navi2] = $com_menu[$kk][0];
				
			}
		}
		for($kk = 0; $kk < count($sub_tab_menu); $kk++){
			if(eregi($local,$sub_tab_menu[$kk][2])){
				
				$tp[local] = $local;
				$tp[m_menu] = substr($local,0,1);
				$tp[s_menu] = substr($local,1,1);
				if(strlen($com_menu[$kk][3]) > 0){
					$tp[left_title] = $sub_tab_menu[$kk][3];
				}
				
				if(strlen($com_menu[$kk][0]) > 0){
					$tp[cont_title] = $sub_tab_menu[$kk][0];
				}
				
				$tp[navi1] = $sub_tab_menu[$kk][1];
				$tp[navi2] = $sub_tab_menu[$kk][0];
			}
		}


		for($kk = 0; $kk < count($cmenu); $kk++){
			for($jj = 0; $jj < count($cmenu[$kk][5]); $jj++){
				$bi_str = @str_replace($_SERVER[HTTP_HOST], "", $cmenu[$kk][5][$jj][1]);
				if(@eregi($local,$bi_str)){
					$tp[local] = $local;
					$tp[s_menu] = ($jj+1);
					if(strlen($cmenu[$kk][5][$jj][3]) > 0){
						$tp[left_title] = $cmenu[$kk][5][$jj][3];
					}else{
						$tp[left_title] = $cmenu[0];
					}
					
					if(strlen($cmenu[$kk][5][$jj][4]) > 0){
						$tp[cont_title] = $cmenu[$kk][5][$jj][4];
					}else{
						$tp[cont_title] = $cmenu[$kk][5][$jj][0];
					}
					
					$tp[navi1] = $cmenu[$kk][0];
					$tp[navi2] = $cmenu[$kk][5][$jj][0];
				}
			}
		}

	}

	

	return $tp;
}
/**************************************************************/
$local = getLocal($bo_table,$p);
$tp = getTp($local);

$config[skin_header] = "force";
$config[skin_main] = "force";
$config[skin_footer] = "force";
$config[skin_lefter] = "force";
$config[skin_top] = "force";
$config[skin_main] = "force";
$config[skin_left] = "force";
$config[skin_quick] = "force";

// 레이아웃 스킨 변수
$head_skin_path = G5_PATH."/include/header/$config[skin_header]";		// header
$main_skin_path = G5_PATH."/include/main/$config[skin_main]";			// main
$footer_skin_path = G5_PATH."/include/footer/$config[skin_footer]";		// footer
$sub_left_skin_path = G5_PATH."/include/left/$config[skin_lefter]";		// sub_left
$quick_skin_path = G5_PATH."/include/quick/$config[skin_quick]";		// sub_left

$head_skin_url = G5_URL."/include/header/$config[skin_header]";		// header
$main_skin_url = G5_URL."/include/main/$config[skin_main]";			// main
$footer_skin_url = G5_URL."/include/footer/$config[skin_footer]";		// footer
$sub_left_skin_url = G5_URL."/include/left/$config[skin_lefter]";		// sub_left
$quick_skin_url = G5_URL."/include/quick/$config[skin_quick]";		// sub_left
?>