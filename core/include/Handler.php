<?php
namespace App;
//require "include/Handler.php";

class Handler
{
	private $db;

	public function __construct(){
		$con = new DbConnect();
		$this->db = $con->connect();
	}
	public function getUsers($params){
		$userM = new \App\managers\UserManager($this->db);
		$users = $userM->getUsers();
		return ['users'=>$users, 'user_token'=>$params];
	}

	public function connexion($params){
		if(!array_key_exists('email', $params) OR !array_key_exists('passe', $params)){
			return ['code'=>-1, 'message'=>'Veuillez bien envoyer les parametres'];
		}

		$email = $params['email'];
		$password = $params['passe'];
		
		if($email){
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return ['code'=>-1, 'message'=>'L\'adresse email n\'est pas valide'];
		}
		
		if(!is_string($password) OR strlen($password) < 6) return ['code'=>-1, 'message'=>'Le mot de passe n\'est pas valide'];
		

		$userM = new \App\managers\UserManager($this->db);
		$user = $userM->getUserByEmail($email);
		if(!$user){
			return ['code'=>-1, 'message'=>'Cet email n\'existe pas'];
		}
		if(!password_verify($password, $user->user_passwd)){
			return ['code'=>-1, 'message'=>'Erreur sur le numero et/ou mot de passe'];
		}

			    $_SESSION['user_token'] = $user->user_token;;
		        $_SESSION['user_firstname'] = $user->user_firstname;
                $_SESSION['user_lastname'] = $user->user_lastname;
                $_SESSION['user_email'] = $user->user_email;
                $_SESSION['user_passwd'] = $user->user_passwd;
                $_SESSION['user_profile'] = $user->user_profile;       
                // $_SESSION['user_id'] = $user->id_user;
		
		return ['code'=>1, 'message'=>'OK', 'user'=>$user];               
	}

	public function createAccount($params){
		if(!array_key_exists('user_firstname', $params) OR !array_key_exists('user_lastname', $params) OR !array_key_exists('user_email', $params) OR !array_key_exists('user_passwd', $params) OR !array_key_exists('user_profile', $params )){
			return ['code'=>-1, 'message'=>'Veuillez bien envoyer tous  les parametres'];
		}

		$user_firstname = $params['user_firstname'];
		$user_lastname = $params['user_lastname']; 
		$user_email = $params['user_email'];
		$user_passwd = $params['user_passwd'];
		$user_profile = $params['user_profile'];
		$activated  = $params['activated']; 

       // $target_dir = '/*upload';*/

                //set random image file name withe time
              //file_put_contents("include/upload/test","hoha");
                //$aziz ="aziz";
                //$target_dir = $target_dir ."/". rand() . "_". time();

                /*$name = rand() . "_". time();
                file_put_contents($name.".JPG", base64_decode($profil));
                rename($name.'.JPG','include/upload/'.$name.'.JPG');*/


		if(!\App\Utils::isValidStr($user_firstname)) return ['code'=>-1, 'message'=>'Le nom n\'est pas valide'];
		if(!\App\Utils::isValidStr($user_lastname)) return ['code'=>-1, 'message'=>'Le prenom n\'est pas valide'];
		if(!\App\Utils::isValidStr($user_profile)) return ['code'=>-1, 'message'=>'Le profil n\'est pas valide'];
		if(!is_string($user_passwd) OR strlen($user_passwd) < 6) return ['code'=>-1, 'message'=>'Le mot de passe n\'est pas valide'];
		if($user_email){
			if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) return ['code'=>-1, 'message'=>'L\'adresse email n\'est pas valide'];
		}

		$userM = new \App\managers\UserManager($this->db);
		//$validM = new \App\managers\ValidationNumero($this->db);      

		
		$user_token = uniqid();
		/*while($userM->exists('token', $user_token)){
			$token = uniqid();
		}*/     

		
		if($userM->exists('user_email', $user_email)) return ['code'=>-1, 'message'=>'L\'email est déjà pris'];  

		$user = ['user_token'=>$user_token, 'user_firstname'=>$user_firstname, 'user_lastname'=>$user_lastname, 'user_email'=>$user_email, 'user_passwd'=>password_hash($user_passwd, PASSWORD_DEFAULT), 'user_profile'=>$user_profile, 'activated'=>'1'];         

		$userResult = $userM->create($user);
		if(!$userResult) return ['code'=>-1, 'message'=>'Erreur de creation du compte, Veuillez réessayer', 'result'=>$userResult];  

		return ['code'=>1, 'message'=>'insertion reussie ! ', 'user'=>$userResult];
	}


	public function updateAccount($params){
    		if(!array_key_exists('user_firstname', $params) OR !array_key_exists('user_lastname', $params) OR !array_key_exists('user_email', $params) OR !array_key_exists('user_profile', $params )){
				return ['code'=>-1, 'message'=>'Veuillez bien envoyer les parametres'];
    		}

        $user_firstname = $params['user_firstname'];
		$user_lastname = $params['user_lastname']; 
		$user_email = $params['user_email'];
		//$user_passwd = $params['user_passwd'];
		$user_profile = $params['user_profile'];
		$user_token= $params['user_token'];
		


    		if(!\App\Utils::isValidStr($user_firstname)) return ['code'=>-1, 'message'=>'Le nom n\'est pas valide'];
		if(!\App\Utils::isValidStr($user_lastname)) return ['code'=>-1, 'message'=>'Le prenom n\'est pas valide'];
		if(!\App\Utils::isValidStr($user_profile)) return ['code'=>-1, 'message'=>'Le profil n\'est pas valide'];
		//if(!is_string($user_passwd) OR strlen($user_passwd) < 6) return ['code'=>-1, 'message'=>'Le mot de passe n\'est pas valide'];
		if($user_email){
			if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) return ['code'=>-1, 'message'=>'L\'adresse email n\'est pas valide'];
		}

		$userM = new \App\managers\UserManager($this->db);

                		
		//if($userM->exists('user_email', $user_email)) return ['code'=>-1, 'message'=>'L\'email est déjà pris'];  

		$user = ['user_token'=>$user_token, 'user_firstname'=>$user_firstname, 'user_lastname'=>$user_lastname, 'user_email'=>$user_email, 'user_profile'=>$user_profile];         

		
    		$userResult = $userM->update($user);


    		if(!$userResult) return ['code'=>-1, 'message'=>'Erreur de modification du compte, Veuillez réessayer'];
			
			return ['code'=>1, 'message'=>'Modification reussie ! ', 'user'=>$userResult];



    }
	
	
public function usersList(){

                // initilize all variable
                $params = $columns = $totalRecords = $data = array();

                $params = $_REQUEST;



                //define index of column   
                $columns = array(
                   0 =>'user_token',
                   1 =>'user_firstname',
                   2 => 'user_lastname',
                   3 => 'user_email',
                   4 => 'user_profile',
                   5 => 'date_creation'
                );

                $where = $sqlTot = $sqlRec = "";

                // check search value exist
                if( !empty($params['search']['value']) ) {
                    $where .=" WHERE ";
                    $where .=" ( user_token LIKE '".$params['search']['value']."%' ";
                    $where .=" OR user_firstname LIKE '".$params['search']['value']."%' ";
                    $where .=" OR user_lastname LIKE '".$params['search']['value']."%' ";
                    $where .=" OR user_email LIKE '".$params['search']['value']."%' ";
                    $where .=" OR user_profile LIKE '".$params['search']['value']."%' ";

                    $where .=" OR date_creation LIKE '".$params['search']['value']."%' )";    

                }

                // getting total number records without any search
                $sql = "SELECT user_token,user_firstname,user_lastname,user_email,user_profile,date_creation FROM `user_data`";
                

                $sqlTot .= $sql;
                $sqlRec .= $sql;
                //concatenate search sql if value exist
                if(isset($where) && $where != '') {

                    $sqlTot .= $where;
                    $sqlRec .= $where;
                }


               $sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
                $q = $this->db->prepare($sqlRec);

                 $q->execute() or die("erreur d'affichage de la liste des utlisateurs");

                //iterate on results row and create new index array of data
                while( $row = $q->fetch(\PDO::FETCH_ASSOC)) { 
                    $data[] = $row;
                }
                for($i=0; $i<count($data); $i++){

                    $data[$i]["date_creation"]= date("d-m-Y à H:i:s", strtotime(str_replace('/', '-', $data[$i]["date_creation"])));

                }

                $json_data = array(
                    "draw"            => intval( $params['draw'] ),
                    "data"            => $data   // total data array
                );


               // file_put_contents('dataCustomer',json_encode($data));       

               // return json_encode($json_data);  // send data as json format

                return $json_data;
            }
			
	public function getUser($params){
		if(!array_key_exists('user_email', $params)){
			return ['code'=>-1, 'message'=>'Veuillez bien envoyer les parametres'];
		}

		$user_email = $params['user_email'];
		$userM = new \App\managers\UserManager($this->db);
		$user = $userM->getUserByEmail($user_email);
		if(!$user){
			return ['code'=>-1, 'message'=>'Cet utilisateur n\'existe pas'];
		}

		return ['code'=>1, 'user'=>$user];
	}

public function deleteUser($params){
        if(!array_key_exists('user_token', $params)){
        	return ['code'=>-1, 'message'=>'Veuillez bien envoyer les parametres'];
     	}

        $user_token = $params['user_token'];
         $custoM = new \App\managers\UserManager($this->db);
        $result = $custoM->deleteUser($user_token);
       		if(!$result){
       			return ['code'=>-1, 'message'=>'Ce client n\'existe pas dans la base de données', 'result'=>$result];
       		}


		return ['code'=>1, 'message'=>'Suppression reussie !', 'result'=>$result];
	}	

	
	
	/****************************************CUSQTOMERS SECTION********************************************************/
	public function createCustomer($params){
		if(!array_key_exists('customer_firstname', $params) OR !array_key_exists('customer_lastname', $params) OR !array_key_exists('customer_age', $params) OR !array_key_exists('customer_profession', $params) OR !array_key_exists('customer_salary', $params )){
			return ['code'=>-1, 'message'=>'Veuillez bien envoyer tous  les parametres'];
		}

		$customer_firstname = $params['customer_firstname'];
		$customer_lastname = $params['customer_lastname']; 
		$customer_age = $params['customer_age'];
		$customer_profession = $params['customer_profession'];
		$customer_salary = $params['customer_salary'];
		//$activated  = $params['activated']; 

		if(!\App\Utils::isValidStr($customer_firstname)) return ['code'=>-1, 'message'=>'Le nom n\'est pas valide'];
		if(!\App\Utils::isValidStr($customer_lastname)) return ['code'=>-1, 'message'=>'Le prenom n\'est pas valide'];
		if(!\App\Utils::isValidStr($customer_profession)) return ['code'=>-1, 'message'=>'Le profil n\'est pas valide'];
		
		if($customer_salary < 0) return ['code'=>-1, 'message'=>'veillez saisir un salaire superieur à 0!!'];
		

		$custoM = new \App\managers\CustomerManager($this->db);
		//$validM = new \App\managers\ValidationNumero($this->db);      
		
		

		$custo = ['customer_firstname'=>$customer_firstname, 'customer_lastname'=>$customer_lastname, 'customer_age'=>$customer_age, 'customer_profession'=>$customer_profession, 'customer_salary'=>$customer_salary];         

		$custoResult = $custoM->createCustomer($custo);
		if(!$custoResult) return ['code'=>-1, 'message'=>'Erreur de creation du client, Veuillez réessayer', 'result'=>$custoResult];  

		return ['code'=>1, 'message'=>'Insertion reussie ! ', 'customer'=>$custoResult];
	}
	
	
	public function updateCustomer($params){
		if(!array_key_exists('id_customer', $params) OR !array_key_exists('customer_firstname', $params) OR !array_key_exists('customer_lastname', $params) OR !array_key_exists('customer_age', $params) OR !array_key_exists('customer_profession', $params) OR !array_key_exists('customer_salary', $params )){
			return ['code'=>-1, 'message'=>'Veuillez bien envoyer tous  les parametres'];
		}
		$id_customer = $params['id_customer'];
		$customer_firstname = $params['customer_firstname'];
		$customer_lastname = $params['customer_lastname']; 
		$customer_age = $params['customer_age'];
		$customer_profession = $params['customer_profession'];
		$customer_salary = $params['customer_salary'];
		//$activated  = $params['activated']; 

		if(!\App\Utils::isValidStr($customer_firstname)) return ['code'=>-1, 'message'=>'Le nom n\'est pas valide'];
		if(!\App\Utils::isValidStr($customer_lastname)) return ['code'=>-1, 'message'=>'Le prenom n\'est pas valide'];
		if(!\App\Utils::isValidStr($customer_profession)) return ['code'=>-1, 'message'=>'Le profil n\'est pas valide'];
		
		if($customer_salary < 0) return ['code'=>-1, 'message'=>'veillez saisir un salaire superieur à 0!!'];
		

		$custoM = new \App\managers\CustomerManager($this->db);
		$custo = ['id_customer'=>$id_customer, 'customer_firstname'=>$customer_firstname, 'customer_lastname'=>$customer_lastname, 'customer_age'=>$customer_age, 'customer_profession'=>$customer_profession, 'customer_salary'=>$customer_salary];         

		$custoResult = $custoM->updateCustomer($custo);
		if(!$custoResult) return ['code'=>-1, 'message'=>'Erreur de creation du client, Veuillez réessayer', 'result'=>$custoResult];  

		return ['code'=>1, 'message'=>'modification reussie', 'customer'=>$custoResult];
	}
	
	
	public function deleteCustomer($params){
        if(!array_key_exists('id_customer', $params)){
        	return ['code'=>-1, 'message'=>'Veuillez bien envoyer les parametres'];
     	}

        $id_customer = $params['id_customer'];
         $custoM = new \App\managers\CustomerManager($this->db);
        $result = $custoM->deleteCustomer($id_customer);
       		if(!$result){
       			return ['code'=>-1, 'message'=>'Ce client n\'existe pas dans la base de données', 'result'=>$result];
       		}


		return ['code'=>1, 'message'=>'Suppression reussie !', 'result'=>$result];
	}

	
	public function customersList(){


                             // initilize all variable
                $params = $columns = $totalRecords = $data = array();

                $params = $_REQUEST;



                //define index of column
                $columns = array(
                    0 =>'id_customer',
                    1 =>'customper_firstname',
                    2 =>'customer_lastname',
                    3 => 'customer_age',
                    4 => 'customer_profession',
					5 => 'customer_salary',
                    6 => 'date_creation'
                );

                $where = $sqlTot = $sqlRec = "";

                // check search value exist
                if( !empty($params['search']['value']) ) {
                    $where .=" WHERE ";
                    $where .=" ( id_customer LIKE '".$params['search']['value']."%' ";
                    $where .="  customer_firstname LIKE '".$params['search']['value']."%' ";
                    $where .=" OR customer_lastname LIKE '".$params['search']['value']."%' ";
                    $where .=" OR customer_age LIKE '".$params['search']['value']."%' ";
                    $where .=" OR customer_profession LIKE '".$params['search']['value']."%' ";
					$where .=" OR customer_salary LIKE '".$params['search']['value']."%' ";
                
                    $where .=" OR date_creation LIKE '".$params['search']['value']."%' )";

                }

                // getting total number records without any search
                $sql = "SELECT id_customer, customer_firstname, customer_lastname, customer_age, customer_profession, customer_salary, date_creation FROM customer_data";
                 $sqlTot .= $sql;
                $sqlRec .= $sql;
                //concatenate search sql if value exist
                if(isset($where) && $where != '') {

                    $sqlTot .= $where;
                    $sqlRec .= $where;
                }


               $sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

               $q = $this->db->prepare($sqlRec);

                 $q->execute() or die("erreur d'affichage de la liste des utlisateurs");

                //iterate on results row and create new index array of data
                while( $row = $q->fetch(\PDO::FETCH_ASSOC)) {   
                    $data[] = $row;
                }
                for($i=0; $i<count($data); $i++){

                    $data[$i]["date_creation"]= date("d-m-Y à H:i:s", strtotime(str_replace('/', '-', $data[$i]["date_creation"])));

                }

                $json_data = array(
                    "draw"            => intval( $params['draw'] ),
                    "data"            => $data   // total data array
                );


                //file_put_contents('dataCustomer',json_encode($json_data));

               // return json_encode($json_data);  // send data as json format

                return $json_data;
            }
			
public function getCustomer($params){
		if(!array_key_exists('id_customer', $params)){
			return ['code'=>-1, 'message'=>'Veuillez bien envoyer les parametres'];
		}

		$id_customer = $params['id_customer'];
		$custoM = new \App\managers\CustomerManager($this->db);
		$custo = $custoM->getCustomerById($id_customer);
		if(!$custo){
			return ['code'=>-1, 'message'=>'Ce client n\'existe pas'];
		}

		return ['code'=>1, 'customer'=>$custo];
	}		
	      

public function getProfession(){
		
		
		$profM = new \App\managers\CustomerManager($this->db);
		$prof = $profM->getAllProfession();
		if(!$prof){
			return ['code'=>-1, 'message'=>'erreur !'];
		}

		return ['code'=>1, 'profession'=>$prof];
	}	
	
	
	public function getAvgByProfession($params){
		if(!array_key_exists('customer_profession', $params)){
			return ['code'=>-1, 'message'=>'Veuillez bien envoyer le parametre'];
		}

		$customer_profession = $params['customer_profession'];
		$avgM = new \App\managers\CustomerManager($this->db);
		$avg = $avgM->getAVGByProfession($customer_profession);  
		if(!$avg){
			return ['code'=>-1, 'message'=>'pas de moyenne'];
		}

		return ['code'=>1, 'moyenne'=>$avg];
	}
			
public function getAvgByType(){
		
		
		$avgM = new \App\managers\CustomerManager($this->db);
		$avg = $avgM->getAVG();
		if(!$avg){
			return ['code'=>-1, 'message'=>'pas de moyenne'];
		}

		return ['code'=>1, 'moyenne'=>$avg];   
	}

         

public function uploadDataJson(){
		
		
           extract($_POST);
          
		$dataM = new \App\managers\CustomerManager($this->db);
		
		
		$target_dir = "upload/";   

       $target_file = $target_dir . basename($_FILES["file_test"]["name"]);

       $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

          if($imageFileType != "json")   
             {
				 return ['code'=>-1, 'message'=>'le format du fichier n\'est pas du json. Veillez réessayer!'];;
                
             } 

          

               $json_path="upload/".$_FILES['file_test']['name'];    

             move_uploaded_file($_FILES["file_test"]["tmp_name"],$target_file);  
		
          $file = $json_path; 
          $data = file_get_contents($file); 
          $obj = json_decode($data); 
		  $count=0;
		  
		  for($i=0; $i<count($obj); $i++){

                   // $data[$i]["date_creation"]= date("d-m-Y à H:i:s", strtotime(str_replace('/', '-', $data[$i]["date_creation"])));
              $dataa = ['customer_firstname'=>$obj[$i]->nom, 'customer_lastname'=>$obj[$i]->prenom, 'customer_age'=>$obj[$i]->age, 'customer_profession'=>$obj[$i]->profession, 'customer_salary'=>$obj[$i]->salaire];         
              $result = $dataM->createCustomer($dataa);
			  $count++;
                }
				
	if($count!=count($obj)){
		
          return ['code'=>-1, 'message'=>'insertion partiellement reussie. Veillez veriifer vos données!'];
	}
		 
		return ['code'=>1, 'message'=>"insertion reussie !".$imageFileType];
	}
	
	
	public function uploadDataXml(){
		
		 extract($_POST);
          
		$dataM = new \App\managers\CustomerManager($this->db);
		
		
		$target_dir = "upload/";   

       $target_file = $target_dir . basename($_FILES["file_test"]["name"]);

       $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

          if($imageFileType != "xml")   
             {
				 return ['code'=>-1, 'message'=>'le format du fichier n\'est pas du xml. Veillez réessayer!'];;
                
             } 

          

               $json_path="upload/".$_FILES['file_test']['name'];    

             move_uploaded_file($_FILES["file_test"]["tmp_name"],$target_file);  
		
		$file = $json_path; 
		$xml = simplexml_load_file($file);
		$test="";
 
        foreach($xml->children() as $client){
			             
          // $nom = $epreuve['nom_categorie'] ;         
           //$num = $epreuve['num'] ;      
        
		      $dataa = ['customer_firstname'=>$client->nom, 'customer_lastname'=>$client->prenom, 'customer_age'=>$client->age, 'customer_profession'=>$client->profession, 'customer_salary'=>$client->salaire];         
              $result = $dataM->createCustomer($dataa);
			  $test = $client->nom;        
			  
			  
		}    
		 
		return ['code'=>1, 'message'=>'insertion reussie'];        
	}
	
public function uploadDataCsv(){
		
		
    extract($_POST);
          
		$dataM = new \App\managers\CustomerManager($this->db);
		
		
		$target_dir = "upload/";   

       $target_file = $target_dir . basename($_FILES["file_test"]["name"]);

       $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

          if($imageFileType != "csv")   
             {
				 return ['code'=>-1, 'message'=>'le format du fichier n\'est pas du csv. Veillez réessayer!'];;
                
             } 

          

               $json_path="upload/".$_FILES['file_test']['name'];    

             move_uploaded_file($_FILES["file_test"]["tmp_name"],$target_file);  
		
		$file = $json_path; 
		  
       if (($open = fopen($file, "r")) !== FALSE) 
        {
			$compteur =0;
              while (($data = fgetcsv($open, 1000, ";")) !== FALSE)      
                   {   
			        $line[] = $data;   
										
					  					          
			       
	                         	$dataa = ['customer_firstname'=>$line[$compteur][0], 'customer_lastname'=>$line[$compteur][1], 'customer_age'=>$line[$compteur][2], 'customer_profession'=>$line[$compteur][3], 'customer_salary'=>$line[$compteur][4]];         
                                $result = $dataM->createCustomer($dataa);   
                       $compteur++;       
				   }		  
	   fclose($open); 
	}		 
		return ['code'=>1, 'message'=>'insertion reussie !'];        
	}
	
	
	public function uploadDataTxt(){
		
		 extract($_POST);     
          
		$dataM = new \App\managers\CustomerManager($this->db);
		
		
		$target_dir = "upload/";   

       $target_file = $target_dir . basename($_FILES["file_test"]["name"]);

       $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

          if($imageFileType != "txt")   
             {
				 return ['code'=>-1, 'message'=>'le format du fichier n\'est pas du txt. Veillez réessayer!'];;
                
             } 

               $json_path="upload/".$_FILES['file_test']['name'];    

             move_uploaded_file($_FILES["file_test"]["tmp_name"],$target_file);  
		
		$file = $json_path; 
		$lines = explode("\n", file_get_contents($file));
		
 
        for($i=0; $i<count($lines); $i++){
			             
              
        $row = explode(" ", $lines[$i]);
		      $dataa = ['customer_firstname'=>$row[0], 'customer_lastname'=>$row[1], 'customer_age'=>$row[2], 'customer_profession'=>$row[3], 'customer_salary'=>$row[4]];         
              $result = $dataM->createCustomer($dataa);			  
		}    
		 
		return ['code'=>1, 'message'=>'insertion reussie'];        
	}
		
public function deconnexion(){
	 session_destroy();
		
  return ['code'=>1, 'message'=>'Deconnexion reussie'];
}
	
 

}