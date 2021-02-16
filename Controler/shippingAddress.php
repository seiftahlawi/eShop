<?php session_start(); ?>

<?php include '../Model/shippingSystem.php'?>

<?php
    //including the (shipping class) then inserting the document in it.
    $insert = new shipping();
    $Address = $_SESSION['address'];
    $Address2 = $_SESSION['address2'];
    $price = trim($_SESSION['price'],"$");
    $Type = $_POST['radio'];
    if($Type == 'fastDelivery'){
        $price = $price + 5;
    } 
    
   echo 'Your purchase was successful.';
   $insert->insertDocument($Address, $Address2,floatval($price), $Type);
  
?>