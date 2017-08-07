<?php

namespace AppBundle\Test;

use GuzzleHttp\Client;

class ApiTestCase extends \PHPUnit_Framework_TestCase
{
    private static $staticClient;
    
    protected $client;

    public static function setUpBeforeClass() 
    {
        self::$staticClient = new Client([
        'base_url' => 'http://localhost:8000',
        'defaults' => [
            'exceptions' => false
            ],
        ]);
    }
    
    public function setup() 
    {
        $this->client = self::$staticClient;
    }

}
