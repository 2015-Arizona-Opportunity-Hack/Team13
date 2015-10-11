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
		//Eloquent constructor//
		function __construct() {
			$this->database = Database::getInstance();
		}
		//add new item//
		public function addItem($eventid, $name, $description, $pathtopic, $storeprice) {
			$item = new Item();
			$item->eventid = $eventid;
			$item->name = $name;
			$item->description = $description;
			$item->pathtopic = $pathtopic;
			$item->storeprice = $storeprice;
			//insert//
			$saved = $item->save();
			//verify insert//
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
		//get all items for the specified event//
		public function getItems($eventid) {
			$items = Item::where('eventid', $eventid)->get();
			if ($items != null) {
				$array = array('success' => true,
					'items' => $items);
				return json_encode($array);
			} 
			else {
				$array = array('success' => false,
					'message' => 'Items not found');
				return json_encode($array);	
			}
		}
		//get specific item//
		public function getItem($itemid) {
			$item = Item::where('id', $itemid)->first();
			if ($item != null) {
				$array = array('success' => true,
					'item' => $item);
				return json_encode($array);	
			} 
			else {
				$array = array('success' => false,
					'message' => 'Item not found');
				return json_encode($array);	
			}
		}
	}
?>