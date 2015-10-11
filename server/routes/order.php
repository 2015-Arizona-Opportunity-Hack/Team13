<?php

	use Models\Order;
	use Lib\OAuth2\OAuth2;

	$app->group('/order', function() use($app, $authorize, $resourceServer) {
		//create order//
		$app->post('/', $authorize(), function() use ($app, $resourceServer) {
			$order = new order();
			$ordernumber = mt_rand(); //would be the paypal ordernumber, when actual transactions are processed//
			$ticketquantity = $app->request->post('ticketquantity');
			$participantid = $app->request->post('participantid');
			//perform insertion//
			$json = $order->addOrder($ordernumber, $ticketquantity, $participantid);
			echo $json;
		});
		//get specific order//
		$app->get('/:id/', $authorize(), function($id) use ($app, $resourceServer) {
			$order = new order();
			$json = $order->getOrder($id);
			echo $json;
		});
	});
?>