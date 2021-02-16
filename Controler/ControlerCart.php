
<?php include '../Model/dbcart.php'?>
<?php include '../Model/dbItems.php'?>

<?php


class CatalogCart
{
	
	
	public $Name;
	public $Image;
	public $Price;
	public $Description;
	const DB= 'Categure.Cart';

	
	
	function insertDocument($Name,$Image,$Price,$Description)
	{	
		$this->Name = $Name;
		$this->Image = $Image;
		$this->Price = $Price;
		$this->Description = $Description;
	
		$manager = new MongoDB\Driver\Manager(); 
		$bulk = new MongoDB\Driver\BulkWrite;
		$document = ['Name' => $this->Name,'Image'=>$this->Image,'Price'=>$this->Price,'Description'=>$this->Description];
		$bulk->insert($document);
		$manager->executeBulkWrite(self::DB,$bulk);

	}

		function SelectAllItmes()
		{
			$manager = new MongoDB\Driver\Manager();   
	        $query = new MongoDB\Driver\Query([]); 
	        $rows = $manager->executeQuery(self::DB, $query);
			return $rows;

    	}
		
	
	
	
			
		
		
}



$cart=new CatalogCart();

$Name = 'Womens  Watche';
$Image='../Assest/images/watch.jpg';
$Price=91;
$Description='2Pcs Fashion Quartz Couple Watches Pointer Display Classic Round Dial Trendy Matching Watches';

 $cart->insertDocument($Name,$Image,$Price,$Description);
// 2 items
$Name = 'Womens boot';
$Image='../Assest/images/boot.jpg';
$Price=69;
$Description='Womens Ankle Boots Round Toe Anti-Skidding Thick Heel Lacing Shoes';

 $cart->insertDocument($Name,$Image,$Price,$Description);
//3 items
$Name = 'Womens bag';
$Image='../Assest/images/bag.jpg';
$Price=57;
$Description='Womens Clutch Bag Fashion Chic Rhomboids Design Chain Bag';

$cart->insertDocument($Name,$Image,$Price,$Description);
$rows=$cart->SelectAllItmes();

 foreach($rows as $row){

if($row)
{?>

    <tr class="cart-row">
								<td class="image" data-title="No"><img src="<?php echo $row->Image?>" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#"><?php echo $row->Name?></a></p>
									<p class="product-des"><?php echo $row->Description?></p>
								</td>
								<td class="price" data-title="Price"><span class="cart-price">$<?php echo $row->Price?> </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number "  disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="1" />
										<div class="button plus">
											<button type="button" id = 'plus' class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus" ></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								
								<td class="action" data-title="Remove"><button class="removeItem"  name="<?php echo $row->_id; ?>" style="background-color: #dc3545;padding:5px;">remove</td>
							</tr>



                       

                     
<?php
}}
 
?>
 