<?php

namespace App\Tests\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PeriodicTableTestController extends WebTestCase
{
    public function testResponse(){
        $client = static::createClient();
        $client->request('GET', '/tableau' );
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorExists('h1', 'Tableau périodique des éléments');
        $this->assertSelectorExists('table');
        $this->assertSelectorExists('button');
    }


}