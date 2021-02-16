<?php  
require_once('vendor/autoload.php');
$google_client = new Google_Client();

$google_client-> setClientId('794416985213-6olot9m5m4jjanf3qfn84l1p67jnr24d.apps.googleusercontent.com');
$google_client->setClientSecret('-mcTMhK-W1WB2HN7mDmRJxGs');
$google_client->setRedirectUri('http://localhost/e-commerce/View/googleAPI/g-callback.php');

$google_client->addScope('email');
$google_client->addScope('profile');


?>