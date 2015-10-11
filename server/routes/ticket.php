<?php

use Models\Ticket;
use Lib\OAuth2\OAuth2;

$app->group('/ticket', function() use($app, $authorize, $resourceServer) {

	$app->post('/', $authorize(), function() use ($app, $resourceServer) {
		$ticket = new Ticket();

		$participantid = $app->request->post('participantid');
		$eventid = $app->request->post('eventid');
		$orderid = $app->request->post('orderid');
		$confirmation = $app->request->post('confirmation');

		$json = $ticket->addTicket($participantid, $eventid, $orderid, $confirmation);

		echo $json;
	});

	$app->get('/:id/', $authorize(), function($id) use ($app, $resourceServer) {
		$order = new order();

		$json = $order->getOrder($id);

		echo $json;
	});


});

?>