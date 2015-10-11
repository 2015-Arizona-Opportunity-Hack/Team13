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

		$app->get('/:eventid/', function($eventid) use ($app, $resourceServer) {
			$event = new Event();

			$json = $event->getEvent($eventid);

			echo $json;
		});

		$app->get('/host/', $authorize(), function() use ($app, $resourceServer) {
			$hostid = $resourceServer->getAccessToken()->getSession()->getOwnerId();

			$event = new Event();

			$json = $event->getHostEvents($hostid);

			echo $json;
		});

		// $app->post('/notify/', function() use ($app, $resourceServer) {
		// 	$to = $app->request->post('to');
		// 	$subject = $app->request->post('subject');
		// 	$message = $app->request->post('message');
		// 	$headers = "From: goraffleme@aol.com";
		// 	if(mail("reyomar80@hotmail.com", $subject, $message)) {
		// 		echo "MAIL SENT";
		// 	}
		// 	else {
		// 		echo "MAIL FAILED";
		// 	}
		// }); HAVIG ISSUES WITH php.ini
	});

?>