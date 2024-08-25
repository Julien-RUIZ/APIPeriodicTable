<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AtomTestController extends WebTestCase
{
    public function testResponse(){
        $client = static::createClient();
        $client->request('GET', '/read/atom/1');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorExists('h1', 'Hydrogène');
    }
}