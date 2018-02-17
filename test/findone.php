<?php

$mongoClient = new MongoDB\Client;
$collection = $mongoClient->test->users;

$document = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID("5a864a0fe713762664006b8e")]);

var_dump($document);