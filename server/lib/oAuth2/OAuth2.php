<?php

    //This class is primarily used to call customer functions used to interact with OAuth2 throughout the system//

    namespace Lib\OAuth2;

    use Illuminate\Database\Capsule\Manager as Capsule;

    class OAuth2 {

    	public function getToken($resourceServer) {
    		return $resourceServer->getAccessToken();
    	}

    	public function getUserid($token) {
    		$result = Capsule::table('oauth_access_tokens')
                            ->select('oauth_sessions.owner_id')
                            ->join('oauth_sessions', 'oauth_access_tokens.session_id', '=', 'oauth_sessions.id')
                            ->where('access_token', $token)
                            ->get();
            if(count($result) === 1) {
            	return $result[0]->owner_id;
            }
            else {
            	return 0;
            }
    	}

    	public function getCustid($token) {
    		$userid = $this->getUserid($token);
    		$result = Capsule::table('users')
                                ->select('custid')
                                ->where('userid', $userid)
                                ->get();

            if(count($result) === 1) {
            	return $result[0]->custid;
            }
            else {
            	return 0;
            }
    	}
    }
?>