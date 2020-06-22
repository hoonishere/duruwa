<?php
// Setup class
  $instagram = new Instagram(array(
    'apiKey'      => '355bc0c03e934534ae33f045fba2c91a',
    'apiSecret'   => '2f52283374d64b2e8c34bed0a14cb4a7',
    'apiCallback' => 'http://test.ilogin.kr/i/plugin/login-oauth/instargram/success.php' // must point to success.php
  ));

?>