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
		
		function __construct() {
			$this->database = Database::getInstance();
		}

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

			$saved = $event->save();

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

		public function getEvent($eventid) {
			$event = Event::where('id', $eventid)->first();
			if($event != null) {
				$array = array('success' => true,
					'event' => $event);
						return json_encode($array);
			}
			else {
				$array = array('success' => false,
					'event' => $event);
				return json_encode($array);
			}
		}

		public function getHostEvents($hostid) {
			$events = Event::where('hostid', $hostid)->get();

			$array = array('success' => true,
					'events' => $events);

			return json_encode($array);
		}

	}

?>