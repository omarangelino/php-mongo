<?php
namespace App\Models;

use MongoDB\Client;
use APP\Resource\Util;

class Model{

	protected static $table = 'models';

	public function __construct()
	{
	}
	public function findOne($filter){
		$mongoClient = new Client;
		$table = static::$table;
		$collection = $mongoClient->test->$table;
		$document = $collection->findOne($filter);
		if(!$document){
			return $document;
		}
		$className = get_called_class();
		$model = new $className();
		foreach ($document as $key => $value) {
			$model->$key = $value;
		}
		return $model;
	}

	public function insertOne($filter){
		$mongoClient = new Client;
		$table = static::$table;
		$collection = $mongoClient->test->$table;
		$documentId = $collection->insertOne($filter);
		if(!$documentId){
			return $document;
		}
		$className = get_called_class();
		$model = $className::findOne(["_id" => new \MongoDB\BSON\ObjectId($documentId->getInsertedId())]);
		return $model;
	}

	public function updateOne($filter, $update){
		$mongoClient = new Client;
		$table = static::$table;
		$collection = $mongoClient->test->$table;
		$updateResult  = $collection->updateOne($filter,$update);
		return $updateResult->getMatchedCount();
	}

	public function deleteOne($filter){
		$mongoClient = new Client;
		$table = static::$table;
		$collection = $mongoClient->test->$table;
		$deleteResult  = $collection->deleteOne($filter);
		return $deleteResult->getDeletedCount();
	}

	public function save()
	{
		$mongoClient = new Client;
		$table = $this->table;
		$collection = $mongoClient->test->$table;
		$properties = Util::getProperties($this);
		var_dump($properties);
		$insertOneResult = $collection->insertOne($properties);
	}
}