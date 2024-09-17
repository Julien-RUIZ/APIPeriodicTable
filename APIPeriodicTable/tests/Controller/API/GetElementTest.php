<?php

namespace App\Tests\Controller\API;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class GetElementTest extends WebTestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    /**
     * @dataProvider DataElement
     */
    public function testGetElements($methode, $uri, $response, $contenu, $Nbattribute){

        $this->client->request($methode, $uri);
        $this->assertResponseStatusCodeSame($response);

        $this->assertJson($this->client->getResponse()->getContent());

        $text = json_decode($this->client->getResponse()->getContent(), true);
        $this->assertEquals($text[0]["nom"], $contenu);

        $nbettribute = count($text[0]);
        $this->assertEquals($nbettribute, $Nbattribute);

    }
    public function DataElement(){
        return[
            ['GET', '/api/element/1', Response::HTTP_OK, "Hydrogène", 25],
            ['GET', '/api/element/1?field=nom', Response::HTTP_OK, "Hydrogène", 1],
            ['GET', '/api/element/1?field=nom,symbole', Response::HTTP_OK, "Hydrogène", 2]
        ];
    }
}