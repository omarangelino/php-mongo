<?php 

namespace APP\Resource;

class Util{


	public static function getProperties($object){

		return get_object_vars($object);
	}

	public static function getRequest(){
		$request = new \stdClass;
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$requestVariables = $_POST;
		}else {
			$requestVariables = $_GET;
		}
		foreach ($requestVariables as $param_name => $param_val) {
    		$request->$param_name = $param_val;
    	}
		//$request->header = new \stdClass;
		// foreach (getallheaders() as $param_name => $param_val) {
		// 	$request->header->$param_name = $param_val;
		// }
		return $request;
	}

	public static function createToken($user){
		$token = hash("md5", API_SECRET_TOKEN.$user->_id);
		$user = [ "username" => $user->username, "token" => $token];
		return $user;
	}

	public static function verifyToken($user, $token){
		if(hash("md5", API_SECRET_TOKEN.$user->_id) == $token){
			return $user;
		}else{
			return null;
		}
	}

}