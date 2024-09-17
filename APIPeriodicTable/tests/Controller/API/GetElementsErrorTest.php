<?php

namespace App\Tests\Controller\API;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class GetElementsErrorTest extends WebTestCase
{

    private $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }
    /**
     * @dataProvider DataElementerror
     */
    public function testGetElementsError($methode, $uri, $response, $message){
        $this->client->request($methode, $uri);
        $this->assertResponseStatusCodeSame($response, $message);
        $this->assertJson($this->client->getResponse()->getContent(), $message);
    }

    public function DataElementerror(){
        return[
            ['GET', '/api/element', Response::HTTP_NOT_FOUND, 'erreur sur /api/element'],
            ['GET', '/api/element/1?field=', Response::HTTP_BAD_REQUEST, 'erreur sur /api/element/1?field='],

            ['GET', '/api/elements?page=&limit=200', Response::HTTP_BAD_REQUEST, 'erreur sur /api/elements?page=&limit=200'],
            ['GET', '/api/elements?page=1&limit=', Response::HTTP_BAD_REQUEST, 'erreur sur /api/elements?page=1&limit='],
            ['GET', '/api/elements?page=1&limit=200', Response::HTTP_BAD_REQUEST, 'erreur sur /api/elements?page=1&limit=200'],
            ['GET', '/api/elements?field=', Response::HTTP_BAD_REQUEST, 'erreur sur /api/elements?field='],

            ['GET', '/api/elements/search?GroupeVertical=', Response::HTTP_NOT_FOUND, 'erreur sur /api/elements/search?GroupeVertical='],
            ['GET', '/api/elements/search?GroupeVertical=1&page=1&limit=', Response::HTTP_BAD_REQUEST, 'erreur sur /api/elements/search?GroupeVertical=1&page=1&limit='],
            ['GET', '/api/elements/search?GroupeVertical=1&page=1&limit=2&field=', Response::HTTP_BAD_REQUEST, 'erreur sur /api/elements/search?GroupeVertical=1&page=1&limit=2&field='],
        ];
    }
}