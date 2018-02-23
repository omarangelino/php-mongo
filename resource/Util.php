<?php 

namespace APP\Resource;
use App\Models\request;

class Util{

	public static function getProperties($object){

		return get_object_vars($object);
	}

	public static function getRequest(){
		$request = new request;
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$requestVariables = $_POST;
		}else if($_SERVER['REQUEST_METHOD'] == "PATCH"){
			$requestVariables = $_PATCH;
		}else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
			$requestVariables = $_DELETE;
		}else{
			$requestVariables = $_GET;
		}

		foreach ($requestVariables as $param_name => $param_val) {
    		$request->$param_name = $param_val;
    	}

    	foreach (getallheaders() as $param_name => $param_val) {
		 	$request->addHeader($param_name,$param_val);
		}
		return $request;
	}

	

}