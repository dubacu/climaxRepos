<?php
	require "vendor/autoload.php";
	$app = new \Slim\App([
		'settings' => [
			'determineRouteBeforeAppMiddleware' => true,
			'displayErrorDetails' => true
		]
	]);
	
	session_start();
	ini_set('memory_limit', '128M');

	$app->add(function($request, $response, $next) {
	    $response = $next($request, $response);
	    return $response->withHeader('Content-Type', 'application/json');     
	});
	
	$container = $app->getContainer();

	unset($container['notFoundHandler']);
	$container['notFoundHandler'] = function ($c) {
	    return function ($request, $response) use ($c) {
	        $response = new \Slim\Http\Response(404);
	        return $response->write("Page not found");
	    };
	};

	$app->add(new \middleware\Auth());

	$container['handler'] = function($c){
		$h = new \App\Handler();
		return $h;
	};


	$app->get('/v1/test/', function(){
		echo "just un test";
	})->setName('test');

/******************************Users MANAGER******************************/
          
$app->post('/v1/users/create/', function($request, $response){  
		$handler = $this->handler;
		$re = $handler->createAccount($request->getParams());
		echo json_encode($re);
	})->setName('create_user');  
	
$app->post('/v1/users/update/', function($request, $response){
    		$handler = $this->handler;
    		$re = $handler->updateAccount($request->getParams());
    		echo json_encode($re);
    	})->setName('update_account');
		
$app->post('/v1/connexion/', function($request, $response){
		$handler = $this->handler;
		$re = $handler->connexion($request->getParams());
		echo json_encode($re);
	})->setName('connexion');
	
$app->get('/v1/essai/affichage/', function($request, $response){    
                  $handler = $this->handler;
                  $re = $handler->usersList();
                  echo json_encode($re);
         	})->setName('users_list');

$app->post('/v1/users/delete/', function($request, $response){
    	$handler = $this->handler;
    	$re = $handler->deleteUser($request->getParams());
    	echo json_encode($re);
    })->setName('delete_user');   	         
				
			
$app->post('/v1/users/get_user/', function($request, $response){  
		$handler = $this->handler;
		$re = $handler->getUser($request->getParams());
		echo json_encode($re);
	})->setName('get_user'); 			

/*******************CUSTOMERS MANAGER******************************/
$app->post('/v1/customers/create/', function($request, $response){
    	$handler = $this->handler;
    	$re = $handler->createCustomer($request->getParams());
    	echo json_encode($re);
    })->setName('create_customer');
	
$app->post('/v1/customers/update/', function($request, $response){
    	$handler = $this->handler;
    	$re = $handler->updateCustomer($request->getParams());
    	echo json_encode($re);
    })->setName('update_customer');   
	
$app->post('/v1/customers/delete/', function($request, $response){
    	$handler = $this->handler;
    	$re = $handler->deleteCustomer($request->getParams());
    	echo json_encode($re);
    })->setName('delete_customer');   	
	
$app->get('/v1/customers/list/', function($request, $response){
                  $handler = $this->handler;
                  $re = $handler->customersList();
                  echo json_encode($re);
         	})->setName('customers_list');	   

$app->post('/v1/customers/get_customer/', function($request, $response){  
		$handler = $this->handler;
		$re = $handler->getCustomer($request->getParams());
		echo json_encode($re);
	})->setName('get_customer');			

$app->post('/v1/get/histo/', function($request, $response){   
    	$handler = $this->handler;
    	$re = $handler->getHistoByPhoneNumber($request->getParams());
    	echo json_encode($re);
    })->setName('get_histo');
	
$app->get('/v1/customers/avg/', function($request, $response){
                  $handler = $this->handler;
                  $re = $handler->getAvgByType();
                  echo json_encode($re);
         	})->setName('customers_avg');	

$app->post('/v1/customers/upload/json/', function($request, $response){
    	$handler = $this->handler;
    	$re = $handler->uploadDataJson($request->getParams());
    	echo json_encode($re);
    })->setName('customer_json');

$app->post('/v1/customers/upload/xml/', function($request, $response){
    	$handler = $this->handler;
    	$re = $handler->uploadDataXml($request->getParams());
    	echo json_encode($re);
    })->setName('customer_xml'); 	   

$app->post('/v1/customers/upload/csv/', function($request, $response){
    	$handler = $this->handler;
    	$re = $handler->uploadDataCsv($request->getParams());
    	echo json_encode($re);
    })->setName('customer_csv');
	
$app->post('/v1/customers/upload/txt/', function($request, $response){
    	$handler = $this->handler;
    	$re = $handler->uploadDataTxt($request->getParams());
    	echo json_encode($re);
    })->setName('customer_txt');	    

$app->get('/v1/customers/profession/', function($request, $response){
                  $handler = $this->handler;
                  $re = $handler->getProfession();
                  echo json_encode($re);
         	})->setName('customers_profession');	
			
$app->post('/v1/customers/avg/profession/', function($request, $response){
                  $handler = $this->handler;
                  $re = $handler->getAvgByProfession($request->getParams());
                  echo json_encode($re);
         	})->setName('avg_profession');	

$app->get('/v1/deconnexion/', function($request, $response){
                  $handler = $this->handler;
                  $re = $handler->deconnexion();
                  echo json_encode($re);
         	})->setName('deconnexion');			   

	$app->run();
?>