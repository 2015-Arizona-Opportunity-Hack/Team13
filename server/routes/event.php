<?php

	use Models\Event;
	use Lib\OAuth2\OAuth2;

	$app->group('/event', function() use($app, $authorize, $resourceServer) {
		//create new event//
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
			//perform insertion//
			$json = $event->addEvent($hostid, $name, $startdate, $enddate, $addr1, $addr2, $city, $state, $zip, $islocal, $isvirtual, $ticketprice, $description);
			//return results//
			echo $json;
		});
		//get specific event//
		$app->get('/id/:eventid/', function($eventid) use ($app, $resourceServer) {
			$event = new Event();
			$json = $event->getEvent($eventid);
			echo $json;
		});
		//get events for a specific host//
		$app->get('/host/', $authorize(), function() use ($app, $resourceServer) {
			//get currently logged in host id from session//
			$hostid = $resourceServer->getAccessToken()->getSession()->getOwnerId();
			$event = new Event();
			$json = $event->getHostEvents($hostid);
			echo $json;
		});
		//send out emails to winners//
		//never got finished. localhost is a very uncooperative with sending emails...
		// $app->post('/notify/', function() use ($app, $resourceServer) {
		// 	$to = $app->request->post('to');
		// 	$subject = $app->request->post('subject');
		// 	$message = $app->request->post('message');
		// 	$headers = "From: goraffleme@aol.com";
		// 	if(mail($to, $subject, $message)) {
		// 		$array = array('success' => true,
		// 		'message' => 'Mail Sent');
		// 		echo json_encode($array);	
		// 	}
		// 	else {
		// 		$array = array('success' => true,
		// 		'message' => 'MAIL FAILED');
		// 		echo json_encode($array);	
		// 	}
		// }); 
	});
?>