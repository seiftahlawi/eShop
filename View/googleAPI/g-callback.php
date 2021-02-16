<?php
session_start();
require_once 'config.php';
if (isset($_SESSION['access_token'])) {
  $google_client->setAccessToken($_SESSION['access_token']);
} else if(isset($_GET['code'])) {
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
  $_SESSION['access_token'] = $token;
} else {
  header('Location: ../login.php');
  exit();
}

// Mongo Procces
$oAuth = new Google_Service_Oauth2($google_client);
$data = $oAuth->userinfo_v2_me->get();
$email = $data['email'];
$user = $data['user'];
$f_name =  $data['givenName'];
$l_name = $data['lastName'];
$FullName=$f_name . ' '. $l_name;
$Gender = $data['gender'];
$Address = $data['address'];
$isGoogle = true;
include "../../Model/dblog.php";
$i = 0;
$user=new user();
$xUser= $user->SelectOneItems(['Email'=> $email]);
 foreach($xUser as $c){
    $i = $i + 1;
}

if($i === 0) {
  $user->insertDocument($FullName,$email,"",$Address,$Gender);
  $_SESSION['user'] = $email;
  header('Location: .././index.php');
}  else {
  $_SESSION['user'] = $email;
    header('Location: .././index.php');
  
}
    exit()

?>
