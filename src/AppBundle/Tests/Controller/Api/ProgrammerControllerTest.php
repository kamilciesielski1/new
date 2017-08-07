<?php

namespace AppBundle\Tests\Controller\Api;

use AppBundle\Test\ApiTestCase;


class ProgrammerControllerTest extends ApiTestCase
{
    public function testPOST()
    {
        $nickname = 'ObjectOrienter'.rand(0, 999);
        $data = [
            'nickname' => $nickname,
            'avatarNumber' => 5,
            'tagLine' => 'A test dev'
        ];
        //create
        $response = $this->client->post('/api/programmers', [
            'body' => json_encode($data)
        ]);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertTrue($response->hasHeader('Location'));
        $finishedData = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('nickname', $finishedData);    
    }
}
