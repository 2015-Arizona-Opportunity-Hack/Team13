<?php
	use Models\Item;
	use Models\Winner;
	use Models\Ticket;
	use Models\Participant;
	use Models\Event;
	use Lib\OAuth2\OAuth2;

	$app->group('/item', function() use($app, $authorize, $resourceServer) {
		$app->post('/', $authorize(), function() use ($app, $resourceServer) {
			$item = new Item();
			$eventid = $app->request->post('eventid');
			$name = $app->request->post('name');
			$description = $app->request->post('description');
			$pathtopic = $app->request->post('pathtopic');
			$storeprice = $app->request->post('storeprice');
			
			$event = new Event();
			$userid = $resourceServer->getAccessToken()->getSession()->getOwnerId();

			if ($event->verifyHost($eventid,$userid)) {
				$json = $item->addItem($eventid, $name, $description, $pathtopic, $storeprice);
				echo $json;
			}
			else {
				echo "WRONG HOST!";
			}

		});

		$app->get('/event/:eventid/', $authorize(), function($eventid) use ($app, $resourceServer) {
			$item = new Item();
			$event = new Event();
			$userid = $resourceServer->getAccessToken()->getSession()->getOwnerId();

			if ($event->verifyHost($eventid,$userid)) {
				$json = $item->getItems($eventid);
				echo $json;
			}
			else {
				echo "WRONG HOST!";
			}
			
		});

		$app->get('/:itemid/', $authorize(), function($itemid) use ($app, $resourceServer) {
			$item = new Item();
			$json = $item->getItem($itemid);
			echo $json;
		});

		$app->post('/winner/', $authorize(), function() use ($app, $resourceServer) {
			$winner = new Winner();
			$item = new Item();
			$itemid = $app->request->post('itemid');
			$item = $item->getItem($itemid);
			if ($item != null) {
				$ticket = new Ticket();
				$ticketDecode = json_decode($ticket->getTickets($item->eventid),true);
				$tickets = $ticketDecode['tickets'];
				$event = new Event();
				$userid = $resourceServer->getAccessToken()->getSession()->getOwnerId();
				if ($event->verifyHost($item->eventid, $userid)) {
					if (sizeof($tickets) > 0) {
						$numTix = sizeof($tickets);
						$winningNum = rand(0,$numTix);
						$ticket = $tickets[$winningNum];
						$lucky = json_decode($winner->pickWinner($itemid, $ticket['participantid']));
						$luckyWinner = $lucky->winner;
						if ($luckyWinner != "Winner already chosen") {
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
						echo "NO TICKETS PURCHASED!!";
					}
				}
				else {
					echo "WRONG HOST";
				}
			}
			else {
				echo "NO ITEM FOUND!";
			}	
		});

		$app->get('/winner/:itemid/', $authorize(), function($itemid) use ($app, $resourceServer) {
			$winner = new Winner();

			$json = $winner->lookupWinner($itemid);

			echo $json;
		});

	});
?>