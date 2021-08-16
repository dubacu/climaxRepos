<?php
namespace App\managers;

class UserManager{
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
				$user = new \App\models\User($d->id, $d->token, $d->token_time, $d->nom, $d->prenom, $d->civilite, $d->numero, $d->email, $d->password, $d->activated, $d->date_creation);
				$re[] = $user;    
			}
			return $re;
		}catch(\PDOException $e){
			return null;
		}
	}

	public function getUserByEmail($email){
		try{
			$q = $this->db->prepare("SELECT * FROM user_data WHERE user_email = ? AND activated = 1");   
			$q->execute([$email]);
			if ($d = $q->fetch(\PDO::FETCH_OBJ)) {
				$user = new \App\models\User($d->id_user, $d->user_token, $d->user_firstname, $d->user_lastname, $d->user_email, $d->user_passwd, $d->user_profile, $d->activated, $d->date_creation);
				return $user;
			}
			return null;
		}catch(\PDOException $e){        
			return null;
		}
	}

	public function create($user){   
		
		try{
			$q = $this->db->prepare("INSERT INTO user_data(user_token, user_firstname, user_lastname, user_email, user_passwd, user_profile, activated) VALUES(:user_token, :user_firstname, :user_lastname, :user_email, :user_passwd, :user_profile, :activated)");
			$re = $q->execute($user);
			if ($re) {
				$result = $this->getUserByEmail($user['user_email']);        
				return $result;
			}
			return null;
		}catch(\PDOException $e){
			echo $e->getMessage();
			return null;
		}
	}

		public function update($user){
    	try{
    	
    		$q = $this->db->prepare("UPDATE user_data SET  user_firstname = :user_firstname, user_lastname = :user_lastname, user_email = :user_email, user_profile = :user_profile  WHERE user_token = :user_token");  
            $re = $q->execute($user);
            //file_put_contents("profil",$user['profil']);
    		
    			if ($re) {
    				$result = $this->getUserByEmail($user['user_email']);
    				return $result;
    			}
    			return null;
    		}catch(\PDOException $e){
    			echo $e->getMessage();    
    			return null;
    		}
    	}
		
		public function deleteUser($user_token){   
		
		try{
			$q1 = $this->db->prepare("DELETE FROM user_data WHERE user_token = ?");
			
			return $re1 = $q1->execute([$user_token]) ? TRUE : FALSE;
			 
		}catch(\PDOException $e){
			echo $e->getMessage();   
			//return null;
		}
	}	



 public function exists($type, $valeur){
		if(!in_array($type, ['token', 'numero', 'user_email'])) return null;      
		try{
			if($type == 'numero'){
				$mainNumb = substr($valeur, -8);
				$pattern = "$mainNumb, 00226$mainNumb, +226$mainNumb";
				$q = $this->db->prepare("SELECT id FROM user_data WHERE $type IN ($pattern)");
				$q->execute();
			}else{
				$q = $this->db->prepare("SELECT id_user FROM user_data WHERE $type = ?");
				$q->execute([$valeur]);
			}
			
			return $q->rowCount() ? TRUE : FALSE;
		}catch(\PDOException $e){
			echo $e->getMessage();
			return null;
		}
	}
}