<?php
namespace App\managers;

class ValidationNumero{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	

	public function exists($email){
		try{
			
			$q = $this->db->prepare("SELECT id_user FROM user_data WHERE user_email = ? AND activated = 1");
			$q->execute(array($email));
			if($d = $q->fetch(\PDO::FETCH_OBJ)){
				return $d->id_user;
			}
			return null;
		}catch(\PDOException $e){
			//echo $e->getMessage();
			return null;
		}
	}



}
