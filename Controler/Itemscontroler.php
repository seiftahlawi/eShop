
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../Assest/main.css">
        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
<?php include '../Model/dbItems.php'?>
<?php

$insert=new Catalog();
$rows=$insert->SelectAllItmes();
foreach ($rows as $row) {	
    ?>
 <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img class = "shopeitem-img" src = "<?php echo $row->Image ?>" alt = "product image">
                            </div>
                            <div class = "product-btns">
                           
                                <button type = "button" class = "btn-cart" name="<?php echo $row->_id; ?>" > add to cart
                                    <span><i class = "fas fa-plus"></i></span>
                                </button>
                                <button type = "button" class = "btn-buy"> buy now
                                    <span><i class = "fas fa-shopping-cart"></i></span>
                                </button>
                            </div>
                        </div>

                        <div class = "product-info">
                            <div class = "product-info-top">
                                <h2 class = "sm-title"><?php echo $row->Name?></h2>
                                <div class = "rating">
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "far fa-star"></i></span>
                                </div>
                            </div>
                            <a href = "#" class = "product-name"><?php echo $row->Description?></a>
                            <p class = "product-price"></p>
                            <p class = "product-pricex">$ <?php echo $row->Price?></p>
                        </div>
                    </div>

                
<?php
 
}?>
 

