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
		//Eloquent constructor//
		function __construct() {
			$this->database = Database::getInstance();
		}
		//add participants//
		public function addParticipant($eventid, $name, $email, $phone, $orderid) {
			$participant = new Participant();
			$participant->eventid = $eventid;
			$participant->name = $name;
			$participant->email = $email;
			$participant->phone = $phone;
			$participant->orderid = $orderid;
			//insert//
			$saved = $participant->save();
			//verify insertion//
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
		//get all participants for an event//
		public function getParticipants($eventid) {
			$participant = Participant::where('eventid', $eventid)->get();
			if($participant == null) {
				$array = array('success' => false,
					'message' => 'No participants found');
				return json_encode($array);
			}
			$array = array('success' => true,
					'participant' => $participant);
				return json_encode($array);
		}
	}
?>