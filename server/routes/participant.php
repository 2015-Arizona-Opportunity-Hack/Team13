<?php

	use Models\Participant;
	use Lib\OAuth2\OAuth2;

	$app->group('/participant', function() use($app, $authorize, $resourceServer) {
		//create participant to own an order//
		$app->post('/', $authorize(), function() use ($app, $resourceServer) {
			$participant = new Participant();
			$eventid = $app->request->post('eventid');
			$name = $app->request->post('name');
			$email = $app->request->post('email');
			$phone = $app->request->post('phone');
			$orderid = $app->request->post('orderid');
			//perform insertion//
			$json = $participant->addParticipant($eventid, $name, $email, $phone, $orderid);
			echo $json;
		});
		//get participants for an event//
		$app->get('/participants/event/:eventid/', $authorize(), function($eventid) use ($app, $resourceServer) {
			$participant = new Participant();
			$json = $participant->getParticipants($eventid);
			echo $json;
		});
	});
?>