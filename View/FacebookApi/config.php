<?php  
require_once 'vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '876214309797872',
  'app_secret'     => 'ce7d06898dcba7d0eb43d2a16006e5c5',
  'default_graph_version'  => 'v5.7'
]);

?>