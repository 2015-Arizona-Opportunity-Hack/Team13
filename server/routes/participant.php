<?php

use Models\Participant;
use Lib\OAuth2\OAuth2;

$app->group('/participant', function() use($app, $authorize, $resourceServer) {

	$app->post('/', $authorize(), function() use ($app, $resourceServer) {
		$participant = new Participant();

		$eventid = $app->request->post('eventid');
		$name = $app->request->post('name');
		$email = $app->request->post('email');
		$phone = $app->request->post('phone');
		$orderid = $app->request->post('orderid');

		$json = $participant->addParticipant($eventid, $name, $email, $phone, $orderid);

		echo $json;
	});


});

?>