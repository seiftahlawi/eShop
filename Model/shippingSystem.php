<?php

//shipping system document (insert to database).
class shipping {
	
	public $Address;
	public $Address2;
	public $price;
	public $Type;
	
	const DB= 'Categure.shppingTable';
	
	function __construct()
		{
            
        }

	function insertDocument($Address, $Address2, $price, $Type)
		{	
			$this->Address = $Address;
			$this->Address2 = $Address2;
			$this->price = $price;
			$this->Type = $Type;
			
			$manager = new MongoDB\Driver\Manager(); 
			$bulk = new MongoDB\Driver\BulkWrite;
			$document = ['Address' => $this->Address,
						 'Address2' => $this->Address2, 
						 'price' => $this->price, 
						 'Type' =>$this->Type];
            if($this->Type){
			$bulk->insert($document);
			$manager->executeBulkWrite(self::DB,$bulk);}
			
		}
}
?>