<?php
	namespace Models;

	use Lib\Database;
	use Lib\Hash;
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
	}
?>