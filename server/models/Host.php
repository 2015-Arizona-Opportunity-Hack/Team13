<?php

	namespace Models;

	use Lib\Database;
	use Lib\Hash;
	use Illuminate\Database\Eloquent\Model as Eloquent;

	class Host extends Eloquent {
		/**
	     * The database table used by the model.
	     *
	     * @var string
	     */
	    protected $table = 'hosts';
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
		protected $hash;
		//Eloquent constructor//		
		function __construct() {
			$this->database = Database::getInstance();
			$this->hash = Hash::getInstance();
		}
		//Used by OAuth2 server in the setVerifyCredentialsCallback function to retrieve a userid
		public function oauth2Login($user, $pass) {
			$host = Host::whereRaw('username = ?', [$user])->select('id', 'password')->first();
			$valid = $this->hash->isValid($pass, $host['password']);
			if($valid === true) {
				return $host['id'];
			}
			else {
				return false;
			}
		}
		//add new hosts//
		public function addHost($firstname, $lastname, $email, $phone, $username, $password) {
			//Check if host account already exists
			$count = Host::where('username', $username)->count();
			if($count >	0) {
				$array = array('success' => false,
					'message' => 'Username already exists');
				return json_encode($array);
			}
			$host = new Host();
			$host->firstname = $firstname;
			$host->lastname = $lastname;
			$host->email = $email;
			$host->phone = $phone;
			$host->username = $username;
			$host->password = $this->hash->hash($password);
			//insert using eloquient//
			$saved = $host->save();
			//verify insertion//
			if($saved) {
				$array = array('success' => true,
					'host' => $host);
				return json_encode($array);
			} else {
				$array = array('success' => false,
					'message' => 'Failed to add host');
				return json_encode($array);	
			}
		}
		//get specific host//
		public function getHost($id) {
			$host = Host::where('id',$id)->first();
			if ($host != null) {
				$array = array('success' => true,
						'host' => $host);
					return json_encode($array);	
			}
			else {
				$array = array('success' => false,
						'message' => 'Host not Found');
					return json_encode($array);	
			}
		}
	}
?>