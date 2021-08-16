<?php
namespace App;

use \PDO;

	define('SERVER', 'localhost');
	define('DBNAME', 'climaxBD');  
	define('USERNAME', 'root');
	define('PASSWORD', 'Ja4EsFzPyQ56e7PB');  

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