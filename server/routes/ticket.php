<?php

	use Models\Ticket;
	use Lib\OAuth2\OAuth2;

	$app->group('/ticket', function() use($app, $authorize, $resourceServer) {
		//create ticket//
		$app->post('/', $authorize(), function() use ($app, $resourceServer) {
			$ticket = new Ticket();
			$participantid = $app->request->post('participantid');
			$eventid = $app->request->post('eventid');
			$orderid = $app->request->post('orderid');
			//perform insertion//
			$json = $ticket->addTicket($participantid, $eventid, $orderid);
			echo $json;
		});
		//get all tickets for an event//
		$app->get('/event/:eventid/', function($eventid) use ($app, $resourceServer) {
			$ticket = new Ticket();
			$json = $ticket->getTickets($eventid);
			echo $json;
		});
	});
?>