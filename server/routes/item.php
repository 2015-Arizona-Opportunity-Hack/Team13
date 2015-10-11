<?php
	use Models\Item;
	use Models\Winner;
	use Models\Ticket;
	use Models\Participant;
	use Models\Event;
	use Lib\OAuth2\OAuth2;

	$app->group('/item', function() use($app, $authorize, $resourceServer) {
		//create new item for an event//
		$app->post('/', $authorize(), function() use ($app, $resourceServer) {
			$item = new Item();
			$eventid = $app->request->post('eventid');
			$name = $app->request->post('name');
			$description = $app->request->post('description');
			$pathtopic = $app->request->post('pathtopic');
			$storeprice = $app->request->post('storeprice');
			$event = new Event();
			//determine currently logged in user//
			$userid = $resourceServer->getAccessToken()->getSession()->getOwnerId();
			//verify the logged in user owns the event that the item will be added to//
			if ($event->verifyHost($eventid,$userid)) {
				$json = $item->addItem($eventid, $name, $description, $pathtopic, $storeprice);
				echo $json;
			}
			else {
				$array = array('success' => false,
					'message' => 'Failed to add item');
				echo json_encode($array);	
			}
		});
		//get all items for a specific event//
		$app->get('/event/:eventid/', $authorize(), function($eventid) use ($app, $resourceServer) {
			$item = new Item();
			$event = new Event();
			//determine currently logged in user//
			$userid = $resourceServer->getAccessToken()->getSession()->getOwnerId();
			//verify the logged in user owns the event that the item will be added to//
			if ($event->verifyHost($eventid,$userid)) {
				$json = $item->getItems($eventid);
				echo $json;
			}
			else {
				$array = array('success' => false,
					'message' => 'Failed to find event');
				echo json_encode($array);	
			}
		});
		//get specific item//
		$app->get('/:itemid/', $authorize(), function($itemid) use ($app, $resourceServer) {
			$item = new Item();
			$json = $item->getItem($itemid);
			echo $json;
		});
		//determine prize winner//
		$app->post('/winner/', $authorize(), function() use ($app, $resourceServer) {
			$winner = new Winner();
			$item = new Item();
			$itemid = $app->request->post('itemid');
			$item = $item->getItem($itemid);
			$item = json_decode($item);
			//check that item exists//
			if ($item->success) {
				$ticket = new Ticket();
				$item = $item->item;
				//get all the tickets for the event and perform messy json conversions -_- //
				$ticketDecode = json_decode($ticket->getTickets($item->eventid),true);
				$tickets = $ticketDecode['tickets'];
				$event = new Event();
				//get currently logged on host//
				$userid = $resourceServer->getAccessToken()->getSession()->getOwnerId();
				//verify that current host owns the event of the item//
				if ($event->verifyHost($item->eventid, $userid)) {
					//pick a random ticket//
					if (sizeof($tickets) > 0) {
						$numTix = sizeof($tickets);
						$picked = true;
						//more messy json conversions...//
						$lucky = json_decode($winner->pickWinner($itemid, $ticket['participantid'])); 
						$luckyWinner = $lucky->winner;
						//verify that the item has not been won//
						if ($luckyWinner != "Winner already chosen") {
							//get the winner's personal info to pass back with the winning ticket info//
							$luckyParticipant = Participant::where('id', $luckyWinner->participantid)->first();
							$array = array('success' => true,
							'ticket' => $ticket, 'participant' => $luckyParticipant);
							echo json_encode($array);	
						}
						else {
							$array = array('success' => false,
							'message' => "Winner already chosen");
							echo json_encode($array);		
						}
					}
					else {
						$array = array('success' => false,
						'message' => "NO TICKETS PURCHASED!!");
						echo json_encode($array);	
					}
				}
				else {
					$array = array('success' => false,
					'message' => "WRONG HOST");
					echo json_encode($array);	
				}
			}
			else {
				$array = array('success' => false,
				'message' => "NO ITEM FOUND!");
				echo json_encode($array);	
			}	
		});
		//look up the winner for an item//
		$app->get('/winner/:itemid/', $authorize(), function($itemid) use ($app, $resourceServer) {
			$winner = new Winner();
			$json = $winner->lookupWinner($itemid);
			echo $json;
		});
	});
?>