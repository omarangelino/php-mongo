<?php

namespace APP\Resource;

use MongoDB\Client;
class MongoDBClient{

	private static $instance = null;

	private function __construct(){
		$mongoClient = new Client;
	}

	public static function getInstance(){
		if(self::instance == null){
			self::instance == new MongoDBClient;
		}
	}
}