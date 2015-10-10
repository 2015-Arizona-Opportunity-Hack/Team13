<?php

use Models\Admin\Service;
use Lib\OAuth2\OAuth2;

$app->group('/service', function() use($app, $authorize, $resourceServer) {

	$app->post('/', $authorize('customer'), function() use($app, $resourceServer) {

		$service = new Service();

		$auth = new OAuth2;
		$token = $auth->getToken($resourceServer);
		$custid = $auth->getCustid($token);

		$servicename = $app->request->post('servicename');
		$servicetypeid = $app->request->post('servicetypeid');
		$description = $app->request->post('description');
		$colorchoice = $app->request->post('colorchoice');
		$sku = $app->request->post('sku');
		$price = $app->request->post('price');
		$holidayprice = $app->request->post('holidayprice');
		$price1 = $app->request->post('price1');
		$price2 = $app->request->post('price2');
		$price3 = $app->request->post('price3');
		$price4 = $app->request->post('price4');
		$price5 = $app->request->post('price5');
		$quantity = $app->request->post('quantity');
		$paw = $app->request->post('paw');
		$kennelid = $app->request->post('kennelid');
		$numdays = $app->request->post('numdays');
		$associatedserviceid = $app->request->post('associatedserviceid');
		$istaxable = $app->request->post('istaxable');
		$ishourly = $app->request->post('ishourly');
		$ishourlyminimum = $app->request->post('ishourlyminimum');
		$orderby = $app->request->post('orderby');
		$nocommission = $app->request->post('nocommission');
		$everycheckout = $app->request->post('everycheckout');
		$trackquantityonhand = $app->request->post('trackquantityonhand');
		$quantityonhand = $app->request->post('quantityonhand');
		$hidezeroitems = $app->request->post('hidezeroitems');
		$vendornotes = $app->request->post('vendornotes');
		$vendorprice = $app->request->post('vendorprice');
		
	    $json = $service->addService($custid, $servicename, $servicetypeid, $description, $colorchoice, $sku, $price, $holidayprice, 
		$price1, $price2, $price3, $price4, $price5, $quantity, $paw, $kennelid, $numdays, $associatedserviceid, $istaxable, 
		$ishourly, $ishourlyminimum, $orderby, $nocommission, $everycheckout, $trackquantityonhand, $quantityonhand, 
		$hidezeroitems, $vendornotes, $vendorprice);

	    echo $json;
	});

	$app->get('/services/', $authorize('customer'), function() use($app, $resourceServer) {

		$service = new Service();

		$auth = new OAuth2;
		$token = $auth->getToken($resourceServer);
		$custid = $auth->getCustid($token);
		
	    $json = $service->getServices($custid);

	    echo $json;
	});

	$app->get('/:serviceid/', $authorize('customer'), function($serviceid) use($app, $resourceServer) {
		$service = new Service();

		$auth = new OAuth2;
		$token = $auth->getToken($resourceServer);
		$custid = $auth->getCustid($token);
		
	    $json = $service->getService($custid, $serviceid);

	    echo $json;
	});

	$app->put('/:serviceid/', $authorize('customer'), function($serviceid) use($app, $resourceServer) {

		$service = new Service();

		$auth = new OAuth2;
		$token = $auth->getToken($resourceServer);
		$custid = $auth->getCustid($token);

		$companyname = $app->request->put('companyname');
		$poc = $app->request->put('poc');
		$addr1 = $app->request->put('addr1');
		$addr2 = $app->request->put('addr2');
		$city = $app->request->put('city');
		$state = $app->request->put('state');
		$zip = $app->request->put('zip');
		$phone = $app->request->put('phone');
		$fax = $app->request->put('fax');
		$cell = $app->request->put('cell');
		$email = $app->request->put('email');
		$additional = $app->request->put('additional');
		
	    $json = $service->updateService($custid, $serviceid, $servicename, $servicetypeid, $description, $colorchoice, $sku, $price, $holidayprice, 
		$price1, $price2, $price3, $price4, $price5, $quantity, $paw, $kennelid, $numdays, $associatedserviceid, $istaxable, 
		$ishourly, $ishourlyminimum, $orderby, $nocommission, $everycheckout, $trackquantityonhand, $quantityonhand, 
		$hidezeroitems, $vendornotes, $vendorprice);

	    echo $json;
	});

	$app->post('/:serviceid/vendor/:vendorid/', $authorize('customer'), function($serviceid, $vendorid) use($app, $resourceServer) {

		$service = new Service();

		$auth = new OAuth2;
		$token = $auth->getToken($resourceServer);
		$custid = $auth->getCustid($token);
		
	    $json = $service->addVendorService($custid, $serviceid, $vendorid);

	    echo $json;
	});

	$app->delete('/:serviceid/vendor/:vendorid/', $authorize('customer'), function($serviceid, $vendorid) use($app, $resourceServer) {

		$service = new Service();

		$auth = new OAuth2;
		$token = $auth->getToken($resourceServer);
		$custid = $auth->getCustid($token);
		
	    $json = $service->deleteVendorService($custid, $serviceid, $vendorid);

	    echo $json;
	});

	$app->delete('/:serviceid/', $authorize('customer'), function($serviceid) use($app, $resourceServer) {

		$service = new Service();

		$auth = new OAuth2;
		$token = $auth->getToken($resourceServer);
		$custid = $auth->getCustid($token);
		
	    $json = $service->deleteService($custid, $serviceid);

	    echo $json;
	});

});

?>