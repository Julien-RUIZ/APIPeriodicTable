<?php

namespace App\Tests\Controller\API;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class GetElementsTest extends WebTestCase
{

    private $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    /**
     * @dataProvider DataElement
     */
    public function testGetElements($methode, $uri, $response, $contenu, $Nbelement, $Nbattribute, $message){
        $this->client->request($methode, $uri);
        $this->assertResponseStatusCodeSame($response, $message);

        $this->assertJson($this->client->getResponse()->getContent(), $message);

        $text = json_decode($this->client->getResponse()->getContent(), true);

        $this->assertEquals($text["data"][0]["nom"], $contenu, $message);

        $nbelement = count($text["data"]);
        $this->assertEquals($nbelement, $Nbelement, $message);

        $nbettribute = count($text["data"][0]);
        $this->assertEquals($nbettribute, $Nbattribute, $message);
    }

    public function DataElement(){
        return[
            ['GET', '/api/elements', Response::HTTP_OK, "Hydrogène", 118, 25, "erreur sur /api/elements"],

            ['GET', '/api/elements?field=nom,symbole', Response::HTTP_OK, "Hydrogène", 118, 2, "erreur sur /api/elements?field=nom,symbole"],
            ['GET', '/api/elements?page=1&limit=5', Response::HTTP_OK, "Hydrogène", 5, 25, "erreur sur /api/elements?page=1&limit=5"],
            ['GET', '/api/elements?field=nom,symbole&page=1&limit=5', Response::HTTP_OK, "Hydrogène", 5, 2, "erreur sur /api/elements?field=nom,symbole&page=1&limit=5"],

            ['GET', '/api/elements/search?GroupeVertical=1', Response::HTTP_OK, "Hydrogène", 7, 25, "erreur sur /api/elements/search?GroupeVertical=1"],
            ['GET', '/api/elements/search?GroupeVertical=1&field=nom,symbole', Response::HTTP_OK, "Hydrogène", 7, 2, "erreur sur /api/elements/search?GroupeVertical=1&field=nom,symbole"],
            ['GET', '/api/elements/search?GroupeVertical=1&page=1&limit=3', Response::HTTP_OK, "Hydrogène", 3, 25, "erreur sur /api/elements/search?GroupeVertical=1&page=1&limit=3"],
            ['GET', '/api/elements/search?GroupeVertical=1&field=nom,symbole&page=1&limit=3', Response::HTTP_OK, "Hydrogène", 3, 2, "erreur sur /api/elements/search?GroupeVertical=1&field=nom,symbole&page=1&limit=3"],
        ];
    }
}