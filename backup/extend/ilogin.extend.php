<?
	/* array중 null 값을 제거 한다. */
	function cleanArray($array){

		global $g5;

		$new_array = array();

		while(list($key, $value) = each($array)){
			if(trim($value))
				$new_array[$key] = $value;
		}
		return $new_array;
	}

	## ---- Summnail Image 생성 (Return 하는 값은 Summnail경로이다)-----
	// 예) http://subnara.info/data/bo_table/thumbs/img.gif <- 값을 리턴
	function summImage($bo_table, $img, $img_w ='120', $img_h = '120'){
	
		global $g5;

		$data_path = "G5_URL/data/file/$bo_table";
		$thumbs_path = $data_path."/thumbs";

		@mkdir($thumbs_path, 0707);
		@chmod($thumbs_path, 0707);

		$thumbs = $thumbs_path."/".$img;
		if (!file_exists($thumbs)){
			$image = $data_path."/".$img;
			$size = getimagesize($image);
			$src = imagecreatefromjpeg($image);
			if (function_exists("imagecopyresampled")) {
				$default[de_simg_width] = $img_w ;
				$default[de_simg_height] = $img_h;
				$dst = imagecreatetruecolor( $default[de_simg_width], $default[de_simg_height]);
				imagecopyresampled($dst, $src, 0, 0, 0, 0, $default[de_simg_width], $default[de_simg_height], $size[0], $size[1]);
			} else {
				$dst = imagecreate($default[de_simg_width], $default[de_simg_height]);
				imagecopyresized($dst, $src, 0, 0, 0, 0, $default[de_simg_width], $default[de_simg_height], $size[0], $size[1]);
			}
			imagejpeg($dst, $thumbs, 100);
		}
	return $thumbs;

	}
	/*
	* 최고관리자 -> Root로 변경 (write Form) 
	* 인자값 : DB명 (DB명을 넣는 이유는 global로 DB명을 지정하면 보안상의 위험이 있다)
	*/
	/*
	function rootAlter($mysql_db){

		global $g5;

		$result = mysql_list_tables($mysql_db);
		$num_rows = mysql_num_rows($result);
		for ($i = 0; $i < $num_rows; $i++) {
			$table = mysql_tablename($result, $i);
			if(preg_match("/g5_write/", $table)){
				$ro = get_member("root");
				@mysql_query( "update $table set mb_id = 'root', wr_name='$ro[mb_name]' where mb_id = 'admin';" );
				}
			}
	}
	*/


	function rootAlter($mysql_db){
		global $g5;

		$sql = " SHOW TABLES FROM $mysql_db ";
		if($result = query($sql)) {
			while ($line = sql_fetch_array($result, MYSQL_ASSOC)) {
				$table = $line["Tables_in_$mysql_db"];
				if(preg_match("/g5_write/", $table)){
					$ro = get_member("root");
					@sql_query( "update $table set mb_id = 'root', wr_name='$ro[mb_name]' where mb_id = 'admin';" );
				}
			}
		}
	}

	/*
	 * wr_id 값이 엉키는 경우 자동조정해주는 함수이다.
	 */
	function countAdjust($bo_table){
		
		global $g5;

		$sql = " select count(*) as cnt from $g5[write_prefix]$bo_table where wr_is_comment = 0 ";
		$row = sql_fetch($sql);
		$bo_count_write = $row[cnt];

		$sql = " select count(*) as cnt from $g5[write_prefix]$bo_table where wr_is_comment = 1 ";
		$row = sql_fetch($sql);
		$bo_count_comment = $row[cnt];

        $sql = " select wr_id from $g5[write_prefix]$bo_table where wr_is_comment = 0 ";
        $result = sql_query($sql);
        for ($i=0; $row=sql_fetch_array($result); $i++) {
            $sql2 = " select count(*) as cnt from $g5[write_prefix]$bo_table where wr_parent = '$row[wr_id]' and wr_is_comment = 1 ";
            $row2 = sql_fetch($sql2);
            sql_query(" update $g5[write_prefix]$bo_table set wr_comment = '$row2[cnt]' where wr_id = '$row[wr_id]' ");
        }

		$sql = " update $g5[board_table]
					set bo_count_write = '$bo_count_write',
						bo_count_comment = '$bo_count_comment'
				  where bo_table = '$bo_table' ";
		sql_query($sql);

	}

	/*
	 * wr_1 부터 varchar 255 값을 longtext 로 변환한다.(인자값은 bo_table 이다)
	 */

	function longText($bo_table){
		
		global $g5;

		$write_table = "$g5[write_prefix]$bo_table";
		$sql="select * from $write_table"; 
		$result = sql_query($sql);

		$field = sql_num_fields($result);

		for($i = 0; $i <$field; $i++) {
			$names[] = sql_field_name( $result, $i );
		}
		//27번부터 wr_1 값이 존재한다.
		for($i=27; $i<count($names); $i++){
			$arraydata[] = $names[$i];
		}

		for($i=0; $i<count($arraydata); $i++){
			$sql = "alter table $write_table change {$arraydata[$i]} {$arraydata[$i]} longtext ";
			sql_query($sql);
		}
	}

	/*
	 * 원하는 write테이블 늘리기 인자값은 (bo_table, 시작값, 끝값)
	 */
	function table_one_add($bo_table,$start,$end){
		global $g5;
		for ($i=$start; $i<=$end; $i++) { 
			$sql ="alter table $g5[write_prefix]$bo_table add wr_{$i} varchar(255) not null;"; 
			@sql_query($sql); 
		}

	}


	/*
	 *  write테이블 전체 늘리기 인자값은 (DB명, 시작값, 끝값)
	 */
	function table_add($mysql_db,$start,$end){
		$result = mysql_list_tables($mysql_db);
		$num_rows = mysql_num_rows($result);
		for ($i = 0; $i < $num_rows; $i++) {
			$table = mysql_tablename($result, $i);
			if(preg_match("/g5_write/", $table)){
					for($start=11;$start<=$end;$start++){
						@mysql_query( "alter table $table add `wr_{$start}` varchar( 255 ) not null ;" );
					}
			}
		}
	}
	
	/*
	 * g5_board_new에 없는것들 다 입력
	 */
	function table_new_add($bo_table) {
		global $g5;
		$sql = " select * from $g5[write_prefix]$bo_table ";
		$rowList = getList($sql);

		foreach($rowList as $line){
			$sql = " select * from g5_board_new where bo_table = '$bo_table' and wr_id = '$line[wr_id]' ";
			$row1 = sql_fetch($sql);

			if(strlen($row1[wr_id]) == 0){
				// 새글 INSERT
				sql_query(" insert into {$g5['board_new_table']} ( bo_table, wr_id, wr_parent, bn_datetime, mb_id ) values ( '{$bo_table}', '{$line[wr_id]}', '{$line[wr_parent]}', '".G5_TIME_YMDHIS."', '{$line['mb_id']}' ) ");

				// 게시글 1 증가
				sql_query("update {$g5['board_table']} set bo_count_write = bo_count_write + 1 where bo_table = '{$bo_table}'");
			}
		}
	}


	/*
	 *  UTF-8 => CP949 or CP949 => UTF-8 변환함수
	 */
	function conv_uft($str){
		$str = iconv("CP949", "UTF-8", $str);
		return $str;
	}

	function conv_han($str){
		$str = iconv("UTF-8", "CP949", $str);
		return $str;
	}

	/*
	 * bo_table 에서 wr_id값이 어느 page에 속하지는 구해주는 함수이다.
	 * return 값은 page 번호이다.
	 * 예) wr_id = 85의 값은 page = 2에 속한다.
	 */
	function getPage($bo_table, $wr_id){

		global $g5;

		$sql = "select bo_sort_field, bo_page_rows from $g5[board_table] where bo_table = '$bo_table'";
		$row = sql_fetch($sql);
		$page_rows = $row[bo_page_rows]; 
		$sort_field = (!$row[bo_sort_field])? "wr_num asc" : $row[bo_sort_field];
		
		$sql = "select wr_id from $g5[write_prefix]$bo_table order by {$sort_field}";
		$result = sql_query($sql);

		$numArray = array();
		while($row = sql_fetch_array($result)){
			array_push($numArray, $row[wr_id]);
		}
		$num = array_search($wr_id, $numArray) + 1;
		$page = ceil($num/$page_rows);

		return $page;

	}


	
// 2011.01,27 추가
function getList($sql) {
  // 배열생성
  $arrResult = array();
  // 쿼리실행
  if($result = query($sql)) {

    while ($line = sql_fetch_array($result, MYSQL_ASSOC)) {
      array_push($arrResult, $line);
    }

    // 메모리 해제
    sql_free_result($result);
  } else {
    echo("<pre>");
    echo($sql."\n");
    echo("</pre>");
  }

  return $arrResult;
}


function query($sql) {
//	echo "<span style='display:none'>connection=$this->link_id, query=$sql</span>\n";
  $result = sql_query($sql);
  return $result;
}


function getCodeNm($code_cls, $code){  
    $result = sql_fetch(" select code_nm from g4_code where code_cls = '$code_cls' and code = '$code' ");

    echo $result[code_nm];
}

function getCodeList($code_cls){  
    /// 사이트 분류
    $sql = "SELECT * FROM g4_code where code_cls = '{$code_cls}' order by dp_order  ";

    $result = getList($sql);
    
    return $result;
}

// 셀렉트 박스 선택되어보이게
function getOptionListSelected($array, $value, $text, $select) {
		$out = "";
		foreach ($array as $line) {
			if($line[$value]==$select) {
				$out = $out."<option value='$line[$value]' selected>$line[$text]</option>";
			} else {
				$out = $out."<option value='$line[$value]'>$line[$text]</option>";
			}
		}
		echo $out;
	}

  //where 조건추가
  // ex ) append($sqlWhere, " and ", " cb_idx = '$params[cb_idx]' ");
  function append($sql, $appender, $text) {
    if(strlen($sql) > 0) {
      $sql = $sql.$appender.$text;
    } else {
      $sql = $text;
    }
		return $sql;
  }
  

  // echo 라인 바껴서 
  function log2($str){
    echo "&nbsp;&nbsp;>> ".$str."<br>";
  }

	function ch_date($date){
		$ex_date = explode("|",$date);
		$re_date = $ex_date[0]."년 ".$ex_date[1]."월 ".$ex_date[2]."일";
		return $re_date;
	}

  function getDateFormat($str) { //2009-01-02 형식
		if(strlen($str)){
			return date("Y-m-d", strtotime($str));
		}else{
			return ; 
		}


  }

	function right($value, $count){
			return substr($value, ($count*-1));
	}

	function left($string, $count){
			return substr($string, 0, $count);
	}

	function getDateStr($str){
    return substr($str,0,4)."-".substr($str,4,2)."-".substr($str,6,2);
  }

	function getDateStr2($str){
    return substr($str,0,4)."/".substr($str,4,2)."/".substr($str,6,2);
  }

	function getDateStr3($str){
    return substr($str,2,2).".".substr($str,4,2).".".substr($str,6,2);
  }

	//DateAdd함수를 정의합니다.
 function DateAdd ($interval, $number, $date) {

//getdate()함수를 통해 얻은 배열값을 각각의 변수에 지정합니다.

 $date_time_array = getdate($date);
 $hours = $date_time_array["hours"];
 $minutes = $date_time_array["minutes"];
 $seconds = $date_time_array["seconds"];
 $month = $date_time_array["mon"];
 $day = $date_time_array["mday"];
 $year = $date_time_array["year"];

//switch()구문을 사용해서 interval에 따라 적용합니다.

 switch ($interval) {
     case "yyyy": 
         $year +=$number; 
         break; 

     case "q":
         $year +=($number*3);
         break;

     case "m":
         $month +=$number;
         break;

     case "y":
     case "d":
     case "w":
         $day+=$number;
         break;

     case "ww":
         $day+=($number*7);
         break;

     case "h":
         $hours+=$number;
         break;

     case "n":
         $minutes+=$number;
         break;

     case "s":
         $seconds+=$number;
         break;

     }

//mktime()함수를 이용해서 unix timestamp반환합니다.

 $timestamp = mktime($hours ,$minutes, $seconds, $month,$day, $year);
 return $timestamp;
}

//DateDiff함수를 정의합니다. 

Function DateDiff ($interval, $date1,$date2) { 

// 두 날짜간 시간간격을 초로 얻을 수 있습니다. 
// bcdiv()는 오른쪽의 인자로 왼쪽의 인자를 나누어준 값을 반환합니다. 

$timedifference = $date2 - $date1; 

switch ($interval) { 
case "w": 
$retval = bcdiv($timedifference ,604800); 
break; 

case "d": 
$retval = bcdiv( $timedifference,86400); 
break; 

case "h": 
$retval = bcdiv ($timedifference,3600); 
break; 

case "n": 
$retval = bcdiv( $timedifference,60); 
break; 

case "s": 
$retval = $timedifference; 
break; 
} 
return $retval; 
} 

function GetPhoneMobileSelect($gbn,$name){
	if($gbn == "tel"){
		$out = ' <select name="'.$name.'">
									<option value="02">02-서울 </option>
									<option value="031">031-경기 </option>
									<option value="032">032-인천</option>
									<option value="033">033-강원 </option>
									<option value="041">041-충남 </option>
									<option value="042">042-대전 </option>
									<option value="043">043-충북 </option>
									<option value="051">051-부산 </option>
									<option value="052">052-울산 </option>
									<option value="053">053-대구 </option>
									<option value="054">054-경북 </option>
									<option value="054">054-경북 </option>
									<option value="055">055-경남 </option>
									<option value="061">061-전남 </option>
									<option value="062">062-광주 </option>
									<option value="063">063-전북 </option>
									<option value="064">064-제주 </option>
						 </select> ';
	}else{
						
							$out = ' <select name="'.$name.'">
									<option value="">선택</option>
									<option value="010">010</option>
									<option value="011">011</option>
									<option value="016">016</option>
									<option value="017">017</option>
									<option value="018">018</option>
									<option value="019">019</option>
						 </select> ';
	}

	return $out;
}

function getMemberList(){
	global $g5;
	$sql = " select * from $g5[member_table] where mb_id <> 'admin' ";
	$rowList = getList($sql);

	return $rowList;
}

function getBoardList($bo_table,$end_int='10',$sql_where='',$img_width='',$img_height='', $start_int='0'){
	$sql = " select * from g5_write_".$bo_table." where wr_is_comment = 0 $sql_where order by wr_num limit $start_int, $end_int";
	$rList = getList($sql);

	for($j = 0; $j < count($rList); $j++){
			$rList[$j][file] = get_file($bo_table, $rList[$j][wr_id]);
			$rList[$j][href] = "./board.php?bo_table=".$bo_table."&wr_id=".$rList[$j][wr_id];
	}
	return $rList;
}

function add_hyphen($hp_no){
	 return preg_replace("/(0(?:2|[0-9]{2}))([0-9]+)([0-9]{4}$)/", "\\1-\\2-\\3", $hp_no); 
}


// 인자값 설명 ("인풋네임지정", "인풋실제값", "req 입력하면 필수값으로, 입력안하면 필수값아님", "select claass 명", "input class 명");
function get_hp2($input_name, $val="", $req="", $sel_class="selectbox", $input_class="inputbox"){ // get_hp 함수 겹쳐서 바꿈 2015-08-03

	$arr_val = @explode("-",$val);
	if($req == "req"){
		$str_req = "required";
	}
	$str = '<input type="hidden" name="'.$input_name.'" id="'.$input_name.'" title="연락처" value="'.$val.'">';
	$str .= '<select title="연락처"  name="'.$input_name.'_1" id="'.$input_name.'_1" class="'.$sel_class.' '.$str_req.'" >';
	$str .= '<option value="">선택</option>';
	$str .= '<option value="010">010</option>';
	$str .= '<option value="011">011</option>';
	$str .= '<option value="016">016</option>';
	$str .= '<option value="017">017</option>';
	$str .= '<option value="018">018</option>';
	$str .= '<option value="019">019</option>';
	$str .= "</select>";
	$str .= " - ";
	$str .= '<input type="text" class="'.$input_class.' '.$str_req.'" id="'.$input_name.'_2" name="'.$input_name.'_2" value="'.$arr_val[1].'" title="연락처" style="width:50px;" maxlength="4">';
	$str .= " - ";
	$str .= '<input type="text" class="'.$input_class.' '.$str_req.'" id="'.$input_name.'_3" name="'.$input_name.'_3" value="'.$arr_val[2].'" title="연락처" style="width:50px;" maxlength="4">';

	$str .= "<script>";
	$str .= "$(function(){";
	$str .= '$("#'.$input_name.'_1").val("'.$arr_val[0].'");';
	$str .= '$("#'.$input_name.'_1").change(function(){ hp_'.$input_name.'_plus(); });';
	$str .= '$("#'.$input_name.'_2").blur(function(){ hp_'.$input_name.'_plus(); });';
	$str .= '$("#'.$input_name.'_3").blur(function(){ hp_'.$input_name.'_plus(); });';
	$str .= 'function hp_'.$input_name.'_plus(){';
	$str .= '$("#'.$input_name.'").val( $("#'.$input_name.'_1").val() + "-" + $("#'.$input_name.'_2").val() + "-" + $("#'.$input_name.'_3").val() );';
	$str .= "}";
	$str .= "});";
	$str .= "</script>";

	return $str;
}

// 인자값 설명 ("인풋네임지정", "인풋실제값", "req 입력하면 필수값으로, 입력안하면 필수값아님", "select claass 명", "input class 명");
function get_tel($input_name, $val="", $req="", $sel_class="selectbox", $input_class="inputbox"){

	$arr_val = @explode("-",$val);
	if($req == "req"){
		$str_req = "required";
	}
	$str = '<input type="hidden" name="'.$input_name.'" id="'.$input_name.'" title="연락처" value="'.$val.'">';
	$str .= '<select name="'.$input_name.'_1" id="'.$input_name.'_1" class="'.$sel_class.' '.$str_req.'" >';
	$str .= '<option value="">선택</option>';
	$str .= '<option value="02">02</option><option value="031">031</option><option value="032">032</option><option value="033">033</option><option value="041">041</option><option value="042">042</option><option value="043">043</option><option value="044">044</option><option value="051">051</option><option value="052">052</option><option value="053">053</option><option value="054">054</option><option value="055">055</option><option value="061">061</option><option value="062">062</option><option value="063">063</option><option value="064">064</option><option value="050">050</option><option value="060">060</option><option value="080">080</option><option value="070">070</option><option value="0502">0502</option><option value="0503">0503</option><option value="0505">0505</option><option value="0506">0506</option><option value="0130">0130</option><option value="0303">0303</option>';
	$str .= "</select>";
	$str .= " - ";
	$str .= '<input type="text" class="'.$input_class.' '.$str_req.'" id="'.$input_name.'_2" name="'.$input_name.'_2" value="'.$arr_val[1].'" title="연락처" style="width:50px;" maxlength="4">';
	$str .= " - ";
	$str .= '<input type="text" class="'.$input_class.' '.$str_req.'" id="'.$input_name.'_3" name="'.$input_name.'_3" value="'.$arr_val[2].'" title="연락처" style="width:50px;" maxlength="4">';

	$str .= "<script>";
	$str .= "$(function(){";
	$str .= '$("#'.$input_name.'_1").val("'.$arr_val[0].'");';
	$str .= '$("#'.$input_name.'_1").change(function(){ hp_'.$input_name.'_plus(); });';
	$str .= '$("#'.$input_name.'_2").blur(function(){ hp_'.$input_name.'_plus(); });';
	$str .= '$("#'.$input_name.'_3").blur(function(){ hp_'.$input_name.'_plus(); });';
	$str .= 'function hp_'.$input_name.'_plus(){';
	$str .= '$("#'.$input_name.'").val( $("#'.$input_name.'_1").val() + "-" + $("#'.$input_name.'_2").val() + "-" + $("#'.$input_name.'_3").val() );';
	$str .= "}";
	$str .= "});";
	$str .= "</script>";

	return $str;
}

// 인자값 설명 ("인풋네임지정", "인풋실제값", "req 입력하면 필수값으로, 입력안하면 필수값아님", "select claass 명", "input class 명");
function get_tel2($input_name, $val="", $req="", $input_class="inputbox"){

	$arr_val = @explode("-",$val);
	if($req == "req"){
		$str_req = "required";
	}
	$str = '<input type="hidden" name="'.$input_name.'" id="'.$input_name.'" title="연락처" value="'.$val.'">';
	$str .= '<input type="text" class="'.$input_class.' '.$str_req.'" id="'.$input_name.'_1" name="'.$input_name.'_1" value="'.$arr_val[1].'" title="연락처" style="width:50px;" maxlength="4">';
	$str .= " - ";
	$str .= '<input type="text" class="'.$input_class.' '.$str_req.'" id="'.$input_name.'_2" name="'.$input_name.'_2" value="'.$arr_val[1].'" title="연락처" style="width:50px;" maxlength="4">';
	$str .= " - ";
	$str .= '<input type="text" class="'.$input_class.' '.$str_req.'" id="'.$input_name.'_3" name="'.$input_name.'_3" value="'.$arr_val[2].'" title="연락처" style="width:50px;" maxlength="4">';

	$str .= "<script>";
	$str .= "$(function(){";
	$str .= '$("#'.$input_name.'_1").val("'.$arr_val[0].'");';
	$str .= '$("#'.$input_name.'_1").blur(function(){ hp_'.$input_name.'_plus(); });';
	$str .= '$("#'.$input_name.'_2").blur(function(){ hp_'.$input_name.'_plus(); });';
	$str .= '$("#'.$input_name.'_3").blur(function(){ hp_'.$input_name.'_plus(); });';
	$str .= 'function hp_'.$input_name.'_plus(){';
	$str .= '$("#'.$input_name.'").val( $("#'.$input_name.'_1").val() + "-" + $("#'.$input_name.'_2").val() + "-" + $("#'.$input_name.'_3").val() );';
	$str .= "}";
	$str .= "});";
	$str .= "</script>";

	return $str;
}

// 인자값 설명 ("인풋네임", "인풋실제값", "req 입력하면 필수값으로, 입력안하면 필수값아님", "select claass 명", "input class 명");
//echo get_email("wr_email", $write[wr_email], "", "selecbox", "inputbox");
function get_email($input_name, $val="", $req="", $sel_class="selectbox", $input_class="inputbox"){

	$arr_val = @explode("@",$val);
	if($req == "req"){
		$str_req = "required";
	}
	$str = '<input type="hidden" name="'.$input_name.'" id="'.$input_name.'" title="이메일" value="'.$val.'">';


	$str .= '<input type="text" class="'.$input_class.' '.$str_req.'" id="'.$input_name.'_1" name="'.$input_name.'_1" value="'.$arr_val[0].'" title="이메일ID입력" style="width:60px;">';
	$str .= " @ ";
	$str .= '<input type="text" class="'.$input_class.' '.$str_req.'" id="'.$input_name.'_2" name="'.$input_name.'_2" value="'.$arr_val[1].'" title="이메일서비스입력" style="width:60px;">';

	$str .= '&nbsp;<select name="sel_mail'.$input_name.'" id="sel_mail'.$input_name.'" class="'.$sel_class.'" >';
	$str .= '<option value="">선택</option>';
	$str .= '<option value="naver.com">naver.com</option> ';
	$str .= '<option value="hanmail.net">hanmail.net</option> ';
	$str .= '<option value="daum.net">daum.net</option> ';
	$str .= '<option value="nate.com">nate.com</option> ';
	$str .= '<option value="gmail.com">gmail.com</option> ';
	$str .= '<option value="dreamwiz.com">dreamwiz.com</option> ';
	$str .= '<option value="empal.com">empal.com</option> ';
	$str .= '<option value="unitel.co.kr">unitel.co.kr</option> ';
	$str .= '<option value="korea.com">korea.com</option> ';
	$str .= '<option value="chol.com">chol.com</option> ';
	$str .= '<option value="paran.com">paran.com</option> ';
	$str .= '<option value="freechal.com">freechal.com</option> ';
	$str .= '<option value="hotmail.com">hotmail.com</option> ';
	$str .= '<option value="yahoo.co.kr">yahoo.co.kr</option> ';
	$str .= '<option value="self">직접 입력</option> ';
	$str .= "</select>";
	$str .= "<script>";
	$str .= "$(function(){";
		$str .= '$("#sel_mail'.$input_name.'").change(function(){';
			$str .= 'if($(this).val() == "self" || $(this).val() == ""){';
				$str .= '$("#'.$input_name.'_2").val("");';
				$str .= '$("#'.$input_name.'_2").css("display","inline-block");';
			$str .= '}else{';
				$str .= '$("#'.$input_name.'_2").css("display","none");';
				$str .= '$("#'.$input_name.'_2").val($(this).val());';
			$str .= '}';
			$str .= 'mb_email_plus'.$input_name.'();';
		$str .= '});';
		$str .= '$("#'.$input_name.'_1,#'.$input_name.'_2").blur(function(){mb_email_plus'.$input_name.'();});';
	$str .= "});";

	$str .= 'function mb_email_plus'.$input_name.'(){';
		$str .= '$("#'.$input_name.'").val($("#'.$input_name.'_1").val()+"@"+$("#'.$input_name.'_2").val());';
	$str .= '}';
	$str .= "</script>";

	return $str;
}

// 인자값 설명 ("인풋네임지정", "인풋실제값", "req 입력하면 필수값으로, 입력안하면 필수값아님", "input class 명"); 
// 신 우편번호 2015-08-04
function get_addr($input_name, $val="", $req="", $input_class="inputbox"){

	$arr_zip = @explode("|",$val);
	if($req == "req"){
		$str_req = "required";
	}
	//$str = "<script src='http://dmaps.daum.net/map_js_init/postcode.v2.js'></script>";
	$str = '<input type="hidden" name="'.$input_name.'" id="'.$input_name.'" title="주소" value="'.$val.'">';
	$str .= '<label for="reg_mb_zip" class="sound_only">우편번호</label>';
	$str .= '<input type="text" name="mb_zip" value="'.$arr_zip[0].'" id="reg_mb_zip"  class="'.$input_class.' '.$str_req.' " size="5" maxlength="5" style="width:40px;">';
	//$str .= '-';
	//$str .= '<label for="reg_mb_zip2" class="sound_only">우편번호 뒷자리</label>';
	//$str .= '<input type="text" name="mb_zip2" value="'.$arr_zip[1].'" id="reg_mb_zip2"  class="'.$input_class.' '.$str_req.' " size="3" maxlength="3" style="width:30px;">';
	$str .= ' <button type="button" class="btn_frmline" onclick="win_zip(\'fwrite\', \'mb_zip\', \'mb_addr1\', \'mb_addr2\', \'mb_addr3\', \'mb_addr_jibeon\');">주소 검색</button><br>';
	$str .= '<input type="text" name="mb_addr1" value="'.$arr_zip[1].'" id="reg_mb_addr1"  class="'.$input_class.' '.$str_req.' " size="50" style="width:240px;margin-top:2px;">';
	$str .= '<label for="reg_mb_addr1"> </label><br>';
	$str .= '<input type="text" name="mb_addr2" value="'.$arr_zip[2].'" id="reg_mb_addr2" class="'.$input_class.'  " size="50" style="width:240px;margin-top:2px;">';
	$str .= '<label for="reg_mb_addr2"> </label><br>';
	$str .= '<input type="hidden" name="mb_addr3" value="'.$arr_zip[3].'" id="reg_mb_addr3" class="'.$input_class.'  " size="50" style="width:240px;margin-top:2px;" readonly="readonly">';
	$str .= '<label for="reg_mb_addr3"> </label>';
	$str .= '<input type="hidden" name="mb_addr_jibeon" value="'.$arr_zip[4].'">';

	$str .= "<script>";
	$str .= "$(function(){";
	$str .='$("input[name=mb_zip], input[name=mb_addr1], input[name=mb_addr2], input[name=mb_addr3], input[name=mb_addr_jibeon]").blur(function(){addr_plus();});$("input[name=mb_addr2]").live("focus", function(){addr_plus();});});function addr_plus(){$("#'.$input_name.'").val( $("input[name=mb_zip]").val()  + "|" + $("input[name=mb_addr1]").val() + "|" + $("input[name=mb_addr2]").val() + "|" + $("input[name=mb_addr3]").val() + "|" + $("input[name=mb_addr_jibeon]").val());}';
	$str .= "</script>";
	return $str;
}





// 인자값 설명 ("인풋네임지정", "인풋실제값", "req 입력하면 필수값으로, 입력안하면 필수값아님", "input class 명");

/* 구주소 
function get_addr($input_name, $val="", $req="", $input_class="inputbox"){

	$arr_zip = @explode("|",$val);
	if($req == "req"){
		$str_req = "required";
	}
	$str = '<input type="hidden" name="'.$input_name.'" id="'.$input_name.'" title="주소" value="'.$val.'">';
	$str .= '<label for="reg_mb_zip1" class="sound_only">우편번호 앞자리</label>';
	$str .= '<input type="text" name="mb_zip1" value="'.$arr_zip[0].'" id="reg_mb_zip1"  class="'.$input_class.' '.$str_req.' " size="3" maxlength="3" style="width:30px;">';
	$str .= '-';
	$str .= '<label for="reg_mb_zip2" class="sound_only">우편번호 뒷자리</label>';
	$str .= '<input type="text" name="mb_zip2" value="'.$arr_zip[1].'" id="reg_mb_zip2"  class="'.$input_class.' '.$str_req.' " size="3" maxlength="3" style="width:30px;">';
	$str .= ' <button type="button" class="btn_frmline" onclick="win_zip(\'fwrite\', \'mb_zip1\', \'mb_zip2\', \'mb_addr1\', \'mb_addr2\', \'mb_addr3\', \'mb_addr_jibeon\');">주소 검색</button><br>';
	$str .= '<input type="text" name="mb_addr1" value="'.$arr_zip[2].'" id="reg_mb_addr1"  class="'.$input_class.' '.$str_req.' " size="50" style="width:240px;margin-top:2px;">';
	$str .= '<label for="reg_mb_addr1"> </label><br>';
	$str .= '<input type="text" name="mb_addr2" value="'.$arr_zip[3].'" id="reg_mb_addr2" class="'.$input_class.'  " size="50" style="width:240px;margin-top:2px;">';
	$str .= '<label for="reg_mb_addr2"> </label><br>';
	$str .= '<input type="hidden" name="mb_addr3" value="'.$arr_zip[4].'" id="reg_mb_addr3" class="'.$input_class.'  " size="50" style="width:240px;margin-top:2px;" readonly="readonly">';
	$str .= '<label for="reg_mb_addr3"> </label>';
	$str .= '<input type="hidden" name="mb_addr_jibeon" value="'.$arr_zip[5].'">';

	$str .= "<script>";
	$str .= "$(function(){";
	$str .='$("input[name=mb_zip1], input[name=mb_zip2], input[name=mb_addr1], input[name=mb_addr2], input[name=mb_addr3], input[name=mb_addr_jibeon]").blur(function(){addr_plus();});$("input[name=mb_addr2]").live("focus", function(){addr_plus();});});function addr_plus(){$("#'.$input_name.'").val( $("input[name=mb_zip1]").val() + "|" + $("input[name=mb_zip2]").val() + "|" + $("input[name=mb_addr1]").val() + "|" + $("input[name=mb_addr2]").val() + "|" + $("input[name=mb_addr3]").val() + "|" + $("input[name=mb_addr_jibeon]").val());}';
	$str .= "</script>";
	return $str;
}
*/

// 인자값 설명 ("인풋 타이틀", "인풋 네임", "인풋 값", "필수 : req, 필수아님 : '' ", "input claass 명", "width 길이");
function get_input($input_title="", $input_name, $val="", $req="", $input_class="inputbox", $twidth=""){
	if($req == "req"){
		$str_req = "required";
	}
	if(strlen($twidth) > 0){
		$str_twidth = 'style="width:'.$twidth.'px;"';
	}else{
		$str_twidth = '';
	}
	$str = '<input type="text" name="'.$input_name.'" id="'.$input_name.'" value="'.$val.'" class="'.$input_class.' '.$str_req.'" title="'.$input_title.'" '.$str_twidth.'>';
	
	return $str;
}

// 인자값 설명 ("항목명", "인풋네임", "array value", "인풋값", "radio사이에 구분값");
function get_radio($input_title="", $input_name, $arr_radio, $val, $gbn="&nbsp;&nbsp;", $input_class=""){
	$str = "";
	$str .= "<ul class=\"default_ul\">";
	for($j = 0; $j < count($arr_radio); $j++) {
		if(($j+1) == count($arr_radio)){ $gbn = "";}

		$str .= '<li><input type="radio" id="'.$input_name.$j.'" name="'.$input_name.'" value="'.$arr_radio[$j].'" title="'.$arr_radio[$j].'" class="'.$input_class.'"> <label for="'.$input_name.$j.'">'.$arr_radio[$j].'</label></li>'.$gbn;
	}
	$str .= "</ul>";
	$str .= '<script>$("input:radio[name=\''.$input_name.'\']:input[value=\''.$val.'\']").attr("checked", true);</script>';
	return $str;
}

// 인자값 설명 ("항목명", "인풋네임", "array value", "인풋값", "checkbox 사이에 구분값", "input class 명");
function get_checkbox($input_title="", $input_name, $arr_checkbox, $val, $gbn="&nbsp;&nbsp;", $input_class=""){
	$str = "";
	$str .= "<ul class=\"default_ul\">";
	for($j = 0; $j < count($arr_checkbox); $j++){
		if(($j+1) == count($arr_radio)){ $gbn = "";}

		$str .= '<li><input type="checkbox" id="'.$input_name.$j.'" name="'.$input_name.'[]" title="'.$input_title.'" value="'.$arr_checkbox[$j].'" class="'.$input_class.'"> <label for="'.$input_name.$j.'">'.$arr_checkbox[$j].'</label></li>'.$gbn;
	}
	$str .= "</ul>";

	$str .= "<script>";
	$str .= 'var str_'.$input_name.' = "'.$val.'";';
	$str .= '$("input:checkbox[name=\''.$input_name.'[]\']").each(function(index){';
	$str .= 'if(str_'.$input_name.'.indexOf($(this).val()) > -1){';
	$str .= '$(this).attr("checked", true);';
	$str .= '}';
	$str .= '});';
	$str .= "</script>";

	return $str;
}

// 인자값 설명 ("항목명", "인풋네임", "array value", "인풋값", "req 입력하면 필수값으로, 입력안하면 필수값아님" , "input class 명");
function get_select($input_title="", $input_name, $arr_select, $val, $req="", $input_class="selectbox"){

	if($req == "req"){
		$str_req = "required";
	}

	$str = "";
	$str .= ' <select name="'.$input_name.'" id="'.$input_name.'" class="'.$input_class.' '.$str_req.'" title="'.$input_title.'"> ';
	$str .= '<option value="">[선택]</option>';
	for($j = 0; $j < count($arr_select); $j++){
		$str .= '<option value="'.$arr_select[$j].'"> '.$arr_select[$j].'</option>';
	}
	$str .= '</select>';
	$str .= '<script>$("#'.$input_name.'").val("'.$val.'")</script>';
	return $str;
}

// 비밀번호 생성시 사용
function get_rand(){
	$chars_array = array_merge(range(0,9), range('a','z'), range('A','Z'));
	shuffle($chars_array);
	$shuffle = implode('', $chars_array);
	
	return $shuffle;
}
?>