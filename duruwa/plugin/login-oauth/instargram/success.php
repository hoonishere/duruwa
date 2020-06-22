<?php
//require 'db.php';


require 'instagram.class.php';
require 'instagram.config.php';

// Receive OAuth code parameter
$code = $_GET['code'];



// Check whether the user has granted access
if (true === isset($code)) {
	 

  // Receive OAuth token object
  $data = $instagram->getOAuthToken($code);
  
	// Take a look at the API response
   
			if(empty($data->user->username))
			{ // 만약 데이타에 유저 네임이 엠티 하다면, 
			//header('Location: index.php');

			}else{
				//session_start();
				$_SESSION['userdetails']=$data;
				
				$mb_nick=$data->user->username; // sds207103
				$mb_name=$data->user->full_name; // name
				$bio=$data->user->bio; // 직업?
				$website=$data->user->website; // 현재 사이트
				$mb_id=$data->user->id; // 생성된 고유 아이디
				$token_value=$data->access_token; // 토큰토큰~
			
			//echo "mb_nick ==".$mb_nick."<br>mb_name == ".$mb_name."<br>bio == ".$bio."<br>mb_id == ".$mb_id."<br>token_value == ".$token_value ; 
			
				include('./insta_login.check.php');
			
			
			}
}else {
	// Check whether an error occurred
	if (true === isset($_GET['error'])) 
	{
			echo 'An error occurred: '.$_GET['error_description'];
	}

}

?>
