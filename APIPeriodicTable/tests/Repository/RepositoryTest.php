<?php

namespace App\Tests\Repository;

use App\Entity\Element;
use App\Repository\ElementDefinitionsRepository;
use App\Repository\ElementRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RepositoryTest extends KernelTestCase
{
    /**
     * @dataProvider dataRepository
     */
    public function testCount($repo, $nb, $message){
        self::bootKernel();
        $user = self::getContainer()->get($repo);
        $nbuser = $user->count([]);
        $this->assertEquals($nb, $nbuser, $message);
    }

    public function dataRepository(){
        return [
          [UserRepository::class, 5, 'Erreur du UserRepository'],
            [ElementRepository::class, 118, 'Erreur du ElementRepository'],
            [ElementDefinitionsRepository::class, 13, 'Erreur du ElementRepository']
        ];
    }
}