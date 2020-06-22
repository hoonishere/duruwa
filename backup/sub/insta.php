<? if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가  ?>

<?

/*
	----------------------------------------------------------
		1.코드 리턴 방법
	----------------------------------------------------------
	 1) 하단 HTML 주석을 품
	 2) 아이디와 유알아이는 insta의 개발자 모드에서 생성한 아이디와 redirect uri이다.
*/
?>
<!-- <style>
.test		{background:#333; color:#fff; padding:8px 6px; cursor:pointer;}
</style>
<div class="test"> GOTO INSTA</div>
<script>
	var id = "0c859fcf519f49f29096fbd9104c75c9";
	var uri = "http://new.ilogin.kr/sp.php?p=insta";
	$(document).ready(function(){
		$(".test").on("click" , function(){
			window.open("https://api.instagram.com/oauth/authorize/?client_id="+id+"&redirect_uri="+uri+"&response_type=code");
		});
	});
</script>
 -->
<?php 
/*
	----------------------------------------------------------
		2.억세스토큰 발행 방법
	----------------------------------------------------------
	억세스토큰 CURL을 통해서 통신하는 방법

	CURL이란 http 통신을 URL로 해야하는 경우에 사용해야함. 
	ex )rss를 가져오거나,xml 형태의 api가 있다면, 사용할 수 있다. 타 호스팅에서 정보를 불러오는 경우에 사용한단다
      위 코드를 리턴 받는 것 까지 되었다면, 아래 getAccessToken이것을 실행하면 토큰이 발행됨
      이렇게 토큰이 발행되고 나면, 쭉 ~~~ 사용하게 되는 것임(물론 일정 기간 이후에 만료되겠지요)


  # 현재 이 억세스 토큰 발행 방법에서 주의해야할 것은 꼭 반드시, 개발자모드에서 생성한 앱에서 지정했던  redirect uri 에서 실행해야한다.
*/

//getAccessToken(); // 토큰 생성을 위해 현재 이 'getAccessToken();' 함수를 실행한다.
 
function getAccessToken(){
    
    if($_GET['code']) {
        $code = $_GET['code'];
        $url = "https://api.instagram.com/oauth/access_token";
        $access_token_parameters = array(
                'client_id'                =>     '0c859fcf519f49f29096fbd9104c75c9',
                'client_secret'            =>     'cd0e3262f0ac497b972d3c84056f606f',
                'grant_type'               =>     'authorization_code',
                'redirect_uri'             =>     'http://new.ilogin.kr/sp.php?p=insta',
                'code'                     =>     $code
        );
        $curl = curl_init($url);    // we init curl by passing the url
        curl_setopt($curl,CURLOPT_POST,true);   // to send a POST request
        curl_setopt($curl,CURLOPT_POSTFIELDS,$access_token_parameters);   // indicate the data to send
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   // to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   // to stop cURL from verifying the peer's certificate.
        $result = curl_exec($curl);   // to perform the curl session
        curl_close($curl);   // to close the curl session
    
        $arr = json_decode($result,true);
				
				print_r2($arr);
				echo "<br><br>";   
        echo "<br>access_Token: ".$arr['access_token']; // display the access_token
        echo "<br>";   
        echo "user_name : ".$arr['user']['username'];   // display the username
			$acc_token = $arr['access_token'];
			$user_id=$arr['user']['id'];
			/*
				토큰과 유저 아이디를 데이타 베이스에 저장한다.
				그 후 1번,2번 과정은 시행하지 않고, 데이타 베이스에서 불러오게 한다.
			*/
			sql_query("update g5_member set mb_2='".$acc_token."',mb_3='".$user_id."' where mb_id='admin'"); // 최고 관리자의 mb_2,mb_3에게 저장한다.
		}
}
?>
<?php
		/*
		------------------------------------------------------------------------------------------------------
		3. 데이타 베이스에 저장된 토큰과 유저 아이디를 불러와서 하단에 데이타 호출을 한다.
		------------------------------------------------------------------------------------------------------
		*/
	$mb = get_member("admin");
  function fetchData($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
  }
	$result = fetchData("https://api.instagram.com/v1/users/".$mb[mb_3]."/media/recent/?access_token=".$mb[mb_2]);
  $result = json_decode($result , true);
?>
<style>
.tot														{font-family: 'Noto Sans KR','Malgun Gothic';}/*border:1px solid red;*/
.tot > h2												{text-align: center;line-height: 50px;font-size: 30px;font-family: 'Noto Sans KR','Malgun Gothic';font-weight: 300;color: #000;}
.img_loop												{ width:100%; margin-top:30px;}
.img_loop > ul >li							{ width:238px;  float:left; border:1px solid #ddd; margin-bottom:20px;}
.img_loop > ul >li img.image		{ width:238px; height:240px;}
.img_loop > ul >li p						{font-family: 'Noto Sans KR','Malgun Gothic';font-weight:600; }
.img_loop > ul >li p.p_tit			{padding:12px 2px 2px 6px;}
.img_loop > ul >li p.p_con			{padding:2px 2px 6px 6px;}
.margin_r												{margin-right:30px;}
.pop_txt												{margin-top:50px;}
.pop_txt,.pop_txt>p							{padding:;float:left; width:335px; font-family: 'Noto Sans KR','Malgun Gothic'; font-size:14px; font-weight:600;}

/*--------------------------- 하단 레이어팝업css------------------------*/
.layer {display:none; position:fixed; _position:absolute; top:0; left:0; width:100%; height:100%; z-index:100;}
.layer .bg {position:absolute; top:0; left:0; width:100%; height:100%; background:#000; opacity:.5; filter:alpha(opacity=50);}
.layer .pop-layer {display:block;}
.pop-tit			{background:#2f2f2f; height:35px; line-height:30px; text-align:center ; font-size:18px; font-weight:bold; color:#fff;}

.pop-layer {display:none; position: absolute; top: 50%; left: 50%; width: 935px; height:auto;  background-color:#fff; border: 5px solid #2f2f2f; z-index: 10;}	
.pop-layer .pop-container {padding: 0px ;}
.pop-layer p.ctxt {color: #666; line-height: 25px;}
.pop-layer .btn-r {width: 100%;  padding-top: 10px; border-top: 1px solid #DDD; text-align:right;}

a.cbtn {  text-decoration:none;  float: right;    display: inline-block;    height: 25px;    padding: 0 14px 0;    font-size: 18px;    color: #fff;    line-height: 25px;}	

.pop_trainer_profile01	{padding:30px; float:left; width:180px;}
.pop_trainer_profile02	{float:left; width:355px; margin-top:30px; text-align:left;}
.pop_trainer_profile02 tr th,.pop_trainer_profile02 tr td	 {padding-bottom:10px; }
.pop_trainer_profile02 tr th	 {text-align:left;font-size:15px; padding-bottom:20px;}
.pop_img			{float:left; width:598px; height:598px;}
/*--------------------------- 하단 레이어팝업css------------------------*/
</style>
<div class="tot">
	<h2>인스타그램</h2>
	<div class="img_loop">
		<ul>
			<?
				$like_icon = "<img src='".G5_URL."/img/insta/insta_like.png' width='15px' height='15px'>";
				$commen_icon = "<img src='".G5_URL."/img/insta/insta_comment.png' width='15px' height='15px'>";

				//echo $like_icon."==".$commen_icon ; 
			for( $i=0; $i < count($result[data]) ; $i++){
				if($i%3==2){
					$class="";
				}else{
					$class="class='margin_r'"; // margin img | margin | img |margin | img 
				}
			?>
			<li <?=$class?>>
				<a href="#null" data="" data-src="<?=$i?>">
					<img src="<?=$result[data][$i][images][low_resolution][url]?>" class="image">
				</a>
				<p class="p_tit"><?=$like_icon?> <?=$result[data][$i]['likes']['count']?>개 &nbsp;<?=$commen_icon?> <?=$result[data][$i]['comments']['count']?>개</p>
				<a href="#null" onclick="on_popup('<?=$result[data][$i]['link']?>','935','800')">
					<p class="p_con">
					<?
					if(count($result[data][$i]['tags']) >0){ // tags!
						for($j=0; $j< count($result[data][$i]['tags']);  $j++){
							echo "#".$result[data][$i]['tags'][$j]."&nbsp;" ; 
						}
					}else{
						echo "&nbsp;" ; 
					}
					?>
					</p>
				</a>
			</li>
					<div class="layer" id="layer<?=$i?>_wrap">
						<div class="bg"></div>
						<div id="layer<?=$i?>" class="pop-layer">
							<div class="pop-container">
							<div class="pop-tit" >HELLO WORLD <a href="#" class="cbtn">X</a></div>
								<div class="pop-conts">
									<!--content //-->
										<div class="pop_img">
											<img src="<?=$result[data][$i][images][standard_resolution][url]?>" width="598" height="598">
										</div>
										<div class="pop_txt">
											<p><?=$result[data][$i]['caption'][text]?></p><!-- caption -->
											<a href="<?=$result[data][$i]['link']?>">+MORE</a>
										</div>
									<!--// content-->
								</div>
							</div>
						</div><!-- pop-layer end  -->
					</div>
			<?} // for end ?>
		</ul>
	</div><!-- img_loop end -->



</div><!-- tot end -->


<script>
function on_popup(url,wid,hei){ // 유알엘 주소, 창 넓이, 창 높이 
	window.open(url, "pop", "width="+wid+",height="+hei+",scrollbars=yes,menubar=no") ;
}

$(function(){
	$(".img_loop >  ul > li > a").click(function(){
		layer_open('layer' + $(this).attr("data-src"));
	});
});

	function layer_open(el){
		var wrap_layer = el+"_wrap";
		var temp = $('#' + el);
		var bg = temp.prev().hasClass('bg');	//dimmed 레이어를 감지하기 위한 boolean 변수

		if(bg){
			$('#' + wrap_layer).fadeIn();	//'bg' 클래스가 존재하면 레이어가 나타나고 배경은 dimmed 된다. 
		}else{
			temp.fadeIn();
		}

		// 화면의 중앙에 레이어를 띄운다.
		if (temp.outerHeight() < $(document).height() ) temp.css('margin-top', '-'+temp.outerHeight()/2+'px');
		else temp.css('top', '0px');
		if (temp.outerWidth() < $(document).width() ) temp.css('margin-left', '-'+temp.outerWidth()/2+'px');
		else temp.css('left', '0px');
		$(".bg").css("height", $("body").height()+"px");

		temp.find('a.cbtn').click(function(e){
			if(bg){
				$('#' + wrap_layer).fadeOut(); //'bg' 클래스가 존재하면 레이어를 사라지게 한다. 
			}else{
				temp.fadeOut();
			}
			e.preventDefault();
		});

		$('#'+wrap_layer+' .bg').click(function(e){	//배경을 클릭하면 레이어를 사라지게 하는 이벤트 핸들러
			$('#'+wrap_layer).fadeOut();
			e.preventDefault();
		});

	}
</script>

