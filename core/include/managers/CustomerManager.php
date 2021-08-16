<?php
namespace App\managers;

class CustomerManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getCustomers(){
		try{
			$q = $this->db->prepare("SELECT * FROM customer_data");  
			$q->execute();
			$re = [];
			while ($d = $q->fetch(\PDO::FETCH_OBJ)) {
				$customer = new \App\models\Customer($d->id_customer, $d->customer_firstname, $d->customer_lastname, $d->customer_age, $d->customer_profession, $d->customer_salary, $d->date_creation);
				$re[] = $customer;    
			}
			return $re;
		}catch(\PDOException $e){
			return null;
		}
	}

	public function getCustomerById($id){
		try{
			$q = $this->db->prepare("SELECT * FROM customer_data WHERE id_customer = ?");   
			$q->execute([$id]);
			if ($d = $q->fetch(\PDO::FETCH_OBJ)) {
				$customer = new \App\models\Customer($d->id_customer, $d->customer_firstname, $d->customer_lastname, $d->customer_age, $d->customer_profession, $d->customer_salary, $d->date_creation);
				return $customer;
			}
			return null;
		}catch(\PDOException $e){ 
           echo $e->getMessage();		
			//+return null;
		}
	}

	public function createCustomer($customer){   
		
		try{
			$q = $this->db->prepare("INSERT INTO customer_data(customer_firstname, customer_lastname, customer_age, customer_profession, customer_salary) VALUES(:customer_firstname, :customer_lastname, :customer_age, :customer_profession, :customer_salary)");
			$re = $q->execute($customer);
			if ($re) {
				$result = $this->getCustomerById($this->db->LastInsertId());            
				return $result;
			}
			return $re;  
		}catch(\PDOException $e){
			echo $e->getMessage();   
			//return null;
		}
	}

		public function updatecustomer($customer){
    	try{
    	
    		$q = $this->db->prepare("UPDATE customer_data SET  customer_firstname = :customer_firstname, customer_lastname = :customer_lastname, customer_age = :customer_age, customer_profession = :customer_profession, customer_salary = :customer_salary  WHERE id_customer = :id_customer");  
            $re = $q->execute($customer);
            //file_put_contents("profil",$user['profil']);
    		
    			if ($re) {
    				$result = $this->getCustomerById($customer['id_customer']);
    				return $result;
    			}
    			return null;
    		}catch(\PDOException $e){
    			echo $e->getMessage();        
    			return null;       
    		}
    	}
		
		public function deleteCustomer($id){   
		
		try{
			$q1 = $this->db->prepare("DELETE FROM customer_data WHERE id_customer = ?");
			
			return $re1 = $q1->execute([$id]) ? TRUE : FALSE;
			 
		}catch(\PDOException $e){
			echo $e->getMessage();   
			//return null;
		}
	}	

	public function getAVG(){   
		
		try{
			$q1 = $this->db->prepare("SELECT COUNT(id_customer) as nombre, AVG(customer_salary) as moyenne, customer_profession FROM customer_data GROUP BY customer_profession");
		    $q1->execute();			
			$re1 = $q1->fetchAll();
			return $re1;  
			 
		}catch(\PDOException $e){
			echo $e->getMessage();   
			//return null;
		}
	}
	
		public function getAllProfession(){
	
			try{
			$q1 = $this->db->prepare("SELECT DISTINCT customer_profession as Profession FROM customer_data");
		    $q1->execute();			
			$re1 = $q1->fetchAll(\PDO::FETCH_ASSOC);
			return $re1;  
			 
		}catch(\PDOException $e){
			echo $e->getMessage();   
			//return null;
		}
		
	}
	
	public function getAVGByProfession($profession){   
		
		try{
			$q1 = $this->db->prepare("SELECT AVG(customer_salary) as moyenne FROM customer_data WHERE customer_profession = ?");
		    $q1->execute([$profession]);			
			$re1 = $q1->fetch(\PDO::FETCH_ASSOC);
			return $re1;  
			 
		}catch(\PDOException $e){
			echo $e->getMessage();   
			//return null;
		}
		
	}
}