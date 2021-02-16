<?php 

class user {

    const DB="Categure.User";
    private $FullName;
   private $Email;
   private $Password;
   private $Address;
   private $Gender;

function insertDocument($FullName,$Email,$Password,$Address,$Gender)
		{	
			$this->FullName = $FullName;
			
			$this->Email = $Email;
			$this->Password = $Password;
            $this->Address = $Address;
			
			$this->Gender = $Gender;
			
			$manager = new MongoDB\Driver\Manager(); 
			$bulk = new MongoDB\Driver\BulkWrite;
			$document = ['FullName' => $this->FullName ,'Email'=>$this->Email,'Password'=>$this->Password,'Gender'=>$this->Gender, 'Address'=> $this->Address];
			$bulk->insert($document);
			$manager->executeBulkWrite(self::DB,$bulk);
		
		}

		function SelectOneItems($filter)
		{  
			$manager = new MongoDB\Driver\Manager();  
			$query = new MongoDB\Driver\Query($filter);
			$rows = $manager->executeQuery(self::DB, $query);
			return $rows;
		   
		}



}



?>