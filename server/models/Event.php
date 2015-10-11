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

			$save = $event->save();

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
		public function verifyHost($eventid) {
			$event = Event::where('id', $eventid)->first();
			if ($resourceServer->getAccessToken()->getSession()->getOwnerId() == $event->hostid) {
				return true;
			}
			return false;
		}

	}

?>