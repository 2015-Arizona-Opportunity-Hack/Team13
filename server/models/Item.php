<?php
	namespace Models;

	use Lib\Database;
	use Lib\Hash;
	use Illuminate\Database\Eloquent\Model as Eloquent;

	class Item extends Eloquent {	
			/**
	     * The database table used by the model.
	     *
	     * @var string
	     */
	    protected $table = 'items';
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

		public function addItem($eventid, $name, $description, $pathtopic, $storeprice) {
			$item = new Item();
			$item->eventid = $eventid;
			$item->name = $name;
			$item->description = $description;
			$item->pathtopic = $pathtopic;
			$item->storeprice = $storeprice;

			$saved = $item->save();

			if($saved) {
				$array = array('success' => true,
					'item' => $item);

				return json_encode($array);
			} else {
				$array = array('success' => false,
					'message' => 'Failed to add item');

				return json_encode($array);	
			}
		}

		public function getItems($eventid) {
			$items = Item::where('eventid', $eventid)->get();
			echo $items;
		}
	}
?>