<?php
namespace App;

class Token{
	private $keys = ['users'=>'XnGHCCb7w2FccKPNZDncNTZRprT7bT68','create_user'=>'RJ2bHOrjE0ZheZ2ymPSIzw==', 'update_account'=>'drxvwD225nUfXBEMTefOgQ=='];
	
	public function validate($request, $token){
		$route = $request->getAttribute('route');     
		$routeName = $route->getName();
		if(!array_key_exists($routeName, $this->keys)) return FALSE;

		$key = $this->keys[$routeName];
		if(!$token) return FALSE;
		$tab = explode('.', $token);

		if(count($tab) != 3) return FALSE;

		$hash = hash_hmac('SHA256', $tab[0].'.'.$tab[1], $key, TRUE);
		$encode_hash = self::base64url_encode($hash);
		if($encode_hash != $tab[2]) return FALSE;

		$data = json_decode(self::base64url_decode($tab[1]), TRUE);
		$request = $request->withAttribute('infos', $data);
		return $request;
	}

	public static function base64url_encode($data){
		$b64 = base64_encode($data);
		if ($b64 === false) {
		  	return false;
		}
		// Convert Base64 to Base64URL by replacing “+” with “-” and “/” with “_”
		$url = strtr($b64, '+/', '-_');
		// Remove padding character from the end of line and return the Base64URL result
		return rtrim($url, '=');
	}
	public static function base64url_decode($data, $strict = false){
	  // Convert Base64URL to Base64 by replacing “-” with “+” and “_” with “/”
	  $b64 = strtr($data, '-_', '+/');
	  // Decode Base64 string and return the original data
	  return base64_decode($b64, $strict);
	}
}