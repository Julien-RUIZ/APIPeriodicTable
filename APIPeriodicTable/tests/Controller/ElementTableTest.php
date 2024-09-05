<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ElementTableTest extends WebTestCase
{
    private $client;
    private $userRepository;
    private $idElements=[];


    protected function setUp(): void
    {
        $this->client= static::createClient();
        $this->userRepository = self::getContainer()->get(UserRepository::class);
    }

    /**
     * @dataProvider DataElement
     */
    public function testResponseWithRoleUser($userRole, $url, $response, $message){
        if ($userRole != null){
            $user = $this->userRepository->findOneBy(['username' => $userRole]);
            $this->client->loginUser($user);
        }
        $this->client->request('GET', $url);
        $this->assertResponseStatusCodeSame($response, $message);
    }
    public function DataElement(){
        for ($i=1; $i<=118; $i++){
            for ($j=0; $j<=3; $j++){
                if ($j===0){
                    $this->idElements[]= ['user'.$j, '/read/element/1', Response::HTTP_OK, 'Page error /read/element with ROLE_SUPER_ADMIN'];
                }
                if ($j===1){
                    $this->idElements[]= ['user'.$j, '/read/element/1', Response::HTTP_OK, 'Page error /read/element with ROLE_ADMIN'];
                }
                if ($j===2){
                    $this->idElements[]= ['user'.$j, '/read/element/1', Response::HTTP_OK, 'Page error /read/element with ROLE_USER'];
                }
                if ($j===3){
                    $this->idElements[]= [null, '/read/element/1', Response::HTTP_OK, 'Page error /read/element without Role'];
                }
            }
        }
        return $this->idElements;
    }
}