<?php include '../Model/dbcart.php'?>
<?php include '../Model/dbItems.php'?>
<?php

$sad = $_POST['n']; 


 $cart=new CatalogCart();

 $cart->deleteCustomer($sad);
 


?>