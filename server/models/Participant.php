<?php

namespace Models;

use Lib\Database;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Participant extends Eloquent {

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'participants';
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

	public function addParticipant($eventid, $name, $email, $phone, $orderid) {
		$participant = new Participant();
		$participant->eventid = $eventid;
		$participant->name = $name;
		$participant->email = $email;
		$participant->phone = $phone;
		$participant->orderid = $orderid;

		$saved = $participant->save();

		if($saved) {
			$array = array('success' => true,
				'participant' => $participant);

			return json_encode($array);
		} else {
			$array = array('success' => false,
				'message' => 'An error occurred');

			return json_encode($array);
		}

	}

	/*public function getParticipant($eventid) {
		$participant = Participant::where('eventid', $id)->first();

		if($participant === null) {
			$
		}

	}*/

	
}


?>