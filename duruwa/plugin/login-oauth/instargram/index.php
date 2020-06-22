<style type="text/css">
      * {
        margin: 0px;
        padding: 0px;
      }

      a .button {
        background: url('<?=G5_PLUGIN_URL?>/login-oauth/img/instargram.png') no-repeat transparent;
        cursor: pointer;
        display: block;
        height: 29px;
        margin: 50px auto;
        overflow: hidden;
        text-indent: -9999px;
        width: 200px;
      }

      a.button:hover {
        background-position: 0 -29px;
      }
    </style>
    <?php
		//echo G5_PLUGIN_URL."/login-oauth/img/instargram.png" ; 
session_start();
if (!empty($_SESSION['userdetails'])) 
{ // 유저디테일이 있으면 그 정보들을 머금고 있어라
	//header('Location: home.php');
}
      require 'instagram.class.php';
      require 'instagram.config.php';
      
      // Display the login button
      $loginUrl = $instagram->getLoginUrl(); //
      echo "<a class=\"button\" href=\"#null\" onclick=\"on_popup('".$loginUrl."','480','600');\"><img src=\"".G5_PLUGIN_URL."/login-oauth/img/instargram.png\" width=\"50\" height=\"50\"></a>";
    ?>

 <script>

function on_popup(url,wid,hei){ // 유알엘 주소, 창 넓이, 창 높이 
	
window.open(url, "pop", "width="+wid+",height="+hei+",scrollbars=yes,menubar=no") ;
}
</script>
