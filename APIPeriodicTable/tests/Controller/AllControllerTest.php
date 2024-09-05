<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AllControllerTest extends WebTestCase
{
    private $client;
    private $userRepository;

    private $IdDoc = 3;// Attention, change the API document id number for testing

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
        return [
            ['user0', '/admin', 'h1', "Administration des données du tableau", Response::HTTP_OK, 'Page error /admin with ROLE_SUPER_ADMIN'],
            ['user1', '/admin', 'h1', "Administration des données du tableau", Response::HTTP_OK, 'Page error /admin with ROLE_ADMIN'],
            ['user2', '/admin', null, null, Response::HTTP_FORBIDDEN, 'Page error /admin with ROLE_USER'],
            [ null  , '/admin', null, null,  Response::HTTP_FOUND, 'Page error /admin without Role'],

            ['user0', '/admin/update/element/1', 'h1', "Mise à jour éléments", Response::HTTP_OK, 'Form error /admin/update/element with ROLE_SUPER_ADMIN'],
            ['user1', '/admin/update/element/1', 'h1', "Mise à jour éléments", Response::HTTP_OK, 'Form error /admin/update/element with ROLE_ADMIN'],
            ['user2', '/admin/update/element/1', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/update/element with ROLE_USER'],
            [ null  , '/admin/update/element/1', null, null,  Response::HTTP_FOUND, 'Form error /admin/update/element without Role'],

            ['user0', '/admin/create/element', 'h1', "Ajout d'un élément", Response::HTTP_OK, 'Form error /admin/create/element with ROLE_SUPER_ADMIN'],
            ['user1', '/admin/create/element', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/create/element with ROLE_ADMIN'],
            ['user2', '/admin/create/element', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/create/element with ROLE_USER'],
            [ null  , '/admin/create/element', null, null,  Response::HTTP_FOUND, 'Form error /admin/create/element without Role'],

            ['user0', '/admin/update/category/1', 'h1', "Mise à jour de la catégorie", Response::HTTP_OK, 'Form error /admin/update/category with ROLE_SUPER_ADMIN'],
            ['user1', '/admin/update/category/1', 'h1', "Mise à jour de la catégorie", Response::HTTP_OK, 'Form error /admin/update/category with ROLE_ADMIN'],
            ['user2', '/admin/update/category/1', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/update/category with ROLE_USER'],
            [ null  , '/admin/update/category/1', null, null,  Response::HTTP_FOUND, 'Form error /admin/update/category without Role'],

            ['user0', '/admin/create/category', 'h1', "Ajout d'une catégorie", Response::HTTP_OK, 'Form error /admin/create/category with ROLE_SUPER_ADMIN'],
            ['user1', '/admin/create/category', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/create/category with ROLE_ADMIN'],
            ['user2', '/admin/create/category', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/create/category with ROLE_USER'],
            [ null  , '/admin/create/category', null, null,  Response::HTTP_FOUND, 'Form error /admin/create/category without Role'],

            ['user0', '/admin/update/group/1', 'h1', "Mise à jour d'un groupe", Response::HTTP_OK, 'Form error /admin/update/group with ROLE_SUPER_ADMIN'],
            ['user1', '/admin/update/group/1', 'h1', "Mise à jour d'un groupe", Response::HTTP_OK, 'Form error /admin/update/group with ROLE_ADMIN'],
            ['user2', '/admin/update/group/1', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/update/group with ROLE_USER'],
            [ null  , '/admin/update/group/1', null, null,  Response::HTTP_FOUND, 'Form error /admin/update/group without Role'],

            ['user0', '/admin/create/group', 'h1', "Ajout d'un groupe", Response::HTTP_OK, 'Form error /admin/create/group with ROLE_SUPER_ADMIN'],
            ['user1', '/admin/create/group', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/create/group with ROLE_ADMIN'],
            ['user2', '/admin/create/group', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/create/group with ROLE_USER'],
            [ null  , '/admin/create/group', null, null,  Response::HTTP_FOUND, 'Form error /admin/create/group without Role'],

            ['user0', '/admin/update/definition/1', 'h1', "Mise à jour de la définition", Response::HTTP_OK, 'Form error /admin/update/definition with ROLE_SUPER_ADMIN'],
            ['user1', '/admin/update/definition/1', 'h1', "Mise à jour de la définition", Response::HTTP_OK, 'Form error /admin/update/definition with ROLE_ADMIN'],
            ['user2', '/admin/update/definition/1', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/update/definition with ROLE_USER'],
            [ null  , '/admin/update/definition/1', null, null,  Response::HTTP_FOUND, 'Form error /admin/update/definition without Role'],

            ['user0', '/admin/create/definition', 'h1', "Ajout d'une définition", Response::HTTP_OK, 'Form error /admin/create/definition with ROLE_SUPER_ADMIN'],
            ['user1', '/admin/create/definition', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/create/definition with ROLE_ADMIN'],
            ['user2', '/admin/create/definition', null, null, Response::HTTP_FORBIDDEN, 'Form error /admin/create/definition with ROLE_USER'],
            [ null  , '/admin/create/definition', null, null,  Response::HTTP_FOUND, 'Form error /admin/create/definition without Role'],

            ['user0', '/update/api/documentation/'.$this->IdDoc, 'h1', "Mise à jour de la documentation de l'API", Response::HTTP_OK, 'Form error /update/api/documentation with ROLE_SUPER_ADMIN'],
            ['user1', '/update/api/documentation/'.$this->IdDoc, null, null, Response::HTTP_FORBIDDEN, 'Form error /update/api/documentation with ROLE_ADMIN'],
            ['user2', '/update/api/documentation/'.$this->IdDoc, null, null, Response::HTTP_FORBIDDEN, 'Form error /update/api/documentation with ROLE_USER'],
            [ null  , '/update/api/documentation/'.$this->IdDoc, null, null,  Response::HTTP_FOUND, 'Form error /update/api/documentation without Role'],

            ['user0', '/create/api/documentation', 'h1', "Ajout d'une documentation", Response::HTTP_OK, 'Form error /create/api/documentation with ROLE_SUPER_ADMIN'],
            ['user1', '/create/api/documentation', null, null, Response::HTTP_FORBIDDEN, 'Form error /create/api/documentation with ROLE_ADMIN'],
            ['user2', '/create/api/documentation', null, null, Response::HTTP_FORBIDDEN, 'Form error /create/api/documentation with ROLE_USER'],
            [ null  , '/create/api/documentation', null, null,  Response::HTTP_FOUND, 'Form error /create/api/documentation without Role'],

            ['user0', '/', 'h1', "Présentation...", Response::HTTP_OK, 'Page error / with ROLE_SUPER_ADMIN'],
            ['user1', '/', 'h1', "Présentation...", Response::HTTP_OK, 'Page error / with ROLE_ADMIN'],
            ['user2', '/', 'h1', "Présentation...", Response::HTTP_OK, 'Page error / with ROLE_USER'],
            [ null  , '/', 'h1', "Présentation...", Response::HTTP_OK, 'Page error / without Role'],

            ['user0', '/tableau', 'h1', "Tableau périodique des éléments", Response::HTTP_OK, 'Page error /tableau with ROLE_SUPER_ADMIN'],
            ['user1', '/tableau', 'h1', "Tableau périodique des éléments", Response::HTTP_OK, 'Page error /tableau with ROLE_ADMIN'],
            ['user2', '/tableau', 'h1', "Tableau périodique des éléments", Response::HTTP_OK, 'Page error /tableau with ROLE_USER'],
            [ null  , '/tableau', 'h1', "Tableau périodique des éléments", Response::HTTP_OK, 'Page error /tableau without Role'],

            ['user0', '/read/element/1', 'h1', "Hydrogène", Response::HTTP_OK, 'Page error /read/element with ROLE_SUPER_ADMIN'],
            ['user1', '/read/element/1', 'h1', "Hydrogène", Response::HTTP_OK, 'Page error /read/element with ROLE_ADMIN'],
            ['user2', '/read/element/1', 'h1', "Hydrogène", Response::HTTP_OK, 'Page error /read/element with ROLE_USER'],
            [ null  , '/read/element/1', 'h1', "Hydrogène", Response::HTTP_OK, 'Page error /read/element without Role'],
        ];
    }

}