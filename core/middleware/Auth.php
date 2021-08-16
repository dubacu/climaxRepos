<?php
namespace middleware;

class Auth{
	 private $freezone = ['test','connexion', 'create_user', 'update_account','delete_user', 'create_customer', 'update_customer', 'delete_customer',
  'users_list', 'customers_list', 'get_user', 'get_customer','customers_avg','customer_json','customer_xml','customer_csv','customer_txt', 'customers_profession',
  'avg_profession','deconnexion'];          
	private $message;

	public function __construct($message = 'Accès protegé'){         
		$this->message = $message;      
	}

	public function acces_deny($response){    
		return $response->withStatus(401)->withHeader('WWW-Authenticate', 'Bearer='.$this->message)->write($this->message);
	}

	public function __invoke($request, $response, $next){
		$route = $request->getAttribute('route');    
		$name = $route->getName();
		if(in_array($name, $this->freezone)) return $next($request, $response);

		$bearer = $request->getHeaderLine('Authorization');
		if(substr($bearer, 0, 6) != 'Bearer') return $this->acces_deny($response->write("Bearer non valide : "));

		$token = substr($bearer, 7, strlen($bearer));
		$tokenObject = new \App\Token();
		$ok = $tokenObject->validate($request, $token);

		if(!$ok) return $this->acces_deny($response->write("format jwt non valide : "));
		return $next($ok, $response);
	}
}

?>