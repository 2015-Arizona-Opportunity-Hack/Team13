<?php 

	namespace Models;

	use Lib\Database;
	use Lib\Hash;
	use Illuminate\Database\Eloquent\Model as Eloquent;

	class Event extends Eloquent {	
		/**
	     * The database table used by the model.
	     *
	     * @var string
	     */
	    protected $table = 'events';
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
		//insert new event//
		public function addEvent($hostid, $name, $startdate, $enddate, $addr1, $addr2, $city, $state, $zip, $islocal, $isvirtual, $ticketprice, $description) {
			$event = new Event();
			$event->hostid = $hostid;
			$event->name = $name;
			$event->startdate = $startdate;
			$event->enddate = $enddate;
			$event->addr1 = $addr1;
			$event->addr2 = $addr2;
			$event->city = $city;
			$event->state = $state;
			$event->zip = $zip;
			$event->islocal = $islocal;
			$event->isvirtual = $isvirtual;
			$event->ticketprice = $ticketprice;
			$event->description = $description;
			//insert//
			$saved = $event->save();
			//verify insertion//
			if($saved) {
				$array = array('success' => true,
					'event' => $event);
				return json_encode($array);
			} else {
				$array = array('success' => false,
					'message' => 'Failed to add event');
				return json_encode($array);	
			}
		}
		//check to make sure the host editing the event is the actual owner//
		//$userid is easily obtained by $resourceServer->getAccessToken()->getSession()->getOwnerId()//
		public function verifyHost($eventid, $userid) {
			$event = Event::where('id', $eventid)->first();
			if ($event != null) {
				$hostid = $event->hostid;
				if ($userid == $hostid) {
					return true;
				}
			}
			return false;
		}
		//get specific event//
		public function getEvent($eventid) {
			$event = Event::where('id', $eventid)->first();
			if($event != null) {
				$array = array('success' => true,
					'event' => $event);
						return json_encode($array);
			}
			else {
				$array = array('success' => false,
					'message' => 'Failed to find event');
				return json_encode($array);
			}
		}
		//get all events for a specific host//
		public function getHostEvents($hostid) {
			$events = Event::where('hostid', $hostid)->get();
			$array = array('success' => true,
					'events' => $events);
			return json_encode($array);
		}
	}
?>