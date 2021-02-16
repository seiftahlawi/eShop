<?php

class CatalogCart
{
	
	
	public $Name;
	public $Image;
	public $Price;
	public $Description;
	const DB= 'Categure.Cart';

	
	
	function __construct()
		{


		}

		function SelectAllItmes()
		{
			$manager = new MongoDB\Driver\Manager();   
	        $query = new MongoDB\Driver\Query([]); 
	        $rows = $manager->executeQuery(self::DB, $query);
			return $rows;

    	}
		
	
		function SelectOneItems($filter)
		{  
			$manager = new MongoDB\Driver\Manager();  
			$query = new MongoDB\Driver\Query($filter);
			$rows = $manager->executeQuery(self::DB, $query);
			return $rows;
		   
		}
		function cheackAllItmes()
		{
			$manager = new MongoDB\Driver\Manager();   
	        $query = new MongoDB\Driver\Query([]); 
	        $rows = $manager->executeQuery(self::DB, $query);
			return $rows;

    	}
		
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
			return $this->Name ;
		}
		
		
		
		
		
		
	function deleteCustomer($idcustomer)
            { 
			
                $manager = new MongoDB\Driver\Manager(); 
                $bulk = new MongoDB\Driver\BulkWrite;       
				 $id=new \MongoDB\BSON\ObjectId($idcustomer);
                $bulk->delete(['_id' =>$id]);
                $manager->executeBulkWrite(self::DB, $bulk);
                echo 'Delete success<br>';
            }
			
		
		
}?>