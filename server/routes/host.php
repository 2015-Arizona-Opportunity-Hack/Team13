<?php

	use Models\Host;
	use Lib\OAuth2\OAuth2;

	$app->group('/host', function() use($app, $authorize, $resourceServer) {
		//create host account//
		$app->post('/', function() use ($app, $resourceServer) {
			$host = new host();
			$firstname = $app->request->post('firstname');
			$lastname = $app->request->post('lastname');
			$email = $app->request->post('email');
			$phone = $app->request->post('phone');
			$username = $app->request->post('username');
			$password = $app->request->post('password');
			//perform insertion//
			$json = $host->addHost($firstname, $lastname, $email, $phone, $username, $password);
			echo $json;
		});
		//get specific host//
		$app->get('/', $authorize(), function() use ($app, $resourceServer) {
			//determine currently logged in host//
			$id = $resourceServer->getAccessToken()->getSession()->getOwnerId();
			$host = new host();
			$json = $host->getHost($id);
			echo $json;
		});
	});
?>