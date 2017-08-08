<?php

namespace AppBundle\Tests\Controller\Api;

use AppBundle\Test\ApiTestCase;


class ProgrammerControllerTest extends ApiTestCase
{
    public function setup() {
        parent::setup();
        
        $this->createUser('weaverryan');
    }
    
    public function testPOST()
    {
        $data = [
            'nickname' => 'ObjectOrienter',
            'avatarNumber' => 5,
            'tagLine' => 'A test dev'
        ];
        //create
        $response = $this->client->post('/api/programmers', [
            'body' => json_encode($data)
        ]);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('/api/programmers/ObjectOrienter',$response->getHeader('Location'));
        $finishedData = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('nickname', $finishedData);
        $this->assertEquals('ObjectOrienter', $data['nickname']);
    }
    
    public function testGETProgrammer() 
    {
        $this->createProgrammer(array(
            'nickname'=>'UnitTester',
            'avatarNumber'=>3,
        ));
        
        $response = $this->client->get('/api/programmers/UnitTester');
        $this->assertEquals(200, $response->getStatusCode());
        $data = $response->json();
        $this->assertEquals(array(
            'nickname',
            'avatarNumber',
            'powerLevel',
            'tagLine'
        ), array_keys($data));
    }
}
