<?php

namespace Models\Admin;

use Lib\Database;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Service extends Eloquent {

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'services';
    /**
     * The database table primary key used by the model.
     *
     * @var string
     */
    public $primaryKey  = 'serviceid';
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

	//Many to many relationship
	public function vendors() {
		return $this->belongsToMany('Models\Admin\Vendor', 'vendor_services', 'serviceid', 'vendorid');
	}

	public function addService($custid, $servicename, $servicetypeid, $description, $colorchoice, $sku, $price, $holidayprice, 
		$price1, $price2, $price3, $price4, $price5, $quantity, $paw, $kennelid, $numdays, $associatedserviceid, $istaxable, 
		$ishourly, $ishourlyminimum, $orderby, $nocommission, $everycheckout, $trackquantityonhand, $quantityonhand, 
		$hidezeroitems, $vendornotes, $vendorprice) {

		$service = new Service();
		$service->custid = $custid;
		$service->servicename = $servicename;
		$service->servicetypeid = $servicetypeid;
		$service->description = $description;
		$service->colorchoice = $colorchoice;
		$service->sku = $sku;
		$service->price = $price;
		$service->holidayprice = $holidayprice;
		$service->price1 = $price1;
		$service->price2 = $price2;
		$service->price3 = $price3;
		$service->price4 = $price4;
		$service->price5 = $price5;
		$service->quantity = $quantity;
		$service->paw = $paw;
		$service->kennelid = $kennelid;
		$service->numdays = $numdays;
		$service->associatedserviceid = $associatedserviceid;
		$service->istaxable = $istaxable;
		$service->ishourly = $ishourly;
		$service->ishourlyminimum = $ishourlyminimum;
		$service->orderby = $orderby;
		$service->nocommission = $nocommission;
		$service->everycheckout = $everycheckout;
		$service->trackquantityonhand = $trackquantityonhand;
		$service->quantityonhand = $quantityonhand;
		$service->hidezeroitems = $hidezeroitems;
		$service->vendornotes = $vendornotes;
		$service->vendorprice = $vendorprice;
		$saved = $service->save();

		if($saved) {
			$array = array('success' => true,
				'service' => $service);

			return json_encode($array);
		} else {
			$array = array('success' => false,
				'message' => 'Failed to add service');

			return json_encode($array);	
		}
	}

	public function getServices($custid) {
		$services = Service::where('custid', $custid)->get();

		if(count($services) !== 0) {
			$array = array('success' => true,
				'services' => $services);

			return json_encode($array);
		} else {
			$array = array('success' => false,
				'message' => 'No services found');

			return json_encode($array);
		}
	}

	public function getService($custid, $serviceid) {
		$service = Service::where(['custid' => $custid, 'serviceid' => $serviceid])->first();

		if(count($service) !== 0) {
			$array = array('success' => true,
				'service' => $service,
				'vendors' => $service->vendors()->get());

			return json_encode($array);
		} else {
			$array = array('success' => false,
				'message' => 'Service not found');

			return json_encode($array);
		}
	}

	public function updateService($custid, $serviceid, $servicename, $servicetypeid, $description, $colorchoice, $sku, $price, $holidayprice, 
		$price1, $price2, $price3, $price4, $price5, $quantity, $paw, $kennelid, $numdays, $associatedserviceid, $istaxable, 
		$ishourly, $ishourlyminimum, $orderby, $nocommission, $everycheckout, $trackquantityonhand, $quantityonhand, 
		$hidezeroitems, $vendornotes, $vendorprice) {

		$service = Service::where(['custid' => $custid, 'serviceid' => $serviceid])->first();

		if(count($service) === 0) {
			$array = array('success' => false,
				'message' => 'Service not found');

			return json_encode($array);
		}

		$service->servicename = $servicename;
		$service->servicetypeid = $servicetypeid;
		$service->description = $description;
		$service->colorchoice = $colorchoice;
		$service->sku = $sku;
		$service->price = $price;
		$service->holidayprice = $holidayprice;
		$service->price1 = $price1;
		$service->price2 = $price2;
		$service->price3 = $price3;
		$service->price4 = $price4;
		$service->price5 = $price5;
		$service->quantity = $quantity;
		$service->paw = $paw;
		$service->kennelid = $kennelid;
		$service->numdays = $numdays;
		$service->associatedserviceid = $associatedserviceid;
		$service->istaxable = $istaxable;
		$service->ishourly = $ishourly;
		$service->ishourlyminimum = $ishourlyminimum;
		$service->orderby = $orderby;
		$service->nocommission = $nocommission;
		$service->everycheckout = $everycheckout;
		$service->trackquantityonhand = $trackquantityonhand;
		$service->quantityonhand = $quantityonhand;
		$service->hidezeroitems = $hidezeroitems;
		$service->vendornotes = $vendornotes;
		$service->vendorprice = $vendorprice;
		$saved = $service->save();

		if($saved) {
			$array = array('success' => true,
				'service' => $service);

			return json_encode($array);
		} else {
			$array = array('success' => false,
				'message' => 'Failed to locate and update service');

			return json_encode($array);	
		}
	}

	public function addVendorService($custid, $serviceid, $vendorid) {
		$service = Service::where(['custid' => $custid, 'serviceid' => $serviceid])->first();

		if(count($service) === 0) {
			$array = array('success' => false,
				'message' => 'Service not found');

			return json_encode($array);
		}

		try {
			$service->vendors()->sync([$vendorid], false);

			$arr = array('success' => true);
			return json_encode($arr);
		} catch(\Illuminate\Database\QueryException $e) {
			$error = array(
                'success'     =>  false,
                'message'   =>  'Vendor does not exist',
            );

            return json_encode($error);
		}

		
		
	}

	public function deleteVendorService($custid, $serviceid, $vendorid) {
		$service = Service::where(['custid' => $custid, 'serviceid' => $serviceid])->first();

		if(count($service) === 0) {
			$array = array('success' => false,
				'message' => 'Service not found');

			return json_encode($array);
		}

		$service->vendors()->detach($vendorid);

		$arr = array('success' => true);
		return json_encode($arr);
		
	}

	public function deleteService($custid, $serviceid) {
		$service = Service::where(['custid' => $custid, 'serviceid' => $serviceid])->first();

		if($service !== null) {
			$deleted = $service->delete();
		} else {
			$arr = array('success' => false,
				'message' => 'Service not found');
			return json_encode($arr);
		}
		
		if($deleted) {
			$arr = array('success' => true);
			return json_encode($arr);
		} else {
			$arr = array('success' => false);
			return json_encode($arr);
		}
	}

}


?>