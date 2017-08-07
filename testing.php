<?php

require __DIR__.'/vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    'base_url' => 'http://localhost:8000',
    'defaults' => [
        'exceptions' => false
    ]
]);

$nickname = 'ObjectOrienter'.rand(0, 999);
$data = [
    'nickname' => $nickname,
    'avatarNumber' => 5,
    'tagLine' => 'A test dev'
];
//create
$response = $client->post('/api/programmers', [
    'body' => json_encode($data)
]);

$programmerUrl = $response->getHeader('Location');

//show one
$response = $client->get($programmerUrl);

//list programmers
$response = $client->get('/api/programmers');

echo $response;
echo "\n\n";