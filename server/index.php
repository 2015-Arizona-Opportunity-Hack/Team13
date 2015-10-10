<?php
require_once 'vendor/autoload.php';

use League\OAuth2\Server\ResourceServer;
use League\OAuth2\Server\AuthorizationServer;
use Lib\Model;
use Models\Host;
use Lib\OAuth2\Storage;
use Lib\OAuth2\OAuth2;

$app = new \Slim\Slim(array(
    'debug' => true
));

$app->response->headers->set('Content-Type', 'application/json');

// Set up the OAuth 2.0 resource server
$sessionStorage = new Storage\SessionStorage();
$accessTokenStorage = new Storage\AccessTokenStorage();
$clientStorage = new Storage\ClientStorage();
$scopeStorage = new Storage\ScopeStorage();
$refreshTokenStorage = new Storage\RefreshTokenStorage();

$authorizationServer = new \League\OAuth2\Server\AuthorizationServer;

$authorizationServer->setSessionStorage($sessionStorage);
$authorizationServer->setAccessTokenStorage($accessTokenStorage);
$authorizationServer->setClientStorage($clientStorage);
$authorizationServer->setScopeStorage($scopeStorage);
$authorizationServer->setRefreshTokenStorage($refreshTokenStorage);

//$clientCredentials = new \League\OAuth2\Server\Grant\ClientCredentialsGrant();
//$server->addGrantType($clientCredentials);
$refreshTokenGrant = new \League\OAuth2\Server\Grant\RefreshTokenGrant();
$authorizationServer->addGrantType($refreshTokenGrant);

$resourceServer = new ResourceServer(
    $sessionStorage,
    $accessTokenStorage,
    $clientStorage,
    $scopeStorage,
    $refreshTokenStorage
);

$passwordGrant = new \League\OAuth2\Server\Grant\PasswordGrant();
$authorizationServer->addGrantType($passwordGrant);


$passwordGrant->setVerifyCredentialsCallback(function ($username, $password) use ($app) {
    // implement logic here to validate a username and password, return an ID if valid, otherwise return false
    $host = new Host();
    $valid = $host->oauth2Login($username, $password);   

    if($valid !== false)
        return $valid;
    else 
        $app->halt(401, 'Unauthorized. The user credentials were incorrect.');
}); 


$authorize = function () use ($resourceServer) {
    return function () use ($resourceServer) {
		//401 = Unauthorized
        //403 = Forbidden

        $app = \Slim\Slim::getInstance();

        try {
        	$authenticated = $resourceServer->isValidRequest(false);

        	if($authenticated === false) 
            	$app->halt(401, 'Unauthorized');
            //else {
            	//if (!$resourceServer->getAccessToken()->hasScope($scope)) 
            		//$app->halt(403, 'Forbidden');
            //}
        } catch(\League\OAuth2\Server\Exception\OAuthException $e) {
        	$error = json_encode([
		        'error'     =>  $e->errorType,
		        'message'   =>  $e->getMessage(),
		    ]);
		    $app->halt($e->httpStatusCode, $error);
        } catch(\League\OAuth2\Server\Exception\AccessDeniedException $e) {
        	$error = json_encode([
		        'error'     =>  $e->errorType,
		        'message'   =>  $e->getMessage(),
		    ]);

		    $app->halt($e->httpStatusCode, $error);
        } catch(\League\OAuth2\Server\Exception\InvalidRequestException $e) {
            $error = json_encode([
                'error'     =>  $e->errorType,
                'message'   =>  $e->getMessage(),
            ]);

            $app->halt($e->httpStatusCode, $error);
        }
            
    };
};

/*
grant_type = password
client_id = testclient
client_secret = 
username = {username}
password = {password}
scope = {scope} optional

------------------------

grant_type = refresh_token
client_id = testclient
client_secret = 
refresh_token = {refresh token}

This route will be used for logging in by using the password grant_type
*/
$app->post('/access_token/', function() use ($app, $authorizationServer) {
    try {
        echo json_encode($authorizationServer->issueAccessToken());
    } catch(\League\OAuth2\Server\Exception\InvalidRefreshException $e) {
        $error = json_encode([
            'error'     =>  $e->errorType,
            'message'   =>  $e->getMessage(),
        ]);

        $app->halt($e->httpStatusCode, $error);
    } catch(\League\OAuth2\Server\Exception\InvalidRequestException $e) {
        $error = json_encode([
            'error'     =>  $e->errorType,
            'message'   =>  $e->getMessage(),
        ]);

        $app->halt($e->httpStatusCode, $error);
    }
    
});

$app->get('/', function() use ($app) {
    echo 'Nothing to see here';
});





$routeFiles = (array) glob('routes/*.php');
foreach($routeFiles AS $routeFile) {
    require $routeFile;
}

$app->run();

?>