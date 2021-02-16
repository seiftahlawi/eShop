<?php    
session_start();

   $_SESSION['price'] = $_POST['price'];

   //Reading the value from the form.
   if(isset($_POST['submitAddress'])) {
      $_SESSION['address'] = $_POST['address'];
      $_SESSION['address2'] = $_POST['address2'];
      header("Location: ../View/shipping.php");
   } 
?>
