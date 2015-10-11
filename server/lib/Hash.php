<?php
/*
** Using Mozilla's hashing standards with HMAC + BCRYPT
** https://blog.mozilla.org/webdev/2012/06/08/lets-talk-about-password-storage/
** 
** The hashing function has two steps. First, the password is hashed with an algorithm 
** called HMAC, together with a local salt: H: password -> HMAC(local_salt + password). 
** The local salt is a random value that is stored only on the server, never in the database. 
** Why is this good? If an attacker steals one of our password databases, they would need to also 
** separately attack one of our web servers to get file access in order to discover this local salt value. 
** If they don’t manage to pull off two successful attacks, their stolen data is largely useless.
**
** As a second step, this hashed value (or strengthened password, as some call it) is then 
** hashed again with a slow hashing function called bcrypt. The key point here is slow. Unlike 
** general-purpose hash functions, bcrypt intentionally takes a relatively long time to be calculated. 
** Unless an attacker has millions of years to spend, they won’t be able to try out a whole lot of passwords 
** after they steal a password database. Plus, bcrypt hashes are also salted, so no two bcrypt hashes of 
** the same password look the same.
**
** So the whole function looks like: H: password -> bcrypt(HMAC(password, local_salt), bcrypt_salt).
**
**
** Mozilla's secure coding guidelines: 
** https://wiki.mozilla.org/WebAppSec/Secure_Coding_Guidelines#Password_Storage
**
** The purpose of hmac and bcrypt storage is as follows:
** 1) bcrypt provides a hashing mechanism which can be configured to consume sufficient time to 
** 	  prevent brute forcing of hash values even with many computers
** 2) bcrypt can be easily adjusted at any time to increase the amount of work and thus provide 
**    protection against more powerful systems
** 3) The nonce for the hmac value is designed to be stored on the file system and not in the databases 
**    storing the password hashes. In the event of a compromise of hash values due to SQL injection, the 
**    nonce will still be an unknown value since it would not be compromised from the file system. This 
**    significantly increases the complexity of brute forcing the compromised hashes considering both bcrypt 
**    and a large unknown nonce value
** 4) The hmac operation is simply used as a secondary defense in the event there is a design weakness with 
**    bcrypt that could leak information about the password or aid an attacker
** 
*/

	namespace Lib;

	require_once("Config.php");

	class Hash {

		private static $instance;

		public static function createKey() {
			//Used to create the local salt key
			if(function_exists('openssl_random_pseudo_bytes')) {
				return base64_encode(openssl_random_pseudo_bytes(128));
			} else {
				return base64_encode(mcrypt_create_iv(128, MCRYPT_DEV_URANDOM));
			}
		}

		public static function hash($pass="") {
			//Creating a HMAC using a locally stored salt key outside of the public directory
		    $hmac = hash_hmac('sha512', $pass, LOCAL_SECRET);

		    //Creating salt for bcrypt
		    $bytes = openssl_random_pseudo_bytes(16); //Recommended by Mozilla 
		    // If we don't have access to openssql_random_pseudo_bytes then use mycrpt_create_iv
		    //$bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM); 
		    
		    //Replace '+' with '.' because bcrypt salt does not allow '+'
		    $salt = strtr(base64_encode($bytes), '+', '.');
		    //Extract 22 characters because required length for salt should be 22 characters in length
		    $salt = substr($salt, 0, 22);

		    //Hashed password with blowfish algorithm
		    $bcrypt = crypt($hmac, '$2y$12$' . $salt);

		    return $bcrypt;
		}

		public static function isValid($pass="", $hash="") {
			//Re-hashing with locally stored salt key
			$hmac = hash_hmac('sha512', $pass, LOCAL_SECRET);

			if (crypt($hmac, $hash) === $hash) 
				return true;
			else 
				return false;
		}

		public static function getInstance() {
	        if (!isset(self::$instance))
	        {
	            $object = __CLASS__;
	            self::$instance = new $object;
	        }
	        return self::$instance;
	    }
	}
?>