<?php

// Insert One Document
$mongoClient = new MongoDB\Client;
$collection = $mongoClient->test->users;

$user = [
	'username' => 'admin',
    'email' => 'admin@example.com',
    'name' => 'Admin User',
];
$insertOneResult = $collection->insertOne($user);

printf("Inserted %s document(s) %s y no hemos hecho nada \n", $insertOneResult->getInsertedCount(), 'claro');
echo "<br>";
echo "<pre>";
var_dump($insertOneResult);
echo "/<pre>";