<?php include '../Model/dbcart.php'?>
<?php include '../Model/dbItems.php'?>
<?php

$sad = $_POST['n']; 

$x=new Catalog();
$id=new \MongoDB\BSON\ObjectId($sad);
 $filter = ['_id' => $id];
 $r=$x->SelectOneItems($filter);
 $cart=new CatalogCart();
 foreach($r as $row){
 $cart->insertDocument($row->Name,$row->Image,$row->Price,$row->Description);
 
}

?>