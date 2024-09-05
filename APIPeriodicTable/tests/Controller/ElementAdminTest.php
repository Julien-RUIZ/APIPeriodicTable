<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ElementAdminTest extends WebTestCase
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
    public function testResponseWithRoleUser($userRole, $url, $titleTag, $TitleText, $response, $message){
            if ($userRole != null){
                $user = $this->userRepository->findOneBy(['username' => $userRole]);
                $this->client->loginUser($user);
            }
            $this->client->request('GET', $url);
            $this->assertResponseStatusCodeSame($response, $message);
            if($titleTag != null && $TitleText != null){
                $this->assertSelectorTextContains($titleTag, $TitleText, $message);
            }
    }
    public function DataElement(){
        for ($i=90; $i<=118; $i++){
            for ($j=0; $j<=3; $j++){
                if ($j===0){
                    $this->idElements[]= ['user'.$j, '/admin/update/element/'.$i, 'h1', "Mise à jour éléments", Response::HTTP_OK, 'Form error /admin/update/element with ROLE_SUPER_ADMIN'];
                }
                if ($j===1){
                    $this->idElements[]= ['user'.$j, '/admin/update/element/'.$i, 'h1', "Mise à jour éléments", Response::HTTP_OK, 'Form error /admin/update/element with ROLE_ADMIN'];
                }
                if ($j===2){
                    $this->idElements[]= ['user'.$j, '/admin/update/element/'.$i, null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/update/element with ROLE_USER'];
                }
                if ($j===3){
                    $this->idElements[]= [null, '/admin/update/element/'.$i, null, null, Response::HTTP_FOUND, 'Form error /admin/update/element without ROLE'];
                }
            }
        }
        return $this->idElements;
    }
}