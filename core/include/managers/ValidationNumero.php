<?php
namespace App\managers;

class ValidationNumero{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getUsers(){
		try{
			$q = $this->db->prepare("SELECT * FROM user WHERE activated = 1");
			$q->execute();
			$re = [];
			while ($d = $q->fetch(\PDO::FETCH_OBJ)) {
				$user = new \App\models\User($d->id, $d->token, $d->token_time, $d->nom, $d->prenom, $d->numero, $d->email, $d->password, $d->activated, $d->date_creation);
				$re[] = $user;
			}
			return $re;
		}catch(\PDOException $e){
			return null;
		}
	}

	public function getInfosByNumero($numero){
		try{
			$q = $this->db->prepare("SELECT * FROM validation_numero WHERE numero = ? AND activated = 0");
			$q->execute([$numero]);
			if ($d = $q->fetch(\PDO::FETCH_OBJ)) {
				$validation = ['id'=>$d->id, 'numero'=>$d->numero, 'code'=>$d->code, 'code_time'=>$d->code_time, 'activated'=>$d->activated, 'date_creation'=>$d->date_creation];
				return (object)$validation;
			}
			return null;
		}catch(\PDOException $e){
			return null;
		}
	}

	public function getInfosByNumeroPass($numero){
    		try{
    			$q = $this->db->prepare("SELECT * FROM pwmanager WHERE numero = ? AND activated = 0");
    			$q->execute([$numero]);
    			if ($d = $q->fetch(\PDO::FETCH_OBJ)) {
    				$validation = ['id'=>$d->id_pw, 'numero'=>$d->numero, 'code'=>$d->code, 'code_time'=>$d->code_time, 'activated'=>$d->activated, 'date_creation'=>$d->date_creation];
    				return (object)$validation;
    			}
    			return null;
    		}catch(\PDOException $e){
    			return null;
    		}
    	}

	public function create($validation){
		try{
			$q = $this->db->prepare("INSERT INTO validation_numero(numero, code) VALUES(:numero, :code)");
			$re = $q->execute($validation);
			return $re;
		}catch(\PDOException $e){
			//echo $e->getMessage();
			return null;
		}
	}

	public function createPw($validation){
    		try{
    			$q = $this->db->prepare("INSERT INTO pwmanager(numero, code) VALUES(:numero, :code)");
    			$re = $q->execute($validation);
    			return $re;
    		}catch(\PDOException $e){
    			echo $e->getMessage();
    			return null;
    		}
    	}

	public function updateCodeAndTime($code, $id){
		try{
			$mainNumb = substr($numero, -8);
			$q = $this->db->prepare("UPDATE validation_numero SET code = ?, code_time = NOW() WHERE id = ? AND activated = 0");
			$re = $q->execute([$code, $id]);
			return $re;
		}catch(\PDOException $e){
			//echo $e->getMessage();
			return null;
		}
	}

	public function updatePassword($passe, $numero){
    		try{
    			$q = $this->db->prepare("UPDATE user SET password = ? WHERE numero = ?");
    			$re = $q->execute([$passe, $numero]);
    			return $re;
    		}catch(\PDOException $e){
    			echo $e->getMessage();
    			return null;
    		}
    	}

	public function updatePwCodeAndTime($code, $id){
    		try{
    			$mainNumb = substr($numero, -8);
    			$q = $this->db->prepare("UPDATE pwmanager SET code = ?, code_time = NOW() WHERE id_pw = ?");
    			$re = $q->execute([$code, $id]);
    			return $re;
    		}catch(\PDOException $e){
    			echo $e->getMessage();
    			return null;
    		}
    	}

	public function valider($id){
		try{
			$mainNumb = substr($numero, -8);
			$q = $this->db->prepare("UPDATE validation_numero SET activated = 1 WHERE id = ?");
			$re = $q->execute([$id]);
			return $re;
		}catch(\PDOException $e){
			//echo $e->getMessage();
			return null;
		}
	}

	public function validerPass($id){
    		try{
    			$mainNumb = substr($numero, -8);
    			$q = $this->db->prepare("UPDATE pwmanager SET activated = 1 WHERE id_pw = ?");
    			$re = $q->execute([$id]);
    			return $re;
    		}catch(\PDOException $e){
    			//echo $e->getMessage();
    			return null;
    		}
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


	public function existsPassword($numero){
		try{
			$mainNumb = substr($numero, -8);
			$pattern = "$mainNumb, 00226$mainNumb, +226$mainNumb";
			$q = $this->db->prepare("SELECT id_pw FROM pwmanager WHERE numero IN ($pattern) AND activated = 0");
			$q->execute();
			if($d = $q->fetch(\PDO::FETCH_OBJ)){
				return $d->id_pw;
			}
			return null;
		}catch(\PDOException $e){
			echo $e->getMessage();
			return null;
		}
	}

	public function isActivated($numero){
		try{
			$mainNumb = substr($numero, -8);
			$pattern = "$mainNumb, 00226$mainNumb, +226$mainNumb";
			$q = $this->db->prepare("SELECT id FROM validation_numero WHERE numero IN ($pattern) AND activated = 1");
			$q->execute();
			return $q->rowCount() ? TRUE : FALSE;
		}catch(\PDOException $e){
			//echo $e->getMessage();
			return null;
		}
	}
}