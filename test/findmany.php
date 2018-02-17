<?php
// use App\Models\User;

// $user = new User;

// $user->omar = 'Angelino';
// $user->save();

$mongoClient = new MongoDB\Client;
$collection = $mongoClient->test->users;

$cursor = $collection->find([]);

foreach ($cursor as $document) {
	
    echo $document['_id'], "\n";
    echo '<br>';
}