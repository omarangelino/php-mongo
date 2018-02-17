<?php
$mongoClient = new MongoDB\Client;
$collection = $mongoClient->test->users;
// Insert Many  Document
$users = [
    [ 
        'username' => 'admin',
        'email' => 'admin@example.com',
        'name' => 'Admin User'
    ],
    [
        'username' => 'test',
        'email' => 'test@example.com',
        'name' => 'Test User',
    ]
];

$insertManyResult = $collection->insertMany($users);

printf("Inserted %d document(s)\n", $insertManyResult->getInsertedCount());

echo "<br>";
echo "<pre>";
var_dump($insertManyResult->getInsertedIds());
echo "/<pre>";