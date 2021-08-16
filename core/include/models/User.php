<?php
namespace App\models;

class User{
	public $id_user;
	public $user_token;
	public $user_firstname;
	public $user_lastname;
	public $user_email;
	public $user_passwd;
	public $user_profile;
	public $activated;
	public $date_creation;

	public function __construct($id_user, $user_token, $user_firstname, $user_lastname, $user_email, $user_passwd, $user_profile, $activated, $date_creation){
		$this->id_user = $id_user;
		$this->user_token = $user_token;
		$this->user_firstname = $user_firstname;
		$this->user_lastname = $user_lastname;
		$this->user_email = $user_email;
		$this->user_passwd = $user_passwd;
		$this->user_profile = $user_profile;
		$this->activated = $activated;
		$this->date_creation = $date_creation;   
		
	}
}