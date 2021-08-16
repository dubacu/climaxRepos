<?php
namespace App;

class Utils{
	
	public static function isValidStr($str){
		if(is_string($str)){
			if(preg_match("#^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ.\s-]{2,}$#", $str)){
				return true;
			}else{
				return false;
			}
		}else return false;
	}

	public static function isPhoneNumber($number){
		$v = preg_match("#^(\+226|00226)?([0-9]{8})$#", $number);
		return $v ? TRUE : FALSE;
	}

	/*public static function sendMessage($phone, $message){
		self::sendMessageWhatsapp($phone, $message);
		if(self::isPhoneNumber($phone)){
			try{
			    $unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E','Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U','Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y');
				   
				$message = urlencode(strtr($message, $unwanted_array));
		    	$url = "https://smsbf.revo-tech.org/send?username=swagpay&password=123456&from=3304&content=".$message."&to=226".$phone."&dlr=yes&coding=0";

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($ch);
				return 1;
			}catch(Exception $e){
				return 0;
			}
		}else{
			return 0;
		}
	}*/

	
}