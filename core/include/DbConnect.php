<?php
namespace App;

use \PDO;

	define('SERVER', 'localhost');
	define('DBNAME', 'climaxBD');  
	define('USERNAME', 'YOUR_DB_USERNAME');
	define('PASSWORD', 'YOUR_DB_PASSWORD');  

class DbConnect
{
	
	function connect(){
		try{
			$conn = new PDO('mysql:host='.SERVER.';dbname='.DBNAME, USERNAME, PASSWORD);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->exec("SET NAMES 'UTF8'");
		}catch(\PDOException $e){         
			die("Erreur de connexion : ".$e->getMessage());
		}
		return $conn;
	}
}
