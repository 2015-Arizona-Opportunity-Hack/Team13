<?php
	namespace Models;

	use Lib\Database;
	use Lib\Hash;
	use Models\Item;
	use Illuminate\Database\Eloquent\Model as Eloquent;

	class Winner extends Eloquent {	
			/**
	     * The database table used by the model.
	     *
	     * @var string
	     */
	    protected $table = 'winner';
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

		public function pickWinner($itemid, $participantid) {
			$winner = new Winner();
			$winner->itemid = $itemid;
			$winner->participantid = $participantid;
			$won = Winner::where('itemid',$itemid)->first();
			if ($won == null) {
				$saved = $winner->save();

				if($saved) {
					$array = array('success' => true,
						'item' => $winner);

					return json_encode($array);
				} else {
					$array = array('success' => false,
						'message' => 'Failed to pick winner');

					return json_encode($array);	
				}
			}
			else {
				echo "ITEM HAS ALREADY BEEN WON!!!";
			}
		}
	}
?>