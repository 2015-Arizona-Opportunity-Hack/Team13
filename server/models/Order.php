<?php

	namespace Models;

	use Lib\Database;
	use Illuminate\Database\Eloquent\Model as Eloquent;

	class Order extends Eloquent {
		/**
	     * The database table used by the model.
	     *
	     * @var string
	     */
	    protected $table = 'orders';
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
		//add new order//
		public function addOrder($ordernumber, $ticketquantity) {
			$order = new Order();
			$order->ordernumber = $ordernumber;
			$order->ticketquantity = $ticketquantity;
			//insert//
			$saved = $order->save();
			//verify insertion//
			if($saved) {
				$array = array('success' => true,
					'order' => $order);
				return json_encode($array);
			} else {
				$array = array('success' => false,
					'message' => 'An error occurred');
				return json_encode($array);
			}
		}
		//get specific order//
		public function getOrder($id) {
			$order = Order::where('id', $id)->first();
			if($order === null) {
				$array = array('success' => false,
					'message' => 'Order does not exist');
				return json_encode($array);
			}
			$array = array('success' => true,
					'order' => $order);
			return json_encode($array);
		}
	}
?>