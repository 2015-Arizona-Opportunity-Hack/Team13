<?php

	use Models\Event;
	use Lib\OAuth2\OAuth2;

	$app->group('/event', function() use($app, $authorize, $resourceServer) {

		$app->post('/', $authorize(), function() use ($app, $resourceServer) { 
			$event = new event();

			$hostid = $resourceServer->getAccessToken()->getSession()->getOwnerId();
			$name = $app->request->post('name');
			$startdate = $app->request->post('startdate');
			$enddate = $app->request->post('enddate');
			$addr1 = $app->request->post('addr1');
			$addr2 = $app->request->post('addr2');
			$city = $app->request->post('city');
			$state = $app->request->post('state');
			$zip = $app->request->post('zip');
			$islocal = $app->request->post('islocal');
			$isvirtual = $app->request->post('isvirtual');
			$ticketprice = $app->request->post('ticketprice');
			$description = $app->request->post('description');

			$json = $event->addEvent($hostid, $name, $startdate, $enddate, $addr1, $addr2, $city, $state, $zip, $islocal, $isvirtual, $ticketprice, $description);

			echo $json;
		});
	});

?>