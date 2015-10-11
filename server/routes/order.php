<?php

use Models\Order;
use Lib\OAuth2\OAuth2;

$app->group('/order', function() use($app, $authorize, $resourceServer) {

	$app->post('/', $authorize(), function() use ($app, $resourceServer) {
		$order = new order();

		$ordernumber = $app->request->post('ordernumber');
		$ticketquantity = $app->request->post('ticketquantity');

		$json = $order->addOrder($ordernumber, $ticketquantity);

		echo $json;
	});

	$app->get('/:id/', $authorize(), function($id) use ($app, $resourceServer) {
		$order = new order();

		$json = $order->getOrder($id);

		echo $json;
	});


});

?>