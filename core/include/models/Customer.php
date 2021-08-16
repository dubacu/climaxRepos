<?php
namespace App\models;

class Customer{
	public $id_customer;
	public $customer_firstname;
	public $customer_lastname;
	public $customer_age;
	public $customer_profession;
	public $customer_salary;
	public $date_creation;
	

	public function __construct($id_customer, $customer_firstname, $customer_lastname, $customer_age, $customer_profession, $customer_salary, $date_creation){
		$this->id_customer = $id_customer;
		$this->customer_firstname = $customer_firstname;
		$this->customer_lastname = $customer_lastname;    
		$this->customer_age = $customer_age;
		$this->customer_profession = $customer_profession;
		$this->customer_salary = $customer_salary;
		$this->date_creation = $date_creation;   
		
	}
}