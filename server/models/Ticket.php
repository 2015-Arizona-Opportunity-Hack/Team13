<?php

namespace Models;

use Lib\Database;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Ticket extends Eloquent {

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickets';
    /**
     * The database table primary key used by the model.
     *
     * @var string
     */
    public $primaryKey  = 'id';
    /**
     * Tells Eloquent that our database table doesn't have timestamps
     *
     * @var boolean
     */
    public $timestamps = false; 

	protected $database;
	
	function __construct() {
		$this->database = Database::getInstance();
	}

	public function addTicket($participantid, $eventid, $orderid) {

		$characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 10; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }


		$ticket = new Ticket();
		$ticket->participantid = $participantid;
		$ticket->eventid = $eventid;
		$ticket->orderid = $orderid;
		$ticket->confirmation = $randomString;

		$saved = $ticket->save();

		if($saved) {
			$array = array('success' => true,
				'ticket' => $ticket);

			return json_encode($array);
		} else {
			$array = array('success' => false,
				'message' => 'An error occurred');

			return json_encode($array);
		}

	}

	public function getTickets($eventid) {
		$tickets = Ticket::where('eventid', $eventid)->get();

		if($tickets === null) {
			$array = array('success' => false,
				'message' => 'No tickets found for this event');

			return json_encode($array);
		}

		$array = array('success' => true,
				'tickets' => $tickets);

		return json_encode($array);
	}


	
}


?>