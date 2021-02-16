<?php include '../Model/db.php'?>
<?php
$insert=new Catalog();
// 1 items
$Name = 'Womens  Watche';
$Image='../Assest/images/watch.jpg';
$Price=91;
$Description='2Pcs Fashion Quartz Couple Watches Pointer Display Classic Round Dial Trendy Matching Watches';

echo $insert->insertDocument($Name,$Image,$Price,$Description);
// 2 items
$Name = 'Womens boot';
$Image='../Assest/images/boot.jpg';
$Price=69;
$Description='Womens Ankle Boots Round Toe Anti-Skidding Thick Heel Lacing Shoes';

echo $insert->insertDocument($Name,$Image,$Price,$Description);
//3 items
$Name = 'Womens bag';
$Image='../Assest/images/bag.jpg';
$Price=57;
$Description='Womens Clutch Bag Fashion Chic Rhomboids Design Chain Bag';

echo $insert->insertDocument($Name,$Image,$Price,$Description);
//4 items
$Name = 'Mens boot';
$Image='../Assest/images/bootm.jpg';
$Price=51;
$Description='Mens Sneakers Casual Lacing Comfortable Fashion Shoe';

echo $insert->insertDocument($Name,$Image,$Price,$Description);
// 5 items
$Name = 'Mans Vest';
$Image='../Assest/images/Vest.jpg';
$Price=75;
$Description='Mens Vest Jacket Outdoor Casual All Match Plus Size Breathable Skin-Friendly Top';

echo $insert->insertDocument($Name,$Image,$Price,$Description);
// 6 items
$Name = 'Mans Scarf';
$Image='../Assest/images/Scarf.jpg';
$Price=24;
$Description='Mens Scarf Casual Color Block Soft Plaid Tassel Comfortable Accessory
';

echo $insert->insertDocument($Name,$Image,$Price,$Description);


?>