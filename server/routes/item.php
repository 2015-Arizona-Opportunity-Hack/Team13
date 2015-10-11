<?php
	use Models\Item;
	use Models\Winner;
	use Lib\OAuth2\OAuth2;

	$app->group('/item', function() use($app, $authorize, $resourceServer) {
		$app->post('/', authorized(), function() use ($app, $resourceServer) {
			$item = new Item();
			$eventid = $app->request->post('eventid');
			$name = $app->request->post('name');
			$description = $app->request->post('description');
			$pathtopic = $app->request->post('pathtopic');
			$storeprice = $app->request->post('storeprice');
			if (verifyHost($eventid)) {
				$json = $item->addItem($eventid, $name, $description, $pathtopic, $storeprice);
				echo $json;
			}
			else {
				echo "WRONG HOST!";
			}

		});
	});
?>