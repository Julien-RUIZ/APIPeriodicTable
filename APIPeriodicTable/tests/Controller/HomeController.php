<?php

namespace Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends WebTestCase
{
    public function testReponseHome(){
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
    public function testElementHome(){
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertSelectorExists('nav');
    }
}